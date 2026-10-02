<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'eyebrow' => null,
    'title',
    'highlight' => null,
    'description' => null,
    'ctaText' => null,
    'ctaLink' => null,
    'align' => 'between'
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
    'eyebrow' => null,
    'title',
    'highlight' => null,
    'description' => null,
    'ctaText' => null,
    'ctaLink' => null,
    'align' => 'between'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="row align-items-end mb-4 mb-lg-5">
    <div class="col-lg-6">
        <?php if($eyebrow): ?>
            <span class="section-eyebrow"><?php echo e($eyebrow); ?></span>
        <?php endif; ?>
        <h2 class="section-heading mb-2">
            <?php echo e($title); ?>

            <?php if($highlight): ?>
                <span class="text-gold"><?php echo e($highlight); ?></span>
            <?php endif; ?>
        </h2>
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
    <?php if($description || $ctaText): ?>
        <div class="col-lg-6 d-flex flex-column flex-md-row align-items-md-center justify-content-lg-end gap-4 mt-3 mt-lg-0">
            <?php if($description): ?>
                <p class="section-subtext mb-0"><?php echo e($description); ?></p>
            <?php endif; ?>
            <?php if($ctaText && $ctaLink): ?>
                <a href="<?php echo e($ctaLink); ?>" class="btn-pill-outline-dark text-nowrap">
                    <span><?php echo e($ctaText); ?></span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\wellnox\resources\views/components/section-title.blade.php ENDPATH**/ ?>