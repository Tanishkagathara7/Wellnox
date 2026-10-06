/**
 * Wellnox GSAP & ScrollTrigger Animations
 */

document.addEventListener('DOMContentLoaded', () => {
    // If user prefers reduced motion or GSAP isn't loaded, exit safely
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion || typeof gsap === 'undefined') return;

    if (typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);
    }

    // Hero Cinematic Entrance (Only when Hero section is present on current page)
    const heroSection = document.getElementById('hero');
    if (heroSection) {
        const heroTl = gsap.timeline({ defaults: { ease: 'power3.out' } });

        if (document.querySelector('.site-header')) {
            heroTl.from('.site-header', {
                y: -30,
                opacity: 0,
                duration: 0.6
            }, 0);
        }

        if (heroSection.querySelector('.hero-bg-img')) {
            heroTl.from(heroSection.querySelectorAll('.hero-bg-img'), {
                scale: 1.15,
                duration: 1.8,
                ease: 'power2.out'
            }, 0.1);
        }

        if (heroSection.querySelector('.hero-badge-pill')) {
            heroTl.from(heroSection.querySelector('.hero-badge-pill'), {
                y: 20,
                opacity: 0,
                duration: 0.6
            }, 0.2);
        }

        if (heroSection.querySelector('.hero-cta-group')) {
            heroTl.from(heroSection.querySelector('.hero-cta-group'), {
                y: 20,
                opacity: 0,
                duration: 0.6
            }, 0.5);
        }
    }

    // Subtle fade-in on scroll using batch without hiding initial content
    if (typeof ScrollTrigger !== 'undefined') {
        const revealElements = [
            '.category-card',
            '.company-img-wrapper',
            '.company-content-col',
            '.stat-box-card',
            '.feature-pill-card',
            '.product-showcase-card',
            '.finish-card',
            '.catalogue-cover-img'
        ];

        revealElements.forEach(selector => {
            gsap.utils.toArray(selector).forEach(el => {
                gsap.from(el, {
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 92%',
                        toggleActions: 'play none none none'
                    },
                    y: 25,
                    opacity: 0.3,
                    duration: 0.6,
                    ease: 'power2.out'
                });
            });
        });

        // ==========================================================================
        // PRECISION IN MOTION — ORCHESTRATED SCROLL & INTERACTIVE PRODUCT TIMELINE
        // ==========================================================================
        const pmSection = document.getElementById('precision-motion');
        if (pmSection) {
            // Trigger as soon as the top of the section touches bottom of viewport
            const pmTl = gsap.timeline({
                scrollTrigger: {
                    trigger: pmSection,
                    start: 'top 95%',
                    toggleActions: 'play none none none',
                    once: true
                }
            });

            // 1. Section fade in & subtle background presence
            pmTl
                .fromTo(pmSection, 
                    { opacity: 0.95 }, 
                    { opacity: 1, duration: 0.35, ease: 'power2.out' }
                )
                // 2. Heading slides upward with opacity animation
                .fromTo('.pm-eyebrow-pill',
                    { y: 15, opacity: 0 },
                    { y: 0, opacity: 1, duration: 0.35, ease: 'power2.out' },
                    '-=0.2'
                )
                .fromTo('.pm-main-heading',
                    { y: 20, opacity: 0 },
                    { y: 0, opacity: 1, duration: 0.45, ease: 'power3.out' },
                    '-=0.25'
                )
                // 3. Bronze accent line animates width
                .to('#pmAccentLine', {
                    width: '100%',
                    duration: 0.6,
                    ease: 'power2.out'
                }, '-=0.3')
                .fromTo('.pm-lead-desc',
                    { y: 14, opacity: 0 },
                    { y: 0, opacity: 1, duration: 0.4, ease: 'power2.out' },
                    '-=0.4'
                )
                // 4. Product smoothly scales into view
                .fromTo('#pmTiltTarget',
                    { scale: 0.96, y: 20, opacity: 0 },
                    { scale: 1, y: 0, opacity: 1, duration: 0.55, ease: 'power2.out' },
                    '-=0.35'
                )
                // 5. Floating spec badges appear
                .fromTo('.pm-floating-spec',
                    { scale: 0.9, opacity: 0 },
                    { scale: 1, opacity: 1, stagger: 0.08, duration: 0.35, ease: 'back.out(1.2)' },
                    '-=0.25'
                )
                // 6. Feature cards appear snappy
                .fromTo('.pm-glass-card', 
                    { y: 15, opacity: 0 },
                    {
                        y: 0,
                        opacity: 1,
                        duration: 0.4,
                        stagger: 0.06,
                        ease: 'power2.out'
                    }, 
                    '-=0.3'
                )
                // 7. Center statistics container reveal
                .fromTo('.pm-stats-container',
                    { y: 15, opacity: 0 },
                    { y: 0, opacity: 1, duration: 0.45, ease: 'power2.out' },
                    '-=0.25'
                );

            // Animate stats counter numbers when section enters viewport
            const statNumbers = pmSection.querySelectorAll('.pm-stat-number');
            statNumbers.forEach(numEl => {
                const target = parseInt(numEl.getAttribute('data-target') || '20', 10);
                gsap.fromTo(numEl, 
                    { innerText: 0 },
                    {
                        innerText: target,
                        duration: 1.2,
                        ease: 'power1.out',
                        snap: { innerText: 1 },
                        scrollTrigger: {
                            trigger: pmSection,
                            start: 'top 95%',
                            once: true
                        }
                    }
                );
            });

            // Desktop 3D Interactive Tilt Effect (Disabled on touch & small screens)
            const tiltTarget = document.getElementById('pmTiltTarget');
            const productStage = document.getElementById('pmProductStage');
            const productGlow = document.getElementById('pmProductGlow');

            if (tiltTarget && productStage && window.innerWidth >= 992) {
                let isHovering = false;

                productStage.addEventListener('mouseenter', () => {
                    isHovering = true;
                    if (productGlow) {
                        gsap.to(productGlow, { opacity: 1, scale: 1.08, duration: 0.4 });
                    }
                });

                productStage.addEventListener('mousemove', (e) => {
                    if (!isHovering) return;
                    const rect = productStage.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;

                    // Subtle 3D tilt calculation (max 6deg)
                    const tiltX = ((y - centerY) / centerY) * -6;
                    const tiltY = ((x - centerX) / centerX) * 6;

                    gsap.to(tiltTarget, {
                        rotateX: tiltX,
                        rotateY: tiltY,
                        transformPerspective: 1200,
                        duration: 0.35,
                        ease: 'power1.out',
                        overwrite: 'auto'
                    });
                });

                productStage.addEventListener('mouseleave', () => {
                    isHovering = false;
                    gsap.to(tiltTarget, {
                        rotateX: 0,
                        rotateY: 0,
                        duration: 0.6,
                        ease: 'power2.out',
                        overwrite: 'auto'
                    });
                    if (productGlow) {
                        gsap.to(productGlow, { opacity: 0.7, scale: 1, duration: 0.6 });
                    }
                });
            }
        }

        // ==========================================================================
        // ABOUT SECTION (COMPANY PROFILE) SCROLL ENTRANCE & FLOATING BADGE
        // ==========================================================================
        const aboutSection = document.getElementById('company-profile');
        if (aboutSection) {
            const aboutTl = gsap.timeline({
                scrollTrigger: {
                    trigger: aboutSection,
                    start: 'top 80%',
                    toggleActions: 'play none none none',
                    once: true
                }
            });

            aboutTl
                .fromTo('.about-floating-badge',
                    { scale: 0.82, y: 30, opacity: 0 },
                    { scale: 1, y: 0, opacity: 1, duration: 0.8, ease: 'back.out(1.5)' }
                )
                .fromTo('.about-img-frame-accent',
                    { scale: 0.94, opacity: 0 },
                    { scale: 1, opacity: 1, duration: 0.85, ease: 'power2.out' },
                    '-=0.6'
                )
                .fromTo('.company-stat-card',
                    { y: 20, opacity: 0 },
                    { y: 0, opacity: 1, stagger: 0.1, duration: 0.6, ease: 'power2.out' },
                    '-=0.4'
                );
        }
    }
});
