@extends('layouts.app')

@section('title', 'About Us | Wellnox International Pvt. Ltd. | Precision Engineering & Luxury Bathroom Solutions')
@section('meta_description', 'Discover Wellnox International Pvt. Ltd., premier manufacturer of AISI 304 shower channel drainers, gratings, health faucets, and luxury bathroom accessories crafted in Rajkot, Gujarat.')

@section('content')

    <!-- 1. CREATIVE LUXURY ARCHITECTURAL PAGE TITLE & BREADCRUMB HERO -->
    <section class="about-hero-creative position-relative overflow-hidden">
        <!-- Rich Luxury Architectural Background Image with Deep Gradient Mesh & Glows -->
        <div class="about-hero-bg-layer" style="background-image: url('{{ asset('assets/images/why-wellnox-banner.webp') }}');"></div>
        <div class="about-hero-ambient-darkener"></div>
        <div class="about-creative-glow glow-center" aria-hidden="true"></div>
        <div class="about-creative-glow glow-corner glow-corner-left" aria-hidden="true"></div>
        <div class="about-creative-glow glow-corner glow-corner-right" aria-hidden="true"></div>
        <div class="about-creative-grid-overlay" aria-hidden="true"></div>
        
        <!-- Subtle Architectural Floating Watermark -->
        <div class="about-hero-watermark" aria-hidden="true">WELLNOX</div>
        <div class="container position-relative z-3">
            <div class="about-hero-creative-inner text-center">
                <!-- Clean Bold Page Title -->
                <h1 class="about-creative-page-title mb-3">
                    About <span class="text-gold font-serif">Us</span>
                </h1>

                <!-- Architectural Drain Slotted Accent Divider -->
                <div class="mb-4 d-flex justify-content-center">
                    <x-drain-divider theme="dark" align="center" />
                </div>

                <!-- Sleek Creative Glass Breadcrumb Capsule -->
                <div class="d-inline-block">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb creative-glass-breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}" class="breadcrumb-home-link">
                                    <i class="bi bi-house-door-fill text-gold me-1"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="breadcrumb-separator">
                                <i class="bi bi-chevron-right"></i>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <span>About Us</span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

    </section>

    <!-- 2. FOUNDATION & HERITAGE (MATCHING HOMEPAGE COMPANY PROFILE DESIGN) -->
    <section class="section-padding company-profile-section position-relative overflow-hidden">
        <div class="container position-relative z-2">
            <div class="row g-4 g-xl-5 align-items-center">
                <!-- Left: Factory Photo with Rounded Frame and Floating Experience Badge -->
                <div class="col-lg-6">
                    <div class="company-img-wrapper" id="aboutImgWrapper">
                        <img src="{{ asset($companyFactoryImage) }}" alt="Wellnox International Pvt. Ltd." class="company-main-img" loading="lazy">
                        
                        <!-- Floating Architectural Experience Badge -->
                        <div class="about-floating-badge" id="aboutFloatingBadge">
                            <div class="badge-num-box">
                                <span class="badge-big-num">24+</span>
                            </div>
                            <div class="badge-text-box">
                                <span class="badge-title">Years of Precision</span>
                                <span class="badge-sub">Manufacturing Legacy</span>
                            </div>
                        </div>

                        <!-- Subtle Bronze Frame Accent -->
                        <div class="about-img-frame-accent" aria-hidden="true"></div>
                    </div>
                </div>

                <!-- Right: Company Profile Details & Stats Row -->
                <div class="col-lg-6 company-content-col">
                    <span class="section-eyebrow">COMPANY PROFILE</span>
                    <h2 class="company-section-heading mb-2"> <span class="text-gold">Wellnox International</span> Pvt. Ltd.</h2>
                    <div class="mb-3">
                        <x-drain-divider theme="light" align="left" />
                    </div>
                    
                    <p class="company-text-desc mb-3">
                        Founded in 2012, <strong>Wellnox Drain</strong> has grown into a trusted name in the manufacturing of high-quality drainage and bathroom products. Located near Rajkot, Gujarat, a region renowned for its engineering and manufacturing excellence, <strong>Wellnox Drain</strong> takes full advantage of this environment to craft innovative, durable solutions that seamlessly combine functionality with style.
                    </p>
                    
                    <p class="company-text-desc mb-3">
                        At the heart of <strong>Wellnox Drain's</strong> success is a commitment to precision and quality. We use premium materials like <strong>AISI 304 and 316 stainless steel</strong>, especially for bulk orders, ensuring exceptional durability and flawless finishes. This dedication to superior craftsmanship has made <strong>Wellnox Drain</strong> the preferred choice for customers who demand products that meet the highest standards.
                    </p>

                    <p class="company-text-desc mb-4">
                        In addition, we specialize in crafting premium stainless steel fasteners for wall-hung lavatories, washbasins, and cast iron brackets. Each product is designed for superior performance and lasting durability, showcasing our unwavering commitment to quality.
                    </p>

                    <!-- In-column 4 Stats items with vertical dividers matching Homepage exactly -->
                    @if(!empty($companyStats))
                        <div class="company-stats-row mb-4">
                            <div class="row g-0 align-items-center">
                                @foreach($companyStats as $index => $stat)
                                    <div class="col-6 col-md-3">
                                        <div class="company-stat-card {{ $index < count($companyStats) - 1 ? 'has-right-divider' : '' }} stat-idx-{{ $index }}">
                                            <div class="stat-icon-wrap">
                                                <i class="bi {{ $stat['icon'] }}"></i>
                                            </div>
                                            <div class="stat-number-text">
                                                @if(isset($stat['numeric']))
                                                    <span class="company-stat-counter" data-target="{{ $stat['numeric'] }}">{{ $stat['numeric'] }}</span><span class="stat-plus-sign">+</span>
                                                @else
                                                    <span class="company-stat-text-val">{{ $stat['number'] }}</span>
                                                @endif
                                            </div>
                                            <div class="stat-label-text">{{ $stat['label'] }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <a href="{{ asset('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn-primary-wellnox company-btn">
                            <i class="bi bi-file-earmark-pdf"></i>
                            <span>Download Full Catalogue</span>
                        </a>
                        <a href="#about-contact" class="btn-pill-outline-dark">
                            <span>Get in Touch</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. 10-STAGE PRECISION MANUFACTURING TIMELINE (FROM RAW ALLOY TO PERFECTION) -->
    @if(!empty($processSteps))
    <section class="section-padding bg-dark text-white position-relative overflow-hidden precision-flow-section" id="manufacturing-process">
        <!-- Ambient Background Glows & Architectural Grid -->
        <div class="flow-ambient-glow" aria-hidden="true"></div>
        <div class="about-creative-grid-overlay" aria-hidden="true"></div>

        <div class="container position-relative z-2">
            <div class="text-center mb-5 pb-lg-2">
                <span class="section-eyebrow text-gold">MANUFACTURING RIGOR</span>
                <h2 class="section-heading text-white mb-2">
                    10-Stage Precision <span class="text-gold font-serif">Engineering</span> Flow
                </h2>
                <div class="mb-3 d-flex justify-content-center">
                    <x-drain-divider theme="dark" align="center" />
                </div>
                <p class="section-subtext text-white-50 mx-auto" style="max-width: 680px;">
                    Experience how raw AISI 304/316 alloy coils transform into world-class architectural shower channels through micron-calibrated fabrication.
                </p>
            </div>

            <!-- Stepper Timeline Nav Ribbon with Animated Flow Line (Horizontal Scrollable on Mobile) -->
            <div class="process-stepper-nav-wrap mb-3 mb-md-4">
                <div class="process-stepper-track d-flex align-items-center justify-content-between position-relative" id="processNavTrack">
                    <!-- Flow Line Beam Background & Animated Liquid Laser Pulse -->
                    <div class="stepper-flow-line-rail" aria-hidden="true">
                        <div class="stepper-flow-fill" id="stepperFlowFill"></div>
                        <div class="stepper-flow-pulse" id="stepperFlowPulse"></div>
                    </div>

                    @foreach($processSteps as $i => $step)
                        <button type="button" 
                                class="process-step-node-btn {{ $i === 0 ? 'active' : '' }}" 
                                data-step-index="{{ $i }}"
                                aria-label="Step {{ $step['step'] }}: {{ $step['name'] }}">
                            <span class="node-num">{{ $step['step'] }}</span>
                            <span class="node-icon"><i class="bi {{ $step['icon'] }}"></i></span>
                            <span class="node-pulse-halo" aria-hidden="true"></span>
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Featured Active Stage Showcase Card (Tight Compact Spacing & Highly Readable) -->
            <div class="process-showcase-panel p-3 p-md-4 p-xl-4 rounded-4 position-relative mb-3 mb-md-4" id="processShowcaseCard">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-7">
                        <div class="d-flex flex-wrap align-items-center gap-2 gap-sm-3 mb-3">
                            <span class="active-stage-pill" id="activeStepBadge">Stage 01 of 10</span>
                            <span class="active-tag-badge" id="activeStepTag">{{ $processSteps[0]['tag'] }}</span>
                        </div>
                        <h3 class="font-serif text-white active-stage-title mb-3" id="activeStepTitle">
                            {{ $processSteps[0]['name'] }}
                        </h3>
                        <p class="active-stage-desc mb-4" id="activeStepDesc">
                            {{ $processSteps[0]['desc'] }}
                        </p>
                        
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 pt-2">
                            <div class="active-metric-box d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill">
                                <i class="bi bi-shield-check text-gold fs-5"></i>
                                <span class="fw-bold text-white small" id="activeStepMetric">{{ $processSteps[0]['metric'] }}</span>
                            </div>

                            <div class="d-flex align-items-center gap-2 ms-auto ms-sm-0 process-stepper-controls">
                                <button type="button" class="btn-step-arrow" id="btnPrevStep" aria-label="Previous Stage">
                                    <i class="bi bi-chevron-left"></i>
                                </button>
                                <span class="text-white-50 small fw-bold px-2" id="stepCounterText">1 / 10</span>
                                <button type="button" class="btn-step-arrow" id="btnNextStep" aria-label="Next Stage">
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <!-- Holographic Architectural Graphic Display -->
                        <div class="process-visual-display text-center p-4 rounded-4 position-relative overflow-hidden">
                            <div class="process-visual-glow" aria-hidden="true"></div>
                            <div class="visual-huge-num" id="activeStepHugeNum" aria-hidden="true">{{ $processSteps[0]['step'] }}</div>
                            <div class="visual-icon-orb-huge mx-auto mb-3" id="activeStepOrb">
                                <i class="bi {{ $processSteps[0]['icon'] }}" id="activeStepIcon"></i>
                            </div>
                            <div class="visual-alloy-label text-gold small text-uppercase tracking-wider fw-bold">
                                WELLNOX ENGINEERING &bull; RAJKOT
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Compact Grid Matrix of All 10 Steps for Quick Overview -->
            <div class="row g-2 g-md-3">
                @foreach($processSteps as $i => $step)
                    <div class="col-6 col-md-4 col-lg-custom-5">
                        <div class="process-mini-chip p-3 rounded-3 {{ $i === 0 ? 'active' : '' }}" 
                             data-step-index="{{ $i }}"
                             role="button"
                             tabindex="0">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="chip-num text-gold fw-bold">{{ $step['step'] }}</span>
                                <span class="chip-title text-truncate text-white fw-semibold small">{{ $step['name'] }}</span>
                            </div>
                            <span class="chip-tag text-truncate d-block">{{ $step['tag'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- Pass Process Data to JavaScript -->
    <script>
        const WELLNOX_PROCESS_STEPS = @json($processSteps);
    </script>
    @endif


    <!-- 4. MISSION, VISION & PHILOSOPHY SPOTLIGHT -->
    <section class="section-padding about-philosophy-section position-relative overflow-hidden" style="background: radial-gradient(circle at 10% 20%, #fbf9f6 0%, #FFFFFF 100%);">
        <div class="container position-relative z-2">
            <div class="text-center mb-5 pb-lg-2">
                <span class="section-eyebrow">OUR CORE PURPOSE</span>
                <h2 class="section-heading mb-2">
                    Mission, Vision &amp; <span class="text-gold font-serif">Philosophy</span>
                </h2>
                <div class="mb-3">
                    <x-drain-divider theme="light" align="center" />
                </div>
                <p class="section-subtext mx-auto" style="max-width: 720px;">
                    Driven by precision manufacturing near Rajkot, Gujarat, we lead the industry through unshakeable material integrity, technological innovation, and lasting customer partnerships.
                </p>
            </div>

            <!-- 3 High-Impact Cards: Mission, Vision, Core Value -->
            <div class="row g-4 mb-5">
                <!-- Mission Card -->
                <div class="col-lg-4">
                    <div class="philosophy-hero-card philosophy-card-mission h-100 p-4 p-xl-5 rounded-4 shadow-sm position-relative overflow-hidden">
                        <div class="philosophy-card-watermark">MISSION</div>
                        <div class="philosophy-icon-orb mb-4">
                            <i class="bi bi-compass"></i>
                        </div>
                        <span class="philosophy-badge mb-2 d-inline-block">PURPOSE &amp; GOAL</span>
                        <h3 class="philosophy-title font-serif mb-3 text-dark">Our Mission</h3>
                        <p class="philosophy-lead fw-semibold text-dark mb-3">
                            {{ $philosophy['mission']['lead'] }}
                        </p>
                        <p class="philosophy-desc text-muted small mb-0">
                            {{ $philosophy['mission']['desc'] }}
                        </p>
                    </div>
                </div>

                <!-- Vision Card (Center Featured with Dark Luxury Accent) -->
                <div class="col-lg-4">
                    <div class="philosophy-hero-card philosophy-card-vision h-100 p-4 p-xl-5 rounded-4 shadow-lg position-relative overflow-hidden bg-dark text-white">
                        <div class="philosophy-card-watermark text-white-10">VISION</div>
                        <div class="philosophy-icon-orb orb-gold mb-4">
                            <i class="bi bi-eye"></i>
                        </div>
                        <span class="philosophy-badge badge-gold mb-2 d-inline-block">GLOBAL ASPIRATION</span>
                        <h3 class="philosophy-title font-serif mb-3 text-white">Our Vision</h3>
                        <p class="philosophy-lead fw-semibold text-white mb-3">
                            {{ $philosophy['vision']['lead'] }}
                        </p>
                        <p class="philosophy-desc text-white-50 small mb-0">
                            {{ $philosophy['vision']['desc'] }}
                        </p>
                    </div>
                </div>

                <!-- Core Value Card -->
                <div class="col-lg-4">
                    <div class="philosophy-hero-card philosophy-card-value h-100 p-4 p-xl-5 rounded-4 shadow-sm position-relative overflow-hidden">
                        <div class="philosophy-card-watermark">VALUES</div>
                        <div class="philosophy-icon-orb mb-4">
                            <i class="bi bi-gem"></i>
                        </div>
                        <span class="philosophy-badge mb-2 d-inline-block">UNCOMPROMISING PRINCIPLES</span>
                        <h3 class="philosophy-title font-serif mb-3 text-dark">Our Core Values</h3>
                        <p class="philosophy-lead fw-semibold text-dark mb-3">
                            {{ $philosophy['core_value']['lead'] }}
                        </p>
                        <p class="philosophy-desc text-muted small mb-0">
                            {{ $philosophy['core_value']['desc'] }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. CATALOGUE CTA SECTION -->
    <x-catalogue-cta :catalogueBook="$catalogueBookImage" :catalogueBg="$catalogueBgImage" />

    <!-- 6. LUXURY ARCHITECTURAL FINISHES (PVD & ELECTRO-POLISH) -->
    <section class="section-padding bg-light position-relative">
        <div class="container">
            <div class="text-center mb-5 pb-lg-2">
                <span class="section-eyebrow">SURFACE ARTISTRY</span>
                <h2 class="section-heading mb-2">
                    Curated Architectural <span class="text-gold font-serif">Finishes</span>
                </h2>
                <div class="mb-3">
                    <x-drain-divider theme="light" align="center" />
                </div>
                <p class="section-subtext mx-auto" style="max-width: 680px;">
                    Engineered to harmonize seamlessly with Italian marble, slate tiles, terrazzo, and bespoke luxury sanitary fittings.
                </p>
            </div>

            <div class="row g-3 g-lg-4 justify-content-center">
                @foreach($finishes as $fin)
                    <div class="col-sm-6 col-md-4 col-lg">
                        <div class="finish-palette-card p-4 rounded-4 bg-white text-center h-100 shadow-sm border position-relative">
                            <div class="finish-swatch-circle mx-auto mb-3 shadow-inner" style="background-color: {{ $fin['color'] }};"></div>
                            <span class="badge bg-light text-dark border mb-2 small">{{ $fin['code'] }}</span>
                            <h5 class="finish-name mb-1 font-serif text-dark">{{ $fin['name'] }}</h5>
                            <p class="finish-desc text-muted small mb-0">{{ $fin['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // 1. Interactive 10-Stage Precision Engineering Flow Switcher
    if (typeof WELLNOX_PROCESS_STEPS !== 'undefined' && WELLNOX_PROCESS_STEPS.length > 0) {
        let currentStepIndex = 0;
        const totalSteps = WELLNOX_PROCESS_STEPS.length;

        const badgeEl = document.getElementById('activeStepBadge');
        const tagEl = document.getElementById('activeStepTag');
        const titleEl = document.getElementById('activeStepTitle');
        const descEl = document.getElementById('activeStepDesc');
        const metricEl = document.getElementById('activeStepMetric');
        const counterEl = document.getElementById('stepCounterText');
        const hugeNumEl = document.getElementById('activeStepHugeNum');
        const iconEl = document.getElementById('activeStepIcon');
        const showcaseCard = document.getElementById('processShowcaseCard');

        const nodeBtns = document.querySelectorAll('.process-step-node-btn');
        const miniChips = document.querySelectorAll('.process-mini-chip');
        const btnPrev = document.getElementById('btnPrevStep');
        const btnNext = document.getElementById('btnNextStep');

        const flowFillEl = document.getElementById('stepperFlowFill');

        // Auto flow timer - automatically advances line & stage
        let autoStepTimer = null;
        const AUTO_INTERVAL_MS = 3800; // Smooth 3.8s cadence per stage

        function startAutoFlow() {
            stopAutoFlow();
            autoStepTimer = setInterval(() => {
                updateStep(currentStepIndex + 1);
            }, AUTO_INTERVAL_MS);
        }

        function stopAutoFlow() {
            if (autoStepTimer) {
                clearInterval(autoStepTimer);
                autoStepTimer = null;
            }
        }

        function resetAutoFlow() {
            stopAutoFlow();
            startAutoFlow();
        }

        function updateStep(index) {
            if (index < 0) index = totalSteps - 1;
            if (index >= totalSteps) index = 0;
            currentStepIndex = index;

            const step = WELLNOX_PROCESS_STEPS[currentStepIndex];

            // Animate progress flow line fill dynamically
            if (flowFillEl) {
                const fillPercent = ((currentStepIndex) / (totalSteps - 1)) * 100;
                flowFillEl.style.width = `${fillPercent}%`;
            }

            // Keep active node centered into view on mobile / scrollable wrapper
            if (nodeBtns[currentStepIndex]) {
                const activeNode = nodeBtns[currentStepIndex];
                const navWrap = document.querySelector('.process-stepper-nav-wrap');
                if (navWrap && navWrap.scrollWidth > navWrap.clientWidth) {
                    const scrollLeft = activeNode.offsetLeft - (navWrap.clientWidth / 2) + (activeNode.clientWidth / 2);
                    navWrap.scrollTo({ left: scrollLeft, behavior: 'smooth' });
                }
            }

            // Animate showcase card smoothly
            if (showcaseCard) {
                showcaseCard.style.opacity = '0.7';
                showcaseCard.style.transform = 'translateY(4px)';
            }

            setTimeout(() => {
                if (badgeEl) badgeEl.textContent = `Stage ${step.step} of 10`;
                if (tagEl) tagEl.textContent = step.tag;
                if (titleEl) titleEl.textContent = step.name;
                if (descEl) descEl.textContent = step.desc;
                if (metricEl) metricEl.textContent = step.metric;
                if (counterEl) counterEl.textContent = `${currentStepIndex + 1} / ${totalSteps}`;
                if (hugeNumEl) hugeNumEl.textContent = step.step;
                if (iconEl) iconEl.className = `bi ${step.icon}`;

                // Update active states on node buttons
                nodeBtns.forEach((btn, idx) => {
                    btn.classList.toggle('active', idx === currentStepIndex);
                });

                // Update active states on mini chips
                miniChips.forEach((chip, idx) => {
                    chip.classList.toggle('active', idx === currentStepIndex);
                });

                if (showcaseCard) {
                    showcaseCard.style.opacity = '1';
                    showcaseCard.style.transform = 'translateY(0)';
                }
            }, 120);
        }

        // Initialize first position line fill
        if (flowFillEl) {
            flowFillEl.style.width = '0%';
        }

        nodeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const idx = parseInt(btn.getAttribute('data-step-index'), 10);
                updateStep(idx);
                resetAutoFlow();
            });
        });

        miniChips.forEach(chip => {
            chip.addEventListener('click', () => {
                const idx = parseInt(chip.getAttribute('data-step-index'), 10);
                updateStep(idx);
                resetAutoFlow();
            });
            chip.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    const idx = parseInt(chip.getAttribute('data-step-index'), 10);
                    updateStep(idx);
                    resetAutoFlow();
                }
            });
        });

        if (btnPrev) {
            btnPrev.addEventListener('click', () => {
                updateStep(currentStepIndex - 1);
                resetAutoFlow();
            });
        }

        if (btnNext) {
            btnNext.addEventListener('click', () => {
                updateStep(currentStepIndex + 1);
                resetAutoFlow();
            });
        }

        // Pause auto progression on mouse hover or touch on interactive areas
        const pauseElements = [showcaseCard, document.getElementById('processNavTrack')];
        pauseElements.forEach(el => {
            if (el) {
                el.addEventListener('mouseenter', stopAutoFlow);
                el.addEventListener('mouseleave', startAutoFlow);
                el.addEventListener('touchstart', stopAutoFlow, { passive: true });
                el.addEventListener('touchend', () => setTimeout(startAutoFlow, 2000), { passive: true });
            }
        });

        // Start auto progression
        startAutoFlow();
    }

    // 2. Contact form handling
    const contactForm = document.getElementById('aboutContactForm');
    const formStatus = document.getElementById('aboutFormStatus');
    const submitBtn = document.getElementById('aboutSubmitBtn');

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span>Transmitting...</span> <i class="bi bi-hourglass-split"></i>';
            formStatus.style.display = 'none';

            const formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<span>Send Inquiry to Wellnox</span> <i class="bi bi-send"></i>';
                formStatus.style.display = 'block';
                if (data.success) {
                    formStatus.className = 'alert alert-success mt-3';
                    formStatus.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i>' + data.message;
                    contactForm.reset();
                } else {
                    formStatus.className = 'alert alert-danger mt-3';
                    formStatus.innerHTML = '<i class="bi bi-exclamation-triangle-fill me-2"></i>' + (data.message || 'Something went wrong. Please check your inputs.');
                }
            })
            .catch(err => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<span>Send Inquiry to Wellnox</span> <i class="bi bi-send"></i>';
                formStatus.style.display = 'block';
                formStatus.className = 'alert alert-danger mt-3';
                formStatus.innerHTML = '<i class="bi bi-exclamation-triangle-fill me-2"></i> An error occurred. Please try again or call our direct phone line.';
            });
        });
    }
});
</script>
@endpush
