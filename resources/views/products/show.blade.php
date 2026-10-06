@extends('layouts.app')

@section('title', $product->name . ' | Wellnox Architectural Collection')
@section('meta_description', $product->short_description ?: 'Explore specifications and technical dimensions for ' . $product->name . ' by Wellnox.')

@section('content')

    <!-- ==========================================================================
       1. CREATIVE LUXURY ARCHITECTURAL PAGE TITLE & BREADCRUMB HERO
       ========================================================================== -->
    <section class="about-hero-creative position-relative overflow-hidden">
        <!-- Rich Luxury Architectural Background Image with Deep Gradient Mesh & Glows -->
        <div class="about-hero-bg-layer" style="background-image: url('{{ asset('assets/images/why-wellnox-banner.webp') }}');"></div>
        <div class="about-hero-ambient-darkener"></div>
        <div class="about-creative-glow glow-center" aria-hidden="true"></div>
        <div class="about-creative-glow glow-corner glow-corner-left" aria-hidden="true"></div>
        <div class="about-creative-glow glow-corner glow-corner-right" aria-hidden="true"></div>
        <div class="about-creative-grid-overlay" aria-hidden="true"></div>
        
        <!-- Subtle Architectural Floating Watermark -->
        <div class="about-hero-watermark" aria-hidden="true">WELLNOX</div>
        
        <div class="container position-relative z-3">
            <div class="about-hero-creative-inner text-center">
                <!-- Clean Bold Page Title: "Product Details" -->
                <h1 class="about-creative-page-title mb-3">
                    Product <span class="text-gold font-serif">Details</span>
                </h1>

                <!-- Architectural Drain Slotted Accent Divider -->
                <div class="mb-4 d-flex justify-content-center">
                    <x-drain-divider theme="dark" align="center" />
                </div>

                <!-- Sleek Creative Glass Breadcrumb Capsule (Consistent with Why Wellnox / Products) -->
                <div class="d-inline-block">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb creative-glass-breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}" class="breadcrumb-home-link">
                                    <i class="bi bi-house-door-fill text-gold me-1"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="breadcrumb-separator">
                                <i class="bi bi-chevron-right"></i>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('website.products') }}" class="breadcrumb-home-link">
                                    <span>Products</span>
                                </a>
                            </li>
                            @if($product->category)
                                <li class="breadcrumb-separator">
                                    <i class="bi bi-chevron-right"></i>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('website.products', ['category' => $product->category->slug]) }}" class="breadcrumb-home-link">
                                        <span>{{ $product->category->name }}</span>
                                    </a>
                                </li>
                            @endif
                            @if($product->subcategory)
                                <li class="breadcrumb-separator">
                                    <i class="bi bi-chevron-right"></i>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('website.products', ['category' => $product->category->slug, 'subcategory' => $product->subcategory->slug]) }}" class="breadcrumb-home-link">
                                        <span>{{ $product->subcategory->name }}</span>
                                    </a>
                                </li>
                            @endif
                            <li class="breadcrumb-separator">
                                <i class="bi bi-chevron-right"></i>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <span>{{ $product->name }}</span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
       2. UNIFIED PRODUCT SHOWCASE & TECHNICAL DETAILS (CLEAN WHITE SECTION)
       ========================================================================== -->
    <section class="product-detail-unified py-5 bg-white position-relative">
        <div class="container">
            <!-- Top Product Showcase & Configuration Grid -->
            <div class="row g-5 align-items-center">
                <!-- Product Image Viewer & Multi-Image Gallery with Smooth Transitions & Zoom -->
                <div class="col-lg-6">
                    <div class="product-gallery-container">
                        <!-- Main Stage Frame with Smooth Transition & Hover Zoom -->
                        <div class="product-detail-stage-light">
                            <div class="product-detail-frame-light" id="productZoomFrame">
                                <div class="product-zoom-wrapper" id="zoomWrapper">
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-hero-img img-fluid" id="mainProductView">
                                </div>
                            </div>
                        </div>

                        <!-- Multi-image Thumbnails Row (if more than 1 image or single available) -->
                        @php
                            $allImages = $product->all_images;
                        @endphp
                        @if(count($allImages) > 1)
                            <div class="product-thumbnails-strip mt-3 d-flex align-items-center justify-content-center gap-2 flex-wrap">
                                @foreach($allImages as $index => $imgUrl)
                                    <button type="button" class="product-thumb-btn {{ $loop->first ? 'active' : '' }}" data-full-img="{{ $imgUrl }}" aria-label="View product image {{ $index + 1 }}">
                                        <img src="{{ $imgUrl }}" alt="Thumbnail {{ $index + 1 }}" class="img-fluid">
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Product Details & Actions -->
                <div class="col-lg-6">
                    <div class="product-detail-meta-light">
                        <!-- Category / Subcategory hierarchy tags -->
                        <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                            <span class="badge bg-light text-dark border rounded-pill px-3 py-1.5 fw-medium">
                                {{ $product->category ? $product->category->name : 'Unassigned' }}
                            </span>
                            @if($product->subcategory)
                                <span class="badge bg-cream text-gold border border-gold-subtle rounded-pill px-3 py-1.5 fw-medium">
                                    <i class="bi bi-diagram-3 me-1"></i> {{ $product->subcategory->name }}
                                </span>
                            @endif
                        </div>

                        <!-- Product Name Heading Next to Image -->
                        <h2 class="display-6 font-serif text-dark fw-bold mb-3">{{ $product->name }}</h2>

                        <!-- Key Spec Boxes: Size & Color -->
                        <div class="product-key-specs-grid row g-3 mb-4">
                            <!-- Size Box -->
                            <div class="col-sm-6">
                                <div class="spec-card-light">
                                    <div class="spec-icon-light">
                                        <i class="bi bi-rulers"></i>
                                    </div>
                                    <div>
                                        <div class="spec-card-label-light">Size / Dimension</div>
                                        <div class="spec-card-value-light">{{ $product->size ?: 'Standard Sizing' }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Color / Finish Box -->
                            <div class="col-sm-6">
                                <div class="spec-card-light">
                                    <div class="spec-icon-light">
                                        <i class="bi bi-palette"></i>
                                    </div>
                                    <div>
                                        <div class="spec-card-label-light">Color / Finish</div>
                                        <div class="spec-card-value-light {{ $product->color ? 'text-gold' : 'text-dark' }}">
                                            {{ $product->color ?: 'Natural Stainless (No Color)' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Technical Specifications & Description (Merged Directly Into Product Details) -->
                        <div class="product-tech-specs-block pt-3 mt-3 border-top">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <h3 class="h6 text-uppercase fw-bold text-dark tracking-wider mb-1">Technical Specifications</h3>
                            </div>

                            <div class="product-description-content text-secondary small mb-4 mt-0" style="white-space: pre-line; line-height: 1.6;">
                                {{ $product->description ?: 'Precision engineered with certified international standard AISI 304 stainless steel. Designed with inward-folded safety edges, smooth laser cut apertures, and zero-tarnish molecular finish. Suitable for luxury residential bathrooms, boutique hotels, high-end kitchens, and modern utility spaces.' }}
                            </div>
                        </div>

                        <!-- CTA Action -->
                        <div class="pt-2">
                            <a href="{{ route('website.contact') }}?product={{ urlencode($product->name) }}" class="btn-primary-wellnox py-3 px-5 fs-6 d-inline-flex align-items-center gap-2">
                                <span>Request Quote / Trade Pricing</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RELATED PRODUCTS -->
    @if(isset($relatedProducts) && $relatedProducts->isNotEmpty())
        <section class="section-padding bg-white border-top">
            <div class="container">
                <div class="d-flex justify-content-between align-items-end mb-4">
                    <div>
                        <span class="text-gold text-uppercase small fw-bold tracking-wider">COMPLEMENTARY DESIGNS</span>
                        <h3 class="h3 font-serif mb-0 text-dark">Related Products</h3>
                    </div>
                    @if($product->category)
                        <a href="{{ route('website.products', ['category' => $product->category->slug]) }}" class="btn btn-outline-dark rounded-pill px-4 btn-sm">
                            View All in {{ $product->category->name }} <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    @endif
                </div>

                <div class="row g-4">
                    @foreach($relatedProducts as $rel)
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="card h-100 border rounded-4 overflow-hidden shadow-sm product-rel-card">
                                <div class="bg-light p-4 text-center">
                                    <img src="{{ $rel->image_url }}" alt="{{ $rel->name }}" class="img-fluid" style="height: 140px; object-fit: contain;">
                                </div>
                                <div class="card-body p-3 d-flex flex-column justify-content-between">
                                    <div>
                                        <div class="small text-muted mb-1">{{ $rel->subcategory ? $rel->subcategory->name : ($rel->category ? $rel->category->name : '') }}</div>
                                        <h4 class="h6 fw-bold mb-2">
                                            <a href="{{ route('website.products.show', $rel->slug) }}" class="text-dark text-decoration-none">
                                                {{ $rel->name }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center pt-2 border-top mt-2">
                                        <span class="small text-muted">{{ $rel->size ?: 'Standard' }}</span>
                                        <a href="{{ route('website.products.show', $rel->slug) }}" class="text-gold fw-semibold small text-decoration-none">
                                            View Details &rarr;
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection

@push('styles')
<style>
.product-detail-unified {
    background-color: #FFFFFF;
}

.product-detail-stage-light {
    position: relative;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-detail-frame-light {
    background: #FAF7F2;
    border: 1px solid #ECE6DE;
    border-radius: 24px;
    padding: 30px;
    width: 100%;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
    overflow: hidden;
    position: relative;
    cursor: crosshair;
}

.product-zoom-wrapper {
    width: 100%;
    height: 380px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    position: relative;
}

.product-hero-img {
    max-height: 350px;
    max-width: 100%;
    object-fit: contain;
    filter: drop-shadow(0 15px 25px rgba(0, 0, 0, 0.12));
    transition: transform 0.25s cubic-bezier(0.25, 0.46, 0.45, 0.94), opacity 0.3s ease;
    transform-origin: center center;
    will-change: transform;
    user-select: none;
    pointer-events: none;
}

.product-hero-img.image-transitioning {
    opacity: 0;
    transform: scale(0.96);
}

/* Multi-image thumbnail selector */
.product-thumbnails-strip {
    padding: 8px 0;
}

.product-thumb-btn {
    width: 68px;
    height: 68px;
    border-radius: 12px;
    border: 2px solid #E5D5C5;
    background: #FAF7F2;
    padding: 4px;
    cursor: pointer;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.25s ease;
}

.product-thumb-btn img {
    max-height: 100%;
    max-width: 100%;
    object-fit: contain;
    transition: transform 0.25s ease;
}

.product-thumb-btn:hover {
    border-color: var(--primary);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(201, 138, 88, 0.2);
}

.product-thumb-btn:hover img {
    transform: scale(1.08);
}

.product-thumb-btn.active {
    border-color: var(--primary);
    box-shadow: 0 0 0 2px rgba(201, 138, 88, 0.35);
    background: #FFFFFF;
}

.product-guarantee-pill-light {
    position: absolute;
    bottom: 5px;
    left: 50%;
    transform: translateX(-50%);
    background: #FFFFFF;
    border: 1px solid #E5D5C5;
    color: #222222;
    font-size: 12px;
    font-weight: 500;
    padding: 6px 18px;
    border-radius: var(--radius-pill);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
    white-space: nowrap;
    z-index: 5;
    pointer-events: none;
}

.spec-card-light {
    background: #FAF7F2;
    border: 1px solid #ECE6DE;
    border-radius: 12px;
    padding: 14px 16px;
    display: flex;
    align-items: center;
    gap: 14px;
}

.spec-icon-light {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: rgba(201, 138, 88, 0.12);
    color: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}

.spec-card-label-light {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #777777;
    margin-bottom: 2px;
    font-weight: 500;
}

.spec-card-value-light {
    font-size: 14.5px;
    font-weight: 600;
    color: #111111;
}

.bg-cream {
    background-color: #FAF4ED;
}

.border-gold-subtle {
    border-color: rgba(201, 138, 88, 0.3) !important;
}

.product-specs-wrapper {
    background-color: #FAF8F5 !important;
    border: 1px solid #ECE6DE !important;
}

.product-rel-card:hover {
    transform: translateY(-4px);
    transition: transform 0.3s;
    border-color: var(--primary) !important;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const mainImg = document.getElementById('mainProductView');
    const zoomFrame = document.getElementById('productZoomFrame');
    const thumbBtns = document.querySelectorAll('.product-thumb-btn');

    // 1. Thumbnail click with smooth transition
    thumbBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const newSrc = this.getAttribute('data-full-img');
            if (!newSrc || mainImg.src === newSrc) return;

            thumbBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            mainImg.classList.add('image-transitioning');
            setTimeout(() => {
                mainImg.src = newSrc;
                mainImg.onload = () => {
                    mainImg.classList.remove('image-transitioning');
                };
                // Fallback in case image is already cached
                setTimeout(() => mainImg.classList.remove('image-transitioning'), 100);
            }, 180);
        });
    });

    // 2. Interactive smooth zoom on hover
    if (zoomFrame && mainImg) {
        const zoomScale = 1.9;

        zoomFrame.addEventListener('mousemove', function (e) {
            const rect = zoomFrame.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const xPercent = Math.max(0, Math.min(100, (x / rect.width) * 100));
            const yPercent = Math.max(0, Math.min(100, (y / rect.height) * 100));

            mainImg.style.transformOrigin = `${xPercent}% ${yPercent}%`;
            mainImg.style.transform = `scale(${zoomScale})`;
        });

        zoomFrame.addEventListener('mouseleave', function () {
            mainImg.style.transform = 'scale(1)';
            setTimeout(() => {
                mainImg.style.transformOrigin = 'center center';
            }, 250);
        });
    }
});
</script>
@endpush
