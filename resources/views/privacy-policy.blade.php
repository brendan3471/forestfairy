@extends('layouts.app')

@section('title', 'Privacy Policy | Forest Fairy Honey')
@section('meta_description', 'How Forest Fairy Honey collects, uses, and protects your personal information under the New Zealand Privacy Act 2020.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/privacy-policy')
@section('og_title', 'Privacy Policy — Forest Fairy Honey NZ')
@section('og_description', 'How Forest Fairy Honey collects, uses, and protects your personal information under the NZ Privacy Act 2020.')

@section('content')
<!-- Page Hero -->
<section class="page-hero page-hero--about" aria-label="Privacy policy page hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> <span aria-current="page">Privacy Policy</span>
        </nav>
        <h1 class="page-hero-title">Privacy Policy</h1>
        <p class="page-hero-subtitle">Your Privacy is Important to Us</p>
    </div>
</section>

<!-- Content Section -->
<section class="faq-section section-padding" aria-labelledby="policy-page-heading">
    <div class="container">
        <h2 class="sr-only" id="policy-page-heading">Privacy Policy Details</h2>
        
        <div class="faq-meta-bar animate-on-scroll">
            <span><i class="fa-solid fa-user-shield" aria-hidden="true"></i> Published by: <strong>Forest Fairy Honey</strong></span>
            <span><i class="fa-solid fa-clock" aria-hidden="true"></i> Effective date: <strong>20 July 2026</strong></span>
        </div>

        <div class="faq-layout">
            <!-- Sidebar Table of Contents -->
            <aside class="faq-sidebar animate-on-scroll" aria-label="Table of contents">
                <nav class="faq-toc-nav">
                    <!-- Category 1 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">1. Introduction & Law</span>
                        <a href="#purpose" class="faq-toc-link">Purpose of this policy</a>
                        <a href="#the-law" class="faq-toc-link">The law we follow</a>
                    </div>
                    
                    <!-- Category 2 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">2. Information Collection</span>
                        <a href="#info-we-collect" class="faq-toc-link">Personal info we collect</a>
                        <a href="#why-we-use" class="faq-toc-link">Why we use your info</a>
                        <a href="#marketing-emails" class="faq-toc-link">Marketing emails</a>
                    </div>

                    <!-- Category 3 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">3. Sharing & Storage</span>
                        <a href="#who-we-share" class="faq-toc-link">Who we share with</a>
                        <a href="#stored-overseas" class="faq-toc-link">Information stored overseas</a>
                        <a href="#disclose-info" class="faq-toc-link">Other disclosures</a>
                    </div>

                    <!-- Category 4 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">4. Security & Retention</span>
                        <a href="#retention" class="faq-toc-link">How long we keep it</a>
                        <a href="#protection" class="faq-toc-link">How we protect it</a>
                    </div>

                    <!-- Category 5 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">5. Your Rights & Cookies</span>
                        <a href="#your-rights" class="faq-toc-link">Your rights</a>
                        <a href="#children" class="faq-toc-link">Children</a>
                        <a href="#cookies" class="faq-toc-link">Cookies</a>
                        <a href="#visitors-eu-uk" class="faq-toc-link">EU and UK visitors</a>
                        <a href="#complaints" class="faq-toc-link">Complaints</a>
                    </div>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="faq-main">
                <!-- Section 1 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">1. Introduction & Law</h3>
                    
                    <!-- Purpose -->
                    <article id="purpose" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Purpose of this policy</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>This Privacy Policy explains how www.forestfairyhoney.co.nz collects, uses, and protects your personal information.</strong></p>
                            <p>This Site is owned and operated by Benő Bodó, trading as Forest Fairy Honey. We are the agency responsible for your personal information under the New Zealand Privacy Act 2020. This policy applies in addition to our terms and conditions.</p>
                            <p>This Privacy Policy tells you:</p>
                            <ul class="faq-list">
                                <li><i class="fa-solid fa-circle-info" aria-hidden="true"></i> What personal information we collect</li>
                                <li><i class="fa-solid fa-circle-info" aria-hidden="true"></i> Why we collect it and how we use it</li>
                                <li><i class="fa-solid fa-circle-info" aria-hidden="true"></i> Who we share it with</li>
                                <li><i class="fa-solid fa-circle-info" aria-hidden="true"></i> How long we keep it and how we protect it</li>
                                <li><i class="fa-solid fa-circle-info" aria-hidden="true"></i> Your rights to see and correct your information</li>
                                <li><i class="fa-solid fa-circle-info" aria-hidden="true"></i> How we use cookies</li>
                            </ul>
                        </div>
                    </article>

                    <!-- The Law -->
                    <article id="the-law" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">The law we follow</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>We follow the New Zealand Privacy Act 2020 and the Information Privacy Principles set out in it.</strong></p>
                            <p>We sell and ship within New Zealand only. If you visit our Site from the European Union or the United Kingdom, please see the section near the end of this policy about overseas visitors.</p>
                        </div>
                    </article>
                </div>

                <!-- Section 2 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">2. Information Collection</h3>
                    
                    <!-- Personal Info -->
                    <article id="info-we-collect" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">The personal information we collect</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>We only collect what we need to run the shop and answer your questions.</strong></p>
                            
                            <p style="margin-top: 15px; font-weight: bold; color: var(--gold-dark);">When you place an order:</p>
                            <ul class="faq-list">
                                <li><i class="fa-solid fa-user" aria-hidden="true"></i> Your first and last name</li>
                                <li><i class="fa-solid fa-envelope" aria-hidden="true"></i> Your email address</li>
                                <li><i class="fa-solid fa-phone" aria-hidden="true"></i> Your phone number</li>
                                <li><i class="fa-solid fa-truck" aria-hidden="true"></i> Your delivery address, and the recipient's name and address if you are sending honey as a gift</li>
                                <li><i class="fa-solid fa-history" aria-hidden="true"></i> Your order history</li>
                            </ul>

                            <p style="margin-top: 15px; font-weight: bold; color: var(--gold-dark);">When you pay:</p>
                            <p>Payments are processed by Stripe. Your card details are entered directly into Stripe's secure system. <strong>We never see or store your full card number.</strong> We receive only a confirmation that payment succeeded, and limited details such as the last four digits of the card and the cardholder name.</p>

                            <p style="margin-top: 15px; font-weight: bold; color: var(--gold-dark);">When you contact us:</p>
                            <p>Your name, email address, and anything you choose to tell us in your message.</p>

                            <p style="margin-top: 15px; font-weight: bold; color: var(--gold-dark);">When you sign up for our newsletter:</p>
                            <p>Your email address, and your name if you give it.</p>

                            <p style="margin-top: 15px; font-weight: bold; color: var(--gold-dark);">When you leave a product review:</p>
                            <p>The name you choose to display, and the content of your review. Please remember your review and display name will be visible publicly on our Site.</p>

                            <p style="margin-top: 15px; font-weight: bold; color: var(--gold-dark);">Automatically, when you browse:</p>
                            <p>Your IP address, browser type, device type, pages visited, and how you found us. This is collected through cookies and analytics, and it is described in the cookie section below.</p>

                            <p style="margin-top: 15px;">We do not collect sensitive information such as health information, and we ask that you do not send it to us.</p>
                        </div>
                    </article>

                    <!-- Why We Use -->
                    <article id="why-we-use" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Why we use your information</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>We use your personal information to process your orders, answer enquiries, and meet our legal requirements.</strong></p>
                            <p>Specifically, we use it to:</p>
                            <ul class="faq-list">
                                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Process and deliver your order</li>
                                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Send you order confirmations and delivery updates</li>
                                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Answer your questions and provide customer service</li>
                                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Handle returns, refunds, and any problems with an order</li>
                                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Publish product reviews you have submitted</li>
                                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Send you marketing emails, but only if you have asked to receive them</li>
                                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Understand how people use our Site so we can improve it</li>
                                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Meet our legal obligations, including keeping tax and business records</li>
                            </ul>
                            <p style="margin-top: 10px;">We do not sell your personal information to anyone. We never have and we do not intend to.</p>
                        </div>
                    </article>

                    <!-- Marketing Emails -->
                    <article id="marketing-emails" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Marketing emails</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>We only send marketing emails to people who have signed up for them.</strong></p>
                            <p>You can unsubscribe at any time using the link at the bottom of any marketing email, or by emailing us.</p>
                            <p>Unsubscribing from marketing does not stop order and delivery emails, because we need to send those to complete your purchase.</p>
                        </div>
                    </article>
                </div>

                <!-- Section 3 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">3. Sharing & Storage</h3>
                    
                    <!-- Who We Share With -->
                    <article id="who-we-share" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Who we share your information with</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>We share only what is necessary, and only with trusted third-party providers.</strong></p>
                            <p>We share with:</p>
                            <ul class="faq-list">
                                <li><i class="fa-solid fa-credit-card" aria-hidden="true"></i> <strong>Stripe</strong> processes payments securely. Stripe receives your payment and contact details to process payment and prevent fraud.</li>
                                <li><i class="fa-solid fa-truck-ramp-box" aria-hidden="true"></i> <strong>Our courier/delivery provider</strong> receives your name, delivery address, and phone number so your honey can be delivered.</li>
                                <li><i class="fa-solid fa-chart-line" aria-hidden="true"></i> <strong>Google Analytics</strong> collects technical information about site usage, not about you personally.</li>
                                <li><i class="fa-solid fa-cloud" aria-hidden="true"></i> <strong>Cloudflare</strong> helps keep the Site fast and secure. It processes technical details like IP addresses to protect the Site.</li>
                                <li><i class="fa-solid fa-code" aria-hidden="true"></i> <strong>MCL Web Solutions</strong> builds, maintains, and looks after the security of our Site. They may access stored info (order/enquiry details) to keep the site running and secure. They are operated by Brendan Mclelland (admin@mclwebsolutions.com).</li>
                                <li><i class="fa-solid fa-server" aria-hidden="true"></i> <strong>Our website host and email provider</strong> securely store the Site and our correspondence.</li>
                            </ul>
                            <p style="margin-top: 10px;">Anyone in our team who needs access to run the business may see your information, and only for that reason.</p>
                        </div>
                    </article>

                    <!-- Stored Overseas -->
                    <article id="stored-overseas" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Information stored overseas</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>Some of our providers store and process information on servers outside New Zealand.</strong></p>
                            <p>This includes Stripe, Google, and Cloudflare. Before sending your information overseas, we take reasonable steps to make sure it is protected by comparable safeguards to those required in New Zealand, as required by the Privacy Act 2020.</p>
                        </div>
                    </article>

                    <!-- Disclose Info -->
                    <article id="disclose-info" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Other times we may disclose information</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>We will only disclose your personal information outside the regular scope if required by law.</strong></p>
                            <p>We may disclose your personal information if:</p>
                            <ul class="faq-list">
                                <li><i class="fa-solid fa-scale-balanced" aria-hidden="true"></i> The law requires it</li>
                                <li><i class="fa-solid fa-gavel" aria-hidden="true"></i> It is needed for legal proceedings</li>
                                <li><i class="fa-solid fa-shield" aria-hidden="true"></i> It is necessary to protect our legal rights</li>
                                <li><i class="fa-solid fa-handshake" aria-hidden="true"></i> The business is sold, in which case information may transfer to the new owner</li>
                            </ul>
                        </div>
                    </article>
                </div>

                <!-- Section 4 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">4. Security & Retention</h3>

                    <!-- Retention -->
                    <article id="retention" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">How long we keep your information</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>We keep your information only as long as we need it.</strong></p>
                            <ul class="faq-list">
                                <li><i class="fa-solid fa-calendar-days" aria-hidden="true"></i> <strong>Order and payment records:</strong> Kept for at least 7 years as required by New Zealand tax law.</li>
                                <li><i class="fa-solid fa-message" aria-hidden="true"></i> <strong>Enquiries and messages:</strong> Kept for up to 2 years.</li>
                                <li><i class="fa-solid fa-envelope-open-text" aria-hidden="true"></i> <strong>Newsletter subscriptions:</strong> Kept until you unsubscribe.</li>
                                <li><i class="fa-solid fa-star-half-stroke" aria-hidden="true"></i> <strong>Reviews:</strong> Stay published until you ask us to remove them.</li>
                            </ul>
                        </div>
                    </article>

                    <!-- Protection -->
                    <article id="protection" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">How we protect your information</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>We protect your information with secure hosting, encrypted connections, and Cloudflare security.</strong></p>
                            <p>Access is limited to the people who need it. The security and maintenance of the Site is managed on our behalf by MCL Web Solutions. If you believe you have found a security problem with our Site, please report it to admin@mclwebsolutions.com, or to us at accounts@forestfairyhoney.co.nz.</p>
                            <p>We take security seriously, but no website can be completely secure. We cannot guarantee that information sent over the internet is entirely safe from interception, and you send it at your own risk.</p>
                        </div>
                    </article>
                </div>

                <!-- Section 5 -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">5. Your Rights & Cookies</h3>

                    <!-- Your Rights -->
                    <article id="your-rights" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Your rights under the Privacy Act 2020</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>You have rights to access and correct your personal information.</strong></p>
                            <p>Specifically, you have the right to:</p>
                            <ul class="faq-list">
                                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong>Ask what personal information we hold about you</strong>, and to be given a copy of it.</li>
                                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong>Ask us to correct it</strong> if it is wrong, or to attach a note recording that you think it is wrong.</li>
                            </ul>
                            <p style="margin-top: 10px;">As a matter of practice, we will also do our best to delete your information if you ask (unless we are legally required to keep it, such as order records held for tax purposes), stop sending you marketing at any time, or remove a review you have posted.</p>
                            <p>We will respond to your request within 20 working days. We do not charge for this. We may need to confirm your identity first, so that we do not give your information to somebody else. To make a request, email us at <a href="mailto:accounts@forestfairyhoney.co.nz">accounts@forestfairyhoney.co.nz</a>.</p>
                        </div>
                    </article>

                    <!-- Children -->
                    <article id="children" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Children</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>Our Site is not aimed at children, and we do not knowingly collect personal information from children under 16.</strong></p>
                            <p>If we find that we have, we will delete it. A parent or guardian can contact us at accounts@forestfairyhoney.co.nz to request deletion.</p>
                        </div>
                    </article>

                    <!-- Cookies -->
                    <article id="cookies" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Cookies</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>Cookies are small files stored on your device that help our website work properly.</strong></p>
                            <p>You can block or delete cookies in your browser settings, but parts of the Site, such as your shopping cart, may stop working correctly if you do.</p>
                            <p>We use:</p>
                            <ul class="faq-list">
                                <li><i class="fa-solid fa-cookie" aria-hidden="true"></i> <strong>Necessary cookies</strong>, which make the Site work, including keeping items in your cart and keeping the Site secure.</li>
                                <li><i class="fa-solid fa-cookie" aria-hidden="true"></i> <strong>Functional cookies</strong>, which remember your preferences.</li>
                                <li><i class="fa-solid fa-cookie" aria-hidden="true"></i> <strong>Analytical cookies</strong>, through Google Analytics, which help us understand how visitors use the Site. You can opt out of Google Analytics across all websites using Google's browser add-on.</li>
                            </ul>
                        </div>
                    </article>

                    <!-- Visitors EU/UK -->
                    <article id="visitors-eu-uk" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Visitors from the EU and UK</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>We sell and ship within New Zealand only, and do not target customers in the EU or UK.</strong></p>
                            <p>If you are visiting from the EU or UK, you may still have rights under the GDPR or the UK Data Protection Act 2018, including rights to access, correct, delete, restrict, port, or object to the use of your information. Contact us at accounts@forestfairyhoney.co.nz and we will help. We have not appointed a Data Protection Officer, as we are not required to under Article 37 of the GDPR.</p>
                        </div>
                    </article>

                    <!-- Complaints -->
                    <article id="complaints" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Complaints & Contact Information</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>If you have a concern about how we handle your personal information, please contact us first.</strong></p>
                            <p>Email our Privacy Officer, Benő Bodó, at <a href="mailto:accounts@forestfairyhoney.co.nz">accounts@forestfairyhoney.co.nz</a>. You can also contact us at:</p>
                            
                            <p style="margin-top: 15px; font-weight: bold; color: var(--gold-dark);">Forest Fairy Honey</p>
                            <ul class="faq-list" style="margin-bottom: 15px;">
                                <li><i class="fa-solid fa-user-shield" aria-hidden="true"></i> Privacy Officer: Benő Bodó</li>
                                <li><i class="fa-solid fa-phone" aria-hidden="true"></i> Phone: 021 996 820</li>
                                <li><i class="fa-solid fa-location-dot" aria-hidden="true"></i> Address: 17 Fairmont Terrace, Otumoetai, Tauranga 3110, New Zealand</li>
                            </ul>

                            <p>If you are not satisfied with our response, you can complain to the <strong>Office of the Privacy Commissioner</strong> at <a href="https://www.privacy.org.nz" target="_blank" rel="noopener">www.privacy.org.nz</a> or by calling 0800 803 909.</p>

                            <p style="margin-top: 20px; font-weight: bold; color: var(--gold-dark);">For website security matters only:</p>
                            <p>MCL Web Solutions, operated by Brendan Mclelland<br>
                            Email: <a href="mailto:admin@mclwebsolutions.com">admin@mclwebsolutions.com</a></p>
                        </div>
                    </article>
                </div>

                <!-- Footer CTA / Back to Shop -->
                <div class="faq-cta-section animate-on-scroll">
                    <h3 class="faq-cta-title">Need to update your preferences?</h3>
                    <p class="faq-cta-text">If you have any questions or would like to request access or correction to your personal information, please get in touch.</p>
                    <div class="faq-cta-buttons">
                        <a href="/shop" class="faq-cta-btn faq-cta-btn--primary">
                            <i class="fa-solid fa-basket-shopping" aria-hidden="true"></i> Shop Our Honey
                        </a>
                        <a href="/contact" class="faq-cta-btn faq-cta-btn--secondary">
                            <i class="fa-solid fa-envelope" aria-hidden="true"></i> Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
