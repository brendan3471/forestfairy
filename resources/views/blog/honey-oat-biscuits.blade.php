@extends('layouts.app')

@section('title', 'Honey Oat Biscuits Recipe | Forest Fairy Honey')
@section('meta_description', 'Crunchy, golden, and just sweet enough. Try our interactive one-bowl Honey Oat Biscuits recipe where you can scale ingredients based on your serving size.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/blog/honey-oat-biscuits')
@section('og_title', 'Honey Oat Biscuits Recipe — Forest Fairy Honey')
@section('og_description', 'Crunchy, golden, and just sweet enough. An interactive one-bowl recipe where you can scale ingredients to your serving size.')

@section('content')
<!-- Page Hero -->
<section class="page-hero page-hero--blog" aria-label="Blog article hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> 
            <a href="/blog">Blog</a> <span aria-hidden="true">/</span> 
            <span aria-current="page">Honey Oat Biscuits</span>
        </nav>
        <span class="blog-tag" style="background-color: var(--gold-light); color: var(--gold-dark); padding: 6px 12px; border-radius: 50px; font-size: 0.85rem; font-weight: 600; display: inline-block; margin-bottom: 15px;">Recipes</span>
        <h1 class="page-hero-title">Honey Oat Biscuits</h1>
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
            .article-body h3 {
                font-size: 1.25rem;
                color: var(--text-dark);
                margin-top: 30px;
                margin-bottom: 15px;
                font-weight: 700;
            }
            .article-body h3 a {
                color: var(--gold-dark);
                text-decoration: underline;
            }
            .article-body h3 a:hover {
                color: var(--gold);
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
            .recipe-ingredients-list {
                list-style: none;
                padding-left: 0;
                margin-bottom: 25px;
                display: flex;
                flex-direction: column;
                gap: 10px;
                background: #FAF7F2;
                padding: 25px 30px;
                border-radius: var(--radius);
                border: 1px solid var(--border-light);
            }
            .recipe-ingredients-list li {
                position: relative;
                padding-left: 25px;
                font-weight: 500;
            }
            .recipe-ingredients-list li::before {
                content: "\f00c";
                font-family: "Font Awesome 6 Free";
                font-weight: 900;
                position: absolute;
                left: 0;
                top: 2px;
                color: var(--gold);
                font-size: 0.9rem;
            }
            .recipe-steps-list {
                padding-left: 20px;
                margin-bottom: 25px;
                display: flex;
                flex-direction: column;
                gap: 20px;
            }
            .recipe-steps-list li {
                line-height: 1.7;
            }
            .recipe-steps-list li strong {
                display: block;
                font-size: 1.1rem;
                color: var(--brown);
                margin-bottom: 5px;
            }
            .article-footer-nav {
                margin-top: 50px;
                padding-top: 30px;
                border-top: 1px solid var(--border-light);
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
                justify-content: center;
            }
            .article-nav-btn {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 10px 20px;
                border-radius: var(--radius);
                text-decoration: none;
                font-weight: 600;
                font-size: 0.9rem;
                transition: all var(--transition);
            }
            .article-nav-btn--primary {
                background-color: var(--gold);
                color: var(--white);
            }
            .article-nav-btn--primary:hover {
                background-color: var(--gold-dark);
            }
            .article-nav-btn--secondary {
                border: 1px solid var(--border-dark);
                color: var(--text-dark);
            }
            .article-nav-btn--secondary:hover {
                background-color: var(--border-light);
            }
            /* Grid layout for intro block */
            .article-intro-grid {
                display: grid;
                grid-template-columns: 1.2fr 1fr;
                gap: 30px;
                align-items: center;
                margin-bottom: 30px;
            }
            .article-image-small {
                max-width: 500px;
                margin: 40px auto 30px auto;
                border-radius: var(--radius-lg);
                overflow: hidden;
                border: 1px solid var(--border-light);
                box-shadow: var(--shadow-sm);
            }
            @media (max-width: 768px) {
                .article-intro-grid {
                    grid-template-columns: 1fr;
                    gap: 20px;
                }
            }
            /* Servings Controls */
            .servings-widget {
                display: inline-flex;
                align-items: center;
                gap: 15px;
                background: #fffcf8;
                padding: 12px 24px;
                border-radius: 50px;
                border: 2px solid var(--gold-light);
                margin: 20px 0 30px 0;
                box-shadow: var(--shadow-sm);
            }
            .servings-label {
                font-weight: 600;
                color: var(--text-dark);
            }
            .servings-btn {
                width: 32px;
                height: 32px;
                border: 1px solid var(--border-dark);
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                background: white;
                cursor: pointer;
                font-weight: 700;
                color: var(--text-dark);
                transition: all 0.2s ease;
            }
            .servings-btn:hover {
                background-color: var(--gold);
                border-color: var(--gold);
                color: white;
            }
            .servings-value {
                font-size: 1.25rem;
                font-weight: 700;
                color: var(--brown);
                min-width: 30px;
                text-align: center;
            }
            .servings-note {
                font-size: 0.85rem;
                color: var(--text-muted);
                font-style: italic;
            }
        </style>

        <div class="article-wrapper">
            <article class="article-body">
                <div class="article-intro-grid">
                    <div>
                        <p class="article-lead" style="margin-bottom: 20px;">Crunchy, golden, and just sweet enough. An easy one-bowl biscuit that lets a good creamed honey do the talking. Makes about 24 biscuits at default size.</p>
                        <p style="margin-bottom: 0;">Enjoy baking with our premium raw New Zealand honey. Use the interactive scale controls below to adjust the recipe sizes automatically!</p>
                    </div>
                    <div class="article-image" style="border-radius: var(--radius-lg); overflow: hidden; border: 1px solid var(--border-light); box-shadow: var(--shadow-sm); margin-bottom: 0;">
                        <img src="/images/Honey-Oat-Biscuits.jpg" alt="Crunchy golden Honey Oat Biscuits" style="width: 100%; height: auto; display: block;">
                    </div>
                </div>

                <!-- Servings Selector -->
                <div class="servings-widget">
                    <span class="servings-label">Servings:</span>
                    <button type="button" id="decreaseServings" class="servings-btn" aria-label="Decrease servings"><i class="fa-solid fa-minus"></i></button>
                    <span id="servingsDisplay" class="servings-value">12</span>
                    <button type="button" id="increaseServings" class="servings-btn" aria-label="Increase servings"><i class="fa-solid fa-plus"></i></button>
                    <span class="servings-note">(Makes about <span id="biscuitsCount">24</span> biscuits)</span>
                </div>

                <h2>Ingredients</h2>
                <ul class="recipe-ingredients-list">
                    <li><span class="recipe-qty" data-base-qty="50" data-unit="g">50</span>g rolled oats</li>
                    <li><span class="recipe-qty" data-base-qty="75" data-unit="g">75</span>g plain flour</li>
                    <li><span class="recipe-qty" data-base-qty="37.5" data-unit="g">37.5</span>g desiccated coconut</li>
                    <li><span class="recipe-qty" data-base-qty="37.5" data-unit="g">37.5</span>g caster sugar</li>
                    <li><span class="recipe-qty" data-base-qty="62.5" data-unit="g">62.5</span>g butter</li>
                    <li><span class="recipe-qty" data-base-qty="1" data-unit="tbsp">1</span> tbsp Forest Fairy creamed honey (<a href="/shop/omanawa-falls-creamed-honey" style="color: var(--gold-dark); text-decoration: underline; font-weight: 500;">Omanawa Falls</a> or <a href="/shop/otumoetai-summer-harvest-creamed-honey" style="color: var(--gold-dark); text-decoration: underline; font-weight: 500;">Otumoetai</a>)</li>
                    <li><span class="recipe-qty" data-base-qty="0.5" data-unit="tsp">0.5</span> tsp baking soda</li>
                    <li><span class="recipe-qty" data-base-qty="1" data-unit="tbsp">1</span> tbsp boiling water</li>
                </ul>

                <div class="article-divider"></div>

                <h2>Steps</h2>
                <ol class="recipe-steps-list">
                    <li>
                        <strong>1. Heat the oven</strong>
                        Heat the oven to 160°C (fan) or 180°C (regular) and line two oven trays with baking paper. Honey browns faster than sugar, so this is a touch lower than a usual biscuit and it stops the bottoms catching.
                    </li>
                    <li>
                        <strong>2. Mix the dry ingredients</strong>
                        In a large bowl, stir together the <span class="recipe-qty" data-base-qty="50" data-unit="g">50</span>g rolled oats, <span class="recipe-qty" data-base-qty="75" data-unit="g">75</span>g plain flour, <span class="recipe-qty" data-base-qty="37.5" data-unit="g">37.5</span>g desiccated coconut and <span class="recipe-qty" data-base-qty="37.5" data-unit="g">37.5</span>g caster sugar until evenly combined.
                    </li>
                    <li>
                        <strong>3. Melt the butter and honey</strong>
                        In a small pot over low heat, melt the <span class="recipe-qty" data-base-qty="62.5" data-unit="g">62.5</span>g butter with the <span class="recipe-qty" data-base-qty="1" data-unit="tbsp">1</span> tbsp Forest Fairy creamed honey (Omanawa Falls or Otumoetai) together, just until the butter has melted. Do not let it boil. Take it off the heat.
                    </li>
                    <li>
                        <strong>4. Add the fizz</strong>
                        Stir the <span class="recipe-qty" data-base-qty="0.5" data-unit="tsp">0.5</span> tsp baking soda into the <span class="recipe-qty" data-base-qty="1" data-unit="tbsp">1</span> tbsp boiling water in a cup. It will foam up. Pour this straight into the melted butter and honey and stir. It will froth, and that is exactly what you want.
                    </li>
                    <li>
                        <strong>5. Bring it together</strong>
                        Pour the wet mix into the dry ingredients and stir until it forms a soft, even dough. If it feels too dry to hold together, add a teaspoon of boiling water; if too wet, a spoonful more flour.
                    </li>
                    <li>
                        <strong>6. Roll and flatten</strong>
                        Roll heaped teaspoons of dough into balls, place them on the trays leaving room to spread, and press each one flat with a fork.
                    </li>
                    <li>
                        <strong>7. Bake</strong>
                        Bake for 12 to 14 minutes, until golden. They will still feel soft when they come out and will crisp up as they cool, so go by colour, not firmness.
                    </li>
                    <li>
                        <strong>8. Cool</strong>
                        Leave the biscuits on the tray for 5 minutes to firm up, then move them to a rack to cool completely. Store in an airtight container once cold.
                    </li>
                </ol>

                <div class="article-image-small">
                    <img src="/images/Honey-Oat-Biscuits-2.jpg" alt="Honey Oat Biscuits cooling on a wire rack" style="width: 100%; height: auto; display: block;">
                </div>

                <div class="article-divider"></div>

                <h2>Notes</h2>
                <p><strong>Which honey:</strong> Use a mild creamed honey like Omanawa Falls or Otumoetai so it sweetens without overpowering. For a stronger honey flavour, use <a href="/shop/rewarewa-honey" style="color: var(--gold-dark); text-decoration: underline; font-weight: 500;">Rewarewa</a> instead. Warm the jar in a bowl of warm water for a few minutes before measuring so the honey lifts out cleanly. <em>Tip: measure the butter first, then the honey in the same warm spoon and it slides straight off.</em></p>
                <p><strong>Safety:</strong> Never give honey, raw or baked, to a baby under 12 months.</p>
                <p><strong>Make it your own:</strong> Add a handful of chocolate chips, sultanas, or chopped nuts with the dry ingredients.</p>

                <div class="article-footer-nav">
                    <a href="/shop" class="article-nav-btn article-nav-btn--primary"><i class="fa-solid fa-basket-shopping"></i> Shop Our Honey</a>
                    <a href="/blog/regional-honey-profiles" class="article-nav-btn article-nav-btn--secondary">Which Honey is Which</a>
                    <a href="/honey-questions" class="article-nav-btn article-nav-btn--secondary">Read Our FAQ</a>
                </div>
            </article>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const defaultServings = 12;
    const servingsDisplay = document.getElementById('servingsDisplay');
    const biscuitsCount = document.getElementById('biscuitsCount');
    const decreaseBtn = document.getElementById('decreaseServings');
    const increaseBtn = document.getElementById('increaseServings');
    const qtyElements = document.querySelectorAll('.recipe-qty');

    let currentServings = defaultServings;

    function updateRecipe(servings) {
        servingsDisplay.textContent = servings;
        biscuitsCount.textContent = servings * 2;
        
        qtyElements.forEach(el => {
            const baseQty = parseFloat(el.getAttribute('data-base-qty'));
            const unit = el.getAttribute('data-unit');
            let calculated = (baseQty / defaultServings) * servings;
            
            // Format quantities beautifully
            if (unit === 'g') {
                el.textContent = parseFloat(calculated.toFixed(1));
            } else if (unit === 'tbsp' || unit === 'tsp') {
                el.textContent = parseFloat(calculated.toFixed(2));
            } else {
                el.textContent = parseFloat(calculated.toFixed(1));
            }
        });
    }

    decreaseBtn.addEventListener('click', () => {
        if (currentServings > 2) {
            currentServings -= 2;
            updateRecipe(currentServings);
        }
    });

    increaseBtn.addEventListener('click', () => {
        if (currentServings < 48) {
            currentServings += 2;
            updateRecipe(currentServings);
        }
    });
});
</script>
@endsection
