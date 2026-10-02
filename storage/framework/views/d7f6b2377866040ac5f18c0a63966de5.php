<header class="site-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark p-0">
            <!-- Brand Logo -->
            <a class="navbar-brand py-0 me-4 d-flex align-items-center" href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset(config('placeholders.logo', 'assets/images/logo/logo.png'))); ?>" alt="Wellnox" class="brand-logo-img">
            </a>

            <!-- Mobile Hamburger Button -->
            <button class="navbar-toggler border-0 shadow-none px-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#wellnoxMobileNav" aria-controls="wellnoxMobileNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Desktop Navigation Links (Centered / Spread Exactly as Reference) -->
            <div class="collapse navbar-collapse" id="wellnoxNavbar">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link-custom <?php echo e(request()->routeIs('website.home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom <?php echo e(request()->routeIs('website.about') ? 'active' : ''); ?>" href="<?php echo e(route('website.about')); ?>">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link-custom dropdown-toggle" href="#categories" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Products <i class="bi bi-chevron-down nav-chevron"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark shadow-lg border-secondary" aria-labelledby="productsDropdown">
                            <li><a class="dropdown-item py-2" href="#categories">Bathroom Accessories</a></li>
                            <li><a class="dropdown-item py-2" href="#categories">Ceramic Bathroom Accessories</a></li>
                            <li><a class="dropdown-item py-2" href="#categories">Cloth Drying Stands</a></li>
                            <li><a class="dropdown-item py-2" href="#categories">Modular Kitchen Accessories</a></li>
                            <li><a class="dropdown-item py-2" href="#categories">Dish Drainers</a></li>
                            <li><a class="dropdown-item py-2" href="#popular-designs">Floor Drains &amp; Gratings</a></li>
                            <li><a class="dropdown-item py-2" href="#categories">MS Ladders</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom" href="<?php echo e(asset('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf')); ?>" target="_blank" rel="noopener noreferrer">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom <?php echo e(request()->routeIs('website.why-wellnox') ? 'active' : ''); ?>" href="<?php echo e(route('website.why-wellnox')); ?>">Why Wellnox</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom <?php echo e(request()->routeIs('website.contact') ? 'active' : ''); ?>" href="<?php echo e(route('website.contact')); ?>">Contact Us</a>
                    </li>
                </ul>

                <!-- Desktop Header Actions: Search & Get Catalogue -->
                <div class="d-flex align-items-center gap-3">
                    <a href="<?php echo e(asset('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf')); ?>" target="_blank" rel="noopener noreferrer" class="btn-primary-wellnox text-nowrap">
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
        <img src="<?php echo e(asset(config('placeholders.logo', 'assets/images/logo/logo.png'))); ?>" alt="Wellnox" style="height: 48px; width: auto;">
        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    
    <div class="offcanvas-body p-4 d-flex flex-column justify-content-between">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link-mobile <?php echo e(request()->routeIs('website.home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-mobile <?php echo e(request()->routeIs('website.about') ? 'active' : ''); ?>" href="<?php echo e(route('website.about')); ?>">About Us</a>
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
                            <a class="nav-link-mobile sub-item" href="#categories">
                                Bathroom Accessories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-mobile sub-item" href="#categories">
                                Ceramic Bathroom Accessories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-mobile sub-item" href="#categories">
                                Cloth Drying Stands
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-mobile sub-item" href="#categories">
                                Modular Kitchen Accessories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-mobile sub-item" href="#categories">
                                Dish Drainers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-mobile sub-item" href="#popular-designs">
                                Floor Drains &amp; Gratings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-mobile sub-item" href="#categories">
                                MS Ladders
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link-mobile" href="<?php echo e(route('home')); ?>#company-profile">Company Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-mobile <?php echo e(request()->routeIs('website.why-wellnox') ? 'active' : ''); ?>" href="<?php echo e(route('website.why-wellnox')); ?>">Why Wellnox</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-mobile" href="<?php echo e(asset('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf')); ?>" target="_blank" rel="noopener noreferrer">Catalogue</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-mobile <?php echo e(request()->routeIs('website.contact') ? 'active' : ''); ?>" href="<?php echo e(route('website.contact')); ?>">Contact Us</a>
            </li>
        </ul>

        <div class="pt-4 border-top border-secondary mt-3">
            <a href="<?php echo e(asset('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf')); ?>" target="_blank" rel="noopener noreferrer" class="btn-primary-wellnox w-100 justify-content-center mb-3">
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
<?php /**PATH D:\iei\resources\views/components/navbar.blade.php ENDPATH**/ ?>