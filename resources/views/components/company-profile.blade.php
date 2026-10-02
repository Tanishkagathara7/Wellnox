@props([
    'factoryImage',
    'stats' => []
])

<section id="company-profile" class="section-padding company-profile-section position-relative overflow-hidden">
   

    <div class="container position-relative z-2">
        <div class="row g-4 g-xl-5 align-items-center">
            <!-- Left: Factory / Facility Photo with rounded corners and decorative luxury accents -->
            <div class="col-lg-6">
                <div class="company-img-wrapper" id="aboutImgWrapper">
                    <img src="{{ asset($factoryImage) }}" alt="Wellnox International Pvt. Ltd." class="company-main-img" loading="lazy">
                    
                    <!-- Floating Architectural Experience Badge -->
                    <div class="about-floating-badge" id="aboutFloatingBadge">
                        <div class="badge-num-box">
                            <span class="badge-big-num">24+</span>
                        </div>
                        <div class="badge-text-box">
                            <span class="badge-title">Years of Precision</span>
                            <span class="badge-sub">Manufacturing Legacy</span>
                        </div>
                    </div>

                    <!-- Subtle Bronze Frame Accent -->
                    <div class="about-img-frame-accent" aria-hidden="true"></div>
                </div>
            </div>

            <!-- Right: Company Profile Details -->
            <div class="col-lg-6 company-content-col">
                <span class="section-eyebrow">COMPANY PROFILE</span>
                <h2 class="company-section-heading mb-2"> <span class="text-gold">Wellnox International</span> Pvt. Ltd.</h2>
                <div class="mb-3">
                    <x-drain-divider theme="light" align="left" />
                </div>
                
                <p class="company-text-desc mb-4">
                    Founded in 2000, <strong>WELLNOX INTERNATIONAL PVT. LTD.</strong> is a leading manufacturer of architectural overhead rain showers, linear drains, health faucets and bathroom accessories. We combine innovation, quality and aesthetics to deliver products that elevate modern living spaces.
                </p>

                <!-- In-column 4 Stats items with vertical dividers matching reference -->
                @if(!empty($stats))
                    <div class="company-stats-row mb-4">
                        <div class="row g-0 align-items-center">
                            @foreach($stats as $index => $stat)
                                <div class="col-6 col-md-3">
                                    <div class="company-stat-card {{ $index < count($stats) - 1 ? 'has-right-divider' : '' }} stat-idx-{{ $index }}">
                                        <div class="stat-icon-wrap">
                                            <i class="bi {{ $stat['icon'] }}"></i>
                                        </div>
                                        <div class="stat-number-text">
                                            @if(isset($stat['numeric']))
                                                <span class="company-stat-counter" data-target="{{ $stat['numeric'] }}">{{ $stat['numeric'] }}</span><span class="stat-plus-sign">+</span>
                                            @else
                                                <span class="company-stat-text-val">{{ $stat['number'] }}</span>
                                            @endif
                                        </div>
                                        <div class="stat-label-text">{{ $stat['label'] }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <a href="{{ route('website.about') }}" class="btn-primary-wellnox company-btn">
                    <span>Know More About Us</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
