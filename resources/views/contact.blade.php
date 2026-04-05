@extends('layouts.app')

@section('title', 'Contact Forest Fairy Honey | Buy NZ Honey Online | Enquiries')
@section('meta_description', 'Get in touch with Forest Fairy Honey NZ. Order raw NZ honey, ask about our products, wholesale enquiries, or just say hello. We\'d love to hear from you.')
@section('canonical', 'https://forestfairyhoney.co.nz/contact')

@section('schema')
<script type="application/ld+json">
@verbatim
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Forest Fairy Honey",
  "url": "https://forestfairyhoney.co.nz",
  "email": "hello@forestfairyhoney.co.nz",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Bay of Plenty",
    "addressCountry": "NZ"
  },
  "description": "Pure, raw New Zealand honey harvested from pristine NZ forests and meadows. Online honey store shipping across New Zealand.",
  "priceRange": "$$",
  "areaServed": "New Zealand",
  "sameAs": ["https://instagram.com/forestfairyhoney", "https://facebook.com/forestfairyhoney"]
}
@endverbatim
</script>
@endsection

@section('content')
<section class="page-hero page-hero--contact" aria-label="Contact page hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> <span aria-current="page">Contact</span>
        </nav>
        <h1 class="page-hero-title">Get in Touch</h1>
        <p class="page-hero-subtitle">Questions about honey? Ready to order? We'd love to hear from you.</p>
    </div>
</section>

<section class="contact-section section-padding" aria-labelledby="contact-heading">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Info -->
            <div class="contact-info animate-on-scroll">
                <h2 id="contact-heading">Contact Forest Fairy Honey</h2>
                <p>Whether you have a question about our honey, want to place a large order, or are interested in wholesale — we're happy to chat.</p>

                <ul class="contact-details">
                    <li>
                        <div class="contact-icon"><i class="fa-solid fa-envelope" aria-hidden="true"></i></div>
                        <div>
                            <strong>Email</strong>
                            <a href="mailto:hello@forestfairyhoney.co.nz">hello@forestfairyhoney.co.nz</a>
                        </div>
                    </li>
                    <li>
                        <div class="contact-icon"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></div>
                        <div>
                            <strong>Location</strong>
                            <span>Bay of Plenty, New Zealand</span>
                        </div>
                    </li>
                    <li>
                        <div class="contact-icon"><i class="fa-solid fa-clock" aria-hidden="true"></i></div>
                        <div>
                            <strong>Response Time</strong>
                            <span>We aim to reply within 1 business day</span>
                        </div>
                    </li>
                </ul>

                <div class="contact-socials">
                    <p>Find us on social media:</p>
                    <div class="social-links">
                        <a href="#" class="social-link social-link--lg" aria-label="Follow on Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i> Instagram</a>
                        <a href="#" class="social-link social-link--lg" aria-label="Like on Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i> Facebook</a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-wrap animate-on-scroll">
                <form class="contact-form" id="contactForm" aria-label="Contact form">
                    <div class="form-group">
                        <label for="contactName">Your Name</label>
                        <input type="text" id="contactName" name="name" placeholder="Jane Smith" required autocomplete="name">
                    </div>
                    <div class="form-group">
                        <label for="contactEmail">Email Address</label>
                        <input type="email" id="contactEmail" name="email" placeholder="jane@example.com" required autocomplete="email">
                    </div>
                    <div class="form-group">
                        <label for="contactSubject">Subject</label>
                        <select id="contactSubject" name="subject" required>
                            <option value="" disabled selected>Choose a subject…</option>
                            <option value="order">Place an Order</option>
                            <option value="wholesale">Wholesale Enquiry</option>
                            <option value="product">Product Question</option>
                            <option value="shipping">Shipping &amp; Delivery</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="contactMessage">Message</label>
                        <textarea id="contactMessage" name="message" rows="5" placeholder="Tell us how we can help…" required></textarea>
                    </div>
                    <button type="submit" class="btn-primary btn-full" id="contactSubmit">
                        <i class="fa-solid fa-paper-plane" aria-hidden="true"></i> Send Message
                    </button>
                    <div class="form-success hidden" id="formSuccess" role="alert" aria-live="polite">
                        <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                        Thanks! We'll be in touch within 1 business day.
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
