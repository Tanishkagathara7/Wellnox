<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title',
    'subtitle',
    'image',
    'link' => '#',
    'id' => ''
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
    'title',
    'subtitle',
    'image',
    'link' => '#',
    'id' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="col-12 col-sm-6 col-lg-3">
    <a href="<?php echo e($link); ?>" class="category-card" id="cat-<?php echo e($id); ?>">
        <img src="<?php echo e(asset($image)); ?>" alt="<?php echo e($title); ?>" class="category-card-img" loading="lazy">
        <div class="category-card-overlay"></div>
        <div class="category-card-content">
            <div class="category-card-text">
                <h3 class="category-card-title"><?php echo e($title); ?></h3>
                <p class="category-card-desc"><?php echo e($subtitle); ?></p>
            </div>
            <div class="category-arrow-btn">
                <i class="bi bi-arrow-right"></i>
            </div>
        </div>
    </a>
</div>
<?php /**PATH D:\iei\resources\views/components/category-card.blade.php ENDPATH**/ ?>