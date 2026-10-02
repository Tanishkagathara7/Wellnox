<?php $__env->startSection('title', 'Contact Enquiries'); ?>
<?php $__env->startSection('page_title', 'Contact Enquiries'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Status Tabs & Filter Card -->
    <div class="admin-card mb-4">
        <div class="admin-card-body p-3">
            <div class="row g-3 align-items-center justify-content-between">
                <!-- Status Pills -->
                <div class="col-lg-7">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="<?php echo e(route('admin.contacts.index')); ?>" class="btn btn-sm <?php echo e(!request('status') ? 'btn-dark' : 'btn-outline-secondary'); ?> rounded-pill px-3">
                            All (<?php echo e($statusCounts['all']); ?>)
                        </a>
                        <a href="<?php echo e(route('admin.contacts.index', ['status' => 'new'])); ?>" class="btn btn-sm <?php echo e(request('status') === 'new' ? 'btn-warning text-dark' : 'btn-outline-warning text-dark'); ?> rounded-pill px-3">
                            New (<?php echo e($statusCounts['new']); ?>)
                        </a>
                        <a href="<?php echo e(route('admin.contacts.index', ['status' => 'read'])); ?>" class="btn btn-sm <?php echo e(request('status') === 'read' ? 'btn-primary' : 'btn-outline-primary'); ?> rounded-pill px-3">
                            Read (<?php echo e($statusCounts['read']); ?>)
                        </a>
                        <a href="<?php echo e(route('admin.contacts.index', ['status' => 'replied'])); ?>" class="btn btn-sm <?php echo e(request('status') === 'replied' ? 'btn-success' : 'btn-outline-success'); ?> rounded-pill px-3">
                            Replied (<?php echo e($statusCounts['replied']); ?>)
                        </a>
                        <a href="<?php echo e(route('admin.contacts.index', ['status' => 'archived'])); ?>" class="btn btn-sm <?php echo e(request('status') === 'archived' ? 'btn-secondary' : 'btn-outline-secondary'); ?> rounded-pill px-3">
                            Archived (<?php echo e($statusCounts['archived']); ?>)
                        </a>
                    </div>
                </div>

                <!-- Search Input -->
                <div class="col-lg-5">
                    <form method="GET" action="<?php echo e(route('admin.contacts.index')); ?>" class="d-flex gap-2">
                        <?php if(request('status')): ?>
                            <input type="hidden" name="status" value="<?php echo e(request('status')); ?>">
                        <?php endif; ?>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                            <input type="text" name="search" class="form-control admin-form-control border-start-0" placeholder="Search name, email, phone, subject..." value="<?php echo e(request('search')); ?>">
                        </div>
                        <button type="submit" class="btn btn-admin-bronze">Search</button>
                        <?php if(request()->hasAny(['search', 'status'])): ?>
                            <a href="<?php echo e(route('admin.contacts.index')); ?>" class="btn btn-outline-secondary" title="Clear">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Enquiries Table Card -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">Enquiries (<?php echo e($contacts->total()); ?>)</h2>
        </div>
        <div class="admin-card-body p-0">
            <div class="admin-table-wrap">
                <table class="table admin-table">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th>Client Name</th>
                            <th>Contact Details</th>
                            <th>Subject / Inquiry</th>
                            <th>Status</th>
                            <th>Submitted Date</th>
                            <th width="160" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="<?php echo e($contact->status === 'new' ? 'table-warning bg-opacity-10' : ''); ?>">
                                <td class="text-muted small"><?php echo e($contact->id); ?></td>
                                <td>
                                    <div class="fw-bold text-dark"><?php echo e($contact->name); ?></div>
                                    <?php if($contact->status === 'new'): ?>
                                        <span class="badge bg-danger rounded-pill x-small" style="font-size: 10px;">UNREAD</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="small fw-semibold">
                                        <a href="tel:<?php echo e($contact->phone); ?>" class="text-decoration-none text-dark">
                                            <i class="bi bi-telephone text-muted me-1"></i> <?php echo e($contact->phone); ?>

                                        </a>
                                    </div>
                                    <div class="small text-muted">
                                        <a href="mailto:<?php echo e($contact->email); ?>" class="text-decoration-none text-muted">
                                            <i class="bi bi-envelope text-muted me-1"></i> <?php echo e($contact->email); ?>

                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold text-truncate" style="max-width: 250px;"><?php echo e($contact->subject); ?></div>
                                    <div class="small text-muted text-truncate" style="max-width: 280px;">
                                        <?php echo e(Str::limit($contact->message, 50)); ?>

                                    </div>
                                </td>
                                <td>
                                    <?php if($contact->status === 'new'): ?>
                                        <span class="badge-enquiry-new">New</span>
                                    <?php elseif($contact->status === 'read'): ?>
                                        <span class="badge-enquiry-read">Read</span>
                                    <?php elseif($contact->status === 'replied'): ?>
                                        <span class="badge-enquiry-replied">Replied</span>
                                    <?php else: ?>
                                        <span class="badge-enquiry-archived">Archived</span>
                                    <?php endif; ?>
                                </td>
                                <td class="small text-muted">
                                    <?php echo e($contact->created_at->format('d M Y, h:i A')); ?>

                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <a href="<?php echo e(route('admin.contacts.show', $contact)); ?>" class="btn btn-sm btn-outline-primary" title="View Enquiry">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <!-- Delete Confirmation Trigger -->
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteContactModal<?php echo e($contact->id); ?>" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteContactModal<?php echo e($contact->id); ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header border-0 pb-0">
                                                    <h5 class="modal-title fw-bold text-danger">Delete Enquiry</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start py-3">
                                                    Are you sure you want to permanently delete enquiry from <strong>"<?php echo e($contact->name); ?>"</strong>?
                                                </div>
                                                <div class="modal-footer border-0 pt-0">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                    <form action="<?php echo e(route('admin.contacts.destroy', $contact)); ?>" method="POST">
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
                                <td colspan="7" class="admin-empty-state">
                                    <i class="bi bi-chat-left-dots empty-icon"></i>
                                    <h5>No Enquiries Found</h5>
                                    <p class="text-muted small">No contact submissions match the selected status or search term.</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if($contacts->hasPages()): ?>
                <div class="p-3 border-top d-flex justify-content-between align-items-center">
                    <span class="text-muted small">Showing <?php echo e($contacts->firstItem()); ?> to <?php echo e($contacts->lastItem()); ?> of <?php echo e($contacts->total()); ?></span>
                    <div>
                        <?php echo e($contacts->links('pagination::bootstrap-5')); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\wellnox\resources\views/admin/contacts/index.blade.php ENDPATH**/ ?>