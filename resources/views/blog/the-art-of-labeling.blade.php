@extends('layouts.app')

@section('title', 'Honest Labels: What Goes Into Every Jar | Forest Fairy Honey')
@section('meta_description', 'How to read a honey label properly. What New Zealand law requires, which words mean nothing, and what we put on ours.')
@section('canonical', 'https://www.forestfairyhoney.co.nz/blog/the-art-of-labeling')

@section('content')
<!-- Page Hero -->
<section class="page-hero page-hero--blog" aria-label="Blog article hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> 
            <a href="/blog">Blog</a> <span aria-hidden="true">/</span> 
            <span aria-current="page">Honest Labels</span>
        </nav>
        <span class="blog-tag" style="background-color: var(--gold-light); color: var(--gold-dark); padding: 6px 12px; border-radius: 50px; font-size: 0.85rem; font-weight: 600; display: inline-block; margin-bottom: 15px;">Brand</span>
        <h1 class="page-hero-title">Honest Labels:<br>What Goes Into Every Jar</h1>
        <div class="faq-meta-bar" style="margin-top: 20px; justify-content: center; border: none; background: transparent; padding: 0; gap: 20px;">
            <span style="color: var(--white); opacity: 0.9;"><i class="fa-solid fa-clock" aria-hidden="true"></i> February 2026</span>
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
            .article-numbered-list {
                padding-left: 20px;
                margin-bottom: 25px;
                display: flex;
                flex-direction: column;
                gap: 12px;
            }
            .article-numbered-list li {
                line-height: 1.6;
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
        </style>

        <div class="article-wrapper">
            <article class="article-body">
                <div class="article-intro-grid">
                    <div>
                        <p class="article-lead" style="margin-bottom: 15px;">A honey label has two jobs. One is to sell you the honey. The other is to tell you what is in the jar.</p>
                        <p style="margin-bottom: 15px;">Those jobs pull in opposite directions more often than you would think. A label can be completely legal, completely truthful, and still leave you knowing almost nothing about what you are buying.</p>
                        <p style="margin-bottom: 0;">So this is a short guide to reading a honey label properly, including ours. By the end you should be able to pick up any jar in any shop and work out how much the producer is actually telling you.</p>
                    </div>
                    <div class="article-image" style="border-radius: var(--radius-lg); overflow: hidden; border: 1px solid var(--border-light); box-shadow: var(--shadow-sm); margin-bottom: 0;">
                        <img src="/images/honest-labels-1.jpg" alt="Cabbage tree in bloom in New Zealand forest" style="width: 100%; height: auto; display: block;">
                    </div>
                </div>

                <div class="article-divider"></div>

                <h2>What the law makes every producer tell you</h2>

                <p>In New Zealand, honey labels have to meet the Australia New Zealand Food Standards Code, the Fair Trading Act, and the Weights and Measures Regulations. Between them, a jar has to carry a fair amount.</p>

                <p>You should expect to find:</p>

                <ul class="article-bullet-list">
                    <li><strong>The name of the food</strong>, and the floral type if one is claimed</li>
                    <li><strong>The net weight</strong>, so you can compare prices properly</li>
                    <li><strong>The name and address</strong> of the New Zealand business responsible for it</li>
                    <li><strong>A best before date</strong></li>
                    <li><strong>A batch or lot code</strong>, so the honey can be traced if anything goes wrong</li>
                    <li><strong>Nutrition information</strong></li>
                </ul>

                <p>There is also a rule underneath all of it that matters more than any individual item: whatever you put on a label has to be true, and you have to be able to prove it. That applies to every claim, not just the regulated ones.</p>

                <p>None of this is optional, and a producer meeting all of it is doing the minimum rather than something special.</p>

                <div class="article-divider"></div>

                <h2>The interesting part is what is missing</h2>

                <p>Here is the thing. A label can tick every legal box and still tell you very little.</p>

                <p>Nothing forces a producer to tell you the region the honey came from. Or whether it was heated. Or whether it is one honey or six honeys mixed together. Or what the bees were actually working.</p>

                <p>So when you are comparing jars, the useful question is not "is this label legal". It almost certainly is. The useful question is <strong>how much did they choose to tell me beyond what they had to?</strong></p>

                <div class="article-divider"></div>

                <h2>Words that sound like they mean something</h2>

                <p>A few phrases turn up constantly on honey. Some carry real weight. Others carry almost none.</p>

                <p><strong>"Pure"</strong> usually just means the jar contains honey and nothing else has been added. It is a good baseline, but it says nothing at all about heating, filtering, blending, or origin. Pure honey can still be heavily processed.</p>

                <p><strong>"Natural"</strong> is close to meaningless on honey. All honey is natural in the ordinary sense of the word.</p>

                <p><strong>"Premium", "gold", "select", "reserve"</strong> are marketing words. No standard sits behind any of them.</p>

                <p><strong>"Blend of New Zealand and imported honeys"</strong> is one to actually read. It is honest, and it is telling you the honey did not all come from here.</p>

                <p><strong>"Product of more than one country"</strong> means the same thing, and is often set in the smallest type on the jar.</p>

                <p><strong>"Raw"</strong> has no legal definition in New Zealand, so it is a claim rather than a guarantee. Worth looking for something behind it.</p>

                <p><strong>A named region or floral source</strong> is the phrase that carries the most weight, because it is specific and checkable. Vagueness is easy. Specifics are not.</p>

                <div class="article-image-small">
                    <img src="/images/honest-labels-2.jpg" alt="Close-up of cabbage tree flower spikes" style="width: 100%; height: auto; display: block;">
                </div>

                <div class="article-divider"></div>

                <h2>What is on our jars, and why</h2>

                <p>We are a small operation, so our labels are not works of design genius. But we try to make every line on them do something useful.</p>

                <p><strong>The place, not just the country.</strong> Our honeys are named Omanawa Falls, Mamaku, and Otumoetai, because that is where they came from. We could legally write "New Zealand honey" on all three and be done with it. Naming the actual place commits us to something, and it lets you tell our honeys apart, which is the whole point when they taste as different as they do.</p>

                <p><strong>The floral type where there is one.</strong> Our Rewarewa is named for the native tree the bees worked. Our multifloral honeys are not dressed up as something more specific than they are.</p>

                <p><strong>One ingredient.</strong> Honey. There is nothing else in the jar, because nothing else went into it.</p>

                <p><strong>Batch information.</strong> So a jar can be traced back to a particular harvest. This is required, but it is also the thing that makes our lab testing meaningful, because a test result only means something if you can connect it to the honey you are actually holding.</p>

                <div class="article-divider"></div>

                <h2>What we deliberately leave off</h2>

                <p>This part matters as much as what we include.</p>

                <p><strong>We do not make health claims.</strong> Not on the jar, not on the website, not anywhere. New Zealand law is strict about claiming a food treats or prevents anything, and honestly, the rules are right. We sell honey because it is good honey, not because of anything we are promising it will do for you.</p>

                <p><strong>We do not use words we cannot back up.</strong> If we cannot show you evidence for something, it does not go on the label.</p>

                <p><strong>We do not hide the ordinary ones.</strong> Two of our honeys, the Omanawa Falls and the Otumoetai, are everyday multiflorals. One comes from bush and open country, the other from suburban gardens. We could describe them in grander language. They are honestly just very good everyday honey, and saying so seems better than inflating them.</p>

                <div class="article-divider"></div>

                <h2>The bit a label cannot fit</h2>

                <p>There is a limit to how much truth you can print on a piece of paper the size of your palm.</p>

                <p>So the things that will not fit on a jar go on this website instead. Our full lab results are published on the <a href="/our-testing">testing page</a>, including the parts that are merely fine rather than impressive. How each honey is made and where it comes from is on the <a href="/blog">blog</a>. Common questions are answered in the <a href="/honey-questions">honey FAQ</a>.</p>

                <p>The label points you at the honey. The site is where you check us.</p>

                <div class="article-divider"></div>

                <h2>How to read any honey label in thirty seconds</h2>

                <p>Next time you pick up a jar, run through this.</p>

                <ol class="article-numbered-list">
                    <li><strong>Where is it from?</strong> A named region beats "New Zealand", which beats "more than one country".</li>
                    <li><strong>What flowers?</strong> A floral source or an honest "multifloral" beats no information at all.</li>
                    <li><strong>What is in it?</strong> The ingredients should say honey, and stop there.</li>
                    <li><strong>Who made it?</strong> A real name and address you could contact.</li>
                    <li><strong>What are they claiming, and can they show you?</strong> Any claim worth making should have something behind it on their website.</li>
                    <li><strong>What are they not saying?</strong> This is the one most people skip, and it usually tells you the most.</li>
                </ol>

                <p>You can do that in half a minute, and it will tell you more than the front of the jar ever will.</p>

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
