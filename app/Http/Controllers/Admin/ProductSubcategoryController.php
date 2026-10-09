<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductSubcategoryRequest;
use App\Http\Requests\Admin\UpdateProductSubcategoryRequest;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductSubcategoryController extends Controller
{
    /**
     * Display a listing of subcategories.
     */
    public function index(Request $request)
    {
        $query = ProductSubcategory::with(['category']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->filled('status')) {
            $query->where('status', (bool) $request->input('status'));
        }

        $subcategories = $query->orderBy('sort_order', 'asc')
            ->orderBy('_id', 'desc')
            ->paginate(12)
            ->withQueryString();

        $categories = ProductCategory::orderBy('sort_order')->orderBy('name')->get();

        return view('admin.subcategories.index', compact('subcategories', 'categories'));
    }

    /**
     * Show form for creating a new subcategory.
     */
    public function create(Request $request)
    {
        $categories = ProductCategory::orderBy('sort_order')->orderBy('name')->get();
        $selectedCategoryId = $request->query('category_id');

        return view('admin.subcategories.create', compact('categories', 'selectedCategoryId'));
    }

    /**
     * Store a newly created subcategory.
     */
    public function store(StoreProductSubcategoryRequest $request)
    {
        $validated = $request->validated();

        if (empty($validated['slug'])) {
            $baseSlug = Str::slug($validated['name']);
            $slug = $baseSlug;
            $c = 1;
            while (ProductSubcategory::where('slug', $slug)->exists()) {
                $slug = $baseSlug.'-'.$c++;
            }
            $validated['slug'] = $slug;
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('subcategories', 'public');
            $validated['image'] = $path;
        }

        ProductSubcategory::create($validated);

        return redirect()->route('admin.subcategories.index')
            ->with('success', 'Subcategory created successfully.');
    }

    /**
     * Show form for editing an existing subcategory.
     */
    public function edit(ProductSubcategory $subcategory)
    {
        $categories = ProductCategory::orderBy('sort_order')->orderBy('name')->get();

        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified subcategory.
     */
    public function update(UpdateProductSubcategoryRequest $request, ProductSubcategory $subcategory)
    {
        $validated = $request->validated();

        if (empty($validated['slug'])) {
            $baseSlug = Str::slug($validated['name']);
            $slug = $baseSlug;
            $c = 1;
            while (ProductSubcategory::where('slug', $slug)->where('id', '!=', $subcategory->id)->exists()) {
                $slug = $baseSlug.'-'.$c++;
            }
            $validated['slug'] = $slug;
        }

        if ($request->hasFile('image')) {
            if ($subcategory->image && Storage::disk('public')->exists($subcategory->image)) {
                Storage::disk('public')->delete($subcategory->image);
            }
            $path = $request->file('image')->store('subcategories', 'public');
            $validated['image'] = $path;
        }

        $subcategory->update($validated);

        return redirect()->route('admin.subcategories.index')
            ->with('success', 'Subcategory updated successfully.');
    }

    /**
     * Remove the specified subcategory from storage.
     */
    public function destroy(ProductSubcategory $subcategory)
    {
        if ($subcategory->image && Storage::disk('public')->exists($subcategory->image)) {
            Storage::disk('public')->delete($subcategory->image);
        }

        $subcategory->delete();

        return redirect()->route('admin.subcategories.index')
            ->with('success', 'Subcategory deleted successfully.');
    }

    /**
     * Quick status toggle.
     */
    public function toggleStatus(ProductSubcategory $subcategory)
    {
        $subcategory->update(['status' => ! $subcategory->status]);

        return back()->with('success', 'Subcategory status updated to '.($subcategory->status ? 'Active' : 'Inactive').'.');
    }
}
