<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name',
    'grade',
    'image',
    'badge' => null,
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
    'name',
    'grade',
    'image',
    'badge' => null,
    'id' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="product-showcase-card" id="prod-<?php echo e($id); ?>">
    <div class="product-img-holder">
        <img src="<?php echo e(\Illuminate\Support\Str::startsWith($image, ['http://', 'https://']) ? $image : asset($image)); ?>" alt="<?php echo e($name); ?>" class="product-main-thumb" loading="lazy">
    </div>
    <div class="product-card-body">
        <h4 class="product-card-name"><?php echo e($name); ?></h4>
        <p class="product-card-grade"><?php echo e($grade); ?></p>
    </div>
</div>
<?php /**PATH D:\iei\resources\views/components/product-card.blade.php ENDPATH**/ ?>