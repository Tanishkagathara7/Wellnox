<footer class="site-footer position-relative overflow-hidden" id="footer-contact">
    <!-- Ambient luxury background glows -->
    <div class="footer-ambient-glow footer-glow-left" aria-hidden="true"></div>
    <div class="footer-ambient-glow footer-glow-right" aria-hidden="true"></div>
    <div class="footer-grid-overlay" aria-hidden="true"></div>

    <div class="container position-relative z-2">
        

        <!-- Main Footer Columns Grid -->
        <div class="row g-4 g-xl-5 mb-5 align-items-start">
            
            <!-- Brand & Company Legacy -->
            <div class="col-lg-4 col-md-12 mb-2 mb-lg-0">
                <div class="footer-brand-wrap pe-xl-4">
                    <a href="{{ route('home') }}" class="d-inline-block mb-3 footer-logo-link">
                        <img src="{{ asset(config('placeholders.logo', 'assets/images/logo/logo.png')) }}" alt="Wellnox" class="footer-logo">
                    </a>
                    <p class="footer-bio-text mb-4">
                        Leading manufacturer &amp; exporter of architectural linear shower drains, certified AISI 304 floor gratings, and luxury bathroom hardware engineered for modern living spaces since 2000.
                    </p>
                    
                    <!-- Trust Badges Row -->
                    <div class="footer-trust-badges d-flex align-items-center gap-3 mb-4">
                        <div class="footer-trust-pill">
                            <i class="bi bi-patch-check-fill text-gold me-1"></i>
                            <span>AISI 304 Certified</span>
                        </div>
                        <div class="footer-trust-pill">
                            <i class="bi bi-shield-check text-gold me-1"></i>
                            <span>ISO Compliant</span>
                        </div>
                    </div>

                    <!-- Luxury Social Links -->
                    <div class="footer-social-wrap">
                        <div class="d-flex align-items-center gap-2">
                            <a href="https://facebook.com" class="social-circle-btn" aria-label="Facebook" target="_blank" rel="noopener">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://instagram.com" class="social-circle-btn" aria-label="Instagram" target="_blank" rel="noopener">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="https://linkedin.com" class="social-circle-btn" aria-label="LinkedIn" target="_blank" rel="noopener">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="https://youtube.com" class="social-circle-btn" aria-label="YouTube" target="_blank" rel="noopener">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Navigation -->
            <div class="col-lg-2 col-12 col-md-3 mb-4 mb-md-0">
                <div class="footer-col-header mb-3">
                    <h5 class="footer-col-title">Quick <span class="text-gold">Links</span></h5>
                    <div class="footer-col-bar"></div>
                </div>
                <ul class="footer-nav-list">
                    <li><a href="{{ route('home') }}"><i class="bi bi-chevron-right footer-nav-bullet"></i> Home</a></li>
                    <li><a href="{{ route('website.about') }}"><i class="bi bi-chevron-right footer-nav-bullet"></i> About Us</a></li>
                    <li><a href="{{ asset('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf') }}" target="_blank" rel="noopener noreferrer"><i class="bi bi-chevron-right footer-nav-bullet"></i> Catalogue</a></li>
                    <li><a href="{{ route('website.why-wellnox') }}"><i class="bi bi-chevron-right footer-nav-bullet"></i> Why Wellnox</a></li>
                    <li><a href="{{ route('website.contact') }}"><i class="bi bi-chevron-right footer-nav-bullet"></i> Contact Us</a></li>
                </ul>
            </div>

            <!-- Product Collections -->
            <div class="col-lg-3 col-12 col-md-4 mb-4 mb-md-0">
                <div class="footer-col-header mb-3">
                    <h5 class="footer-col-title">Our <span class="text-gold">Products</span></h5>
                    <div class="footer-col-bar"></div>
                </div>
                <ul class="footer-nav-list">
                    <li><a href="{{ route('website.products', ['category' => 'bathroom-accessories']) }}"><i class="bi bi-chevron-right footer-nav-bullet"></i> Bathroom Accessories</a></li>
                    <li><a href="{{ route('website.products', ['category' => 'ceramic-bathroom-accessories']) }}"><i class="bi bi-chevron-right footer-nav-bullet"></i> Ceramic Accessories</a></li>
                    <li><a href="{{ route('website.products', ['category' => 'cloth-drying-stands']) }}"><i class="bi bi-chevron-right footer-nav-bullet"></i> Cloth Drying Stands</a></li>
                    <li><a href="{{ route('website.products', ['category' => 'modular-kitchen-accessories']) }}"><i class="bi bi-chevron-right footer-nav-bullet"></i> Modular Kitchen Accessories</a></li>
                    <li><a href="{{ route('website.products', ['category' => 'dish-drainers']) }}"><i class="bi bi-chevron-right footer-nav-bullet"></i> Dish Drainers</a></li>
                    <li><a href="{{ route('website.products', ['category' => 'floor-drains-gratings']) }}"><i class="bi bi-chevron-right footer-nav-bullet"></i> Floor Drains &amp; Gratings</a></li>
                    <li><a href="{{ route('website.products', ['category' => 'ms-ladders']) }}"><i class="bi bi-chevron-right footer-nav-bullet"></i> Heavy Duty MS Ladders</a></li>
                </ul>
            </div>

            <!-- Corporate Contact Card -->
            <div class="col-lg-3 col-md-5">
                <div class="footer-col-header mb-3">
                    <h5 class="footer-col-title">Corporate <span class="text-gold">Info</span></h5>
                    <div class="footer-col-bar"></div>
                </div>
                
                <div class="footer-contact-cards d-flex flex-column gap-3">
                    <div class="footer-info-tile">
                        <div class="tile-icon-box">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="tile-text-box">
                            <span class="tile-label">Head Office &amp; Works</span>
                            <span class="tile-value">Virva, Rajkot - 360024, (Gujarat) India.</span>
                        </div>
                    </div>

                    <div class="footer-info-tile">
                        <div class="tile-icon-box">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="tile-text-box">
                            <span class="tile-label">Direct Sales Line</span>
                            <a href="tel:+919876543210" class="tile-value">+91 98765 43210</a>
                        </div>
                    </div>

                    <div class="footer-info-tile">
                        <div class="tile-icon-box">
                            <i class="bi bi-envelope-at"></i>
                        </div>
                        <div class="tile-text-box">
                            <span class="tile-label">Inquiries &amp; Orders</span>
                            <a href="mailto:sales@wellnox.co" class="tile-value">sales@wellnox.co</a>
                        </div>
                    </div>

                    <div class="footer-info-tile">
                        <div class="tile-icon-box">
                            <i class="bi bi-globe2"></i>
                        </div>
                        <div class="tile-text-box">
                            <span class="tile-label">Official Portal</span>
                            <a href="https://www.wellnox.co" target="_blank" rel="noopener" class="tile-value">www.wellnox.co</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer Bottom Bar with Clean Luxury Finish -->
        <div class="footer-bottom-bar text-center py-4">
            <div class="footer-copy-text">
                &copy; {{ date('Y') }} <strong class="text-gold font-serif">Wellnox</strong> <strong class="text-white">International Pvt. Ltd.</strong> All Rights Reserved. Crafted with Indian Engineering Excellence.
            </div>
        </div>

    </div>
</footer>

