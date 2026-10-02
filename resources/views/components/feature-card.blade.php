@props([
    'icon',
    'title',
    'desc'
])

<div class="col-6 col-md-4 col-lg-2">
    <div class="feature-pill-card">
        <div class="feature-pill-icon">
            <i class="bi {{ $icon }}"></i>
        </div>
        <h4 class="feature-pill-title">{{ $title }}</h4>
        <p class="feature-pill-desc">{{ $desc }}</p>
    </div>
</div>
