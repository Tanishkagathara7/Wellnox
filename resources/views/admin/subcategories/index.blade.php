@extends('admin.layouts.app')

@section('title', 'Product Subcategories')
@section('page_title', 'Product Subcategories')

@section('content')

    <!-- Action Bar & Filters -->
    <div class="admin-card mb-4">
        <div class="admin-card-body p-3">
            <div class="row g-3 align-items-center justify-content-between">
                <!-- Search & Status Form -->
                <div class="col-md-8">
                    <form method="GET" action="{{ route('admin.subcategories.index') }}" class="row g-2 align-items-center">
                        <div class="col-sm-5 col-md-5">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                                <input type="text" name="search" class="form-control admin-form-control border-start-0" placeholder="Search subcategories..." value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <select name="category_id" class="form-select admin-form-select" onchange="this.form.submit()">
                                <option value="">All Parent Categories</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <select name="status" class="form-select admin-form-select" onchange="this.form.submit()">
                                <option value="">All Status</option>
                                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        @if(request()->hasAny(['search', 'category_id', 'status']))
                            <div class="col-sm-1">
                                <a href="{{ route('admin.subcategories.index') }}" class="btn btn-outline-secondary" title="Clear Filters">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            </div>
                        @endif
                    </form>
                </div>

                <!-- Add Subcategory CTA -->
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('admin.subcategories.create') }}" class="btn btn-admin-bronze d-inline-flex align-items-center gap-2">
                        <i class="bi bi-plus-circle"></i>
                        <span>Add Subcategory</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Subcategories Table Card -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">All Subcategories ({{ $subcategories->total() }})</h2>
        </div>
        <div class="admin-card-body p-0">
            <div class="admin-table-wrap">
                <table class="table admin-table">
                    <thead>
                        <tr>
                            <th width="60">#</th>
                            <th width="80">Image</th>
                            <th>Subcategory Name</th>
                            <th>Parent Category</th>
                            <th>Slug</th>
                            <th>Products</th>
                            <th>Sort Order</th>
                            <th>Status</th>
                            <th width="160" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subcategories as $sub)
                            <tr>
                                <td class="text-muted small">{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $sub->image_url }}" alt="{{ $sub->name }}" class="admin-thumb">
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $sub->name }}</div>
                                    @if($sub->description)
                                        <div class="small text-muted text-truncate" style="max-width: 250px;">{{ $sub->description }}</div>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">{{ $sub->category ? $sub->category->name : 'Unassigned' }}</span>
                                </td>
                                <td>
                                    <code class="small text-muted">{{ $sub->slug }}</code>
                                </td>
                                <td>
                                    <span class="badge bg-secondary rounded-pill px-2.5">{{ $sub->products_count }}</span>
                                </td>
                                <td>{{ $sub->sort_order }}</td>
                                <td>
                                    <form action="{{ route('admin.subcategories.toggle-status', $sub) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="border-0 bg-transparent p-0" title="Click to toggle status">
                                            @if($sub->status)
                                                <span class="badge-status-active">Active</span>
                                            @else
                                                <span class="badge-status-inactive">Inactive</span>
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('admin.subcategories.edit', $sub) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete with Modal -->
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteSubModal{{ $sub->id }}" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteSubModal{{ $sub->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header border-0 pb-0">
                                                    <h5 class="modal-title fw-bold text-danger">Delete Subcategory</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start py-3">
                                                    Are you sure you want to delete subcategory <strong>"{{ $sub->name }}"</strong>?
                                                    @if($sub->products_count > 0)
                                                        <div class="alert alert-warning small mt-2 mb-0">
                                                            <i class="bi bi-exclamation-triangle me-1"></i> Warning: This subcategory has <strong>{{ $sub->products_count }}</strong> associated product(s).
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="modal-footer border-0 pt-0">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('admin.subcategories.destroy', $sub) }}" method="POST">
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
                                <td colspan="9" class="admin-empty-state">
                                    <i class="bi bi-diagram-3 empty-icon"></i>
                                    <h5>No Subcategories Found</h5>
                                    <p class="text-muted small">No subcategories match your query or none have been added yet.</p>
                                    <a href="{{ route('admin.subcategories.create') }}" class="btn btn-admin-bronze btn-sm">Add New Subcategory</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($subcategories->hasPages())
                <div class="p-3 border-top d-flex justify-content-between align-items-center">
                    <span class="text-muted small">Showing {{ $subcategories->firstItem() }} to {{ $subcategories->lastItem() }} of {{ $subcategories->total() }}</span>
                    <div>
                        {{ $subcategories->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
