@extends('admin.layouts.app')

@section('title', 'Product: ' . $product->name)
@section('page_title', 'Product Details')

@section('content')

    <div class="row g-4">
        <!-- Main Product Card -->
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2 class="admin-card-title">{{ $product->name }}</h2>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-admin-bronze">
                            <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-admin-outline">
                            <i class="bi bi-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>
                <div class="admin-card-body">
                    <!-- Image and Basic Info -->
                    <div class="row g-4 mb-4">
                        <div class="col-md-5">
                            <div class="border rounded-3 p-2 bg-light text-center">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid rounded" style="max-height: 260px; object-fit: contain;">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <table class="table table-borderless small mb-0">
                                <tr>
                                    <td class="text-muted fw-bold" width="130">CATEGORY:</td>
                                    <td>
                                        <span class="badge bg-secondary rounded-pill px-2.5">
                                            {{ $product->category ? $product->category->name : 'Unassigned' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted fw-bold">SUBCATEGORY:</td>
                                    <td>
                                        @if($product->subcategory)
                                            <span class="badge bg-dark rounded-pill px-2.5">
                                                {{ $product->subcategory->name }}
                                            </span>
                                        @else
                                            <span class="text-muted fst-italic">None</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted fw-bold">SIZE / DIMENSION:</td>
                                    <td>
                                        <strong>{{ $product->size ?: 'Not specified' }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted fw-bold">COLOR / FINISH:</td>
                                    <td>
                                        @if($product->color)
                                            <span class="badge bg-warning text-dark border px-2.5">{{ $product->color }}</span>
                                        @else
                                            <span class="text-muted fst-italic">No color</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted fw-bold">SLUG:</td>
                                    <td><code>{{ $product->slug }}</code></td>
                                </tr>
                                <tr>
                                    <td class="text-muted fw-bold">STATUS:</td>
                                    <td>
                                        @if($product->status)
                                            <span class="badge-status-active">Active</span>
                                        @else
                                            <span class="badge-status-inactive">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted fw-bold">SORT ORDER:</td>
                                    <td>{{ $product->sort_order }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted fw-bold">ADDED ON:</td>
                                    <td>{{ $product->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted fw-bold">LAST UPDATED:</td>
                                    <td>{{ $product->updated_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Short Description -->
                    @if($product->short_description)
                        <div class="mb-4">
                            <h5 class="fw-bold fs-6 text-dark border-bottom pb-2">Short Description / Subtitle</h5>
                            <p class="text-muted">{{ $product->short_description }}</p>
                        </div>
                    @endif

                    <!-- Detailed Description -->
                    <div>
                        <h5 class="fw-bold fs-6 text-dark border-bottom pb-2">Technical Description &amp; Specifications</h5>
                        <div class="text-secondary" style="white-space: pre-line; line-height: 1.7;">
                            {{ $product->description ?: 'No detailed technical description provided.' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Meta Sidebar -->
        <div class="col-lg-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2 class="admin-card-title">Quick Actions</h2>
                </div>
                <div class="admin-card-body d-flex flex-column gap-2">
                    <form action="{{ route('admin.products.toggle-status', $product) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-secondary w-100 text-start d-flex justify-content-between align-items-center">
                            <span>Toggle Active Status</span>
                            <i class="bi bi-toggle-on fs-5"></i>
                        </button>
                    </form>

                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-outline-primary text-start d-flex justify-content-between align-items-center">
                        <span>Edit Product Info</span>
                        <i class="bi bi-pencil fs-5"></i>
                    </a>

                    <a href="{{ route('website.home') }}#popular-designs" target="_blank" class="btn btn-outline-dark text-start d-flex justify-content-between align-items-center">
                        <span>Preview on Website</span>
                        <i class="bi bi-box-arrow-up-right fs-5"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
