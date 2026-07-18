@extends('layouts.app')

@section('title', 'Our Story — NZ Beekeepers | Forest Fairy Honey New Zealand')
@section('meta_description', 'Meet the passionate NZ beekeepers behind Forest Fairy Honey. Learn how we harvest raw, pure honey from New Zealand\'s pristine forests and meadows — sustainably and with love.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/about')

@section('content')
<!-- Page Hero -->
<section class="page-hero page-hero--about" aria-label="About page hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> <span aria-current="page">Our Story</span>
        </nav>
        <h1 class="page-hero-title">Our Story</h1>
        <p class="page-hero-subtitle">Rooted in New Zealand's wildest places</p>
    </div>
</section>

<!-- Story Section -->
<section class="story-section section-padding" aria-labelledby="story-heading">
    <div class="container">
        <div class="story-grid">
            <div class="story-image animate-on-scroll">
                <img src="/images/honey-collection-2.jpg" alt="A beautiful collection of Forest Fairy Honey jars in a warm, natural setting" loading="lazy">
            </div>
            <div class="story-text animate-on-scroll">
                <span class="section-eyebrow">How It Began</span>
                <h2 class="section-title" id="story-heading">Honey the Way<br>Nature Intended</h2>
                <div class="section-divider"></div>
                <p>Forest Fairy Honey was born out of a simple belief: that New Zealand's extraordinary natural landscapes produce something truly special, and that people deserve to taste it in its most honest form.</p>
                <p>Our founders began keeping bees in the Waitākere Ranges with just two hives and a curious love for New Zealand's native flora. Word spread quickly — friends, then family, then strangers would seek out our jars at local markets. The honey spoke for itself.</p>
                <p>Today we tend hives across several pristine New Zealand locations — from the mossy beech forests of the South Island to the rolling wildflower meadows of the North — but our approach hasn't changed: <strong>patience, respect for the bees, and zero compromise on quality.</strong></p>
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<section class="values-section section-padding section-padding--alt" aria-labelledby="values-heading">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <span class="section-eyebrow">What We Stand For</span>
            <h2 class="section-title" id="values-heading">Our Values</h2>
            <div class="section-divider"></div>
        </div>
        <div class="values-grid">
            <div class="value-card animate-on-scroll">
                <div class="value-icon"><i class="fa-solid fa-heart-pulse" aria-hidden="true"></i></div>
                <h3>Bees First</h3>
                <p>Healthy hives produce the best honey. We never over-harvest, always ensure the colony has enough for winter, and avoid chemicals in our beekeeping practice.</p>
            </div>
            <div class="value-card animate-on-scroll">
                <div class="value-icon"><i class="fa-solid fa-leaf" aria-hidden="true"></i></div>
                <h3>Honest Honey</h3>
                <p>No blending with offshore honey. No additives, no preservatives, no heating above 40°C. Just pure New Zealand honey, exactly as the bees made it.</p>
            </div>
            <div class="value-card animate-on-scroll">
                <div class="value-icon"><i class="fa-solid fa-earth-oceania" aria-hidden="true"></i></div>
                <h3>Sustainable Future</h3>
                <p>We work with conservation groups to plant native flowering trees and support healthy NZ ecosystems. Great honey and a great environment go hand in hand.</p>
            </div>
        </div>
    </div>
</section>

<!-- Beekeeper Photo Feature -->
<section class="beekeeper-section" aria-label="NZ Beekeeping">
    <div class="beekeeper-bg" style="background-image: url('/images/creator-photo-with-behives.jpg')" role="img" aria-label="Our beekeeper working with hives in the New Zealand sun"></div>
    <div class="beekeeper-overlay"></div>
    <div class="beekeeper-content animate-on-scroll">
        <div class="container">
            <h2>Proud NZ Beekeepers</h2>
            <p>Our small team of dedicated beekeepers work across multiple locations in New Zealand — monitoring hive health, managing natural foraging, and harvesting only when the time is right.</p>
            <a href="/shop" class="btn-primary" id="aboutShopBtn">Shop Our Honey</a>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="stats-section section-padding" aria-labelledby="stats-heading">
    <div class="container">
        <h2 class="sr-only" id="stats-heading">Forest Fairy Honey by the numbers</h2>
        <div class="stats-grid">
            <div class="stat-item animate-on-scroll">
                <span class="stat-number">6+</span>
                <span class="stat-label">Years Beekeeping</span>
            </div>
            <div class="stat-item animate-on-scroll">
                <span class="stat-number">220+</span>
                <span class="stat-label">Happy Customers</span>
            </div>
            <div class="stat-item animate-on-scroll">
                <span class="stat-number">4</span>
                <span class="stat-label">Honey Varieties</span>
            </div>
            <div class="stat-item animate-on-scroll">
                <span class="stat-number">100%</span>
                <span class="stat-label">NZ Made</span>
            </div>
        </div>
    </div>
</section>
@endsection
