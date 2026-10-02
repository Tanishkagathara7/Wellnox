@extends('layouts.app')

@section('title', 'Wellnox | Complete Bathroom & Drainage Solutions')

@section('content')

    <!-- 1. HERO SECTION -->
    <x-hero />

    <!-- 2. PRODUCT CATEGORY SECTION (COMPLETE BATHROOM SOLUTIONS) -->
    <section id="categories" class="section-padding section-bg-light categories-section">
        <div class="container">
            <x-section-title 
                eyebrow="OUR PRODUCTS"
                title="Complete"
                highlight="Home Solutions"
                description="Explore our premium range of bathroom, kitchen and utility products designed for modern living spaces."
                ctaText="View All Products"
                ctaLink="#popular-designs"
            />

            <div class="row g-3 g-lg-4">
                @foreach($categories as $cat)
                    <x-category-card 
                        :id="$cat['id']"
                        :title="$cat['title']"
                        :subtitle="$cat['subtitle']"
                        :image="$cat['image']"
                        :link="$cat['link']"
                    />
                @endforeach
            </div>
        </div>
    </section>

    <!-- PRECISION IN MOTION (CREATIVE ANIMATED INTERACTIVE PRODUCT SECTION) -->
    <x-precision-in-motion />

    <!-- 3. COMPANY PROFILE SECTION -->
    <x-company-profile 
        :factoryImage="$companyFactoryImage" 
        :stats="$companyStats" 
    />

    <!-- 4. WHY WELLNOX / FEATURES SECTION -->
    <x-features 
        :bannerImage="$whyWellnoxBannerImage" 
        :features="$features" 
    />

    <!-- 5. FEATURED PRODUCTS (MOST POPULAR DESIGNS) -->
    <section id="popular-designs" class="section-padding popular-designs-section">
        <div class="container">
            <x-section-title 
                eyebrow="FEATURED PRODUCTS"
                title="Most Popular"
                highlight="Designs"
                description="Explore our premium range of drainers, gratings and bathroom accessories designed to suit every modern space."
                ctaText="View All Products"
                ctaLink="#categories"
            />

            <!-- Popular Products Carousel Wrapper (Shows 4 cards, scrolls with arrows) -->
            <div class="popular-carousel-wrapper position-relative">
                <div class="popular-carousel-track-container" id="popularCarouselTrack">
                    <div class="row g-3 g-lg-4 flex-nowrap popular-carousel-row">
                        @foreach($popularProducts as $prod)
                            <div class="col-10 col-sm-6 col-lg-3 popular-carousel-item flex-shrink-0">
                                <x-product-card 
                                    :id="$prod['id']"
                                    :name="$prod['name']"
                                    :grade="$prod['grade']"
                                    :image="$prod['image']"
                                    :badge="$prod['badge']"
                                />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Carousel Nav Controls -->
            <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
                <button class="carousel-nav-btn prev-popular-btn" type="button" aria-label="Previous Products" id="prevPopularBtn">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <button class="carousel-nav-btn next-popular-btn" type="button" aria-label="Next Products" id="nextPopularBtn">
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>
    </section>



    <!-- 8. PRODUCT QUALITY / MANUFACTURING (10-STAGE PRECISION PROCESS SHOWCASE) -->
    <section id="manufacturing" class="section-padding manufacturing-showcase-section">
        <div class="container">
            <x-section-title 
                eyebrow="EXCELLENCE IN CRAFTSMANSHIP"
                title="Our 10-Stage Precision"
                highlight="Process"
                description="From certified AISI 304 raw coils to mirror-finished architectural drainers, witness the precision engineering behind every Wellnox masterpiece."
            />

            <!-- Luxury Split Showcase: Interactive Stage Dial/Spotlight on Left + Step Navigation on Right -->
            <div class="process-spotlight-wrapper">
                <div class="row g-4 g-xl-5 align-items-center">
                    
                    <!-- Left: Spotlight Featured Stage Card -->
                    <div class="col-lg-5 col-xl-5">
                        <div class="spotlight-stage-card">
                            <div class="spotlight-card-header d-flex justify-content-between align-items-center">
                                <span class="spotlight-tag" id="spotlightTag">AISI 304 / 316 Grade</span>
                                <span class="spotlight-badge" id="spotlightStepNum">STAGE 01</span>
                            </div>

                            <div class="spotlight-visual-zone">
                                <div class="spotlight-ring-pulse"></div>
                                <div class="spotlight-icon-orb" id="spotlightIconOrb">
                                    <i class="bi bi-shield-check" id="spotlightIcon"></i>
                                </div>
                                <div class="spotlight-metric-pill" id="spotlightMetric">100% Verified Quality</div>
                            </div>

                            <div class="spotlight-card-body">
                                <h3 class="spotlight-title" id="spotlightTitle">Raw Material Selection</h3>
                                <p class="spotlight-desc" id="spotlightDesc">
                                    Certified high-tensile stainless steel sheets undergo spectroscopic verification for maximum corrosion resistance and durability.
                                </p>
                            </div>

                            <!-- Integrated Progress Bar & Quick Controls -->
                            <div class="spotlight-card-footer">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="spotlight-progress-text">Manufacturing Pipeline</span>
                                    <strong class="text-gold font-serif" id="spotlightProgressRatio">1 / 10</strong>
                                </div>
                                <div class="spotlight-progress-track">
                                    <div class="spotlight-progress-bar" id="spotlightProgressBar" style="width: 10%;"></div>
                                </div>
                                
                                <div class="spotlight-actions d-flex justify-content-between align-items-center mt-3">
                                    <div class="spotlight-counter small text-muted">
                                        <i class="bi bi-clock-history me-1"></i>
                                        <span id="autoPlayStatus">Auto playing</span>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn-spotlight-ctrl" id="prevStageBtn" aria-label="Previous Stage">
                                            <i class="bi bi-arrow-left"></i>
                                        </button>
                                        <button type="button" class="btn-spotlight-ctrl play-pause" id="togglePlayStageBtn" aria-label="Pause Auto Play">
                                            <i class="bi bi-pause-fill" id="playStageIcon"></i>
                                        </button>
                                        <button type="button" class="btn-spotlight-ctrl" id="nextStageBtn" aria-label="Next Stage">
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Interactive 10-Step Architecture Grid / Flow List -->
                    <div class="col-lg-7 col-xl-7">
                        <div class="stages-flow-grid">
                            @foreach($processSteps as $index => $step)
                                <div class="stage-flow-card {{ $index === 0 ? 'active' : '' }}" 
                                     data-stage-index="{{ $index }}"
                                     data-step="{{ $step['step'] }}"
                                     data-name="{{ $step['name'] }}"
                                     data-tag="{{ $step['tag'] ?? 'Process Stage' }}"
                                     data-desc="{{ $step['desc'] }}"
                                     data-icon="{{ $step['icon'] ?? 'bi-gear' }}"
                                     data-metric="{{ $step['metric'] ?? 'Quality Assured' }}"
                                     tabindex="0"
                                     role="button"
                                     aria-label="View {{ $step['name'] }}">
                                    
                                    <div class="stage-card-indicator">
                                        <span class="stage-indicator-num">{{ $step['step'] }}</span>
                                        <div class="stage-active-line"></div>
                                    </div>

                                    <div class="stage-card-content">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <h4 class="stage-card-title mb-0">{{ $step['name'] }}</h4>
                                            <span class="stage-card-tag d-none d-sm-inline-block">{{ $step['tag'] ?? '' }}</span>
                                        </div>
                                        <p class="stage-card-brief text-truncate mb-0">{{ $step['desc'] }}</p>
                                    </div>

                                    <div class="stage-card-icon-wrap">
                                        <i class="bi {{ $step['icon'] ?? 'bi-gear' }}"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- 9. CATALOGUE CTA SECTION -->
    <x-catalogue-cta :catalogueBook="$catalogueBookImage" :catalogueBg="$catalogueBgImage" />

    <!-- 10. REQUEST A CUSTOM QUOTE / CATALOGUE FORM -->
    <x-request-quote />

@endsection
