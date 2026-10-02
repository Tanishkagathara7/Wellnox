<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wellnox International | Luxury Bathroom & Drainage Solutions')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo/favi.png') }}?v=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo/favi.png') }}?v=1">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo/favi.png') }}?v=1">

    <!-- Meta & SEO -->
    <meta name="description" content="@yield('meta_description', 'Wellnox International Pvt. Ltd. - Manufacturer and exporter of premium stainless steel AISI 304 shower channel drainers, gratings, and luxury bathroom accessories.')">
    <meta name="keywords" content="Wellnox, shower drainer, floor gratings, bathroom accessories, AISI 304 stainless steel, Rajkot Gujarat, luxury bathroom">
    <meta property="og:title" content="Wellnox International - The Luxurious Look of Wellnox">
    <meta property="og:description" content="Discover stylish, durable & innovative bathroom and drainage solutions for modern living spaces.">
    <meta property="og:image" content="{{ asset(config('placeholders.logo', 'assets/images/logo/logo.png')) }}">
    <meta property="og:type" content="website">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,400;1,600&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Primary Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ time() }}">
    
    @stack('styles')
</head>
<body>

    <!-- Header Component with Z-Index 9999 -->
    <x-navbar />

    <!-- Main Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Component -->
    <x-footer />

    <!-- Scroll To Top Button -->
    <button class="scroll-top-btn" aria-label="Scroll to top">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- GSAP & ScrollTrigger -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

    <!-- Confetti JS -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('assets/js/main.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/animations.js') }}?v={{ time() }}"></script>

    @stack('scripts')
</body>
</html>
