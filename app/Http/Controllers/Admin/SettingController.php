<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
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
                'notifications_email',
                'contact_address',
                'contact_legal_address',
                'contact_hours',
                'cities',
                'privacy_policy',
                'terms_of_use',
                'analytics_code',
            ])
            ->pluck('value', 'key');

        return view('admin.settings.edit', [
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'home_title' => ['nullable', 'string', 'max:255'],
            'home_description' => ['nullable', 'string', 'max:500'],
            'keywords' => ['nullable', 'string', 'max:4096'],
            'hero_title' => ['nullable', 'string', 'max:255'],
            'hero_subtitle_highlight' => ['nullable', 'string', 'max:255'],
            'hero_subtitle' => ['nullable', 'string', 'max:255'],
            'hero_description' => ['nullable', 'string', 'max:1000'],
            'about_badge' => ['nullable', 'string', 'max:255'],
            'about_title' => ['nullable', 'string', 'max:255'],
            'about_text' => ['nullable', 'string', 'max:2000'],
            'phone_mobile' => ['nullable', 'string', 'max:255'],
            'phone_city' => ['nullable', 'string', 'max:255'],
            'contact_email' => ['nullable', 'string', 'max:255'],
            'notifications_email' => ['nullable', 'string', 'max:255'],
            'contact_address' => ['nullable', 'string', 'max:500'],
            'contact_legal_address' => ['nullable', 'string', 'max:500'],
            'contact_hours' => ['nullable', 'string', 'max:500'],
            'cities' => ['nullable', 'string', 'max:2000'],
            'privacy_policy' => ['nullable', 'string', 'max:20000'],
            'terms_of_use' => ['nullable', 'string', 'max:20000'],
            'analytics_code' => ['nullable', 'string', 'max:10000'],
        ]);

        Setting::setMany([
            'home_title' => $data['home_title'] ?? null,
            'home_description' => $data['home_description'] ?? null,
            'keywords' => $data['keywords'] ?? null,
            'hero_title' => $data['hero_title'] ?? null,
            'hero_subtitle_highlight' => $data['hero_subtitle_highlight'] ?? null,
            'hero_subtitle' => $data['hero_subtitle'] ?? null,
            'hero_description' => $data['hero_description'] ?? null,
            'about_badge' => $data['about_badge'] ?? null,
            'about_title' => $data['about_title'] ?? null,
            'about_text' => $data['about_text'] ?? null,
            'phone_mobile' => $data['phone_mobile'] ?? null,
            'phone_city' => $data['phone_city'] ?? null,
            'contact_email' => $data['contact_email'] ?? null,
            'notifications_email' => $data['notifications_email'] ?? null,
            'contact_address' => $data['contact_address'] ?? null,
            'contact_legal_address' => $data['contact_legal_address'] ?? null,
            'contact_hours' => $data['contact_hours'] ?? null,
            'cities' => $data['cities'] ?? null,
            'privacy_policy' => $data['privacy_policy'] ?? null,
            'terms_of_use' => $data['terms_of_use'] ?? null,
            'analytics_code' => $data['analytics_code'] ?? null,
        ]);

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Настройки сохранены.');
    }
}

