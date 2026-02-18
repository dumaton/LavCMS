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
            ->whereIn('key', ['site_name', 'home_title', 'home_description'])
            ->pluck('value', 'key');

        return view('admin.settings.edit', [
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_name' => ['nullable', 'string', 'max:255'],
            'home_title' => ['nullable', 'string', 'max:255'],
            'home_description' => ['nullable', 'string', 'max:500'],
        ]);

        Setting::setMany([
            'site_name' => $data['site_name'] ?? null,
            'home_title' => $data['home_title'] ?? null,
            'home_description' => $data['home_description'] ?? null,
        ]);

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Настройки сохранены.');
    }
}

