<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Webhook;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Build payment_intent_data for Destination Charges.
     * Returns empty array if no connected account is configured,
     * so checkout works with or without Connect.
     */
    private function connectPaymentIntentData(int $amountInCents): array
    {
        $connectAccountId = config('services.stripe.client_account_id');

        if (! $connectAccountId || $connectAccountId === 'acct_REPLACE_WITH_YOUR_CLIENT_ACCOUNT_ID') {
            return [];
        }

        return [
            'application_fee_amount' => (int) round($amountInCents * 0.10), // 10% platform fee
            'transfer_data' => [
                'destination' => $connectAccountId,
            ],
        ];
    }

    /**
     * Create a Stripe Checkout Session for the given product slug
     * and redirect the customer to Stripe's hosted checkout page.
     */
    public function createSession(string $slug)
    {
        $products = config('products');
        $product  = $products[$slug] ?? null;

        if (! $product) {
            abort(404);
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $imageMap = [
            'omanawa-falls' => '/images/Omanawa-falls-creamed-honey.jpg',
            'mamaku'        => '/images/mamaku-creamed-honey.jpg',
            'otumoetai'     => '/images/otumoetai-summer-harvest-creamed-honey.jpg',
            'rewarewa'      => '/images/rewarewa-honey.jpg',
        ];

        $imageUrl = url($imageMap[$product['image']] ?? '');

        $sessionParams = [
            'payment_method_types' => ['card'],
            'line_items'           => [
                [
                    'price_data' => [
                        'currency'     => 'nzd',
                        'product_data' => [
                            'name'        => $product['name'],
                            'description' => $product['weight'] . ' — ' . $product['description'],
                            'images'      => [$imageUrl],
                        ],
                        'unit_amount'  => $product['price_cents'],
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode'                 => 'payment',
            'shipping_address_collection' => [
                'allowed_countries' => ['NZ'],
            ],
            'shipping_options'     => [
                [
                    'shipping_rate_data' => [
                        'type'         => 'fixed_amount',
                        'fixed_amount' => [
                            'amount'   => 0,
                            'currency' => 'nzd',
                        ],
                        'display_name' => 'Free NZ Shipping (orders $75+)',
                    ],
                ],
                [
                    'shipping_rate_data' => [
                        'type'         => 'fixed_amount',
                        'fixed_amount' => [
                            'amount'   => 750,
                            'currency' => 'nzd',
                        ],
                        'display_name' => 'Standard NZ Shipping',
                    ],
                ],
            ],
            'success_url'          => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'           => route('checkout.cancel', ['slug' => $slug]),
            'metadata'             => [
                'product_slug' => $slug,
                'product_name' => $product['name'],
            ],
        ];

        // Only add Connect fee split if a connected account is configured
        $connectData = $this->connectPaymentIntentData($product['price_cents']);
        if (! empty($connectData)) {
            $sessionParams['payment_intent_data'] = $connectData;
        }

        $session = Session::create($sessionParams);

        return redirect($session->url, 303);
    }

    /**
     * Display the post-payment success page.
     */
    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        $session   = null;

        if ($sessionId && config('services.stripe.secret')) {
            try {
                Stripe::setApiKey(config('services.stripe.secret'));
                $session = Session::retrieve($sessionId);
            } catch (\Exception $e) {
                // Non-fatal — page still renders without order details
                Log::warning('Could not retrieve Stripe session: ' . $e->getMessage());
            }
        }

        return view('checkout.success', compact('session'));
    }

    /**
     * Display the payment-cancelled page.
     */
    public function cancel(Request $request)
    {
        $slug = $request->query('slug');
        return view('checkout.cancel', compact('slug'));
    }

    /**
     * Handle Stripe webhook events (e.g. checkout.session.completed).
     * This route is exempt from CSRF verification.
     */
    public function webhook(Request $request)
    {
        $payload   = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $secret    = config('services.stripe.webhook_secret');

        if (! $secret) {
            Log::warning('Stripe webhook secret not configured.');
            return response('Webhook secret not configured', 500);
        }

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $secret);
        } catch (SignatureVerificationException $e) {
            Log::warning('Stripe webhook signature verification failed: ' . $e->getMessage());
            return response('Invalid signature', 400);
        } catch (\UnexpectedValueException $e) {
            Log::warning('Stripe webhook invalid payload: ' . $e->getMessage());
            return response('Invalid payload', 400);
        }

        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                
                // Retrieve the session with line items expanded
                Stripe::setApiKey(config('services.stripe.secret'));
                $fullSession = Session::retrieve([
                    'id' => $session->id,
                    'expand' => ['line_items']
                ]);

                DB::transaction(function () use ($fullSession) {
                    $order = Order::create([
                        'stripe_session_id' => $fullSession->id,
                        'customer_email'    => $fullSession->customer_details->email,
                        'customer_name'     => $fullSession->customer_details->name,
                        'total_amount'      => $fullSession->amount_total,
                        'currency'          => $fullSession->currency,
                        'payment_status'    => $fullSession->payment_status,
                        'shipping_status'   => 'pending',
                        'shipping_address'  => json_encode($fullSession->shipping_details),
                        'shipping_amount'   => $fullSession->total_details->amount_shipping ?? 0,
                    ]);

                    foreach ($fullSession->line_items->data as $item) {
                        OrderItem::create([
                            'order_id'     => $order->id,
                            'product_slug' => $item->price->product->metadata->product_slug ?? 'unknown',
                            'product_name' => $item->description,
                            'quantity'     => $item->quantity,
                            'unit_price'   => $item->price->unit_amount,
                        ]);
                    }
                });

                Log::info('Order stored successfully', ['session_id' => $session->id]);
                break;

            default:
                Log::info('Stripe webhook received unhandled event: ' . $event->type);
        }

        return response('OK', 200);
    }
}
