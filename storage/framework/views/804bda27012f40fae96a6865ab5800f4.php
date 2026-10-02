<?php $__env->startSection('title', 'Contact Us | Wellnox International Pvt. Ltd. | Precision Engineering & Architectural Inquiries'); ?>
<?php $__env->startSection('meta_description', 'Connect with Wellnox International Pvt. Ltd. in Rajkot, Gujarat. Inquire about architectural linear shower drainers, certified AISI 304 floor gratings, OEM manufacturing, and wholesale pricing.'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/contact.css')); ?>?v=<?php echo e(time()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <!-- ==========================================================================
       1. CREATIVE LUXURY ARCHITECTURAL PAGE TITLE & BREADCRUMB HERO
       (EXACT DESIGN MATCHING ABOUT US & WHY WELLNOX PAGES)
       ========================================================================== -->
    <section class="about-hero-creative position-relative overflow-hidden">
        <!-- Rich Luxury Architectural Background Image with Deep Gradient Mesh & Glows -->
        <div class="about-hero-bg-layer" style="background-image: url('<?php echo e(asset('assets/images/why-wellnox-banner.webp')); ?>');"></div>
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
                    <?php if (isset($component)) { $__componentOriginal3c76581b98a91e63678fa9ee54e0841c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3c76581b98a91e63678fa9ee54e0841c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.drain-divider','data' => ['theme' => 'dark','align' => 'center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('drain-divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['theme' => 'dark','align' => 'center']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3c76581b98a91e63678fa9ee54e0841c)): ?>
<?php $attributes = $__attributesOriginal3c76581b98a91e63678fa9ee54e0841c; ?>
<?php unset($__attributesOriginal3c76581b98a91e63678fa9ee54e0841c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3c76581b98a91e63678fa9ee54e0841c)): ?>
<?php $component = $__componentOriginal3c76581b98a91e63678fa9ee54e0841c; ?>
<?php unset($__componentOriginal3c76581b98a91e63678fa9ee54e0841c); ?>
<?php endif; ?>
                </div>

                <!-- Sleek Creative Glass Breadcrumb Capsule (Identical to About Us & Why Wellnox Pages) -->
                <div class="d-inline-block">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb creative-glass-breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('home')); ?>" class="breadcrumb-home-link">
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

    
    <?php if (isset($component)) { $__componentOriginal241911271789f94f7a36c3bf47855879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal241911271789f94f7a36c3bf47855879 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.request-quote','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('request-quote'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal241911271789f94f7a36c3bf47855879)): ?>
<?php $attributes = $__attributesOriginal241911271789f94f7a36c3bf47855879; ?>
<?php unset($__attributesOriginal241911271789f94f7a36c3bf47855879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal241911271789f94f7a36c3bf47855879)): ?>
<?php $component = $__componentOriginal241911271789f94f7a36c3bf47855879; ?>
<?php unset($__componentOriginal241911271789f94f7a36c3bf47855879); ?>
<?php endif; ?>


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



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\wellnox\resources\views/contact.blade.php ENDPATH**/ ?>