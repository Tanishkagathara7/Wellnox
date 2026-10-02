<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard'); ?> - Wellnox CMS</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/images/logo/favi.png')); ?>?v=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('assets/images/logo/favi.png')); ?>?v=1">
    <link rel="apple-touch-icon" href="<?php echo e(asset('assets/images/logo/favi.png')); ?>?v=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Admin Primary CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/admin.css')); ?>?v=<?php echo e(time()); ?>">

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="admin-body">

    <!-- Desktop Sidebar -->
    <aside class="admin-sidebar d-none d-lg-flex">
        <!-- Brand -->
        <div class="admin-sidebar-brand">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-flex align-items-center text-decoration-none">
                <img src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt="Wellnox" class="admin-brand-logo">
            </a>
        </div>

        <!-- Navigation Menu -->
        <div class="admin-sidebar-menu">
            <div class="admin-nav-heading">Main Navigation</div>

            <!-- Dashboard -->
            <div class="admin-nav-item">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                    <i class="bi bi-grid-1x2-fill nav-icon"></i>
                    <span>Dashboard</span>
                </a>
            </div>

            <!-- Products Section with Submenu -->
            <div class="admin-nav-item">
                <a class="admin-nav-link <?php echo e(request()->routeIs('admin.products.*') || request()->routeIs('admin.categories.*') ? 'active' : ''); ?>" 
                   data-bs-toggle="collapse" 
                   href="#productsSubmenu" 
                   role="button" 
                   aria-expanded="<?php echo e(request()->routeIs('admin.products.*') || request()->routeIs('admin.categories.*') ? 'true' : 'false'); ?>">
                    <i class="bi bi-box-seam-fill nav-icon"></i>
                    <span class="flex-grow-1">Catalog</span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse <?php echo e(request()->routeIs('admin.products.*') || request()->routeIs('admin.categories.*') ? 'show' : ''); ?>" id="productsSubmenu">
                    <div class="admin-submenu">
                        <a href="<?php echo e(route('admin.products.index')); ?>" class="admin-subnav-link <?php echo e(request()->routeIs('admin.products.index') ? 'active' : ''); ?>">
                            <i class="bi bi-dash me-1"></i> All Products
                        </a>
                        <a href="<?php echo e(route('admin.products.create')); ?>" class="admin-subnav-link <?php echo e(request()->routeIs('admin.products.create') ? 'active' : ''); ?>">
                            <i class="bi bi-dash me-1"></i> Add Product
                        </a>
                        <a href="<?php echo e(route('admin.categories.index')); ?>" class="admin-subnav-link <?php echo e(request()->routeIs('admin.categories.*') ? 'active' : ''); ?>">
                            <i class="bi bi-dash me-1"></i> Categories
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Enquiries -->
            <div class="admin-nav-item">
                <a href="<?php echo e(route('admin.contacts.index')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.contacts.*') ? 'active' : ''); ?>">
                    <i class="bi bi-chat-left-dots-fill nav-icon"></i>
                    <span class="flex-grow-1">Contact Enquiries</span>
                    <?php
                        $unreadLeadCount = \App\Models\Contact::where('status', 'new')->count();
                    ?>
                    <?php if($unreadLeadCount > 0): ?>
                        <span class="badge bg-danger rounded-pill px-2"><?php echo e($unreadLeadCount); ?></span>
                    <?php endif; ?>
                </a>
            </div>

            <div class="admin-nav-heading mt-3">Account &amp; System</div>

            <!-- Profile -->
            <div class="admin-nav-item">
                <a href="<?php echo e(route('admin.profile.edit')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.profile.*') ? 'active' : ''); ?>">
                    <i class="bi bi-person-fill-gear nav-icon"></i>
                    <span>Admin Profile</span>
                </a>
            </div>

            <!-- View Public Site -->
            <div class="admin-nav-item">
                <a href="<?php echo e(route('website.home')); ?>" target="_blank" class="admin-nav-link">
                    <i class="bi bi-box-arrow-up-right nav-icon"></i>
                    <span>Live Website</span>
                </a>
            </div>
        </div>

        <!-- Sidebar Footer / Logout -->
        <div class="admin-sidebar-footer">
            <form action="<?php echo e(route('admin.logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-outline-danger btn-sm w-100 py-2 d-flex align-items-center justify-content-center gap-2">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign Out</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Mobile Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start bg-dark text-white d-lg-none" tabindex="-1" id="adminMobileSidebar" aria-labelledby="adminMobileSidebarLabel">
        <div class="offcanvas-header border-bottom border-secondary">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-flex align-items-center text-decoration-none">
                <img src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt="Wellnox" class="admin-brand-logo">
            </a>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0 d-flex flex-column">
            <div class="admin-sidebar-menu flex-grow-1">
                <div class="admin-nav-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                        <i class="bi bi-grid-1x2-fill nav-icon"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
                <div class="admin-nav-item">
                    <a href="<?php echo e(route('admin.products.index')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.products.*') ? 'active' : ''); ?>">
                        <i class="bi bi-box-seam-fill nav-icon"></i>
                        <span>All Products</span>
                    </a>
                </div>
                <div class="admin-nav-item">
                    <a href="<?php echo e(route('admin.categories.index')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.categories.*') ? 'active' : ''); ?>">
                        <i class="bi bi-tags-fill nav-icon"></i>
                        <span>Categories</span>
                    </a>
                </div>
                <div class="admin-nav-item">
                    <a href="<?php echo e(route('admin.contacts.index')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.contacts.*') ? 'active' : ''); ?>">
                        <i class="bi bi-chat-left-dots-fill nav-icon"></i>
                        <span>Contact Enquiries</span>
                    </a>
                </div>
                <div class="admin-nav-item">
                    <a href="<?php echo e(route('admin.profile.edit')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.profile.*') ? 'active' : ''); ?>">
                        <i class="bi bi-person-fill-gear nav-icon"></i>
                        <span>Admin Profile</span>
                    </a>
                </div>
            </div>
            <div class="p-3 border-top border-secondary">
                <form action="<?php echo e(route('admin.logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-outline-danger btn-sm w-100 py-2">
                        <i class="bi bi-box-arrow-right me-1"></i> Sign Out
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content Wrapper -->
    <div class="admin-main-wrapper">
        <!-- Top Sticky Header -->
        <header class="admin-topbar">
            <div class="d-flex align-items-center gap-3">
                <!-- Mobile sidebar toggler -->
                <button class="btn btn-outline-secondary d-lg-none py-1 px-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminMobileSidebar" aria-controls="adminMobileSidebar">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <h1 class="admin-page-title"><?php echo $__env->yieldContent('page_title', 'Dashboard'); ?></h1>
            </div>

            <!-- User Menu / Actions -->
            <div class="d-flex align-items-center gap-3">
                <a href="<?php echo e(route('website.home')); ?>" target="_blank" class="btn btn-admin-outline btn-sm d-none d-sm-inline-flex align-items-center gap-1">
                    <i class="bi bi-globe"></i>
                    <span>View Site</span>
                </a>

                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle d-flex align-items-center gap-2 border py-1 px-3 rounded-pill" type="button" id="adminUserDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-5 text-secondary"></i>
                        <span class="small fw-semibold d-none d-md-inline"><?php echo e(Auth::user()->name ?? 'Administrator'); ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" aria-labelledby="adminUserDropdown">
                        <li>
                            <div class="px-3 py-2 border-bottom">
                                <p class="mb-0 fw-bold small text-dark"><?php echo e(Auth::user()->name ?? 'Administrator'); ?></p>
                                <p class="mb-0 text-muted small text-truncate" style="max-width: 200px;"><?php echo e(Auth::user()->email ?? ''); ?></p>
                            </div>
                        </li>
                        <li><a class="dropdown-item py-2" href="<?php echo e(route('admin.profile.edit')); ?>"><i class="bi bi-person me-2"></i> Edit Profile</a></li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li>
                            <form action="<?php echo e(route('admin.logout')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item py-2 text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Log Out
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Main Body Content -->
        <main class="admin-content">
            <!-- Flash Notifications -->
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm d-flex align-items-center gap-2 mb-4" role="alert">
                    <i class="bi bi-check-circle-fill fs-5 text-success"></i>
                    <div class="flex-grow-1"><?php echo e(session('success')); ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm d-flex align-items-center gap-2 mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-5 text-danger"></i>
                    <div class="flex-grow-1"><?php echo e(session('error')); ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                    <div class="fw-bold mb-1"><i class="bi bi-exclamation-octagon me-1"></i> Please check the form errors below:</div>
                    <ul class="mb-0 small ps-3">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <!-- Footer -->
        <footer class="admin-footer d-flex flex-wrap justify-content-between align-items-center">
            <span>&copy; <?php echo e(date('Y')); ?> <strong>Wellnox International Pvt. Ltd.</strong> All rights reserved.</span>
            <span class="text-muted small">CMS Version 2.0 &bull; Laravel <?php echo e(app()->version()); ?></span>
        </footer>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Admin JS -->
    <script src="<?php echo e(asset('assets/admin/js/admin.js')); ?>?v=<?php echo e(time()); ?>"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\wellnox\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>