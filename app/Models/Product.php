<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'image',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'category_id' => 'integer',
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Relationship: Product belongs to ProductCategory.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    /**
     * Active products scope.
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Sorted products scope.
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('id', 'desc');
    }

    /**
     * Get image URL helper.
     */
    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('assets/images/popular-product/1.webp');
        }

        if (Str::startsWith($this->image, ['http://', 'https://', 'assets/'])) {
            return asset($this->image);
        }

        return asset('storage/' . $this->image);
    }

    /**
     * Boot model events for automatic slug generation if not provided.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $baseSlug = Str::slug($product->name);
                $slug = $baseSlug;
                $counter = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }
                $product->slug = $slug;
            }
        });
    }
}
