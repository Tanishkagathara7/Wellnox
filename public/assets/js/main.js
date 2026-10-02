/**
 * Wellnox Core Script & Interactive Handlers
 */

// Centralized Placeholder & Media Configuration
const PLACEHOLDER_IMAGES = {
    hero: '/assets/images/hero-bg.png',
    badge_20_years: '/assets/images/badge-20-years.png',
    category1: '/assets/products/cat-drain-system.png',
    category2: '/assets/products/cat-shower-channel.png',
    category3: '/assets/products/cat-bathroom-acc.png',
    category4: '/assets/products/cat-health-faucets.png',
    company_factory: '/assets/images/company-factory.png',
    why_banner: '/assets/images/why-wellnox-banner.webp',
    product1: '/assets/images/popular-product/1.webp',
    product2: '/assets/images/popular-product/2.webp',
    product3: '/assets/images/popular-product/3.webp',
    product4: '/assets/images/popular-product/4.webp',
    finish1: '/assets/products/finish-matt.png',
    finish2: '/assets/products/finish-glossy.png',
    finish3: '/assets/products/finish-gold.png',
    finish4: '/assets/products/finish-rosegold.png',
    finish5: '/assets/products/finish-black.png',
    catalogue_book: '/assets/images/catalogue-book.webp',
    logo: '/assets/images/logo/logo.png'
};

document.addEventListener('DOMContentLoaded', () => {
    // 1. Sticky Header
    const header = document.querySelector('.site-header');
    const scrollTopBtn = document.querySelector('.scroll-top-btn');

    const handleScroll = () => {
        if (window.scrollY > 40) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        if (scrollTopBtn) {
            if (window.scrollY > 350) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        }
    };

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();

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
                if (typeof gsap !== 'undefined') {
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
                } else {
                    finishImg.src = img;
                }
            }
        });
    });

    // 4. Hero Slider Functionality
    const heroSlides = document.querySelectorAll('.hero-slide');
    const heroTextItems = document.querySelectorAll('.hero-text-item');
    const heroBullets = document.querySelectorAll('.hero-page-bullet, .hero-dot');
    const prevBtn = document.querySelector('.prev-hero-slide');
    const nextBtn = document.querySelector('.next-hero-slide');

    if (heroSlides.length > 0) {
        let currentSlide = 0;
        let slideInterval = null;

        const showSlide = (index) => {
            currentSlide = (index + heroSlides.length) % heroSlides.length;

            heroSlides.forEach((slide, i) => {
                const isActive = (i === currentSlide);
                slide.classList.toggle('active', isActive);
                if (isActive) {
                    const img = slide.querySelector('.hero-bg-img');
                    if (img) {
                        img.style.animation = 'none';
                        void img.offsetWidth; // Force CSS reflow to restart Ken Burns zoom-out
                        img.style.animation = '';
                    }
                }
            });

            heroTextItems.forEach((text, i) => {
                if (i === currentSlide) {
                    text.style.display = 'block';
                    void text.offsetWidth; // Trigger reflow
                    text.classList.add('active');
                } else {
                    text.classList.remove('active');
                    text.style.display = 'none';
                }
            });

            heroBullets.forEach((bullet, i) => {
                const isActive = (i === currentSlide);
                bullet.classList.toggle('active', isActive);
                bullet.classList.remove('animating');
                if (isActive) {
                    void bullet.offsetWidth;
                    bullet.classList.add('animating');
                }
            });
        };

        const nextSlide = () => showSlide(currentSlide + 1);
        const prevSlide = () => showSlide(currentSlide - 1);

        if (nextBtn) {
            nextBtn.addEventListener('click', (e) => {
                e.preventDefault();
                nextSlide();
                resetInterval();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', (e) => {
                e.preventDefault();
                prevSlide();
                resetInterval();
            });
        }

        heroBullets.forEach((bullet) => {
            bullet.addEventListener('click', function (e) {
                e.preventDefault();
                const targetIdx = parseInt(this.getAttribute('data-index') || 0, 10);
                showSlide(targetIdx);
                resetInterval();
            });
        });

        const startInterval = () => {
            slideInterval = setInterval(nextSlide, 6000);
        };

        const resetInterval = () => {
            clearInterval(slideInterval);
            startInterval();
        };

        // Initialize first slide and start auto-progress
        showSlide(0);
        startInterval();
    }

    // 5. Smooth scrolling for hash links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#' && targetId.length > 1) {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();

                    // Close mobile offcanvas if open
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

    // 6. Desktop Hover Dropdown Support
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

    // 6.5. Popular Products Carousel Controller (Previous / Next Buttons)
    const popularTrack = document.getElementById('popularCarouselTrack');
    const prevPopularBtn = document.getElementById('prevPopularBtn');
    const nextPopularBtn = document.getElementById('nextPopularBtn');

    if (popularTrack) {
        const getScrollStep = () => {
            const firstItem = popularTrack.querySelector('.popular-carousel-item');
            if (firstItem) {
                // Scroll width of one card + gap (around 24px)
                return firstItem.offsetWidth + 20;
            }
            return 300;
        };

        if (nextPopularBtn) {
            nextPopularBtn.addEventListener('click', (e) => {
                e.preventDefault();
                popularTrack.scrollBy({
                    left: getScrollStep(),
                    behavior: 'smooth'
                });
            });
        }

        if (prevPopularBtn) {
            prevPopularBtn.addEventListener('click', (e) => {
                e.preventDefault();
                popularTrack.scrollBy({
                    left: -getScrollStep(),
                    behavior: 'smooth'
                });
            });
        }
    }

    // 7. Interactive 10-Stage Precision Manufacturing Showcase Controller
    const stageCards = document.querySelectorAll('.stage-flow-card');
    const spotlightTag = document.getElementById('spotlightTag');
    const spotlightStepNum = document.getElementById('spotlightStepNum');
    const spotlightTitle = document.getElementById('spotlightTitle');
    const spotlightDesc = document.getElementById('spotlightDesc');
    const spotlightMetric = document.getElementById('spotlightMetric');
    const spotlightIcon = document.getElementById('spotlightIcon');
    const spotlightIconOrb = document.getElementById('spotlightIconOrb');
    const spotlightProgressBar = document.getElementById('spotlightProgressBar');
    const spotlightProgressRatio = document.getElementById('spotlightProgressRatio');
    const prevStageBtn = document.getElementById('prevStageBtn');
    const nextStageBtn = document.getElementById('nextStageBtn');
    const togglePlayStageBtn = document.getElementById('togglePlayStageBtn');
    const playStageIcon = document.getElementById('playStageIcon');
    const autoPlayStatus = document.getElementById('autoPlayStatus');

    if (stageCards.length > 0) {
        let currentStageIndex = 0;
        let isStageAutoPlaying = true;
        let stageAutoPlayTimer = null;

        const setStage = (index) => {
            currentStageIndex = index;
            const targetCard = stageCards[index];
            if (!targetCard) return;

            // Update card states
            stageCards.forEach((card, idx) => {
                card.classList.toggle('active', idx === index);
            });

            // Extract data attributes
            const stepNum = targetCard.getAttribute('data-step') || `0${index + 1}`;
            const name = targetCard.getAttribute('data-name') || '';
            const tag = targetCard.getAttribute('data-tag') || 'Precision Stage';
            const desc = targetCard.getAttribute('data-desc') || '';
            const icon = targetCard.getAttribute('data-icon') || 'bi-gear';
            const metric = targetCard.getAttribute('data-metric') || '100% Quality Checked';

            // Animate Spotlight Info with subtle fade/pop
            if (spotlightIconOrb) {
                spotlightIconOrb.style.transform = 'scale(0.85) rotate(-10deg)';
                setTimeout(() => {
                    spotlightIconOrb.style.transform = 'scale(1) rotate(0deg)';
                }, 220);
            }

            if (spotlightTag) spotlightTag.textContent = tag;
            if (spotlightStepNum) spotlightStepNum.textContent = `STAGE ${stepNum}`;
            if (spotlightTitle) spotlightTitle.textContent = name;
            if (spotlightDesc) spotlightDesc.textContent = desc;
            if (spotlightMetric) spotlightMetric.textContent = metric;
            if (spotlightIcon) {
                spotlightIcon.className = `bi ${icon}`;
            }

            // Progress bar
            const total = stageCards.length;
            const percentage = ((index + 1) / total) * 100;
            if (spotlightProgressBar) spotlightProgressBar.style.width = `${percentage}%`;
            if (spotlightProgressRatio) spotlightProgressRatio.textContent = `${index + 1} / ${total}`;

            // Ensure the active card is visible in the scroll container
            const flowContainer = document.querySelector('.stages-flow-grid');
            if (flowContainer) {
                const cardTop = targetCard.offsetTop;
                const containerScroll = flowContainer.scrollTop;
                const containerHeight = flowContainer.clientHeight;
                if (cardTop < containerScroll || cardTop > (containerScroll + containerHeight - 80)) {
                    flowContainer.scrollTo({
                        top: cardTop - 30,
                        behavior: 'smooth'
                    });
                }
            }
        };

        const nextStage = () => {
            const nextIdx = (currentStageIndex + 1) % stageCards.length;
            setStage(nextIdx);
        };

        const prevStage = () => {
            const prevIdx = (currentStageIndex - 1 + stageCards.length) % stageCards.length;
            setStage(prevIdx);
        };

        const startStageAutoPlay = () => {
            if (stageAutoPlayTimer) clearInterval(stageAutoPlayTimer);
            stageAutoPlayTimer = setInterval(nextStage, 3500);
            isStageAutoPlaying = true;
            if (playStageIcon) playStageIcon.className = 'bi bi-pause-fill';
            if (autoPlayStatus) autoPlayStatus.textContent = 'Auto playing';
        };

        const pauseStageAutoPlay = () => {
            if (stageAutoPlayTimer) clearInterval(stageAutoPlayTimer);
            stageAutoPlayTimer = null;
            isStageAutoPlaying = false;
            if (playStageIcon) playStageIcon.className = 'bi bi-play-fill';
            if (autoPlayStatus) autoPlayStatus.textContent = 'Paused';
        };

        // Attach click & keyboard listeners to each stage card
        stageCards.forEach((card, idx) => {
            card.addEventListener('click', () => {
                pauseStageAutoPlay();
                setStage(idx);
            });
            card.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    pauseStageAutoPlay();
                    setStage(idx);
                }
            });
        });

        if (nextStageBtn) {
            nextStageBtn.addEventListener('click', () => {
                pauseStageAutoPlay();
                nextStage();
            });
        }

        if (prevStageBtn) {
            prevStageBtn.addEventListener('click', () => {
                pauseStageAutoPlay();
                prevStage();
            });
        }

        if (togglePlayStageBtn) {
            togglePlayStageBtn.addEventListener('click', () => {
                if (isStageAutoPlaying) {
                    pauseStageAutoPlay();
                } else {
                    startStageAutoPlay();
                }
            });
        }

        // Initialize first stage and start playback
        setStage(0);
        startStageAutoPlay();
    }

    // 8. Request Custom Quote / Catalogue Form Validation & Submission Handler
    const requestForm = document.getElementById('wellnoxRequestForm');
    const quoteSuccessAlert = document.getElementById('quoteSuccessAlert');
    const submitQuoteBtn = document.getElementById('submitQuoteBtn');

    if (requestForm) {
        requestForm.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();

            if (!this.checkValidity()) {
                this.classList.add('was-validated');
                return;
            }

            this.classList.add('was-validated');

            // Button loading animation
            if (submitQuoteBtn) {
                submitQuoteBtn.disabled = true;
                const btnText = document.getElementById('btnText');
                const btnIcon = document.getElementById('btnIcon');
                if (btnText) btnText.textContent = 'Sending Requirement...';
                if (btnIcon) btnIcon.className = 'spinner-border spinner-border-sm ms-2';
            }

            // Prepare form data
            const formData = new FormData(this);
            const jsonData = {
                name: formData.get('name'),
                phone: formData.get('phone'),
                email: formData.get('email'),
                subject: formData.get('subject') || '',
                description: formData.get('description') || formData.get('message') || ''
            };

            const csrfToken = document.querySelector('input[name="_token"]')?.value || '';

            fetch('/submit-quote', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(jsonData)
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => { throw err; });
                }
                return response.json();
            })
            .then(data => {
                // Trigger luxury gold and bronze confetti celebration
                if (typeof confetti === 'function') {
                    // Center high burst
                    confetti({
                        particleCount: 80,
                        spread: 70,
                        origin: { y: 0.6 },
                        colors: ['#C98A4A', '#D9A066', '#E6BE8A', '#FFFFFF', '#2ECC71'],
                        disableForReducedMotion: true
                    });

                    // Side bursts for rich celebration effect
                    setTimeout(() => {
                        confetti({
                            particleCount: 50,
                            angle: 60,
                            spread: 55,
                            origin: { x: 0 },
                            colors: ['#C98A4A', '#D9A066', '#E6BE8A', '#FFD700']
                        });
                        confetti({
                            particleCount: 50,
                            angle: 120,
                            spread: 55,
                            origin: { x: 1 },
                            colors: ['#C98A4A', '#D9A066', '#E6BE8A', '#FFD700']
                        });
                    }, 200);
                }

                // Show thank you banner at the top
                if (quoteSuccessAlert) {
                    quoteSuccessAlert.classList.remove('d-none');
                    quoteSuccessAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }

                // Reset form fields & validation state
                requestForm.reset();
                requestForm.classList.remove('was-validated');

                if (submitQuoteBtn) {
                    submitQuoteBtn.disabled = false;
                    const btnText = document.getElementById('btnText');
                    const btnIcon = document.getElementById('btnIcon');
                    if (btnText) btnText.textContent = 'Request Sent Successfully!';
                    if (btnIcon) btnIcon.className = 'bi bi-check2-circle ms-2';

                    setTimeout(() => {
                        if (btnText) btnText.textContent = 'Submit Request';
                        if (btnIcon) btnIcon.className = 'bi bi-send ms-2';
                    }, 4000);
                }
            })
            .catch(error => {
                console.error('Submission error:', error);
                alert('We could not send your message at this moment. Please check your inputs or try again.');
                if (submitQuoteBtn) {
                    submitQuoteBtn.disabled = false;
                    const btnText = document.getElementById('btnText');
                    const btnIcon = document.getElementById('btnIcon');
                    if (btnText) btnText.textContent = 'Submit Request';
                    if (btnIcon) btnIcon.className = 'bi bi-send ms-2';
                }
            });
        });
    }

    // 8. Precision in Motion Vanilla Observer & Fallback Trigger
    const pmSection = document.getElementById('precision-motion');
    if (pmSection) {
        // If GSAP is not loaded or as a reliable native fallback
        const pmObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    pmSection.classList.add('pm-in-view');
                    const accentLine = document.getElementById('pmAccentLine');
                    if (accentLine) {
                        accentLine.style.width = '100%';
                    }
                    const cards = pmSection.querySelectorAll('.pm-glass-card');
                    cards.forEach((card) => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    });
                    observer.unobserve(pmSection);
                }
            });
        }, { threshold: 0.05 });

        pmObserver.observe(pmSection);
    }

    // 9. Company Profile Statistics Counter (IntersectionObserver, triggers once)
    const companySection = document.getElementById('company-profile');
    if (companySection) {
        const counters = companySection.querySelectorAll('.company-stat-counter');
        let counterAnimated = false;

        const animateCounters = () => {
            if (counterAnimated) return;
            counterAnimated = true;

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target') || '20', 10);
                const duration = 1600; // ms
                const startTime = performance.now();

                const updateCount = (currentTime) => {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    // Smooth easeOutQuad
                    const easeProgress = 1 - (1 - progress) * (1 - progress);
                    const currentVal = Math.floor(easeProgress * target);
                    counter.textContent = currentVal;

                    if (progress < 1) {
                        requestAnimationFrame(updateCount);
                    } else {
                        counter.textContent = target;
                    }
                };

                requestAnimationFrame(updateCount);
            });
        };

        const companyObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(companySection);
                }
            });
        }, { threshold: 0.25 });

        companyObserver.observe(companySection);
    }

    // 10. Reasons to Choose Wellnox Sequential Reveal (IntersectionObserver)
    const reasonsSection = document.querySelector('.reasons-choose-section');
    if (reasonsSection) {
        const reasonCards = reasonsSection.querySelectorAll('.reason-luxury-card');
        const reasonsObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    reasonCards.forEach((card, idx) => {
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, idx * 80);
                    });
                    observer.unobserve(reasonsSection);
                }
            });
        }, { threshold: 0.15 });

        reasonsObserver.observe(reasonsSection);
    }

    // 11. Wellnox Architectural Drain Divider Observer (triggers animation once on view)
    const drainDividers = document.querySelectorAll('.wellnox-drain-divider');
    if (drainDividers.length > 0) {
        const drainObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        drainDividers.forEach(el => drainObserver.observe(el));
    }
});

