<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'theme' => 'light', // 'light' (for cream/white bg) or 'dark' (for charcoal/black bg)
    'align' => 'left'   // 'left' or 'center'
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
    'theme' => 'light', // 'light' (for cream/white bg) or 'dark' (for charcoal/black bg)
    'align' => 'left'   // 'left' or 'center'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="wellnox-drain-divider theme-<?php echo e($theme); ?> align-<?php echo e($align); ?>" aria-hidden="true">
    <div class="drain-channel-box">
        <span class="drain-edge drain-edge-top"></span>
        <div class="drain-slots-wrap">
            <span class="drain-slot slot-1"></span>
            <span class="drain-slot slot-2"></span>
            <span class="drain-slot slot-3"></span>
            <span class="drain-slot slot-4"></span>
            <span class="drain-slot slot-center"></span>
            <span class="drain-slot slot-5"></span>
            <span class="drain-slot slot-6"></span>
            <span class="drain-slot slot-7"></span>
            <span class="drain-slot slot-8"></span>
        </div>
        <span class="drain-edge drain-edge-bottom"></span>
        <div class="drain-flow-pulse"></div>
    </div>
</div>
<?php /**PATH D:\iei\resources\views/components/drain-divider.blade.php ENDPATH**/ ?>