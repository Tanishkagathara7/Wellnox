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
            try {
                $path = $request->file('image')->store('products', 'public');
                $validated['image'] = $path;
            } catch (\Throwable $e) {
                // If storage filesystem is read-only (serverless), continue without crashing
            }
        }

        if ($request->hasFile('gallery_images')) {
            $galleryPaths = [];
            foreach ($request->file('gallery_images') as $file) {
                try {
                    $galleryPaths[] = $file->store('products/gallery', 'public');
                } catch (\Throwable $e) {
                    // If storage filesystem is read-only, continue without crashing
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
            try {
                if ($product->image && Storage::disk('public')->exists($product->image)) {
                    Storage::disk('public')->delete($product->image);
                }
                $path = $request->file('image')->store('products', 'public');
                $validated['image'] = $path;
            } catch (\Throwable $e) {
                // If storage filesystem is read-only, continue without crashing
            }
        }

        // Handle existing gallery and removals/additions
        $existingGallery = is_array($product->gallery_images) ? $product->gallery_images : [];

        if (! empty($validated['remove_gallery_images']) && is_array($validated['remove_gallery_images'])) {
            foreach ($validated['remove_gallery_images'] as $imgToRemove) {
                try {
                    if (Storage::disk('public')->exists($imgToRemove)) {
                        Storage::disk('public')->delete($imgToRemove);
                    }
                } catch (\Throwable $e) {
                    // Ignore storage delete errors
                }
                $existingGallery = array_values(array_filter($existingGallery, fn ($item) => $item !== $imgToRemove));
            }
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                try {
                    $existingGallery[] = $file->store('products/gallery', 'public');
                } catch (\Throwable $e) {
                    // Ignore storage store errors
                }
            }
        }

        $validated['gallery_images'] = $existingGallery;

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        if (! empty($product->gallery_images) && is_array($product->gallery_images)) {
            foreach ($product->gallery_images as $gImg) {
                if (Storage::disk('public')->exists($gImg)) {
                    Storage::disk('public')->delete($gImg);
                }
            }
        }

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
