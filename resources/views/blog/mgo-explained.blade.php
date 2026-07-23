@extends('layouts.app')

@section('title', 'What Does MGO Mean? MGO Explained | Forest Fairy Honey')
@section('meta_description', 'What MGO means on a honey label, how it differs from UMF, and why an MGO number alone does not make honey manuka. Our Mamaku tests at MGO 125.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/mgo-explained')

@section('content')
<!-- Page Hero -->
<section class="page-hero page-hero--blog" aria-label="MGO Explained page hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> 
            <a href="/blog">Blog</a> <span aria-hidden="true">/</span> 
            <span aria-current="page">What Does MGO Mean?</span>
        </nav>
        <span class="blog-tag" style="background-color: var(--gold-light); color: var(--gold-dark); padding: 6px 12px; border-radius: 50px; font-size: 0.85rem; font-weight: 600; display: inline-block; margin-bottom: 15px;">Education</span>
        <h1 class="page-hero-title">What Does MGO Mean?</h1>
        <div class="faq-meta-bar" style="margin-top: 20px; justify-content: center; border: none; background: transparent; padding: 0; gap: 20px;">
            <span style="color: var(--white); opacity: 0.9;"><i class="fa-solid fa-clock" aria-hidden="true"></i> July 2026</span>
            <span style="color: var(--white); opacity: 0.9;"><i class="fa-solid fa-user" aria-hidden="true"></i> By Forest Fairy Honey</span>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="article-section section-padding" style="background-color: #fbf9f6;">
    <div class="container">
        <style>
            .article-wrapper {
                max-width: 800px;
                margin: 0 auto;
                background: var(--white);
                padding: 50px 40px;
                border-radius: var(--radius-lg);
                box-shadow: var(--shadow);
                border: 1px solid var(--border-light);
            }
            .article-body {
                color: var(--text-dark);
                line-height: 1.8;
                font-size: 1.05rem;
            }
            .article-body p {
                margin-bottom: 25px;
            }
            .article-body h2 {
                font-size: 1.6rem;
                color: var(--brown);
                margin-top: 40px;
                margin-bottom: 20px;
                font-weight: 700;
                border-bottom: 2px solid var(--gold-light);
                padding-bottom: 8px;
            }
            .article-lead {
                font-size: 1.2rem;
                font-weight: 500;
                line-height: 1.6;
                color: var(--brown);
                margin-bottom: 30px;
                border-left: 4px solid var(--gold);
                padding-left: 20px;
            }
            .article-divider {
                height: 1px;
                background-color: var(--border-light);
                margin: 40px 0;
            }
            .article-intro-grid {
                display: grid;
                grid-template-columns: 1.2fr 1fr;
                gap: 30px;
                align-items: center;
                margin-bottom: 35px;
            }
            @media (max-width: 768px) {
                .article-intro-grid {
                    grid-template-columns: 1fr;
                    gap: 20px;
                }
            }

            /* Calculator Widget Styles */
            .calculator-card {
                background: #FAF7F2;
                border: 2px solid var(--gold-light);
                border-radius: var(--radius-lg);
                padding: 35px 30px;
                margin: 40px 0;
                box-shadow: var(--shadow-sm);
            }
            .calculator-title {
                font-size: 1.3rem;
                font-weight: 700;
                color: var(--brown);
                margin-top: 0;
                margin-bottom: 25px;
                text-align: center;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }
            .calculator-inputs {
                display: flex;
                flex-direction: column;
                gap: 20px;
                margin-bottom: 25px;
            }
            .slider-wrapper {
                position: relative;
                padding-bottom: 25px;
            }
            .mgo-slider {
                -webkit-appearance: none;
                width: 100%;
                height: 12px;
                border-radius: 6px;
                background: linear-gradient(to right, #e2d2be, #c5a880, #a67c52, #784f27);
                outline: none;
                cursor: pointer;
                margin: 15px 0;
            }
            .mgo-slider::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 26px;
                height: 26px;
                border-radius: 50%;
                background: var(--gold-dark);
                border: 3px solid white;
                box-shadow: 0 2px 6px rgba(0,0,0,0.2);
                transition: transform 0.1s ease, background-color 0.2s ease;
            }
            .mgo-slider::-webkit-slider-thumb:hover {
                transform: scale(1.15);
                background: var(--gold);
            }
            .mgo-slider::-moz-range-thumb {
                width: 26px;
                height: 26px;
                border-radius: 50%;
                background: var(--gold-dark);
                border: 3px solid white;
                box-shadow: 0 2px 6px rgba(0,0,0,0.2);
                transition: transform 0.1s ease, background-color 0.2s ease;
                cursor: pointer;
            }
            .mgo-slider::-moz-range-thumb:hover {
                transform: scale(1.15);
                background: var(--gold);
            }
            .slider-ticks {
                display: flex;
                justify-content: space-between;
                font-size: 0.8rem;
                color: var(--text-muted);
                padding: 0 5px;
            }
            .mamaku-marker {
                position: absolute;
                left: 11.58%; /* (125-30)/(850-30) = 95/820 = 11.58% */
                bottom: 50px;
                transform: translateX(-50%);
                display: flex;
                flex-direction: column;
                align-items: center;
                cursor: pointer;
            }
            .mamaku-marker-pin {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: var(--gold-dark);
                border: 2px solid white;
                box-shadow: 0 0 4px rgba(0,0,0,0.3);
            }
            .mamaku-marker-label {
                font-size: 0.75rem;
                font-weight: 700;
                color: var(--gold-dark);
                background: white;
                padding: 2px 8px;
                border-radius: 10px;
                border: 1px solid var(--gold-light);
                margin-top: 4px;
                white-space: nowrap;
                box-shadow: var(--shadow-sm);
            }
            .input-row {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 15px;
            }
            .input-label {
                font-weight: 600;
                color: var(--text-dark);
            }
            .mgo-num-input {
                width: 90px;
                padding: 8px 12px;
                border: 2px solid var(--border-dark);
                border-radius: var(--radius);
                font-size: 1.1rem;
                font-weight: 700;
                text-align: center;
                color: var(--brown);
                background: white;
            }
            .mgo-num-input:focus {
                border-color: var(--gold);
                outline: none;
            }
            .calculator-result {
                background: white;
                border-radius: var(--radius);
                padding: 25px 25px;
                border-left: 4px solid var(--gold);
                box-shadow: inset 0 1px 3px rgba(0,0,0,0.02);
            }
            .result-value-row {
                display: flex;
                align-items: baseline;
                gap: 10px;
                margin-bottom: 12px;
            }
            .result-mgo-val {
                font-size: 1.6rem;
                font-weight: 800;
                color: var(--brown);
            }
            .result-badge {
                font-size: 0.8rem;
                font-weight: 700;
                background: var(--gold-light);
                color: var(--gold-dark);
                padding: 3px 10px;
                border-radius: 50px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }
            .result-text {
                font-size: 1rem;
                line-height: 1.6;
                color: var(--text-dark);
                margin: 0;
            }
            .result-text a {
                color: var(--gold-dark);
                text-decoration: underline;
                font-weight: 600;
            }
            .result-text a:hover {
                color: var(--gold);
            }
        </style>

        <div class="article-wrapper">
            <article class="article-body">
                <div class="article-intro-grid">
                    <div>
                        <p class="article-lead" style="margin-bottom: 20px;">You will see a number like MGO 125 on some honeys, including our Mamaku. It is one of the most misunderstood things on a honey label, so here is a straight explanation of what it is, what it is not, and what ours measures.</p>
                        <p style="margin-bottom: 0;">Use the interactive scale below to explore MGO levels and see where different honeys fit, including our tested Mamaku.</p>
                    </div>
                    <div style="border-radius: var(--radius-lg); overflow: hidden; border: 1px solid var(--border-light); box-shadow: var(--shadow-sm); max-width: 250px; margin: 0 auto;">
                        <img src="/images/mamaku-300g.webp" alt="Forest Fairy Mamaku Creamed Honey Jar" style="width: 100%; height: auto; display: block;">
                    </div>
                </div>

                <!-- Interactive Calculator Widget -->
                <div class="calculator-card">
                    <h3 class="calculator-title"><i class="fa-solid fa-calculator" aria-hidden="true"></i> MGO Strength Explorer</h3>
                    <div class="calculator-inputs">
                        <div class="slider-wrapper">
                            <!-- Clickable Mamaku marker -->
                            <div class="mamaku-marker" id="snapMamaku" title="Snap to our Mamaku Honey MGO" role="button" tabindex="0">
                                <span class="mamaku-marker-pin"></span>
                                <span class="mamaku-marker-label">Our Mamaku (125)</span>
                            </div>
                            
                            <label for="mgoSlider" class="sr-only">MGO Strength Slider</label>
                            <input type="range" min="30" max="850" value="125" step="5" class="mgo-slider" id="mgoSlider">
                            
                            <div class="slider-ticks" aria-hidden="true">
                                <span>MGO 30 (Low)</span>
                                <span>250</span>
                                <span>500</span>
                                <span>850+ (Rare)</span>
                            </div>
                        </div>
                        
                        <div class="input-row">
                            <label for="mgoNumInput" class="input-label">Or enter MGO number:</label>
                            <input type="number" id="mgoNumInput" class="mgo-num-input" min="30" max="2000" value="125">
                        </div>
                    </div>

                    <!-- Dynamic Readout Area -->
                    <div class="calculator-result" aria-live="polite">
                        <div class="result-value-row">
                            <span class="result-mgo-val">MGO <span id="mgoValDisplay">125</span></span>
                            <span class="result-badge" id="mgoBadge">Moderate Reading</span>
                        </div>
                        <p class="result-text" id="mgoResultText">
                            MGO 125. This is the level our Mamaku honey tested at with Hill Labs. It is a solid everyday reading: naturally higher than a basic honey, while still sensibly priced. <a href="/our-testing">See the lab certificate</a>
                        </p>
                    </div>
                </div>

                <div class="article-divider"></div>

                <h2>What MGO actually is</h2>
                <p>MGO stands for methylglyoxal. It is a natural compound found in honey made from the nectar of the manuka flower. The more manuka nectar in the mix, the higher the MGO reading tends to be.</p>
                <p>It is measured in milligrams per kilogram (mg/kg), and it is worked out in a laboratory. Our Mamaku honey was tested by Hill Labs, an independent New Zealand laboratory, and read MGO 125.</p>
                <p>The number is simply a measure of how much of that compound is present. A higher number means more of it. That is all the number itself tells you.</p>

                <h2>MGO is not the same as UMF</h2>
                <p>This is where a lot of people get confused, so it is worth being clear.</p>
                <p><strong>MGO</strong> is a direct measurement of one compound, methylglyoxal, in mg/kg.</p>
                <p><strong>UMF</strong> stands for Unique Manuka Factor. It is a separate grading system run by the UMF Honey Association, and producers must be licensed to use it. It is a rating that takes in several markers, not just one.</p>
                <p>The two are related, because UMF grading takes MGO into account, but they are different systems with different owners. A honey can report an MGO number without carrying a UMF grade. Ours reports MGO. We are not UMF licensed, so you will not see a UMF rating on our jars, and we will never put one there unless we hold that licence.</p>
                <p>So: MGO is the measurement we can show you. UMF is a certification we do not claim.</p>

                <h2>An MGO number does not by itself mean "manuka honey"</h2>
                <p>This is the most important part, and we would rather explain it than gloss over it.</p>
                <p>In New Zealand, honey can only be sold and labelled as "manuka honey" if it passes a specific government test. The Ministry for Primary Industries (MPI) sets it, and it checks five separate markers: four chemical ones and a DNA marker from the manuka plant. An MGO number on its own is not that test.</p>
                <p>Our Mamaku honey is named after the Mamaku ranges where our bees work, and those bees do forage manuka among other native plants, which is why it carries an MGO reading.</p>
                <p>We are simply showing you the MGO number our honey tested at. We are not telling you it is a certified manuka honey, because that is a different test with its own rules, and we will only ever use that word if we have met them.</p>

                <h2>Why we show the number at all</h2>
                <p>Because it is true, and because you can check it.</p>
                <p>We publish our full Hill Labs certificate on our <a href="/our-testing" style="color: var(--gold-dark); text-decoration: underline; font-weight: 600;">testing page</a>, MGO reading and all, rather than just telling you a number and asking you to believe it. Showing the figure and the certificate behind it is simply the honest way to do it.</p>
                <p>If a honey shows you an MGO number with no test behind it, or uses the number to imply things it has not proven, that is worth being wary of. Ours is one honey, from one place, with one certificate you can read.</p>

                <div class="article-footer-nav" style="margin-top: 40px;">
                    <a href="/shop/mamaku-creamed-honey" class="article-nav-btn article-nav-btn--primary"><i class="fa-solid fa-basket-shopping"></i> Shop the Mamaku</a>
                    <a href="/our-testing" class="article-nav-btn article-nav-btn--secondary">See Our Lab Results</a>
                    <a href="/honey-questions" class="article-nav-btn article-nav-btn--secondary">Read Our Honey FAQ</a>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Calculator Logic script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('mgoSlider');
    const numInput = document.getElementById('mgoNumInput');
    const valDisplay = document.getElementById('mgoValDisplay');
    const badge = document.getElementById('mgoBadge');
    const resultText = document.getElementById('mgoResultText');
    const snapMamaku = document.getElementById('snapMamaku');

    function updateMgoDisplay(val) {
        valDisplay.textContent = val;
        
        if (val == 125) {
            badge.textContent = "Moderate Reading";
            badge.style.backgroundColor = "var(--gold-light)";
            badge.style.color = "var(--gold-dark)";
            resultText.innerHTML = 'MGO 125. This is the level our Mamaku honey tested at with Hill Labs. It is a solid everyday reading: naturally higher than a basic honey, while still sensibly priced. <a href="/our-testing">See the lab certificate</a>';
        } else if (val >= 30 && val < 100) {
            badge.textContent = "Entry Level";
            badge.style.backgroundColor = "#e8e5e0";
            badge.style.color = "#555";
            resultText.textContent = 'MGO ' + val + ' - An entry level. A gentle, everyday honey with a low reading. Fine for the table and for cooking.';
        } else if (val >= 100 && val < 250) {
            badge.textContent = "Moderate Reading";
            badge.style.backgroundColor = "var(--gold-light)";
            badge.style.color = "var(--gold-dark)";
            resultText.textContent = 'MGO ' + val + ' - A moderate reading. This is where our Mamaku sits, at MGO 125. A good everyday choice with a naturally higher number, without the premium price of the high grades.';
        } else if (val >= 250 && val < 500) {
            badge.textContent = "Higher Reading";
            badge.style.backgroundColor = "#ffe8d1";
            badge.style.color = "#a05a11";
            resultText.textContent = 'MGO ' + val + ' - A higher reading, and a higher price to match.';
        } else {
            badge.textContent = "Ultra Premium";
            badge.style.backgroundColor = "#ffd1d1";
            badge.style.color = "#c02727";
            resultText.textContent = 'MGO ' + val + ' and above - The strong, rare, and expensive end. The numbers you see on the most costly jars.';
        }
    }

    // Sync input events
    slider.addEventListener('input', function() {
        const val = slider.value;
        numInput.value = val;
        updateMgoDisplay(val);
    });

    numInput.addEventListener('input', function() {
        let val = parseInt(numInput.value) || 30;
        if (val < 30) val = 30;
        if (val > 2000) val = 2000;
        
        slider.value = val;
        updateMgoDisplay(val);
    });

    // Snap to Mamaku 125 on click or Enter key
    function snapToMamaku() {
        slider.value = 125;
        numInput.value = 125;
        updateMgoDisplay(125);
    }

    snapMamaku.addEventListener('click', snapToMamaku);
    snapMamaku.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            snapToMamaku();
        }
    });

    // Initialize displays
    updateMgoDisplay(125);
});
</script>
@endsection
