@extends('layouts.app')

@section('title', $product['name'] . ' | Buy NZ Honey Online | Forest Fairy Honey')
@section('meta_description', 'Buy ' . $product['name'] . ' from Forest Fairy Honey NZ. Pure, raw, cold-harvested New Zealand honey. ' . $product['description'])
@section('canonical', 'https://forestfairyhoney.co.nz/shop/' . $slug)
@section('og_type', 'product')

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
    "price": "{{ $product['price'] }}",
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
                    <span class="product-price-lg">${{ $product['price'] }}</span>
                    <span class="product-weight">/ {{ $product['weight'] }}</span>
                </div>
                <p class="product-detail-desc">{{ $product['description'] }}</p>
                <ul class="product-benefits">
                    @foreach($product['benefits'] as $benefit)
                    <li><i class="fa-solid fa-check" aria-hidden="true"></i> {{ $benefit }}</li>
                    @endforeach
                </ul>
                <a href="/contact" class="btn-primary btn-full" id="orderBtn">Order Now — Contact Us</a>
                <p class="product-note"><i class="fa-solid fa-truck-fast" aria-hidden="true"></i> Free NZ shipping on orders over $75</p>
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
            $all = [
                ['slug' => 'omanawa-falls-creamed-honey', 'name' => 'Omanawa Falls Creamed', 'type' => 'Creamed', 'price' => '32.90', 'weight' => '900g', 'img' => '/images/Omanawa-falls-creamed-honey.jpg', 'img_alt' => 'Omanawa Falls Creamed Honey'],
                ['slug' => 'mamaku-creamed-honey', 'name' => 'Mamaku Creamed Honey', 'type' => 'Creamed', 'price' => '34.90', 'weight' => '950g', 'img' => '/images/mamaku-creamed-honey.jpg', 'img_alt' => 'Mamaku Creamed Honey'],
                ['slug' => 'otumoetai-summer-harvest-creamed-honey', 'name' => 'Ōtumoetai Summer', 'type' => 'Creamed', 'price' => '29.90', 'weight' => '950g', 'img' => '/images/otumoetai-summer-harvest-creamed-honey.jpg', 'img_alt' => 'Ōtumoetai Summer Harvest'],
                ['slug' => 'rewarewa-honey', 'name' => 'Rewarewa Honey', 'type' => 'Native', 'price' => '36.90', 'weight' => '950g', 'img' => '/images/rewarewa-honey.jpg', 'img_alt' => 'Rewarewa Honey'],
            ];
            $related = array_filter($all, fn($p) => $p['slug'] !== $slug);
            $related = array_slice(array_values($related), 0, 3);
            @endphp
            @foreach($related as $r)
            <article class="product-card animate-on-scroll">
                <a href="/shop/{{ $r['slug'] }}" class="product-card-link" aria-label="View {{ $r['name'] }}">
                    <div class="product-image">
                        <img src="{{ $r['img'] }}" alt="{{ $r['img_alt'] }}" loading="lazy">
                    </div>
                    <div class="product-info">
                        <span class="product-type">{{ $r['type'] }}</span>
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
