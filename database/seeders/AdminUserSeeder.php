<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
