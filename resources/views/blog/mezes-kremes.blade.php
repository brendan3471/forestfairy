@extends('layouts.app')

@section('title', 'Mézes Krémes (Hungarian Honey Cake) Recipe | Forest Fairy Honey')
@section('meta_description', 'A traditional Hungarian honey cake of soft, honey-spiced layers holding a rich vanilla custard cream, finished with glossy chocolate.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/blog/mezes-kremes')
@section('og_title', 'Mézes Krémes (Hungarian Honey Cake) Recipe — Forest Fairy Honey')
@section('og_description', 'A traditional Hungarian honey cake: soft, honey-spiced layers with rich vanilla custard cream, finished with glossy chocolate.')

@section('content')
<!-- Page Hero -->
<section class="page-hero page-hero--blog" aria-label="Blog article hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> 
            <a href="/blog">Blog</a> <span aria-hidden="true">/</span> 
            <span aria-current="page">Mézes Krémes</span>
        </nav>
        <span class="blog-tag" style="background-color: var(--gold-light); color: var(--gold-dark); padding: 6px 12px; border-radius: 50px; font-size: 0.85rem; font-weight: 600; display: inline-block; margin-bottom: 15px;">Recipes</span>
        <h1 class="page-hero-title">Mézes Krémes<br>(Hungarian Honey Cake)</h1>
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
                        <p class="article-lead" style="margin-bottom: 20px;">Mézes Krémes (Hungarian Honey Cake). The classic Hungarian honey cake. Soft, honey-spiced layers holding a rich vanilla custard cream, finished with a shiny chocolate top. A traditional project bake worth every step. Makes about 15 slices.</p>
                        <p style="margin-bottom: 0;">Adjust the slider or servings selector below to scale this traditional recipe. The ingredient weights and liquid measures in the lists and steps will automatically scale!</p>
                    </div>
                    <div class="article-image" style="border-radius: var(--radius-lg); overflow: hidden; border: 1px solid var(--border-light); box-shadow: var(--shadow-sm); margin-bottom: 0;">
                        <img src="/images/M%C3%A9zes-Kr%C3%A9mes.jpg" alt="Hungarian Honey Cake Mézes Krémes slices" style="width: 100%; height: auto; display: block;">
                    </div>
                </div>

                <!-- Servings Selector -->
                <div class="servings-widget">
                    <span class="servings-label">Slices:</span>
                    <button type="button" id="decreaseServings" class="servings-btn" aria-label="Decrease servings"><i class="fa-solid fa-minus"></i></button>
                    <span id="servingsDisplay" class="servings-value">15</span>
                    <button type="button" id="increaseServings" class="servings-btn" aria-label="Increase servings"><i class="fa-solid fa-plus"></i></button>
                    <span class="servings-note">(Makes about <span id="slicesCount">15</span> traditional cake slices)</span>
                </div>

                <h2>Ingredients</h2>
                <ul class="recipe-ingredients-list">
                    <li><span class="recipe-qty" data-base-qty="400" data-unit="g">400</span>g plain flour</li>
                    <li><span class="recipe-qty" data-base-qty="3" data-unit="tbsp">3</span> tbsp Forest Fairy creamed honey (<a href="/shop/omanawa-falls-creamed-honey" style="color: var(--gold-dark); text-decoration: underline; font-weight: 500;">Omanawa Falls</a> or <a href="/shop/otumoetai-summer-harvest-creamed-honey" style="color: var(--gold-dark); text-decoration: underline; font-weight: 500;">Otumoetai</a>)</li>
                    <li><span class="recipe-qty" data-base-qty="100" data-unit="g">100</span>g caster sugar</li>
                    <li><span class="recipe-qty" data-base-qty="60" data-unit="g">60</span>g butter</li>
                    <li><span class="recipe-qty" data-base-qty="1" data-unit="qty">1</span> large egg</li>
                    <li><span class="recipe-qty" data-base-qty="1" data-unit="tsp">1</span> tsp baking soda</li>
                    <li><span class="recipe-qty" data-base-qty="1" data-unit="tsp">1</span> tsp ground cinnamon</li>
                    <li><span class="recipe-qty" data-base-qty="600" data-unit="ml">600</span>ml milk</li>
                    <li><span class="recipe-qty" data-base-qty="100" data-unit="g">100</span>g caster sugar (for the custard)</li>
                    <li><span class="recipe-qty" data-base-qty="60" data-unit="g">60</span>g cornflour</li>
                    <li><span class="recipe-qty" data-base-qty="3" data-unit="qty">3</span> large egg yolks</li>
                    <li><span class="recipe-qty" data-base-qty="2" data-unit="tsp">2</span> tsp vanilla extract</li>
                    <li><span class="recipe-qty" data-base-qty="200" data-unit="g">200</span>g butter, softened (for the cream)</li>
                    <li><span class="recipe-qty" data-base-qty="150" data-unit="g">150</span>g dark chocolate</li>
                    <li><span class="recipe-qty" data-base-qty="30" data-unit="g">30</span>g butter (for the topping)</li>
                </ul>

                <div class="article-divider"></div>

                <h2>Steps</h2>
                <ol class="recipe-steps-list">
                    <li>
                        <strong>1. Melt the honey mixture</strong>
                        Make the dough first, as it needs to be workable while warm. Set a heatproof bowl over a pot of simmering water (do not let the bowl touch the water). Add the <span class="recipe-qty" data-base-qty="3" data-unit="tbsp">3</span> tbsp Forest Fairy creamed honey (Omanawa Falls or Otumoetai), <span class="recipe-qty" data-base-qty="100" data-unit="g">100</span>g caster sugar and <span class="recipe-qty" data-base-qty="60" data-unit="g">60</span>g butter and stir until melted and smooth. Take off the heat and let it cool for a couple of minutes so it will not cook the egg.
                    </li>
                    <li>
                        <strong>2. Make the honey dough</strong>
                        Whisk the <span class="recipe-qty" data-base-qty="1" data-unit="tsp">1</span> tsp baking soda and <span class="recipe-qty" data-base-qty="1" data-unit="tsp">1</span> tsp ground cinnamon into the warm honey mixture, then beat in the <span class="recipe-qty" data-base-qty="1" data-unit="qty">1</span> large egg. Add the <span class="recipe-qty" data-base-qty="400" data-unit="g">400</span>g plain flour a little at a time, mixing until it comes together into a soft dough. Turn it out and knead briefly until smooth. It will be soft and slightly sticky while warm, which is what you want.
                    </li>
                    <li>
                        <strong>3. Divide and roll</strong>
                        Divide the dough into 4 equal pieces. Heat the oven to 180°C (fan 160°C). Roll each piece directly on a sheet of baking paper into a rectangle roughly 20cm x 30cm, dusting with flour to stop sticking. Work with one piece at a time and keep the rest covered.
                    </li>
                    <li>
                        <strong>4. Bake the four layers</strong>
                        Bake each layer on its paper for 5 to 7 minutes, until golden and just firm. They bake fast and colour quickly because of the honey, so watch them. Slide each baked layer, still on its paper, onto a rack. They crisp as they cool and soften again later in the cream.
                    </li>
                    <li>
                        <strong>5. Start the custard</strong>
                        Now the custard. In a pot, whisk together the <span class="recipe-qty" data-base-qty="100" data-unit="g">100</span>g caster sugar (for the custard), <span class="recipe-qty" data-base-qty="60" data-unit="g">60</span>g cornflour and <span class="recipe-qty" data-base-qty="3" data-unit="qty">3</span> large egg yolks with a splash of the <span class="recipe-qty" data-base-qty="600" data-unit="ml">600</span>ml milk to make a smooth paste. Whisk in the rest of the <span class="recipe-qty" data-base-qty="600" data-unit="ml">600</span>ml milk and the <span class="recipe-qty" data-base-qty="2" data-unit="tsp">2</span> tsp vanilla extract.
                    </li>
                    <li>
                        <strong>6. Cook and cool the custard</strong>
                        Cook over medium heat, whisking constantly, until it thickens to a stiff, smooth custard, about 5 to 8 minutes. Once it thickens, keep whisking for another minute. Pour into a bowl, press cling film onto the surface, and cool to room temperature.
                    </li>
                    <li>
                        <strong>7. Make the custard cream</strong>
                        Beat the <span class="recipe-qty" data-base-qty="200" data-unit="g">200</span>g butter, softened (for the cream) until pale and fluffy. Add the cooled custard a spoonful at a time, beating well between each addition, until you have a smooth, thick cream. If it looks split, keep beating and it will come together.
                    </li>
                    <li>
                        <strong>8. Assemble</strong>
                        Place one biscuit layer on a serving board or in a lined tin. Spread with a third of the cream. Repeat with two more layers and the rest of the cream, finishing with the fourth biscuit layer on top, flat side up. Press down gently.
                    </li>
                    <li>
                        <strong>9. Top with chocolate</strong>
                        Melt the <span class="recipe-qty" data-base-qty="150" data-unit="g">150</span>g dark chocolate with the <span class="recipe-qty" data-base-qty="30" data-unit="g">30</span>g butter (for the topping) until glossy and smooth, then spread over the top layer. Let the chocolate begin to set, then mark portions with a warm knife so it slices cleanly later.
                    </li>
                    <li>
                        <strong>10. Rest overnight (the important bit)</strong>
                        Cover and refrigerate overnight, or at least 8 hours. This rest is essential: the biscuit layers draw moisture from the cream and turn soft and cake-like. Slice with a warm knife to serve.
                    </li>
                </ol>

                <div class="article-divider"></div>

                <h2>Notes</h2>
                <p><strong>Which honey:</strong> A mild creamed honey like Omanawa Falls or Otumoetai keeps the layers gently honeyed. For a deeper, more traditional honey flavour, use <a href="/shop/rewarewa-honey" style="color: var(--gold-dark); text-decoration: underline; font-weight: 500;">Rewarewa</a>.</p>
                <p><strong>Timing:</strong> The assembled cake needs to rest overnight in the fridge so the layers soften into the cream. Do not skip this; it is what turns four biscuits and some custard into Mézes Krémes.</p>
                <p><strong>Make ahead:</strong> It keeps well for 3 to 4 days chilled, and many say it is better on day two.</p>
                <p><strong>Safety:</strong> Never give honey, raw or baked, to a baby under 12 months.</p>
                <p><strong>The name:</strong> Mézes Krémes means honey cream, and mézes (honeyed) shares its root with méz, the Hungarian word for honey.</p>

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
    const defaultServings = 15;
    const servingsDisplay = document.getElementById('servingsDisplay');
    const slicesCount = document.getElementById('slicesCount');
    const decreaseBtn = document.getElementById('decreaseServings');
    const increaseBtn = document.getElementById('increaseServings');
    const qtyElements = document.querySelectorAll('.recipe-qty');

    let currentServings = defaultServings;

    function updateRecipe(servings) {
        servingsDisplay.textContent = servings;
        slicesCount.textContent = servings;
        
        qtyElements.forEach(el => {
            const baseQty = parseFloat(el.getAttribute('data-base-qty'));
            const unit = el.getAttribute('data-unit');
            let calculated = (baseQty / defaultServings) * servings;
            
            // Format quantities beautifully
            if (unit === 'g' || unit === 'ml') {
                el.textContent = Math.round(calculated);
            } else if (unit === 'tbsp' || unit === 'tsp') {
                el.textContent = parseFloat(calculated.toFixed(2));
            } else {
                el.textContent = parseFloat(calculated.toFixed(2));
            }
        });
    }

    decreaseBtn.addEventListener('click', () => {
        if (currentServings > 5) {
            currentServings -= 5;
            updateRecipe(currentServings);
        }
    });

    increaseBtn.addEventListener('click', () => {
        if (currentServings < 45) {
            currentServings += 5;
            updateRecipe(currentServings);
        }
    });
});
</script>
@endsection
