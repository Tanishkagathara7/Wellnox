<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Contact;

class DashboardController extends Controller
{
    /**
     * Display the Admin CMS Dashboard.
     */
    public function index()
    {
        $totalProducts = Product::count();
        $activeProducts = Product::where('status', true)->count();
        $totalCategories = ProductCategory::count();
        $totalEnquiries = Contact::count();
        $newEnquiries = Contact::where('status', 'new')->count();

        $recentEnquiries = Contact::latest()->take(6)->get();
        $recentProducts = Product::with('category')->latest()->take(5)->get();

        return view('admin.dashboard.index', compact(
            'totalProducts',
            'activeProducts',
            'totalCategories',
            'totalEnquiries',
            'newEnquiries',
            'recentEnquiries',
            'recentProducts'
        ));
    }
}
