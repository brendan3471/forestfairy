@extends('layouts.app')

@section('title', 'Shipping & Delivery Info | Forest Fairy Honey NZ')
@section('meta_description', 'Shipping and delivery rates within New Zealand. Flat-rate standard delivery is $12, rural delivery is $18, and free NZ shipping applies to all orders over $75.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/shipping-delivery')
@section('og_title', 'Shipping & Delivery — Forest Fairy Honey NZ')
@section('og_description', 'NZ shipping rates: $12 standard, $18 rural, free on orders over $75. Dispatched within 1–2 business days.')

@section('content')
<!-- Page Hero -->
<section class="page-hero page-hero--about" aria-label="Shipping and delivery page hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> <span aria-current="page">Shipping &amp; Delivery</span>
        </nav>
        <h1 class="page-hero-title">Shipping &amp; Delivery</h1>
        <p class="page-hero-subtitle">Fast, Tracked Courier Shipping Throughout New Zealand</p>
    </div>
</section>

<!-- Content Section -->
<section class="faq-section section-padding" aria-labelledby="shipping-page-heading">
    <div class="container">
        <h2 class="sr-only" id="shipping-page-heading">Shipping Policy Details</h2>
        
        <div class="faq-meta-bar animate-on-scroll">
            <span><i class="fa-solid fa-truck-fast" aria-hidden="true"></i> Delivery Partner: <strong>NZ Post</strong></span>
            <span><i class="fa-solid fa-clock" aria-hidden="true"></i> Effective Date: <strong>23 July 2026</strong></span>
        </div>

        <div class="faq-layout">
            <!-- Sidebar Table of Contents -->
            <aside class="faq-sidebar animate-on-scroll" aria-label="Table of contents">
                <nav class="faq-toc-nav">
                    <!-- Group 1 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">1. Shipping Overview</span>
                        <a href="#destinations" class="faq-toc-link">Shipping Destinations</a>
                        <a href="#dispatch" class="faq-toc-link">Dispatch &amp; Processing</a>
                    </div>
                    
                    <!-- Group 2 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">2. Rates &amp; Fees</span>
                        <a href="#shipping-rates" class="faq-toc-link">Standard &amp; Rural Rates</a>
                        <a href="#free-shipping" class="faq-toc-link">Free Shipping over $75</a>
                    </div>

                    <!-- Group 3 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">3. Timelines &amp; Tracking</span>
                        <a href="#delivery-times" class="faq-toc-link">Estimated Delivery Times</a>
                        <a href="#tracking-info" class="faq-toc-link">Order Tracking</a>
                    </div>

                    <!-- Group 4 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">4. Transit Issues &amp; Support</span>
                        <a href="#transit-damage" class="faq-toc-link">Damaged in Transit</a>
                        <a href="#contact-support" class="faq-toc-link">Support &amp; Inquiries</a>
                    </div>

                    <div class="faq-toc-group" style="margin-top: 20px; border-top: 1px solid var(--border-light); padding-top: 20px;">
                        <a href="/contact" class="faq-toc-link" style="font-weight: 600; color: var(--gold);"><i class="fa-solid fa-envelope"></i> Contact Customer Support</a>
                    </div>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="faq-main">
                <!-- Section 1 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">1. Shipping Overview</h3>
                    
                    <div class="faq-item" id="destinations">
                        <h4 class="faq-question">Shipping Destinations</h4>
                        <div class="faq-answer">
                            <p>To preserve the raw quality of our honey and guarantee prompt delivery, <strong>we ship exclusively within New Zealand (North Island and South Island)</strong>.</p>
                            <p>We do not support international delivery or shipping to P.O. Boxes / Private Bags. If you are an overseas customer seeking bulk purchasing options, please contact our wholesale team at <a href="mailto:hello@forestfairyhoney.co.nz" style="color: var(--gold-dark); text-decoration: underline; font-weight: 600;">hello@forestfairyhoney.co.nz</a>.</p>
                        </div>
                    </div>

                    <div class="faq-item" id="dispatch">
                        <h4 class="faq-question">Dispatch &amp; Order Processing</h4>
                        <div class="faq-answer">
                            <p>We work hard to get your order dispatched as quickly as possible:</p>
                            <ul>
                                <li>Orders placed before <strong>12:00 PM</strong> on business days are processed and dispatched on the same day.</li>
                                <li>Orders placed after 12:00 PM or during weekends and public holidays will be dispatched on the next working day.</li>
                            </ul>
                            <p>You will receive a notification email with tracking information as soon as your parcel is scanned by our carrier, NZ Post.</p>
                        </div>
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">2. Rates &amp; Fees</h3>

                    <div class="faq-item" id="shipping-rates">
                        <h4 class="faq-question">Standard and Rural Shipping Fees</h4>
                        <div class="faq-answer">
                            <p>We offer flat-rate shipping based on your delivery address. Our checkout autocomplete system determines if your address is designated standard or rural:</p>
                            <table style="width: 100%; border-collapse: collapse; margin-top: 15px; margin-bottom: 15px;">
                                <thead>
                                    <tr style="border-bottom: 2px solid var(--border-light); text-align: left;">
                                        <th style="padding: 10px 0;">Destination / Address Type</th>
                                        <th style="padding: 10px 0; text-align: right;">Flat Rate (NZD)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border-bottom: 1px solid var(--border-light);">
                                        <td style="padding: 12px 0;"><strong>Standard Delivery</strong> (NZ North &amp; South Island Residential/Business)</td>
                                        <td style="padding: 12px 0; text-align: right; font-weight: 600; color: var(--gold-dark);">$12.00</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid var(--border-light);">
                                        <td style="padding: 12px 0;"><strong>Rural Delivery (RD)</strong> (NZ North &amp; South Island Rural Addresses)</td>
                                        <td style="padding: 12px 0; text-align: right; font-weight: 600; color: var(--gold-dark);">$18.00</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>Please double-check that you select the correct address from our address autocomplete drop-down during checkout so we can route your package correctly.</p>
                        </div>
                    </div>

                    <div class="faq-item" id="free-shipping">
                        <h4 class="faq-question">Free Shipping over $75</h4>
                        <div class="faq-answer">
                            <p>All orders with a subtotal of <strong>$75.00 and over qualify for free shipping</strong>.</p>
                            <p>Free shipping is automatically applied at checkout for both standard and rural destinations when this threshold is met.</p>
                        </div>
                    </div>
                </div>

                <!-- Section 3 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">3. Timelines &amp; Tracking</h3>

                    <div class="faq-item" id="delivery-times">
                        <h4 class="faq-question">Estimated Delivery Times</h4>
                        <div class="faq-answer">
                            <p>Once dispatched from Tauranga, the typical delivery timeframes are:</p>
                            <ul>
                                <li><strong>North Island Standard:</strong> 1 – 2 business days</li>
                                <li><strong>South Island Standard:</strong> 2 – 3 business days</li>
                                <li><strong>Rural Deliveries (RD):</strong> Please allow an extra 1 – 2 business days on top of standard island delivery times.</li>
                            </ul>
                            <p><em>Please note that delivery times are estimates provided by NZ Post and may experience delays during peak periods or severe weather events.</em></p>
                        </div>
                    </div>

                    <div class="faq-item" id="tracking-info">
                        <h4 class="faq-question">Order Tracking</h4>
                        <div class="faq-answer">
                            <p>Every order is shipped with a unique tracking code. As soon as your order has been packed and a shipping label generated, a link will be sent to your email.</p>
                            <p>You can follow the link to monitor your parcel's progress in real-time. Please allow up to 12 hours for updates to register on the NZ Post portal.</p>
                        </div>
                    </div>
                </div>

                <!-- Section 4 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">4. Transit Issues &amp; Support</h3>

                    <div class="faq-item" id="transit-damage">
                        <h4 class="faq-question">Damaged in Transit Guarantee</h4>
                        <div class="faq-answer">
                            <p>We pack our raw honey in custom-designed, robust shipping boxes. In the rare event that your package is damaged during transit (e.g. cracked glass or leaks):</p>
                            <ul>
                                <li>Do not throw away the packaging or product.</li>
                                <li>Take clear photos of the damaged jar, seal, and shipping label.</li>
                                <li>Contact us at <a href="mailto:hello@forestfairyhoney.co.nz" style="color: var(--gold-dark); text-decoration: underline;">hello@forestfairyhoney.co.nz</a> within 14 days of delivery.</li>
                            </ul>
                            <p>Once verified, we will arrange for a replacement to be sent immediately or process a refund. For complete details, see our <a href="/return-policy" style="color: var(--gold-dark); text-decoration: underline; font-weight: 500;">Refund &amp; Damaged Policy</a>.</p>
                        </div>
                    </div>

                    <div class="faq-item" id="contact-support">
                        <h4 class="faq-question">Support &amp; Inquiries</h4>
                        <div class="faq-answer">
                            <p>If you have any questions or concerns about your delivery, please reach out to us:</p>
                            <div style="background-color: #FAF7F2; padding: 20px; border-radius: var(--radius); border: 1px solid var(--border-light); margin-top: 15px;">
                                <p style="margin: 0 0 10px 0;"><strong>Forest Fairy Honey Support</strong></p>
                                <p style="margin: 0 0 8px 0;"><i class="fa-solid fa-envelope" style="color: var(--gold); margin-right: 8px;"></i> Email: <a href="mailto:hello@forestfairyhoney.co.nz" style="color: var(--gold-dark); text-decoration: underline;">hello@forestfairyhoney.co.nz</a></p>
                                <p style="margin: 0 0 8px 0;"><i class="fa-solid fa-location-dot" style="color: var(--gold); margin-right: 8px;"></i> Location: Otumoetai, Tauranga 3110, Bay of Plenty, New Zealand</p>
                                <p style="margin: 0;"><i class="fa-solid fa-clock" style="color: var(--gold); margin-right: 8px;"></i> Support Hours: Monday – Friday, 9am – 5pm NZST</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
