<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Article;

class DashboardController extends Controller
{
    public function index()
    {
        $newsCount = News::count();
        $articlesCount = Article::count();
        $recentNews = News::latest()->take(5)->get();
        $recentArticles = Article::latest()->take(5)->get();

        return view('admin.dashboard', compact('newsCount', 'articlesCount', 'recentNews', 'recentArticles'));
    }
}
