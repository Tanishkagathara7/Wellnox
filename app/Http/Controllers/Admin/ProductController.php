<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of products with search and category filtering.
     */
    public function index(Request $request)
    {
        $query = Product::with(['category', 'subcategory']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%")
                    ->orWhere('size', 'like', "%{$search}%")
                    ->orWhere('color', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->filled('subcategory_id')) {
            $query->where('subcategory_id', $request->input('subcategory_id'));
        }

        if ($request->filled('status')) {
            $query->where('status', (bool) $request->input('status'));
        }

        $products = $query->orderBy('sort_order', 'asc')
            ->orderBy('_id', 'desc')
            ->paginate(10)
            ->withQueryString();

        $categories = ProductCategory::with('subcategories')->orderBy('sort_order')->orderBy('name')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    /**
     * Show form for creating a new product.
     */
    public function create()
    {
        $categories = ProductCategory::with('subcategories')->orderBy('sort_order')->orderBy('name')->get();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        if (isset($validated['status'])) {
            $validated['status'] = (bool) $validated['status'];
        }

        if (empty($validated['slug'])) {
            $baseSlug = Str::slug($validated['name']);
            $slug = $baseSlug;
            $c = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = $baseSlug.'-'.$c++;
            }
            $validated['slug'] = $slug;
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $this->processImageAsDataUri($request->file('image'));
        }

        if ($request->hasFile('gallery_images')) {
            $galleryPaths = [];
            foreach ($request->file('gallery_images') as $file) {
                $uri = $this->processImageAsDataUri($file);
                if ($uri) {
                    $galleryPaths[] = $uri;
                }
            }
            if (! empty($galleryPaths)) {
                $validated['gallery_images'] = $galleryPaths;
            }
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        $product->load(['category', 'subcategory']);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show form for editing an existing product.
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::with('subcategories')->orderBy('sort_order')->orderBy('name')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        if (isset($validated['status'])) {
            $validated['status'] = (bool) $validated['status'];
        }

        if (empty($validated['slug'])) {
            $baseSlug = Str::slug($validated['name']);
            $slug = $baseSlug;
            $c = 1;
            while (Product::where('slug', $slug)->where('_id', '!=', $product->_id ?? $product->id)->exists()) {
                $slug = $baseSlug.'-'.$c++;
            }
            $validated['slug'] = $slug;
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $this->processImageAsDataUri($request->file('image'));
        }

        // Handle existing gallery and removals/additions
        $existingGallery = is_array($product->gallery_images) ? $product->gallery_images : [];

        if (! empty($validated['remove_gallery_images']) && is_array($validated['remove_gallery_images'])) {
            $removals = $validated['remove_gallery_images'];
            $existingGallery = array_values(array_filter($existingGallery, fn ($item) => ! in_array($item, $removals, true)));
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $uri = $this->processImageAsDataUri($file);
                if ($uri) {
                    $existingGallery[] = $uri;
                }
            }
        }

        $validated['gallery_images'] = $existingGallery;

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Process an uploaded image file into a compressed Base64 WebP / JPEG data URI.
     */
    protected function processImageAsDataUri($file): ?string
    {
        if (! $file || ! $file->isValid()) {
            return null;
        }

        try {
            $path = $file->getRealPath();
            $info = @getimagesize($path);
            if (! $info) {
                return 'data:'.$file->getMimeType().';base64,'.base64_encode(file_get_contents($path));
            }

            [$width, $height, $imageType] = $info;

            $source = match ($imageType) {
                IMAGETYPE_JPEG => @imagecreatefromjpeg($path),
                IMAGETYPE_PNG => @imagecreatefrompng($path),
                IMAGETYPE_WEBP => function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($path) : false,
                default => false,
            };

            if (! $source) {
                return 'data:'.$file->getMimeType().';base64,'.base64_encode(file_get_contents($path));
            }

            // Downscale if unusually large (e.g. width or height > 1200px)
            $maxDim = 1200;
            if ($width > $maxDim || $height > $maxDim) {
                $ratio = min($maxDim / $width, $maxDim / $height);
                $newWidth = (int) round($width * $ratio);
                $newHeight = (int) round($height * $ratio);

                $resized = imagecreatetruecolor($newWidth, $newHeight);
                imagealphablending($resized, false);
                imagesavealpha($resized, true);
                imagecopyresampled($resized, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                imagedestroy($source);
                $source = $resized;
            }

            // Prefer WebP for optimal compression
            ob_start();
            if (function_exists('imagewebp')) {
                imagewebp($source, null, 82);
                $imageData = ob_get_clean();
                imagedestroy($source);

                return 'data:image/webp;base64,'.base64_encode($imageData);
            }

            imagejpeg($source, null, 85);
            $imageData = ob_get_clean();
            imagedestroy($source);

            return 'data:image/jpeg;base64,'.base64_encode($imageData);
        } catch (\Throwable $e) {
            return 'data:'.$file->getMimeType().';base64,'.base64_encode(file_get_contents($file->getRealPath()));
        }
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    /**
     * Toggle product active status.
     */
    public function toggleStatus(Product $product)
    {
        $product->update(['status' => ! $product->status]);

        return back()->with('success', 'Product status updated to '.($product->status ? 'Active' : 'Inactive').'.');
    }
}
