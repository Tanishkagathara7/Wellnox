<?php $__env->startSection('title', 'Product Categories'); ?>
<?php $__env->startSection('page_title', 'Product Categories'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Action Bar & Filters -->
    <div class="admin-card mb-4">
        <div class="admin-card-body p-3">
            <div class="row g-3 align-items-center justify-content-between">
                <!-- Search & Status Form -->
                <div class="col-md-8">
                    <form method="GET" action="<?php echo e(route('admin.categories.index')); ?>" class="row g-2 align-items-center">
                        <div class="col-sm-7 col-md-6">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                                <input type="text" name="search" class="form-control admin-form-control border-start-0" placeholder="Search categories..." value="<?php echo e(request('search')); ?>">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <select name="status" class="form-select admin-form-select" onchange="this.form.submit()">
                                <option value="">All Statuses</option>
                                <option value="1" <?php echo e(request('status') === '1' ? 'selected' : ''); ?>>Active</option>
                                <option value="0" <?php echo e(request('status') === '0' ? 'selected' : ''); ?>>Inactive</option>
                            </select>
                        </div>
                        <?php if(request()->hasAny(['search', 'status'])): ?>
                            <div class="col-sm-1">
                                <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn btn-outline-secondary" title="Clear Filters">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>

                <!-- Add Category CTA -->
                <div class="col-md-4 text-md-end">
                    <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-admin-bronze d-inline-flex align-items-center gap-2">
                        <i class="bi bi-plus-circle"></i>
                        <span>Add Category</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Table Card -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">All Categories (<?php echo e($categories->total()); ?>)</h2>
        </div>
        <div class="admin-card-body p-0">
            <div class="admin-table-wrap">
                <table class="table admin-table">
                    <thead>
                        <tr>
                            <th width="60">#</th>
                            <th width="80">Image</th>
                            <th>Category Name</th>
                            <th>Slug</th>
                            <th>Products</th>
                            <th>Sort Order</th>
                            <th>Status</th>
                            <th width="160" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="text-muted small"><?php echo e($category->id); ?></td>
                                <td>
                                    <?php if($category->image): ?>
                                        <img src="<?php echo e(Str::startsWith($category->image, ['http', 'assets/']) ? asset($category->image) : asset('storage/' . $category->image)); ?>" 
                                             alt="<?php echo e($category->name); ?>" 
                                             class="admin-thumb">
                                    <?php else: ?>
                                        <div class="admin-thumb d-flex align-items-center justify-content-center bg-light text-muted">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark"><?php echo e($category->name); ?></div>
                                    <?php if($category->description): ?>
                                        <div class="small text-muted text-truncate" style="max-width: 280px;"><?php echo e($category->description); ?></div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <code class="small text-muted"><?php echo e($category->slug); ?></code>
                                </td>
                                <td>
                                    <span class="badge bg-secondary rounded-pill px-2.5"><?php echo e($category->products_count); ?></span>
                                </td>
                                <td><?php echo e($category->sort_order); ?></td>
                                <td>
                                    <form action="<?php echo e(route('admin.categories.toggle-status', $category)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <button type="submit" class="border-0 bg-transparent p-0" title="Click to toggle status">
                                            <?php if($category->status): ?>
                                                <span class="badge-status-active">Active</span>
                                            <?php else: ?>
                                                <span class="badge-status-inactive">Inactive</span>
                                            <?php endif; ?>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <a href="<?php echo e(route('admin.categories.edit', $category)); ?>" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete with Modal -->
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteCatModal<?php echo e($category->id); ?>" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteCatModal<?php echo e($category->id); ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header border-0 pb-0">
                                                    <h5 class="modal-title fw-bold text-danger">Delete Category</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start py-3">
                                                    Are you sure you want to delete category <strong>"<?php echo e($category->name); ?>"</strong>?
                                                    <?php if($category->products_count > 0): ?>
                                                        <div class="alert alert-warning small mt-2 mb-0">
                                                            <i class="bi bi-exclamation-triangle me-1"></i> Warning: This category has <strong><?php echo e($category->products_count); ?></strong> associated product(s).
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="modal-footer border-0 pt-0">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                    <form action="<?php echo e(route('admin.categories.destroy', $category)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="8" class="admin-empty-state">
                                    <i class="bi bi-tags empty-icon"></i>
                                    <h5>No Categories Found</h5>
                                    <p class="text-muted small">No product categories match your query or none have been added yet.</p>
                                    <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-admin-bronze btn-sm">Add New Category</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if($categories->hasPages()): ?>
                <div class="p-3 border-top d-flex justify-content-between align-items-center">
                    <span class="text-muted small">Showing <?php echo e($categories->firstItem()); ?> to <?php echo e($categories->lastItem()); ?> of <?php echo e($categories->total()); ?></span>
                    <div>
                        <?php echo e($categories->links('pagination::bootstrap-5')); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\wellnox\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>