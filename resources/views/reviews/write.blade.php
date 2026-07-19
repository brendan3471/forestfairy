@extends('layouts.app')

@section('title', 'Leave a Review | Forest Fairy Honey')

@section('content')
<section class="section-padding" style="background-color: #FAF7F2; min-height: 80vh;">
    <div class="container" style="max-width: 700px;">
        <div class="contact-header animate-on-scroll" style="text-align: center; margin-bottom: 40px;">
            <h1 style="font-family: 'Playfair Display', Georgia, serif; color: var(--text-dark); margin-bottom: 10px;">Share Your Experience</h1>
            <p style="color: var(--text-muted);">Hi {{ explode(' ', trim($order->customer_name))[0] }}, thank you for your order! We would love to hear what you think of our honey.</p>
            
            <div style="background-color: #fbf9f6; border: 1px solid #e2d9c8; border-radius: var(--radius); padding: 15px; margin-top: 25px; text-align: left; font-size: 0.9rem; line-height: 1.5; color: var(--text-muted);">
                <strong><i class="fa-solid fa-circle-info" style="color: var(--gold); margin-right: 5px;"></i> A Quick Compliance Note:</strong><br>
                New Zealand food regulations prohibit us from publishing reviews that state or imply honey treats or cures any medical conditions (e.g. sore throats, infections, eczema, etc.). We'd love your honest feedback about the taste, texture, aroma, or how you use it!
            </div>
        </div>

        <div class="contact-form-wrap animate-on-scroll" style="background: #ffffff; padding: 40px; border-radius: 12px; border: 1px solid #F3EDE1; box-shadow: 0 4px 20px rgba(44, 24, 16, 0.03);">
            <form action="{{ route('reviews.submit') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                @php
                $productsConfig = config('products');
                $imgMap = [
                    'omanawa-falls' => '/images/Omanawa-falls-creamed-honey.jpg',
                    'mamaku'        => '/images/mamaku-creamed-honey.jpg',
                    'otumoetai'     => '/images/otumoetai-summer-harvest-creamed-honey.jpg',
                    'rewarewa'      => '/images/rewarewa-honey.jpg',
                ];
                @endphp

                @foreach($order->items as $index => $item)
                @php
                    $slug = $item->product_slug;
                    $imgKey = $productsConfig[$slug]['image'] ?? null;
                    
                    if (!$imgKey) {
                        if (str_contains($slug, 'omanawa')) $imgKey = 'omanawa-falls';
                        elseif (str_contains($slug, 'mamaku')) $imgKey = 'mamaku';
                        elseif (str_contains($slug, 'otumoetai') || str_contains($slug, 'otūmoetai')) $imgKey = 'otumoetai';
                        elseif (str_contains($slug, 'rewarewa')) $imgKey = 'rewarewa';
                    }

                    $imgUrl = $imgMap[$imgKey] ?? '/images/rewarewa-honey.jpg';
                @endphp

                <div class="review-item" style="margin-bottom: 35px; padding-bottom: 30px; border-bottom: 1px solid #F3EDE1;">
                    <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 20px;">
                        <img src="{{ $imgUrl }}" alt="{{ $item->product_name }}" style="width: 70px; height: 70px; object-fit: cover; border-radius: 6px; border: 1px solid #F3EDE1;">
                        <div>
                            <h3 style="font-family: 'Playfair Display', Georgia, serif; font-size: 1.2rem; color: var(--text-dark); margin: 0;">{{ $item->product_name }}</h3>
                            <span style="font-size: 0.85rem; color: var(--text-muted);">Quantity: {{ $item->quantity }}</span>
                        </div>
                    </div>

                    <input type="hidden" name="reviews[{{ $index }}][product_slug]" value="{{ $item->product_slug }}">
                    
                    <!-- Star Rating Selection -->
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 8px; color: var(--text-dark);">Your Rating</label>
                        <div class="star-rating-select" data-index="{{ $index }}" style="display: flex; gap: 10px; font-size: 1.8rem; color: #E2D9C8; cursor: pointer;">
                            <i class="fa-solid fa-star star-btn" data-value="1"></i>
                            <i class="fa-solid fa-star star-btn" data-value="2"></i>
                            <i class="fa-solid fa-star star-btn" data-value="3"></i>
                            <i class="fa-solid fa-star star-btn" data-value="4"></i>
                            <i class="fa-solid fa-star star-btn" data-value="5"></i>
                        </div>
                        <input type="hidden" name="reviews[{{ $index }}][rating]" id="rating_input_{{ $index }}" value="" required>
                        @error("reviews.{$index}.rating")
                            <span style="color: red; font-size: 0.85rem; display: block; margin-top: 5px;">Please select a rating of at least 1 star.</span>
                        @enderror
                    </div>

                    <!-- Text review -->
                    <div class="form-group">
                        <label for="comment_{{ $index }}" style="display: block; font-weight: bold; margin-bottom: 8px; color: var(--text-dark);">Your Review (optional)</label>
                        <textarea id="comment_{{ $index }}" name="reviews[{{ $index }}][comment]" rows="4" placeholder="Tell others what you loved about this honey..." style="width: 100%; border: 1px solid #E2D9C8; border-radius: var(--radius); padding: 12px; font-family: inherit; font-size: 0.95rem; resize: vertical; box-sizing: border-box;"></textarea>
                    </div>
                </div>
                @endforeach

                <div style="margin-top: 25px;">
                    <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 15px;">Posting review publicly as: <strong>{{ $order->customer_name }}</strong></p>
                    <button type="submit" class="btn-primary btn-full" style="width: 100%; justify-content: center; padding: 14px 20px;">
                        Submit Review
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const starContainers = document.querySelectorAll('.star-rating-select');
    
    starContainers.forEach(container => {
        const index = container.getAttribute('data-index');
        const hiddenInput = document.getElementById(`rating_input_${index}`);
        const stars = container.querySelectorAll('.star-btn');
        
        stars.forEach(star => {
            // Hover effect
            star.addEventListener('mouseover', function() {
                const val = parseInt(this.getAttribute('data-value'));
                highlightStars(stars, val);
            });
            
            // Hover leave (reset to selected value)
            star.addEventListener('mouseout', function() {
                const selectedVal = parseInt(hiddenInput.value) || 0;
                highlightStars(stars, selectedVal);
            });
            
            // Click to select
            star.addEventListener('click', function() {
                const val = parseInt(this.getAttribute('data-value'));
                hiddenInput.value = val;
                highlightStars(stars, val);
            });
        });
    });
    
    function highlightStars(stars, value) {
        stars.forEach(star => {
            const starVal = parseInt(star.getAttribute('data-value'));
            if (starVal <= value) {
                star.style.color = '#B88A2A'; // Active gold color
            } else {
                star.style.color = '#E2D9C8'; // Inactive grey-cream
            }
        });
    }
});
</script>
@endsection
