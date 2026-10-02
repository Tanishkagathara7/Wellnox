@props([
    'eyebrow' => null,
    'title',
    'highlight' => null,
    'description' => null,
    'ctaText' => null,
    'ctaLink' => null,
    'align' => 'between'
])

<div class="row align-items-end mb-4 mb-lg-5">
    <div class="col-lg-6">
        @if($eyebrow)
            <span class="section-eyebrow">{{ $eyebrow }}</span>
        @endif
        <h2 class="section-heading mb-2">
            {{ $title }}
            @if($highlight)
                <span class="text-gold">{{ $highlight }}</span>
            @endif
        </h2>
        <x-drain-divider theme="light" align="left" />
    </div>
    @if($description || $ctaText)
        <div class="col-lg-6 d-flex flex-column flex-md-row align-items-md-center justify-content-lg-end gap-4 mt-3 mt-lg-0">
            @if($description)
                <p class="section-subtext mb-0">{{ $description }}</p>
            @endif
            @if($ctaText && $ctaLink)
                <a href="{{ $ctaLink }}" class="btn-pill-outline-dark text-nowrap">
                    <span>{{ $ctaText }}</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            @endif
        </div>
    @endif
</div>
