<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Bathroom Accessories',
                'slug' => 'bathroom-accessories',
                'description' => 'Contemporary towel bars, soap dispensers, robe hooks, tumbler holders and luxury glass shelf brackets.',
                'image' => 'assets/images/product/3.webp',
                'sort_order' => 1,
            ],
            [
                'name' => 'Ceramic Bathroom Accessories',
                'slug' => 'ceramic-bathroom-accessories',
                'description' => 'Handcrafted ceramic accessories with fine glazed finishes for luxury hotel suites and residences.',
                'image' => 'assets/images/product/5.webp',
                'sort_order' => 2,
            ],
            [
                'name' => 'Cloth Drying Stands',
                'slug' => 'cloth-drying-stands',
                'description' => 'Ergonomic folding clothes drying racks built with high-tensile weather-resistant steel tubes.',
                'image' => 'assets/images/product/7.webp',
                'sort_order' => 3,
            ],
            [
                'name' => 'Modular Kitchen Accessories',
                'slug' => 'modular-kitchen-accessories',
                'description' => 'Architectural stainless steel modular kitchen wire baskets, pantry pullouts, and sink organizers.',
                'image' => 'assets/images/product/6.webp',
                'sort_order' => 4,
            ],
            [
                'name' => 'Dish Drainers',
                'slug' => 'dish-drainers',
                'description' => 'Modular stainless steel kitchen dish drying racks, cutlery holders and sink organizer baskets.',
                'image' => 'assets/images/product/6.webp',
                'sort_order' => 5,
            ],
            [
                'name' => 'Floor Drains & Gratings',
                'slug' => 'floor-drains-gratings',
                'description' => 'Precision-engineered AISI 304 stainless steel floor drains, tile insert channels and cockroach trap gratings.',
                'image' => 'assets/images/product/1.webp',
                'sort_order' => 6,
            ],
            [
                'name' => 'MS Ladders',
                'slug' => 'ms-ladders',
                'description' => 'Anti-skid multi-step industrial and household heavy duty powder-coated safety ladders.',
                'image' => 'assets/images/product/8.webp',
                'sort_order' => 7,
            ],
        ];

        foreach ($categories as $cat) {
            ProductCategory::updateOrCreate(
                ['slug' => $cat['slug']],
                [
                    'name' => $cat['name'],
                    'description' => $cat['description'],
                    'image' => $cat['image'],
                    'status' => true,
                    'sort_order' => $cat['sort_order'],
                ]
            );
        }
    }
}
