@extends('layouts.app')

@section('title', 'Payment Cancelled | Forest Fairy Honey')
@section('meta_description', 'Your payment was not completed. Return to the shop to try again.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/checkout/cancel')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span>
            <a href="/shop">Shop</a> <span aria-hidden="true">/</span>
            <span aria-current="page">Payment Cancelled</span>
        </nav>
    </div>
</div>

<!-- Cancel Section -->
<section class="checkout-result-section section-padding" aria-labelledby="cancel-heading">
    <div class="container">
        <div class="checkout-result-card animate-on-scroll">

            <!-- Icon -->
            <div class="checkout-result-icon checkout-result-icon--cancel" aria-hidden="true">
                <i class="fa-solid fa-circle-xmark"></i>
            </div>

            <!-- Heading -->
            <h1 class="checkout-result-title" id="cancel-heading">Payment Not Completed</h1>
            <p class="checkout-result-body">
                No worries — your payment was cancelled and you haven't been charged.
                Your honey is still waiting for you whenever you're ready.
            </p>

            <!-- CTA -->
            <div class="checkout-result-actions">
                @if($slug)
                    <a href="/shop/{{ $slug }}" class="btn-primary" id="backToProductBtn">Back to Product</a>
                @endif
                <a href="/shop" class="btn-secondary" id="backToShopBtn">View All Honey</a>
            </div>
        </div>
    </div>
</section>
@endsection
