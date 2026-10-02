@extends('layouts.app')

@section('title', 'Contact Us | Wellnox International Pvt. Ltd. | Precision Engineering & Architectural Inquiries')
@section('meta_description', 'Connect with Wellnox International Pvt. Ltd. in Rajkot, Gujarat. Inquire about architectural linear shower drainers, certified AISI 304 floor gratings, OEM manufacturing, and wholesale pricing.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}?v={{ time() }}">
@endpush

@section('content')

    <!-- ==========================================================================
       1. CREATIVE LUXURY ARCHITECTURAL PAGE TITLE & BREADCRUMB HERO
       (EXACT DESIGN MATCHING ABOUT US & WHY WELLNOX PAGES)
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
                <!-- Clean Bold Page Title -->
                <h1 class="about-creative-page-title mb-3">
                    Contact <span class="text-gold font-serif">Us</span>
                </h1>

                <!-- Architectural Drain Slotted Accent Divider -->
                <div class="mb-4 d-flex justify-content-center">
                    <x-drain-divider theme="dark" align="center" />
                </div>

                <!-- Sleek Creative Glass Breadcrumb Capsule (Identical to About Us & Why Wellnox Pages) -->
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
                            <li class="breadcrumb-item active" aria-current="page">
                                <span>Contact Us</span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. REUSED HOME PAGE REQUEST FORM SECTION --}}
    <x-request-quote />


    <!-- ==========================================================================
       3. ARCHITECTURAL GOOGLE MAPS SECTION (FULL SCREEN WIDTH)
       ========================================================================== -->
    <section class="contact-map-fullwidth-section position-relative overflow-hidden">
        <div class="contact-map-full-embed">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59107.575631481514!2d70.767936!3d22.203947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959b56f8f537dbf%3A0x63351ec8f26a57cf!2sVirva%2C%20Gujarat%20360024!5e0!3m2!1sen!2sin!4v1711880000000!5m2!1sen!2sin" 
                width="100%" 
                height="480" 
                style="border:0; display: block; width: 100vw; max-width: 100%;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade" 
                title="Wellnox Virva Rajkot Gujarat Location Map">
            </iframe>
        </div>
    </section>



@endsection
