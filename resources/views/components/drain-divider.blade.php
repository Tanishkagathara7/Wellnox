@props([
    'theme' => 'light', // 'light' (for cream/white bg) or 'dark' (for charcoal/black bg)
    'align' => 'left'   // 'left' or 'center'
])

<div class="wellnox-drain-divider theme-{{ $theme }} align-{{ $align }}" aria-hidden="true">
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
