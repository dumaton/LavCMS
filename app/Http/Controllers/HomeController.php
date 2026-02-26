<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Article;
use App\Models\Setting;
use App\Models\Brand;
use App\Models\ProductCategory;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::where('is_published', true)->latest('published_at')->take(5)->get();
        $articles = Article::where('is_published', true)->latest('published_at')->take(5)->get();

        $settings = Setting::query()
            ->whereIn('key', [
                'home_title',
                'home_description',
                'keywords',
                'hero_badge',
                'hero_title',
                'hero_subtitle',
                'hero_description',
                'about_badge',
                'about_title',
                'about_text',
                'phone_mobile',
                'phone_city',
                'contact_email',
                'contact_address',
                'contact_legal_address',
                'contact_hours',
            ])
            ->pluck('value', 'key');

        $brands = Brand::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $equipmentCategories = ProductCategory::active()
            ->showOnHome()
            ->where('type', ProductCategory::TYPE_EQUIPMENT)
            ->ordered()
            ->get();

        $chemistryCategories = ProductCategory::active()
            ->showOnHome()
            ->where('type', ProductCategory::TYPE_CHEMISTRY)
            ->ordered()
            ->get();

        return view('home', compact(
            'news',
            'articles',
            'brands',
            'equipmentCategories',
            'chemistryCategories',
            'settings',
        ));
    }
}
