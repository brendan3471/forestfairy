@extends('layouts.app')

@section('title', 'Your Cart | Forest Fairy Honey')
@section('meta_description', 'Review your Forest Fairy Honey order before checkout.')
@section('canonical', 'https://forestfairyhoney.co.nz/cart')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span>
            <a href="/shop">Shop</a> <span aria-hidden="true">/</span>
            <span aria-current="page">Your Cart</span>
        </nav>
    </div>
</div>

<section class="cart-section section-padding" aria-labelledby="cart-heading">
    <div class="container">
        <div class="cart-header animate-on-scroll">
            <h1 class="cart-title" id="cart-heading">Your Cart</h1>
            @if(count($items) > 0)
                <span class="cart-item-count">{{ array_sum(array_column($items, 'quantity')) }} item{{ array_sum(array_column($items, 'quantity')) !== 1 ? 's' : '' }}</span>
            @endif
        </div>

        @if(session('cart_error'))
            <div class="cart-alert cart-alert--error" role="alert">
                <i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i>
                {{ session('cart_error') }}
            </div>
        @endif

        @if(count($items) > 0)
        <div class="cart-layout">
            <!-- Cart Items -->
            <div class="cart-items">
                @foreach($items as $item)
                <article class="cart-item animate-on-scroll" aria-label="{{ $item['name'] }}">
                    <a href="/shop/{{ $item['slug'] }}" class="cart-item-image" aria-hidden="true" tabindex="-1">
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" loading="lazy">
                    </a>
                    <div class="cart-item-details">
                        <a href="/shop/{{ $item['slug'] }}" class="cart-item-name">{{ $item['name'] }}</a>
                        <span class="cart-item-weight">{{ $item['weight'] }}</span>
                        <span class="cart-item-unit-price">${{ $item['price'] }} each</span>
                    </div>
                    <div class="cart-item-qty">
                        <!-- Decrease -->
                        <form action="/cart/update/{{ $item['key'] }}" method="POST" style="display:inline">
                            @csrf
                            <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1 }}">
                            <button type="submit" class="qty-btn" aria-label="Decrease quantity" {{ $item['quantity'] <= 1 ? 'disabled' : '' }}>
                                <i class="fa-solid fa-minus" aria-hidden="true"></i>
                            </button>
                        </form>

                        <span class="qty-value" aria-live="polite">{{ $item['quantity'] }}</span>

                        <!-- Increase -->
                        <form action="/cart/update/{{ $item['key'] }}" method="POST" style="display:inline">
                            @csrf
                            <input type="hidden" name="quantity" value="{{ $item['quantity'] + 1 }}">
                            <button type="submit" class="qty-btn" aria-label="Increase quantity">
                                <i class="fa-solid fa-plus" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                    <div class="cart-item-total">
                        ${{ number_format($item['line_total'] / 100, 2) }}
                    </div>
                    <!-- Remove -->
                    <form action="/cart/remove/{{ $item['key'] }}" method="POST" class="cart-item-remove-form">
                        @csrf
                        <button type="submit" class="cart-item-remove" aria-label="Remove {{ $item['name'] }} from cart">
                            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                        </button>
                    </form>
                </article>
                @endforeach
            </div>

            <!-- Order Summary -->
            <aside class="cart-summary animate-on-scroll" aria-label="Order summary">
                <h2 class="cart-summary-title">Order Summary</h2>

                <div class="cart-summary-rows">
                    <div class="cart-summary-row">
                        <span>Subtotal</span>
                        <span>${{ number_format($subtotal / 100, 2) }}</span>
                    </div>
                    <div class="cart-summary-row">
                        <span>Shipping</span>
                        <span class="{{ $subtotal >= 7500 ? 'cart-free-shipping' : 'cart-shipping-tbd' }}">
                            @if($subtotal >= 7500)
                                <i class="fa-solid fa-circle-check" aria-hidden="true"></i> Free
                            @else
                                Calculated at checkout
                            @endif
                        </span>
                    </div>
                </div>

                @if($subtotal < 7500)
                <div class="cart-shipping-banner">
                    <i class="fa-solid fa-truck-fast" aria-hidden="true"></i>
                    Add <strong>${{ number_format((7500 - $subtotal) / 100, 2) }}</strong> more for free NZ shipping
                </div>
                @else
                <div class="cart-shipping-banner cart-shipping-banner--earned">
                    <i class="fa-solid fa-truck-fast" aria-hidden="true"></i>
                    You've earned <strong>free NZ shipping!</strong>
                </div>
                @endif

                <div class="cart-summary-total">
                    <span>Estimated Total</span>
                    <span>${{ number_format($subtotal / 100, 2) }} <small>NZD</small></span>
                </div>

                <form action="/cart/checkout" method="POST">
                    @csrf
                    <button type="submit" class="btn-primary btn-full cart-checkout-btn" id="cartCheckoutBtn">
                        <i class="fa-brands fa-stripe" aria-hidden="true"></i> Secure Checkout
                    </button>
                </form>

                <a href="/shop" class="cart-continue-link">
                    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Continue Shopping
                </a>

                <div class="cart-trust">
                    <span><i class="fa-solid fa-lock" aria-hidden="true"></i> Secure payment</span>
                    <span><i class="fa-solid fa-rotate-left" aria-hidden="true"></i> Easy returns</span>
                </div>
            </aside>
        </div>

        @else
        <!-- Empty Cart -->
        <div class="cart-empty animate-on-scroll">
            <div class="cart-empty-icon" aria-hidden="true">
                <i class="fa-solid fa-basket-shopping"></i>
            </div>
            <h2 class="cart-empty-title">Your cart is empty</h2>
            <p class="cart-empty-body">Looks like you haven't added any honey yet. Explore our range below.</p>
            <a href="/shop" class="btn-primary" id="cartShopBtn">Browse Our Honey</a>
        </div>
        @endif
    </div>
</section>
@endsection
