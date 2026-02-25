<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $categoriesCount = ProductCategory::count();
        $productsCount = Product::count();
        $contactsCount = ContactMessage::count();
        $contactsUnreadCount = ContactMessage::whereNull('read_at')->count();

        $recentCategories = ProductCategory::ordered()->take(5)->get();
        $recentContacts = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', [
            'categoriesCount' => $categoriesCount,
            'productsCount' => $productsCount,
            'contactsCount' => $contactsCount,
            'contactsUnreadCount' => $contactsUnreadCount,
            'recentCategories' => $recentCategories,
            'recentContacts' => $recentContacts,
        ]);
    }
}
