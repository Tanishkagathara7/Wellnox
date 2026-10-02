<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Square Drainer',
                'slug' => 'square-drainer',
                'category_slug' => 'floor-drains-gratings',
                'short_description' => 'AISI 304 Stainless Steel Point Drainer with Anti-Cockroach Trap',
                'description' => 'Precision-engineered AISI 304 square floor drainer designed for rapid water drainage and complete odour/pest prevention. Available in polished mirror and satin matt finishes.',
                'image' => 'assets/images/popular-product/1.webp',
                'sort_order' => 1,
            ],
            [
                'name' => 'Channel Drainer',
                'slug' => 'channel-drainer',
                'category_slug' => 'shower-channel-drainers',
                'short_description' => 'Regular Matt Finish Architectural Linear Shower Channel',
                'description' => 'Sleek linear shower drainer crafted from premium 304-grade stainless steel with continuous gradient flow and 60L/min certified discharge rate.',
                'image' => 'assets/images/popular-product/2.webp',
                'sort_order' => 2,
            ],
            [
                'name' => 'Round Floor Drainer',
                'slug' => 'round-floor-drainer',
                'category_slug' => 'floor-drains-gratings',
                'short_description' => 'Mirror Finish Classical Round Grating with Hair Catcher',
                'description' => 'Classic circular floor grating with high-gloss mirror chrome buffing. Ideal for residential shower enclosures and wet utility rooms.',
                'image' => 'assets/images/popular-product/3.webp',
                'sort_order' => 3,
            ],
            [
                'name' => 'Wave Channel Drainer',
                'slug' => 'wave-channel-drainer',
                'category_slug' => 'shower-channel-drainers',
                'short_description' => 'PVD Coated Designer Wave Slotted Shower Drainer',
                'description' => 'Artistic wave laser-cut pattern featuring durable PVD titanium molecular finish, impervious to scratches and bathroom cleaning chemicals.',
                'image' => 'assets/images/popular-product/4.webp',
                'sort_order' => 4,
            ],
            [
                'name' => 'Ceramic Bathroom Accessories',
                'slug' => 'ceramic-bathroom-accessories',
                'category_slug' => 'ceramic-bathroom-accessories',
                'short_description' => 'Premium Design with a Touch of Elegance',
                'description' => 'Handcrafted ceramic bathroom dispenser set with gold-accented stainless steel fittings.',
                'image' => 'assets/images/product/5.webp',
                'sort_order' => 5,
            ],
            [
                'name' => 'Dish Racks & Drainers',
                'slug' => 'dish-racks-drainers',
                'category_slug' => 'dish-racks-drainers',
                'short_description' => 'Smart Organization for a Modern Kitchen',
                'description' => 'Heavy gauge stainless steel kitchen dish drying rack with removable drip tray and utensil caddy.',
                'image' => 'assets/images/product/6.webp',
                'sort_order' => 6,
            ],
            [
                'name' => 'Cloth Drying Stands',
                'slug' => 'cloth-drying-stands',
                'category_slug' => 'cloth-drying-stands',
                'short_description' => 'Sturdy, Space-Saving & Long-Lasting',
                'description' => 'Collapsible multi-tier heavy duty cloth dryer stand with weather-resistant powder coated finish.',
                'image' => 'assets/images/product/7.webp',
                'sort_order' => 7,
            ],
            [
                'name' => 'MS Ladders & Utility Products',
                'slug' => 'ms-ladders-utility-products',
                'category_slug' => 'ms-ladders-utility-products',
                'short_description' => 'Strong, Reliable & Versatile',
                'description' => 'Industrial and domestic multi-step safety ladder with anti-skid wide platform and rubberized grip feet.',
                'image' => 'assets/images/product/8.webp',
                'sort_order' => 8,
            ],
        ];

        foreach ($products as $p) {
            $cat = ProductCategory::where('slug', $p['category_slug'])->first();
            Product::updateOrCreate(
                ['slug' => $p['slug']],
                [
                    'category_id'       => $cat ? $cat->id : 1,
                    'name'              => $p['name'],
                    'short_description' => $p['short_description'],
                    'description'       => $p['description'],
                    'image'             => $p['image'],
                    'status'            => true,
                    'sort_order'        => $p['sort_order'],
                ]
            );
        }
    }
}
