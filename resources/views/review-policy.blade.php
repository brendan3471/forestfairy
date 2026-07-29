@extends('layouts.app')

@section('title', 'Our Review Policy | Forest Fairy Honey NZ')
@section('meta_description', 'How reviews work at Forest Fairy Honey. Real customers only, nothing deleted for being negative, and no paid or staff reviews. Here is exactly how we handle them.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/review-policy')
@section('og_title', 'Our Review Policy — Forest Fairy Honey NZ')
@section('og_description', 'How reviews work at Forest Fairy Honey. Real customers only, nothing deleted for being negative, no paid reviews.')

@section('content')
<!-- Page Hero -->
<section class="page-hero page-hero--about" aria-label="Review policy page hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> <span aria-current="page">Review Policy</span>
        </nav>
        <h1 class="page-hero-title">Our Review Policy</h1>
        <p class="page-hero-subtitle">Honest Reviews, Real Feedback</p>
    </div>
</section>

<!-- Content Section -->
<section class="faq-section section-padding" aria-labelledby="policy-page-heading">
    <div class="container">
        <h2 class="sr-only" id="policy-page-heading">Review Policy Details</h2>
        
        <div class="faq-meta-bar animate-on-scroll">
            <span><i class="fa-solid fa-user-pen" aria-hidden="true"></i> Published by: <strong>Forest Fairy Honey</strong></span>
            <span><i class="fa-solid fa-clock" aria-hidden="true"></i> Last updated: <strong>July 19, 2026</strong></span>
        </div>

        <div class="faq-layout">
            <!-- Sidebar Table of Contents -->
            <aside class="faq-sidebar animate-on-scroll" aria-label="Table of contents">
                <nav class="faq-toc-nav">
                    <!-- Category 1 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">1. Trust & Moderation</span>
                        <a href="#real-customers" class="faq-toc-link">Real customers only</a>
                        <a href="#no-deletion" class="faq-toc-link">No bad reviews deleted</a>
                        <a href="#when-removed" class="faq-toc-link">When reviews are removed</a>
                    </div>
                    
                    <!-- Category 2 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">2. Compliance & Ads</span>
                        <a href="#health-claims" class="faq-toc-link">Health claims rule</a>
                        <a href="#no-ads" class="faq-toc-link">No ads without asking</a>
                        <a href="#how-asked" class="faq-toc-link">How we ask for reviews</a>
                    </div>

                    <div class="faq-toc-group" style="margin-top: 20px; border-top: 1px solid var(--border-light); padding-top: 20px;">
                        <a href="/our-testing" class="faq-toc-link" style="font-weight: 600; color: var(--gold);"><i class="fa-solid fa-flask"></i> See Our Lab Results</a>
                    </div>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="faq-main">
                <!-- Section 1 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">1. Trust & Moderation</h3>
                    
                    <!-- Q1 -->
                    <article id="real-customers" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Only real customers can leave a review</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>Reviews on our product pages come from people who actually bought the honey.</strong></p>
                            <p>Every review is marked as a verified purchase, which means we can match it to a real order.</p>
                            <p>We do not write our own reviews. Our team, our family, and our friends do not post reviews of our honey. Nobody is paid to leave one.</p>
                        </div>
                    </article>

                    <!-- Q2 -->
                    <article id="no-deletion" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">We do not delete bad reviews</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>This is the important one. If someone leaves us two stars, it stays up.</strong></p>
                            <p>We do not hide low ratings. We do not filter the list to show the good ones first and bury the rest. We do not quietly remove a review because it stung. If our honey was not right for someone, you deserve to know that before you buy.</p>
                            <p>If we got something wrong, we would rather reply to it in public and fix it.</p>
                        </div>
                    </article>

                    <!-- Q3 -->
                    <article id="when-removed" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">When we do remove a review</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>There are a few cases where we will take a review down.</strong></p>
                            <p>We remove reviews that:</p>
                            <ul class="faq-list">
                                <li><i class="fa-solid fa-triangle-exclamation" aria-hidden="true"></i> Are abusive, rude about a person, or use offensive language.</li>
                                <li><i class="fa-solid fa-user-shield" aria-hidden="true"></i> Contain someone's private details, like an address or phone number.</li>
                                <li><i class="fa-solid fa-bullhorn" aria-hidden="true"></i> Are spam, an advert, or a link to another site.</li>
                                <li><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i> Are clearly not about our honey or from someone who never bought it.</li>
                                <li><i class="fa-solid fa-heart-pulse" aria-hidden="true"></i> Claim our honey treats, cures, or prevents an illness.</li>
                            </ul>
                        </div>
                    </article>
                </div>

                <!-- Section 2 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">2. Compliance & Ads</h3>

                    <!-- Q4 -->
                    <article id="health-claims" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Why we remove health claims</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>New Zealand law is strict about health claims on food, and honey is no exception.</strong></p>
                            <p>We are not allowed to say our honey treats or cures anything, and we cannot leave a claim like that up on our own site either, because that would be us making the claim by letting it stand.</p>
                            <p>We know people have their own reasons for eating honey, and we are not telling anyone they are wrong. We just cannot host claims we are not allowed to make. If your review mentions health, we may remove it or ask you to reword it. It is not personal, and it does not mean we did not appreciate the kind words.</p>
                        </div>
                    </article>

                    <!-- Q5 -->
                    <article id="no-ads" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">We never turn a review into an advert without asking</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>If we want to use your words in an ad, on our homepage, or on social media, we will ask you first.</strong></p>
                            <p>We also never pick out health related reviews to feature, for the reason above.</p>
                        </div>
                    </article>

                    <!-- Q6 -->
                    <article id="how-asked" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">How we ask for reviews</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>We send one email a short while after your order arrives, asking how you got on.</strong></p>
                            <p>We send it to every customer, not only the ones we think enjoyed it.</p>
                            <p>If we ever run a prize draw for reviewers, everyone who leaves a review goes in the draw, whatever they said. We will never offer you anything in exchange for a good review or a certain star rating.</p>
                        </div>
                    </article>
                </div>

                <!-- Questions? / CTA -->
                <div class="faq-cta-section animate-on-scroll">
                    <h3 class="faq-cta-title">Something wrong with a review?</h3>
                    <p class="faq-cta-text">If you think a review on our site is unfair, fake, or breaks the rules above, <a href="/contact" style="text-decoration: underline; color: var(--gold); font-weight: 600;">get in touch</a> and we will look into it. If you left a review and want it changed or removed, just ask.</p>
                    <div class="faq-cta-buttons">
                        <a href="/shop" class="faq-cta-btn faq-cta-btn--primary">
                            <i class="fa-solid fa-basket-shopping" aria-hidden="true"></i> Shop Our Honey
                        </a>
                        <a href="/our-testing" class="faq-cta-btn faq-cta-btn--secondary">
                            <i class="fa-solid fa-flask" aria-hidden="true"></i> See Our Lab Test Results
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
