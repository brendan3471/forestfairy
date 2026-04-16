{{--
    =========================================================================
    Connect Purchase Success
    =========================================================================

    Shown after a customer completes payment on a connected account's
    storefront. The checkout session was created as a Direct Charge so the
    payment was processed on the connected account with an application fee
    going to the platform.
    =========================================================================
--}}

@extends('layouts.app')

@section('title', 'Payment Successful | Forest Fairy Honey')
@section('meta_description', 'Your payment was processed successfully.')

@section('content')
<section class="section-padding" style="min-height: 70vh;">
    <div class="container" style="max-width: 600px; text-align: center; padding-top: 60px;">
        <div style="font-size: 4rem; color: #22c55e; margin-bottom: 24px; line-height: 1;" aria-hidden="true">
            <i class="fa-solid fa-circle-check"></i>
        </div>

        <h1 style="font-size: 2rem; color: var(--dark); margin-bottom: 12px;">
            Payment Successful!
        </h1>

        <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.6; margin-bottom: 32px;">
            Thank you for your purchase. Your payment has been processed and a confirmation will be sent to your email.
        </p>

        @if($sessionId)
        <div style="background: var(--cream-2); border-radius: 8px; padding: 16px 20px; margin-bottom: 32px; display: inline-block;">
            <span style="font-size: 0.85rem; color: var(--text-muted);">Session ID:</span>
            <code style="font-size: 0.82rem; color: var(--dark); display: block; margin-top: 4px;">{{ $sessionId }}</code>
        </div>
        @endif

        <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
            @if($accountId)
            <a href="{{ route('connect.storefront', ['accountId' => $accountId]) }}" class="btn-primary" style="text-decoration: none;">
                <i class="fa-solid fa-store" aria-hidden="true"></i> Back to Store
            </a>
            @endif
            <a href="/shop" class="btn-secondary" style="text-decoration: none;">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Forest Fairy Honey Shop
            </a>
        </div>
    </div>
</section>
@endsection
