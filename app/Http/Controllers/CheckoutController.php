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
     * Show the custom checkout page.
     */
    public function index()
    {
        $cart = session('cart', []);
        $products = config('products');
        $items = [];
        $subtotal = 0;

        foreach ($cart as $key => $row) {
            [$slug, $weight] = explode(':', $key . ':');
            if (!isset($products[$slug]))
                continue;

            $product = $products[$slug];
            $option = $product['options'][$weight] ?? $product['options'][$product['default_option']] ?? null;
            if (!$option)
                continue;

            $qty = max(1, (int) $row['quantity']);
            $lineTotal = $option['price_cents'] * $qty;
            $subtotal += $lineTotal;

            $items[] = [
                'name' => $product['name'],
                'weight' => $option['weight'],
                'quantity' => $qty,
                'price' => $option['price'],
                'total' => number_format($lineTotal / 100, 2),
            ];
        }

        if (empty($items)) {
            return redirect()->route('cart.show');
        }

        return view('checkout', compact('items', 'subtotal'));
    }

    /**
     * Prepare Stripe session with custom shipping from NZ Post.
     */
    public function prepare(Request $request)
    {
        $request->validate([
            'address_id' => 'required|string',
            'shipping_type' => 'required|string',
            'shipping_amount' => 'required|numeric',
        ]);

        $cart = session('cart', []);
        $products = config('products');
        $lineItems = [];
        $totalAmount = 0;

        $imgMap = [
            'omanawa-falls' => '/images/Omanawa-falls-creamed-honey.jpg',
            'mamaku' => '/images/mamaku-creamed-honey.jpg',
            'otumoetai' => '/images/otumoetai-summer-harvest-creamed-honey.jpg',
            'rewarewa' => '/images/rewarewa-honey.jpg',
        ];

        foreach ($cart as $key => $row) {
            [$slug, $weight] = explode(':', $key . ':');
            if (!isset($products[$slug]))
                continue;

            $product = $products[$slug];
            $option = $product['options'][$weight] ?? null;
            if (!$option)
                continue;

            $qty = (int) $row['quantity'];
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'nzd',
                    'product_data' => [
                        'name' => $product['name'] . ' (' . $option['weight'] . ')',
                        'images' => [url($imgMap[$product['image']] ?? '')],
                        'metadata' => [
                            'sku' => $option['sku'],
                            'product_slug' => $slug,
                        ],
                    ],
                    'unit_amount' => $option['price_cents'],
                ],
                'quantity' => $qty,
            ];
            $totalAmount += $option['price_cents'] * $qty;
        }

        // Add Shipping as a line item
        $lineItems[] = [
            'price_data' => [
                'currency' => 'nzd',
                'product_data' => [
                    'name' => 'Shipping (' . ucfirst($request->shipping_type) . ')',
                    'description' => 'NZ Post Delivery',
                    'metadata' => ['shipping' => 'true'],
                ],
                'unit_amount' => (int) ($request->shipping_amount * 100),
            ],
            'quantity' => 1,
        ];

        $stripe = $this->stripeClient();
        $connectAccountId = $this->connectedAccountId();

        $sessionParams = [
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout'),
            'metadata' => [
                'address_id' => $request->address_id,
            ],
        ];

        if ($connectAccountId) {
            $sessionParams['payment_intent_data'] = [
                'application_fee_amount' => (int) round($totalAmount * 0.10),
            ];
            $session = $stripe->checkout->sessions->create($sessionParams, ['stripe_account' => $connectAccountId]);
        } else {
            $session = $stripe->checkout->sessions->create($sessionParams);
        }

        return response()->json(['url' => $session->url]);
    }

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
        $product = $products[$slug] ?? null;

        if (!$product) {
            abort(404);
        }

        $optionWeight = $request->input('option', $product['default_option']);
        $option = $product['options'][$optionWeight] ?? $product['options'][$product['default_option']] ?? null;

        if (!$option) {
            abort(404);
        }

        $stripe = $this->stripeClient();
        $connectAccountId = $this->connectedAccountId();

        $imageMap = [
            'omanawa-falls' => '/images/Omanawa-falls-creamed-honey.jpg',
            'mamaku' => '/images/mamaku-creamed-honey.jpg',
            'otumoetai' => '/images/otumoetai-summer-harvest-creamed-honey.jpg',
            'rewarewa' => '/images/rewarewa-honey.jpg',
        ];

        $imageUrl = url($imageMap[$product['image']] ?? '');

        // Define shipping options based on product price
        $shippingOptions = [];
        if ($option['price_cents'] >= 7500) {
            $shippingOptions[] = [
                'shipping_rate_data' => [
                    'type' => 'fixed_amount',
                    'fixed_amount' => [
                        'amount' => 0,
                        'currency' => 'nzd',
                    ],
                    'display_name' => 'Free NZ Shipping (orders $75+)',
                ],
            ];
        }
        $shippingOptions[] = [
            'shipping_rate_data' => [
                'type' => 'fixed_amount',
                'fixed_amount' => [
                    'amount' => 1199,
                    'currency' => 'nzd',
                ],
                'display_name' => 'Standard NZ Shipping',
            ],
        ];

        $sessionParams = [
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'nzd',
                        'product_data' => [
                            'name' => $product['name'] . ' (' . $option['weight'] . ')',
                            'description' => $option['weight'],
                            'images' => [$imageUrl],
                            'metadata' => [
                                'sku' => $option['sku'],
                                'product_slug' => $slug,
                            ],
                        ],
                        'unit_amount' => $option['price_cents'],
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'shipping_address_collection' => [
                'allowed_countries' => ['NZ'],
            ],
            'shipping_options' => $shippingOptions,
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel', ['slug' => $slug]),
            'metadata' => [
                'product_slug' => $slug,
                'product_name' => $product['name'],
                'option' => $option['weight'],
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
        $session = null;

        if ($sessionId && config('services.stripe.secret')) {
            try {
                $stripe = $this->stripeClient();
                $connectAccountId = $this->connectedAccountId();
                $options = $connectAccountId ? ['stripe_account' => $connectAccountId] : [];
                $session = $stripe->checkout->sessions->retrieve($sessionId, [], $options);
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
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $secret = config('services.stripe.webhook_secret');

        if (!$secret) {
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
                $stripe = $this->stripeClient();
                $connectAccountId = $this->connectedAccountId();
                $options = $connectAccountId ? ['stripe_account' => $connectAccountId] : [];
                $fullSession = $stripe->checkout->sessions->retrieve(
                    $session->id,
                    ['expand' => ['line_items.data.price.product', 'payment_intent']],
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

                    $shippingAmountFromLineItems = 0;
                    $lineItemsProcessed = [];

                    foreach ($fullSession->line_items->data as $item) {
                        $isShipping = isset($item->price->product->metadata->shipping) && $item->price->product->metadata->shipping === 'true';

                        if ($isShipping) {
                            $shippingAmountFromLineItems += $item->amount_total;
                            continue;
                        }

                        $lineItemsProcessed[] = $item;
                    }

                    $order = Order::create([
                        'stripe_session_id' => $fullSession->id,
                        'customer_email' => $fullSession->customer_details->email,
                        'customer_phone' => $fullSession->customer_details->phone ?? null,
                        'customer_name' => $fullSession->customer_details->name,
                        'total_amount' => $fullSession->amount_total,
                        'currency' => $fullSession->currency,
                        'payment_status' => $fullSession->payment_status,
                        'shipping_status' => 'pending',
                        'shipping_address' => $shippingAddress ? json_encode($shippingAddress) : null,
                        'shipping_amount' => $shippingAmountFromLineItems > 0 ? $shippingAmountFromLineItems : ($fullSession->total_details->amount_shipping ?? 0),
                    ]);

                    foreach ($lineItemsProcessed as $item) {
                        OrderItem::create([
                            'order_id' => $order->id,
                            'product_slug' => $item->price->product->metadata->product_slug ?? 'unknown',
                            'sku' => $item->price->product->metadata->sku ?? null,
                            'product_name' => $item->description,
                            'quantity' => $item->quantity,
                            'unit_price' => $item->price->unit_amount,
                        ]);
                    }
                });

                // Send the order confirmation and review request emails
                try {
                    $order = Order::where('stripe_session_id', $fullSession->id)->first();
                    if ($order) {
                        $order->load('items');

                        // 1. Send Order Confirmation Email
                        \Illuminate\Support\Facades\Mail::to($order->customer_email)->send(new \App\Mail\OrderConfirmationMail($order));
                        Log::info('Immediate order confirmation email sent', ['order_id' => $order->id]);

                        // 2. Send Review Request Email (immediately for testing)
                        \Illuminate\Support\Facades\Mail::to($order->customer_email)->send(new \App\Mail\ReviewRequestMail($order));
                        $order->review_requested_at = now();
                        $order->save();
                        Log::info('Immediate test review request sent', ['order_id' => $order->id]);
                    } else {
                        Log::warning('Order not found for immediate email dispatch', ['session_id' => $fullSession->id]);
                    }
                } catch (\Exception $e) {
                    Log::error("Failed to send immediate emails in webhook: " . $e->getMessage(), [
                        'exception' => $e
                    ]);
                }

                Log::info('Order stored successfully', ['session_id' => $session->id]);
                break;

            default:
                Log::info('Stripe webhook received unhandled event: ' . $event->type);
        }

        return response('OK', 200);
    }
}