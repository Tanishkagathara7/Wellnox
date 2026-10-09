<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'slug',
        'short_description',
        'description',
        'image',
        'gallery_images',
        'size',
        'color',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'gallery_images' => 'array',
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
     * Relationship: Product belongs to ProductSubcategory.
     */
    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(ProductSubcategory::class, 'subcategory_id');
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
        return $query->orderBy('sort_order', 'asc')->orderBy('_id', 'desc');
    }

    /**
     * Get image URL helper.
     */
    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('assets/images/popular-product/1.webp');
        }

        if (Str::startsWith($this->image, ['http://', 'https://', 'assets/', 'data:image/'])) {
            return $this->image;
        }

        return asset('storage/'.$this->image);
    }

    /**
     * Get all image URLs including main image and gallery images.
     *
     * @return array<int, string>
     */
    public function getAllImagesAttribute(): array
    {
        $urls = [$this->image_url];

        if (! empty($this->gallery_images) && is_array($this->gallery_images)) {
            foreach ($this->gallery_images as $img) {
                if (! empty($img)) {
                    if (Str::startsWith($img, ['http://', 'https://', 'assets/', 'data:image/'])) {
                        $urls[] = $img;
                    } else {
                        $urls[] = asset('storage/'.$img);
                    }
                }
            }
        }

        return array_values(array_unique($urls));
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
                    $slug = $baseSlug.'-'.$counter++;
                }
                $product->slug = $slug;
            }
        });
    }
}
