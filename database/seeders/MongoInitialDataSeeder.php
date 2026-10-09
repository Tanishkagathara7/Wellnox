<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MongoInitialDataSeeder extends Seeder
{
    /**
     * Seed initial collections from SQL dump data and hierarchy.
     */
    public function run(): void
    {
        // 1. Seed Users
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Wellnox',
                'password' => '$2y$12$KysWb3w0dBTn4CsJc/dACOYwbqVSnnzOSRzi1oiiOnanvGm2K7qHe',
                'email_verified_at' => now(),
            ]
        );

        $adminEmail = env('ADMIN_EMAIL', 'rohantechmatrix@gmail.com');
        $adminPassword = env('ADMIN_PASSWORD', 'admin12345');
        User::updateOrCreate(
            ['email' => $adminEmail],
            [
                'name' => 'Wellnox Administrator',
                'password' => Hash::make($adminPassword),
                'email_verified_at' => now(),
            ]
        );

        // 2. Seed Categories
        $categories = [
            [
                'name' => 'Floor Drains & Gratings',
                'slug' => 'floor-drains-gratings',
                'description' => 'Precision-engineered AISI 304 stainless steel floor drains, tile insert channels and cockroach trap gratings.',
                'image' => 'assets/images/product/1.webp',
                'status' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Shower Channel Drainers',
                'slug' => 'shower-channel-drainers',
                'description' => 'Architectural linear shower channels with superior 60L/min flow capacity and luxury finishes.',
                'image' => 'assets/images/product/2.webp',
                'status' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Bathroom Accessories',
                'slug' => 'bathroom-accessories',
                'description' => 'Contemporary towel bars, soap dispensers, robe hooks and luxury glass shelf brackets.',
                'image' => 'assets/images/product/3.webp',
                'status' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Health Faucets',
                'slug' => 'health-faucets',
                'description' => 'Heavy-duty brass and stainless steel health faucets with anti-burst flexi tubes.',
                'image' => 'assets/images/product/4.webp',
                'status' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Ceramic Bathroom Accessories',
                'slug' => 'ceramic-bathroom-accessories',
                'description' => 'Handcrafted ceramic accessories with fine glazed finishes for luxury hotel suites and residences.',
                'image' => 'assets/images/product/5.webp',
                'status' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Dish Racks & Drainers',
                'slug' => 'dish-racks-drainers',
                'description' => 'Modular stainless steel kitchen dish drying racks, cutlery holders and sink organizer baskets.',
                'image' => 'assets/images/product/6.webp',
                'status' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Cloth Drying Stands',
                'slug' => 'cloth-drying-stands',
                'description' => 'Ergonomic folding clothes drying racks built with high-tensile weather-resistant steel tubes.',
                'image' => 'assets/images/product/7.webp',
                'status' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'MS Ladders & Utility Products',
                'slug' => 'ms-ladders-utility-products',
                'description' => 'Anti-skid multi-step industrial and household heavy duty safety ladders.',
                'image' => 'assets/images/product/8.webp',
                'status' => true,
                'sort_order' => 8,
            ],
        ];

        foreach ($categories as $catData) {
            ProductCategory::updateOrCreate(['slug' => $catData['slug']], $catData);
        }

        // 3. Seed Hierarchy (Subcategories and Products)
        $this->call(ProductHierarchySeeder::class);

        // 4. Seed Contacts from SQL dump
        $contacts = [
            [
                'name' => 'Rohan Pankhaniya',
                'email' => 'pankhaniyageetaben74@gmail.com',
                'phone' => '9328978130',
                'subject' => 'Website Product Requirement Enquiry',
                'message' => 'ssssssssssss',
                'status' => 'archived',
            ],
            [
                'name' => 'rrrrrrrrrrrrr',
                'email' => 'rohantechmatrix@gmail.com',
                'phone' => '9328978130',
                'subject' => 'Website Product Requirement Enquiry',
                'message' => 'asdasdasdasd',
                'status' => 'read',
            ],
            [
                'name' => 'Rohan Pankhaniya',
                'email' => 'pankhaniyarohan13@gmail.com',
                'phone' => '9067804723',
                'subject' => 'Website Product Requirement Enquiry',
                'message' => 'adasdadasdasd',
                'status' => 'read',
            ],
            [
                'name' => 'Rohan Pankhaniya',
                'email' => 'pankhaniyarocky@gmail.com',
                'phone' => '45455454545',
                'subject' => 'Website Product Requirement Enquiry',
                'message' => 'testing jkashdkjashdjhas',
                'status' => 'read',
            ],
            [
                'name' => 'Rohan Pankhaniya',
                'email' => 'rohantechmatrix@gmail.com',
                'phone' => '9328978130',
                'subject' => 'Website Product Requirement Enquiry',
                'message' => 'sdadddddddddddddddd',
                'status' => 'new',
            ],
            [
                'name' => 'Rohan Pankhaniya',
                'email' => 'rohantechmatrix@gmail.com',
                'phone' => '9067804723',
                'subject' => 'Website Product Requirement Enquiry',
                'message' => 'asddddddddddd',
                'status' => 'new',
            ],
            [
                'name' => 'Rohan Pankhaniya',
                'email' => 'rohantechmatrix@gmail.com',
                'phone' => '9328978130',
                'subject' => 'Website Product Requirement Enquiry',
                'message' => 'asdddddd',
                'status' => 'new',
            ],
            [
                'name' => 'Rohan Pankhaniya',
                'email' => 'rohantechmatrix@gmail.com',
                'phone' => '6544444444',
                'subject' => 'Website Product Requirement Enquiry',
                'message' => 'asdasdsadas',
                'status' => 'new',
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
}
