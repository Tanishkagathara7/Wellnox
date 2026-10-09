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
                            <div class="col-md-6">
                                <label for="name" class="admin-form-label">Product Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control admin-form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required>
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
                                        <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
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
                                            <option value="{{ $sub->id }}" data-category-id="{{ $cat->id }}" {{ old('subcategory_id', $product->subcategory_id) == $sub->id ? 'selected' : '' }}>
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
                            <label for="slug" class="admin-form-label">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control admin-form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $product->slug) }}">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Size & Color Row -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="size" class="admin-form-label">Size / Dimension</label>
                                <input type="text" name="size" id="size" class="form-control admin-form-control @error('size') is-invalid @enderror" value="{{ old('size', $product->size) }}" placeholder="e.g. 600mm, 24 Inch, 150x150mm, 4 Steps, 250ml">
                                <span class="text-muted small">Standard dimensions, capacity, or step count</span>
                                @error('size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="color" class="admin-form-label">Color / Finish <span class="text-muted small">(Leave blank if no color)</span></label>
                                <input type="text" name="color" id="color" class="form-control admin-form-control @error('color') is-invalid @enderror" value="{{ old('color', $product->color) }}" placeholder="e.g. Rose Gold, Matte Black, Chrome Mirror">
                                <span class="text-muted small">Optional color or PVD finish</span>
                                @error('color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
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

                        <!-- Primary Image Upload -->
                        <div class="mb-3">
                            <label for="prodImage" class="admin-form-label">Primary Product Image <span class="text-muted small">(Leave empty to retain existing)</span></label>
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

                        <!-- Additional Gallery Images Upload & Existing Management -->
                        <div class="mb-4">
                            <label class="admin-form-label">Product Gallery Images (Multiple)</label>
                            
                            @if(!empty($product->gallery_images) && is_array($product->gallery_images) && count($product->gallery_images) > 0)
                                <div class="mb-3 p-3 bg-light rounded-3 border">
                                    <div class="small fw-bold text-dark mb-2">Existing Gallery Photos (Check to Remove):</div>
                                    <div class="d-flex flex-wrap gap-3">
                                        @foreach($product->gallery_images as $gPath)
                                            <div class="position-relative border rounded p-1 bg-white text-center" style="width: 100px;">
                                                <img src="{{ Str::startsWith($gPath, ['http', 'assets', 'data:image']) ? $gPath : asset('storage/' . $gPath) }}" alt="Gallery" class="img-fluid rounded mb-1" style="height: 70px; object-fit: contain;">
                                                <div class="form-check form-check-inline small m-0">
                                                    <input class="form-check-input" type="checkbox" name="remove_gallery_images[]" value="{{ $gPath }}" id="rem_g_{{ $loop->index }}">
                                                    <label class="form-check-label text-danger small" for="rem_g_{{ $loop->index }}">Remove</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <label for="galleryImages" class="form-label small text-muted">Add More Gallery Images <span class="small">(Upload multiple JPG, PNG, WEBP)</span></label>
                            <input type="file" name="gallery_images[]" id="galleryImages" class="form-control admin-form-control @error('gallery_images.*') is-invalid @enderror" multiple accept="image/*">
                            @error('gallery_images')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            @error('gallery_images.*')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
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

@push('scripts')
<script>
    function filterSubcategories(categoryId) {
        const subSelect = document.getElementById('subcategory_id');
        const options = subSelect.querySelectorAll('option[data-category-id]');
        
        options.forEach(opt => {
            if (!categoryId || opt.getAttribute('data-category-id') === categoryId) {
                opt.style.display = '';
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
