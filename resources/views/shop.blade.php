@extends('layouts.app')

@section('title', 'Shop Raw NZ Honey Online | Manuka, Bush & Clover | Forest Fairy Honey')
@section('meta_description', 'Shop Forest Fairy Honey\'s full range of pure NZ honey online. Raw Manuka, Bush, Clover and rare Honeydew honey — all cold-harvested in New Zealand. Free shipping $75+.')
@section('canonical', 'https://forestfairyhoney.co.nz/shop')
@section('og_type', 'website')

@section('schema')
<script type="application/ld+json">
@verbatim
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "name": "Forest Fairy Honey — NZ Honey Products",
  "url": "https://forestfairyhoney.co.nz/shop",
  "itemListElement": [
    {"@type":"ListItem","position":1,"url":"https://forestfairyhoney.co.nz/shop/raw-manuka-honey-250g","name":"Raw Māori Manuka Honey 250g"},
    {"@type":"ListItem","position":2,"url":"https://forestfairyhoney.co.nz/shop/forest-clover-honey-500g","name":"Forest Clover Honey 500g"},
    {"@type":"ListItem","position":3,"url":"https://forestfairyhoney.co.nz/shop/bush-honey-500g","name":"NZ Bush Honey 500g"},
    {"@type":"ListItem","position":4,"url":"https://forestfairyhoney.co.nz/shop/honeydew-honey-250g","name":"Honeydew Honey 250g"}
  ]
}
@endverbatim
</script>
@endsection

@section('content')
<!-- Shop Hero -->
<section class="page-hero page-hero--shop" aria-label="Shop page hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> <span aria-current="page">Shop</span>
        </nav>
        <h1 class="page-hero-title">Our Honey Collection</h1>
        <p class="page-hero-subtitle">Pure, raw, and responsibly harvested from the heart of New Zealand</p>
    </div>
</section>

<!-- Shop Grid -->
<section class="shop-section section-padding" aria-labelledby="shop-heading">
    <div class="container">
        <div class="shop-header animate-on-scroll">
            <h2 class="shop-heading sr-only" id="shop-heading">All Honey Products</h2>
            <p class="shop-count">Showing <strong>4</strong> products</p>
        </div>
        <div class="products-grid products-grid--shop">
            @php
            $products = [
                ['slug' => 'omanawa-falls-creamed-honey', 'name' => 'Omanawa Falls Creamed Honey', 'type' => 'Creamed', 'price' => '32.90', 'weight' => '900g', 'rating' => '5.0', 'reviews' => 42, 'badge' => 'Bestseller', 'badge_class' => '', 'img' => '/images/Omanawa-falls-creamed-honey.jpg', 'img_alt' => 'Omanawa Falls Creamed Honey jar'],
                ['slug' => 'mamaku-creamed-honey', 'name' => 'Mamaku Creamed Honey', 'type' => 'Creamed', 'price' => '34.90', 'weight' => '950g', 'rating' => '4.9', 'reviews' => 56, 'badge' => '', 'badge_class' => '', 'img' => '/images/mamaku-creamed-honey.jpg', 'img_alt' => 'Mamaku Creamed Honey jar'],
                ['slug' => 'otumoetai-summer-harvest-creamed-honey', 'name' => 'Ōtumoetai Summer Harvest Creamed Honey', 'type' => 'Creamed', 'price' => '29.90', 'weight' => '950g', 'rating' => '4.8', 'reviews' => 38, 'badge' => 'Seasonal', 'badge_class' => 'product-badge--green', 'img' => '/images/otumoetai-summer-harvest-creamed-honey.jpg', 'img_alt' => 'Ōtumoetai Summer Harvest Creamed Honey jar'],
                ['slug' => 'rewarewa-honey', 'name' => 'Rewarewa Honey', 'type' => 'Native', 'price' => '36.90', 'weight' => '950g', 'rating' => '5.0', 'reviews' => 29, 'badge' => 'Premium', 'badge_class' => 'product-badge--brown', 'img' => '/images/rewarewa-honey.jpg', 'img_alt' => 'Rewarewa Honey jar'],
            ];
            @endphp
            @foreach($products as $p)
            <article class="product-card animate-on-scroll" itemscope itemtype="https://schema.org/Product">
                <a href="/shop/{{ $p['slug'] }}" class="product-card-link" aria-label="View {{ $p['name'] }} {{ $p['weight'] }}">
                    <div class="product-image">
                        <img src="{{ $p['img'] }}" alt="{{ $p['img_alt'] }}" loading="lazy" itemprop="image">
                        @if($p['badge'])
                        <div class="product-badge {{ $p['badge_class'] }}">{{ $p['badge'] }}</div>
                        @endif
                    </div>
                    <div class="product-info">
                        <span class="product-type">{{ $p['type'] }}</span>
                        <h3 class="product-name" itemprop="name">{{ $p['name'] }}</h3>
                        <div class="product-stars" aria-label="Rated {{ $p['rating'] }} out of 5">
                            @for($i = 0; $i < 5; $i++)
                                @if($i < floor((float)$p['rating']))
                                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                                @elseif(floor((float)$p['rating']) == $i && fmod((float)$p['rating'], 1) >= 0.5)
                                    <i class="fa-solid fa-star-half-stroke" aria-hidden="true"></i>
                                @else
                                    <i class="fa-regular fa-star" aria-hidden="true"></i>
                                @endif
                            @endfor
                            <span>({{ $p['reviews'] }})</span>
                        </div>
                        <div class="product-price-row" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                            <meta itemprop="price" content="{{ $p['price'] }}">
                            <meta itemprop="priceCurrency" content="NZD">
                            <meta itemprop="availability" content="https://schema.org/InStock">
                            <span class="product-price">${{ $p['price'] }} <small>/ {{ $p['weight'] }}</small></span>
                            <span class="product-cta">Shop Now →</span>
                        </div>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
    </div>
</section>

<!-- Why Choose Us Banner -->
<section class="why-section section-padding section-padding--alt" aria-labelledby="why-heading">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <span class="section-eyebrow">Why Forest Fairy</span>
            <h2 class="section-title" id="why-heading">The Difference Is in the Jar</h2>
            <div class="section-divider"></div>
        </div>
        <div class="why-grid">
            <div class="why-item animate-on-scroll">
                <i class="fa-solid fa-fire-flame-simple" aria-hidden="true"></i>
                <h3>Never Heat-Treated</h3>
                <p>Raw honey keeps all its natural enzymes, antioxidants and pollen intact. We never heat above 40°C.</p>
            </div>
            <div class="why-item animate-on-scroll">
                <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                <h3>Fully Traceable</h3>
                <p>Each batch is harvested from a known location in New Zealand. We know exactly where every jar came from.</p>
            </div>
            <div class="why-item animate-on-scroll">
                <i class="fa-solid fa-recycle" aria-hidden="true"></i>
                <h3>Sustainable Beekeeping</h3>
                <p>Our hives are managed with the bees' health first. We never over-harvest and always leave enough for the colony.</p>
            </div>
            <div class="why-item animate-on-scroll">
                <i class="fa-solid fa-gift" aria-hidden="true"></i>
                <h3>Beautiful Gifting</h3>
                <p>Our honey makes the perfect NZ gift. Beautiful jars, elegant labels, and the story of where it came from.</p>
            </div>
        </div>
    </div>
</section>
@endsection
