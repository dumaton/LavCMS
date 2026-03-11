<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $contactsCount = ContactMessage::count();
        $contactsUnreadCount = ContactMessage::whereNull('read_at')->count();

        $recentContacts = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', [
            'contactsCount' => $contactsCount,
            'contactsUnreadCount' => $contactsUnreadCount,
            'recentContacts' => $recentContacts,
        ]);
    }
}
