@extends('layouts.app')

@section('title', $product->name . ' | Wellnox Architectural Collection')
@section('meta_description', $product->short_description ?: 'Explore specifications and technical dimensions for ' . $product->name . ' by Wellnox.')

@section('content')

    <!-- PRODUCT DETAIL HERO / SPECS BANNER -->
    <section class="product-detail-hero py-5 bg-dark text-white position-relative overflow-hidden">
        <div class="product-hero-glow"></div>
        <div class="container position-relative z-2">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb luxury-breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('website.products') }}">Products</a></li>
                    @if($product->category)
                        <li class="breadcrumb-item">
                            <a href="{{ route('website.products', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a>
                        </li>
                    @endif
                    @if($product->subcategory)
                        <li class="breadcrumb-item">
                            <a href="{{ route('website.products', ['category' => $product->category->slug, 'subcategory' => $product->subcategory->slug]) }}">{{ $product->subcategory->name }}</a>
                        </li>
                    @endif
                    <li class="breadcrumb-item active text-gold" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>

            <div class="row g-5 align-items-center">
                <!-- Product Image Viewer -->
                <div class="col-lg-6">
                    <div class="product-detail-stage">
                        <div class="product-detail-frame">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-hero-img img-fluid" id="mainProductView">
                        </div>
                        <div class="detail-ambient-ring"></div>
                        
                        <!-- Floating Quality Guarantee Badge -->
                        <div class="product-guarantee-pill">
                            <i class="bi bi-patch-check-fill text-gold me-1"></i> Certified AISI 304 Stainless Steel
                        </div>
                    </div>
                </div>

                <!-- Product Content & Specifications -->
                <div class="col-lg-6">
                    <div class="product-detail-meta">
                        <!-- Category / Subcategory hierarchy tags -->
                        <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                            <span class="badge bg-secondary text-white rounded-pill px-3 py-1.5">
                                {{ $product->category ? $product->category->name : 'Unassigned' }}
                            </span>
                            @if($product->subcategory)
                                <span class="badge bg-dark border border-secondary text-gold rounded-pill px-3 py-1.5">
                                    <i class="bi bi-diagram-3 me-1"></i> {{ $product->subcategory->name }}
                                </span>
                            @endif
                        </div>

                        <h1 class="display-5 font-serif text-white fw-bold mb-3">{{ $product->name }}</h1>

                        @if($product->short_description)
                            <p class="lead text-white-50 mb-4">{{ $product->short_description }}</p>
                        @endif

                        <!-- Key Spec Boxes: Size & Color -->
                        <div class="product-key-specs-grid row g-3 mb-4">
                            <!-- Size Box -->
                            <div class="col-sm-6">
                                <div class="spec-card">
                                    <div class="spec-icon">
                                        <i class="bi bi-rulers"></i>
                                    </div>
                                    <div>
                                        <div class="spec-card-label">Size / Dimension</div>
                                        <div class="spec-card-value">{{ $product->size ?: 'Standard Sizing' }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Color / Finish Box -->
                            <div class="col-sm-6">
                                <div class="spec-card">
                                    <div class="spec-icon">
                                        <i class="bi bi-palette"></i>
                                    </div>
                                    <div>
                                        <div class="spec-card-label">Color / Finish</div>
                                        <div class="spec-card-value {{ $product->color ? 'text-gold' : 'text-white-50' }}">
                                            {{ $product->color ?: 'Natural Stainless (No Color)' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Actions -->
                        <div class="d-flex align-items-center gap-3 flex-wrap pt-2">
                            <a href="{{ route('website.contact') }}?product={{ urlencode($product->name) }}" class="btn-primary-wellnox py-3 px-4 fs-6">
                                <span>Request Quote / Trade Pricing</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            <a href="{{ asset('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-light rounded-pill py-3 px-4">
                                <i class="bi bi-download me-1"></i> Download Catalog PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FULL TECHNICAL SPECIFICATIONS & DETAILS -->
    <section class="section-padding bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                        <div class="border-bottom pb-3 mb-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <h2 class="h4 font-serif text-dark mb-0">Technical Specifications &amp; Material Quality</h2>
                            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">Model: <code>{{ $product->slug }}</code></span>
                        </div>

                        <div class="product-description-content text-secondary fs-6 mb-5" style="white-space: pre-line; line-height: 1.8;">
                            {{ $product->description ?: 'Precision engineered with certified international standard AISI 304 stainless steel. Designed with inward-folded safety edges, smooth laser cut apertures, and zero-tarnish molecular finish. Suitable for luxury residential bathrooms, boutique hotels, high-end kitchens, and modern utility spaces.' }}
                        </div>

                        <!-- Feature highlights grid -->
                        <div class="row g-4 pt-3 border-top">
                            <div class="col-md-4">
                                <div class="d-flex gap-3">
                                    <i class="bi bi-shield-check text-gold fs-3"></i>
                                    <div>
                                        <h4 class="h6 fw-bold mb-1">AISI 304 / 316 Grade</h4>
                                        <p class="small text-muted mb-0">Highest rust resistance for humid wet environments.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex gap-3">
                                    <i class="bi bi-person-check text-gold fs-3"></i>
                                    <div>
                                        <h4 class="h6 fw-bold mb-1">Folded Safety Edges</h4>
                                        <p class="small text-muted mb-0">100% barefoot safe with zero sharp corners or burrs.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex gap-3">
                                    <i class="bi bi-recycle text-gold fs-3"></i>
                                    <div>
                                        <h4 class="h6 fw-bold mb-1">Eco-Friendly &amp; Recyclable</h4>
                                        <p class="small text-muted mb-0">100% sustainable recyclable architectural metallurgy.</p>
                                    </div>
                                </div>
                            </div>
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
.product-detail-hero {
    background-color: #0F1013;
    padding-top: 100px;
}

.product-hero-glow {
    position: absolute;
    width: 450px;
    height: 450px;
    top: 10%;
    left: 10%;
    background: radial-gradient(circle, rgba(201, 138, 88, 0.2) 0%, transparent 70%);
    pointer-events: none;
}

.product-detail-stage {
    position: relative;
    padding: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-detail-frame {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.06) 0%, rgba(255, 255, 255, 0.01) 100%);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 24px;
    padding: 40px;
    backdrop-filter: blur(10px);
    width: 100%;
    text-align: center;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
}

.product-hero-img {
    max-height: 340px;
    object-fit: contain;
    filter: drop-shadow(0 15px 25px rgba(0, 0, 0, 0.35));
}

.product-guarantee-pill {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(17, 17, 17, 0.9);
    border: 1px solid rgba(201, 138, 88, 0.4);
    color: #FFFFFF;
    font-size: 12px;
    padding: 6px 16px;
    border-radius: var(--radius-pill);
    white-space: nowrap;
}

.spec-card {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 14px 16px;
    display: flex;
    align-items: center;
    gap: 14px;
}

.spec-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(201, 138, 88, 0.15);
    color: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}

.spec-card-label {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: rgba(255, 255, 255, 0.5);
    margin-bottom: 2px;
}

.spec-card-value {
    font-size: 14px;
    font-weight: 600;
    color: #FFFFFF;
}

.product-rel-card:hover {
    transform: translateY(-4px);
    transition: transform 0.3s;
    border-color: var(--primary) !important;
}
</style>
@endpush
