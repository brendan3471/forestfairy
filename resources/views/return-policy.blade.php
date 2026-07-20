@extends('layouts.app')

@section('title', 'Refund & Damaged Items Policy | Forest Fairy Honey NZ')
@section('meta_description', 'Our Refund & Damaged Items Policy. We do not accept change of mind returns for food safety reasons, but offer hassle-free refunds or replacements for faulty or damaged goods upon photo evidence.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/return-policy')

@section('content')
<!-- Page Hero -->
<section class="page-hero page-hero--about" aria-label="Refund and damaged items policy page hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> <span aria-current="page">Refund &amp; Damaged Policy</span>
        </nav>
        <h1 class="page-hero-title">Refund &amp; Damaged Goods Policy</h1>
        <p class="page-hero-subtitle">Quality Guarantee &amp; Evidence-Based Claims</p>
    </div>
</section>

<!-- Content Section -->
<section class="faq-section section-padding" aria-labelledby="policy-page-heading">
    <div class="container">
        <h2 class="sr-only" id="policy-page-heading">Refund Policy Details</h2>
        
        <div class="faq-meta-bar animate-on-scroll">
            <span><i class="fa-solid fa-shield-halved" aria-hidden="true"></i> Published by: <strong>Forest Fairy Honey</strong></span>
            <span><i class="fa-solid fa-clock" aria-hidden="true"></i> Effective date: <strong>21 July 2026</strong></span>
        </div>

        <div class="faq-layout">
            <!-- Sidebar Table of Contents -->
            <aside class="faq-sidebar animate-on-scroll" aria-label="Table of contents">
                <nav class="faq-toc-nav">
                    <!-- Group 1 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">1. Policy Overview</span>
                        <a href="#no-change-of-mind" class="faq-toc-link">No Change of Mind Returns</a>
                        <a href="#faulty-damaged" class="faq-toc-link">Faulty & Damaged Goods Only</a>
                    </div>
                    
                    <!-- Group 2 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">2. Submitting an Appeal</span>
                        <a href="#photo-evidence" class="faq-toc-link">Photo Evidence & Claims</a>
                        <a href="#no-return-shipment" class="faq-toc-link">No Physical Return Required</a>
                        <a href="#refund-timeline" class="faq-toc-link">Refund & Replacement Process</a>
                    </div>

                    <!-- Group 3 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">3. Legal Rights & Contact</span>
                        <a href="#cga-rights" class="faq-toc-link">NZ Consumer Guarantees Act</a>
                        <a href="#contact-support" class="faq-toc-link">Submit a Claim</a>
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
                    <h3 class="faq-category-heading">1. Policy Overview</h3>
                    
                    <div class="faq-item" id="no-change-of-mind">
                        <h4 class="faq-question">No Change of Mind Returns</h4>
                        <div class="faq-answer">
                            <p>Due to strict New Zealand food safety regulations and health guidelines for raw consumable honey products, <strong>we do not accept returns or issue refunds for change of mind</strong> once an order has been dispatched.</p>
                            <p>Please review your product selection and order details carefully before completing checkout.</p>
                        </div>
                    </div>

                    <div class="faq-item" id="faulty-damaged">
                        <h4 class="faq-question">Faulty, Defective, or Damaged Deliveries</h4>
                        <div class="faq-answer">
                            <p>We take full responsibility for ensuring your honey arrives in perfect condition. We accept refund and replacement claims exclusively for goods that arrive:</p>
                            <ul>
                                <li><strong>Damaged in transit</strong> (e.g., cracked glass, leaking lids, or crushed boxes).</li>
                                <li><strong>Defective or incorrect</strong> (e.g., incorrect item sent or product defect).</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">2. Submitting an Appeal &amp; Photo Evidence</h3>

                    <div class="faq-item" id="photo-evidence">
                        <h4 class="faq-question">How to Submit an Appeal with Photo Evidence</h4>
                        <div class="faq-answer">
                            <p>If your order arrives damaged or faulty, you can submit a claim within <strong>14 days</strong> of delivery:</p>
                            <ol>
                                <li>Take clear photos showing the damaged/faulty honey jar, tamper seal state, and shipping parcel.</li>
                                <li>Email your photos, order reference number, and brief description to <a href="mailto:hello@forestfairyhoney.co.nz" style="color: var(--gold-dark); text-decoration: underline; font-weight: 600;">hello@forestfairyhoney.co.nz</a>.</li>
                                <li>Our support team will review your appeal and evidence within 24–48 hours.</li>
                            </ol>
                        </div>
                    </div>

                    <div class="faq-item" id="no-return-shipment">
                        <h4 class="faq-question">No Physical Return of Goods Required</h4>
                        <div class="faq-answer">
                            <p>To protect food safety standards and avoid unnecessary return shipping costs for our customers, <strong>we do not require or accept physical return shipments of honey products</strong>.</p>
                            <p>Once your photo evidence is reviewed and approved, we will arrange a replacement or full refund directly to your original payment method without asking you to post broken glass or opened food products back to us.</p>
                        </div>
                    </div>

                    <div class="faq-item" id="refund-timeline">
                        <h4 class="faq-question">Refund &amp; Replacement Process</h4>
                        <div class="faq-answer">
                            <p>Upon approval of your claim appeal:</p>
                            <ul>
                                <li><strong>Replacements:</strong> A new replacement package is dispatched via tracked courier at no additional cost.</li>
                                <li><strong>Refunds:</strong> Credit is issued directly back to your original payment card via Stripe. Bank processing usually takes <strong>2 to 5 business days</strong> to reflect on your statement.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Section 3 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">3. Consumer Rights &amp; How to Contact</h3>

                    <div class="faq-item" id="cga-rights">
                        <h4 class="faq-question">New Zealand Consumer Guarantees Act (CGA)</h4>
                        <div class="faq-answer">
                            <p>Nothing in this policy limits, excludes, or restricts any rights or remedies you have under the <strong>New Zealand Consumer Guarantees Act 1993</strong> or the <strong>Fair Trading Act 1986</strong> for faulty, damaged, or misdescribed goods.</p>
                            <p><em>Note: Natural honey crystallization is a natural characteristic of raw, unheated honey and is not considered a defect. Honey can be gently warmed in warm water to return it to a liquid state.</em></p>
                        </div>
                    </div>

                    <div class="faq-item" id="contact-support">
                        <h4 class="faq-question">Contact Customer Support</h4>
                        <div class="faq-answer">
                            <p>If you have any questions or need to submit a claim, please reach out to our team:</p>
                            <div style="background-color: #FAF7F2; padding: 20px; border-radius: var(--radius); border: 1px solid var(--border-light); margin-top: 15px;">
                                <p style="margin: 0 0 10px 0;"><strong>Forest Fairy Honey — Customer Support</strong></p>
                                <p style="margin: 0 0 8px 0;"><i class="fa-solid fa-envelope" style="color: var(--gold); margin-right: 8px;"></i> Email: <a href="mailto:hello@forestfairyhoney.co.nz" style="color: var(--gold-dark); text-decoration: underline;">hello@forestfairyhoney.co.nz</a></p>
                                <p style="margin: 0 0 8px 0;"><i class="fa-solid fa-location-dot" style="color: var(--gold); margin-right: 8px;"></i> Location: Otumoetai, Tauranga 3110, Bay of Plenty, New Zealand</p>
                                <p style="margin: 0;"><i class="fa-solid fa-clock" style="color: var(--gold); margin-right: 8px;"></i> Hours: Monday – Friday, 9:00am – 5:00pm NZST</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
