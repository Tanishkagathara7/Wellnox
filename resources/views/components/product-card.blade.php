@props([
    'name',
    'grade',
    'image',
    'badge' => null,
    'id' => ''
])

<div class="product-showcase-card" id="prod-{{ $id }}">
    <div class="product-img-holder">
        <img src="{{ \Illuminate\Support\Str::startsWith($image, ['http://', 'https://']) ? $image : asset($image) }}" alt="{{ $name }}" class="product-main-thumb" loading="lazy">
    </div>
    <div class="product-card-body">
        <h4 class="product-card-name">{{ $name }}</h4>
        <p class="product-card-grade">{{ $grade }}</p>
    </div>
</div>
