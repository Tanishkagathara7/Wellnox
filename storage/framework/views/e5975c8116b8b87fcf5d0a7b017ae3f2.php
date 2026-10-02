<?php $__env->startSection('title', 'Wellnox | Complete Bathroom & Drainage Solutions'); ?>

<?php $__env->startSection('content'); ?>

    <!-- 1. HERO SECTION -->
    <?php if (isset($component)) { $__componentOriginal04f02f1e0f152287a127192de01fe241 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal04f02f1e0f152287a127192de01fe241 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.hero','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal04f02f1e0f152287a127192de01fe241)): ?>
<?php $attributes = $__attributesOriginal04f02f1e0f152287a127192de01fe241; ?>
<?php unset($__attributesOriginal04f02f1e0f152287a127192de01fe241); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal04f02f1e0f152287a127192de01fe241)): ?>
<?php $component = $__componentOriginal04f02f1e0f152287a127192de01fe241; ?>
<?php unset($__componentOriginal04f02f1e0f152287a127192de01fe241); ?>
<?php endif; ?>

    <!-- 2. PRODUCT CATEGORY SECTION (COMPLETE BATHROOM SOLUTIONS) -->
    <section id="categories" class="section-padding section-bg-light categories-section">
        <div class="container">
            <?php if (isset($component)) { $__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-title','data' => ['eyebrow' => 'OUR PRODUCTS','title' => 'Complete','highlight' => 'Home Solutions','description' => 'Explore our premium range of bathroom, kitchen and utility products designed for modern living spaces.','ctaText' => 'View All Products','ctaLink' => '#popular-designs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'OUR PRODUCTS','title' => 'Complete','highlight' => 'Home Solutions','description' => 'Explore our premium range of bathroom, kitchen and utility products designed for modern living spaces.','ctaText' => 'View All Products','ctaLink' => '#popular-designs']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78)): ?>
<?php $attributes = $__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78; ?>
<?php unset($__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78)): ?>
<?php $component = $__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78; ?>
<?php unset($__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78); ?>
<?php endif; ?>

            <div class="row g-3 g-lg-4">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginal77343b4405a3e8bf66a7a88cb0d29606 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal77343b4405a3e8bf66a7a88cb0d29606 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.category-card','data' => ['id' => $cat['id'],'title' => $cat['title'],'subtitle' => $cat['subtitle'],'image' => $cat['image'],'link' => $cat['link']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('category-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cat['id']),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cat['title']),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cat['subtitle']),'image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cat['image']),'link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cat['link'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal77343b4405a3e8bf66a7a88cb0d29606)): ?>
<?php $attributes = $__attributesOriginal77343b4405a3e8bf66a7a88cb0d29606; ?>
<?php unset($__attributesOriginal77343b4405a3e8bf66a7a88cb0d29606); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal77343b4405a3e8bf66a7a88cb0d29606)): ?>
<?php $component = $__componentOriginal77343b4405a3e8bf66a7a88cb0d29606; ?>
<?php unset($__componentOriginal77343b4405a3e8bf66a7a88cb0d29606); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- PRECISION IN MOTION (CREATIVE ANIMATED INTERACTIVE PRODUCT SECTION) -->
    <?php if (isset($component)) { $__componentOriginalca768e1fd3615ab8444d5511655a06be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalca768e1fd3615ab8444d5511655a06be = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.precision-in-motion','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('precision-in-motion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalca768e1fd3615ab8444d5511655a06be)): ?>
<?php $attributes = $__attributesOriginalca768e1fd3615ab8444d5511655a06be; ?>
<?php unset($__attributesOriginalca768e1fd3615ab8444d5511655a06be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalca768e1fd3615ab8444d5511655a06be)): ?>
<?php $component = $__componentOriginalca768e1fd3615ab8444d5511655a06be; ?>
<?php unset($__componentOriginalca768e1fd3615ab8444d5511655a06be); ?>
<?php endif; ?>

    <!-- 3. COMPANY PROFILE SECTION -->
    <?php if (isset($component)) { $__componentOriginal5ae1336abcda38c00d54cb709a4ed93d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5ae1336abcda38c00d54cb709a4ed93d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.company-profile','data' => ['factoryImage' => $companyFactoryImage,'stats' => $companyStats]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('company-profile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['factoryImage' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($companyFactoryImage),'stats' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($companyStats)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5ae1336abcda38c00d54cb709a4ed93d)): ?>
<?php $attributes = $__attributesOriginal5ae1336abcda38c00d54cb709a4ed93d; ?>
<?php unset($__attributesOriginal5ae1336abcda38c00d54cb709a4ed93d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5ae1336abcda38c00d54cb709a4ed93d)): ?>
<?php $component = $__componentOriginal5ae1336abcda38c00d54cb709a4ed93d; ?>
<?php unset($__componentOriginal5ae1336abcda38c00d54cb709a4ed93d); ?>
<?php endif; ?>

    <!-- 4. WHY WELLNOX / FEATURES SECTION -->
    <?php if (isset($component)) { $__componentOriginalf67dc3bc3f984190149e50f478986108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf67dc3bc3f984190149e50f478986108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.features','data' => ['bannerImage' => $whyWellnoxBannerImage,'features' => $features]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('features'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['bannerImage' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($whyWellnoxBannerImage),'features' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($features)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf67dc3bc3f984190149e50f478986108)): ?>
<?php $attributes = $__attributesOriginalf67dc3bc3f984190149e50f478986108; ?>
<?php unset($__attributesOriginalf67dc3bc3f984190149e50f478986108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf67dc3bc3f984190149e50f478986108)): ?>
<?php $component = $__componentOriginalf67dc3bc3f984190149e50f478986108; ?>
<?php unset($__componentOriginalf67dc3bc3f984190149e50f478986108); ?>
<?php endif; ?>

    <!-- 5. FEATURED PRODUCTS (MOST POPULAR DESIGNS) -->
    <section id="popular-designs" class="section-padding popular-designs-section">
        <div class="container">
            <?php if (isset($component)) { $__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-title','data' => ['eyebrow' => 'FEATURED PRODUCTS','title' => 'Most Popular','highlight' => 'Designs','description' => 'Explore our premium range of drainers, gratings and bathroom accessories designed to suit every modern space.','ctaText' => 'View All Products','ctaLink' => '#categories']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'FEATURED PRODUCTS','title' => 'Most Popular','highlight' => 'Designs','description' => 'Explore our premium range of drainers, gratings and bathroom accessories designed to suit every modern space.','ctaText' => 'View All Products','ctaLink' => '#categories']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78)): ?>
<?php $attributes = $__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78; ?>
<?php unset($__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78)): ?>
<?php $component = $__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78; ?>
<?php unset($__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78); ?>
<?php endif; ?>

            <!-- Popular Products Carousel Wrapper (Shows 4 cards, scrolls with arrows) -->
            <div class="popular-carousel-wrapper position-relative">
                <div class="popular-carousel-track-container" id="popularCarouselTrack">
                    <div class="row g-3 g-lg-4 flex-nowrap popular-carousel-row">
                        <?php $__currentLoopData = $popularProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-10 col-sm-6 col-lg-3 popular-carousel-item flex-shrink-0">
                                <?php if (isset($component)) { $__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.product-card','data' => ['id' => $prod['id'],'name' => $prod['name'],'grade' => $prod['grade'],'image' => $prod['image'],'badge' => $prod['badge']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($prod['id']),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($prod['name']),'grade' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($prod['grade']),'image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($prod['image']),'badge' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($prod['badge'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a)): ?>
<?php $attributes = $__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a; ?>
<?php unset($__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a)): ?>
<?php $component = $__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a; ?>
<?php unset($__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a); ?>
<?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <?php if (isset($component)) { $__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-title','data' => ['eyebrow' => 'EXCELLENCE IN CRAFTSMANSHIP','title' => 'Our 10-Stage Precision','highlight' => 'Process','description' => 'From certified AISI 304 raw coils to mirror-finished architectural drainers, witness the precision engineering behind every Wellnox masterpiece.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'EXCELLENCE IN CRAFTSMANSHIP','title' => 'Our 10-Stage Precision','highlight' => 'Process','description' => 'From certified AISI 304 raw coils to mirror-finished architectural drainers, witness the precision engineering behind every Wellnox masterpiece.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78)): ?>
<?php $attributes = $__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78; ?>
<?php unset($__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78)): ?>
<?php $component = $__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78; ?>
<?php unset($__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78); ?>
<?php endif; ?>

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
                            <?php $__currentLoopData = $processSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="stage-flow-card <?php echo e($index === 0 ? 'active' : ''); ?>" 
                                     data-stage-index="<?php echo e($index); ?>"
                                     data-step="<?php echo e($step['step']); ?>"
                                     data-name="<?php echo e($step['name']); ?>"
                                     data-tag="<?php echo e($step['tag'] ?? 'Process Stage'); ?>"
                                     data-desc="<?php echo e($step['desc']); ?>"
                                     data-icon="<?php echo e($step['icon'] ?? 'bi-gear'); ?>"
                                     data-metric="<?php echo e($step['metric'] ?? 'Quality Assured'); ?>"
                                     tabindex="0"
                                     role="button"
                                     aria-label="View <?php echo e($step['name']); ?>">
                                    
                                    <div class="stage-card-indicator">
                                        <span class="stage-indicator-num"><?php echo e($step['step']); ?></span>
                                        <div class="stage-active-line"></div>
                                    </div>

                                    <div class="stage-card-content">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <h4 class="stage-card-title mb-0"><?php echo e($step['name']); ?></h4>
                                            <span class="stage-card-tag d-none d-sm-inline-block"><?php echo e($step['tag'] ?? ''); ?></span>
                                        </div>
                                        <p class="stage-card-brief text-truncate mb-0"><?php echo e($step['desc']); ?></p>
                                    </div>

                                    <div class="stage-card-icon-wrap">
                                        <i class="bi <?php echo e($step['icon'] ?? 'bi-gear'); ?>"></i>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- 9. CATALOGUE CTA SECTION -->
    <?php if (isset($component)) { $__componentOriginal3cd537f5bfae8f1f9b6654c431f66ba6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3cd537f5bfae8f1f9b6654c431f66ba6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.catalogue-cta','data' => ['catalogueBook' => $catalogueBookImage,'catalogueBg' => $catalogueBgImage]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('catalogue-cta'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['catalogueBook' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($catalogueBookImage),'catalogueBg' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($catalogueBgImage)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3cd537f5bfae8f1f9b6654c431f66ba6)): ?>
<?php $attributes = $__attributesOriginal3cd537f5bfae8f1f9b6654c431f66ba6; ?>
<?php unset($__attributesOriginal3cd537f5bfae8f1f9b6654c431f66ba6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3cd537f5bfae8f1f9b6654c431f66ba6)): ?>
<?php $component = $__componentOriginal3cd537f5bfae8f1f9b6654c431f66ba6; ?>
<?php unset($__componentOriginal3cd537f5bfae8f1f9b6654c431f66ba6); ?>
<?php endif; ?>

    <!-- 10. REQUEST A CUSTOM QUOTE / CATALOGUE FORM -->
    <?php if (isset($component)) { $__componentOriginal241911271789f94f7a36c3bf47855879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal241911271789f94f7a36c3bf47855879 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.request-quote','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('request-quote'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal241911271789f94f7a36c3bf47855879)): ?>
<?php $attributes = $__attributesOriginal241911271789f94f7a36c3bf47855879; ?>
<?php unset($__attributesOriginal241911271789f94f7a36c3bf47855879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal241911271789f94f7a36c3bf47855879)): ?>
<?php $component = $__componentOriginal241911271789f94f7a36c3bf47855879; ?>
<?php unset($__componentOriginal241911271789f94f7a36c3bf47855879); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\wellnox\resources\views/home.blade.php ENDPATH**/ ?>