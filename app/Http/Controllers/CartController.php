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

        foreach ($cart as $slug => $row) {
            if (! isset($products[$slug])) continue;

            $product   = $products[$slug];
            $qty       = max(1, (int) $row['quantity']);
            $lineTotal = $product['price_cents'] * $qty;
            $subtotal += $lineTotal;

            $imgMap = [
                'omanawa-falls' => '/images/Omanawa-falls-creamed-honey.jpg',
                'mamaku'        => '/images/mamaku-creamed-honey.jpg',
                'otumoetai'     => '/images/otumoetai-summer-harvest-creamed-honey.jpg',
                'rewarewa'      => '/images/rewarewa-honey.jpg',
            ];

            $items[] = [
                'slug'       => $slug,
                'name'       => $product['name'],
                'price'      => $product['price'],
                'price_cents'=> $product['price_cents'],
                'weight'     => $product['weight'],
                'image'      => $imgMap[$product['image']] ?? '',
                'quantity'   => $qty,
                'line_total' => $lineTotal,
            ];
        }

        return view('cart', compact('items', 'subtotal'));
    }

    // -----------------------------------------------------------------------
    // Add item (or increment) — POST /cart/add/{slug}?quantity=N
    // -----------------------------------------------------------------------
    public function add(Request $request, string $slug)
    {
        $products = config('products');
        if (! isset($products[$slug])) abort(404);

        $qty  = max(1, (int) $request->input('quantity', 1));
        $cart = session('cart', []);

        $cart[$slug]['quantity'] = ($cart[$slug]['quantity'] ?? 0) + $qty;
        session(['cart' => $cart]);

        return redirect()->back()->with('cart_flash', 'Added to cart!');
    }

    // -----------------------------------------------------------------------
    // Update quantity — POST /cart/update/{slug}
    // -----------------------------------------------------------------------
    public function update(Request $request, string $slug)
    {
        $qty  = (int) $request->input('quantity', 1);
        $cart = session('cart', []);

        if ($qty <= 0) {
            unset($cart[$slug]);
        } else {
            $cart[$slug]['quantity'] = $qty;
        }

        session(['cart' => $cart]);
        return redirect()->route('cart.show');
    }

    // -----------------------------------------------------------------------
    // Remove item — POST /cart/remove/{slug}
    // -----------------------------------------------------------------------
    public function remove(string $slug)
    {
        $cart = session('cart', []);
        unset($cart[$slug]);
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

        Stripe::setApiKey(config('services.stripe.secret'));

        $imgMap = [
            'omanawa-falls' => '/images/Omanawa-falls-creamed-honey.jpg',
            'mamaku'        => '/images/mamaku-creamed-honey.jpg',
            'otumoetai'     => '/images/otumoetai-summer-harvest-creamed-honey.jpg',
            'rewarewa'      => '/images/rewarewa-honey.jpg',
        ];

        $lineItems = [];

        foreach ($cart as $slug => $row) {
            if (! isset($products[$slug])) continue;
            $product = $products[$slug];
            $qty     = max(1, (int) $row['quantity']);

            $lineItems[] = [
                'price_data' => [
                    'currency'     => 'nzd',
                    'product_data' => [
                        'name'        => $product['name'],
                        'description' => $product['weight'],
                        'images'      => [url($imgMap[$product['image']] ?? '')],
                    ],
                    'unit_amount'  => $product['price_cents'],
                ],
                'quantity' => $qty,
            ];
        }

        // Calculate total amount for the application fee (10% platform cut)
        $totalAmount = 0;
        foreach ($lineItems as $item) {
            $totalAmount += $item['price_data']['unit_amount'] * $item['quantity'];
        }

        // ---------------------------------------------------------------
        // Direct Charge via Connected Account:
        //   - Payment is created DIRECTLY on the connected account
        //   - application_fee_amount is the platform's 10% cut
        //   - The connected account receives the remaining 90%
        //   - Requires passing the connected account ID as a Stripe-Account header
        //   - This works with Express accounts that have card_payments capability
        // ---------------------------------------------------------------
        $connectAccountId = config('services.stripe.client_account_id');

        $sessionParams = [
            'payment_method_types'        => ['card'],
            'line_items'                  => $lineItems,
            'mode'                        => 'payment',
            'shipping_address_collection' => ['allowed_countries' => ['NZ']],
            'shipping_options'            => [
                [
                    'shipping_rate_data' => [
                        'type'         => 'fixed_amount',
                        'fixed_amount' => ['amount' => 0, 'currency' => 'nzd'],
                        'display_name' => 'Free NZ Shipping (orders $75+)',
                    ],
                ],
                [
                    'shipping_rate_data' => [
                        'type'         => 'fixed_amount',
                        'fixed_amount' => ['amount' => 750, 'currency' => 'nzd'],
                        'display_name' => 'Standard NZ Shipping',
                    ],
                ],
            ],
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => route('cart.show'),
        ];

        // Only add Connect fee split if a connected account is configured
        if ($connectAccountId && $connectAccountId !== 'acct_REPLACE_WITH_YOUR_CLIENT_ACCOUNT_ID') {
            // Add 10% platform fee to the payment intent
            $sessionParams['payment_intent_data'] = [
                'application_fee_amount' => (int) round($totalAmount * 0.10), // 10% platform fee
            ];

            // Direct Charge: create the session ON the connected account
            // by passing stripeAccount as a request option (Stripe-Account header)
            $session = Session::create($sessionParams, [
                'stripe_account' => $connectAccountId,
            ]);
        } else {
            // No connected account configured — charge platform account directly
            $session = Session::create($sessionParams);
        }

        // Clear cart after redirect to Stripe
        session()->forget('cart');

        return redirect($session->url, 303);
    }
}