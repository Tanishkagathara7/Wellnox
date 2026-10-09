<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use MongoDB\Laravel\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Relationship: Category has many Subcategories.
     */
    public function subcategories(): HasMany
    {
        return $this->hasMany(ProductSubcategory::class, 'category_id');
    }

    /**
     * Relationship: Category has many Products.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    /**
     * Get product count for MongoDB compatibility.
     */
    public function getProductsCountAttribute(): int
    {
        return Product::where('category_id', $this->_id ?? $this->id)->count();
    }

    /**
     * Helper for category image URL.
     */
    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('assets/images/product/1.webp');
        }

        if (Str::startsWith($this->image, ['http://', 'https://', 'assets/'])) {
            return asset($this->image);
        }

        return asset('storage/'.$this->image);
    }

    /**
     * Active categories scope.
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Sorted categories scope.
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('_id', 'asc');
    }

    /**
     * Boot model events for automatic slug generation if not provided.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }
}
