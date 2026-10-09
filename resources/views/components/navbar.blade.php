<header class="site-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark p-0">
            <!-- Brand Logo -->
            <a class="navbar-brand py-0 me-4 d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset(config('placeholders.logo', 'assets/images/logo/logo.png')) }}" alt="Wellnox" class="brand-logo-img">
            </a>

            <!-- Mobile Hamburger Button -->
            <button class="navbar-toggler border-0 shadow-none px-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#wellnoxMobileNav" aria-controls="wellnoxMobileNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Desktop Navigation Links (Centered / Spread Exactly as Reference) -->
            <div class="collapse navbar-collapse" id="wellnoxNavbar">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link-custom {{ request()->routeIs('website.home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom {{ request()->routeIs('website.about') ? 'active' : '' }}" href="{{ route('website.about') }}">About Us</a>
                    </li>
                    <li class="nav-item dropdown dropdown-mega-product">
                        <a class="nav-link-custom dropdown-toggle {{ request()->routeIs('website.products*') ? 'active' : '' }}" href="{{ route('website.products') }}" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Products <i class="bi bi-chevron-down nav-chevron"></i>
                        </a>
                        <!-- Luxury Interactive Mega Menu -->
                        <div class="dropdown-menu dropdown-menu-dark mega-menu-box shadow-2xl p-0" aria-labelledby="productsDropdown">
                            <div class="mega-menu-inner row g-0">
                                <!-- Left Column: Categories List (Clean Side Panel Format) -->
                                <div class="col-lg-6 mega-menu-nav p-3">
                                    <div class="mega-menu-list">
                                        @php
                                            $panelCategories = isset($navCategories) && $navCategories->isNotEmpty() 
                                                ? $navCategories 
                                                : \App\Models\ProductCategory::active()->sorted()->get();
                                        @endphp

                                        @foreach($panelCategories as $index => $cat)
                                            <a class="mega-nav-item {{ $index === 0 ? 'active' : '' }} d-flex align-items-center justify-content-between" 
                                               href="{{ route('website.products', ['category' => $cat->slug]) }}"
                                               data-title="{{ $cat->name }}"
                                               data-desc="{{ $cat->description ?: 'Engineered with certified AISI 304 stainless steel and precision architectural craftsmanship.' }}"
                                               data-image="{{ $cat->image_url }}"
                                               data-link="{{ route('website.products', ['category' => $cat->slug]) }}">
                                                <span class="mega-item-text">{{ $cat->name }}</span>
                                                <span class="mega-count-pill">{{ $cat->products_count }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Right Column: Featured Visual Showcase Card -->
                                <div class="col-lg-6 mega-menu-preview p-3">
                                    <div class="mega-preview-card h-100 d-flex flex-column justify-content-between">
                                        <div class="mega-preview-img-wrap">
                                            <img id="megaPreviewImg" 
                                                 src="{{ asset('assets/images/product/3.webp') }}" 
                                                 alt="Featured Category" 
                                                 class="mega-preview-img">
                                            <div class="mega-preview-badge">
                                                <i class="bi bi-award-fill text-gold me-1"></i> AISI 304 Grade
                                            </div>
                                        </div>

                                        <div class="mega-preview-content pt-3">
                                            <h4 class="mega-preview-title" id="megaPreviewTitle">Bathroom Accessories</h4>
                                            <p class="mega-preview-desc" id="megaPreviewDesc">
                                                Contemporary towel bars, soap dispensers, robe hooks and luxury glass shelf brackets.
                                            </p>
                                            <a href="{{ route('website.products', ['category' => 'bathroom-accessories']) }}" class="btn-mega-view" id="megaPreviewBtn">
                                                <span>View Collection</span>
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom" href="{{ asset('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf') }}" target="_blank" rel="noopener noreferrer">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom {{ request()->routeIs('website.why-wellnox') ? 'active' : '' }}" href="{{ route('website.why-wellnox') }}">Why Wellnox</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom {{ request()->routeIs('website.contact') ? 'active' : '' }}" href="{{ route('website.contact') }}">Contact Us</a>
                    </li>
                </ul>

                <!-- Desktop Header Actions: Search & Get Catalogue -->
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ asset('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn-primary-wellnox text-nowrap">
                        <span>Get Catalogue</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Mobile Offcanvas Menu (Opens Left-to-Right) -->
<div class="offcanvas offcanvas-start offcanvas-wellnox" tabindex="-1" id="wellnoxMobileNav" aria-labelledby="wellnoxMobileNavLabel">
    <div class="offcanvas-header border-bottom border-secondary py-3 px-4 d-flex align-items-center justify-content-between">
        <img src="{{ asset(config('placeholders.logo', 'assets/images/logo/logo.png')) }}" alt="Wellnox" style="height: 48px; width: auto;">
        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    
    <div class="offcanvas-body p-4 d-flex flex-column justify-content-between">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link-mobile {{ request()->routeIs('website.home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-mobile {{ request()->routeIs('website.about') ? 'active' : '' }}" href="{{ route('website.about') }}">About Us</a>
            </li>
            
            <!-- Products with inline toggle (opens right on that place) -->
            <li class="nav-item">
                <button type="button" class="nav-link-mobile mobile-products-toggle w-100 d-flex align-items-center justify-content-between text-start" data-bs-toggle="collapse" data-bs-target="#mobileProductsCollapse" aria-expanded="false" aria-controls="mobileProductsCollapse">
                    <span>Products</span>
                    <i class="bi bi-chevron-down mobile-caret text-gold"></i>
                </button>
                
                <!-- Submenu Items (Toggles directly in place) -->
                <div class="collapse" id="mobileProductsCollapse">
                    <ul class="navbar-nav mobile-inline-submenu ps-3 py-2 border-start border-secondary ms-2 mt-1">
                        <li class="nav-item">
                            <a class="nav-link-mobile sub-item" href="{{ route('website.products', ['category' => 'bathroom-accessories']) }}">
                                Bathroom Accessories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-mobile sub-item" href="{{ route('website.products', ['category' => 'ceramic-bathroom-accessories']) }}">
                                Ceramic Bathroom Accessories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-mobile sub-item" href="{{ route('website.products', ['category' => 'cloth-drying-stands']) }}">
                                Cloth Drying Stands
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-mobile sub-item" href="{{ route('website.products', ['category' => 'modular-kitchen-accessories']) }}">
                                Modular Kitchen Accessories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-mobile sub-item" href="{{ route('website.products', ['category' => 'dish-drainers']) }}">
                                Dish Drainers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-mobile sub-item" href="{{ route('website.products', ['category' => 'floor-drains-gratings']) }}">
                                Floor Drains &amp; Gratings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-mobile sub-item" href="{{ route('website.products', ['category' => 'ms-ladders']) }}">
                                MS Ladders
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link-mobile" href="{{ route('home') }}#company-profile">Company Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-mobile {{ request()->routeIs('website.why-wellnox') ? 'active' : '' }}" href="{{ route('website.why-wellnox') }}">Why Wellnox</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-mobile" href="{{ asset('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf') }}" target="_blank" rel="noopener noreferrer">Catalogue</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-mobile {{ request()->routeIs('website.contact') ? 'active' : '' }}" href="{{ route('website.contact') }}">Contact Us</a>
            </li>
        </ul>

        <div class="pt-4 border-top border-secondary mt-3">
            <a href="{{ asset('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn-primary-wellnox w-100 justify-content-center mb-3">
                <span>Download Catalogue</span>
                <i class="bi bi-download"></i>
            </a>
            <div class="text-white-50 small text-center">
                Rajkot, Gujarat, India &bull; +91 98765 43210
            </div>
        </div>
    </div>
</div>

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white border-secondary">
            <div class="modal-header border-secondary">
                <h5 class="modal-title" id="searchModalLabel">Search Wellnox Products</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
                <div class="input-group">
                    <input type="text" class="form-control bg-black text-white border-secondary" placeholder="Search drainers, accessories, gratings..." aria-label="Search">
                    <button class="btn btn-outline-warning" type="button"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const megaNavItems = document.querySelectorAll('.mega-nav-item');
    const previewImg = document.getElementById('megaPreviewImg');
    const previewTitle = document.getElementById('megaPreviewTitle');
    const previewDesc = document.getElementById('megaPreviewDesc');
    const previewBtn = document.getElementById('megaPreviewBtn');

    if (!megaNavItems.length || !previewImg) return;

    megaNavItems.forEach(item => {
        item.addEventListener('mouseenter', function () {
            // Remove active from all
            megaNavItems.forEach(i => i.classList.remove('active'));
            this.classList.add('active');

            const title = this.getAttribute('data-title');
            const desc = this.getAttribute('data-desc');
            const image = this.getAttribute('data-image');
            const link = this.getAttribute('data-link');

            if (previewImg && image) {
                previewImg.style.opacity = '0.4';
                setTimeout(() => {
                    previewImg.src = image;
                    previewImg.style.opacity = '1';
                }, 100);
            }
            if (previewTitle && title) {
                previewTitle.textContent = title;
            }
            if (previewDesc && desc) {
                previewDesc.textContent = desc;
            }
            if (previewBtn && link) {
                previewBtn.href = link;
            }
        });
    });
});
</script>
