@extends('layouts.app')

@section('title', 'Honey Questions Answered | Forest Fairy Honey NZ')
@section('meta_description', 'Simple answers to common honey questions. Learn how to buy pure honey, check if it is real, why supermarket honey is cheap, and if Manuka is worth it. From Forest Fairy Honey in New Zealand.')
@section('canonical', 'https://forestfairyhoney.co.nz/honey-questions')
@section('meta_keywords', 'best honey to buy, pure honey NZ, healthiest honey, purest honey brand, raw honey vs supermarket honey, why supermarket honey is cheap, why is Manuka honey so expensive, does real honey expire')

@section('schema')
<script type="application/ld+json">
@verbatim
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is the best honey to buy online?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The best honey to buy online is raw honey from a seller who tells you where it came from and shows test results. Look for the flower type, the region, and UMF or MGO testing for Manuka. Glass jars are a good sign, and it is best to avoid very cheap honey that may be watered down or over-heated."
      }
    },
    {
      "@type": "Question",
      "name": "What is the best honey in New Zealand?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "New Zealand is famous for Manuka honey, which many people call one of the best honeys in the world because of its high MGO. New Zealand also makes other great honeys like Rewarewa, Kamahi, Clover, Pohutukawa, and Beech Honeydew. The best one for you depends on how you use it."
      }
    },
    {
      "@type": "Question",
      "name": "What type of honey is the healthiest?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Raw honey is usually the healthiest kind because it is not heated much, so it keeps its natural enzymes, antioxidants, and pollen. Darker honeys like Manuka, Rewarewa, and Buckwheat often have more antioxidants than light ones. Honey is still sugar, so enjoy it in small amounts."
      }
    },
    {
      "@type": "Question",
      "name": "How to check if honey is 100% pure?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The best way to know honey is 100% pure is to buy from a seller who shows lab test results and clear labels. Home checks like the water test, thumb test, and natural crystals are only rough guides, because honey mixed with syrup can be hard to spot by eye."
      }
    },
    {
      "@type": "Question",
      "name": "Which honey brand is the purest?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "There is no single purest brand. The purest honey comes from brands that sell raw honey, keep the processing to a minimum, get it lab tested, and add nothing, with no sugar, syrup, or heating. The less that is done to honey, the more pure it stays."
      }
    },
    {
      "@type": "Question",
      "name": "Is raw honey better than supermarket honey?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, raw honey is better than most supermarket honey. Raw honey is not heated or heavily filtered, so it keeps more natural enzymes, pollen, and flavour. A lot of supermarket honey is blended and processed for a smooth look and a long shelf life, which can strip out some of the good stuff."
      }
    },
    {
      "@type": "Question",
      "name": "Why is supermarket honey so cheap?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Supermarket honey is often cheap because it is made in huge amounts, blended from many sources, and sometimes imported from countries with lower costs. It is usually heated and filtered to stay smooth and last a long time on the shelf, which can make it harder to trace."
      }
    },
    {
      "@type": "Question",
      "name": "Which is the most natural honey to buy?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The most natural honey to buy is raw honey straight from the hive. It is not heated or over-filtered, and nothing is added. Look for the words raw and 100% honey, one flower type, and no added syrup. It is normal for raw honey to turn grainy over time."
      }
    },
    {
      "@type": "Question",
      "name": "How to buy real honey?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "To buy real honey, pick a trusted seller and read the label. It should say 100% honey with no added syrup, and raw or unpasteurised is even better. For Manuka, look for a UMF or MGO rating. Real honey turns grainy over time, names the flower type, and has a price that makes sense."
      }
    },
    {
      "@type": "Question",
      "name": "Is pure honey the best honey?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Pure honey is a great start, but pure alone does not always mean best. Pure honey means 100% honey with nothing added. The best honey goes further by also being raw, so it is not cooked by heat, and coming from one flower type you can trace. So the top honey is pure, raw, and single-flower."
      }
    },
    {
      "@type": "Question",
      "name": "Is Manuka honey worth the price?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "It depends on why you want it. For everyday use, a lower UMF or MGO, or a Multifloral Manuka, gives you the taste for less. A strong, single-flower Manuka costs more because it is rarer and tested more. Match the grade to your needs, or choose our Mamaku honey which is a lab tested Manuka at MGO 125."
      }
    },
    {
      "@type": "Question",
      "name": "Why is Manuka honey so expensive?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Manuka honey is expensive because the Manuka bush only flowers for a few weeks each year, often in remote parts of New Zealand, so it is hard to collect and limited in supply. It is also tested a lot to prove its MGO strength and must meet strict MPI rules."
      }
    },
    {
      "@type": "Question",
      "name": "What brand of Manuka honey is considered the best?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "No single brand is the best Manuka. The best Manuka honey comes from brands that show a real UMF or MGO grade, use MPI-approved labels, and can trace the honey back to New Zealand hives. Check the grade and the testing behind it, or try our Mamaku honey which is a lab tested Manuka at MGO 125."
      }
    },
    {
      "@type": "Question",
      "name": "What is the world's no. 1 honey?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Manuka honey from New Zealand is often called the world's number one honey. People love it for its high, natural MGO and its top spot in the honey market. It is rare and carefully graded, which is why it costs more. Other loved honeys include Sidr, Tualang, and Acacia."
      }
    },
    {
      "@type": "Question",
      "name": "Is it OK to eat honey every day?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "For most healthy adults, yes. A small amount of honey each day, about 1 to 2 teaspoons, is fine as part of a healthy diet. Honey is still sugar, so keep it in check. Never give honey to babies under 12 months, and people with diabetes should ask their doctor about sugar."
      }
    },
    {
      "@type": "Question",
      "name": "Can honey expire or go bad?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Real honey does not truly expire or go off like most foods, because it has very little water and is a bit acidic, so germs cannot grow well in it. Stored well, it can last for years. Turning grainy is normal, not spoilage. Honey has a best-before date for quality, and can only spoil if water gets in."
      }
    }
  ]
}
@endverbatim
</script>
@endsection

@section('content')
<!-- Page Hero -->
<section class="page-hero page-hero--blog" aria-label="FAQ page hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span> <span aria-current="page">Honey FAQ</span>
        </nav>
        <h1 class="page-hero-title">Honey Questions, Answered</h1>
        <p class="page-hero-subtitle">How to Buy the Best, Purest Honey in New Zealand</p>
    </div>
</section>

<!-- Content Section -->
<section class="faq-section section-padding" aria-labelledby="faq-page-heading">
    <div class="container">
        <h2 class="sr-only" id="faq-page-heading">Frequently Asked Questions about Honey</h2>
        
        <div class="faq-meta-bar animate-on-scroll">
            <span><i class="fa-solid fa-user-pen" aria-hidden="true"></i> Published by: <strong>Forest Fairy Honey</strong></span>
            <span><i class="fa-solid fa-clock" aria-hidden="true"></i> Last updated: <strong>July 17, 2026</strong></span>
        </div>

        <div class="faq-layout">
            <!-- Sidebar Table of Contents -->
            <aside class="faq-sidebar animate-on-scroll" aria-label="Table of contents">
                <nav class="faq-toc-nav">
                    <!-- Category 1 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">1. Purity & Health</span>
                        <a href="#best-honey-online" class="faq-toc-link">Best honey online</a>
                        <a href="#best-honey-nz" class="faq-toc-link">Best honey in NZ</a>
                        <a href="#healthiest-honey" class="faq-toc-link">Healthiest type</a>
                        <a href="#check-pure-honey" class="faq-toc-link">Check 100% pure</a>
                        <a href="#purest-brand" class="faq-toc-link">Purest honey brand</a>
                    </div>
                    
                    <!-- Category 2 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">2. Raw vs. Supermarket</span>
                        <a href="#raw-vs-supermarket" class="faq-toc-link">Raw vs Supermarket</a>
                        <a href="#why-supermarket-cheap" class="faq-toc-link">Why so cheap?</a>
                        <a href="#most-natural-honey" class="faq-toc-link">Most natural to buy</a>
                        <a href="#buy-real-honey" class="faq-toc-link">How to buy real</a>
                        <a href="#pure-vs-best" class="faq-toc-link">Pure vs. best</a>
                    </div>

                    <!-- Category 3 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">3. Manuka & Pricing</span>
                        <a href="#manuka-worth-price" class="faq-toc-link">Is Manuka worth it?</a>
                        <a href="#why-manuka-expensive" class="faq-toc-link">Why so expensive?</a>
                        <a href="#best-manuka-brand" class="faq-toc-link">Best Manuka brand</a>
                        <a href="#world-no1-honey" class="faq-toc-link">World's no. 1 honey</a>
                    </div>

                    <!-- Category 4 -->
                    <div class="faq-toc-group">
                        <span class="faq-toc-group-title">4. Everyday & Storage</span>
                        <a href="#eat-honey-every-day" class="faq-toc-link">Eating every day</a>
                        <a href="#honey-expiration" class="faq-toc-link">Can honey go bad?</a>
                    </div>
                </nav>
            </aside>

            <!-- Main Q&A Content -->
            <div class="faq-main">
                <!-- CATEGORY 1: PURITY & HEALTH -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">1. Purity & Health</h3>
                    
                    <!-- Q1 -->
                    <article id="best-honey-online" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">What is the best honey to buy online?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>The best honey to buy online is raw honey from a seller who tells you where it came from and shows test results.</strong></p>
                            <p>Look for the flower type, the region it was made in, and UMF or MGO testing for Manuka. Glass jars are a good sign too.</p>
                            <p>When you cannot taste honey first, trust matters most. Pick sellers who can trace the honey back to the hive and who label Manuka the right way. Watch out for very cheap honey, because it can be watered down or heated too much. Forest Fairy Honey is raw, lab tested, and made in small batches. The only thing we do is take the honey out of the comb and pour it into jars, so you get it just as the bees made it. <a href="/shop">Shop the range</a></p>
                        </div>
                    </article>

                    <!-- Q2 -->
                    <article id="best-honey-nz" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">What is the best honey in New Zealand?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>New Zealand is famous for Manuka honey.</strong></p>
                            <p>Many people call it one of the best honeys in the world because of its high MGO. New Zealand also makes other great honeys like Rewarewa, Kamahi, Clover, Pohutukawa, and Beech Honeydew.</p>
                            <p>The best one for you depends on how you use it. Manuka is a top-shelf honey. Clover is great for everyday use. Rewarewa has a rich, malty taste that Kiwis love. Trying a few is the best way to find your favourite.</p>
                        </div>
                    </article>

                    <!-- Q3 -->
                    <article id="healthiest-honey" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">What type of honey is the healthiest?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>Raw honey is usually the healthiest kind.</strong></p>
                            <p>Raw means it is not heated much, so it keeps its natural enzymes, antioxidants, and pollen. Darker honeys like Manuka, Rewarewa, and Buckwheat often have more antioxidants than light ones.</p>
                            <p>Keep in mind that honey is still sugar. It is best to enjoy it in small amounts as part of a healthy diet. Picking raw honey just means you keep more of the good stuff.</p>
                        </div>
                    </article>

                    <!-- Q4 -->
                    <article id="check-pure-honey" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">How to check if honey is 100% pure?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>The best way to know honey is 100% pure is to buy from a seller who shows lab test results and clear labels.</strong></p>
                            <p>The kitchen tests you see online are only rough guides.</p>
                            <p>Here are some common home checks people try:</p>
                            <ul class="faq-list">
                                <li><i class="fa-solid fa-glass-water" aria-hidden="true"></i> <strong>Water test:</strong> a spoon of pure honey often sinks to the bottom instead of mixing in fast.</li>
                                <li><i class="fa-solid fa-hand-pointer" aria-hidden="true"></i> <strong>Thumb test:</strong> pure honey tends to stay put on your thumb instead of running off.</li>
                                <li><i class="fa-solid fa-cubes-stacked" aria-hidden="true"></i> <strong>Crystals:</strong> most raw honey turns grainy over time. This is normal and a good sign.</li>
                            </ul>
                            <p>These tests are not proof. Fake honey mixed with syrup can be hard to spot by eye. Buying lab-tested honey from a trusted New Zealand seller is the safest way to know it is real.</p>
                        </div>
                    </article>

                    <!-- Q5 -->
                    <article id="purest-brand" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Which honey brand is the purest?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>There is no single purest brand. The purest honey comes from brands that sell raw honey, keep the processing to a minimum, get it lab tested, and add nothing.</strong></p>
                            <p>Purity comes from how the honey is made, not from clever ads. The purest brands sell raw honey, keep processing to a minimum, add no sugar or syrup, get their honey lab tested, and are clear about where it came from.</p>
                            <p>The less that is done to honey, the more pure it stays. Forest Fairy Honey is raw, lab tested, and made in small batches. The only step is taking the honey out of the comb and pouring it into jars, with nothing added and no heating. <a href="/shop">Shop the range</a></p>
                        </div>
                    </article>
                </div>

                <!-- CATEGORY 2: RAW VS. SUPERMARKET -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">2. Raw vs. Supermarket Honey</h3>

                    <!-- Q6 -->
                    <article id="raw-vs-supermarket" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Is raw honey better than supermarket honey?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>For many people, yes, raw honey is better than most supermarket honey.</strong></p>
                            <p>Raw honey is not heated or heavily filtered, so it keeps more natural enzymes, pollen, and flavour. A lot of supermarket honey is blended and processed for a smooth look and a long shelf life.</p>
                            <p>That heating and filtering can strip out some of the good stuff. Supermarket honey is still honey, but raw honey is closer to how it comes out of the hive. If you want the most natural jar, raw honey wins.</p>
                        </div>
                    </article>

                    <!-- Q7 -->
                    <article id="why-supermarket-cheap" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Why is supermarket honey so cheap?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>Supermarket honey is often cheap because it is made in huge amounts, blended from many sources, and sometimes brought in from countries with lower costs.</strong></p>
                            <p>It is usually heated and filtered so it stays smooth and lasts a long time on the shelf.</p>
                            <p>There is a catch. Some cheap honey around the world has been watered down with sugar syrup, which is a known problem. A very low price can also mean the honey is harder to trace. Raw, single-flower New Zealand honey costs more because it is made in smaller batches and tested.</p>
                        </div>
                    </article>

                    <!-- Q8 -->
                    <article id="most-natural-honey" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Which is the most natural honey to buy?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>The most natural honey to buy is raw honey straight from the hive.</strong></p>
                            <p>It is not heated or over-filtered, and nothing is added. Look for the words raw and 100% honey, one flower type, and no added syrup.</p>
                            <p>Because raw honey is barely touched, it keeps its natural pollen, taste, and smell. It is normal for it to turn grainy over time. That change is one of the easiest ways to tell it is the real thing.</p>
                        </div>
                    </article>

                    <!-- Q9 -->
                    <article id="buy-real-honey" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">How to buy real honey?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>To buy real honey, pick a trusted seller and read the label.</strong></p>
                            <p>It should say 100% honey with no added syrup. Raw or unpasteurised is even better. For Manuka, look for a UMF or MGO rating and proper labels.</p>
                            <p>Here are quick signs of real honey. It turns grainy over time. It tells you the flower type. And the price makes sense. If honey is very cheap, be careful. Buying from a seller who shows test results is the easy way to avoid fake or watered-down honey.</p>
                        </div>
                    </article>

                    <!-- Q10 -->
                    <article id="pure-vs-best" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Is pure honey the best honey?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>Pure honey is a great start, but pure alone does not always mean best.</strong></p>
                            <p>Pure honey means 100% honey with nothing added. That is what you should always expect. The best honey goes further. It is also raw, so it is not cooked by heat, and it comes from one flower type you can trace.</p>
                            <p>So the top honey is pure, raw, and single-flower. Pure keeps out what should not be there. Raw honey and good sourcing keep in what makes honey worth buying.</p>
                        </div>
                    </article>
                </div>

                <!-- CATEGORY 3: MANUKA & PRICING -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">3. Manuka Honey & Pricing</h3>

                    <!-- Q11 -->
                    <article id="manuka-worth-price" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Is Manuka honey worth the price?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>It depends on why you want it.</strong></p>
                            <p>For everyday use, you do not need a strong Manuka. A lower UMF or MGO, or a Multifloral Manuka, gives you the taste for less. If you want a strong, single-flower Manuka, the higher grades cost more because they are rarer and tested more.</p>
                            <p>Manuka is graded by UMF or MGO. MGO is measured in mg/kg. The higher the number, the stronger the honey and the higher the price. The trick is to match the grade to your needs, so you do not pay for a number you do not need. Our Mamaku honey is a lab tested Manuka at MGO 125, which is a good everyday level without the top-shelf price. <a href="/shop/mamaku-creamed-honey">Shop the Mamaku Manuka</a></p>
                        </div>
                    </article>

                    <!-- Q12 -->
                    <article id="why-manuka-expensive" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Why is Manuka honey so expensive?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>Manuka honey is expensive because the Manuka bush only flowers for a few weeks each year, often in remote parts of New Zealand.</strong></p>
                            <p>Bees must be right next to the flowers, so it is hard to collect, and only so much can be made.</p>
                            <p>The flowering time is short and depends on the weather. The honey is tested a lot to prove its MGO strength, and it must meet strict MPI rules to be sold as Manuka. High-strength Manuka is rare, and lots of people want it. Small supply plus high demand means a higher price.</p>
                        </div>
                    </article>

                    <!-- Q13 -->
                    <article id="best-manuka-brand" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">What brand of Manuka honey is considered the best?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>No single brand is "the best" Manuka. The best Manuka honey comes from brands that show a real UMF or MGO grade, use MPI-approved labels, and can trace the honey back to New Zealand hives.</strong></p>
                            <p>Instead of chasing a brand name, check the grade and the proof behind it. A trustworthy Manuka brand tells you the MGO or UMF number, backs it with testing, and is clear about where the honey was made. Our Mamaku honey is a lab tested Manuka at MGO 125, a good everyday grade you can trust. <a href="/shop/mamaku-creamed-honey">Shop the Mamaku Manuka</a></p>
                        </div>
                    </article>

                    <!-- Q14 -->
                    <article id="world-no1-honey" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">What is the world's no. 1 honey?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>Manuka honey from New Zealand is often called the world's number one honey.</strong></p>
                            <p>People love it for its high, natural MGO and its top spot in the honey market. It is rare and carefully graded, which is why it costs more.</p>
                            <p>Other honeys are loved around the world too, like Sidr from Yemen, Tualang from Southeast Asia, and Acacia. But for fame and price, Manuka is usually on top.</p>
                        </div>
                    </article>
                </div>

                <!-- CATEGORY 4: EVERYDAY & STORAGE -->
                <div class="faq-category-block">
                    <h3 class="faq-category-heading">4. Everyday Use & Storage</h3>

                    <!-- Q15 -->
                    <article id="eat-honey-every-day" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Is it OK to eat honey every day?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>For most healthy adults, yes.</strong></p>
                            <p>A small amount of honey each day, about 1 to 2 teaspoons, is fine as part of a healthy diet. Honey is still sugar, so keep it in check, especially if you watch your blood sugar.</p>
                            <p>Two things to remember. Never give honey to babies under 12 months, because it can make them very sick. And if you have diabetes or another health issue, ask your doctor about sugar.</p>
                        </div>
                    </article>

                    <!-- Q16 -->
                    <article id="honey-expiration" class="faq-card animate-on-scroll">
                        <h2 class="faq-card-title">Can honey expire or go bad?</h2>
                        <div class="faq-card-answer">
                            <p class="faq-lead"><strong>Real honey does not truly expire or go off like most foods.</strong></p>
                            <p>It has very little water and is a bit acidic, so germs cannot grow well in it. Stored well, honey can last for years. If your honey turns grainy or hard, that is normal, not a sign it is bad. Warm the jar gently and it goes smooth again.</p>
                            <p>Honey has a best-before date, but that is about quality and rules, not safety. Honey can only spoil if water gets in and it starts to ferment. You would notice a sour smell or bubbles. To keep honey fresh, seal the jar, store it at room temperature, and always use a dry spoon.</p>
                        </div>
                    </article>
                </div>

                <!-- CTA Section -->
                <div class="faq-cta-section animate-on-scroll">
                    <h3 class="faq-cta-title">Ready to taste the difference?</h3>
                    <p class="faq-cta-text">Try Forest Fairy Honey's range of raw, small batch New Zealand honey, taken straight from the comb to the jar.</p>
                    <div class="faq-cta-buttons">
                        <a href="/shop" class="faq-cta-btn faq-cta-btn--primary">
                            <i class="fa-solid fa-basket-shopping" aria-hidden="true"></i> Shop Honey
                        </a>
                        <a href="/about" class="faq-cta-btn faq-cta-btn--secondary">
                            <i class="fa-solid fa-seedling" aria-hidden="true"></i> Learn About Our Hives
                        </a>
                        <a href="/about#values" class="faq-cta-btn faq-cta-btn--secondary">
                            <i class="fa-solid fa-shield-halved" aria-hidden="true"></i> Our Values &amp; Testing
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
