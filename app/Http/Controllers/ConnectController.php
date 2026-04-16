<?php

/**
 * ==========================================================================
 * Stripe Connect Controller
 * ==========================================================================
 *
 * This controller implements a complete Stripe Connect integration:
 *
 *   1. Creating connected accounts (V2 API)
 *   2. Onboarding via Account Links (V2 API)
 *   3. Creating products on connected accounts
 *   4. Displaying a public storefront per connected account
 *   5. Processing Direct Charges with an application fee
 *   6. Handling thin-event webhooks for account requirement changes
 *
 * All Stripe calls use `\Stripe\StripeClient` — never the static
 * `Stripe::setApiKey()`. The connected account header is passed via the
 * second parameter array: `['stripe_account' => $accountId]`.
 *
 * PREREQUISITES:
 *   - stripe/stripe-php >= 20.0.0 (already installed)
 *   - The following environment variables must be set in .env:
 *       STRIPE_SECRET           — Platform secret key (sk_test_… or sk_live_…)
 *       STRIPE_CONNECT_WEBHOOK_SECRET — Webhook signing secret for thin events
 * ==========================================================================
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConnectController extends Controller
{
    // -----------------------------------------------------------------------
    // Helper: build a StripeClient using the platform secret key.
    // Every method calls this instead of using Stripe::setApiKey().
    // -----------------------------------------------------------------------
    private function stripeClient(): \Stripe\StripeClient
    {
        $secret = config('services.stripe.secret');

        // PLACEHOLDER — replace with your real key in .env:
        // STRIPE_SECRET=sk_test
        if (! $secret || $secret === 'sk_test_PLACEHOLDER') {
            abort(500, 'Stripe secret key is not configured. '
                . 'Set STRIPE_SECRET in your .env file. '
                . 'Get your key from https://dashboard.stripe.com/apikeys');
        }

        return new \Stripe\StripeClient(['api_key' => $secret]);
    }

    // =======================================================================
    // 1. DASHBOARD — List connected accounts and their onboarding status
    // =======================================================================

    /**
     * GET /connect/dashboard
     *
     * Shows every connected account that has been created during this session.
     * For each account we call the V2 API to get onboarding/capability status
     * so the UI is always up to date (no database needed for this demo).
     */
    public function dashboard(Request $request)
    {
        $stripeClient = $this->stripeClient();

        // We store account IDs in the session as a simple array.
        // In production you would store these in your database, mapped to users.
        $accountIds = session('connect_accounts', []);

        $accounts = [];
        foreach ($accountIds as $accountId) {
            try {
                // -------------------------------------------------------
                // Retrieve the V2 account with expanded configuration and
                // requirements so we can show onboarding / capability status.
                // -------------------------------------------------------
                $account = $stripeClient->v2->core->accounts->retrieve($accountId, [
                    'include' => ['configuration.merchant', 'requirements'],
                ]);

                // Check if card_payments capability is active
                $cardPaymentsStatus = $account->configuration
                    ->merchant->capabilities->card_payments->status ?? null;
                $readyToProcessPayments = ($cardPaymentsStatus === 'active');

                // Check if onboarding requirements are satisfied
                $requirementsStatus = $account->requirements
                    ->summary->minimum_deadline->status ?? null;
                $onboardingComplete = (
                    $requirementsStatus !== 'currently_due'
                    && $requirementsStatus !== 'past_due'
                );

                $accounts[] = [
                    'id'                     => $accountId,
                    'display_name'           => $account->display_name ?? $accountId,
                    'contact_email'          => $account->contact_email ?? '—',
                    'ready_to_process'       => $readyToProcessPayments,
                    'onboarding_complete'    => $onboardingComplete,
                    'requirements_status'    => $requirementsStatus ?? 'none',
                    'card_payments_status'   => $cardPaymentsStatus ?? 'inactive',
                ];
            } catch (\Exception $e) {
                // If the account can't be retrieved, still show it with an error
                $accounts[] = [
                    'id'                     => $accountId,
                    'display_name'           => $accountId,
                    'contact_email'          => '—',
                    'ready_to_process'       => false,
                    'onboarding_complete'    => false,
                    'requirements_status'    => 'error',
                    'card_payments_status'   => 'error: ' . $e->getMessage(),
                ];
            }
        }

        return view('connect.dashboard', compact('accounts'));
    }

    // =======================================================================
    // 2. CREATE CONNECTED ACCOUNT — V2 API
    // =======================================================================

    /**
     * POST /connect/accounts
     *
     * Creates a new connected account using the V2 accounts API.
     *
     * IMPORTANT:
     *   - Do NOT pass `type` at the top level (no 'express', 'standard', 'custom').
     *   - The V2 API uses `display_name`, `contact_email`, `identity`, `dashboard`,
     *     `defaults`, and `configuration` at the top level instead.
     *   - `fees_collector` and `losses_collector` are both set to 'stripe'
     *     so Stripe handles fees and losses.
     *   - `dashboard: 'full'` gives the connected account access to the full
     *     Stripe Dashboard.
     */
    public function createAccount(Request $request)
    {
        $request->validate([
            'display_name'  => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'country'       => 'required|string|size:2', // ISO 3166-1 alpha-2
        ]);

        $stripeClient = $this->stripeClient();

        try {
            // -----------------------------------------------------------
            // Create a V2 connected account.
            //
            // Key properties:
            //   display_name  — visible name for this seller
            //   contact_email — Stripe sends onboarding/verification emails here
            //   identity.country — determines which regulations apply
            //   dashboard: 'full' — full Stripe Dashboard access
            //   defaults.responsibilities — Stripe collects fees and covers losses
            //   configuration.merchant — enables card_payments capability
            //   configuration.customer — enables customer-facing features
            // -----------------------------------------------------------
            $account = $stripeClient->v2->core->accounts->create([
                'display_name'  => $request->input('display_name'),
                'contact_email' => $request->input('contact_email'),
                'identity' => [
                    'country' => $request->input('country'),
                ],
                'dashboard' => 'full',
                'defaults' => [
                    'responsibilities' => [
                        'fees_collector'   => 'stripe',
                        'losses_collector' => 'stripe',
                    ],
                ],
                'configuration' => [
                    'customer' => (object) [], // empty object enables customer config
                    'merchant' => [
                        'capabilities' => [
                            'card_payments' => [
                                'requested' => true,
                            ],
                        ],
                    ],
                ],
            ]);

            // Store the new account ID in session
            $accountIds   = session('connect_accounts', []);
            $accountIds[] = $account->id;
            session(['connect_accounts' => $accountIds]);

            return redirect()->route('connect.dashboard')
                ->with('connect_flash', "Account {$account->id} created successfully!");

        } catch (\Exception $e) {
            Log::error('Stripe Connect account creation failed: ' . $e->getMessage());
            return redirect()->route('connect.dashboard')
                ->with('connect_error', 'Failed to create account: ' . $e->getMessage());
        }
    }

    // =======================================================================
    // 3. ONBOARD CONNECTED ACCOUNT — Account Links (V2)
    // =======================================================================

    /**
     * POST /connect/accounts/{accountId}/onboard
     *
     * Creates an Account Link using the V2 API and redirects the user to
     * Stripe's hosted onboarding flow. When they finish (or leave early),
     * Stripe redirects them to our return_url or refresh_url.
     */
    public function onboard(string $accountId)
    {
        $stripeClient = $this->stripeClient();

        try {
            // -----------------------------------------------------------
            // Create an Account Link for onboarding.
            //
            // use_case.type = 'account_onboarding' tells Stripe to show
            // the full onboarding flow (identity verification, bank account, etc.)
            //
            // configurations: ['merchant', 'customer'] — onboard for both
            // merchant capabilities and customer-facing features.
            //
            // return_url — where Stripe sends the user after they complete
            //              or leave onboarding.
            // refresh_url — where Stripe sends the user if the link expires
            //               or they need to restart.
            // -----------------------------------------------------------
            $accountLink = $stripeClient->v2->core->accountLinks->create([
                'account' => $accountId,
                'use_case' => [
                    'type' => 'account_onboarding',
                    'account_onboarding' => [
                        'configurations' => ['merchant', 'customer'],
                        'return_url'  => route('connect.onboard.return') . '?accountId=' . $accountId,
                        'refresh_url' => route('connect.onboard.refresh') . '?accountId=' . $accountId,
                    ],
                ],
            ]);

            // Redirect to Stripe's hosted onboarding page
            return redirect($accountLink->url);

        } catch (\Exception $e) {
            Log::error('Stripe Account Link creation failed: ' . $e->getMessage());
            return redirect()->route('connect.dashboard')
                ->with('connect_error', 'Failed to start onboarding: ' . $e->getMessage());
        }
    }

    /**
     * GET /connect/onboard/return
     *
     * The user returns here after completing (or leaving) Stripe onboarding.
     * We redirect to the dashboard which will re-fetch onboarding status.
     */
    public function onboardReturn(Request $request)
    {
        $accountId = $request->query('accountId');
        return redirect()->route('connect.dashboard')
            ->with('connect_flash', "Returned from onboarding for {$accountId}. Status updated below.");
    }

    /**
     * GET /connect/onboard/refresh
     *
     * Stripe sends the user here if their Account Link expired.
     * We create a fresh link and redirect them back.
     */
    public function onboardRefresh(Request $request)
    {
        $accountId = $request->query('accountId');

        if (! $accountId) {
            return redirect()->route('connect.dashboard')
                ->with('connect_error', 'Missing account ID for onboarding refresh.');
        }

        // Create a new link and redirect — reuses the onboard() logic
        return $this->onboard($accountId);
    }

    // =======================================================================
    // 4. CREATE PRODUCT ON CONNECTED ACCOUNT
    // =======================================================================

    /**
     * POST /connect/accounts/{accountId}/products
     *
     * Creates a Stripe Product (with a default price) on the connected account.
     * Uses the `stripe_account` header so the product is created under the
     * seller's account, not the platform.
     */
    public function createProduct(Request $request, string $accountId)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price'       => 'required|numeric|min:0.50',
            'currency'    => 'required|string|size:3',
        ]);

        $stripeClient = $this->stripeClient();

        try {
            // -----------------------------------------------------------
            // Create a product with a default price on the connected account.
            //
            // The second parameter array ['stripe_account' => $accountId]
            // sets the Stripe-Account header, so this product is created
            // on the connected account — not on the platform.
            //
            // default_price_data creates a one-time price in the specified
            // currency. unit_amount is in the smallest currency unit (cents).
            // -----------------------------------------------------------
            $priceInCents = (int) round($request->input('price') * 100);

            $product = $stripeClient->products->create([
                'name'        => $request->input('name'),
                'description' => $request->input('description', ''),
                'default_price_data' => [
                    'unit_amount' => $priceInCents,
                    'currency'    => strtolower($request->input('currency')),
                ],
            ], [
                'stripe_account' => $accountId, // ← Stripe-Account header
            ]);

            return redirect()->route('connect.dashboard')
                ->with('connect_flash', "Product \"{$product->name}\" created on {$accountId}!");

        } catch (\Exception $e) {
            Log::error("Stripe product creation failed on {$accountId}: " . $e->getMessage());
            return redirect()->route('connect.dashboard')
                ->with('connect_error', 'Failed to create product: ' . $e->getMessage());
        }
    }

    // =======================================================================
    // 5. STOREFRONT — Public product listing per connected account
    // =======================================================================

    /**
     * GET /connect/store/{accountId}
     *
     * Displays a public storefront for a connected account.
     * Lists their active products (with prices expanded) so customers can buy.
     *
     * NOTE: In production, use a slug or username in the URL instead of the
     * raw Stripe account ID (acct_XXX). The account ID is used here for
     * simplicity in this demo.
     */
    public function storefront(string $accountId)
    {
        $stripeClient = $this->stripeClient();

        try {
            // -----------------------------------------------------------
            // List active products on the connected account.
            //
            // expand: ['data.default_price'] — includes the Price object
            // inline so we can display the amount without a second API call.
            //
            // The stripe_account header tells Stripe to return products
            // belonging to the connected account, not the platform.
            // -----------------------------------------------------------
            $products = $stripeClient->products->all([
                'limit'  => 20,
                'active' => true,
                'expand' => ['data.default_price'],
            ], [
                'stripe_account' => $accountId, // ← Stripe-Account header
            ]);

            // Get the account name
            $account = $stripeClient->v2->core->accounts->retrieve($accountId);
            $storeName = $account->display_name ?? $accountId;

        } catch (\Exception $e) {
            Log::error("Stripe storefront fetch failed for {$accountId}: " . $e->getMessage());
            abort(404, 'Store not found or account invalid.');
        }

        return view('connect.storefront', [
            'products'  => $products->data,
            'accountId' => $accountId,
            'storeName' => $storeName,
        ]);
    }

    // =======================================================================
    // 6. BUY — Direct Charge with application fee
    // =======================================================================

    /**
     * POST /connect/store/{accountId}/buy
     *
     * Creates a Stripe Checkout Session as a Direct Charge on the connected
     * account. The platform earns revenue via `application_fee_amount`.
     *
     * This uses hosted checkout for simplicity — the customer is redirected
     * to Stripe's payment page and back to our success URL.
     */
    public function buy(Request $request, string $accountId)
    {
        $request->validate([
            'price_id'   => 'required|string',
            'product_name' => 'required|string',
            'unit_amount' => 'required|integer|min:1',
            'currency'   => 'required|string|size:3',
        ]);

        $stripeClient = $this->stripeClient();

        try {
            // -----------------------------------------------------------
            // Calculate the application fee.
            //
            // In this demo we take a 10% platform fee. Adjust this to
            // match your business model. The fee is in the smallest
            // currency unit (e.g. cents for USD/NZD).
            // -----------------------------------------------------------
            $unitAmount     = (int) $request->input('unit_amount');
            $applicationFee = (int) round($unitAmount * 0.10); // 10% fee

            // -----------------------------------------------------------
            // Create a Checkout Session as a Direct Charge.
            //
            // Key points:
            //   - `stripe_account` in the second param = Direct Charge.
            //     The payment is processed on the connected account.
            //   - `application_fee_amount` in `payment_intent_data` is the
            //     platform's cut, automatically transferred to your platform.
            //   - `price_data` creates an ad-hoc price for this session.
            //   - `success_url` uses {CHECKOUT_SESSION_ID} placeholder which
            //     Stripe replaces with the real session ID.
            // -----------------------------------------------------------
            $session = $stripeClient->checkout->sessions->create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency'     => strtolower($request->input('currency')),
                            'product_data' => [
                                'name' => $request->input('product_name'),
                            ],
                            'unit_amount'  => $unitAmount,
                        ],
                        'quantity' => 1,
                    ],
                ],
                'payment_intent_data' => [
                    // Application fee — this is the platform's revenue
                    'application_fee_amount' => $applicationFee,
                ],
                'mode'        => 'payment',
                'success_url' => route('connect.success') . '?session_id={CHECKOUT_SESSION_ID}&account=' . $accountId,
                'cancel_url'  => route('connect.storefront', ['accountId' => $accountId]),
            ], [
                'stripe_account' => $accountId, // ← Direct Charge header
            ]);

            return redirect($session->url, 303);

        } catch (\Exception $e) {
            Log::error("Stripe checkout failed on {$accountId}: " . $e->getMessage());
            return redirect()->route('connect.storefront', ['accountId' => $accountId])
                ->with('connect_error', 'Failed to start checkout: ' . $e->getMessage());
        }
    }

    /**
     * GET /connect/success
     *
     * Post-purchase success page. Shows the Checkout Session ID for reference.
     */
    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        $accountId = $request->query('account');

        return view('connect.success', compact('sessionId', 'accountId'));
    }

    // =======================================================================
    // 7. WEBHOOK — Thin events for V2 account requirement changes
    // =======================================================================

    /**
     * POST /connect/webhook
     *
     * Receives thin events from Stripe for connected account changes.
     * This route is CSRF-exempt (configured in bootstrap/app.php).
     *
     * Thin events are lightweight — they contain the event ID and type,
     * but not the full event data. Use parseThinEvent() to verify the
     * signature, then retrieve the full event to inspect the data.
     *
     * To test locally, use the Stripe CLI:
     *   stripe listen --thin-events \
     *     'v2.core.account[requirements].updated,v2.core.account[configuration.merchant].capability_status_updated,v2.core.account[configuration.customer].capability_status_updated' \
     *     --forward-thin-to http://localhost:8000/connect/webhook
     *
     * To set up in the Stripe Dashboard:
     *   1. Go to Developers → Webhooks → + Add destination
     *   2. Events from: Connected accounts
     *   3. Show advanced options → Payload style: Thin
     *   4. Select these event types:
     *        - v2.core.account[requirements].updated
     *        - v2.core.account[configuration.merchant].capability_status_updated
     *        - v2.core.account[configuration.customer].capability_status_updated
     */
    public function webhook(Request $request)
    {
        $stripeClient = $this->stripeClient();

        // PLACEHOLDER — replace with your real webhook secret in .env:
        // STRIPE_CONNECT_WEBHOOK_SECRET=whsec_XXXXXXXXXXXXXXXXXXXXXXXX
        $webhookSecret = config('services.stripe.connect_webhook_secret');

        if (! $webhookSecret) {
            Log::warning('Stripe Connect webhook secret is not configured. '
                . 'Set STRIPE_CONNECT_WEBHOOK_SECRET in your .env file.');
            return response('Webhook secret not configured', 500);
        }

        $payload   = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');

        try {
            // -----------------------------------------------------------
            // Step 1: Parse the thin event.
            //
            // parseThinEvent() verifies the webhook signature using the
            // signing secret, then returns a lightweight event object
            // containing the event ID and type (but not the full data).
            // -----------------------------------------------------------
            $thinEvent = $stripeClient->parseThinEvent($payload, $sigHeader, $webhookSecret);

            Log::info('Stripe Connect thin event received', [
                'event_id' => $thinEvent->id,
                'type'     => $thinEvent->type,
            ]);

            // -----------------------------------------------------------
            // Step 2: Fetch the full event to get the detailed data.
            //
            // The thin event only has the ID and type. Call
            // v2.core.events.retrieve() to get the complete event payload.
            // -----------------------------------------------------------
            $event = $stripeClient->v2->core->events->retrieve($thinEvent->id);

            // -----------------------------------------------------------
            // Step 3: Handle each event type.
            //
            // v2.core.account[requirements].updated
            //   → Requirements changed (e.g. new document needed).
            //     Re-check the account and prompt for onboarding if needed.
            //
            // v2.core.account[configuration.merchant].capability_status_updated
            //   → A merchant capability status changed (e.g. card_payments
            //     went from 'pending' to 'active' or 'restricted').
            //
            // v2.core.account[configuration.customer].capability_status_updated
            //   → A customer configuration capability changed.
            // -----------------------------------------------------------
            switch ($thinEvent->type) {
                case 'v2.core.account[requirements].updated':
                    // The account's requirements have changed.
                    // In production, you would:
                    //   1. Look up the user in your DB by account ID
                    //   2. Notify them to complete updated onboarding
                    //   3. Create a new Account Link if needed
                    Log::info('Account requirements updated', [
                        'event_id'   => $thinEvent->id,
                        'account'    => $event->related_object->id ?? 'unknown',
                    ]);
                    break;

                case 'v2.core.account[configuration.merchant].capability_status_updated':
                    // A merchant capability changed status.
                    // Check if card_payments is now active or restricted.
                    Log::info('Merchant capability status changed', [
                        'event_id'   => $thinEvent->id,
                        'account'    => $event->related_object->id ?? 'unknown',
                    ]);
                    break;

                case 'v2.core.account[configuration.customer].capability_status_updated':
                    // A customer configuration capability changed status.
                    Log::info('Customer capability status changed', [
                        'event_id'   => $thinEvent->id,
                        'account'    => $event->related_object->id ?? 'unknown',
                    ]);
                    break;

                default:
                    Log::info('Unhandled Connect thin event type: ' . $thinEvent->type);
            }

            return response('OK', 200);

        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            Log::warning('Stripe Connect webhook signature verification failed: ' . $e->getMessage());
            return response('Invalid signature', 400);
        } catch (\Exception $e) {
            Log::error('Stripe Connect webhook error: ' . $e->getMessage());
            return response('Webhook error: ' . $e->getMessage(), 400);
        }
    }
}
