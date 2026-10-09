<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use MongoDB\Laravel\Eloquent\Model;

class ProductSubcategory extends Model
{
    use HasFactory;

    protected $table = 'product_subcategories';

    protected $fillable = [
        'category_id',
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
     * Relationship: Subcategory belongs to Category.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    /**
     * Relationship: Subcategory has many Products.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'subcategory_id');
    }

    /**
     * Get product count for MongoDB compatibility.
     */
    public function getProductsCountAttribute(): int
    {
        return Product::where('subcategory_id', $this->_id ?? $this->id)->count();
    }

    /**
     * Active scope.
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Sorted scope.
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('_id', 'asc');
    }

    /**
     * Get image URL helper.
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
     * Boot model events for automatic slug generation if not provided.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($subcategory) {
            if (empty($subcategory->slug)) {
                $baseSlug = Str::slug($subcategory->name);
                $slug = $baseSlug;
                $counter = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $baseSlug.'-'.$counter++;
                }
                $subcategory->slug = $slug;
            }
        });
    }
}
