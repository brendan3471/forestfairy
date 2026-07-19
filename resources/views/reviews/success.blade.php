@extends('layouts.app')

@section('title', 'Thank You | Forest Fairy Honey')

@section('content')
<section class="section-padding" style="background-color: #FAF7F2; min-height: 80vh; display: flex; align-items: center;">
    <div class="container" style="max-width: 600px; text-align: center;">
        <div class="contact-form-wrap animate-on-scroll" style="background: #ffffff; padding: 50px 40px; border-radius: 12px; border: 1px solid #F3EDE1; box-shadow: 0 4px 20px rgba(44, 24, 16, 0.03);">
            <div style="font-size: 4rem; color: #B88A2A; margin-bottom: 20px;">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            
            <h1 style="font-family: 'Playfair Display', Georgia, serif; color: var(--text-dark); margin-bottom: 15px;">Thank You for Your Review!</h1>
            
            <p style="color: var(--text-muted); line-height: 1.6; margin-bottom: 30px; font-size: 1.05rem;">
                Your feedback has been successfully submitted. Under New Zealand food safety regulations, we moderate all reviews before they are published to verify they do not make medical or health claims. Once approved, your review will go live on the site!
            </p>
            
            <a href="/shop" class="btn-primary" style="display: inline-block; padding: 12px 30px; text-decoration: none;">
                Return to Shop
            </a>
        </div>
    </div>
</section>
@endsection
