@extends('layouts.app')

@section('title', 'Regional Profiles: From Omanawa to Mamaku | Forest Fairy Honey')
@section('meta_description', 'Why honey from the Mamaku ranges tastes nothing like honey from a Tauranga garden. A look at how land, height, and flowers shape every jar of Bay of Plenty honey.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/blog/regional-honey-profiles')

@section('content')
<!-- Page Hero -->
<section class="page-hero page-hero--blog" aria-label="Blog article hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> 
            <a href="/blog">Blog</a> <span aria-hidden="true">/</span> 
            <span aria-current="page">Regional Profiles</span>
        </nav>
        <span class="blog-tag" style="background-color: var(--gold-light); color: var(--gold-dark); padding: 6px 12px; border-radius: 50px; font-size: 0.85rem; font-weight: 600; display: inline-block; margin-bottom: 15px;">Education</span>
        <h1 class="page-hero-title">Regional Profiles:<br>From Omanawa to Mamaku</h1>
        <div class="faq-meta-bar" style="margin-top: 20px; justify-content: center; border: none; background: transparent; padding: 0; gap: 20px;">
            <span style="color: var(--white); opacity: 0.9;"><i class="fa-solid fa-clock" aria-hidden="true"></i> March 2026</span>
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
                margin-bottom: 10px;
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
            .article-link-btn {
                display: inline-block;
                margin-top: 5px;
                font-weight: 600;
                color: var(--gold-dark);
                text-decoration: underline;
            }
            .article-link-btn:hover {
                color: var(--gold);
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
            .article-figure {
                margin: 35px 0;
                text-align: center;
            }
            .article-figure img {
                width: 100%;
                max-height: 480px;
                object-fit: cover;
                border-radius: var(--radius);
                box-shadow: var(--shadow);
            }
            .article-figcaption {
                font-size: 0.88rem;
                color: var(--text-muted);
                margin-top: 10px;
                font-style: italic;
            }
        </style>

        <div class="article-wrapper">
            <article class="article-body">
                <p class="article-lead">Two jars of honey can sit side by side, both raw, both from the Bay of Plenty, and taste like completely different things. One is light and mild. The other is dark and almost malty.</p>

                <p>Nothing was done to either of them to make that happen. The difference was already there, in the flowers the bees found and the country those flowers grew in.</p>

                <p>Wine people have a word for this. They call it <em>terroir</em>, the idea that a place leaves its mark on what comes out of it. Honey works the same way, and arguably more so, because bees will only ever bring back what is flowering within a few kilometres of the hive. Move the hive and you change the honey.</p>

                <p>Here is what that means across our four honeys.</p>

                <div class="article-divider"></div>

                <h2>Why the Bay of Plenty is good country for honey</h2>

                <p>Our part of the country was built by volcanoes. The soils came out of eruptions, and the ash and rock that settled afterwards break down into ground that plants do very well in.</p>

                <p>Then there is the shape of the land. In not many kilometres you can go from a warm sheltered suburb up into cool wet ranges covered in native forest. That change in height matters more than people expect. Higher country is colder, so the same plant flowers weeks later up there than it does down near the coast.</p>

                <p>Different country, different flowers, different honey. That is really the whole story.</p>

                <figure class="article-figure">
                    <img src="/images/hives-open-country-ute.jpg" alt="Beehives situated in open Bay of Plenty pasture country with our work ute" loading="lazy">
                    <figcaption class="article-figcaption">Our hives positioned across open Bay of Plenty country, where bees forage diverse wildflowers.</figcaption>
                </figure>

                <div class="article-divider"></div>

                <h2>Our everyday honeys</h2>

                <p>These two are the jars that live on the bench and get used without much thought. Both are multifloral, which simply means the bees worked a mix of flowers rather than one dominant source. That mix is what makes them so easy to eat.</p>

                <h3>Omanawa Falls</h3>
                <p style="color: var(--gold-dark); font-weight: 600; font-size: 0.95rem; margin-bottom: 15px;">Native bush and open country, inland from Tauranga</p>

                <p>Omanawa sits inland from Tauranga, where the Omanawa River drops through a gorge in the foothills. It is a mix of steep native bush and the open country running up to the edge of it.</p>

                <p>The bees there work a broad combination of flowers, and no single one takes over. That is exactly why it turned out the way it did. This is honey with nothing sharp or unusual in it, the sort you can give to anyone.</p>

                <p><strong>What it tastes like:</strong> soft, mild, and gently sweet. Creamed until thick and smooth.</p>

                <p><strong>Best for:</strong> everyday use. Toast, porridge, tea, baking, and children who are fussy about strong flavours. If you are buying honey for someone whose taste you do not know, choose this one.</p>

                <p><a href="/shop/omanawa-falls-creamed-honey" class="article-link-btn">Try Omanawa Falls Creamed Honey &rarr;</a></p>

                <div class="article-divider"></div>

                <h3>Otumoetai</h3>
                <p style="color: var(--gold-dark); font-weight: 600; font-size: 0.95rem; margin-bottom: 15px;">Suburban gardens, warm and sheltered</p>

                <p>This one always makes people smile when they hear where it comes from. Otumoetai is a residential part of Tauranga, so this honey is made from garden flowers. Somebody's roses. Somebody's lemon tree. The clover in a back lawn that never quite got mown.</p>

                <p>Suburban bees have it good, and it shows in the jar. Gardens flower for a long stretch and offer huge variety, and there is very little of any one thing. The warm sheltered position means it comes on early in the season.</p>

                <p><strong>What it tastes like:</strong> the lightest and most delicate of our range. Bright and clean, without the depth of our native honeys. Creamed and smooth.</p>

                <p><strong>Best for:</strong> anyone who finds strong honey a bit much. Very good in tea, on yoghurt, and over fruit, where a heavier honey would take over.</p>

                <p><a href="/shop/otumoetai-summer-harvest-creamed-honey" class="article-link-btn">Try Otumoetai Summer Harvest Creamed Honey &rarr;</a></p>

                <div class="article-divider"></div>

                <h2>Our native honeys</h2>

                <p>These two are the ones we make a fuss about. Both come from native New Zealand plants rather than pasture and gardens, and both have far more going on in the jar.</p>

                <figure class="article-figure">
                    <img src="/images/hives-mamaku-forest.jpg" alt="Beehives lined up against the lush native bush of the Mamaku ranges" loading="lazy">
                    <figcaption class="article-figcaption">Beehives set against the deep native bush of the Mamaku ranges, rich in manuka and native flora.</figcaption>
                </figure>

                <h3>Mamaku</h3>
                <p style="color: var(--gold-dark); font-weight: 600; font-size: 0.95rem; margin-bottom: 15px;">High plateau, cool and misty, deep native forest</p>

                <p>The Mamaku plateau sits between Tauranga and Rotorua, several hundred metres above sea level. It was formed by an enormous eruption from the Rotorua area a very long time ago, which laid down the rock the whole plateau is built on. The plateau takes its name from the mamaku, the black tree fern that grows through the bush there.</p>

                <p>It is a different world up there. Cooler, wetter, often sitting under cloud when the coast is clear. Our hives work the country in and around the Mamaku Conservation Park, where the bees find manuka, clover, and trefoil flowering alongside a range of other native species.</p>

                <p>That manuka in the mix is why this honey behaves differently from the others. It is the jar we send to the lab with the most interest, and it tests at <strong>MGO 125</strong>. MGO is the compound used to measure the strength of honey from manuka nectar, and you can see the full result on our <a href="/our-testing">lab testing page</a>.</p>

                <p>Cooler, slower growing conditions tend to concentrate what ends up in the nectar, and you can taste that here.</p>

                <p><strong>What it tastes like:</strong> fuller and more complex than our everyday honeys, with a finish that lingers. Creamed and thick.</p>

                <p><strong>Best for:</strong> people who take their honey seriously, and anyone curious about what high native country puts into a jar. It is also the one to give as a gift.</p>

                <p><a href="/shop/mamaku-creamed-honey" class="article-link-btn">Try Mamaku Creamed Honey &rarr;</a></p>

                <div class="article-divider"></div>

                <h3>Rewarewa</h3>
                <p style="color: var(--gold-dark); font-weight: 600; font-size: 0.95rem; margin-bottom: 15px;">Not a place, but a tree</p>

                <p>Rewarewa is the odd one out, because it is named after a plant rather than a piece of land.</p>

                <p>Rewarewa is a tall native tree, sometimes called New Zealand honeysuckle. It grows through regenerating bush across the North Island and puts out curved red brush-like flowers that bees go to enthusiastically. When enough of them flower at once, you get a honey that is unmistakably rewarewa. There is no confusing it with anything else.</p>

                <p><strong>What it tastes like:</strong> dark amber, rich, and malty, with a caramel note and a slightly savoury edge. The strongest character in our range. Runny rather than creamed.</p>

                <p><strong>Best for:</strong> cooking, cheese boards, and anyone who thinks most honey tastes too sweet and too similar. Try it on a sharp cheddar or a blue.</p>

                <p><a href="/shop/rewarewa-honey" class="article-link-btn">Try Rewarewa Honey &rarr;</a></p>

                <div class="article-divider"></div>

                <h2>Taste them side by side</h2>

                <p>If you want to understand any of this properly, the fastest way is to open two jars at once.</p>

                <p>Put a spoon of the Otumoetai next to a spoon of the Rewarewa. Taste the light one first, then the dark. A suburban garden and a stand of native bush, a short drive apart, and the gap between them is bigger than most people expect from two jars of the same food.</p>

                <p>Then try the Omanawa against the Mamaku. That comparison is subtler and more interesting, because both are mixed-flower honeys. The difference there is the country itself: lowland bush and open ground on one side, cool high native forest on the other.</p>

                <div class="article-divider"></div>

                <h2>Why we do not blend</h2>

                <p>It would be easier to mix all of this together. Most honey on a supermarket shelf is blended, often from more than one country, because blending gives you the same product every single time.</p>

                <p>We would rather the Mamaku tasted like the Mamaku.</p>

                <p>That does mean our honey is not identical year to year. A wet spring, a late flowering, a good season for one plant and a poor one for another, and the jar shifts a little. We think that is the point. It is a record of a particular place in a particular year, and it is only possible because we do not heat it, blend it, or add anything to it. It goes from the comb into the jar, and that is all.</p>

                <div class="article-footer-nav">
                    <a href="/shop" class="article-nav-btn article-nav-btn--primary">
                        <i class="fa-solid fa-basket-shopping" aria-hidden="true"></i> Shop The Full Range
                    </a>
                    <a href="/blog" class="article-nav-btn article-nav-btn--secondary">
                        <i class="fa-solid fa-chevron-left" aria-hidden="true"></i> Back to Blog
                    </a>
                    <a href="/honey-questions" class="article-nav-btn article-nav-btn--secondary">
                        <i class="fa-solid fa-circle-question" aria-hidden="true"></i> Read Honey FAQ
                    </a>
                    <a href="/our-testing" class="article-nav-btn article-nav-btn--secondary">
                        <i class="fa-solid fa-flask" aria-hidden="true"></i> See Lab Results
                    </a>
                </div>
            </article>
        </div>
    </div>
</section>
@endsection
