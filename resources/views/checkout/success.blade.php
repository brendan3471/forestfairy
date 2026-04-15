@extends('layouts.app')

@section('title', 'Order Confirmed | Forest Fairy Honey')
@section('meta_description', 'Thank you for your order from Forest Fairy Honey. Your raw NZ honey is on its way!')
@section('canonical', 'https://forestfairyhoney.co.nz/checkout/success')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span>
            <span aria-current="page">Order Confirmed</span>
        </nav>
    </div>
</div>

<!-- Success Section -->
<section class="checkout-result-section section-padding" aria-labelledby="success-heading">
    <div class="container">
        <div class="checkout-result-card animate-on-scroll">

            <!-- Icon -->
            <div class="checkout-result-icon checkout-result-icon--success" aria-hidden="true">
                <i class="fa-solid fa-circle-check"></i>
            </div>

            <!-- Heading -->
            <h1 class="checkout-result-title" id="success-heading">Thank You for Your Order!</h1>
            <p class="checkout-result-body">
                Your payment was successful and your order has been confirmed.
                We're carefully packaging your honey and will dispatch it shortly.
                You'll receive a confirmation email with your order details soon.
            </p>

            @if($session && isset($session->customer_details))
            <div class="checkout-order-summary">
                <p><i class="fa-solid fa-envelope" aria-hidden="true"></i>
                   Confirmation sent to <strong>{{ $session->customer_details->email }}</strong></p>
                <p><i class="fa-solid fa-nz-dollar fa-dollar-sign" aria-hidden="true"></i>
                   Total paid: <strong>NZ${{ number_format($session->amount_total / 100, 2) }}</strong></p>
            </div>
            @endif

            <!-- Trust badges -->
            <div class="checkout-trust-strip">
                <span><i class="fa-solid fa-truck-fast" aria-hidden="true"></i> Dispatched within 1–2 business days</span>
                <span><i class="fa-solid fa-shield-halved" aria-hidden="true"></i> Secure payment via Stripe</span>
                <span><i class="fa-solid fa-leaf" aria-hidden="true"></i> 100% Raw NZ Honey</span>
            </div>

            <!-- CTA -->
            <div class="checkout-result-actions">
                <a href="/shop" class="btn-primary" id="continueShoppingBtn">Continue Shopping</a>
                <a href="/" class="btn-secondary" id="backHomeBtn">Back to Home</a>
            </div>
        </div>
    </div>
</section>
@endsection
