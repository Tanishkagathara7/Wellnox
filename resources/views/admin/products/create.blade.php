@extends('admin.layouts.app')

@section('title', 'Add New Product')
@section('page_title', 'Create Product')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2 class="admin-card-title">Product Details</h2>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-admin-outline">
                        <i class="bi bi-arrow-left me-1"></i> Back to Products
                    </a>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="row g-3 mb-3">
                            <!-- Product Name -->
                            <div class="col-md-6">
                                <label for="name" class="admin-form-label">Product Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control admin-form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="e.g. Linear Shower Channel Drainer 600mm" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div class="col-md-3">
                                <label for="category_id" class="admin-form-label">Category <span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-select admin-form-select @error('category_id') is-invalid @enderror" required onchange="filterSubcategories(this.value)">
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Subcategory -->
                            <div class="col-md-3">
                                <label for="subcategory_id" class="admin-form-label">Subcategory</label>
                                <select name="subcategory_id" id="subcategory_id" class="form-select admin-form-select @error('subcategory_id') is-invalid @enderror">
                                    <option value="">-- Optional Subcategory --</option>
                                    @foreach($categories as $cat)
                                        @foreach($cat->subcategories as $sub)
                                            <option value="{{ $sub->id }}" data-category-id="{{ $cat->id }}" {{ old('subcategory_id') == $sub->id ? 'selected' : '' }}>
                                                {{ $sub->name }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                                @error('subcategory_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Slug -->
                        <div class="mb-3">
                            <label for="slug" class="admin-form-label">Slug <span class="text-muted small">(Leave empty to generate automatically from name)</span></label>
                            <input type="text" name="slug" id="slug" class="form-control admin-form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" placeholder="e.g. linear-shower-channel-600mm">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Size & Color Row -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="size" class="admin-form-label">Size / Dimension <span class="text-danger">*</span></label>
                                <input type="text" name="size" id="size" class="form-control admin-form-control @error('size') is-invalid @enderror" value="{{ old('size') }}" placeholder="e.g. 600mm, 24 Inch, 150x150mm, 4 Steps, 250ml">
                                <span class="text-muted small">Standard dimensions, capacity, or step count</span>
                                @error('size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="color" class="admin-form-label">Color / Finish <span class="text-muted small">(Optional - leave blank if not applicable)</span></label>
                                <input type="text" name="color" id="color" class="form-control admin-form-control @error('color') is-invalid @enderror" value="{{ old('color') }}" placeholder="e.g. Rose Gold, Matte Black, Chrome Mirror, Gold">
                                <span class="text-muted small">Optional color or PVD finish (some products have no color)</span>
                                @error('color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Short Description -->
                        <div class="mb-3">
                            <label for="short_description" class="admin-form-label">Short Description / Subtitle</label>
                            <input type="text" name="short_description" id="short_description" class="form-control admin-form-control @error('short_description') is-invalid @enderror" value="{{ old('short_description') }}" placeholder="e.g. Engineered with AISI 304 stainless steel with 60L/min flow">
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Full Description -->
                        <div class="mb-3">
                            <label for="description" class="admin-form-label">Full Technical Description &amp; Specifications</label>
                            <textarea name="description" id="description" rows="5" class="form-control admin-form-control @error('description') is-invalid @enderror" placeholder="Detailed product specifications, dimensions, finish options and installation notes...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label for="prodImage" class="admin-form-label">Product Image <span class="text-muted small">(Max 2MB: JPG, PNG, WEBP)</span></label>
                            <input type="file" name="image" id="prodImage" class="form-control admin-form-control admin-image-input @error('image') is-invalid @enderror" data-preview="prodPreviewImg" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="mt-2">
                                <div class="image-preview-box">
                                    <img id="prodPreviewImg" src="" alt="Preview" class="d-none">
                                    <span class="text-muted small" id="noImgText">No image selected</span>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <!-- Sort Order -->
                            <div class="col-sm-6">
                                <label for="sort_order" class="admin-form-label">Sort Order</label>
                                <input type="number" name="sort_order" id="sort_order" class="form-control admin-form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', 0) }}" min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="col-sm-6">
                                <label for="status" class="admin-form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-select admin-form-select @error('status') is-invalid @enderror">
                                    <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
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
                                <i class="bi bi-check2-circle me-1"></i> Save Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    function filterSubcategories(categoryId) {
        const subSelect = document.getElementById('subcategory_id');
        const options = subSelect.querySelectorAll('option[data-category-id]');
        
        let hasVisible = false;
        options.forEach(opt => {
            if (!categoryId || opt.getAttribute('data-category-id') === categoryId) {
                opt.style.display = '';
                hasVisible = true;
            } else {
                opt.style.display = 'none';
                if (opt.selected) {
                    subSelect.value = '';
                }
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const catSelect = document.getElementById('category_id');
        if (catSelect && catSelect.value) {
            filterSubcategories(catSelect.value);
        }
    });
</script>
@endpush
