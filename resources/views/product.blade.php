@extends('layouts.app')

@section('title', $product['name'] . ' | Buy NZ Honey Online | Forest Fairy Honey')
@section('meta_description', 'Buy ' . $product['name'] . ' from Forest Fairy Honey NZ. Pure, raw, cold-harvested New Zealand honey. ' . $product['description'])
@section('canonical', 'https://www.forestfairyhoney.co.nz/shop/' . $slug)
@section('og_type', 'product')

@php
    $selectedOptionKey = request('option', $product['default_option']);
    // Fallback if the requested option doesn't exist
    if (!isset($product['options'][$selectedOptionKey])) {
        $selectedOptionKey = $product['default_option'];
    }
    $selectedOption = $product['options'][$selectedOptionKey];
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
    "price": "{{ $selectedOption['price'] }}",
    "priceCurrency": "NZD",
    "availability": "https://schema.org/InStock",
    "url": "https://www.forestfairyhoney.co.nz/shop/{{ $slug }}",
    "seller": {
      "@@type": "Organization",
      "name": "Forest Fairy Honey"
    }
  }
  @if($reviewsCount > 0)
  ,"aggregateRating": {
    "@@type": "AggregateRating",
    "ratingValue": "{{ $averageRating }}",
    "reviewCount": "{{ $reviewsCount }}",
    "bestRating": "5",
    "worstRating": "1"
  }
  @endif
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
                <div class="product-detail-stars" aria-label="Rated {{ $averageRating }} out of 5">
                    @php
                        $full = floor($averageRating);
                        $half = ($averageRating - $full) >= 0.5 ? 1 : 0;
                        $empty = 5 - $full - $half;
                        $starsHtml = str_repeat('<i class="fa-solid fa-star" aria-hidden="true"></i>', $full)
                            . ($half ? '<i class="fa-solid fa-star-half-stroke" aria-hidden="true"></i>' : '')
                            . str_repeat('<i class="fa-regular fa-star" aria-hidden="true"></i>', $empty);
                    @endphp
                    <span class="product-stars">{!! $starsHtml !!}</span>
                    <span class="product-rating-text">
                        @if($reviewsCount > 0)
                            {{ $averageRating }} ({{ $reviewsCount }} {{ Str::plural('review', $reviewsCount) }})
                        @else
                            No reviews yet
                        @endif
                    </span>
                    <a href="/review-policy" style="font-size: 0.8rem; margin-left: 10px; color: var(--gold-dark); text-decoration: underline; font-weight: 500;" id="review-policy-link">Review Policy</a>
                </div>
                
                <div class="product-detail-price">
                    <span class="product-price-lg" id="displayPrice">${{ $selectedOption['price'] }}</span>
                    <span class="product-weight" id="displayWeight">/ {{ $selectedOption['weight'] }}</span>
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
                    
                    <div class="product-option-row--pills">
                        <label class="product-option-label--pills">Size</label>
                        <div class="variant-pills" id="variantPills">
                            @foreach($product['options'] as $key => $opt)
                                <button type="button" 
                                        class="variant-pill {{ $key === $selectedOptionKey ? 'active' : '' }}" 
                                        data-key="{{ $key }}" 
                                        data-price="{{ $opt['price'] }}" 
                                        data-weight="{{ $opt['weight'] }}">
                                    {{ $opt['weight'] }}
                                </button>
                            @endforeach
                        </div>
                        <input type="hidden" name="option" id="selectedOption" value="{{ $selectedOptionKey }}">
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

                <!-- Product Trust Block -->
                <div class="product-trust-card" style="margin: 20px 0; padding: 15px; border: 1px solid #e2d9c8; border-radius: var(--radius); background-color: #fbf9f6; font-size: 0.9rem;">
                    <div style="display: flex; gap: 10px; align-items: start;">
                        <i class="fa-solid fa-shield-halved" style="color: var(--gold); margin-top: 3px; font-size: 1.1rem;"></i>
                        <div>
                            @if($slug === 'mamaku-creamed-honey')
                                <strong style="display: block; color: var(--text-dark); margin-bottom: 4px;">Independently lab tested</strong>
                                <span style="display: block; color: var(--text-muted); line-height: 1.4;">Tested by Hill Labs, Hamilton. MGO 125.</span>
                                <span style="display: block; color: var(--text-muted); line-height: 1.4;">Raw, small batch, comb to jar. Nothing added, never heated.</span>
                            @else
                                <strong style="display: block; color: var(--text-dark); margin-bottom: 4px;">Raw and small batch</strong>
                                <span style="display: block; color: var(--text-muted); line-height: 1.4;">Comb to jar. Nothing added, never heated.</span>
                                <span style="display: block; color: var(--text-muted); line-height: 1.4;">Independently lab tested by Hill Labs, Hamilton.</span>
                            @endif
                            <a href="/our-testing" style="display: inline-block; margin-top: 6px; color: var(--gold); font-weight: 600; text-decoration: underline;">See our test results</a>
                        </div>
                    </div>
                </div>

                <p class="product-note"><i class="fa-solid fa-truck-fast" aria-hidden="true"></i> Free NZ shipping on orders over $75</p>

                <script>
                (function(){
                    var qtyInput = document.getElementById('qty');
                    var selectedOptionInput = document.getElementById('selectedOption');
                    var displayPrice = document.getElementById('displayPrice');
                    var displayWeight = document.getElementById('displayWeight');
                    var pills = document.querySelectorAll('.variant-pill');

                    document.getElementById('qtyMinus').addEventListener('click', function(){
                        if(parseInt(qtyInput.value) > 1) qtyInput.value = parseInt(qtyInput.value) - 1;
                    });
                    document.getElementById('qtyPlus').addEventListener('click', function(){
                        if(parseInt(qtyInput.value) < 10) qtyInput.value = parseInt(qtyInput.value) + 1;
                    });

                    pills.forEach(function(pill) {
                        pill.addEventListener('click', function() {
                            // Update active state
                            pills.forEach(p => p.classList.remove('active'));
                            this.classList.add('active');

                            // Update hidden input
                            var key = this.getAttribute('data-key');
                            selectedOptionInput.value = key;

                            // Update display info
                            displayPrice.textContent = '$' + this.getAttribute('data-price');
                            displayWeight.textContent = '/ ' + this.getAttribute('data-weight');
                        });
                    });
                })();
                </script>
            </div>
        </div>
    </div>
</section>

<!-- Customer Reviews -->
<section class="reviews-section section-padding" style="background-color: #ffffff; border-top: 1px solid #F3EDE1;" id="customer-reviews">
    <div class="container" style="max-width: 900px;">
        <div class="section-header animate-on-scroll" style="text-align: center; margin-bottom: 40px;">
            <h2 class="section-title" style="font-family: 'Playfair Display', Georgia, serif; font-size: 2.2rem; color: var(--text-dark);">Customer Reviews</h2>
            <div class="section-divider" style="background-color: var(--gold); width: 60px; height: 3px; margin: 15px auto;"></div>
            
            <div style="display: flex; justify-content: center; align-items: center; gap: 15px; margin-top: 15px;">
                <div style="font-size: 2.5rem; font-weight: bold; color: var(--text-dark);">{{ $averageRating ?: '0.0' }}</div>
                <div>
                    <div style="font-size: 1.2rem; color: var(--gold-dark);">
                        @php
                            $full = floor($averageRating);
                            $half = ($averageRating - $full) >= 0.5 ? 1 : 0;
                            $empty = 5 - $full - $half;
                            $starsHtml = str_repeat('<i class="fa-solid fa-star"></i>', $full)
                                . ($half ? '<i class="fa-solid fa-star-half-stroke"></i>' : '')
                                . str_repeat('<i class="fa-regular fa-star"></i>', $empty);
                        @endphp
                        {!! $starsHtml !!}
                    </div>
                    <span style="font-size: 0.9rem; color: var(--text-muted);">Based on {{ $reviewsCount }} {{ Str::plural('review', $reviewsCount) }}</span>
                </div>
            </div>
        </div>

        <div class="reviews-list animate-on-scroll">
            @forelse($dbReviews as $review)
            <div class="review-card" style="padding: 25px 0; border-bottom: 1px solid #F3EDE1; display: flex; flex-direction: column; gap: 10px;">
                <div style="display: flex; justify-content: space-between; align-items: start; flex-wrap: wrap; gap: 5px;">
                    <div>
                        <strong style="font-size: 1.05rem; color: var(--text-dark); display: inline-flex; align-items: center; gap: 8px;">
                            {{ $review->reviewer_name }}
                            <span style="display: inline-flex; align-items: center; gap: 3px; font-size: 0.75rem; background-color: #E2ECD8; color: #43692A; padding: 3px 8px; border-radius: 50px; font-weight: 600;">
                                <i class="fa-solid fa-circle-check" style="font-size: 0.8rem;"></i> Verified Buyer
                            </span>
                        </strong>
                        <div style="color: var(--gold-dark); font-size: 0.9rem; margin-top: 4px;">
                            {!! str_repeat('<i class="fa-solid fa-star"></i>', $review->rating) . str_repeat('<i class="fa-regular fa-star"></i>', 5 - $review->rating) !!}
                        </div>
                    </div>
                    <span style="font-size: 0.85rem; color: var(--text-muted);">{{ $review->created_at->format('d M Y') }}</span>
                </div>
                
                @if($review->comment)
                <p style="font-size: 0.95rem; line-height: 1.6; color: var(--text-dark); margin: 0; white-space: pre-line;">
                    {{ $review->comment }}
                </p>
                @endif
            </div>
            @empty
            <div style="text-align: center; padding: 40px 20px; border: 1px dashed #e2d9c8; border-radius: var(--radius); background-color: #FAF7F2;">
                <p style="font-size: 1rem; color: var(--text-muted); margin: 0;">No reviews yet for this honey.</p>
                <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 5px;">Only verified buyers who purchased this product can submit a review.</p>
            </div>
            @endforelse
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
                        <div class="product-stars" aria-label="Rated 5 out of 5">
                            <i class="fa-solid fa-star" aria-hidden="true"></i>
                            <i class="fa-solid fa-star" aria-hidden="true"></i>
                            <i class="fa-solid fa-star" aria-hidden="true"></i>
                            <i class="fa-solid fa-star" aria-hidden="true"></i>
                            <i class="fa-solid fa-star" aria-hidden="true"></i>
                        </div>
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
