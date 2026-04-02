@extends('layouts.app')

@section('title', 'Honey Blog — NZ Honey Tips, Recipes & Education | Forest Fairy Honey')
@section('meta_description', 'Explore the Forest Fairy Honey blog for NZ honey knowledge, health benefits of raw honey, Manuka honey guides, recipes, and beekeeping insights.')
@section('canonical', 'https://forestfairyhoney.co.nz/blog')

@section('content')
<section class="page-hero page-hero--blog" aria-label="Blog page hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> <span aria-current="page">Blog</span>
        </nav>
        <h1 class="page-hero-title">From the Hive</h1>
        <p class="page-hero-subtitle">Honey knowledge, recipes, and beekeeping from New Zealand</p>
    </div>
</section>

<section class="blog-section section-padding" aria-labelledby="blog-heading">
    <div class="container">
        <h2 class="sr-only" id="blog-heading">All Blog Articles</h2>
        @php
        $articles = [
            ['slug' => 'regional-honey-profiles', 'tag' => 'Education', 'title' => 'Regional Profiles: From Omanawa to Mamaku', 'excerpt' => 'Discover how the unique soil and climate of New Zealand\'s regions — from the Omanawa Falls to the Mamaku ranges — shape the flavor of every jar.', 'img' => '/images/behives-shot.jpg', 'img_alt' => 'Our colorful beehives in the NZ bush', 'date' => 'March 2026'],
            ['slug' => 'the-art-of-labeling', 'tag' => 'Brand', 'title' => 'Honest Labels: What Goes Into Every Jar', 'excerpt' => 'We believe transparency is key. Learn how we meticulously harvest, bottle, and label our honey to ensure you know exactly what you\'re eating.', 'img' => '/images/honey-collection.jpg', 'img_alt' => 'Forest Fairy Honey jars display', 'date' => 'February 2026'],
            ['slug' => 'the-customer-experience', 'tag' => 'Community', 'title' => 'Taste the Difference: Real Feedback from Real People', 'excerpt' => 'Join us as we share stories from our customers — from those who discovered us at markets to those who order their monthly staples online.', 'img' => '/images/customer-trying-honey.jpg', 'img_alt' => 'Customer trying honey', 'date' => 'January 2026'],
            ['slug' => 'raw-vs-commercial', 'tag' => 'Education', 'title' => 'Raw vs Processed Honey: Why Real Truly Matters', 'excerpt' => 'Most supermarket honey has been heat-treated and stripped of its goodness. Here is why choosing raw, cold-harvested honey is a game-changer.', 'img' => '/images/honey-collection-2.jpg', 'img_alt' => 'Close up of honey jars', 'date' => 'December 2025'],
            ['slug' => 'beekeeping-diaries', 'tag' => 'Behind the Scenes', 'title' => 'Behind the Hives: A Day in the Life', 'excerpt' => 'Step into the meadow with our lead beekeeper and see what it takes to manage healthy, happy colonies in the heart of New Zealand.', 'img' => '/images/creator-photo-with-behives.jpg', 'img_alt' => 'Beekeeper at work', 'date' => 'November 2025'],
        ];
        @endphp
        <div class="blog-grid blog-grid--full">
            @foreach($articles as $a)
            <article class="blog-card animate-on-scroll" itemscope itemtype="https://schema.org/Article">
                <a href="/blog" class="blog-card-link" aria-label="Read: {{ $a['title'] }}">
                    <div class="blog-card-image">
                        <img src="{{ $a['img'] }}" alt="{{ $a['img_alt'] }}" loading="lazy" itemprop="image">
                    </div>
                    <div class="blog-card-content">
                        <span class="blog-tag">{{ $a['tag'] }}</span>
                        <h2 class="blog-card-title" itemprop="headline">{{ $a['title'] }}</h2>
                        <p itemprop="description">{{ $a['excerpt'] }}</p>
                        <div class="blog-card-footer">
                            <time class="blog-date" itemprop="datePublished" datetime="2026-01-01">{{ $a['date'] }}</time>
                            <span class="blog-read-more">Read More →</span>
                        </div>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
