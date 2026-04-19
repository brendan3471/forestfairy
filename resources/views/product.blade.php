@extends('layouts.app')

@section('title', $product['name'] . ' | Buy NZ Honey Online | Forest Fairy Honey')
@section('meta_description', 'Buy ' . $product['name'] . ' from Forest Fairy Honey NZ. Pure, raw, cold-harvested New Zealand honey. ' . $product['description'])
@section('canonical', 'https://forestfairyhoney.co.nz/shop/' . $slug)
@section('og_type', 'product')

@php
    $defaultOption = $product['options'][$product['default_option']];
@endphp

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Product",
  "name": "{{ $product['name'] }}",
  "description": "{{ $product['description'] }}",
  "brand": {
    "@@type": "Brand",
    "name": "Forest Fairy Honey"
  },
  "offers": {
    "@@type": "Offer",
    "price": "{{ $defaultOption['price'] }}",
    "priceCurrency": "NZD",
    "availability": "https://schema.org/InStock",
    "url": "https://forestfairyhoney.co.nz/shop/{{ $slug }}",
    "seller": {
      "@@type": "Organization",
      "name": "Forest Fairy Honey"
    }
  },
  "aggregateRating": {
    "@@type": "AggregateRating",
    "ratingValue": "{{ $product['rating'] }}",
    "reviewCount": "{{ $product['reviews'] }}",
    "bestRating": "5",
    "worstRating": "1"
  }
}
</script>
@endsection

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span>
            <a href="/shop">Shop</a> <span aria-hidden="true">/</span>
            <span aria-current="page">{{ $product['name'] }}</span>
        </nav>
    </div>
</div>

<!-- Product Detail -->
<section class="product-detail section-padding" aria-labelledby="product-title">
    <div class="container">
        <div class="product-detail-grid">
            <!-- Image -->
            <div class="product-detail-image animate-on-scroll">
                @php
                $imgMap = [
                    'omanawa-falls' => '/images/Omanawa-falls-creamed-honey.jpg',
                    'mamaku' => '/images/mamaku-creamed-honey.jpg',
                    'otumoetai'   => '/images/otumoetai-summer-harvest-creamed-honey.jpg',
                    'rewarewa' => '/images/rewarewa-honey.jpg',
                ];
                @endphp
                <img src="{{ $imgMap[$product['image']] }}" alt="{{ $product['name'] }} — New Zealand Raw Honey" loading="eager" class="product-detail-img">
            </div>
            <!-- Info -->
            <div class="product-detail-info animate-on-scroll">
                <span class="product-type product-type--lg">New Zealand Raw Honey</span>
                <h1 class="product-detail-title" id="product-title">{{ $product['name'] }}</h1>
                <div class="product-detail-stars" aria-label="Rated {{ $product['rating'] }} out of 5">
                    @php
                        $rating = (float)$product['rating'];
                        $full = floor($rating);
                        $half = ($rating - $full) >= 0.5 ? 1 : 0;
                        $empty = 5 - $full - $half;
                        $starsHtml = str_repeat('<i class="fa-solid fa-star" aria-hidden="true"></i>', $full)
                            . ($half ? '<i class="fa-solid fa-star-half-stroke" aria-hidden="true"></i>' : '')
                            . str_repeat('<i class="fa-regular fa-star" aria-hidden="true"></i>', $empty);
                    @endphp
                    <span class="product-stars">{!! $starsHtml !!}</span>
                    <span class="product-rating-text">{{ $product['rating'] }} ({{ $product['reviews'] }} reviews)</span>
                </div>
                
                <div class="product-detail-price">
                    <span class="product-price-lg" id="displayPrice">${{ $defaultOption['price'] }}</span>
                    <span class="product-weight" id="displayWeight">/ {{ $defaultOption['weight'] }}</span>
                </div>

                <p class="product-detail-desc">{{ $product['description'] }}</p>
                <ul class="product-benefits">
                    @foreach($product['benefits'] as $benefit)
                    <li><i class="fa-solid fa-check" aria-hidden="true"></i> {{ $benefit }}</li>
                    @endforeach
                </ul>
                
                @if(session('cart_flash'))
                <div class="product-cart-flash" role="alert">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i> {{ session('cart_flash') }}
                </div>
                @endif

                <!-- Add to Cart -->
                <form action="/cart/add/{{ $slug }}" method="POST" id="addToCartForm" class="product-atc-form">
                    @csrf
                    
                    <div class="product-option-row">
                        <label for="option" class="product-option-label">Choose Size</label>
                        <select name="option" id="optionSelector" class="product-option-select">
                            @foreach($product['options'] as $key => $opt)
                                <option value="{{ $key }}" data-price="{{ $opt['price'] }}" data-weight="{{ $opt['weight'] }}" {{ $key === $product['default_option'] ? 'selected' : '' }}>
                                    {{ $opt['weight'] }} — ${{ $opt['price'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="product-qty-row">
                        <label for="qty" class="product-qty-label">Quantity</label>
                        <div class="product-qty-stepper">
                            <button type="button" class="qty-btn" id="qtyMinus" aria-label="Decrease quantity"><i class="fa-solid fa-minus" aria-hidden="true"></i></button>
                            <input type="number" id="qty" name="quantity" value="1" min="1" max="10" class="qty-input" aria-label="Quantity">
                            <button type="button" class="qty-btn" id="qtyPlus" aria-label="Increase quantity"><i class="fa-solid fa-plus" aria-hidden="true"></i></button>
                        </div>
                    </div>

                    <button type="submit" class="btn-primary btn-full" id="addToCartBtn">
                        <i class="fa-solid fa-basket-shopping" aria-hidden="true"></i> Add to Cart
                    </button>
                </form>

                <a href="/cart" class="btn-secondary btn-full" id="viewCartBtn" style="margin-top:10px; text-align:center;">
                    View Cart &amp; Checkout
                </a>

                <p class="product-note"><i class="fa-solid fa-truck-fast" aria-hidden="true"></i> Free NZ shipping on orders over $75</p>

                <script>
                (function(){
                    var input = document.getElementById('qty');
                    var selector = document.getElementById('optionSelector');
                    var displayPrice = document.getElementById('displayPrice');
                    var displayWeight = document.getElementById('displayWeight');

                    document.getElementById('qtyMinus').addEventListener('click', function(){
                        if(parseInt(input.value) > 1) input.value = parseInt(input.value) - 1;
                    });
                    document.getElementById('qtyPlus').addEventListener('click', function(){
                        if(parseInt(input.value) < 10) input.value = parseInt(input.value) + 1;
                    });

                    selector.addEventListener('change', function(){
                        var selectedOption = selector.options[selector.selectedIndex];
                        displayPrice.textContent = '$' + selectedOption.getAttribute('data-price');
                        displayWeight.textContent = '/ ' + selectedOption.getAttribute('data-weight');
                    });
                })();
                </script>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="related-products section-padding section-padding--alt" aria-labelledby="related-heading">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2 class="section-title" id="related-heading">You Might Also Love</h2>
            <div class="section-divider"></div>
        </div>
        <div class="products-grid products-grid--3">
            @php
            $allProducts = config('products');
            $related = [];
            foreach($allProducts as $rSlug => $rData) {
                if ($rSlug !== $slug) {
                    $defOpt = $rData['options'][$rData['default_option']];
                    $related[] = [
                        'slug' => $rSlug,
                        'name' => $rData['name'],
                        'price' => $defOpt['price'],
                        'weight' => $defOpt['weight'],
                        'img' => $imgMap[$rData['image']] ?? ''
                    ];
                }
            }
            $related = array_slice($related, 0, 3);
            @endphp
            @foreach($related as $r)
            <article class="product-card animate-on-scroll">
                <a href="/shop/{{ $r['slug'] }}" class="product-card-link" aria-label="View {{ $r['name'] }}">
                    <div class="product-image">
                        <img src="{{ $r['img'] }}" alt="{{ $r['name'] }}" loading="lazy">
                    </div>
                    <div class="product-info">
                        <span class="product-type">New Zealand Honey</span>
                        <h3 class="product-name">{{ $r['name'] }}</h3>
                        <div class="product-price-row">
                            <span class="product-price">${{ $r['price'] }} <small>/ {{ $r['weight'] }}</small></span>
                            <span class="product-cta">View →</span>
                        </div>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
