@extends('layouts.app')

@section('title', 'Terms & Conditions | Forest Fairy Honey')
@section('meta_description', 'Terms and conditions for buying raw New Zealand honey online from Forest Fairy Honey. Learn about ordering, payment, shipping, and returns.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/terms-conditions')

@section('content')
<!-- Page Hero -->
<section class="page-hero page-hero--about" aria-label="Terms and conditions page hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> <span aria-current="page">Terms &amp; Conditions</span>
        </nav>
        <h1 class="page-hero-title">Terms &amp; Conditions</h1>
        <p class="page-hero-subtitle">Rules and Guidelines for Buying Our Honey</p>
    </div>
</section>

<!-- Content Section -->
<section class="faq-section section-padding" aria-labelledby="terms-page-heading">
    <div class="container">
        <h2 class="sr-only" id="terms-page-heading">Terms &amp; Conditions Details</h2>
        
        <div class="faq-meta-bar animate-on-scroll">
            <span><i class="fa-solid fa-scale-balanced" aria-hidden="true"></i> Published by: <strong>Forest Fairy Honey</strong></span>
            <span><i class="fa-solid fa-clock" aria-hidden="true"></i> Effective date: <strong>20 July 2026</strong></span>
        </div>

        <div class="faq-layout">
            <!-- Sidebar Table of Contents -->
            <aside class="faq-sidebar animate-on-scroll" aria-label="Table of contents">
                <nav class="faq-toc-nav">
                    <!-- Category 1 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">1. Introduction & Orders</span>
                        <a href="#intro" class="faq-toc-link">Introduction & Operator</a>
                        <a href="#ordering" class="faq-toc-link">Product Orders</a>
                        <a href="#pricing" class="faq-toc-link">Pricing & Currency</a>
                    </div>
                    
                    <!-- Category 2 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">2. Payments & Delivery</span>
                        <a href="#payment-methods" class="faq-toc-link">Payment Processing</a>
                        <a href="#delivery" class="faq-toc-link">Shipping & Delivery</a>
                    </div>

                    <!-- Category 3 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">3. Returns & Consumer Law</span>
                        <a href="#returns" class="faq-toc-link">Returns & Refunds</a>
                        <a href="#cga" class="faq-toc-link">Consumer Guarantees Act</a>
                    </div>

                    <!-- Category 4 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">4. Legal Boundaries</span>
                        <a href="#intellectual-property" class="faq-toc-link">Intellectual Property</a>
                        <a href="#liability" class="faq-toc-link">Limitation of Liability</a>
                        <a href="#governing-law" class="faq-toc-link">Governing Law</a>
                    </div>

                    <!-- Category 5 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">5. Policy Updates</span>
                        <a href="#updates" class="faq-toc-link">Changes to Terms</a>
                        <a href="#contact-info" class="faq-toc-link">Contact Information</a>
                    </div>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="faq-main">
                <!-- Section 1 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">1. Introduction & Orders</h3>
                    
                    <!-- Introduction -->
                    <article id="intro" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Introduction & Operator</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>These Terms &amp; Conditions govern your use of www.forestfairyhoney.co.nz and any purchases you make.</strong></p>
                            <p>This Site is owned and operated by Benő Bodó, trading as Forest Fairy Honey. By accessing the Site or purchasing honey from us, you agree to comply with and be bound by these terms.</p>
                            <p>If you do not agree with any part of these terms, please do not use our Site or make purchases.</p>
                        </div>
                    </article>

                    <!-- Product Orders -->
                    <article id="ordering" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Product Orders</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>All orders placed through our Site are subject to acceptance and availability.</strong></p>
                            <p>When you place an order, you are making an offer to purchase honey. We will send you an order confirmation email, but this does not mean we have accepted your order. Acceptance of your order and formation of the contract occur when we dispatch the goods to you.</p>
                            <p>We reserve the right to decline or cancel any order at our sole discretion (for example, if we run out of stock, identify a pricing error, or suspect fraudulent activity). If we cancel an order after payment has been processed, we will issue a full refund to your original payment method.</p>
                        </div>
                    </article>

                    <!-- Pricing & Currency -->
                    <article id="pricing" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Pricing &amp; Currency</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>All prices shown on the Site are in New Zealand Dollars (NZD) and include GST.</strong></p>
                            <p>Pricing is subject to change at any time without notice. The price charged will be the price indicated when you submit your order. While we make every effort to display correct prices, errors may occasionally occur. If we discover a pricing error for any item you have ordered, we will contact you to give you the option of reconfirming your order at the correct price or cancelling it.</p>
                        </div>
                    </article>
                </div>

                <!-- Section 2 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">2. Payments & Delivery</h3>
                    
                    <!-- Payment Methods -->
                    <article id="payment-methods" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Payment Processing</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>Payments are securely processed online through Stripe.</strong></p>
                            <p>We accept major credit and debit cards. By submitting an order, you warrant that you are authorised to use the payment card details provided. All transaction details are encrypted, and we do not store your full card details. Dispatch is subject to receipt of cleared payment.</p>
                        </div>
                    </article>

                    <!-- Shipping & Delivery -->
                    <article id="delivery" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Shipping &amp; Delivery</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>We ship within New Zealand only. We do not offer international delivery.</strong></p>
                            <p>Delivery fees are calculated at checkout. We offer free shipping within New Zealand on orders over $75.</p>
                            <p>We aim to package and dispatch orders within 1–2 business days. Estimated delivery times are guidelines only and subject to courier delays. Title and risk of loss or damage to the products transfer to you upon delivery to the specified shipping address.</p>
                        </div>
                    </article>
                </div>

                <!-- Section 3 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">3. Returns & Consumer Law</h3>
                    
                    <!-- Returns -->
                    <article id="returns" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Returns &amp; Refunds</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>We want you to love your honey. If there is a problem with your order, let us know.</strong></p>
                            <p>Because honey is a food product, we cannot accept returns or offer refunds for "change of mind."</p>
                            <p>If your package arrives damaged, defective, or incorrect, please email us at accounts@forestfairyhoney.co.nz within 7 days of delivery, including photos of the outer box and products. We will happily send a replacement or issue a full refund for damaged or incorrect items.</p>
                        </div>
                    </article>

                    <!-- CGA -->
                    <article id="cga" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Consumer Guarantees Act 1993</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>Nothing in these terms limits your rights under the Consumer Guarantees Act 1993.</strong></p>
                            <p>Under New Zealand law, our honey must be of acceptable quality, fit for purpose, and match its description. If it does not meet these criteria, you are entitled to a replacement or refund under the Act. These statutory protections apply in full to all personal consumers.</p>
                        </div>
                    </article>
                </div>

                <!-- Section 4 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">4. Legal Boundaries</h3>

                    <!-- Intellectual Property -->
                    <article id="intellectual-property" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Intellectual Property</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>All content on this Site is the property of Forest Fairy Honey or its licensors.</strong></p>
                            <p>This includes text, product photos, graphics, brand logos, code, and layout. You may not reproduce, distribute, modify, or reuse any material from this Site for commercial purposes without our prior written consent.</p>
                        </div>
                    </article>

                    <!-- Limitation of Liability -->
                    <article id="liability" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Limitation of Liability</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>To the maximum extent permitted by law, our liability is limited to the purchase price of the products.</strong></p>
                            <p>Forest Fairy Honey is not liable for any indirect, special, or consequential loss or damage arising out of your use of the Site, or any delay or failure in product delivery. If you are buying honey for business purposes, the Consumer Guarantees Act does not apply, and our liability is strictly limited to the value of the goods purchased.</p>
                        </div>
                    </article>

                    <!-- Governing Law -->
                    <article id="governing-law" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Governing Law</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>These terms and conditions are governed by and construed in accordance with New Zealand law.</strong></p>
                            <p>Any disputes arising under these terms or in connection with the purchase of goods from our Site will be subject to the exclusive jurisdiction of the New Zealand courts.</p>
                        </div>
                    </article>
                </div>

                <!-- Section 5 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">5. Policy Updates</h3>

                    <!-- Changes to Terms -->
                    <article id="updates" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Changes to Terms</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>We may update these terms from time to time to reflect changes in law or business operations.</strong></p>
                            <p>Any updates will be posted on this page with the effective date updated. We encourage you to review these terms periodically before making purchases.</p>
                        </div>
                    </article>

                    <!-- Contact Info -->
                    <article id="contact-info" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Contact Information</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>For any queries regarding these Terms &amp; Conditions or an order:</strong></p>
                            <p style="font-weight: bold; color: var(--gold-dark);">Forest Fairy Honey</p>
                            <ul class="faq-list">
                                <li><i class="fa-solid fa-user" aria-hidden="true"></i> Proprietor: Benő Bodó</li>
                                <li><i class="fa-solid fa-envelope" aria-hidden="true"></i> Email: <a href="mailto:accounts@forestfairyhoney.co.nz">accounts@forestfairyhoney.co.nz</a></li>
                                <li><i class="fa-solid fa-phone" aria-hidden="true"></i> Phone: 021 996 820</li>
                                <li><i class="fa-solid fa-location-dot" aria-hidden="true"></i> Address: 17 Fairmont Terrace, Otumoetai, Tauranga 3110, New Zealand</li>
                            </ul>
                        </div>
                    </article>
                </div>

                <!-- Footer CTA -->
                <div class="faq-cta-section animate-on-scroll">
                    <h3 class="faq-cta-title">Ready to explore?</h3>
                    <p class="faq-cta-text">Head over to our online store to check out our selection of cold-harvested raw honey.</p>
                    <div class="faq-cta-buttons">
                        <a href="/shop" class="faq-cta-btn faq-cta-btn--primary">
                            <i class="fa-solid fa-basket-shopping" aria-hidden="true"></i> Shop Our Honey
                        </a>
                        <a href="/contact" class="faq-cta-btn faq-cta-btn--secondary">
                            <i class="fa-solid fa-envelope" aria-hidden="true"></i> Get in Touch
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
