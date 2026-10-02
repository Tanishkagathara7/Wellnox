<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'factoryImage',
    'stats' => []
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'factoryImage',
    'stats' => []
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section id="company-profile" class="section-padding company-profile-section position-relative overflow-hidden">
   

    <div class="container position-relative z-2">
        <div class="row g-4 g-xl-5 align-items-center">
            <!-- Left: Factory / Facility Photo with rounded corners and decorative luxury accents -->
            <div class="col-lg-6">
                <div class="company-img-wrapper" id="aboutImgWrapper">
                    <img src="<?php echo e(asset($factoryImage)); ?>" alt="Wellnox International Pvt. Ltd." class="company-main-img" loading="lazy">
                    
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

            <!-- Right: Company Profile Details -->
            <div class="col-lg-6 company-content-col">
                <span class="section-eyebrow">COMPANY PROFILE</span>
                <h2 class="company-section-heading mb-2"> <span class="text-gold">Wellnox International</span> Pvt. Ltd.</h2>
                <div class="mb-3">
                    <?php if (isset($component)) { $__componentOriginal3c76581b98a91e63678fa9ee54e0841c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3c76581b98a91e63678fa9ee54e0841c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.drain-divider','data' => ['theme' => 'light','align' => 'left']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('drain-divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['theme' => 'light','align' => 'left']); ?>
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
                
                <p class="company-text-desc mb-4">
                    Founded in 2000, <strong>WELLNOX INTERNATIONAL PVT. LTD.</strong> is a leading manufacturer of architectural overhead rain showers, linear drains, health faucets and bathroom accessories. We combine innovation, quality and aesthetics to deliver products that elevate modern living spaces.
                </p>

                <!-- In-column 4 Stats items with vertical dividers matching reference -->
                <?php if(!empty($stats)): ?>
                    <div class="company-stats-row mb-4">
                        <div class="row g-0 align-items-center">
                            <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-6 col-md-3">
                                    <div class="company-stat-card <?php echo e($index < count($stats) - 1 ? 'has-right-divider' : ''); ?> stat-idx-<?php echo e($index); ?>">
                                        <div class="stat-icon-wrap">
                                            <i class="bi <?php echo e($stat['icon']); ?>"></i>
                                        </div>
                                        <div class="stat-number-text">
                                            <?php if(isset($stat['numeric'])): ?>
                                                <span class="company-stat-counter" data-target="<?php echo e($stat['numeric']); ?>"><?php echo e($stat['numeric']); ?></span><span class="stat-plus-sign">+</span>
                                            <?php else: ?>
                                                <span class="company-stat-text-val"><?php echo e($stat['number']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="stat-label-text"><?php echo e($stat['label']); ?></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <a href="<?php echo e(route('website.about')); ?>" class="btn-primary-wellnox company-btn">
                    <span>Know More About Us</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\wellnox\resources\views/components/company-profile.blade.php ENDPATH**/ ?>