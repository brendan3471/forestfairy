@extends('layouts.app')

@section('title', 'Our Honey Testing and Lab Results | Forest Fairy Honey NZ')
@section('meta_description', 'See the independent lab results behind our raw New Zealand honey. Tested by Hill Labs for MGO, DHA, HMF and diastase. Small batch, comb to jar, nothing added.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/our-testing')
@section('meta_keywords', 'honey lab testing NZ, honey test results, pure honey testing, raw honey NZ, Hill Labs honey testing')
@section('og_title', 'Our Lab Test Results — Forest Fairy Honey NZ')
@section('og_description', 'Independent lab results for our raw NZ honey. Tested by Hill Labs for MGO, DHA, HMF and diastase. Small batch, nothing added.')

@section('content')
<!-- Page Hero -->
<section class="page-hero page-hero--about" aria-label="Testing page hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> <span aria-current="page">Our Honey Testing</span>
        </nav>
        <h1 class="page-hero-title">How We Test Our Honey</h1>
        <p class="page-hero-subtitle">Independent Lab Results You Can Verify</p>
    </div>
</section>

<!-- Content Section -->
<section class="faq-section section-padding" aria-labelledby="testing-page-heading">
    <div class="container">
        <h2 class="sr-only" id="testing-page-heading">Our Honey Testing and Lab Results</h2>
        
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
                        <span class="faq-toc-group-title">1. Testing & Process</span>
                        <a href="#who-tests" class="faq-toc-link">Who tests our honey</a>
                        <a href="#how-made" class="faq-toc-link">How our honey is made</a>
                    </div>
                    
                    <!-- Category 2 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">2. Lab Results & Meaning</span>
                        <a href="#latest-results" class="faq-toc-link">Our latest results</a>
                        <a href="#numbers-meaning" class="faq-toc-link">What the numbers mean</a>
                        <a href="#about-certificate" class="faq-toc-link">About the certificate</a>
                    </div>

                    <div class="faq-toc-group" style="margin-top: 20px; border-top: 1px solid var(--border-light); padding-top: 20px;">
                        <a href="/Diastase-3in1-NPA.pdf" target="_blank" class="faq-toc-link" style="font-weight: 600; color: var(--gold);"><i class="fa-solid fa-file-pdf"></i> Download PDF Certificate</a>
                    </div>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="faq-main">
                <!-- Section 1 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">1. Testing & Process</h3>
                    
                    <!-- Q1 -->
                    <article id="who-tests" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Who tests our honey</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>Our honey is tested by Hill Labs in Hamilton, one of New Zealand's best known testing labs.</strong></p>
                            <p>Hill Labs is accredited by International Accreditation New Zealand (IANZ), which means an outside body checks that their testing is done properly.</p>
                            <p>We do not test our own honey. An independent lab does it, and we publish what they find.</p>
                        </div>
                    </article>

                    <!-- Q2 -->
                    <article id="how-made" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">How our honey is made</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>Forest Fairy Honey is raw and made in small batches.</strong></p>
                            <p>The only thing we do is take the honey out of the comb and pour it into jars. We do not heat it. We do not blend it with other honey. We do not add sugar, syrup, or anything else.</p>
                            <p>The lab results below back that up, and we explain how further down the page.</p>
                        </div>
                    </article>
                </div>

                <!-- Section 2 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">2. Lab Results & Meaning</h3>

                    <!-- Q3 -->
                    <article id="latest-results" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Our latest results</h2>
                        <div class="faq-card-answer">
                            <div style="margin-bottom: 15px; font-size: 0.95rem; line-height: 1.6;">
                                <strong>Tested by:</strong> Hill Labs, Hamilton<br>
                                <strong>Lab reference:</strong> 4023878<br>
                                <strong>Date reported:</strong> 7 November 2025<br>
                                <strong>Sample:</strong> OHP0725175
                            </div>
                            
                            <table class="testing-table">
                                <thead>
                                    <tr>
                                        <th>What was tested</th>
                                        <th>Result</th>
                                        <th>What it tells you</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>MGO</strong> (methylglyoxal)</td>
                                        <td>125 mg/kg</td>
                                        <td>The strength marker used to grade Manuka honey</td>
                                    </tr>
                                    <tr>
                                        <td><strong>DHA</strong> (dihydroxyacetone)</td>
                                        <td>559 mg/kg</td>
                                        <td>The natural compound in the nectar that turns into MGO over time</td>
                                    </tr>
                                    <tr>
                                        <td><strong>HMF</strong></td>
                                        <td>13.6 mg/kg</td>
                                        <td>A freshness marker. It goes up if honey is heated or stored badly</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Diastase</strong></td>
                                        <td>15.2 DN</td>
                                        <td>A natural enzyme. Heat destroys it, so a good level means the honey is raw</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div style="margin-top: 20px;">
                                <a href="/Diastase-3in1-NPA.pdf" target="_blank" class="btn-primary" style="color: var(--dark) !important; text-decoration: none !important;">
                                    <i class="fa-solid fa-file-pdf" aria-hidden="true"></i> Download full lab certificate (PDF)
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Q4 -->
                    <article id="numbers-meaning" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">What the numbers actually mean</h2>
                        <div class="faq-card-answer">
                            <p><strong>MGO 125.</strong> MGO is the compound used to grade Manuka honey. The higher the number, the stronger the honey and the higher the price. At 125, this is a real, everyday grade. It is not one of the very high numbers that cost a lot, and for most people that is the sensible choice. You are not paying extra for a number you do not need.</p>
                            <p><strong>DHA 559.</strong> DHA comes from the Manuka flower nectar and slowly turns into MGO while the honey sits. A good DHA level is a sign the honey came from real Manuka nectar.</p>
                            <p><strong>HMF 13.6.</strong> This is the one that shows honey has not been cooked. HMF climbs when honey is heated or stored in the heat. The international guide is a maximum of 40 mg/kg. Ours came back at 13.6, well under it.</p>
                            <p><strong>Diastase 15.2 DN.</strong> Diastase is a natural enzyme in honey, and heat destroys it. The international guide is a minimum of 8 DN. Ours came back at 15.2, comfortably above it.</p>
                            <p>Those last two are the ones we are proudest of. Anyone can say their honey is raw. HMF and diastase are how a lab checks it.</p>
                        </div>
                    </article>

                    <!-- Q5 -->
                    <article id="about-certificate" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">About the certificate</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>The certificate is issued in the name of Orini Honey Packers Limited, the packing facility that submits our samples to Hill Labs on our behalf.</strong></p>
                            <p>This is normal in the honey industry. The honey is ours, and the results are for our honey.</p>
                            <p>We publish the certificate in full, exactly as the lab issued it, because that is the only honest way to show it.</p>
                            <p>Lab results apply to the batch that was tested. As new honey is harvested and tested, we update this page.</p>
                        </div>
                    </article>

                    <!-- Q6 (Version B) -->
                    <article id="mgo-about" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">About the MGO in this honey</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>Our Mamaku honey tests at MGO 125.</strong></p>
                            <p>MGO is the compound used to grade Manuka honey, and this result comes from the same lab test. We have not put it through the MPI manuka definition test, so we do not label it as manuka honey. We would rather show you the number and let you decide than use a word we cannot back up.</p>
                        </div>
                    </article>
                </div>

                <!-- Questions? / CTA -->
                <div class="faq-cta-section animate-on-scroll">
                    <h3 class="faq-cta-title">Questions?</h3>
                    <p class="faq-cta-text">Have a question about our testing that is not answered here? <a href="/contact" style="text-decoration: underline; color: var(--gold); font-weight: 600;">Get in touch</a> and we will answer it properly.</p>
                    <div class="faq-cta-buttons">
                        <a href="/shop" class="faq-cta-btn faq-cta-btn--primary">
                            <i class="fa-solid fa-basket-shopping" aria-hidden="true"></i> Shop Our Honey
                        </a>
                        <a href="/honey-questions" class="faq-cta-btn faq-cta-btn--secondary">
                            <i class="fa-solid fa-circle-question" aria-hidden="true"></i> Read Our Honey FAQ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.testing-table {
    width: 100%;
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.95rem;
    background: var(--white);
    border-radius: var(--radius-sm);
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(44, 24, 16, 0.05);
    border: 1px solid var(--cream-2);
}
.testing-table th, .testing-table td {
    padding: 14px 18px;
    text-align: left;
    border-bottom: 1px solid var(--cream-2);
}
.testing-table th {
    background-color: var(--cream-2);
    color: var(--dark);
    font-weight: 600;
}
.testing-table tr:last-child td {
    border-bottom: none;
}
@media (max-width: 768px) {
    .testing-table th, .testing-table td {
        padding: 10px 12px;
        font-size: 0.85rem;
    }
}
</style>
@endsection
