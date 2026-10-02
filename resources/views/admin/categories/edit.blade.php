@extends('admin.layouts.app')

@section('title', 'Edit Category: ' . $category->name)
@section('page_title', 'Edit Category')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2 class="admin-card-title">Edit "{{ $category->name }}"</h2>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-admin-outline">
                        <i class="bi bi-arrow-left me-1"></i> Back to Categories
                    </a>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')

                        <!-- Category Name -->
                        <div class="mb-3">
                            <label for="name" class="admin-form-label">Category Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control admin-form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div class="mb-3">
                            <label for="slug" class="admin-form-label">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control admin-form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $category->slug) }}">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="admin-form-label">Description</label>
                            <textarea name="description" id="description" rows="3" class="form-control admin-form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Upload & Preview -->
                        <div class="mb-3">
                            <label for="catImage" class="admin-form-label">Category Image <span class="text-muted small">(Leave empty to keep existing)</span></label>
                            <input type="file" name="image" id="catImage" class="form-control admin-form-control admin-image-input @error('image') is-invalid @enderror" data-preview="catPreviewImg" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="mt-2">
                                <div class="image-preview-box">
                                    @php
                                        $currentImg = $category->image 
                                            ? (Str::startsWith($category->image, ['http', 'assets/']) ? asset($category->image) : asset('storage/' . $category->image))
                                            : '';
                                    @endphp
                                    <img id="catPreviewImg" src="{{ $currentImg }}" alt="Preview" class="{{ $currentImg ? '' : 'd-none' }}">
                                    <span class="text-muted small {{ $currentImg ? 'd-none' : '' }}" id="noImgText">No image</span>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <!-- Sort Order -->
                            <div class="col-sm-6">
                                <label for="sort_order" class="admin-form-label">Sort Order</label>
                                <input type="number" name="sort_order" id="sort_order" class="form-control admin-form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $category->sort_order) }}" min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="col-sm-6">
                                <label for="status" class="admin-form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-select admin-form-select @error('status') is-invalid @enderror">
                                    <option value="1" {{ old('status', $category->status) == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $category->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-light px-4">Cancel</a>
                            <button type="submit" class="btn btn-admin-bronze px-4">
                                <i class="bi bi-check2 me-1"></i> Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
