<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;

/*
|--------------------------------------------------------------------------
| Public Website Routes
|--------------------------------------------------------------------------
| Website routes use website.* named routes.
*/

Route::get('/', [HomeController::class, 'index'])->name('website.home');
Route::get('/catalogue/download', function () {
    $filePath = public_path('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf');
    if (file_exists($filePath)) {
        return response()->download($filePath, 'wellnox_Drainer_New_Catalog.pdf');
    }
    return redirect()->route('website.home')->with('error', 'Catalogue file temporarily unavailable.');
})->name('website.catalogue.download');

Route::get('/catalogue/view', function () {
    return redirect(asset('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf'));
})->name('website.catalogue.view');

Route::get('/about-us', [HomeController::class, 'about'])->name('website.about');
Route::get('/why-wellnox', [HomeController::class, 'whyWellnox'])->name('website.why-wellnox');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('website.contact');

// Contact & Quote Enquiry submission route
Route::post('/contact/submit', [HomeController::class, 'submitQuote'])->name('website.contact.submit');

// Legacy aliases for backward compatibility with existing views / AJAX
Route::get('/home', fn() => redirect()->route('website.home'))->name('home');
Route::get('/download-catalogue', function () {
    return redirect()->route('website.catalogue.download');
})->name('catalogue.download');
Route::get('/view-catalogue', function () {
    return redirect()->route('website.catalogue.view');
})->name('catalogue.view');
Route::post('/submit-quote', [HomeController::class, 'submitQuote'])->name('quote.submit');


