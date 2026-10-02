
<section id="precision-motion" class="precision-motion-section position-relative overflow-hidden" aria-label="Precision in Motion">
    <!-- Ambient luxury background layers -->
    <div class="pm-bg-texture" aria-hidden="true"></div>
    <div class="pm-ambient-glow pm-glow-top" aria-hidden="true"></div>
    <div class="pm-ambient-glow pm-glow-bottom" aria-hidden="true"></div>
    <div class="pm-subtle-grid" aria-hidden="true"></div>

    <!-- Background Giant Architectural Marquee Running Line Animation -->
    <div class="pm-marquee-wrap" aria-hidden="true">
        <div class="pm-marquee-track pm-marquee-track-ltr">
            <span class="pm-marquee-phrase">PRECISION IN MOTION <span class="pm-marquee-star">✦</span> AISI 304 STAINLESS STEEL <span class="pm-marquee-star">✦</span> HYDRODYNAMIC FLOW <span class="pm-marquee-star">✦</span> ARCHITECTURAL LUXURY <span class="pm-marquee-star">✦</span> CRAFTED IN INDIA <span class="pm-marquee-star">✦</span></span>
            <span class="pm-marquee-phrase">PRECISION IN MOTION <span class="pm-marquee-star">✦</span> AISI 304 STAINLESS STEEL <span class="pm-marquee-star">✦</span> HYDRODYNAMIC FLOW <span class="pm-marquee-star">✦</span> ARCHITECTURAL LUXURY <span class="pm-marquee-star">✦</span> CRAFTED IN INDIA <span class="pm-marquee-star">✦</span></span>
            <span class="pm-marquee-phrase">PRECISION IN MOTION <span class="pm-marquee-star">✦</span> AISI 304 STAINLESS STEEL <span class="pm-marquee-star">✦</span> HYDRODYNAMIC FLOW <span class="pm-marquee-star">✦</span> ARCHITECTURAL LUXURY <span class="pm-marquee-star">✦</span> CRAFTED IN INDIA <span class="pm-marquee-star">✦</span></span>
            <span class="pm-marquee-phrase">PRECISION IN MOTION <span class="pm-marquee-star">✦</span> AISI 304 STAINLESS STEEL <span class="pm-marquee-star">✦</span> HYDRODYNAMIC FLOW <span class="pm-marquee-star">✦</span> ARCHITECTURAL LUXURY <span class="pm-marquee-star">✦</span> CRAFTED IN INDIA <span class="pm-marquee-star">✦</span></span>
        </div>
    </div>

    <div class="container position-relative z-2">
        
        <!-- Top Section Header -->
        <div class="pm-header-wrap text-center mb-5 pb-lg-2">
            <!-- Small eyebrow pill -->
            <div class="pm-eyebrow-pill d-inline-flex align-items-center gap-2 mb-3">
                <span class="pm-pulse-dot"></span>
                <span class="pm-eyebrow-text">ENGINEERED FOR BETTER FLOW</span>
            </div>

            <!-- Main Heading with Bronze Accent -->
            <h2 class="pm-main-heading font-serif">
                Where Precision <br class="d-none d-sm-inline">
                Meets <span class="pm-bronze-highlight">Performance</span>
            </h2>

            <!-- Expanding Bronze Accent Rule & Architectural Drain Divider -->
            <div class="pm-accent-line-wrap mx-auto my-3">
                <div class="pm-accent-line" id="pmAccentLine"></div>
            </div>
            <div class="mb-3">
                <?php if (isset($component)) { $__componentOriginal3c76581b98a91e63678fa9ee54e0841c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3c76581b98a91e63678fa9ee54e0841c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.drain-divider','data' => ['theme' => 'dark','align' => 'center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('drain-divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['theme' => 'dark','align' => 'center']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3c76581b98a91e63678fa9ee54e0841c)): ?>
<?php $attributes = $__attributesOriginal3c76581b98a91e63678fa9ee54e0841c; ?>
<?php unset($__attributesOriginal3c76581b98a91e63678fa9ee54e0841c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3c76581b98a91e63678fa9ee54e0841c)): ?>
<?php $component = $__componentOriginal3c76581b98a91e63678fa9ee54e0841c; ?>
<?php unset($__componentOriginal3c76581b98a91e63678fa9ee54e0841c); ?>
<?php endif; ?>
            </div>

            <!-- Description -->
            <p class="pm-lead-desc mx-auto">
                Every WELLNOX solution is engineered to combine refined design, reliable performance and effortless everyday functionality.
            </p>
        </div>

        <!-- Main Interactive Core: Split Desktop Layout (Left Feature Cards + Right Linear Drain Visual) -->
        <div class="row g-4 g-xl-5 align-items-center pm-stage-row">
            
            <!-- Left Column: Feature Cards (01, 02) & Dynamic Engineering Info -->
            <div class="col-lg-5 order-2 order-lg-1 pm-features-col">
                <div class="pm-feature-cards-grid">
                    
                    <!-- Feature Card 01 -->
                    <div class="pm-feature-card pm-glass-card" data-step="01">
                        <div class="pm-card-top d-flex justify-content-between align-items-center mb-2">
                            <span class="pm-step-num">01</span>
                            <div class="pm-card-icon-wrap">
                                <i class="bi bi-rulers"></i>
                            </div>
                        </div>
                        <h3 class="pm-card-title">PRECISION ENGINEERED</h3>
                        <p class="pm-card-text">
                            Designed for accurate fit, laser-calibrated gradients and reliable continuous performance.
                        </p>
                        <div class="pm-card-accent-bar"></div>
                    </div>

                    <!-- Feature Card 02 -->
                    <div class="pm-feature-card pm-glass-card" data-step="02">
                        <div class="pm-card-top d-flex justify-content-between align-items-center mb-2">
                            <span class="pm-step-num">02</span>
                            <div class="pm-card-icon-wrap">
                                <i class="bi bi-water"></i>
                            </div>
                        </div>
                        <h3 class="pm-card-title">EFFICIENT FLOW</h3>
                        <p class="pm-card-text">
                            Engineered for smooth and effective water drainage with rapid 60L/min certified discharge rate.
                        </p>
                        <div class="pm-card-accent-bar"></div>
                    </div>

                    <!-- Feature Card 03 -->
                    <div class="pm-feature-card pm-glass-card" data-step="03">
                        <div class="pm-card-top d-flex justify-content-between align-items-center mb-2">
                            <span class="pm-step-num">03</span>
                            <div class="pm-card-icon-wrap">
                                <i class="bi bi-shield-check"></i>
                            </div>
                        </div>
                        <h3 class="pm-card-title">PREMIUM MATERIAL</h3>
                        <p class="pm-card-text">
                            Built using durable AISI 304/316 austenitic stainless-steel construction with anti-rust guarantee.
                        </p>
                        <div class="pm-card-accent-bar"></div>
                    </div>

                    <!-- Feature Card 04 -->
                    <div class="pm-feature-card pm-glass-card" data-step="04">
                        <div class="pm-card-top d-flex justify-content-between align-items-center mb-2">
                            <span class="pm-step-num">04</span>
                            <div class="pm-card-icon-wrap">
                                <i class="bi bi-gem"></i>
                            </div>
                        </div>
                        <h3 class="pm-card-title">TIMELESS DESIGN</h3>
                        <p class="pm-card-text">
                            Minimal aesthetics, barefoot safety bevels and architectural luxury designed for modern spaces.
                        </p>
                        <div class="pm-card-accent-bar"></div>
                    </div>

                </div>
            </div>

            <!-- Right Column: Interactive 3D Product Visual with Animated Water-Flow Effect -->
            <div class="col-lg-7 order-1 order-lg-2 pm-visual-col">
                <div class="pm-product-stage position-relative" id="pmProductStage">
                    
                    <!-- Outer Ambient Bronze Glow Sphere -->
                    <div class="pm-product-glow-orb" id="pmProductGlow"></div>

                    <!-- 3D Card Vessel -->
                    <div class="pm-product-card-vessel" id="pmTiltTarget">
                        
                        <!-- Floating Spec Badges -->
                        <div class="pm-floating-spec pm-spec-top">
                            <span class="pm-spec-dot"></span>
                            <span class="pm-spec-label">AISI 304 Certified Stainless Steel</span>
                        </div>

                        <div class="pm-floating-spec pm-spec-bottom">
                            <i class="bi bi-droplet-fill text-gold me-1"></i>
                            <span class="pm-spec-label">60L / Min High Flow Vortex</span>
                        </div>

                        <!-- Main Drain Image Canvas Wrapper -->
                        <div class="pm-image-wrapper">
                            <img 
                                src="<?php echo e(asset('assets/images/popular-product/2.webp')); ?>" 
                                alt="Wellnox Luxury AISI 304 Linear Shower Channel Drainer" 
                                class="pm-main-product-img" 
                                id="pmProductImg"
                                loading="lazy"
                            >

                            <!-- Sub-Surface Realistic Water Flow Simulation Overlay -->
                            <div class="pm-water-flow-overlay" id="pmWaterOverlay" aria-hidden="true">
                                <!-- Wave Ribbon 1 (Primary Flow) -->
                                <div class="pm-flow-stream pm-stream-primary"></div>
                                <!-- Wave Ribbon 2 (Specular Highlight / Shimmer) -->
                                <div class="pm-flow-stream pm-stream-shimmer"></div>
                                <!-- Wave Ribbon 3 (Micro-ripple droplets) -->
                                <div class="pm-flow-stream pm-stream-ripples"></div>
                                
                                <!-- Caustic Light Highlights -->
                                <div class="pm-water-caustics"></div>
                            </div>

                            <!-- Metallic Sheen Reflection Beam -->
                            <div class="pm-metallic-sweep" aria-hidden="true"></div>
                        </div>

                        <!-- Micro Interactive Status Bar -->
                        <div class="pm-product-footer-bar d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-2">
                                <span class="pm-status-live-dot"></span>
                                <span class="pm-status-text">HYDRODYNAMIC DRAINAGE SIMULATION</span>
                            </div>
                            <div class="pm-status-grade">WELLNOX ARCHITECTURAL</div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Center Statistics Row: 4 Pillars with Viewport Counting -->
        <div class="pm-stats-section-wrap mt-5 pt-lg-3">
            <div class="pm-stats-container">
                <div class="row g-3 g-md-0 align-items-center justify-content-center pm-stats-row">
                    
                    <!-- Stat 1 -->
                    <div class="col-6 col-md-3">
                        <div class="pm-stat-box pm-stat-divider">
                            <div class="pm-stat-num-wrap">
                                <span class="pm-stat-number" data-target="20">20</span><span class="pm-stat-plus">+</span>
                            </div>
                            <div class="pm-stat-label">Years of Experience</div>
                        </div>
                    </div>

                    <!-- Stat 2 -->
                    <div class="col-6 col-md-3">
                        <div class="pm-stat-box pm-stat-divider">
                            <div class="pm-stat-num-wrap">
                                <span class="pm-stat-text-val">Premium</span>
                            </div>
                            <div class="pm-stat-label">Stainless Steel</div>
                        </div>
                    </div>

                    <!-- Stat 3 -->
                    <div class="col-6 col-md-3">
                        <div class="pm-stat-box pm-stat-divider">
                            <div class="pm-stat-num-wrap">
                                <span class="pm-stat-text-val">Modern</span>
                            </div>
                            <div class="pm-stat-label">Design</div>
                        </div>
                    </div>

                    <!-- Stat 4 -->
                    <div class="col-6 col-md-3">
                        <div class="pm-stat-box">
                            <div class="pm-stat-num-wrap">
                                <span class="pm-stat-text-val">Reliable</span>
                            </div>
                            <div class="pm-stat-label">Performance</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Edge-to-Edge Continuous Architectural Running Marquee Line -->
    <div class="pm-bottom-ticker-wrap mt-5 pt-3" aria-hidden="true">
        <div class="pm-bottom-ticker-track">
            <span class="pm-ticker-item"><i class="bi bi-water text-gold me-2"></i> CONTINUOUS GRAVITATIONAL DRAINAGE <span class="pm-ticker-sep">&bull;</span></span>
            <span class="pm-ticker-item"><i class="bi bi-shield-check text-gold me-2"></i> 100% AISI 304 AUSTENITIC STEEL <span class="pm-ticker-sep">&bull;</span></span>
            <span class="pm-ticker-item"><i class="bi bi-gear-wide-connected text-gold me-2"></i> ZERO CLOGGING VORTEX DRAIN <span class="pm-ticker-sep">&bull;</span></span>
            <span class="pm-ticker-item"><i class="bi bi-award text-gold me-2"></i> ARCHITECTURAL SPECIFICATION STANDARD <span class="pm-ticker-sep">&bull;</span></span>
            <span class="pm-ticker-item"><i class="bi bi-gem text-gold me-2"></i> 20+ YEARS LUXURY CRAFTSMANSHIP <span class="pm-ticker-sep">&bull;</span></span>
            <span class="pm-ticker-item"><i class="bi bi-water text-gold me-2"></i> CONTINUOUS GRAVITATIONAL DRAINAGE <span class="pm-ticker-sep">&bull;</span></span>
            <span class="pm-ticker-item"><i class="bi bi-shield-check text-gold me-2"></i> 100% AISI 304 AUSTENITIC STEEL <span class="pm-ticker-sep">&bull;</span></span>
            <span class="pm-ticker-item"><i class="bi bi-gear-wide-connected text-gold me-2"></i> ZERO CLOGGING VORTEX DRAIN <span class="pm-ticker-sep">&bull;</span></span>
            <span class="pm-ticker-item"><i class="bi bi-award text-gold me-2"></i> ARCHITECTURAL SPECIFICATION STANDARD <span class="pm-ticker-sep">&bull;</span></span>
            <span class="pm-ticker-item"><i class="bi bi-gem text-gold me-2"></i> 20+ YEARS LUXURY CRAFTSMANSHIP <span class="pm-ticker-sep">&bull;</span></span>
        </div>
    </div>
</section>
<?php /**PATH D:\iei\resources\views/components/precision-in-motion.blade.php ENDPATH**/ ?>