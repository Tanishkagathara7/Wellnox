@extends('layouts.app')

@section('title', 'Why Wellnox | Precision Engineered Drainage & Architectural Solutions')
@section('meta_description', 'Discover what makes Wellnox a trusted name in precision-engineered drainage, bathroom and utility solutions. Built on precision, defined by quality.')

@section('content')

    <!-- ==========================================================================
       1. CREATIVE LUXURY ARCHITECTURAL PAGE TITLE & BREADCRUMB HERO (MATCHING ABOUT US PAGE)
       ========================================================================== -->
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
                    Why <span class="text-gold font-serif">Wellnox</span>
                </h1>

                <!-- Architectural Drain Slotted Accent Divider -->
                <div class="mb-4 d-flex justify-content-center">
                    <x-drain-divider theme="dark" align="center" />
                </div>

                <!-- Sleek Creative Glass Breadcrumb Capsule (Identical to About Us Page) -->
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
                                <span>Why Wellnox</span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <!-- ==========================================================================
       2. “THE WELLNOX DIFFERENCE” (CREAM SECTION — ALTERNATING THEME)
       ========================================================================== -->
    <section class="section-padding why-difference-cream position-relative overflow-hidden" id="wellnox-difference">
        <div class="container position-relative z-2">
            <div class="row g-4 g-xl-5 align-items-center">
                <!-- Left: Premium Large Product / Drain Visual Showcase -->
                <div class="col-lg-6">
                    <div class="diff-visual-card position-relative rounded-4 overflow-hidden shadow-lg">
                        <div class="diff-image-frame position-relative p-0 overflow-hidden">
                            <img src="{{ asset('assets/images/why-wellnox-diff-showcase.webp') }}" 
                                 alt="Wellnox Architectural Linear Shower Drain Installation" 
                                 class="diff-main-img img-fluid w-100" 
                                 loading="lazy">
                            <div class="diff-image-gradient-overlay"></div>

                            <!-- Creative In-Situ Tag Top Right -->
                            <div class="diff-insitu-badge py-1 px-3 rounded-pill">
                                <span class="diff-pulse-dot"></span>
                                <span class="font-monospace small fw-bold text-uppercase" style="letter-spacing: 0.08em; font-size: 11px;">In-Situ Render</span>
                            </div>

                            <!-- Floating Engineering Spec Badge -->
                            <div class="diff-spec-floating-badge p-2 p-sm-3 rounded-3 shadow-lg">
                                <div class="d-flex align-items-center gap-2 gap-sm-3">
                                    <div class="diff-badge-icon">
                                        <i class="bi bi-shield-check text-gold fs-5 fs-sm-4"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold small text-dark" style="font-size: 13px;">AISI 304 Certified</div>
                                        <div class="diff-badge-sub" style="font-size: 11px; color: #666;">Heavy Gauge Alloy &bull; Micron Flat</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Strip with Technical Stamp -->
                        <div class="diff-card-tech-strip p-3 d-flex justify-content-between align-items-center">
                            <span class="text-gold small fw-bold font-monospace"><i class="bi bi-droplet-half me-1"></i> FLOW: 60L/MIN</span>
                            <span class="text-muted small font-monospace"><i class="bi bi-geo-alt me-1"></i> CALIBRATED IN RAJKOT</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Editorial Typography & 6 Core Principles -->
                <div class="col-lg-6 ps-lg-4">
                    <span class="section-eyebrow text-gold">THE WELLNOX DIFFERENCE</span>
                    <h2 class="section-heading text-dark font-serif mb-3">
                        More Than Products.<br>
                        <span class="text-gold font-serif">Engineered Confidence.</span>
                    </h2>
                    
                    <div class="mb-4">
                        <x-drain-divider theme="light" align="left" />
                    </div>

                    <!-- The 6 Pillars Editorial Grid -->
                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <div class="diff-pillar-item d-flex align-items-start gap-3 p-3 rounded-3">
                                <div class="diff-pillar-icon text-gold">
                                    <i class="bi bi-check2-circle fs-5"></i>
                                </div>
                                <div>
                                    <h4 class="diff-pillar-title text-dark fs-6 fw-semibold mb-1">Precision Engineering</h4>
                                    <p class="diff-pillar-desc text-muted small mb-0">Micron-calibrated laser tolerances and slope-driven drainage.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="diff-pillar-item d-flex align-items-start gap-3 p-3 rounded-3">
                                <div class="diff-pillar-icon text-gold">
                                    <i class="bi bi-layers fs-5"></i>
                                </div>
                                <div>
                                    <h4 class="diff-pillar-title text-dark fs-6 fw-semibold mb-1">Premium Materials</h4>
                                    <p class="diff-pillar-desc text-muted small mb-0">Virgin AISI 304 and 316 stainless-steel coils with zero rust.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="diff-pillar-item d-flex align-items-start gap-3 p-3 rounded-3">
                                <div class="diff-pillar-icon text-gold">
                                    <i class="bi bi-gem fs-5"></i>
                                </div>
                                <div>
                                    <h4 class="diff-pillar-title text-dark fs-6 fw-semibold mb-1">Modern Design</h4>
                                    <p class="diff-pillar-desc text-muted small mb-0">Minimalist flush tile-insert and jewel-grade PVD coatings.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="diff-pillar-item d-flex align-items-start gap-3 p-3 rounded-3">
                                <div class="diff-pillar-icon text-gold">
                                    <i class="bi bi-shield-shaded fs-5"></i>
                                </div>
                                <div>
                                    <h4 class="diff-pillar-title text-dark fs-6 fw-semibold mb-1">Consistent Quality</h4>
                                    <p class="diff-pillar-desc text-muted small mb-0">Rigorous inspection guarantees zero-defect deliveries.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="diff-pillar-item d-flex align-items-start gap-3 p-3 rounded-3">
                                <div class="diff-pillar-icon text-gold">
                                    <i class="bi bi-hourglass-split fs-5"></i>
                                </div>
                                <div>
                                    <h4 class="diff-pillar-title text-dark fs-6 fw-semibold mb-1">Long-Lasting Performance</h4>
                                    <p class="diff-pillar-desc text-muted small mb-0">Built to endure heavy footfall and constant humid bathroom air.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="diff-pillar-item d-flex align-items-start gap-3 p-3 rounded-3">
                                <div class="diff-pillar-icon text-gold">
                                    <i class="bi bi-person-gear fs-5"></i>
                                </div>
                                <div>
                                    <h4 class="diff-pillar-title text-dark fs-6 fw-semibold mb-1">Customer-Focused</h4>
                                    <p class="diff-pillar-desc text-muted small mb-0">Bespoke lengths, OE sourcing, and dedicated technical desk.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <!-- ==========================================================================
       3. CREATIVE WHY WELLNOX FEATURE SECTION (RADIAL / ARCHITECTURAL ADVANTAGE SYSTEM)
       ========================================================================== -->
    <section class="section-padding position-relative overflow-hidden why-advantage-section" id="advantage-system">
        <!-- Architectural Backdrop & Radial Glows -->
        <div class="advantage-bg-overlay" aria-hidden="true"></div>
        <div class="advantage-center-glow" aria-hidden="true"></div>

        <div class="container position-relative z-2">
            <!-- Section Header -->
            <div class="text-center mb-5 pb-lg-2">
                <span class="section-eyebrow text-gold">ARCHITECTURAL SYSTEM</span>
                <h2 class="section-heading text-white font-serif mb-2">
                    The Wellnox <span class="text-gold font-serif">Advantage System</span>
                </h2>
                <div class="mb-3 d-flex justify-content-center">
                    <x-drain-divider theme="dark" align="center" />
                </div>
                <p class="section-subtext text-white-50 mx-auto" style="max-width: 680px;">
                    An interconnected ecosystem of metallurgy, fabrication, and design principles engineered to elevate modern living. Select any pillar to inspect its technical foundation.
                </p>
            </div>

            <!-- Interactive Radial System (Desktop Orbital Layout + Mobile Elegant Interactive List) -->
            <div class="advantage-radial-wrapper position-relative my-4">
                
                <!-- Desktop Orbit System (Hidden on Mobile) -->
                <div class="advantage-orbital-container d-none d-lg-block position-relative mx-auto">
                    <!-- SVG Connecting Thin Bronze Lines & Orbit Track -->
                    <svg class="advantage-orbit-svg" viewBox="0 0 800 800" aria-hidden="true">
                        <!-- Outer Orbit Circle -->
                        <circle cx="400" cy="400" r="320" class="orbit-circle-outer"></circle>
                        <circle cx="400" cy="400" r="230" class="orbit-circle-inner"></circle>
                        
                        <!-- Dynamic Connecting Beams to 6 Nodes (Angles: 30, 90, 150, 210, 270, 330) -->
                        <line x1="400" y1="400" x2="677" y2="240" class="orbit-line-beam node-beam-0"></line>
                        <line x1="400" y1="400" x2="677" y2="560" class="orbit-line-beam node-beam-1"></line>
                        <line x1="400" y1="400" x2="400" y2="720" class="orbit-line-beam node-beam-2"></line>
                        <line x1="400" y1="400" x2="123" y2="560" class="orbit-line-beam node-beam-3"></line>
                        <line x1="400" y1="400" x2="123" y2="240" class="orbit-line-beam node-beam-4"></line>
                        <line x1="400" y1="400" x2="400" y2="80"  class="orbit-line-beam node-beam-5"></line>
                    </svg>

                    <!-- Center Hub ("THE WELLNOX ADVANTAGE") -->
                    <div class="advantage-center-hub position-absolute text-center rounded-circle d-flex flex-column align-items-center justify-content-center" id="advantageCenterHub">
                        <div class="hub-pulse-ring" aria-hidden="true"></div>
                        <div class="hub-inner-core p-4">
                            <span class="hub-eyebrow text-gold text-uppercase tracking-wider fw-bold">SYSTEM CORE</span>
                            <h3 class="hub-title font-serif text-white mb-2">
                                THE WELLNOX<br><span class="text-gold">ADVANTAGE</span>
                            </h3>
                            <div class="hub-accent-bar mx-auto mb-2"></div>
                            <span class="hub-active-label small text-white-50" id="hubActiveIndicator">01 / Premium Materials</span>
                        </div>
                    </div>

                    <!-- 6 Orbital Advantage Satellites -->
                    @foreach($advantages as $idx => $adv)
                        @php
                            // Precise Cartesian coordinates on 320px radius around center (400, 400)
                            // 0: 330° -> (677, 240)
                            // 1: 30°  -> (677, 560)
                            // 2: 90°  -> (400, 720)
                            // 3: 150° -> (123, 560)
                            // 4: 210° -> (123, 240)
                            // 5: 270° -> (400, 80)
                            $positions = [
                                ['x' => '84.6%', 'y' => '30%'],
                                ['x' => '84.6%', 'y' => '70%'],
                                ['x' => '50%',   'y' => '90%'],
                                ['x' => '15.4%', 'y' => '70%'],
                                ['x' => '15.4%', 'y' => '30%'],
                                ['x' => '50%',   'y' => '10%'],
                            ];
                            $pos = $positions[$idx] ?? ['x' => '50%', 'y' => '50%'];
                        @endphp

                        <div class="advantage-satellite-node {{ $idx === 0 ? 'active' : '' }}"
                             style="left: {{ $pos['x'] }}; top: {{ $pos['y'] }};"
                             data-advantage-index="{{ $idx }}"
                             role="button"
                             tabindex="0"
                             aria-label="Advantage {{ $adv['num'] }}: {{ $adv['title'] }}">
                            <div class="node-halo" aria-hidden="true"></div>
                            <div class="node-card-capsule d-flex align-items-center gap-2 p-2 px-3 rounded-pill shadow-lg">
                                <span class="node-num-tag font-monospace fw-bold text-gold">{{ $adv['num'] }}</span>
                                <span class="node-title text-white fw-semibold small text-nowrap">{{ $adv['title'] }}</span>
                                <span class="node-glow-point"></span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Active Advantage Interactive Showcase Display Card (Synced for Desktop & Mobile) -->
                <div class="advantage-detail-showcase mt-4 p-4 p-md-5 rounded-4 position-relative overflow-hidden" id="advantageShowcaseCard">
                    <div class="showcase-bg-grid" aria-hidden="true"></div>
                    
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-7">
                            <div class="d-flex flex-wrap align-items-center gap-2 gap-sm-3 mb-3">
                                <span class="active-stage-pill" id="advShowcaseNum">ADVANTAGE 01 OF 06</span>
                                <span class="active-tag-badge" id="advShowcaseTagline">{{ $advantages[0]['tagline'] }}</span>
                            </div>
                            
                            <h3 class="font-serif text-white display-6 active-stage-title mb-3" id="advShowcaseTitle">
                                {{ $advantages[0]['title'] }}
                            </h3>

                            <p class="active-stage-desc text-white-75 mb-4" id="advShowcaseDesc" style="font-size: 1.05rem; line-height: 1.75;">
                                {{ $advantages[0]['desc'] }}
                            </p>

                            <!-- Key Technical Metric & Quote -->
                            <div class="adv-chips-row">
                                <div class="adv-metric-chip">
                                    <i class="bi bi-patch-check-fill text-gold fs-5"></i>
                                    <div>
                                        <div class="fw-bold text-white small" id="advShowcaseStat">{{ $advantages[0]['stat'] }}</div>
                                        <div class="text-white-50" style="font-size: 11px;" id="advShowcaseStatLbl">{{ $advantages[0]['stat_lbl'] }}</div>
                                    </div>
                                </div>

                                <div class="adv-quote-chip">
                                    <div class="fst-italic" id="advShowcaseQuote">
                                        &ldquo;{{ $advantages[0]['quote'] }}&rdquo;
                                    </div>
                                </div>
                            </div>

                            <!-- Interactive Stepper Controls -->
                            <div class="d-flex align-items-center gap-3">
                                <div class="d-flex align-items-center gap-2">
                                    <button type="button" class="btn-step-arrow" id="advBtnPrev" aria-label="Previous Advantage">
                                        <i class="bi bi-chevron-left"></i>
                                    </button>
                                    <span class="text-white-50 small fw-bold px-2 font-monospace" id="advStepCounter">01 / 06</span>
                                    <button type="button" class="btn-step-arrow" id="advBtnNext" aria-label="Next Advantage">
                                        <i class="bi bi-chevron-right"></i>
                                    </button>
                                </div>
                                <span class="text-white-50 small ms-2 d-none d-sm-inline">Click any node or cycle automatically</span>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <!-- Visual Holographic Product Frame -->
                            <div class="adv-visual-frame position-relative rounded-4 overflow-hidden p-3 text-center">
                                <div class="adv-frame-glow" aria-hidden="true"></div>
                                <img src="{{ asset($advantages[0]['image']) }}" 
                                     alt="Wellnox Advantage Visual" 
                                     id="advShowcaseImg" 
                                     class="img-fluid rounded-3 adv-product-img" 
                                     loading="lazy">
                                <div class="adv-frame-tag text-gold small font-monospace mt-2">
                                    ENGINEERED SPECIFICATION &bull; AISI 304
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile / Tablet Vertical Interactive Advantage Selector List -->
                <div class="advantage-mobile-list d-lg-none mt-4">
                    <div class="row g-2">
                        @foreach($advantages as $idx => $adv)
                            <div class="col-6 col-md-4">
                                <div class="advantage-mobile-chip p-3 rounded-3 {{ $idx === 0 ? 'active' : '' }}" 
                                     data-advantage-index="{{ $idx }}"
                                     role="button"
                                     tabindex="0">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <span class="chip-num text-gold fw-bold font-monospace">{{ $adv['num'] }}</span>
                                        <span class="chip-title text-truncate text-white fw-semibold small">{{ $adv['title'] }}</span>
                                    </div>
                                    <span class="chip-tag text-truncate d-block text-white-50" style="font-size: 11px;">{{ $adv['tagline'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ==========================================================================
       4. ENGINEERING & MANUFACTURING SECTION (CREAM SECTION — ALTERNATING THEME)
       ========================================================================== -->
    <section class="section-padding why-mfg-cream position-relative overflow-hidden why-mfg-section" id="engineering-precision">
        <!-- Subtle Animated Technical Grid Lines Background -->
        <div class="mfg-technical-grid" aria-hidden="true"></div>

        <div class="container position-relative z-2">
            <div class="row g-0 rounded-4 overflow-hidden border border-secondary shadow-lg mfg-split-container">
                
                <!-- Left: High-Resolution Manufacturing Campus Image -->
                <div class="col-lg-6 position-relative mfg-visual-col">
                    <div class="mfg-visual-wrap h-100 position-relative overflow-hidden">
                        <img src="{{ asset('assets/images/about-img.webp') }}" 
                             alt="Wellnox CNC Precision Fabrication" 
                             class="mfg-bg-photo img-fluid h-100 w-100 object-fit-cover" 
                             loading="lazy">
                    </div>
                </div>

                <!-- Right: Content Technical Panel with 4 Highlights -->
                <div class="col-lg-6 mfg-content-col p-4 p-md-5 d-flex flex-column justify-content-center">
                    <div class="mb-4">
                        <span class="section-eyebrow text-gold">MANUFACTURING RIGOR</span>
                        <h2 class="section-heading text-dark font-serif mb-2">
                            Precision You Can See.<br>
                            <span class="text-gold font-serif">Quality You Can Trust.</span>
                        </h2>
                        <div class="mb-3">
                            <x-drain-divider theme="light" align="left" />
                        </div>
                        <p class="section-subtext text-muted mb-0">
                            Our Rajkot production facility combines computerized fabrication technologies with multi-tier artisanal finishing to eliminate imperfections before units reach installation.
                        </p>
                    </div>

                    <!-- 4 Technical Highlights -->
                    <div class="mfg-highlights-list d-flex flex-column gap-3">
                        @foreach($technicalHighlights as $idx => $tech)
                            <div class="mfg-tech-item p-3 rounded-3 d-flex align-items-start gap-3">
                                <div class="mfg-tech-icon-box rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                                    <i class="bi {{ $tech['icon'] }} text-gold fs-5"></i>
                                </div>
                                <div>
                                    <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                                        <h4 class="text-dark fs-6 fw-semibold mb-0">{{ $tech['title'] }}</h4>
                                        <span class="badge mfg-tech-badge" style="font-size: 10px;">{{ $tech['subtitle'] }}</span>
                                    </div>
                                    <p class="text-muted small mb-0" style="line-height: 1.6;">
                                        {{ $tech['desc'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </section>


   

    <!-- ==========================================================================
       6. “BUILT FOR MODERN SPACES” (IMMERSIVE INTERIOR SHOWCASE — DARK CINEMATIC)
       ========================================================================== -->
    <section class="why-modern-spaces-section position-relative overflow-hidden text-white">
        <!-- Large Architectural Interior Photographic Background -->
        <div class="modern-spaces-bg" style="background-image: url('{{ asset('assets/images/why-wellnox-banner.webp') }}');"></div>
        <div class="modern-spaces-overlay"></div>
        <div class="modern-spaces-grid" aria-hidden="true"></div>

        <div class="container position-relative z-3">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 col-xl-7">
                    
                    <span class="section-eyebrow text-gold">ARCHITECTURAL HARMONY</span>
                    <h2 class="modern-spaces-heading font-serif display-4 text-white mb-3">
                        Designed for <span class="text-gold font-serif">Modern Living.</span>
                    </h2>
                    
                    <div class="mb-4 d-flex justify-content-center">
                        <x-drain-divider theme="dark" align="center" />
                    </div>

                    <p class="modern-spaces-lead text-white-75 lead mb-4" style="line-height: 1.8;">
                        From drainage to everyday utility, every Wellnox product is designed to integrate performance, functionality and refined aesthetics.
                    </p>

                    <div class="d-flex flex-wrap align-items-center justify-content-center gap-3">
                        <a href="{{ route('home') }}#popular-designs" class="btn-primary-wellnox">
                            <span>Explore Our Products</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        <a href="{{ route('website.contact') }}" class="btn-pill-outline-light">
                            <i class="bi bi-envelope-paper"></i>
                            <span>Contact Us</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- ==========================================================================
       7. WHY CUSTOMERS CHOOSE WELLNOX (CREAM SECTION — ALTERNATING THEME)
       ========================================================================== -->
    <section class="section-padding why-editorial-cream position-relative overflow-hidden why-editorial-section" id="customer-choice">
        <div class="container position-relative z-2">
            <!-- Header -->
            <div class="text-center mb-5 pb-lg-2">
                <span class="section-eyebrow text-gold">TRUSTED BY ARCHITECTS</span>
                <h2 class="section-heading text-dark font-serif mb-2">
                    Why Customers <span class="text-gold font-serif">Choose Wellnox</span>
                </h2>
                <div class="mb-3 d-flex justify-content-center">
                    <x-drain-divider theme="light" align="center" />
                </div>
                <p class="section-subtext text-muted mx-auto" style="max-width: 680px;">
                    Four core reasons why leading developers, luxury architects, and premium homeowners specify Wellnox for modern interior spaces.
                </p>
            </div>

            <!-- 4 Large Editorial Blocks in Cream Tone -->
            <div class="row g-4">
                @foreach($editorialBlocks as $idx => $block)
                    <div class="col-lg-6">
                        <div class="editorial-block-card p-4 p-md-5 rounded-4 position-relative overflow-hidden h-100">
                            <!-- Large Oversized Watermark Number -->
                            <div class="editorial-huge-num" aria-hidden="true">{{ $block['num'] }}</div>
                            <div class="editorial-card-glow" aria-hidden="true"></div>

                            <div class="position-relative z-2">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <span class="badge editorial-badge font-monospace">{{ $block['badge'] }}</span>
                                    <span class="editorial-num-pill text-gold font-monospace fw-bold">#{{ $block['num'] }}</span>
                                </div>

                                <h3 class="editorial-title font-serif text-dark display-6 mb-2">
                                    {{ $block['title'] }}
                                </h3>
                                <div class="editorial-subtitle text-gold small text-uppercase tracking-wider fw-semibold mb-3">
                                    {{ $block['subtitle'] }}
                                </div>

                                <p class="editorial-desc text-muted mb-4" style="line-height: 1.75;">
                                    {{ $block['desc'] }}
                                </p>

                                <div class="editorial-footer d-flex align-items-center gap-3 pt-3 border-top border-secondary">
                                    <i class="bi bi-shield-check text-gold fs-5"></i>
                                    <span class="text-muted small font-monospace">WELLNOX RIGOR &bull; CERTIFIED SPECIFICATION</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>


    <!-- ==========================================================================
       8. NUMBERS / TRUST SECTION (ANIMATED STATISTICS)
       ========================================================================== -->
    <section class="section-padding bg-darker text-white position-relative overflow-hidden why-stats-section" id="trust-numbers">
        <div class="stats-glow-ambient" aria-hidden="true"></div>

        <div class="container position-relative z-2">
            <div class="row g-4 text-center justify-content-center">
                @foreach($trustStats as $idx => $stat)
                    <div class="col-6 col-lg-3">
                        <div class="why-stat-card p-4 rounded-4 position-relative">
                            <div class="stat-num-wrapper mb-2">
                                <span class="why-stat-number font-serif display-4 text-gold fw-bold counter-animate" 
                                      data-target="{{ $stat['numeric'] }}" 
                                      data-suffix="{{ $stat['suffix'] }}"
                                      data-display="{{ $stat['number'] }}">
                                    {{ $stat['number'] }}
                                </span>
                            </div>
                            <h4 class="why-stat-label text-white fs-5 fw-semibold mb-1">{{ $stat['label'] }}</h4>
                            <p class="why-stat-sub text-white-50 small mb-0">{{ $stat['sub'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- ==========================================================================
       9. “OUR COMMITMENT” (ELEGANT WARM CREAM SECTION)
       ========================================================================== -->
    <section class="section-padding why-commitment-section position-relative overflow-hidden">
        <div class="container position-relative z-2">
            <!-- Header -->
            <div class="text-center mb-5 pb-lg-2">
                <span class="section-eyebrow text-gold">UNWAVERING DEVOTION</span>
                <h2 class="section-heading text-dark font-serif mb-2">
                    Our Commitment to <span class="text-gold font-serif">Better Products.</span>
                </h2>
                <div class="mb-3 d-flex justify-content-center">
                    <x-drain-divider theme="light" align="center" />
                </div>
                <p class="section-subtext text-muted mx-auto" style="max-width: 720px; font-size: 1.1rem; line-height: 1.8;">
                    We continuously improve our designs, manufacturing processes and quality standards to create products that deliver lasting value to modern spaces.
                </p>
            </div>

            <!-- Three Principles Cards -->
            <div class="row g-4 justify-content-center">
                @foreach($commitmentPrinciples as $principle)
                    <div class="col-md-4">
                        <div class="commitment-card p-4 p-xl-5 rounded-4 bg-white shadow-sm h-100 position-relative border">
                            <div class="commitment-icon-orb mb-4 text-gold">
                                <i class="bi {{ $principle['icon'] }}"></i>
                            </div>
                            <span class="commitment-badge mb-2 d-inline-block text-gold font-monospace">CORE PRINCIPLE</span>
                            <h3 class="commitment-title font-serif text-dark mb-3">{{ $principle['title'] }}</h3>
                            <p class="commitment-desc text-muted mb-0" style="line-height: 1.7;">
                                {{ $principle['desc'] }}
                            </p>
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
    // 1. Data Store for 6 Radial Advantages
    const WELLNOX_ADVANTAGES = @json($advantages);
    let currentAdvIndex = 0;
    const totalAdv = WELLNOX_ADVANTAGES.length;

    const advNumEl = document.getElementById('advShowcaseNum');
    const advTaglineEl = document.getElementById('advShowcaseTagline');
    const advTitleEl = document.getElementById('advShowcaseTitle');
    const advDescEl = document.getElementById('advShowcaseDesc');
    const advStatEl = document.getElementById('advShowcaseStat');
    const advStatLblEl = document.getElementById('advShowcaseStatLbl');
    const advQuoteEl = document.getElementById('advShowcaseQuote');
    const advCounterEl = document.getElementById('advStepCounter');
    const advImgEl = document.getElementById('advShowcaseImg');
    const advShowcaseCard = document.getElementById('advantageShowcaseCard');
    const hubIndicatorEl = document.getElementById('hubActiveIndicator');

    const orbitalNodes = document.querySelectorAll('.advantage-satellite-node');
    const mobileChips = document.querySelectorAll('.advantage-mobile-chip');
    const orbitLines = document.querySelectorAll('.orbit-line-beam');
    const btnAdvPrev = document.getElementById('advBtnPrev');
    const btnAdvNext = document.getElementById('advBtnNext');

    let advAutoTimer = null;
    const ADV_INTERVAL_MS = 4500;

    function updateAdvantage(idx) {
        if (idx < 0) idx = totalAdv - 1;
        if (idx >= totalAdv) idx = 0;
        currentAdvIndex = idx;

        const adv = WELLNOX_ADVANTAGES[currentAdvIndex];

        // Soft fade card transition
        if (advShowcaseCard) {
            advShowcaseCard.style.opacity = '0.75';
            advShowcaseCard.style.transform = 'translateY(3px)';
        }

        setTimeout(() => {
            if (advNumEl) advNumEl.textContent = `ADVANTAGE ${adv.num} OF 06`;
            if (advTaglineEl) advTaglineEl.textContent = adv.tagline;
            if (advTitleEl) advTitleEl.textContent = adv.title;
            if (advDescEl) advDescEl.textContent = adv.desc;
            if (advStatEl) advStatEl.textContent = adv.stat;
            if (advStatLblEl) advStatLblEl.textContent = adv.stat_lbl;
            if (advQuoteEl) advQuoteEl.innerHTML = `&ldquo;${adv.quote}&rdquo;`;
            if (advCounterEl) advCounterEl.textContent = `${adv.num} / 06`;
            if (hubIndicatorEl) hubIndicatorEl.textContent = `${adv.num} / ${adv.title}`;
            if (advImgEl) {
                advImgEl.src = `{{ asset('') }}${adv.image}`;
                advImgEl.alt = adv.title;
            }

            // Update orbital node active classes
            orbitalNodes.forEach((node, i) => {
                node.classList.toggle('active', i === currentAdvIndex);
            });

            // Update mobile chips active classes
            mobileChips.forEach((chip, i) => {
                chip.classList.toggle('active', i === currentAdvIndex);
            });

            // Highlight connecting SVG beam
            orbitLines.forEach((line, i) => {
                line.classList.toggle('active', i === currentAdvIndex);
            });

            if (advShowcaseCard) {
                advShowcaseCard.style.opacity = '1';
                advShowcaseCard.style.transform = 'translateY(0)';
            }
        }, 120);
    }

    function startAdvAuto() {
        stopAdvAuto();
        advAutoTimer = setInterval(() => {
            updateAdvantage(currentAdvIndex + 1);
        }, ADV_INTERVAL_MS);
    }

    function stopAdvAuto() {
        if (advAutoTimer) {
            clearInterval(advAutoTimer);
            advAutoTimer = null;
        }
    }

    function resetAdvAuto() {
        stopAdvAuto();
        startAdvAuto();
    }

    // Event listeners for orbital nodes
    orbitalNodes.forEach(node => {
        node.addEventListener('click', () => {
            const idx = parseInt(node.getAttribute('data-advantage-index'), 10);
            updateAdvantage(idx);
            resetAdvAuto();
        });
        node.addEventListener('mouseenter', () => {
            const idx = parseInt(node.getAttribute('data-advantage-index'), 10);
            updateAdvantage(idx);
            stopAdvAuto();
        });
        node.addEventListener('mouseleave', startAdvAuto);
    });

    // Mobile chips listener
    mobileChips.forEach(chip => {
        chip.addEventListener('click', () => {
            const idx = parseInt(chip.getAttribute('data-advantage-index'), 10);
            updateAdvantage(idx);
            resetAdvAuto();
        });
    });

    // Nav arrows
    if (btnAdvPrev) {
        btnAdvPrev.addEventListener('click', () => {
            updateAdvantage(currentAdvIndex - 1);
            resetAdvAuto();
        });
    }
    if (btnAdvNext) {
        btnAdvNext.addEventListener('click', () => {
            updateAdvantage(currentAdvIndex + 1);
            resetAdvAuto();
        });
    }

    // Pause on hover over card
    if (advShowcaseCard) {
        advShowcaseCard.addEventListener('mouseenter', stopAdvAuto);
        advShowcaseCard.addEventListener('mouseleave', startAdvAuto);
    }

    // Start auto cycle
    startAdvAuto();


    // 2. Quality Journey Stage Interaction
    const journeyNodes = document.querySelectorAll('.journey-stage-node');
    const flowFill = document.getElementById('journeyFlowFill');

    journeyNodes.forEach((node, i) => {
        node.addEventListener('mouseenter', () => {
            journeyNodes.forEach(n => n.classList.remove('active'));
            node.classList.add('active');
            if (flowFill) {
                const percent = (i / (journeyNodes.length - 1)) * 100;
                flowFill.style.width = `${percent}%`;
            }
        });
    });


    // 3. Animated Statistics Viewport Counter
    const statCounters = document.querySelectorAll('.counter-animate');
    let countersAnimated = false;

    function runCounters() {
        statCounters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'), 10);
            const suffix = counter.getAttribute('data-suffix') || '';
            const display = counter.getAttribute('data-display');

            if (isNaN(target)) {
                counter.textContent = display;
                return;
            }

            let start = 0;
            const duration = 1600;
            const stepTime = Math.abs(Math.floor(duration / target));
            const timer = setInterval(() => {
                start += Math.ceil(target / 40);
                if (start >= target) {
                    start = target;
                    clearInterval(timer);
                }
                counter.textContent = `${start}${suffix}`;
            }, Math.max(stepTime, 25));
        });
    }

    const statsSection = document.getElementById('trust-numbers');
    if (statsSection && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !countersAnimated) {
                    countersAnimated = true;
                    runCounters();
                }
            });
        }, { threshold: 0.3 });
        observer.observe(statsSection);
    } else {
        runCounters();
    }
});
</script>
@endpush
