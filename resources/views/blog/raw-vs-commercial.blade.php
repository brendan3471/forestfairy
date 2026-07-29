@extends('layouts.app')

@section('title', 'Raw vs Processed Honey: Why Real Truly Matters | Forest Fairy Honey')
@section('meta_description', 'Most supermarket honey is heated and filtered before it reaches the shelf. Here is what that does to it, and the two lab numbers that show whether honey was ever really heated.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/blog/raw-vs-commercial')
@section('og_title', 'Raw vs Processed Honey: Why It Matters — Forest Fairy Honey')
@section('og_description', 'Most supermarket honey is heated and filtered. Here\'s what that does to it, and how lab numbers reveal whether honey was ever really heated.')

@section('content')
<!-- Page Hero -->
<section class="page-hero page-hero--blog" aria-label="Blog article hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> 
            <a href="/blog">Blog</a> <span aria-hidden="true">/</span> 
            <span aria-current="page">Raw vs Processed Honey</span>
        </nav>
        <span class="blog-tag" style="background-color: var(--gold-light); color: var(--gold-dark); padding: 6px 12px; border-radius: 50px; font-size: 0.85rem; font-weight: 600; display: inline-block; margin-bottom: 15px;">Education</span>
        <h1 class="page-hero-title">Raw vs Processed Honey:<br>Why Real Truly Matters</h1>
        <div class="faq-meta-bar" style="margin-top: 20px; justify-content: center; border: none; background: transparent; padding: 0; gap: 20px;">
            <span style="color: var(--white); opacity: 0.9;"><i class="fa-solid fa-clock" aria-hidden="true"></i> December 2025</span>
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
            .article-bullet-list {
                list-style: none;
                padding-left: 0;
                margin-bottom: 25px;
                display: flex;
                flex-direction: column;
                gap: 12px;
            }
            .article-bullet-list li {
                position: relative;
                padding-left: 28px;
            }
            .article-bullet-list li::before {
                content: "\f00c";
                font-family: "Font Awesome 6 Free";
                font-weight: 900;
                position: absolute;
                left: 0;
                top: 2px;
                color: var(--gold);
                font-size: 0.9rem;
            }
            .article-table-container {
                margin: 30px 0;
                overflow-x: auto;
            }
            .article-table {
                width: 100%;
                border-collapse: collapse;
                text-align: left;
            }
            .article-table th, .article-table td {
                padding: 14px 18px;
                border: 1px solid var(--border-light);
            }
            .article-table th {
                background-color: #fbf9f6;
                color: var(--brown);
                font-weight: 700;
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
        </style>

        <div class="article-wrapper">
            <article class="article-body">
                <p class="article-lead">Nearly every jar of honey on a supermarket shelf has been heated before it got there.</p>

                <p>Not scorched, and not to any level that makes it unsafe. But warmed, filtered, and warmed again, because that is what it takes to move honey through a factory at speed and get it into a jar that looks the same as every other jar on the shelf.</p>

                <p>Ours has not been. And rather than simply asking you to take our word for that, we can show you the numbers.</p>

                <p>Here is what processing actually does, and how you can tell the difference for yourself.</p>

                <div class="article-divider"></div>

                <h2>First, an honest word about the word "raw"</h2>

                <p>There is no legal definition of raw honey in New Zealand. Nobody has to meet a standard before putting the word on a label.</p>

                <p>That is worth knowing, because it means "raw" on a jar is a claim, not a guarantee. Some producers use it to mean never heated at all. Others use it to mean heated a bit less than usual.</p>

                <p>We are telling you this because it makes the rest of the article more useful. If the word alone does not prove anything, you need something else to go on. There is something, and we will get to it.</p>

                <div class="article-divider"></div>

                <h2>What actually happens to processed honey</h2>

                <p>Straight out of the hive, honey is thick, cloudy with tiny particles of pollen and wax, and it sets solid after a while. None of that suits a large scale production line.</p>

                <p>So three things usually happen.</p>

                <p><strong>It gets heated.</strong> Warm honey is thinner and flows faster, which makes it easier to pump, filter, and bottle. Heat also melts out the small crystals that would otherwise make the honey set in the jar, which keeps it clear and runny on the shelf for longer.</p>

                <p><strong>It gets finely filtered.</strong> This makes it look bright and clear. It also strips out the pollen, which is the very thing that would have told you where the honey came from.</p>

                <p><strong>It gets blended.</strong> Honey from different hives, different regions, and often different countries is mixed to hit a consistent colour and flavour. That is why a supermarket brand tastes the same every single time you buy it.</p>

                <p>Every one of those steps has a good commercial reason behind it. They make honey cheaper, more consistent, and longer lasting on a shelf. What they do not do is leave it as it came out of the hive.</p>

                <div class="article-divider"></div>

                <h2>The two numbers that reveal heat</h2>

                <p>Here is the useful part.</p>

                <p>Heating honey leaves evidence, and a lab can measure it. Two tests in particular tell the story, and they work in opposite directions.</p>

                <p><strong>HMF</strong> is a compound that forms in honey over time, and it forms much faster when honey is heated. Fresh, unheated honey has very little. The international food standard sets a maximum of 40 mg/kg. A high number means the honey has been heated, stored warm, or is simply old.</p>

                <p><strong>Diastase</strong> is a natural enzyme that bees add to honey. Heat destroys it. The international standard sets a minimum of 8 DN, and the more diastase left in the jar, the gentler the treatment it has had.</p>

                <p>Together, these two give you something no marketing claim can. A high HMF and a low diastase means heat, whatever the label says.</p>

                <div class="article-divider"></div>

                <h2>What our honey measured</h2>

                <p>Our honey is tested by Hill Labs in Hamilton, an independently accredited New Zealand laboratory. Here is what came back.</p>

                <div class="article-table-container">
                    <table class="article-table">
                        <thead>
                            <tr>
                                <th>Test</th>
                                <th>Standard</th>
                                <th>Our result</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>HMF</strong></td>
                                <td>40 mg/kg maximum</td>
                                <td><strong style="color: var(--gold-dark);">13.6 mg/kg</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Diastase</strong></td>
                                <td>8 DN minimum</td>
                                <td><strong style="color: var(--gold-dark);">15.2 DN</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p>Low HMF, and diastase comfortably above the minimum. That is what honey looks like when it has not been cooked.</p>

                <p>We publish the full certificate rather than just the flattering bits, and you can read it on our <a href="/our-testing">lab testing page</a>.</p>

                <p>This is the point of the whole article, really. Anyone can print "raw" on a label. These two numbers are the part that cannot be talked into existence.</p>

                <div class="article-divider"></div>

                <h2>What we actually do</h2>

                <p>Our process is short enough to describe in one sentence.</p>

                <p>We take the honey out of the comb, and we put it into jars.</p>

                <p>That is genuinely all of it. No heating, no fine filtering, no blending across regions, and nothing added. We work in small batches, which is the only way this is possible, and each of our honeys stays separate so it still tastes like the place it came from.</p>

                <p>It is slower and it produces less. We think the jar is better for it.</p>

                <div class="article-divider"></div>

                <h2>Why our honey sets, and why that is good news</h2>

                <p>Raw honey crystallises. It goes thick, grainy, or solid, sometimes within weeks.</p>

                <p>People often think this means something has gone wrong. It is the opposite. Crystallising is what honey naturally does, and the reason most supermarket honey stays glassy and runny for a year is that heating and fine filtering removed the tiny particles that crystals would have formed around.</p>

                <p>So a jar that sets is a jar that was left alone.</p>

                <p>If you prefer it soft, stand the jar in warm water for a few minutes. Do not microwave it, and do not use boiling water, because that undoes the very thing you paid for.</p>

                <p>Our creamed honeys, the Omanawa Falls, Otumoetai and Mamaku, are made thick and smooth on purpose. Creaming is a physical process that controls the size of the crystals. No heat is involved, and that is why they stay spreadable rather than going hard in the jar.</p>

                <div class="article-divider"></div>

                <h2>What raw does not mean</h2>

                <p>We would rather be straight with you about this.</p>

                <p>Raw honey is still sugar. It is not a health food, and we are not going to tell you it does anything for you medically, because that is not a claim any honey producer in New Zealand should be making.</p>

                <p>Honey of any kind, raw or not, should never be given to babies under 12 months old.</p>

                <p>What raw honey does give you is honey that still tastes of where it came from, with its natural pollen, enzymes and aroma intact. That is a good enough reason on its own.</p>

                <div class="article-divider"></div>

                <h2>How to check honey before you buy it</h2>

                <p>If you are standing in front of a shelf, or a website, here is what is worth looking at.</p>

                <ul class="article-bullet-list">
                    <li><strong>Look for a specific place.</strong> Not "product of more than one country", and not just "New Zealand", but an actual region or floral source. Specific origin is hard to fake and easy to check.</li>
                    <li><strong>See if they publish test results.</strong> Very few producers do. It is the clearest signal you will get, because numbers can be checked and adjectives cannot.</li>
                    <li><strong>Expect it to set.</strong> A honey that never crystallises has almost certainly been treated to stop it.</li>
                    <li><strong>Be realistic about price.</strong> Small batch honey from a named place costs more to make than blended honey by the tonne. If the price looks too good, something in the supply chain explains it.</li>
                    <li><strong>Read the ingredients.</strong> It should say honey. Nothing else.</li>
                </ul>

                <div class="article-divider"></div>

                <h2>The short version</h2>

                <p>Processing makes honey cheaper, clearer, and more consistent. It also heats out the things that made each batch different from the next.</p>

                <p>We would rather sell you honey that varies a little between seasons and still tastes like the country it came from. The lab numbers are there so you do not have to take that on trust.</p>

                <div class="article-footer-nav">
                    <a href="/shop" class="article-nav-btn article-nav-btn--primary">
                        <i class="fa-solid fa-basket-shopping" aria-hidden="true"></i> Shop Our Honey
                    </a>
                    <a href="/our-testing" class="article-nav-btn article-nav-btn--secondary">
                        <i class="fa-solid fa-flask" aria-hidden="true"></i> See Lab Results
                    </a>
                    <a href="/honey-questions" class="article-nav-btn article-nav-btn--secondary">
                        <i class="fa-solid fa-circle-question" aria-hidden="true"></i> Read Honey FAQ
                    </a>
                    <a href="/blog" class="article-nav-btn article-nav-btn--secondary">
                        <i class="fa-solid fa-chevron-left" aria-hidden="true"></i> Back to Blog
                    </a>
                </div>
            </article>
        </div>
    </div>
</section>
@endsection
