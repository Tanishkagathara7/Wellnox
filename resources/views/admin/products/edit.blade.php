@extends('admin.layouts.app')

@section('title', 'Edit Product: ' . $product->name)
@section('page_title', 'Edit Product')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2 class="admin-card-title">Edit "{{ $product->name }}"</h2>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-admin-outline">
                        <i class="bi bi-arrow-left me-1"></i> Back to Products
                    </a>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="row g-3 mb-3">
                            <!-- Product Name -->
                            <div class="col-md-7">
                                <label for="name" class="admin-form-label">Product Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control admin-form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div class="col-md-5">
                                <label for="category_id" class="admin-form-label">Category <span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-select admin-form-select @error('category_id') is-invalid @enderror" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Slug -->
                        <div class="mb-3">
                            <label for="slug" class="admin-form-label">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control admin-form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $product->slug) }}">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Short Description -->
                        <div class="mb-3">
                            <label for="short_description" class="admin-form-label">Short Description / Subtitle</label>
                            <input type="text" name="short_description" id="short_description" class="form-control admin-form-control @error('short_description') is-invalid @enderror" value="{{ old('short_description', $product->short_description) }}">
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Full Description -->
                        <div class="mb-3">
                            <label for="description" class="admin-form-label">Full Technical Description &amp; Specifications</label>
                            <textarea name="description" id="description" rows="5" class="form-control admin-form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label for="prodImage" class="admin-form-label">Product Image <span class="text-muted small">(Leave empty to retain existing)</span></label>
                            <input type="file" name="image" id="prodImage" class="form-control admin-form-control admin-image-input @error('image') is-invalid @enderror" data-preview="prodPreviewImg" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="mt-2">
                                <div class="image-preview-box">
                                    <img id="prodPreviewImg" src="{{ $product->image_url }}" alt="Preview">
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <!-- Sort Order -->
                            <div class="col-sm-6">
                                <label for="sort_order" class="admin-form-label">Sort Order</label>
                                <input type="number" name="sort_order" id="sort_order" class="form-control admin-form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $product->sort_order) }}" min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="col-sm-6">
                                <label for="status" class="admin-form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-select admin-form-select @error('status') is-invalid @enderror">
                                    <option value="1" {{ old('status', $product->status) == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $product->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-light px-4">Cancel</a>
                            <button type="submit" class="btn btn-admin-bronze px-4">
                                <i class="bi bi-check2 me-1"></i> Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
