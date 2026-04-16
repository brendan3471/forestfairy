<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Raw NZ Honey Online | Forest Fairy Honey New Zealand')</title>
    <meta name="description" content="@yield('meta_description', 'Forest Fairy Honey — pure, raw New Zealand honey harvested from pristine NZ forests and pastures. Shop manuka, bush, clover & honeydew honey online. Free NZ shipping over $75.')">
    <meta name="keywords" content="@yield('meta_keywords', 'honey NZ, buy honey online New Zealand, raw honey New Zealand, manuka honey NZ, NZ honey online store, forest honey New Zealand, natural honey NZ')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="@yield('canonical', 'https://forestfairyhoney.co.nz')">

    <!-- Open Graph -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('og_title', 'Forest Fairy Honey NZ — Raw New Zealand Honey')">
    <meta property="og:description" content="@yield('og_description', 'Pure, raw New Zealand honey harvested from pristine NZ forests. Shop online – free NZ shipping over $75.')">
    <meta property="og:url" content="@yield('canonical', 'https://forestfairyhoney.co.nz')">
    <meta property="og:site_name" content="Forest Fairy Honey">
    <meta property="og:locale" content="en_NZ">
    <meta property="og:image" content="https://forestfairyhoney.co.nz/images/og-image.jpg">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'Forest Fairy Honey NZ — Raw New Zealand Honey')">
    <meta name="twitter:description" content="@yield('og_description', 'Pure, raw New Zealand honey harvested from pristine NZ forests. Shop online.')">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- JSON-LD Schema -->
    @yield('schema')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Header -->
    <header class="site-header" id="siteHeader">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="container top-bar-inner">
                <div class="top-bar-left">
                    <span><i class="fa-solid fa-truck-fast" aria-hidden="true"></i> Free NZ shipping over $75</span>
                    <span class="top-bar-divider">|</span>
                    <span><i class="fa-solid fa-leaf" aria-hidden="true"></i> 100% Raw &amp; Natural</span>
                </div>
                <div class="top-bar-right">
                    <a href="mailto:hello@forestfairyhoney.co.nz" class="top-bar-link">
                        <i class="fa-solid fa-envelope" aria-hidden="true"></i> hello@forestfairyhoney.co.nz
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Nav -->
        <nav class="main-nav" id="mainNav" aria-label="Main navigation">
            <div class="container nav-inner">
                <!-- Logo -->
                <a href="/" class="logo" aria-label="Forest Fairy Honey Home">
                    <div class="logo-mark">
                        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <ellipse cx="20" cy="22" rx="14" ry="12" fill="#D4A843" opacity="0.15"/>
                            <path d="M20 4C20 4 12 10 12 18C12 22.4 15.6 26 20 26C24.4 26 28 22.4 28 18C28 10 20 4 20 4Z" fill="#D4A843"/>
                            <path d="M16 18C16 18 14 22 16 25C17.5 27 19 27.5 20 27.5" stroke="#7B5C3A" stroke-width="1.5" stroke-linecap="round"/>
                            <circle cx="20" cy="32" r="5" fill="#7EB87A" opacity="0.7"/>
                            <path d="M17 32 Q20 28 23 32" stroke="#fff" stroke-width="1" fill="none"/>
                        </svg>
                    </div>
                    <div class="logo-text">
                        <span class="logo-name">Forest Fairy</span>
                        <span class="logo-sub">Honey</span>
                    </div>
                </a>

                <!-- Desktop Nav -->

                <div class="nav-actions">
                    <!-- Cart Icon -->
                    @php $cartCount = array_sum(array_column(session('cart', []), 'quantity')); @endphp
                    <a href="/cart" class="nav-cart" aria-label="View cart ({{ $cartCount }} item{{ $cartCount !== 1 ? 's' : '' }})" id="navCartBtn">
                        <i class="fa-solid fa-basket-shopping" aria-hidden="true"></i>
                        @if($cartCount > 0)
                        <span class="cart-badge" aria-hidden="true">{{ $cartCount }}</span>
                        @endif
                    </a>
                    <a href="/shop" class="btn-primary nav-cta" id="shopNowBtn">Shop Now</a>
                    <!-- Mobile Menu Button -->
                    <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle navigation menu" aria-expanded="false">
                        <svg class="menu-icon" id="menuIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><line x1="4" x2="20" y1="8" y2="8"></line><line x1="4" x2="20" y1="16" y2="16"></line></svg>
                        <svg class="close-icon hidden" id="closeIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Nav -->
            <div class="mobile-nav hidden" id="mobileNav">
                <div class="container mobile-nav-inner">
                    <a href="/shop" class="btn-primary mobile-cta" id="mobileShopBtn">Shop Honey</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main id="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="site-footer" id="contact">
        <div class="footer-top">
            <div class="container">
                <div class="footer-grid">
                    <!-- Brand Column -->
                    <div class="footer-col footer-brand">
                        <div class="footer-logo">
                            <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="footer-logo-icon">
                                <path d="M20 4C20 4 12 10 12 18C12 22.4 15.6 26 20 26C24.4 26 28 22.4 28 18C28 10 20 4 20 4Z" fill="#D4A843"/>
                                <circle cx="20" cy="32" r="5" fill="#7EB87A" opacity="0.7"/>
                            </svg>
                            <div>
                                <span class="footer-logo-name">Forest Fairy Honey</span>
                                <span class="footer-logo-sub">New Zealand</span>
                            </div>
                        </div>
                        <p class="footer-about">Pure, raw honey harvested from New Zealand's pristine forests and meadows. From our hives to your home — nothing added, nothing taken away.</p>
                        <div class="footer-socials">
                            <a href="#" class="social-link" aria-label="Follow Forest Fairy Honey on Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" class="social-link" aria-label="Like Forest Fairy Honey on Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <!-- Shop Links -->
                    <div class="footer-col">
                        <h3 class="footer-heading">Shop</h3>
                        <ul class="footer-links">
                            <li><a href="/shop"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i> All Honey</a></li>
                            <li><a href="/shop/omanawa-falls-creamed-honey"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i> Omanawa Falls</a></li>
                            <li><a href="/shop/mamaku-creamed-honey"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i> Mamaku Creamed</a></li>
                            <li><a href="/shop/otumoetai-summer-harvest-creamed-honey"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i> Summer Harvest</a></li>
                            <li><a href="/shop/rewarewa-honey"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i> Rewarewa Honey</a></li>
                        </ul>
                    </div>

                    <!-- Info Links -->
                    <div class="footer-col">
                        <h3 class="footer-heading">Explore</h3>
                        <ul class="footer-links">
                            <li><a href="/about"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i> Our Story</a></li>
                            <li><a href="/blog"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i> Honey Blog</a></li>
                            <li><a href="/contact"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i> Contact Us</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="footer-col">
                        <h3 class="footer-heading">Contact</h3>
                        <ul class="footer-contact">
                            <li>
                                <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                                <span>Bay of Plenty, New Zealand</span>
                            </li>
                            <li>
                                <a href="mailto:hello@forestfairyhoney.co.nz">
                                    <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                                    <span>hello@forestfairyhoney.co.nz</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Newsletter -->
                        <div class="footer-newsletter">
                            <p class="newsletter-label">Get honey news &amp; offers</p>
                            <form class="newsletter-form" id="newsletterForm" aria-label="Newsletter signup">
                                <input type="email" placeholder="Your email" class="newsletter-input" id="newsletterEmail" aria-label="Email address" required>
                                <button type="submit" class="newsletter-btn" id="newsletterSubmit" aria-label="Subscribe">
                                    <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trust Badges Bar -->
        <div class="footer-trust">
            <div class="container">
                <div class="trust-badges">
                    <div class="trust-badge">
                        <i class="fa-solid fa-seedling" aria-hidden="true"></i>
                        <span>100% Natural NZ Honey</span>
                    </div>
                    <div class="trust-badge">
                        <i class="fa-solid fa-temperature-low" aria-hidden="true"></i>
                        <span>Cold-Harvested &amp; Raw</span>
                    </div>
                    <div class="trust-badge">
                        <i class="fa-solid fa-truck-fast" aria-hidden="true"></i>
                        <span>Free NZ Shipping $75+</span>
                    </div>
                    <div class="trust-badge">
                        <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
                        <span>Secure Checkout</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <p>© 2026 Forest Fairy Honey. Pure New Zealand Honey. All rights reserved. | <a href="/contact">Contact</a> | <a href="#">Privacy Policy</a> | <a href="/admin/login" style="opacity: 0.5;">Admin</a></p>
            </div>
        </div>
    </footer>
</body>
</html>
