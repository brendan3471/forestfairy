// Forest Fairy Honey — Application JS

// ===================== HERO SLIDER =====================
(function () {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');
    if (!slides.length) return;

    let current = 0;
    let timer;

    function goTo(n) {
        slides[current].classList.remove('active');
        dots[current]?.classList.remove('active');
        current = (n + slides.length) % slides.length;
        slides[current].classList.add('active');
        dots[current]?.classList.add('active');
    }

    function autoPlay() {
        timer = setInterval(() => goTo(current + 1), 5000);
    }

    document.getElementById('nextSlide')?.addEventListener('click', () => { clearInterval(timer); goTo(current + 1); autoPlay(); });
    document.getElementById('prevSlide')?.addEventListener('click', () => { clearInterval(timer); goTo(current - 1); autoPlay(); });
    dots.forEach(d => d.addEventListener('click', () => { clearInterval(timer); goTo(+d.dataset.slide); autoPlay(); }));
    autoPlay();
})();

// ===================== MOBILE NAV =====================
(function () {
    const btn = document.getElementById('mobileMenuBtn');
    const nav = document.getElementById('mobileNav');
    const menuIcon = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');
    if (!btn) return;

    btn.addEventListener('click', () => {
        const open = !nav.classList.contains('hidden');
        nav.classList.toggle('hidden', open);
        menuIcon.classList.toggle('hidden', !open);
        closeIcon.classList.toggle('hidden', open);
        btn.setAttribute('aria-expanded', String(!open));
    });

    // Close on nav link click
    document.querySelectorAll('.mobile-nav-link, .mobile-cta').forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            btn.setAttribute('aria-expanded', 'false');
        });
    });
})();

// ===================== SCROLL ANIMATIONS =====================
(function () {
    const els = document.querySelectorAll('.animate-on-scroll');
    if (!els.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                // Stagger siblings by index
                const siblings = Array.from(entry.target.parentElement?.querySelectorAll('.animate-on-scroll') || []);
                const delay = siblings.indexOf(entry.target) * 80;
                setTimeout(() => entry.target.classList.add('in-view'), delay);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    els.forEach(el => observer.observe(el));
})();

// ===================== STICKY HEADER SHADOW =====================
(function () {
    const header = document.getElementById('siteHeader');
    if (!header) return;
    window.addEventListener('scroll', () => {
        header.style.boxShadow = window.scrollY > 20
            ? '0 4px 24px rgba(44,24,16,0.14)'
            : '0 2px 16px rgba(44,24,16,0.08)';
    }, { passive: true });
})();

// ===================== CONTACT FORM =====================
(function () {
    const form = document.getElementById('contactForm');
    const success = document.getElementById('formSuccess');
    if (!form) return;

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        // Simulate submission
        const btn = document.getElementById('contactSubmit');
        btn.textContent = 'Sending…';
        btn.disabled = true;
        setTimeout(() => {
            success?.classList.remove('hidden');
            form.reset();
            btn.innerHTML = '<i class="fa-solid fa-paper-plane" aria-hidden="true"></i> Send Message';
            btn.disabled = false;
        }, 1200);
    });
})();

// ===================== NEWSLETTER FORM =====================
(function () {
    const form = document.getElementById('newsletterForm');
    if (!form) return;
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const btn = document.getElementById('newsletterSubmit');
        const input = document.getElementById('newsletterEmail');
        btn.innerHTML = '<i class="fa-solid fa-check"></i>';
        btn.style.background = 'var(--green)';
        input.value = '';
        setTimeout(() => {
            btn.innerHTML = '<i class="fa-solid fa-paper-plane"></i>';
            btn.style.background = '';
        }, 3000);
    });
})();