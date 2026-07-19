@extends('layouts.app')

@section('title', 'Sitemap | Forest Fairy Honey')
@section('meta_description', 'HTML sitemap for Forest Fairy Honey. Easily find all pages, raw New Zealand honey products, guides, FAQs and policies.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/sitemap')

@section('content')
<!-- Page Hero -->
<section class="page-hero page-hero--about" aria-label="Sitemap page hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> <span aria-current="page">Sitemap</span>
        </nav>
        <h1 class="page-hero-title">Sitemap</h1>
        <p class="page-hero-subtitle">Find your way around our honey store</p>
    </div>
</section>

<!-- Sitemap Section -->
<section class="sitemap-section section-padding" aria-labelledby="sitemap-heading">
    <div class="container">
        <h2 class="sr-only" id="sitemap-heading">All Pages Directory</h2>
        
        <style>
            .sitemap-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 30px;
                margin-top: 20px;
            }
            .sitemap-card {
                background: var(--white);
                padding: 35px 30px;
                border-radius: var(--radius-lg);
                box-shadow: var(--shadow);
                border: 1px solid var(--border-light);
                transition: transform var(--transition), box-shadow var(--transition);
            }
            .sitemap-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            }
            .sitemap-card-header {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 20px;
                padding-bottom: 12px;
                border-bottom: 2px solid var(--gold-light);
            }
            .sitemap-card-icon {
                font-size: 1.3rem;
                color: var(--gold-dark);
            }
            .sitemap-card-title {
                font-size: 1.1rem;
                font-weight: 700;
                color: var(--text-dark);
                margin: 0;
            }
            .sitemap-links-list {
                list-style: none;
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: column;
                gap: 12px;
            }
            .sitemap-link-item a {
                display: flex;
                align-items: center;
                gap: 10px;
                color: var(--text-muted);
                text-decoration: none;
                font-weight: 500;
                transition: color var(--transition), transform var(--transition);
                font-size: 0.95rem;
            }
            .sitemap-link-item a:hover {
                color: var(--gold-dark);
                transform: translateX(4px);
            }
            .sitemap-link-item i {
                font-size: 0.8rem;
                color: var(--gold);
            }
        </style>

        <div class="sitemap-grid">
            <!-- Main Pages Column -->
            <div class="sitemap-card animate-on-scroll">
                <div class="sitemap-card-header">
                    <i class="fa-solid fa-compass sitemap-card-icon" aria-hidden="true"></i>
                    <h2 class="sitemap-card-title">Main Navigation</h2>
                </div>
                <ul class="sitemap-links-list">
                    <li class="sitemap-link-item">
                        <a href="/">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                            <span>Home Page</span>
                        </a>
                    </li>
                    <li class="sitemap-link-item">
                        <a href="/shop">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                            <span>Shop Our Honey</span>
                        </a>
                    </li>
                    <li class="sitemap-link-item">
                        <a href="/about">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                            <span>Our Story (About)</span>
                        </a>
                    </li>
                    <li class="sitemap-link-item">
                        <a href="/blog">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                            <span>Honey Blog &amp; Articles</span>
                        </a>
                    </li>
                    <li class="sitemap-link-item">
                        <a href="/contact">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                            <span>Contact Us</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Products Column -->
            <div class="sitemap-card animate-on-scroll">
                <div class="sitemap-card-header">
                    <i class="fa-solid fa-jar sitemap-card-icon" aria-hidden="true"></i>
                    <h2 class="sitemap-card-title">Our Honey Products</h2>
                </div>
                <ul class="sitemap-links-list">
                    <li class="sitemap-link-item">
                        <a href="/shop/omanawa-falls-creamed-honey">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                            <span>Omanawa Falls Creamed Honey</span>
                        </a>
                    </li>
                    <li class="sitemap-link-item">
                        <a href="/shop/mamaku-creamed-honey">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                            <span>Mamaku Creamed Honey MGO 100+</span>
                        </a>
                    </li>
                    <li class="sitemap-link-item">
                        <a href="/shop/otumoetai-summer-harvest-creamed-honey">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                            <span>Ōtumoetai Summer Harvest Creamed Honey</span>
                        </a>
                    </li>
                    <li class="sitemap-link-item">
                        <a href="/shop/rewarewa-honey">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                            <span>Rewarewa Honey</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Help & Information Column -->
            <div class="sitemap-card animate-on-scroll">
                <div class="sitemap-card-header">
                    <i class="fa-solid fa-circle-info sitemap-card-icon" aria-hidden="true"></i>
                    <h2 class="sitemap-card-title">Help &amp; Information</h2>
                </div>
                <ul class="sitemap-links-list">
                    <li class="sitemap-link-item">
                        <a href="/honey-questions">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                            <span>Honey Questions (FAQ)</span>
                        </a>
                    </li>
                    <li class="sitemap-link-item">
                        <a href="/honey-purity-pricing-faq">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                            <span>Purity &amp; Pricing FAQ</span>
                        </a>
                    </li>
                    <li class="sitemap-link-item">
                        <a href="/our-testing">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                            <span>Our Lab Test Results</span>
                        </a>
                    </li>
                    <li class="sitemap-link-item">
                        <a href="/review-policy">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                            <span>Customer Review Policy</span>
                        </a>
                    </li>
                    <li class="sitemap-link-item">
                        <a href="/privacy-policy">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                            <span>Privacy Policy</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
