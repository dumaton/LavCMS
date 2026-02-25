<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Article;
use App\Models\Setting;
use App\Models\Brand;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::where('is_published', true)->latest('published_at')->take(5)->get();
        $articles = Article::where('is_published', true)->latest('published_at')->take(5)->get();

        $brands = Brand::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $settings = Setting::query()
            ->whereIn('key', ['site_name', 'home_title', 'home_description'])
            ->pluck('value', 'key');

        return view('home', compact('news', 'articles', 'brands', 'settings'));
    }
}
