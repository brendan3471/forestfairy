@extends('layouts.app')

@section('title', 'Shop Raw NZ Honey Online | Manuka, Bush & Clover | Forest Fairy Honey')
@section('meta_description', 'Shop Forest Fairy Honey\'s full range of pure NZ honey online. Raw Manuka, Bush, Clover and rare Honeydew honey — all cold-harvested in New Zealand. Free shipping $75+.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/shop')
@section('og_type', 'website')

@section('schema')
<script type="application/ld+json">
@verbatim
{
  "@context": "https://schema.org",
  "@id": "https://www.forestfairyhoney.co.nz/shop#itemList",
  "@type": "ItemList",
  "name": "Forest Fairy Honey — NZ Honey Products",
  "url": "https://www.forestfairyhoney.co.nz/shop",
  "itemListElement": [
    {"@type":"ListItem","position":1,"url":"https://www.forestfairyhoney.co.nz/shop/omanawa-falls-creamed-honey","name":"Omanawa Falls Creamed Honey"},
    {"@type":"ListItem","position":2,"url":"https://www.forestfairyhoney.co.nz/shop/mamaku-creamed-honey","name":"Mamaku Creamed Honey MGO 100+"},
    {"@type":"ListItem","position":3,"url":"https://www.forestfairyhoney.co.nz/shop/otumoetai-summer-harvest-creamed-honey","name":"Ōtumoetai Summer Harvest Creamed Honey"},
    {"@type":"ListItem","position":4,"url":"https://www.forestfairyhoney.co.nz/shop/rewarewa-honey","name":"Rewarewa Honey"}
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
            <p class="shop-count">Showing <strong>{{ count(config('products')) }}</strong> products</p>
            @if(session('cart_flash'))
            <div class="cart-flash-banner" role="alert">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i> {{ session('cart_flash') }}
                <a href="/cart">View Cart →</a>
            </div>
            @endif
        </div>
        <div class="products-grid products-grid--shop">
            @php
            $productsConfig = config('products');
            $reviewStats = \App\Models\Review::where('status', 'approved')
                ->selectRaw('product_slug, COUNT(*) as count, AVG(rating) as average')
                ->groupBy('product_slug')
                ->get()
                ->keyBy('product_slug');
            $imgMap = [
                'omanawa-falls' => '/images/Omanawa-falls-creamed-honey.jpg',
                'mamaku'        => '/images/mamaku-creamed-honey.jpg',
                'otumoetai'     => '/images/otumoetai-summer-harvest-creamed-honey.jpg',
                'rewarewa'      => '/images/rewarewa-honey.jpg',
            ];
            @endphp
            
            @foreach($productsConfig as $slug => $p)
            @php
                $stat = $reviewStats->get($slug);
                $reviewsCount = $stat ? $stat->count : 0;
                $avgRating = $stat ? round($stat->average, 1) : 0;

                $defaultOpt = $p['options'][$p['default_option']];
                // Badge logic
                $badge = '';
                $badgeClass = '';
                if ($slug === 'omanawa-falls-creamed-honey') { $badge = 'Bestseller'; }
                if ($slug === 'otumoetai-summer-harvest-creamed-honey') { $badge = 'Seasonal'; $badgeClass = 'product-badge--green'; }
                if ($slug === 'rewarewa-honey') { $badge = 'Premium'; $badgeClass = 'product-badge--brown'; }
            @endphp
            <article class="product-card animate-on-scroll" itemscope itemtype="https://schema.org/Product">
                <a href="/shop/{{ $slug }}" class="product-card-link" aria-label="View {{ $p['name'] }}">
                    <div class="product-image">
                        <img src="{{ $imgMap[$p['image']] ?? '' }}" alt="{{ $p['name'] }}" loading="lazy" itemprop="image">
                        @if($badge)
                        <div class="product-badge {{ $badgeClass }}">{{ $badge }}</div>
                        @endif
                    </div>
                    <div class="product-info">
                        <span class="product-type">New Zealand Honey</span>
                        <h3 class="product-name" itemprop="name">{{ $p['name'] }}</h3>
                        <div class="product-stars" aria-label="Rated {{ $avgRating }} out of 5">
                            @for($i = 0; $i < 5; $i++)
                                @if($i < floor($avgRating))
                                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                                @elseif(floor($avgRating) == $i && fmod($avgRating, 1) >= 0.5)
                                    <i class="fa-solid fa-star-half-stroke" aria-hidden="true"></i>
                                @else
                                    <i class="fa-regular fa-star" aria-hidden="true"></i>
                                @endif
                            @endfor
                            <span>({{ $reviewsCount }})</span>
                        </div>
                        <div class="product-price-row" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                            <meta itemprop="price" content="{{ $defaultOpt['price'] }}">
                            <meta itemprop="priceCurrency" content="NZD">
                            <meta itemprop="availability" content="https://schema.org/InStock">
                            <span class="product-price">${{ $defaultOpt['price'] }} <small>/ {{ $defaultOpt['weight'] }}</small></span>
                        </div>

                        @php
                            $defSku = $defaultOpt['sku'] ?? '';
                            $defStock = isset($stocks[$defSku]) ? $stocks[$defSku]['stock'] : 50;
                        @endphp

                        <!-- All weights display with stock info -->
                        <div class="product-variant-pills-shop" style="margin-top: 10px; display: flex; flex-wrap: wrap; gap: 6px;">
                            @foreach($p['options'] as $oKey => $opt)
                                @php
                                    $optStock = isset($stocks[$opt['sku']]) ? $stocks[$opt['sku']]['stock'] : 50;
                                @endphp
                                <a href="/shop/{{ $slug }}?option={{ $oKey }}" class="variant-pill-shop" aria-label="View {{ $opt['weight'] }} size" style="position: relative;">
                                    {{ $opt['weight'] }}
                                    @if($optStock == 0)
                                        <small style="color: #DC2626; font-size: 0.75rem;">(Sold Out)</small>
                                    @elseif($optStock < 10)
                                        <small style="color: #B45309; font-size: 0.75rem;">({{ $optStock }} left)</small>
                                    @endif
                                </a>
                            @endforeach
                        </div>

                        @if($defStock == 0)
                            <div style="margin-top: 8px;">
                                <span style="display: inline-block; padding: 2px 8px; background: #FEE2E2; color: #DC2626; border-radius: 4px; font-size: 0.78rem; font-weight: 600;">
                                    <i class="fa-solid fa-circle-xmark"></i> Default Size Sold Out
                                </span>
                            </div>
                        @elseif($defStock < 10)
                            <div style="margin-top: 8px;">
                                <span style="display: inline-block; padding: 2px 8px; background: #FEF3C7; color: #B45309; border-radius: 4px; font-size: 0.78rem; font-weight: 600;">
                                    <i class="fa-solid fa-triangle-exclamation"></i> Only {{ $defStock }} left!
                                </span>
                            </div>
                        @endif
                    </div>
                </a>
                <!-- Add to Cart -->
                <div class="product-card-atc">
                    @if($defStock > 0)
                    <form action="/cart/add/{{ $slug }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="option" value="{{ $p['default_option'] }}">
                        <button type="submit" class="btn-primary product-atc-btn" aria-label="Add {{ $p['name'] }} to cart">
                            <i class="fa-solid fa-basket-shopping" aria-hidden="true"></i> Add to Cart
                        </button>
                    </form>
                    @else
                    <a href="/shop/{{ $slug }}" class="btn-primary product-atc-btn" style="background: #9CA3AF; cursor: pointer; text-decoration: none; text-align: center;">
                        <i class="fa-solid fa-eye" aria-hidden="true"></i> Select Options
                    </a>
                    @endif
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

@php
    $latestReviews = \App\Models\Review::where('status', 'approved')
        ->latest()
        ->take(3)
        ->get();
@endphp

@if($latestReviews->isNotEmpty())
<!-- Latest Reviews Section -->
<section class="reviews-section section-padding" style="background-color: #fbf9f6; border-top: 1px solid var(--border-light);" aria-labelledby="reviews-heading">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <span class="section-eyebrow">Customer Feedback</span>
            <h2 class="section-title" id="reviews-heading">What Our Customers Say</h2>
            <div class="section-divider"></div>
        </div>
        <div class="reviews-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 40px;">
            @foreach($latestReviews as $review)
            @php
                $pName = $productsConfig[$review->product_slug]['name'] ?? 'Raw NZ Honey';
            @endphp
            <div class="review-card animate-on-scroll" style="background: var(--white); padding: 30px; border-radius: var(--radius-lg); box-shadow: var(--shadow); border: 1px solid var(--border-light); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div class="review-card-stars" style="color: var(--gold); margin-bottom: 12px; font-size: 0.95rem;">
                        @for($i = 0; $i < 5; $i++)
                            @if($i < $review->rating)
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                            @else
                                <i class="fa-regular fa-star" aria-hidden="true"></i>
                            @endif
                        @endfor
                    </div>
                    <p class="review-card-text" style="color: var(--text-dark); font-size: 0.95rem; font-style: italic; line-height: 1.6; margin-bottom: 20px;">
                        "{{ $review->comment }}"
                    </p>
                </div>
                <div class="review-card-author" style="border-top: 1px solid var(--border-light); padding-top: 15px; display: flex; justify-content: space-between; align-items: center; font-size: 0.85rem;">
                    <div>
                        <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">{{ $review->reviewer_name }}</strong>
                        <span style="color: var(--text-muted);">Verified Buyer</span>
                    </div>
                    <a href="/shop/{{ $review->product_slug }}" style="color: var(--gold-dark); text-decoration: underline; font-weight: 600;" class="review-product-link">
                        {{ $pName }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

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
