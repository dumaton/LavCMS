<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Setting;
use App\Models\Price;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::where('is_published', true)->latest('published_at')->take(5)->get();

        $criminalServices = Service::where('type', Service::TYPE_CRIMINAL)
            ->ordered()
            ->get();

        $civilServices = Service::where('type', Service::TYPE_CIVIL)
            ->ordered()
            ->get();

        $prices = Price::ordered()->get();

        $settings = Setting::query()
            ->whereIn('key', [
                'home_title',
                'home_description',
                'keywords',
                'hero_title',
                'hero_subtitle_highlight',
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
                'cities',
            ])
            ->pluck('value', 'key');

        return view('home', compact(
            'articles',
            'settings',
            'criminalServices',
            'civilServices',
            'prices',
        ));
    }
}
