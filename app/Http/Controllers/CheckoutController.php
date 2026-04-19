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
     * Returns the connected account ID if configured, or null.
     */
    private function connectedAccountId(): ?string
    {
        $id = config('services.stripe.client_account_id');
        return ($id && $id !== 'acct_REPLACE_WITH_YOUR_CLIENT_ACCOUNT_ID') ? $id : null;
    }

    /**
     * Returns a StripeClient instance.
     */
    private function stripeClient(): \Stripe\StripeClient
    {
        return new \Stripe\StripeClient(config('services.stripe.secret'));
    }

    /**
     * Create a Stripe Checkout Session for the given product slug
     * and redirect the customer to Stripe's hosted checkout page.
     */
    public function createSession(Request $request, string $slug)
    {
        $products = config('products');
        $product  = $products[$slug] ?? null;

        if (! $product) {
            abort(404);
        }

        $optionWeight = $request->input('option', $product['default_option']);
        $option       = $product['options'][$optionWeight] ?? $product['options'][$product['default_option']] ?? null;

        if (!$option) {
            abort(404);
        }

        $stripe           = $this->stripeClient();
        $connectAccountId = $this->connectedAccountId();

        $imageMap = [
            'omanawa-falls' => '/images/Omanawa-falls-creamed-honey.jpg',
            'mamaku'        => '/images/mamaku-creamed-honey.jpg',
            'otumoetai'     => '/images/otumoetai-summer-harvest-creamed-honey.jpg',
            'rewarewa'      => '/images/rewarewa-honey.jpg',
        ];

        $imageUrl = url($imageMap[$product['image']] ?? '');

        // Define shipping options based on product price
        $shippingOptions = [];
        if ($option['price_cents'] >= 7500) {
            $shippingOptions[] = [
                'shipping_rate_data' => [
                    'type'         => 'fixed_amount',
                    'fixed_amount' => [
                        'amount'   => 0,
                        'currency' => 'nzd',
                    ],
                    'display_name' => 'Free NZ Shipping (orders $75+)',
                ],
            ];
        }
        $shippingOptions[] = [
            'shipping_rate_data' => [
                'type'         => 'fixed_amount',
                'fixed_amount' => [
                    'amount'   => 750,
                    'currency' => 'nzd',
                ],
                'display_name' => 'Standard NZ Shipping',
            ],
        ];

        $sessionParams = [
            'payment_method_types' => ['card'],
            'line_items'           => [
                [
                    'price_data' => [
                        'currency'     => 'nzd',
                        'product_data' => [
                            'name'        => $product['name'] . ' (' . $option['weight'] . ')',
                            'description' => $option['weight'],
                            'images'      => [$imageUrl],
                            'metadata'    => [
                                'sku'          => $option['sku'],
                                'product_slug' => $slug,
                            ],
                        ],
                        'unit_amount'  => $option['price_cents'],
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode'                 => 'payment',
            'shipping_address_collection' => [
                'allowed_countries' => ['NZ'],
            ],
            'shipping_options'     => $shippingOptions,
            'success_url'          => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'           => route('checkout.cancel', ['slug' => $slug]),
            'metadata'             => [
                'product_slug' => $slug,
                'product_name' => $product['name'],
                'option'       => $option['weight'],
            ],
        ];

        // Direct Charge: create session ON the connected account with 10% platform fee
        if ($connectAccountId) {
            $sessionParams['payment_intent_data'] = [
                'application_fee_amount' => (int) round($option['price_cents'] * 0.10),
            ];
            $session = $stripe->checkout->sessions->create(
                $sessionParams,
                ['stripe_account' => $connectAccountId]
            );
        } else {
            $session = $stripe->checkout->sessions->create($sessionParams);
        }

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
                $stripe           = $this->stripeClient();
                $connectAccountId = $this->connectedAccountId();
                $options          = $connectAccountId ? ['stripe_account' => $connectAccountId] : [];
                $session          = $stripe->checkout->sessions->retrieve($sessionId, [], $options);
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
                $stripe           = $this->stripeClient();
                $connectAccountId = $this->connectedAccountId();
                $options          = $connectAccountId ? ['stripe_account' => $connectAccountId] : [];
                $fullSession      = $stripe->checkout->sessions->retrieve(
                    $session->id,
                    ['expand' => ['line_items', 'payment_intent']],
                    $options
                );

                Log::info('Stripe Session retrieved', ['session' => $fullSession->toArray()]);
                file_put_contents('/tmp/stripe_debug.log', json_encode($fullSession->toArray(), JSON_PRETTY_PRINT) . "\n", FILE_APPEND);

                DB::transaction(function () use ($fullSession) {
                    $shippingAddress = $fullSession->shipping_details;
                    
                    // Fallback to payment_intent->shipping if shipping_details is empty
                    // This is common in some Stripe Connect configurations
                    if (!$shippingAddress && isset($fullSession->payment_intent->shipping)) {
                        $shippingAddress = $fullSession->payment_intent->shipping;
                        Log::info('Falling back to shipping details from Payment Intent');
                    }

                    if (!$shippingAddress) {
                        Log::warning('No shipping details found in Stripe session or Payment Intent', ['session_id' => $fullSession->id]);
                    }

                    $order = Order::create([
                        'stripe_session_id' => $fullSession->id,
                        'customer_email'    => $fullSession->customer_details->email,
                        'customer_name'     => $fullSession->customer_details->name,
                        'total_amount'      => $fullSession->amount_total,
                        'currency'          => $fullSession->currency,
                        'payment_status'    => $fullSession->payment_status,
                        'shipping_status'   => 'pending',
                        'shipping_address'  => $shippingAddress ? json_encode($shippingAddress) : null,
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