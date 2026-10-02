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
                'name' => 'Floor Drains & Gratings',
                'slug' => 'floor-drains-gratings',
                'description' => 'Precision-engineered AISI 304 stainless steel floor drains, tile insert channels and cockroach trap gratings.',
                'image' => 'assets/images/product/1.webp',
                'sort_order' => 1,
            ],
            [
                'name' => 'Shower Channel Drainers',
                'slug' => 'shower-channel-drainers',
                'description' => 'Architectural linear shower channels with superior 60L/min flow capacity and luxury finishes.',
                'image' => 'assets/images/product/2.webp',
                'sort_order' => 2,
            ],
            [
                'name' => 'Bathroom Accessories',
                'slug' => 'bathroom-accessories',
                'description' => 'Contemporary towel bars, soap dispensers, robe hooks and luxury glass shelf brackets.',
                'image' => 'assets/images/product/3.webp',
                'sort_order' => 3,
            ],
            [
                'name' => 'Health Faucets',
                'slug' => 'health-faucets',
                'description' => 'Heavy-duty brass and stainless steel health faucets with anti-burst flexi tubes.',
                'image' => 'assets/images/product/4.webp',
                'sort_order' => 4,
            ],
            [
                'name' => 'Ceramic Bathroom Accessories',
                'slug' => 'ceramic-bathroom-accessories',
                'description' => 'Handcrafted ceramic accessories with fine glazed finishes for luxury hotel suites and residences.',
                'image' => 'assets/images/product/5.webp',
                'sort_order' => 5,
            ],
            [
                'name' => 'Dish Racks & Drainers',
                'slug' => 'dish-racks-drainers',
                'description' => 'Modular stainless steel kitchen dish drying racks, cutlery holders and sink organizer baskets.',
                'image' => 'assets/images/product/6.webp',
                'sort_order' => 6,
            ],
            [
                'name' => 'Cloth Drying Stands',
                'slug' => 'cloth-drying-stands',
                'description' => 'Ergonomic folding clothes drying racks built with high-tensile weather-resistant steel tubes.',
                'image' => 'assets/images/product/7.webp',
                'sort_order' => 7,
            ],
            [
                'name' => 'MS Ladders & Utility Products',
                'slug' => 'ms-ladders-utility-products',
                'description' => 'Anti-skid multi-step industrial and household heavy duty safety ladders.',
                'image' => 'assets/images/product/8.webp',
                'sort_order' => 8,
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
