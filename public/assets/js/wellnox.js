/**
 * Wellnox Luxury Animations & Interactions
 * Powered by GSAP & ScrollTrigger
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Sticky Navbar Transition
    const header = document.querySelector('.site-header');
    const scrollTopBtn = document.querySelector('.scroll-top-btn');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        if (scrollTopBtn) {
            if (window.scrollY > 400) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        }
    });

    if (scrollTopBtn) {
        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // 2. Interactive Finish Selector
    const finishCards = document.querySelectorAll('.finish-card');
    const finishTitle = document.getElementById('selected-finish-title');
    const finishDesc = document.getElementById('selected-finish-desc');
    const finishImg = document.getElementById('selected-finish-img');
    const finishTag = document.getElementById('selected-finish-tag');

    finishCards.forEach(card => {
        card.addEventListener('click', function () {
            finishCards.forEach(c => c.classList.remove('active'));
            this.classList.add('active');

            const name = this.getAttribute('data-name');
            const desc = this.getAttribute('data-desc');
            const img = this.getAttribute('data-img');
            const tag = this.getAttribute('data-tag');

            if (finishTitle) finishTitle.textContent = name;
            if (finishDesc) finishDesc.textContent = desc;
            if (finishTag) finishTag.textContent = tag;
            if (finishImg) {
                // Quick smooth fade animation
                gsap.to(finishImg, {
                    opacity: 0,
                    scale: 0.95,
                    duration: 0.2,
                    onComplete: () => {
                        finishImg.src = img;
                        gsap.to(finishImg, {
                            opacity: 1,
                            scale: 1,
                            duration: 0.35,
                            ease: 'power2.out'
                        });
                    }
                });
            }
        });
    });

    // 3. GSAP Animations & ScrollTrigger
    if (typeof gsap !== 'undefined') {
        if (typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
        }

        // Hero Entrance Timeline
        const heroTl = gsap.timeline({ defaults: { ease: 'power3.out' } });

        heroTl.from('.hero-bg-img', {
            scale: 1.15,
            duration: 1.8,
            ease: 'power2.out'
        }, 0)
        .from('.site-header', {
            y: -50,
            opacity: 0,
            duration: 0.8
        }, 0.2)
        .from('.hero-eyebrow', {
            y: 20,
            opacity: 0,
            duration: 0.6
        }, 0.4)
        .from('.hero-title', {
            y: 35,
            opacity: 0,
            duration: 0.9
        }, 0.5)
        .from('.hero-lead', {
            y: 25,
            opacity: 0,
            duration: 0.7
        }, 0.7)
        .from('.hero-cta-group', {
            y: 20,
            opacity: 0,
            duration: 0.6
        }, 0.8)
        .from('.hero-calligraphy-quote', {
            x: 30,
            opacity: 0,
            duration: 1
        }, 0.6)
        .from('.badge-20-years-wrap', {
            scale: 0.6,
            opacity: 0,
            duration: 0.8,
            ease: 'back.out(1.7)'
        }, 0.9)
        .from('.hero-feature-item', {
            y: 20,
            opacity: 0,
            duration: 0.5,
            stagger: 0.1
        }, 1.0);

        // ScrollTrigger Reveal for Categories
        gsap.from('.category-card', {
            scrollTrigger: {
                trigger: '.categories-section',
                start: 'top 80%'
            },
            y: 40,
            opacity: 0,
            duration: 0.8,
            stagger: 0.15,
            ease: 'power3.out'
        });

        // Company Profile Animation
        gsap.from('.company-img-wrapper', {
            scrollTrigger: {
                trigger: '.company-profile-section',
                start: 'top 75%'
            },
            x: -40,
            opacity: 0,
            duration: 1,
            ease: 'power3.out'
        });

        gsap.from('.company-content-col', {
            scrollTrigger: {
                trigger: '.company-profile-section',
                start: 'top 75%'
            },
            x: 40,
            opacity: 0,
            duration: 1,
            ease: 'power3.out'
        });

        gsap.from('.stat-box-card', {
            scrollTrigger: {
                trigger: '.company-stats-row',
                start: 'top 85%'
            },
            y: 30,
            opacity: 0,
            duration: 0.6,
            stagger: 0.1,
            ease: 'back.out(1.4)'
        });

        // Why Wellnox Features Grid
        gsap.from('.feature-pill-card', {
            scrollTrigger: {
                trigger: '.why-wellnox-section',
                start: 'top 70%'
            },
            y: 30,
            opacity: 0,
            duration: 0.7,
            stagger: 0.1,
            ease: 'power2.out'
        });

        // Popular Products Cards
        gsap.from('.product-showcase-card', {
            scrollTrigger: {
                trigger: '.popular-designs-section',
                start: 'top 75%'
            },
            y: 35,
            opacity: 0,
            duration: 0.8,
            stagger: 0.12,
            ease: 'power3.out'
        });

        // Available Finishes
        gsap.from('.finish-card', {
            scrollTrigger: {
                trigger: '.available-finishes-section',
                start: 'top 75%'
            },
            y: 25,
            opacity: 0,
            duration: 0.6,
            stagger: 0.1,
            ease: 'power2.out'
        });

        // Catalogue Download Box Reveal
        gsap.from('.catalogue-cover-img', {
            scrollTrigger: {
                trigger: '.catalogue-cta-section',
                start: 'top 75%'
            },
            scale: 0.9,
            opacity: 0,
            duration: 1,
            ease: 'power3.out'
        });
    }

    // 4. Smooth Anchor Link Scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    
                    const offcanvasEl = document.getElementById('wellnoxMobileNav');
                    if (offcanvasEl && typeof bootstrap !== 'undefined') {
                        const bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvasEl);
                        if (bsOffcanvas) bsOffcanvas.hide();
                    }

                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // 5. Desktop Dropdown Hover Handler
    const navDropdowns = document.querySelectorAll('.navbar-nav .nav-item.dropdown');
    navDropdowns.forEach(dropdown => {
        let timeout;
        dropdown.addEventListener('mouseenter', () => {
            if (window.innerWidth >= 992) {
                clearTimeout(timeout);
                const toggle = dropdown.querySelector('.dropdown-toggle');
                const menu = dropdown.querySelector('.dropdown-menu');
                if (toggle && menu) {
                    toggle.setAttribute('aria-expanded', 'true');
                    menu.classList.add('show');
                    dropdown.classList.add('show');
                }
            }
        });

        dropdown.addEventListener('mouseleave', () => {
            if (window.innerWidth >= 992) {
                timeout = setTimeout(() => {
                    const toggle = dropdown.querySelector('.dropdown-toggle');
                    const menu = dropdown.querySelector('.dropdown-menu');
                    if (toggle && menu) {
                        toggle.setAttribute('aria-expanded', 'false');
                        menu.classList.remove('show');
                        dropdown.classList.remove('show');
                    }
                }, 150);
            }
        });
    });

    // 6. Close mobile offcanvas when clicking internal anchor links is already handled above
});
