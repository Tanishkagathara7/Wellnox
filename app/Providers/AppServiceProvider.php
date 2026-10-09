<?php

namespace App\Providers;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['components.navbar', 'layouts.app'], function ($view) {
            try {
                if (Schema::hasTable('product_categories')) {
                    $navCategories = ProductCategory::active()
                        ->sorted()
                        ->get();
                    $view->with('navCategories', $navCategories);
                }
            } catch (\Throwable $e) {
                // Fallback gracefully if database is not reachable during migrate
            }
        });
    }
}
