@extends('layouts.app')

@section('title', 'Wholesale & Bulk New Zealand Honey | Forest Fairy Honey')
@section('meta_description', 'Partner with Forest Fairy Honey for wholesale raw New Zealand honey. Supplying retailers, cafes, corporate gifts, and bulk buyers across NZ.')

@section('content')
<!-- Hero Section -->
<section style="background: linear-gradient(135deg, var(--dark, #2C1810) 0%, #4A2E1B 100%); color: white; padding: 70px 0 60px; text-align: center; position: relative; overflow: hidden;">
    <div style="position: absolute; top: -50px; right: -50px; width: 300px; height: 300px; background: rgba(212, 168, 67, 0.1); border-radius: 50%; blur: 40px; pointer-events: none;"></div>
    <div class="container" style="position: relative; z-index: 2; max-width: 800px;">
        <span style="display: inline-block; padding: 6px 16px; background: rgba(212, 168, 67, 0.2); color: var(--gold, #D4A843); border: 1px solid var(--gold, #D4A843); border-radius: 50px; font-size: 0.85rem; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 20px;">
            Commercial &amp; Bulk Supply
        </span>
        <h1 style="font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 700; margin-bottom: 20px; line-height: 1.2; color: #FAF7F2;">
            Wholesale New Zealand Honey
        </h1>
        <p style="font-size: 1.15rem; color: rgba(255,255,255,0.85); line-height: 1.6; margin-bottom: 30px;">
            Pure, cold-harvested raw honey straight from native Bay of Plenty and Mamaku flora. Available in retail cartons, bulk pails, and corporate gifting packs.
        </p>
        <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
            <a href="#inquiryForm" class="btn-primary" style="padding: 14px 32px; font-weight: 600;">Request Wholesale Pricing</a>
        </div>
    </div>
</section>

<!-- Wholesale Highlights -->
<section style="padding: 60px 0; background-color: var(--cream, #FAF7F2);">
    <div class="container">
        <div style="text-align: center; max-width: 650px; margin: 0 auto 50px;">
            <h2 style="font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--text-dark, #2C1810); margin-bottom: 12px;">Why Partner With Forest Fairy Honey?</h2>
            <p style="color: var(--text-muted, #7A6552); line-height: 1.6;">We work closely with artisan grocers, specialty food stores, luxury hampers, cafes, and international distributors.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
            <div style="background: white; padding: 32px 24px; border-radius: 16px; border: 1px solid #E5E1DA; box-shadow: 0 4px 15px rgba(0,0,0,0.03); text-align: center;">
                <div style="width: 60px; height: 60px; background: rgba(212, 168, 67, 0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: var(--gold, #D4A843); font-size: 1.5rem;">
                    <i class="fa-solid fa-award"></i>
                </div>
                <h3 style="font-family: 'Playfair Display', serif; font-size: 1.3rem; margin-bottom: 10px;">100% Raw &amp; Lab Tested</h3>
                <p style="font-size: 0.95rem; color: #666; line-height: 1.5;">Every batch is independently tested by Hill Labs in Hamilton. Cold-harvested, raw, and unpasteurised.</p>
            </div>

            <div style="background: white; padding: 32px 24px; border-radius: 16px; border: 1px solid #E5E1DA; box-shadow: 0 4px 15px rgba(0,0,0,0.03); text-align: center;">
                <div style="width: 60px; height: 60px; background: rgba(212, 168, 67, 0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: var(--gold, #D4A843); font-size: 1.5rem;">
                    <i class="fa-solid fa-tags"></i>
                </div>
                <h3 style="font-family: 'Playfair Display', serif; font-size: 1.3rem; margin-bottom: 10px;">Tiered Bulk Discounts</h3>
                <p style="font-size: 0.95rem; color: #666; line-height: 1.5;">Flexible pricing tiers for orders starting from 12+ jars up to pallet quantities for commercial distribution.</p>
            </div>

            <div style="background: white; padding: 32px 24px; border-radius: 16px; border: 1px solid #E5E1DA; box-shadow: 0 4px 15px rgba(0,0,0,0.03); text-align: center;">
                <div style="width: 60px; height: 60px; background: rgba(212, 168, 67, 0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: var(--gold, #D4A843); font-size: 1.5rem;">
                    <i class="fa-solid fa-gift"></i>
                </div>
                <h3 style="font-family: 'Playfair Display', serif; font-size: 1.3rem; margin-bottom: 10px;">Custom Gifting &amp; Labeling</h3>
                <p style="font-size: 0.95rem; color: #666; line-height: 1.5;">Bespoke packaging, corporate gift sets, and co-branded labeling available for weddings and corporate events.</p>
            </div>

            <div style="background: white; padding: 32px 24px; border-radius: 16px; border: 1px solid #E5E1DA; box-shadow: 0 4px 15px rgba(0,0,0,0.03); text-align: center;">
                <div style="width: 60px; height: 60px; background: rgba(212, 168, 67, 0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: var(--gold, #D4A843); font-size: 1.5rem;">
                    <i class="fa-solid fa-truck-fast"></i>
                </div>
                <h3 style="font-family: 'Playfair Display', serif; font-size: 1.3rem; margin-bottom: 10px;">Reliable NZ Freight</h3>
                <p style="font-size: 0.95rem; color: #666; line-height: 1.5;">Fast dispatched shipments across North and South Island via NZ Post Pace track-and-trace logistics.</p>
            </div>
        </div>
    </div>
</section>

<!-- Wholesale Inquiry Form -->
<section id="inquiryForm" style="padding: 70px 0; background: white;">
    <div class="container" style="max-width: 850px;">
        <div style="background: var(--cream, #FAF7F2); padding: 40px; border-radius: 20px; border: 1px solid #E5E1DA; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
            <div style="text-align: center; margin-bottom: 30px;">
                <h2 style="font-family: 'Playfair Display', serif; font-size: 2.2rem; color: var(--text-dark, #2C1810); margin-bottom: 8px;">Wholesale &amp; Bulk Inquiry</h2>
                <p style="color: var(--text-muted, #7A6552); font-size: 1rem;">Fill in your details below and our team will provide a customized wholesale price list.</p>
            </div>

            @if(session('wholesale_success'))
            <div style="background: #E6F7ED; border: 1px solid #7EB87A; color: #2C1810; padding: 20px; border-radius: 12px; margin-bottom: 30px; text-align: center;">
                <i class="fa-solid fa-circle-check" style="color: #7EB87A; font-size: 1.8rem; margin-bottom: 10px; display: block;"></i>
                <strong style="font-size: 1.1rem; display: block; margin-bottom: 4px;">Inquiry Received!</strong>
                <span>{{ session('wholesale_success') }}</span>
            </div>
            @endif

            <form action="{{ route('wholesale.submit') }}" method="POST">
                @csrf
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 8px; color: var(--text-dark, #2C1810);">Business / Organization Name *</label>
                        <input type="text" name="business_name" required placeholder="e.g. Bay Fine Foods Ltd" style="width: 100%; padding: 12px 16px; border: 1px solid #D1D5DB; border-radius: 8px; font-size: 0.95rem;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 8px; color: var(--text-dark, #2C1810);">Contact Name *</label>
                        <input type="text" name="contact_name" required placeholder="Your full name" style="width: 100%; padding: 12px 16px; border: 1px solid #D1D5DB; border-radius: 8px; font-size: 0.95rem;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 8px; color: var(--text-dark, #2C1810);">Email Address *</label>
                        <input type="email" name="email" required placeholder="orders@yourbusiness.co.nz" style="width: 100%; padding: 12px 16px; border: 1px solid #D1D5DB; border-radius: 8px; font-size: 0.95rem;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 8px; color: var(--text-dark, #2C1810);">Phone Number *</label>
                        <input type="text" name="phone" required placeholder="021 123 4567" style="width: 100%; padding: 12px 16px; border: 1px solid #D1D5DB; border-radius: 8px; font-size: 0.95rem;">
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 8px; color: var(--text-dark, #2C1810);">Estimated Quantity Needed *</label>
                    <select name="estimated_qty" required style="width: 100%; padding: 12px 16px; border: 1px solid #D1D5DB; border-radius: 8px; font-size: 0.95rem; background: white;">
                        <option value="">Select quantity bracket...</option>
                        <option value="11-24 jars">11 – 24 Jars (Small Retail Trial)</option>
                        <option value="25-50 jars">25 – 50 Jars (Carton Supply)</option>
                        <option value="50-100 jars">50 – 100 Jars (Multi-Store Supply)</option>
                        <option value="100+ jars">100+ Jars / Bulk Pallets</option>
                        <option value="Custom Corporate Gifting">Custom Corporate Gifting</option>
                    </select>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 8px; color: var(--text-dark, #2C1810);">Products of Interest</label>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 10px;">
                        @foreach($products as $slug => $prod)
                        <label style="display: flex; align-items: center; gap: 8px; font-size: 0.9rem; color: #444; background: white; padding: 10px 14px; border: 1px solid #E5E1DA; border-radius: 8px; cursor: pointer;">
                            <input type="checkbox" name="products[]" value="{{ $prod['name'] }}">
                            <span>{{ $prod['name'] }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div style="margin-bottom: 25px;">
                    <label style="display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 8px; color: var(--text-dark, #2C1810);">Additional Notes / Specific Requests</label>
                    <textarea name="notes" rows="4" placeholder="Tell us more about your business or specific delivery requirements..." style="width: 100%; padding: 12px 16px; border: 1px solid #D1D5DB; border-radius: 8px; font-size: 0.95rem;"></textarea>
                </div>

                <button type="submit" class="btn-primary btn-full" style="padding: 16px; font-size: 1.05rem; font-weight: 600; cursor: pointer;">
                    <i class="fa-solid fa-paper-plane" style="margin-right: 8px;"></i> Submit Wholesale Inquiry
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
