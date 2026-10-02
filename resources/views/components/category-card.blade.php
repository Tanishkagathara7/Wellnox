@props([
    'title',
    'subtitle',
    'image',
    'link' => '#',
    'id' => ''
])

<div class="col-12 col-sm-6 col-lg-3">
    <a href="{{ $link }}" class="category-card" id="cat-{{ $id }}">
        <img src="{{ asset($image) }}" alt="{{ $title }}" class="category-card-img" loading="lazy">
        <div class="category-card-overlay"></div>
        <div class="category-card-content">
            <div class="category-card-text">
                <h3 class="category-card-title">{{ $title }}</h3>
                <p class="category-card-desc">{{ $subtitle }}</p>
            </div>
            <div class="category-arrow-btn">
                <i class="bi bi-arrow-right"></i>
            </div>
        </div>
    </a>
</div>
