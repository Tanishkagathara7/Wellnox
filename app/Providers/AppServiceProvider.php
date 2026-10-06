<?php

namespace App\Providers;

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
        \Illuminate\Support\Facades\View::composer(['components.navbar', 'layouts.app'], function ($view) {
            try {
                if (\Illuminate\Support\Facades\Schema::hasTable('product_categories')) {
                    $navCategories = \App\Models\ProductCategory::active()
                        ->sorted()
                        ->withCount(['products' => function ($q) {
                            $q->active();
                        }])
                        ->get();
                    $view->with('navCategories', $navCategories);
                }
            } catch (\Throwable $e) {
                // Fallback gracefully if database is not reachable during migrate
            }
        });
    }
}
