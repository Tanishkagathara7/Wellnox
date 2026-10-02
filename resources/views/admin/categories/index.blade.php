@extends('admin.layouts.app')

@section('title', 'Product Categories')
@section('page_title', 'Product Categories')

@section('content')

    <!-- Action Bar & Filters -->
    <div class="admin-card mb-4">
        <div class="admin-card-body p-3">
            <div class="row g-3 align-items-center justify-content-between">
                <!-- Search & Status Form -->
                <div class="col-md-8">
                    <form method="GET" action="{{ route('admin.categories.index') }}" class="row g-2 align-items-center">
                        <div class="col-sm-7 col-md-6">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                                <input type="text" name="search" class="form-control admin-form-control border-start-0" placeholder="Search categories..." value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <select name="status" class="form-select admin-form-select" onchange="this.form.submit()">
                                <option value="">All Statuses</option>
                                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        @if(request()->hasAny(['search', 'status']))
                            <div class="col-sm-1">
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary" title="Clear Filters">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            </div>
                        @endif
                    </form>
                </div>

                <!-- Add Category CTA -->
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-admin-bronze d-inline-flex align-items-center gap-2">
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
            <h2 class="admin-card-title">All Categories ({{ $categories->total() }})</h2>
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
                        @forelse($categories as $category)
                            <tr>
                                <td class="text-muted small">{{ $category->id }}</td>
                                <td>
                                    @if($category->image)
                                        <img src="{{ Str::startsWith($category->image, ['http', 'assets/']) ? asset($category->image) : asset('storage/' . $category->image) }}" 
                                             alt="{{ $category->name }}" 
                                             class="admin-thumb">
                                    @else
                                        <div class="admin-thumb d-flex align-items-center justify-content-center bg-light text-muted">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $category->name }}</div>
                                    @if($category->description)
                                        <div class="small text-muted text-truncate" style="max-width: 280px;">{{ $category->description }}</div>
                                    @endif
                                </td>
                                <td>
                                    <code class="small text-muted">{{ $category->slug }}</code>
                                </td>
                                <td>
                                    <span class="badge bg-secondary rounded-pill px-2.5">{{ $category->products_count }}</span>
                                </td>
                                <td>{{ $category->sort_order }}</td>
                                <td>
                                    <form action="{{ route('admin.categories.toggle-status', $category) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="border-0 bg-transparent p-0" title="Click to toggle status">
                                            @if($category->status)
                                                <span class="badge-status-active">Active</span>
                                            @else
                                                <span class="badge-status-inactive">Inactive</span>
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete with Modal -->
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteCatModal{{ $category->id }}" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteCatModal{{ $category->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header border-0 pb-0">
                                                    <h5 class="modal-title fw-bold text-danger">Delete Category</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start py-3">
                                                    Are you sure you want to delete category <strong>"{{ $category->name }}"</strong>?
                                                    @if($category->products_count > 0)
                                                        <div class="alert alert-warning small mt-2 mb-0">
                                                            <i class="bi bi-exclamation-triangle me-1"></i> Warning: This category has <strong>{{ $category->products_count }}</strong> associated product(s).
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="modal-footer border-0 pt-0">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="admin-empty-state">
                                    <i class="bi bi-tags empty-icon"></i>
                                    <h5>No Categories Found</h5>
                                    <p class="text-muted small">No product categories match your query or none have been added yet.</p>
                                    <a href="{{ route('admin.categories.create') }}" class="btn btn-admin-bronze btn-sm">Add New Category</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($categories->hasPages())
                <div class="p-3 border-top d-flex justify-content-between align-items-center">
                    <span class="text-muted small">Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }}</span>
                    <div>
                        {{ $categories->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
