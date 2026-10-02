@props([
    'bannerImage',
    'features' => []
])

<section id="why-wellnox" class="why-wellnox-section">
    <!-- Edge-to-Edge Full Width Banner -->
    <div class="why-wellnox-banner-full">
        <img src="{{ asset($bannerImage) }}" alt="Crafting Better Spaces Since 2000" class="why-banner-bg" loading="lazy">
        <div class="why-banner-overlay"></div>
        <div class="container position-relative z-3">
            <div class="why-banner-content">
                <span class="section-eyebrow">WHY WELLNOX</span>
                <h2 class="section-heading mb-2">
                    Crafting Better<br>
                    Spaces <span class="text-gold">Since 2000</span>
                </h2>
                <div class="mb-3">
                    <x-drain-divider theme="light" align="left" />
                </div>
                <p class="section-subtext mb-4">
                    Our products combine functionality, durability and a luxurious look, making every bathroom a more beautiful, comfortable and modern space.
                </p>
                <a href="#drain-showcase" class="btn-primary-wellnox">
                    <span>Our Advantages</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Separate Section: Reasons to Choose Our Product (High-End Creative Architecture) -->
    <div class="reasons-choose-section position-relative overflow-hidden">
        <!-- Ambient luxury decorative mesh & background watermark -->
        <div class="reasons-ambient-glow reasons-glow-1"></div>
        <div class="reasons-ambient-glow reasons-glow-2"></div>
        <div class="reasons-watermark-text" aria-hidden="true">WELLNOX</div>

        <div class="container position-relative z-2">
            @if(!empty($features))
                <div class="reasons-choose-wrapper">
                    <!-- Creative Luxury Section Header -->
                    <div class="text-center mb-5 pb-lg-2">
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill reasons-top-pill mb-3">
                            <span class="reasons-pulse-dot"></span>
                            <span class="reasons-eyebrow-text">FEATURES &amp; BENEFITS</span>
                        </div>
                        <h2 class="reasons-section-heading mb-2">
                            Reasons to Choose <span class="title-gold font-serif">Wellnox</span>
                        </h2>
                        <div class="mb-3">
                            <x-drain-divider theme="light" align="center" />
                        </div>
                        <p class="reasons-section-subtext mx-auto">
                            Engineered with international AISI 304 standards, our solutions combine uncompromised structural longevity, barefoot safety, and architectural elegance for every modern living space.
                        </p>
                    </div>

                    <!-- Creative Grid: 10 Feature Cards with Modern Isometric/Glass Styling -->
                    <div class="row g-3 g-lg-4 justify-content-center">
                        @foreach($features as $index => $feat)
                            <div class="col-12 col-md-6 col-lg-4 d-flex">
                                <div class="reason-luxury-card w-100">
                                    <!-- Background Big Index Watermark -->
                                    <div class="reason-bg-watermark">{{ sprintf('%02d', $index + 1) }}</div>

                                    <div class="reason-card-top d-flex justify-content-between align-items-start">
                                        <div class="reason-icon-orb">
                                            <i class="bi {{ $feat['icon'] }}"></i>
                                        </div>
                                        <div class="reason-badge-wrap">
                                            <span class="reason-index-badge">#{{ sprintf('%02d', $index + 1) }}</span>
                                        </div>
                                    </div>

                                    <div class="reason-card-body">
                                        <h4 class="reason-card-title">{{ $feat['title'] }}</h4>
                                        <p class="reason-card-desc">{{ $feat['desc'] }}</p>
                                    </div>

                                    <div class="reason-card-footer d-flex justify-content-between align-items-center">
                                        <span class="reason-feature-indicator">
                                            <i class="bi bi-patch-check-fill me-1 text-gold"></i> Learn More
                                        </span>
                                        <span class="reason-hover-arrow">
                                            <i class="bi bi-arrow-right"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
