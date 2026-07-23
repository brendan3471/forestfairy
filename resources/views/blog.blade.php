@extends('layouts.app')

@section('title', 'Honey Blog — NZ Honey Tips, Recipes & Education | Forest Fairy Honey')
@section('meta_description', 'Explore the Forest Fairy Honey blog for NZ honey knowledge, health benefits of raw honey, Manuka honey guides, recipes, and beekeeping insights.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/blog')

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
            ['slug' => 'mgo-explained', 'tag' => 'Education', 'title' => 'What Does MGO Mean? MGO Explained', 'excerpt' => 'What MGO means on a honey label, how it differs from UMF, and why an MGO number alone does not make honey manuka.', 'img' => '/images/honey-collection.jpg', 'img_alt' => 'Honey jars with labels on shelf', 'date' => 'July 2026'],
            ['slug' => 'mezes-kremes', 'tag' => 'Recipes', 'title' => 'Mézes Krémes: Traditional Hungarian Honey Cake', 'excerpt' => 'A traditional Hungarian honey cake of soft, honey-spiced layers holding a rich vanilla custard cream, finished with glossy chocolate.', 'img' => '/images/M%C3%A9zes-Kr%C3%A9mes.jpg', 'img_alt' => 'Mézes Krémes Hungarian honey cake slices with chocolate top', 'date' => 'July 2026'],
            ['slug' => 'honey-oat-biscuits', 'tag' => 'Recipes', 'title' => 'Honey Oat Biscuits: Crunchy, Golden & Easy', 'excerpt' => 'An easy one-bowl biscuit that lets a good creamed honey do the talking. Try our interactive recipe where you can scale ingredients to make exactly as many as you need.', 'img' => '/images/Honey-Oat-Biscuits.jpg', 'img_alt' => 'Crunchy golden honey oat biscuits ready to eat', 'date' => 'July 2026'],
            ['slug' => 'baking-with-honey', 'tag' => 'Recipes', 'title' => 'How to Substitute Sugar with Honey in Baking', 'excerpt' => 'Swapping sugar for honey in your baking is easy once you know the four adjustments that make it work: the right ratios, adjusting other liquids, adding baking soda, and dropping the oven temperature.', 'img' => '/images/honey-recipe.jpg', 'img_alt' => 'Honey jar with wooden honey dipper', 'date' => 'July 2026'],
            ['slug' => 'the-art-of-gifting-nz-honey-collections', 'tag' => 'Gifting', 'title' => 'The Art of Gifting: Pure NZ Honey Collections', 'excerpt' => 'Looking for a gift that feels thoughtful without being fussy? Here is how to put together a New Zealand honey gift, and which of our jars to pick for foodies, family, and friends.', 'img' => '/images/honey-collection.jpg', 'img_alt' => 'Our honey jars beautifully presented and ready for gifting', 'date' => 'April 2026'],
            ['slug' => 'regional-honey-profiles', 'tag' => 'Education', 'title' => 'Regional Profiles: From Omanawa to Mamaku', 'excerpt' => 'Discover how the unique soil and climate of New Zealand\'s regions — from the Omanawa Falls to the Mamaku ranges — shape the flavor of every jar.', 'img' => '/images/behives-shot.jpg', 'img_alt' => 'Our colorful beehives in the NZ bush', 'date' => 'March 2026'],
            ['slug' => 'the-art-of-labeling', 'tag' => 'Brand', 'title' => 'Honest Labels: What Goes Into Every Jar', 'excerpt' => 'A label can be completely legal and still tell you almost nothing. Here is how to read a honey label properly, including ours.', 'img' => '/images/honest-labels-1.jpg', 'img_alt' => 'Forest Fairy Honey cabbage tree forest view', 'date' => 'February 2026'],
            ['slug' => 'the-customer-experience', 'tag' => 'Community', 'title' => 'Taste the Difference: Real Feedback from Real People', 'excerpt' => 'Join us as we share stories from our customers — from those who discovered us at markets to those who order their monthly staples online.', 'img' => '/images/customer-trying-honey.jpg', 'img_alt' => 'Customer trying honey', 'date' => 'January 2026'],
            ['slug' => 'raw-vs-commercial', 'tag' => 'Education', 'title' => 'Raw vs Processed Honey: Why Real Truly Matters', 'excerpt' => 'Most supermarket honey is heated and filtered before it reaches the shelf. Here is what that does to it, and the two lab numbers that show whether honey was ever really heated.', 'img' => '/images/honey-collection-2.jpg', 'img_alt' => 'Close up of honey jars', 'date' => 'December 2025'],
            ['slug' => 'beekeeping-diaries', 'tag' => 'Behind the Scenes', 'title' => 'Behind the Hives: A Day in the Life', 'excerpt' => 'Step into the meadow with our lead beekeeper and see what it takes to manage healthy, happy colonies in the heart of New Zealand.', 'img' => '/images/creator-photo-with-behives.jpg', 'img_alt' => 'Beekeeper at work', 'date' => 'November 2025'],
        ];
        @endphp
        <div class="blog-grid blog-grid--full">
            @foreach($articles as $a)
            <article class="blog-card animate-on-scroll" itemscope itemtype="https://schema.org/Article">
                <a href="/blog/{{ $a['slug'] }}" class="blog-card-link" aria-label="Read: {{ $a['title'] }}">
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
