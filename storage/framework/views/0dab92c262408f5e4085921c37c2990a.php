<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page_title', 'Overview & Analytics'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Summary Metric Cards -->
    <div class="row g-3 g-xl-4 mb-4">
        <!-- Total Products -->
        <div class="col-sm-6 col-xl-3">
            <div class="admin-stat-card">
                <div>
                    <h3 class="admin-stat-number"><?php echo e($totalProducts); ?></h3>
                    <p class="admin-stat-label">Total Products</p>
                </div>
                <div class="admin-stat-icon-wrap icon-bronze">
                    <i class="bi bi-box-seam"></i>
                </div>
            </div>
        </div>

        <!-- Active Products -->
        <div class="col-sm-6 col-xl-3">
            <div class="admin-stat-card">
                <div>
                    <h3 class="admin-stat-number"><?php echo e($activeProducts); ?></h3>
                    <p class="admin-stat-label">Active Products</p>
                </div>
                <div class="admin-stat-icon-wrap icon-green">
                    <i class="bi bi-check2-circle"></i>
                </div>
            </div>
        </div>

        <!-- Total Enquiries -->
        <div class="col-sm-6 col-xl-3">
            <div class="admin-stat-card">
                <div>
                    <h3 class="admin-stat-number"><?php echo e($totalEnquiries); ?></h3>
                    <p class="admin-stat-label">Total Enquiries</p>
                </div>
                <div class="admin-stat-icon-wrap icon-blue">
                    <i class="bi bi-chat-dots"></i>
                </div>
            </div>
        </div>

        <!-- New Enquiries -->
        <div class="col-sm-6 col-xl-3">
            <div class="admin-stat-card">
                <div>
                    <h3 class="admin-stat-number text-danger"><?php echo e($newEnquiries); ?></h3>
                    <p class="admin-stat-label">New Enquiries</p>
                </div>
                <div class="admin-stat-icon-wrap icon-dark">
                    <i class="bi bi-bell-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Navigation Shortcuts -->
    <div class="d-flex flex-wrap gap-2 mb-4">
        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-admin-bronze d-inline-flex align-items-center gap-2">
            <i class="bi bi-plus-circle"></i>
            <span>Add New Product</span>
        </a>
        <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-admin-dark d-inline-flex align-items-center gap-2">
            <i class="bi bi-box-seam"></i>
            <span>View All Products</span>
        </a>
        <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn btn-admin-outline d-inline-flex align-items-center gap-2">
            <i class="bi bi-tags"></i>
            <span>Manage Categories</span>
        </a>
        <a href="<?php echo e(route('admin.contacts.index')); ?>" class="btn btn-admin-outline d-inline-flex align-items-center gap-2">
            <i class="bi bi-envelope"></i>
            <span>View Enquiries</span>
            <?php if($newEnquiries > 0): ?>
                <span class="badge bg-danger rounded-pill"><?php echo e($newEnquiries); ?></span>
            <?php endif; ?>
        </a>
    </div>

    <div class="row g-4">
        <!-- Recent Enquiries Table -->
        <div class="col-lg-8">
            <div class="admin-card mb-0">
                <div class="admin-card-header">
                    <h2 class="admin-card-title">Recent Contact Enquiries</h2>
                    <a href="<?php echo e(route('admin.contacts.index')); ?>" class="small text-decoration-none fw-semibold text-muted">
                        View All <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="admin-card-body p-0">
                    <div class="admin-table-wrap">
                        <table class="table admin-table">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Phone / Email</th>
                                    <th>Status</th>
                                    <th>Received</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $recentEnquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-dark"><?php echo e($enquiry->name); ?></div>
                                            <div class="small text-muted text-truncate" style="max-width: 220px;">
                                                <?php echo e(Str::limit($enquiry->message, 45)); ?>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="small"><i class="bi bi-telephone text-muted me-1"></i> <?php echo e($enquiry->phone); ?></div>
                                            <div class="small text-muted"><i class="bi bi-envelope text-muted me-1"></i> <?php echo e($enquiry->email); ?></div>
                                        </td>
                                        <td>
                                            <?php if($enquiry->status === 'new'): ?>
                                                <span class="badge-enquiry-new">New</span>
                                            <?php elseif($enquiry->status === 'read'): ?>
                                                <span class="badge-enquiry-read">Read</span>
                                            <?php elseif($enquiry->status === 'replied'): ?>
                                                <span class="badge-enquiry-replied">Replied</span>
                                            <?php else: ?>
                                                <span class="badge-enquiry-archived">Archived</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="small text-muted">
                                            <?php echo e($enquiry->created_at->diffForHumans()); ?>

                                        </td>
                                        <td class="text-end">
                                            <a href="<?php echo e(route('admin.contacts.show', $enquiry)); ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="admin-empty-state">
                                            <i class="bi bi-inbox empty-icon"></i>
                                            <p class="mb-0 text-muted">No contact enquiries received yet.</p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Products Sidebar Card -->
        <div class="col-lg-4">
            <div class="admin-card mb-0">
                <div class="admin-card-header">
                    <h2 class="admin-card-title">Recent Products</h2>
                    <a href="<?php echo e(route('admin.products.index')); ?>" class="small text-decoration-none fw-semibold text-muted">
                        All <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="admin-card-body p-3">
                    <?php $__empty_1 = true; $__currentLoopData = $recentProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="d-flex align-items-center gap-3 py-2 border-bottom">
                            <img src="<?php echo e($prod->image_url); ?>" alt="<?php echo e($prod->name); ?>" class="admin-thumb flex-shrink-0">
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="mb-0 text-truncate font-weight-bold"><?php echo e($prod->name); ?></h6>
                                <span class="small text-muted"><?php echo e($prod->category ? $prod->category->name : 'Uncategorized'); ?></span>
                            </div>
                            <div>
                                <?php if($prod->status): ?>
                                    <span class="badge-status-active">Active</span>
                                <?php else: ?>
                                    <span class="badge-status-inactive">Inactive</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="admin-empty-state py-4">
                            <i class="bi bi-box empty-icon"></i>
                            <p class="mb-2 text-muted small">No products added yet.</p>
                            <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-admin-bronze btn-sm">
                                Add Product
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\wellnox\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>