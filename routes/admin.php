<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProfileController;

/*
|--------------------------------------------------------------------------
| Admin CMS Routes
|--------------------------------------------------------------------------
| All routes prefixed with /admin and named with admin.*
| Kept completely separate from website routes.
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Redirect /admin directly to /admin/login or /admin/dashboard
    Route::get('/', function () {
        return \Illuminate\Support\Facades\Auth::check()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('admin.login');
    });

    // Guest Admin Auth Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });

    // Authenticated Admin Protected Routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Product Categories Management
        Route::patch('/categories/{category}/toggle-status', [ProductCategoryController::class, 'toggleStatus'])->name('categories.toggle-status');
        Route::resource('categories', ProductCategoryController::class)->except(['show']);

        // Products Management
        Route::patch('/products/{product}/toggle-status', [ProductController::class, 'toggleStatus'])->name('products.toggle-status');
        Route::resource('products', ProductController::class);

        // Contact Enquiries
        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
        Route::patch('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
        Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

        // Admin Profile & Password Management
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    });
});
