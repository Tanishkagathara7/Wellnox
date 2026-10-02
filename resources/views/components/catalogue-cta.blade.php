@props([
    'catalogueBook',
    'catalogueBg' => 'assets/images/catalogue-cta-bg.webp'
])

<section id="catalogue" class="catalogue-cta-section" style="background-image: url('{{ asset($catalogueBg) }}');">
    <div class="catalogue-cta-overlay"></div>
    <div class="container catalogue-cta-container">
        <div class="row align-items-center g-4">
            <!-- Left: Catalog Cover Image -->
            <div class="col-md-5 col-lg-4 text-center">
                <div class="catalogue-mockup-wrapper">
                    <img src="{{ asset($catalogueBook) }}" alt="Wellnox Latest Product Catalogue" class="catalogue-cover-img" loading="lazy">
                </div>
            </div>

            <!-- Center: Content and Download CTA Button -->
            <div class="col-md-7 col-lg-5">
                <div class="catalogue-info-card">
                    <span class="section-eyebrow">PRODUCT CATALOGUE</span>
                    <h2 class="section-heading mb-2">
                        Download Our<br>
                        <span class="text-gold">Latest Catalogue</span>
                    </h2>
                    <div class="mb-3">
                        <x-drain-divider theme="light" align="left" />
                    </div>
                    <p class="section-subtext mb-4">
                        Explore our complete range of drainers, gratings, bathroom accessories and health faucets.
                    </p>
                    <a href="{{ asset('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn-primary-wellnox">
                        <span>Download Catalogue</span>
                        <i class="bi bi-download"></i>
                    </a>
                </div>
            </div>

            <!-- Right: Architectural quote matching reference -->
            <div class="col-lg-3 d-none d-lg-block">
                <div class="catalogue-quote-box">
                    <span class="catalogue-quote-decor">“</span>
                    <h3 class="catalogue-quote-title">
                        <span class="quote-word-main">Explore</span>
                        <span class="quote-word-gold">Innovative</span>
                        <span class="quote-word-mid">Designs for</span>
                        <span class="quote-word-highlight">Modern Spaces.</span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>
