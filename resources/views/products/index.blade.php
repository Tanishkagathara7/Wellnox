@extends('layouts.app')

@section('title', ($selectedCategory ? $selectedCategory->name . ' - ' : '') . 'Luxury Products & Architectural Collections | Wellnox')
@section('meta_description', 'Explore Wellnox luxury bathroom accessories, ceramic sets, cloth drying stands, modular kitchen accessories, dish drainers, floor drains & gratings, and MS ladders.')

@section('content')

    <!-- HERO HEADER: Sleek Clean Architectural Header -->
    <section class="products-hero-section">
        <div class="container">
            <nav aria-label="breadcrumb" class="mb-2">
                <ol class="breadcrumb luxury-breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('website.products') }}">Products</a></li>
                    @if($selectedCategory)
                        <li class="breadcrumb-item active" aria-current="page">{{ $selectedCategory->name }}</li>
                    @endif
                    @if($selectedSubcategory)
                        <li class="breadcrumb-item active text-gold" aria-current="page">{{ $selectedSubcategory->name }}</li>
                    @endif
                </ol>
            </nav>

            <div class="row align-items-center justify-content-between g-3">
                <div class="col-lg-8">
                    <h1 class="products-hero-title mb-1">
                        @if($selectedSubcategory)
                            <span class="text-white">{{ $selectedSubcategory->name }}</span>
                        @elseif($selectedCategory)
                            <span class="text-white">{{ $selectedCategory->name }}</span>
                        @else
                            <span class="text-white">Product Collection</span>
                        @endif
                    </h1>
                    <p class="products-hero-subtitle text-white-50 mb-0">
                        {{ $selectedSubcategory && $selectedSubcategory->description ? $selectedSubcategory->description : ($selectedCategory && $selectedCategory->description ? $selectedCategory->description : 'Engineered with certified AISI 304 stainless steel and precision architectural craftsmanship.') }}
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <span class="trust-pill-tag">
                        <i class="bi bi-patch-check-fill text-gold me-1"></i> AISI 304 Certified
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN PRODUCT CATALOG SECTION: CLEAN COLLAPSIBLE SIDE PANEL + PRODUCT GRID -->
    <section class="catalog-main-section py-5">
        <div class="container">
            <div class="row g-4 g-xl-5">

                <!-- ================= LEFT SIDEBAR (CLEAN, NO IMAGES, PROPER COLLAPSIBLE ICONS) ================= -->
                <aside class="col-lg-3 col-xl-3">
                    <div class="catalog-sidebar sticky-top">

                        <!-- Side Panel Header -->
                        <div class="sidebar-header d-flex align-items-center justify-content-between">
                            <span class="sidebar-heading">
                                <i class="bi bi-grid-fill text-gold me-1.5"></i> Categories
                            </span>
                            @if(request()->hasAny(['category', 'subcategory', 'color', 'search']))
                                <a href="{{ route('website.products') }}" class="btn-clear-filters" title="Reset all filters">
                                    <i class="bi bi-arrow-counterclockwise"></i> Reset
                                </a>
                            @endif
                        </div>

                        <!-- 7 Categories Vertical List: Pure Text + Proper Chevron + Subcategory Accordion -->
                        <div class="category-menu-list">
                            @foreach($categories as $cat)
                                @php
                                    $isCatActive = ($selectedCategory && $selectedCategory->id === $cat->id);
                                    $hasSub = $cat->subcategories->isNotEmpty();
                                @endphp
                                <div class="category-menu-item {{ $isCatActive ? 'is-active' : '' }}">
                                    <!-- Category Row -->
                                    <div class="category-row d-flex align-items-center justify-content-between">
                                        <a href="{{ route('website.products', ['category' => $cat->slug]) }}" 
                                           class="category-name-link {{ $isCatActive && !$selectedSubcategory ? 'selected' : '' }}">
                                            <span class="cat-label">{{ $cat->name }}</span>
                                            <span class="cat-badge-count">{{ $cat->products_count }}</span>
                                        </a>

                                        @if($hasSub)
                                            <!-- Dedicated Toggle Button with Clear Chevron Icon -->
                                            <button type="button" 
                                                    class="btn-cat-toggle {{ $isCatActive ? 'expanded' : '' }}" 
                                                    data-bs-toggle="collapse" 
                                                    data-bs-target="#subList-{{ $cat->id }}" 
                                                    aria-expanded="{{ $isCatActive ? 'true' : 'false' }}"
                                                    aria-controls="subList-{{ $cat->id }}"
                                                    title="Toggle subcategories">
                                                <i class="bi bi-chevron-down toggle-icon"></i>
                                            </button>
                                        @endif
                                    </div>

                                    <!-- Collapsible Subcategories Tree List -->
                                    @if($hasSub)
                                        <div class="collapse {{ $isCatActive ? 'show' : '' }}" id="subList-{{ $cat->id }}">
                                            <div class="subcategory-clean-box">
                                                <!-- All in Category Option -->
                                                <a href="{{ route('website.products', ['category' => $cat->slug]) }}" 
                                                   class="sub-clean-link {{ $isCatActive && !$selectedSubcategory ? 'current' : '' }}">
                                                    <span class="sub-dot"></span>
                                                    <span class="sub-text">All {{ $cat->name }}</span>
                                                </a>

                                                @foreach($cat->subcategories as $sub)
                                                    @php
                                                        $isSubActive = ($selectedSubcategory && $selectedSubcategory->id === $sub->id);
                                                    @endphp
                                                    <a href="{{ route('website.products', ['category' => $cat->slug, 'subcategory' => $sub->slug]) }}" 
                                                       class="sub-clean-link {{ $isSubActive ? 'current' : '' }}">
                                                        <span class="sub-dot"></span>
                                                        <span class="sub-text flex-grow-1 text-truncate">{{ $sub->name }}</span>
                                                        <span class="sub-count">{{ $sub->products_count }}</span>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <!-- Filter By Color / Finish Widget -->
                        <div class="sidebar-filter-block mt-4 pt-3 border-top">
                            <div class="d-flex align-items-center justify-content-between mb-2.5">
                                <span class="filter-block-title">
                                    <i class="bi bi-palette text-gold me-1"></i> Finish / Color
                                </span>
                                @if(request('color'))
                                    <a href="{{ route('website.products', request()->except('color')) }}" class="text-danger small text-decoration-none">
                                        Clear
                                    </a>
                                @endif
                            </div>
                            
                            <div class="color-chips-list">
                                <a href="{{ route('website.products', request()->except('color')) }}" 
                                   class="color-chip-btn {{ !request('color') ? 'active' : '' }}">
                                    All
                                </a>
                                <a href="{{ route('website.products', array_merge(request()->all(), ['color' => 'has_color', 'page' => 1])) }}" 
                                   class="color-chip-btn {{ request('color') === 'has_color' ? 'active' : '' }}">
                                    <span class="color-indicator-dot colored"></span> With Color
                                </a>
                                <a href="{{ route('website.products', array_merge(request()->all(), ['color' => 'no_color', 'page' => 1])) }}" 
                                   class="color-chip-btn {{ request('color') === 'no_color' ? 'active' : '' }}">
                                    <span class="color-indicator-dot natural"></span> Natural (No Color)
                                </a>

                                @foreach($availableColors as $col)
                                    <a href="{{ route('website.products', array_merge(request()->all(), ['color' => $col, 'page' => 1])) }}" 
                                       class="color-chip-btn {{ request('color') === $col ? 'active' : '' }}">
                                        {{ $col }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Help / Custom Sizing Callout in Sidebar -->
                        <div class="sidebar-help-box mt-4 p-3 rounded-3">
                            <div class="fw-semibold text-dark small mb-1">Custom Sizes &amp; OE Supply</div>
                            <p class="small text-muted mb-2 lh-sm">Need customized length channel drainers or bespoke fittings?</p>
                            <a href="{{ route('website.contact') }}" class="btn btn-dark btn-sm w-100 rounded-pill py-1.5">
                                Inquire Custom Size
                            </a>
                        </div>

                    </div>
                </aside>

                <!-- ================= RIGHT COLUMN: PRODUCTS CONTENT ================= -->
                <main class="col-lg-9 col-xl-9">

                    <!-- Top Filter & Search Action Bar -->
                    <div class="catalog-top-bar mb-4">
                        <div class="row g-2 align-items-center justify-content-between">
                            
                            <!-- Result Count and Active Breadcrumb Pills -->
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <span class="result-count-label">
                                        Showing <strong>{{ $products->total() }}</strong> {{ Str::plural('product', $products->total()) }}
                                    </span>

                                    @if($selectedCategory)
                                        <span class="active-crumb-badge">
                                            {{ $selectedCategory->name }}
                                        </span>
                                    @endif

                                    @if($selectedSubcategory)
                                        <span class="active-crumb-badge sub">
                                            {{ $selectedSubcategory->name }}
                                            <a href="{{ route('website.products', ['category' => $selectedCategory->slug]) }}" class="ms-1 text-danger text-decoration-none">&times;</a>
                                        </span>
                                    @endif

                                    @if(request('color'))
                                        <span class="active-crumb-badge color">
                                            {{ request('color') === 'has_color' ? 'Colored' : (request('color') === 'no_color' ? 'Natural SS' : request('color')) }}
                                            <a href="{{ route('website.products', request()->except('color')) }}" class="ms-1 text-danger text-decoration-none">&times;</a>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Search Box Form -->
                            <div class="col-md-6 col-lg-5 text-md-end">
                                <form method="GET" action="{{ route('website.products') }}" class="d-flex align-items-center gap-2">
                                    @if($selectedCategory)
                                        <input type="hidden" name="category" value="{{ $selectedCategory->slug }}">
                                    @endif
                                    @if($selectedSubcategory)
                                        <input type="hidden" name="subcategory" value="{{ $selectedSubcategory->slug }}">
                                    @endif
                                    @if(request('color'))
                                        <input type="hidden" name="color" value="{{ request('color') }}">
                                    @endif

                                    <div class="input-group search-clean-group flex-grow-1">
                                        <span class="input-group-text bg-white border-end-0 text-muted ps-3">
                                            <i class="bi bi-search small"></i>
                                        </span>
                                        <input type="text" name="search" class="form-control border-start-0 ps-1 form-control-sm" placeholder="Search by name, size..." value="{{ request('search') }}">
                                        @if(request('search'))
                                            <a href="{{ route('website.products', request()->except('search')) }}" class="input-group-text bg-white border-start-0 text-muted" title="Clear search">
                                                <i class="bi bi-x"></i>
                                            </a>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-outline-dark btn-sm px-3 text-nowrap">
                                        Search
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>

                    <!-- Products Grid: 3 Columns on Desktop, Clean Proportions -->
                    <div class="row g-3 g-md-4">
                        @forelse($products as $product)
                            <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                                <div class="catalog-product-card" id="product-{{ $product->id }}">
                                    
                                    <!-- Image Frame -->
                                    <div class="card-img-zone">
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-thumb-img" loading="lazy">
                                        
                                        <!-- Top Attribute Badges -->
                                        <div class="card-badges-header">
                                            @if($product->color)
                                                <span class="badge-pill-color" title="Finish: {{ $product->color }}">
                                                    <span class="dot-swatch" style="background-color: {{ Str::contains(strtolower($product->color), 'gold') ? '#D4AF37' : (Str::contains(strtolower($product->color), 'rose') ? '#B76E79' : (Str::contains(strtolower($product->color), 'black') ? '#222222' : (Str::contains(strtolower($product->color), 'green') ? '#1B4D3E' : (Str::contains(strtolower($product->color), 'blue') ? '#0D47A1' : '#C98A58')))) }};"></span>
                                                    {{ $product->color }}
                                                </span>
                                            @else
                                                <span class="badge-pill-plain" title="Natural Stainless Steel Finish">
                                                    SS Natural
                                                </span>
                                            @endif

                                            @if($product->size)
                                                <span class="badge-pill-size">
                                                    {{ $product->size }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Card Content Body -->
                                    <div class="card-content-zone">
                                        <!-- Hierarchy Breadcrumb -->
                                        <div class="product-micro-crumb">
                                            {{ $product->subcategory ? $product->subcategory->name : ($product->category ? $product->category->name : 'Wellnox') }}
                                        </div>

                                        <!-- Product Name -->
                                        <h3 class="product-card-title">
                                            <a href="{{ route('website.products.show', $product->slug) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h3>

                                        <!-- Short Description -->
                                        <p class="product-card-desc">
                                            {{ $product->short_description ?: Str::limit($product->description, 70, '...') }}
                                        </p>

                                        <!-- Spec Summary Strip -->
                                        <div class="spec-data-strip">
                                            <div class="spec-unit">
                                                <span class="label">Size:</span>
                                                <span class="val">{{ $product->size ?: 'Standard' }}</span>
                                            </div>
                                            <div class="spec-unit text-end">
                                                <span class="label">Color:</span>
                                                <span class="val {{ $product->color ? 'text-gold' : 'text-muted' }}">{{ $product->color ?: 'Natural' }}</span>
                                            </div>
                                        </div>

                                        <!-- Action Buttons: Clean & Perfectly Proportioned -->
                                        <div class="card-action-bar">
                                            <a href="{{ route('website.contact') }}?product={{ urlencode($product->name) }}" class="btn-card-quote">
                                                <span>Request Quote</span>
                                                <i class="bi bi-arrow-right-short fs-6"></i>
                                            </a>
                                            <a href="{{ route('website.products.show', $product->slug) }}" class="btn-card-view" title="View Specifications">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="empty-catalog-state text-center py-5">
                                    <i class="bi bi-box-seam empty-state-icon mb-3"></i>
                                    <h3 class="h5 font-serif text-dark mb-1">No Products Found</h3>
                                    <p class="text-muted small mb-3">No products match your selected category, subcategory, or filter.</p>
                                    <a href="{{ route('website.products') }}" class="btn btn-dark btn-sm rounded-pill px-4">
                                        Show All Products
                                    </a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Clean Bootstrap 5 Pagination -->
                    @if($products->hasPages())
                        <div class="pagination-footer-wrapper mt-5 pt-4 border-top d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <span class="text-muted small">
                                Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} items
                            </span>
                            <div>
                                {{ $products->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    @endif

                </main>

            </div>
        </div>
    </section>

@endsection

@push('styles')
<style>
/* ==========================================================================
   WELLNOX PRODUCTS PAGE - CLEAN, SPACIOUS, ZERO-CLUTTER SIDE PANEL
   ========================================================================== */

/* Top Banner */
.products-hero-section {
    background-color: #0E0F12;
    padding: 100px 0 40px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}

.luxury-breadcrumb .breadcrumb-item a {
    color: rgba(255, 255, 255, 0.55);
    text-decoration: none;
    font-size: 13px;
    transition: color 0.2s;
}

.luxury-breadcrumb .breadcrumb-item a:hover {
    color: var(--primary);
}

.luxury-breadcrumb .breadcrumb-item.active {
    color: #FFFFFF;
    font-size: 13px;
}

.luxury-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255, 255, 255, 0.3);
}

.products-hero-title {
    font-size: clamp(1.8rem, 3.2vw, 2.6rem);
    font-weight: 700;
    line-height: 1.2;
    font-family: var(--font-heading);
}

.products-hero-subtitle {
    font-size: 14px;
    max-width: 650px;
    line-height: 1.6;
}

.trust-pill-tag {
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid rgba(255, 255, 255, 0.12);
    color: #FFFFFF;
    font-size: 12.5px;
    font-weight: 500;
    padding: 8px 18px;
    border-radius: var(--radius-pill);
    display: inline-block;
}

/* ==========================================================================
   CLEAN SIDE PANEL (NO IMAGES, CRISP TEXT & CLEAR CHEVRON TOGGLES)
   ========================================================================== */
.catalog-main-section {
    background-color: #F8F6F1;
}

.catalog-sidebar {
    top: 90px;
    background: #FFFFFF;
    border: 1px solid #ECE7DE;
    border-radius: 12px;
    padding: 18px;
    box-shadow: 0 2px 14px rgba(0, 0, 0, 0.03);
}

.sidebar-header {
    padding-bottom: 12px;
    margin-bottom: 12px;
    border-bottom: 1px solid #EFEAE2;
}

.sidebar-heading {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: #1A1A1A;
}

.btn-clear-filters {
    font-size: 11.5px;
    color: #888888;
    text-decoration: none;
    transition: color 0.2s;
}

.btn-clear-filters:hover {
    color: #D32F2F;
}

/* Category Menu Vertical List */
.category-menu-list {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.category-menu-item {
    border-radius: 8px;
    transition: background 0.2s;
}

.category-row {
    padding: 4px 6px 4px 10px;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.category-row:hover {
    background: #F4EFE6;
}

.category-menu-item.is-active > .category-row {
    background: #111111;
}

.category-name-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-grow: 1;
    text-decoration: none;
    color: #222222;
    padding: 5px 0;
    min-width: 0;
}

.cat-label {
    font-size: 13.5px;
    font-weight: 500;
    line-height: 1.35;
    color: #222222;
    white-space: normal;
    word-break: break-word;
    margin-right: 8px;
}

.category-menu-item.is-active .cat-label {
    color: #FFFFFF;
    font-weight: 600;
}

.cat-badge-count {
    font-size: 11px;
    background: #EFEAE2;
    color: #666666;
    padding: 2px 7px;
    border-radius: 10px;
    font-weight: 600;
    flex-shrink: 0;
}

.category-menu-item.is-active .cat-badge-count {
    background: rgba(201, 138, 88, 0.2);
    color: var(--primary);
}

/* Dedicated Collapsible Toggle Button with Chevron */
.btn-cat-toggle {
    background: transparent;
    border: none;
    width: 28px;
    height: 28px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #888888;
    margin-left: 6px;
    flex-shrink: 0;
    transition: all 0.2s ease;
    cursor: pointer;
}

.btn-cat-toggle:hover {
    background: rgba(0, 0, 0, 0.06);
    color: #111111;
}

.category-menu-item.is-active .btn-cat-toggle {
    color: #FFFFFF;
}

.category-menu-item.is-active .btn-cat-toggle:hover {
    background: rgba(255, 255, 255, 0.15);
}

.toggle-icon {
    font-size: 12px;
    transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}

.btn-cat-toggle[aria-expanded="true"] .toggle-icon,
.btn-cat-toggle.expanded .toggle-icon {
    transform: rotate(180deg);
}

/* Subcategories Clean Box */
.subcategory-clean-box {
    margin: 4px 0 6px 12px;
    padding: 6px 0 6px 12px;
    border-left: 2px solid #E4DCCF;
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.sub-clean-link {
    display: flex;
    align-items: center;
    gap: 7px;
    padding: 5px 8px;
    font-size: 12.5px;
    color: #555555;
    text-decoration: none;
    border-radius: 6px;
    transition: all 0.2s;
}

.sub-dot {
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background-color: #B5AFA4;
    flex-shrink: 0;
}

.sub-clean-link:hover {
    color: var(--primary);
    background: rgba(201, 138, 88, 0.08);
}

.sub-clean-link:hover .sub-dot {
    background-color: var(--primary);
}

.sub-clean-link.current {
    color: var(--primary);
    font-weight: 700;
    background: rgba(201, 138, 88, 0.12);
}

.sub-clean-link.current .sub-dot {
    background-color: var(--primary);
    transform: scale(1.3);
}

.sub-count {
    font-size: 10.5px;
    color: #888888;
    background: #EFEAE2;
    padding: 1px 6px;
    border-radius: 8px;
}

/* Sidebar Color Filter Chips */
.filter-block-title {
    font-size: 11.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #333333;
}

.color-chips-list {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}

.color-chip-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 4px 9px;
    background: #F4EFE6;
    border: 1px solid #ECE7DE;
    color: #444444;
    font-size: 11.5px;
    border-radius: 14px;
    text-decoration: none;
    transition: all 0.2s;
}

.color-chip-btn:hover {
    border-color: var(--primary);
    color: #111111;
}

.color-chip-btn.active {
    background: #111111;
    border-color: #111111;
    color: #FFFFFF;
}

.color-indicator-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    display: inline-block;
}

.color-indicator-dot.colored {
    background: linear-gradient(135deg, #D4AF37 0%, #B76E79 50%, #222222 100%);
}

.color-indicator-dot.natural {
    background: #B0B5B9;
    border: 1px solid #888888;
}

.sidebar-help-box {
    background: #F4EFE6;
    border: 1px dashed rgba(201, 138, 88, 0.35);
}

/* ==========================================================================
   CATALOG TOP ACTION BAR
   ========================================================================== */
.catalog-top-bar {
    background: #FFFFFF;
    border: 1px solid #ECE7DE;
    border-radius: 10px;
    padding: 12px 18px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
}

.result-count-label {
    font-size: 13.5px;
    color: #555555;
}

.active-crumb-badge {
    background: #111111;
    color: #FFFFFF;
    font-size: 11px;
    font-weight: 500;
    padding: 3px 8px;
    border-radius: 12px;
}

.active-crumb-badge.sub {
    background: rgba(201, 138, 88, 0.15);
    color: #8c5220;
    border: 1px solid rgba(201, 138, 88, 0.3);
}

.active-crumb-badge.color {
    background: #FAF0E6;
    color: #7A4B23;
    border: 1px solid #E4D5C5;
}

.search-clean-group .form-control {
    border-color: #DDDDDD;
    font-size: 13px;
}

.search-clean-group .input-group-text {
    border-color: #DDDDDD;
}

/* ==========================================================================
   PRODUCT CARDS - CLEAN, BALANCED & LUXURIOUS
   ========================================================================== */
.catalog-product-card {
    background: #FFFFFF;
    border: 1px solid #EBE5DB;
    border-radius: 12px;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
}

.catalog-product-card:hover {
    transform: translateY(-3px);
    border-color: var(--primary);
    box-shadow: 0 10px 24px rgba(201, 138, 88, 0.12);
}

.card-img-zone {
    position: relative;
    background: linear-gradient(180deg, #F8F6F2 0%, #FFFFFF 100%);
    height: 190px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px;
    border-bottom: 1px solid #F2EEE8;
}

.product-thumb-img {
    max-height: 150px;
    max-width: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.catalog-product-card:hover .product-thumb-img {
    transform: scale(1.04);
}

.card-badges-header {
    position: absolute;
    top: 10px;
    left: 10px;
    right: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    z-index: 5;
    pointer-events: none;
}

.badge-pill-color {
    background: #111111;
    color: #FFFFFF;
    font-size: 11px;
    font-weight: 600;
    padding: 5px 11px;
    border-radius: 20px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
    border: 1px solid rgba(255, 255, 255, 0.15);
    white-space: nowrap;
    pointer-events: auto;
}

.dot-swatch {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    display: inline-block;
    border: 1px solid rgba(255, 255, 255, 0.6);
}

.badge-pill-plain {
    background: #1F2228;
    color: #FFFFFF;
    font-size: 11px;
    font-weight: 600;
    padding: 5px 11px;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.12);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
    white-space: nowrap;
    pointer-events: auto;
}

.badge-pill-size {
    background: #FFFFFF;
    color: #111111;
    font-size: 11px;
    font-weight: 700;
    padding: 5px 11px;
    border-radius: 20px;
    margin-left: auto;
    border: 1px solid #D5CBBB;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
    white-space: nowrap;
    pointer-events: auto;
}

.card-content-zone {
    padding: 15px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.product-micro-crumb {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #999999;
    font-weight: 600;
    margin-bottom: 3px;
}

.product-card-title {
    font-size: 15px;
    font-weight: 700;
    line-height: 1.35;
    margin-bottom: 5px;
    font-family: var(--font-heading);
}

.product-card-title a {
    color: #111111;
    text-decoration: none;
    transition: color 0.2s;
}

.product-card-title a:hover {
    color: var(--primary);
}

.product-card-desc {
    color: #666666;
    font-size: 12px;
    line-height: 1.45;
    margin-bottom: 12px;
    flex: 1;
}

.spec-data-strip {
    background: #F8F6F2;
    border-radius: 6px;
    padding: 6px 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 11px;
    margin-bottom: 12px;
}

.spec-unit .label {
    color: #888888;
    margin-right: 3px;
}

.spec-unit .val {
    font-weight: 600;
    color: #222222;
}

.card-action-bar {
    display: flex;
    align-items: center;
    gap: 6px;
    padding-top: 10px;
    border-top: 1px solid #F2EEE8;
}

.btn-card-quote {
    background: #111111;
    color: #FFFFFF !important;
    font-size: 12px;
    font-weight: 600;
    padding: 7px 12px;
    border-radius: var(--radius-pill);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 2px;
    flex: 1;
    transition: all 0.25s;
}

.btn-card-quote:hover {
    background: var(--primary-gradient);
    transform: translateY(-1px);
}

.btn-card-view {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 1px solid #DDDDDD;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #444444;
    text-decoration: none;
    font-size: 12px;
    transition: all 0.2s;
}

.btn-card-view:hover {
    border-color: var(--primary);
    color: var(--primary);
    background: #FAF7F2;
}

.empty-state-icon {
    font-size: 38px;
    color: var(--primary);
    display: block;
}

.pagination-footer-wrapper .pagination {
    margin-bottom: 0;
}
</style>
@endpush
