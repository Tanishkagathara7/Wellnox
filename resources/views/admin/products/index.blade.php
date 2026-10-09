@extends('admin.layouts.app')

@section('title', 'Products Management')
@section('page_title', 'All Products')

@section('content')

    <!-- Search & Filter Card -->
    <div class="admin-card mb-4">
        <div class="admin-card-body p-3">
            <div class="row g-3 align-items-center justify-content-between">
                <!-- Search & Filters -->
                <div class="col-md-9">
                    <form method="GET" action="{{ route('admin.products.index') }}" class="row g-2 align-items-center">
                        <div class="col-sm-5 col-md-5">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                                <input type="text" name="search" class="form-control admin-form-control border-start-0" placeholder="Search product name / slug..." value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <select name="category_id" class="form-select admin-form-select" onchange="this.form.submit()">
                                <option value="">All Categories</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <select name="status" class="form-select admin-form-select" onchange="this.form.submit()">
                                <option value="">All Statuses</option>
                                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        @if(request()->hasAny(['search', 'category_id', 'status']))
                            <div class="col-sm-1">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary" title="Reset Filters">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            </div>
                        @endif
                    </form>
                </div>

                <!-- Add Product CTA -->
                <div class="col-md-3 text-md-end">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-admin-bronze d-inline-flex align-items-center gap-2">
                        <i class="bi bi-plus-circle"></i>
                        <span>Add Product</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Table Card -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">Products ({{ $products->total() }})</h2>
        </div>
        <div class="admin-card-body p-0">
            <div class="admin-table-wrap">
                <table class="table admin-table">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th width="75">Image</th>
                            <th>Product Name</th>
                            <th>Hierarchy</th>
                            <th>Size &amp; Color</th>
                            <th>Status</th>
                            <th>Sort Order</th>
                            <th width="170" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td class="text-muted small">{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="admin-thumb">
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $product->name }}</div>
                                    <div class="small text-muted text-truncate" style="max-width: 230px;">
                                        {{ $product->short_description ?: 'No short description' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="small fw-semibold text-dark">{{ $product->category ? $product->category->name : 'Unassigned' }}</div>
                                    @if($product->subcategory)
                                        <div class="small text-secondary"><i class="bi bi-arrow-return-right me-1"></i>{{ $product->subcategory->name }}</div>
                                    @else
                                        <span class="badge bg-light text-muted border">No Subcategory</span>
                                    @endif
                                </td>
                                <td>
                                    @if($product->size)
                                        <div class="small"><i class="bi bi-rulers me-1 text-muted"></i>{{ $product->size }}</div>
                                    @endif
                                    @if($product->color)
                                        <div class="small text-primary"><i class="bi bi-palette me-1"></i>{{ $product->color }}</div>
                                    @else
                                        <span class="badge bg-light text-muted border">No Color</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.products.toggle-status', $product) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="border-0 bg-transparent p-0" title="Click to toggle status">
                                            @if($product->status)
                                                <span class="badge-status-active">Active</span>
                                            @else
                                                <span class="badge-status-inactive">Inactive</span>
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $product->sort_order }}</td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('admin.products.show', $product) }}" class="btn btn-sm btn-outline-secondary" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete Trigger Button -->
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteProdModal{{ $product->id }}" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteProdModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header border-0 pb-0">
                                                    <h5 class="modal-title fw-bold text-danger">Delete Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start py-3">
                                                    Are you sure you want to permanently delete product <strong>"{{ $product->name }}"</strong>? This action cannot be undone.
                                                </div>
                                                <div class="modal-footer border-0 pt-0">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
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
                                    <i class="bi bi-box empty-icon"></i>
                                    <h5>No Products Found</h5>
                                    <p class="text-muted small">Try adjusting your filters or create your first product catalog item.</p>
                                    <a href="{{ route('admin.products.create') }}" class="btn btn-admin-bronze btn-sm">Add New Product</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination with Query Preservation -->
            @if($products->hasPages())
                <div class="p-3 border-top d-flex justify-content-between align-items-center">
                    <span class="text-muted small">Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }}</span>
                    <div>
                        {{ $products->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
