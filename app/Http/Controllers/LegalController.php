<?php

namespace App\Http\Controllers;

use App\Models\Setting;

class LegalController extends Controller
{
    public function privacy()
    {
        $content = Setting::get('privacy_policy');

        return view('legal.privacy', [
            'content' => $content,
        ]);
    }

    public function terms()
    {
        $content = Setting::get('terms_of_use');

        return view('legal.terms', [
            'content' => $content,
        ]);
    }
}

