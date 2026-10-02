<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'catalogueBook',
    'catalogueBg' => 'assets/images/catalogue-cta-bg.webp'
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
    'catalogueBook',
    'catalogueBg' => 'assets/images/catalogue-cta-bg.webp'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section id="catalogue" class="catalogue-cta-section" style="background-image: url('<?php echo e(asset($catalogueBg)); ?>');">
    <div class="catalogue-cta-overlay"></div>
    <div class="container catalogue-cta-container">
        <div class="row align-items-center g-4">
            <!-- Left: Catalog Cover Image -->
            <div class="col-md-5 col-lg-4 text-center">
                <div class="catalogue-mockup-wrapper">
                    <img src="<?php echo e(asset($catalogueBook)); ?>" alt="Wellnox Latest Product Catalogue" class="catalogue-cover-img" loading="lazy">
                </div>
            </div>

            <!-- Center: Content and Download CTA Button -->
            <div class="col-md-7 col-lg-5">
                <div class="catalogue-info-card">
                    <span class="section-eyebrow">PRODUCT CATALOGUE</span>
                    <h2 class="section-heading mb-2">
                        Download Our<br>
                        <span class="text-gold">Latest Catalogue</span>
                    </h2>
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
                    <p class="section-subtext mb-4">
                        Explore our complete range of drainers, gratings, bathroom accessories and health faucets.
                    </p>
                    <a href="<?php echo e(asset('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf')); ?>" target="_blank" rel="noopener noreferrer" class="btn-primary-wellnox">
                        <span>Download Catalogue</span>
                        <i class="bi bi-download"></i>
                    </a>
                </div>
            </div>

            <!-- Right: Architectural quote matching reference -->
            <div class="col-lg-3 d-none d-lg-block">
                <div class="catalogue-quote-box">
                    <span class="catalogue-quote-decor">“</span>
                    <h3 class="catalogue-quote-title">
                        <span class="quote-word-main">Explore</span>
                        <span class="quote-word-gold">Innovative</span>
                        <span class="quote-word-mid">Designs for</span>
                        <span class="quote-word-highlight">Modern Spaces.</span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\iei\resources\views/components/catalogue-cta.blade.php ENDPATH**/ ?>