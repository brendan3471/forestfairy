<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class CartController extends Controller
{
    // -----------------------------------------------------------------------
    // Show cart page
    // -----------------------------------------------------------------------
    public function show()
    {
        $cart     = session('cart', []);
        $products = config('products');
        $items    = [];
        $subtotal = 0;

        foreach ($cart as $key => $row) {
            // Key format: "product-slug:weight"
            [$slug, $weight] = explode(':', $key . ':');
            
            if (! isset($products[$slug])) continue;

            $product = $products[$slug];
            $option  = $product['options'][$weight] ?? $product['options'][$product['default_option']] ?? null;

            if (!$option) continue;

            $qty       = max(1, (int) $row['quantity']);
            $lineTotal = $option['price_cents'] * $qty;
            $subtotal += $lineTotal;

            $imgMap = [
                'omanawa-falls' => '/images/Omanawa-falls-creamed-honey.jpg',
                'mamaku'        => '/images/mamaku-creamed-honey.jpg',
                'otumoetai'     => '/images/otumoetai-summer-harvest-creamed-honey.jpg',
                'rewarewa'      => '/images/rewarewa-honey.jpg',
            ];

            $items[] = [
                'key'        => $key,
                'slug'       => $slug,
                'name'       => $product['name'],
                'price'      => $option['price'],
                'price_cents'=> $option['price_cents'],
                'weight'     => $option['weight'],
                'image'      => $imgMap[$product['image']] ?? '',
                'quantity'   => $qty,
                'line_total' => $lineTotal,
            ];
        }

        return view('cart', compact('items', 'subtotal'));
    }

    // -----------------------------------------------------------------------
    // Add item (or increment) — POST /cart/add/{slug}?quantity=N&option=950g
    // -----------------------------------------------------------------------
    public function add(Request $request, string $slug)
    {
        $products = config('products');
        if (! isset($products[$slug])) abort(404);

        $product = $products[$slug];
        $option  = $request->input('option', $product['default_option']);
        
        if (! isset($product['options'][$option])) {
            $option = $product['default_option'];
        }

        $key  = "$slug:$option";
        $qty  = max(1, (int) $request->input('quantity', 1));
        $cart = session('cart', []);

        $cart[$key]['quantity'] = ($cart[$key]['quantity'] ?? 0) + $qty;
        session(['cart' => $cart]);

        return redirect()->back()->with('cart_flash', 'Added to cart!');
    }

    // -----------------------------------------------------------------------
    // Update quantity — POST /cart/update/{key}
    // -----------------------------------------------------------------------
    public function update(Request $request, string $key)
    {
        $qty  = (int) $request->input('quantity', 1);
        $cart = session('cart', []);

        if ($qty <= 0) {
            unset($cart[$key]);
        } else {
            $cart[$key]['quantity'] = $qty;
        }

        session(['cart' => $cart]);
        return redirect()->route('cart.show');
    }

    // -----------------------------------------------------------------------
    // Remove item — POST /cart/remove/{key}
    // -----------------------------------------------------------------------
    public function remove(string $key)
    {
        $cart = session('cart', []);
        unset($cart[$key]);
        session(['cart' => $cart]);

        return redirect()->route('cart.show');
    }

    // -----------------------------------------------------------------------
    // Checkout — POST /cart/checkout
    // Creates a Stripe Checkout Session with all cart items as line_items
    // -----------------------------------------------------------------------
    public function checkout()
    {
        $cart     = session('cart', []);
        $products = config('products');

        if (empty($cart)) {
            return redirect()->route('cart.show')->with('cart_error', 'Your cart is empty.');
        }

        $imgMap = [
            'omanawa-falls' => '/images/Omanawa-falls-creamed-honey.jpg',
            'mamaku'        => '/images/mamaku-creamed-honey.jpg',
            'otumoetai'     => '/images/otumoetai-summer-harvest-creamed-honey.jpg',
            'rewarewa'      => '/images/rewarewa-honey.jpg',
        ];

        $lineItems   = [];
        $totalAmount = 0;

        foreach ($cart as $key => $row) {
            [$slug, $weight] = explode(':', $key . ':');
            if (! isset($products[$slug])) continue;

            $product = $products[$slug];
            $option  = $product['options'][$weight] ?? $product['options'][$product['default_option']] ?? null;

            if (!$option) continue;

            $qty = max(1, (int) $row['quantity']);

            $lineItems[] = [
                'price_data' => [
                    'currency'     => 'nzd',
                    'product_data' => [
                        'name'        => $product['name'] . ' (' . $option['weight'] . ')',
                        'description' => $option['weight'],
                        'images'      => [url($imgMap[$product['image']] ?? '')],
                        'metadata'    => [
                            'sku'          => $option['sku'],
                            'product_slug' => $slug,
                        ],
                    ],
                    'unit_amount'  => $option['price_cents'],
                ],
                'quantity' => $qty,
            ];

            $totalAmount += $option['price_cents'] * $qty;
        }

        $connectAccountId = config('services.stripe.client_account_id');
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

        $shippingOptions = [];
        if ($totalAmount >= 7500) {
            $shippingOptions[] = [
                'shipping_rate_data' => [
                    'type'         => 'fixed_amount',
                    'fixed_amount' => ['amount' => 0, 'currency' => 'nzd'],
                    'display_name' => 'Free NZ Shipping (orders $75+)',
                ],
            ];
        }
        $shippingOptions[] = [
            'shipping_rate_data' => [
                'type'         => 'fixed_amount',
                'fixed_amount' => ['amount' => 750, 'currency' => 'nzd'],
                'display_name' => 'Standard NZ Shipping',
            ],
        ];

        $sessionParams = [
            'payment_method_types'        => ['card'],
            'line_items'                  => $lineItems,
            'mode'                        => 'payment',
            'shipping_address_collection' => ['allowed_countries' => ['NZ']],
            'shipping_options'            => $shippingOptions,
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => route('cart.show'),
        ];

        if ($connectAccountId && $connectAccountId !== 'acct_REPLACE_WITH_YOUR_CLIENT_ACCOUNT_ID') {
            $sessionParams['payment_intent_data'] = [
                'application_fee_amount' => (int) round($totalAmount * 0.10),
            ];

            $session = $stripe->checkout->sessions->create(
                $sessionParams,
                ['stripe_account' => $connectAccountId]
            );
        } else {
            $session = $stripe->checkout->sessions->create($sessionParams);
        }

        session()->forget('cart');

        return redirect($session->url, 303);
    }
}