{{--
    =========================================================================
    Connected Account Storefront
    =========================================================================

    Public-facing page that displays all active products for a connected
    account. Each product has a "Buy" button that creates a Stripe Checkout
    Session as a Direct Charge on the connected account.

    NOTE: In production, use a slug, username, or other identifier in the URL
    instead of the raw Stripe account ID (acct_XXX). The account ID is used
    here for simplicity in this demo.
    =========================================================================
--}}

@extends('layouts.app')

@section('title', '{{ $storeName }} Store | Forest Fairy Honey')
@section('meta_description', 'Shop products from {{ $storeName }} on Forest Fairy Honey.')

@section('content')
<div class="breadcrumb-bar">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span>
            <span aria-current="page">{{ $storeName }}</span>
        </nav>
    </div>
</div>

<section class="section-padding" style="min-height: 70vh;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 48px;">
            <h1 style="font-size: clamp(1.8rem, 4vw, 2.4rem); color: var(--dark); margin-bottom: 8px;">
                {{ $storeName }}
            </h1>
            <p style="color: var(--text-muted); font-size: 1rem;">
                Browse and purchase products from this seller
            </p>
            {{-- NOTE: In production, use a slug or readable identifier instead of the account ID --}}
            {{-- The account ID (acct_XXX) is visible in the URL for demo purposes only --}}
        </div>

        {{-- Flash messages --}}
        @if(session('connect_error'))
        <div style="background: #fef2f2; color: #c0392b; border: 1px solid #fca5a5; border-radius: 8px; padding: 14px 20px; margin-bottom: 24px; font-size: 0.95rem;" role="alert">
            <i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i> {{ session('connect_error') }}
        </div>
        @endif

        @if(count($products) > 0)
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px;">
            @foreach($products as $product)
            <article style="background: var(--white); border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,.06); overflow: hidden; transition: transform 0.2s ease, box-shadow 0.2s ease;">

                {{-- Product info --}}
                <div style="padding: 24px;">
                    <h3 style="font-size: 1.1rem; color: var(--dark); margin-bottom: 8px; line-height: 1.3;">
                        {{ $product->name }}
                    </h3>
                    @if($product->description)
                    <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 16px;">
                        {{ $product->description }}
                    </p>
                    @endif

                    {{-- Price --}}
                    @if($product->default_price)
                    <div style="display: flex; align-items: baseline; gap: 6px; margin-bottom: 20px;">
                        <span style="font-size: 1.4rem; font-weight: 700; color: var(--brown);">
                            ${{ number_format($product->default_price->unit_amount / 100, 2) }}
                        </span>
                        <span style="font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase;">
                            {{ strtoupper($product->default_price->currency) }}
                        </span>
                    </div>

                    {{-- Buy button — creates a Direct Charge checkout session --}}
                    <form action="{{ route('connect.buy', ['accountId' => $accountId]) }}" method="POST">
                        @csrf
                        {{-- Pass the price metadata needed to create the checkout session --}}
                        <input type="hidden" name="price_id" value="{{ $product->default_price->id }}">
                        <input type="hidden" name="product_name" value="{{ $product->name }}">
                        <input type="hidden" name="unit_amount" value="{{ $product->default_price->unit_amount }}">
                        <input type="hidden" name="currency" value="{{ $product->default_price->currency }}">

                        <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; font-size: 0.92rem; padding: 12px 20px;">
                            <i class="fa-solid fa-basket-shopping" aria-hidden="true"></i> Buy Now
                        </button>
                    </form>
                    @else
                    <p style="color: var(--text-muted); font-style: italic; font-size: 0.9rem;">
                        No price set
                    </p>
                    @endif
                </div>
            </article>
            @endforeach
        </div>
        @else
        {{-- Empty storefront --}}
        <div style="text-align: center; padding: 60px 24px; color: var(--text-muted);">
            <i class="fa-solid fa-store" aria-hidden="true" style="font-size: 3rem; color: var(--cream-2); margin-bottom: 16px; display: block;"></i>
            <p style="font-size: 1.05rem;">This store has no products yet.</p>
            <a href="/shop" style="color: var(--gold-dark); font-weight: 600; margin-top: 12px; display: inline-block;">
                ← Browse Forest Fairy Honey products
            </a>
        </div>
        @endif

        <div style="text-align: center; margin-top: 48px;">
            <a href="{{ route('connect.dashboard') }}" style="color: var(--text-muted); font-size: 0.88rem;">
                ← Back to Connect Dashboard
            </a>
        </div>
    </div>
</section>
@endsection
