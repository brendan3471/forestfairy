{{--
    =========================================================================
    Connect Dashboard
    =========================================================================

    This page lets platform admins:
      1. Create a new connected account (V2 API)
      2. See onboarding status for each account
      3. Trigger onboarding via Account Links
      4. Create products on a connected account
      5. Visit the connected account's storefront

    In production, this would be behind authentication.
    =========================================================================
--}}

@extends('layouts.app')

@section('title', 'Stripe Connect Dashboard | Forest Fairy Honey')
@section('meta_description', 'Manage your Stripe Connect connected accounts.')

@section('content')
<div class="breadcrumb-bar">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span>
            <span aria-current="page">Connect Dashboard</span>
        </nav>
    </div>
</div>

<section class="section-padding" style="min-height: 70vh;">
    <div class="container">
        <h1 style="font-size: clamp(1.8rem, 4vw, 2.4rem); color: var(--dark); margin-bottom: 8px;">
            Stripe Connect Dashboard
        </h1>
        <p style="color: var(--text-muted); margin-bottom: 40px;">
            Manage connected accounts, onboarding, and products.
        </p>

        {{-- Flash messages --}}
        @if(session('connect_flash'))
        <div style="background: #f0fdf4; color: #166534; border: 1px solid #86efac; border-radius: 8px; padding: 14px 20px; margin-bottom: 24px; font-size: 0.95rem;" role="alert">
            <i class="fa-solid fa-circle-check" aria-hidden="true"></i> {{ session('connect_flash') }}
        </div>
        @endif
        @if(session('connect_error'))
        <div style="background: #fef2f2; color: #c0392b; border: 1px solid #fca5a5; border-radius: 8px; padding: 14px 20px; margin-bottom: 24px; font-size: 0.95rem;" role="alert">
            <i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i> {{ session('connect_error') }}
        </div>
        @endif

        {{-- ============================================================= --}}
        {{-- CREATE ACCOUNT FORM                                            --}}
        {{-- ============================================================= --}}
        <div style="background: var(--white); border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,.06); padding: 32px; margin-bottom: 40px;">
            <h2 style="font-size: 1.3rem; color: var(--dark); margin-bottom: 20px;">
                <i class="fa-solid fa-user-plus" aria-hidden="true" style="color: var(--gold);"></i>
                Create Connected Account
            </h2>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 20px;">
                Create a new seller account using the Stripe V2 Accounts API. The account will need to complete onboarding before they can process payments.
            </p>

            <form action="{{ route('connect.createAccount') }}" method="POST" id="createAccountForm">
                @csrf
                <div style="display: grid; grid-template-columns: 1fr 1fr 120px; gap: 16px; margin-bottom: 20px;">

                    {{-- Display Name --}}
                    <div>
                        <label for="display_name" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--text-muted); margin-bottom: 6px;">
                            Display Name <span style="color: #c0392b;">*</span>
                        </label>
                        <input type="text" id="display_name" name="display_name" required
                               placeholder="e.g. Jane's Honey Farm"
                               style="width: 100%; padding: 10px 14px; border: 1px solid var(--cream-2); border-radius: 8px; font-size: 0.95rem; color: var(--dark); background: var(--white);">
                    </div>

                    {{-- Contact Email --}}
                    <div>
                        <label for="contact_email" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--text-muted); margin-bottom: 6px;">
                            Contact Email <span style="color: #c0392b;">*</span>
                        </label>
                        <input type="email" id="contact_email" name="contact_email" required
                               placeholder="seller@example.com"
                               style="width: 100%; padding: 10px 14px; border: 1px solid var(--cream-2); border-radius: 8px; font-size: 0.95rem; color: var(--dark); background: var(--white);">
                    </div>

                    {{-- Country --}}
                    <div>
                        <label for="country" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--text-muted); margin-bottom: 6px;">
                            Country <span style="color: #c0392b;">*</span>
                        </label>
                        <select id="country" name="country" required
                                style="width: 100%; padding: 10px 14px; border: 1px solid var(--cream-2); border-radius: 8px; font-size: 0.95rem; color: var(--dark); background: var(--white);">
                            <option value="us">US</option>
                            <option value="nz" selected>NZ</option>
                            <option value="au">AU</option>
                            <option value="gb">GB</option>
                            <option value="ca">CA</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn-primary" id="createAccountBtn">
                    <i class="fa-solid fa-plus" aria-hidden="true"></i> Create Account
                </button>
            </form>
        </div>

        {{-- ============================================================= --}}
        {{-- CONNECTED ACCOUNTS LIST                                        --}}
        {{-- ============================================================= --}}
        @if(count($accounts) > 0)
        <h2 style="font-size: 1.3rem; color: var(--dark); margin-bottom: 20px;">
            <i class="fa-solid fa-building" aria-hidden="true" style="color: var(--gold);"></i>
            Connected Accounts ({{ count($accounts) }})
        </h2>

        @foreach($accounts as $acct)
        <div style="background: var(--white); border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,.06); padding: 28px; margin-bottom: 24px;">

            {{-- Account header --}}
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; margin-bottom: 16px;">
                <div>
                    <h3 style="font-size: 1.1rem; color: var(--dark); margin-bottom: 4px;">
                        {{ $acct['display_name'] }}
                    </h3>
                    <code style="font-size: 0.8rem; color: var(--text-muted); background: var(--cream-2); padding: 2px 8px; border-radius: 4px;">
                        {{ $acct['id'] }}
                    </code>
                    <span style="font-size: 0.85rem; color: var(--text-muted); margin-left: 8px;">
                        {{ $acct['contact_email'] }}
                    </span>
                </div>
                <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                    {{-- Onboarding status badge --}}
                    @if($acct['onboarding_complete'])
                    <span style="background: #f0fdf4; color: #166534; border: 1px solid #86efac; padding: 4px 12px; border-radius: 50px; font-size: 0.78rem; font-weight: 600;">
                        <i class="fa-solid fa-check" aria-hidden="true"></i> Onboarding Complete
                    </span>
                    @else
                    <span style="background: #fef9c3; color: #854d0e; border: 1px solid #fde047; padding: 4px 12px; border-radius: 50px; font-size: 0.78rem; font-weight: 600;">
                        <i class="fa-solid fa-clock" aria-hidden="true"></i> Requirements: {{ $acct['requirements_status'] }}
                    </span>
                    @endif

                    {{-- Card payments capability badge --}}
                    @if($acct['ready_to_process'])
                    <span style="background: #f0fdf4; color: #166534; border: 1px solid #86efac; padding: 4px 12px; border-radius: 50px; font-size: 0.78rem; font-weight: 600;">
                        <i class="fa-solid fa-credit-card" aria-hidden="true"></i> Payments Active
                    </span>
                    @else
                    <span style="background: #fef2f2; color: #c0392b; border: 1px solid #fca5a5; padding: 4px 12px; border-radius: 50px; font-size: 0.78rem; font-weight: 600;">
                        <i class="fa-solid fa-credit-card" aria-hidden="true"></i> Payments: {{ $acct['card_payments_status'] }}
                    </span>
                    @endif
                </div>
            </div>

            {{-- Actions row --}}
            <div style="display: flex; gap: 12px; flex-wrap: wrap; align-items: flex-start;">

                {{-- Onboard button --}}
                <form action="{{ route('connect.onboard', ['accountId' => $acct['id']]) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-primary" style="font-size: 0.85rem; padding: 10px 20px;">
                        <i class="fa-solid fa-arrow-right-to-bracket" aria-hidden="true"></i>
                        {{ $acct['onboarding_complete'] ? 'Re-onboard' : 'Onboard to Collect Payments' }}
                    </button>
                </form>

                {{-- View storefront link --}}
                <a href="{{ route('connect.storefront', ['accountId' => $acct['id']]) }}"
                   class="btn-secondary" style="font-size: 0.85rem; padding: 10px 20px; text-decoration: none;">
                    <i class="fa-solid fa-store" aria-hidden="true"></i> View Storefront
                </a>
            </div>

            {{-- Create Product form (inline, expandable) --}}
            <details style="margin-top: 20px; border-top: 1px solid var(--cream-2); padding-top: 20px;">
                <summary style="cursor: pointer; font-weight: 600; color: var(--brown); font-size: 0.95rem;">
                    <i class="fa-solid fa-box" aria-hidden="true"></i> Create a Product on This Account
                </summary>
                <form action="{{ route('connect.createProduct', ['accountId' => $acct['id']]) }}" method="POST"
                      style="margin-top: 16px;">
                    @csrf
                    <div style="display: grid; grid-template-columns: 1fr 1fr 120px 100px; gap: 12px; margin-bottom: 16px;">
                        <div>
                            <label style="display: block; font-size: 0.8rem; font-weight: 600; color: var(--text-muted); margin-bottom: 4px;">
                                Product Name <span style="color: #c0392b;">*</span>
                            </label>
                            <input type="text" name="name" required placeholder="e.g. Raw Honey 500g"
                                   style="width: 100%; padding: 8px 12px; border: 1px solid var(--cream-2); border-radius: 6px; font-size: 0.9rem; color: var(--dark);">
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.8rem; font-weight: 600; color: var(--text-muted); margin-bottom: 4px;">
                                Description
                            </label>
                            <input type="text" name="description" placeholder="Optional description"
                                   style="width: 100%; padding: 8px 12px; border: 1px solid var(--cream-2); border-radius: 6px; font-size: 0.9rem; color: var(--dark);">
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.8rem; font-weight: 600; color: var(--text-muted); margin-bottom: 4px;">
                                Price ($) <span style="color: #c0392b;">*</span>
                            </label>
                            <input type="number" name="price" required min="0.50" step="0.01" placeholder="29.90"
                                   style="width: 100%; padding: 8px 12px; border: 1px solid var(--cream-2); border-radius: 6px; font-size: 0.9rem; color: var(--dark);">
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.8rem; font-weight: 600; color: var(--text-muted); margin-bottom: 4px;">
                                Currency
                            </label>
                            <select name="currency"
                                    style="width: 100%; padding: 8px 12px; border: 1px solid var(--cream-2); border-radius: 6px; font-size: 0.9rem; color: var(--dark);">
                                <option value="nzd" selected>NZD</option>
                                <option value="usd">USD</option>
                                <option value="aud">AUD</option>
                                <option value="gbp">GBP</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn-primary" style="font-size: 0.85rem; padding: 10px 20px;">
                        <i class="fa-solid fa-plus" aria-hidden="true"></i> Create Product
                    </button>
                </form>
            </details>
        </div>
        @endforeach

        @else
        {{-- No accounts yet --}}
        <div style="text-align: center; padding: 60px 24px; color: var(--text-muted);">
            <i class="fa-solid fa-building" aria-hidden="true" style="font-size: 3rem; color: var(--cream-2); margin-bottom: 16px; display: block;"></i>
            <p style="font-size: 1.05rem;">No connected accounts yet. Create one above to get started.</p>
        </div>
        @endif

        {{-- ============================================================= --}}
        {{-- WEBHOOK SETUP INSTRUCTIONS                                     --}}
        {{-- ============================================================= --}}
        <div style="background: var(--cream-2); border-radius: 12px; padding: 28px; margin-top: 40px;">
            <h3 style="font-size: 1.1rem; color: var(--dark); margin-bottom: 12px;">
                <i class="fa-solid fa-bolt" aria-hidden="true" style="color: var(--gold);"></i>
                Webhook Setup (Thin Events)
            </h3>
            <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; margin-bottom: 12px;">
                To listen for account requirement changes, set up a webhook in the
                <a href="https://dashboard.stripe.com/webhooks" target="_blank" rel="noopener">Stripe Dashboard</a>:
            </p>
            <ol style="color: var(--text-muted); font-size: 0.88rem; line-height: 1.8; padding-left: 20px; margin-bottom: 16px;">
                <li>Go to <strong>Developers → Webhooks → + Add destination</strong></li>
                <li>Events from: <strong>Connected accounts</strong></li>
                <li>Show advanced options → Payload style: <strong>Thin</strong></li>
                <li>Select events: <code>v2.core.account[requirements].updated</code>, <code>v2.core.account[configuration.merchant].capability_status_updated</code>, <code>v2.core.account[configuration.customer].capability_status_updated</code></li>
                <li>Endpoint URL: <code>{{ url('/connect/webhook') }}</code></li>
            </ol>
            <p style="color: var(--text-muted); font-size: 0.88rem; margin-bottom: 8px;">
                <strong>For local testing</strong>, use the Stripe CLI:
            </p>
            <code style="display: block; background: var(--dark); color: #f0f0f0; padding: 12px 16px; border-radius: 8px; font-size: 0.82rem; line-height: 1.6; overflow-x: auto; white-space: pre-wrap;">stripe listen --thin-events 'v2.core.account[requirements].updated,v2.core.account[configuration.merchant].capability_status_updated,v2.core.account[configuration.customer].capability_status_updated' --forward-thin-to {{ url('/connect/webhook') }}</code>
        </div>
    </div>
</section>
@endsection
