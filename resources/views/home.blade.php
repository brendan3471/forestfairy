@extends('layouts.app')

@section('title', 'Raw NZ Honey Online Store | Forest Fairy Honey New Zealand')
@section('meta_description', 'Shop pure, raw New Zealand honey online. Manuka, bush, clover & honeydew honey — cold-harvested from NZ\'s pristine forests. Free shipping on orders over $75.')
@section('canonical', 'https://forestfairyhoney.co.nz')

@section('schema')
<script type="application/ld+json">
@verbatim
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "https://forestfairyhoney.co.nz/#organization",
      "name": "Forest Fairy Honey",
      "url": "https://forestfairyhoney.co.nz",
      "logo": "https://forestfairyhoney.co.nz/images/logo.svg",
      "description": "Pure, raw New Zealand honey harvested from pristine NZ forests and meadows.",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Bay of Plenty",
        "addressCountry": "NZ"
      },
      "email": "hello@forestfairyhoney.co.nz",
      "sameAs": ["https://instagram.com/forestfairyhoney", "https://facebook.com/forestfairyhoney"]
    },
    {
      "@type": "WebSite",
      "@id": "https://forestfairyhoney.co.nz/#website",
      "url": "https://forestfairyhoney.co.nz",
      "name": "Forest Fairy Honey",
      "publisher": {"@id": "https://forestfairyhoney.co.nz/#organization"},
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://forestfairyhoney.co.nz/shop?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
  ]
}
@endverbatim
</script>
@endsection

@section('content')
<!-- Hero Section -->
<section id="home" class="hero" aria-label="Hero">
    <div class="hero-slides" id="heroSlides">
        <div class="hero-slide active" data-slide="0">
            <img src="/images/behives-shot.jpg" alt="Forest Fairy Honey beehives in a lush New Zealand native bush setting" loading="eager">
            <div class="hero-product-floating">
                <a href="/shop/omanawa-falls-creamed-honey" class="hero-product-link">
                    <img src="/images/omanawa-falls-floating.png" alt="Omanawa Falls Creamed Honey Jar" class="floating-jar">
                </a>
            </div>
        </div>
        <div class="hero-slide" data-slide="1">
            <img src="/images/honey-collection.jpg" alt="Our range of raw New Zealand honey varieties correctly bottled and labelled" loading="lazy">
            <div class="hero-product-floating">
                <a href="/shop/mamaku-creamed-honey" class="hero-product-link">
                    <img src="/images/mamaku-floating.png" alt="Mamaku Creamed Honey Jar" class="floating-jar">
                </a>
            </div>
        </div>
        <div class="hero-slide" data-slide="2">
            <img src="/images/creator-photo-with-behives.jpg" alt="Our beekeeper working with the hives in a sunny NZ meadow" loading="lazy">
            <div class="hero-product-floating">
                <a href="/shop/rewarewa-honey" class="hero-product-link">
                    <img src="/images/rewarewa-floating.png" alt="Rewarewa Honey Jar" class="floating-jar">
                </a>
            </div>
        </div>
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="container">
            <span class="hero-eyebrow animate-on-load">Pure New Zealand Honey</span>
            <h1 class="hero-title animate-on-load">From the Forest<br><em>to Your Table</em></h1>
            <p class="hero-subtitle animate-on-load">Cold-harvested, raw, and full of nature's goodness.<br>No additives. No shortcuts. Just real New Zealand honey.</p>
            <div class="hero-actions animate-on-load">
                <a href="/shop" class="btn-primary hero-btn" id="heroShopBtn">Shop Our Honey</a>
                <a href="/about" class="btn-outline-light hero-btn-secondary" id="heroAboutBtn">Our Story</a>
            </div>
        </div>
    </div>
    <button class="hero-arrow hero-arrow-left" id="prevSlide" aria-label="Previous slide">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"></path></svg>
    </button>
    <button class="hero-arrow hero-arrow-right" id="nextSlide" aria-label="Next slide">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"></path></svg>
    </button>
    <div class="hero-dots" id="heroDots">
        <button class="hero-dot active" data-slide="0" aria-label="Go to slide 1"></button>
        <button class="hero-dot" data-slide="1" aria-label="Go to slide 2"></button>
        <button class="hero-dot" data-slide="2" aria-label="Go to slide 3"></button>
    </div>
</section>

<!-- Trust Strip -->
<section class="trust-strip" aria-label="Trust signals">
    <div class="container">
        <div class="trust-strip-inner">
            <div class="trust-item animate-on-scroll">
                <i class="fa-solid fa-seedling" aria-hidden="true"></i>
                <span>100% Raw &amp; Natural</span>
            </div>
            <div class="trust-divider"></div>
            <div class="trust-item animate-on-scroll">
                <i class="fa-solid fa-certificate" aria-hidden="true"></i>
                <span>NZ-Made &amp; Certified</span>
            </div>
            <div class="trust-divider"></div>
            <div class="trust-item animate-on-scroll">
                <i class="fa-solid fa-temperature-low" aria-hidden="true"></i>
                <span>Cold-Harvested</span>
            </div>
            <div class="trust-divider"></div>
            <div class="trust-item animate-on-scroll">
                <i class="fa-solid fa-truck-fast" aria-hidden="true"></i>
                <span>Free NZ Shipping $75+</span>
            </div>
        </div>
    </div>
</section>

<!-- Bestsellers Section -->
<section id="shop" class="products section-padding" aria-labelledby="products-heading">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <span class="section-eyebrow">From Our Hives</span>
            <h2 class="section-title" id="products-heading">Our Bestselling Honeys</h2>
            <div class="section-divider"></div>
            <p class="section-subtitle">Every jar is a taste of New Zealand's wildest places — harvested with care and bottled with love.</p>
        </div>
        <div class="products-grid">
            @php
            $productsConfig = config('products');
            $imgMap = [
                'omanawa-falls' => '/images/Omanawa-falls-creamed-honey.jpg',
                'mamaku'        => '/images/mamaku-creamed-honey.jpg',
                'otumoetai'     => '/images/otumoetai-summer-harvest-creamed-honey.jpg',
                'rewarewa'      => '/images/rewarewa-honey.jpg',
            ];
            @endphp
            
            @foreach($productsConfig as $slug => $p)
            @php
                $defaultOpt = $p['options'][$p['default_option']];
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
                        <div class="product-price-row">
                            <span class="product-price" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                                <meta itemprop="price" content="{{ $defaultOpt['price'] }}">
                                <meta itemprop="priceCurrency" content="NZD">
                                ${{ $defaultOpt['price'] }} <small>/ {{ $defaultOpt['weight'] }}</small>
                            </span>
                            <span class="product-cta">Shop Now →</span>
                        </div>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
        <div class="section-cta animate-on-scroll">
            <a href="/shop" class="btn-secondary" id="viewAllBtn">View All Honey</a>
        </div>
    </div>
</section>

<!-- About Teaser / CTA Banner -->
<section class="about-banner" aria-label="About our honey">
    <div class="about-banner-bg" style="background-image: url('/images/honey-collection-2.jpg')" role="img" aria-label="Forest Fairy Honey product collection in a warm setting"></div>
    <div class="about-banner-overlay"></div>
    <div class="about-banner-content animate-on-scroll">
        <div class="container">
            <span class="section-eyebrow section-eyebrow--light">Our Story</span>
            <h2 class="about-banner-title">Rooted in the<br><em>Heart of New Zealand</em></h2>
            <p class="about-banner-text">We're passionate NZ beekeepers who believe honey should be as nature made it. Our hives live among native bush, wildflower meadows and pristine forests — giving each jar its extraordinary depth of flavour.</p>
            <a href="/about" class="btn-outline-light" id="learnMoreBtn">Learn Our Story</a>
        </div>
    </div>
</section>

<!-- How It's Made -->
<section class="process section-padding" aria-labelledby="process-heading">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <span class="section-eyebrow">The Forest Fairy Way</span>
            <h2 class="section-title" id="process-heading">From Hive to Home</h2>
            <div class="section-divider"></div>
        </div>
        <div class="process-steps">
            <div class="process-step animate-on-scroll">
                <div class="process-icon">
                    <i class="fa-solid fa-tree" aria-hidden="true"></i>
                </div>
                <h3>Native Hive Placement</h3>
                <p>Our hives are carefully positioned in remote NZ forest locations — far from pesticides and pollution, close to native flowering trees.</p>
            </div>
            <div class="process-connector" aria-hidden="true"></div>
            <div class="process-step animate-on-scroll">
                <div class="process-icon">
                    <i class="fa-solid fa-circle-nodes" aria-hidden="true"></i>
                </div>
                <h3>Natural Ripening</h3>
                <p>We wait until each frame of comb is fully capped — meaning the honey has naturally ripened to below 20% moisture content.</p>
            </div>
            <div class="process-connector" aria-hidden="true"></div>
            <div class="process-step animate-on-scroll">
                <div class="process-icon">
                    <i class="fa-solid fa-temperature-low" aria-hidden="true"></i>
                </div>
                <h3>Cold Extraction</h3>
                <p>Honey is extracted at ambient temperature — never heated above 40°C — preserving natural enzymes, pollen, and antioxidants.</p>
            </div>
            <div class="process-connector" aria-hidden="true"></div>
            <div class="process-step animate-on-scroll">
                <div class="process-icon">
                    <i class="fa-solid fa-jar" aria-hidden="true"></i>
                </div>
                <h3>Hand-Bottled &amp; Sealed</h3>
                <p>Each jar is filled and sealed by hand, labelled with the harvest region, and dispatched fresh to your door across New Zealand.</p>
            </div>
        </div>
    </div>
</section>

<!-- Blog Teaser -->
<section class="blog-teaser section-padding section-padding--alt" aria-labelledby="blog-teaser-heading">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <span class="section-eyebrow">From the Hive</span>
            <h2 class="section-title" id="blog-teaser-heading">Honey Knowledge &amp; Recipes</h2>
            <div class="section-divider"></div>
        </div>
        <div class="blog-grid">
            <article class="blog-card animate-on-scroll">
                <a href="/blog" class="blog-card-link" aria-label="Read: What Makes Our Honey Special?">
                    <div class="blog-card-image">
                        <img src="/images/behives-shot.jpg" alt="Our colorful beehives in the New Zealand native bush" loading="lazy">
                    </div>
                    <div class="blog-card-content">
                        <span class="blog-tag">Education</span>
                        <h3>What Makes Our Regional Honey Special?</h3>
                        <p>From the Omanawa Falls to the Mamaku ranges, discover how each regional harvest captures a unique environment.</p>
                        <span class="blog-read-more">Read More →</span>
                    </div>
                </a>
            </article>
            <article class="blog-card animate-on-scroll">
                <a href="/blog" class="blog-card-link" aria-label="Read: Customer Stories">
                    <div class="blog-card-image">
                        <img src="/images/customer-trying-honey.jpg" alt="A happy customer trying Forest Fairy Honey at a local market" loading="lazy">
                    </div>
                    <div class="blog-card-content">
                        <span class="blog-tag">Stories</span>
                        <h3>Spreading the Love: Our Customer Stories</h3>
                        <p>There's nothing we love more than seeing the look on someone's face when they taste truly raw honey for the first time.</p>
                        <span class="blog-read-more">Read More →</span>
                    </div>
                </a>
            </article>
            <article class="blog-card animate-on-scroll">
                <a href="/blog" class="blog-card-link" aria-label="Read: Artisan Gifting">
                    <div class="blog-card-image">
                        <img src="/images/honey-collection.jpg" alt="Our honey jars beautifully presented and ready for gifting" loading="lazy">
                    </div>
                    <div class="blog-card-content">
                        <span class="blog-tag">Gifting</span>
                        <h3>The Art of Gifting: Pure NZ Honey Collections</h3>
                        <p>Discover why our beautifully labelled jars make the perfect gift for foodies, family, and friends across New Zealand.</p>
                        <span class="blog-read-more">Read More →</span>
                    </div>
                </a>
            </article>
        </div>
        <div class="section-cta animate-on-scroll">
            <a href="/blog" class="btn-secondary" id="viewBlogBtn">View All Articles</a>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials section-padding" aria-labelledby="testimonials-heading">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <span class="section-eyebrow">Happy Customers</span>
            <h2 class="section-title" id="testimonials-heading">What NZ Honey Lovers Say</h2>
            <div class="section-divider"></div>
            <div class="overall-rating" aria-label="Overall rating 5 out of 5">
                <span class="rating-stars">
                    <i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i>
                </span>
                <span class="rating-text">5.0 — Based on <strong>220+</strong> verified reviews</span>
            </div>
        </div>
        <div class="testimonials-grid">
            <article class="testimonial-card animate-on-scroll">
                <div class="testimonial-stars" aria-label="5 out of 5 stars">
                    <i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i>
                </div>
                <blockquote>
                    <p>"The best honey I've ever tasted. The Manuka is absolutely incredible — rich and dark with a depth I've never found in supermarket brands. Worth every cent."</p>
                </blockquote>
                <footer class="testimonial-author">
                    <div class="testimonial-avatar" aria-hidden="true">S</div>
                    <div>
                        <strong>Sarah M.</strong>
                        <span>Bay of Plenty</span>
                    </div>
                </footer>
            </article>
            <article class="testimonial-card animate-on-scroll">
                <div class="testimonial-stars" aria-label="5 out of 5 stars">
                    <i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i>
                </div>
                <blockquote>
                    <p>"We order the Bush Honey every month. It's replaced everything else in our pantry. Fast shipping, gorgeous packaging, and you can really taste the difference from raw honey."</p>
                </blockquote>
                <footer class="testimonial-author">
                    <div class="testimonial-avatar" aria-hidden="true">J</div>
                    <div>
                        <strong>James &amp; Aroha T.</strong>
                        <span>Wellington</span>
                    </div>
                </footer>
            </article>
            <article class="testimonial-card animate-on-scroll">
                <div class="testimonial-stars" aria-label="5 out of 5 stars">
                    <i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i>
                </div>
                <blockquote>
                    <p>"I bought the Honeydew as a gift and my mother cried — in the best way! She said it reminded her of the honey her grandmother used to make. Extraordinary product."</p>
                </blockquote>
                <footer class="testimonial-author">
                    <div class="testimonial-avatar" aria-hidden="true">K</div>
                    <div>
                        <strong>Kate R.</strong>
                        <span>Christchurch</span>
                    </div>
                </footer>
            </article>
        </div>
    </div>
</section>
@endsection
