<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderByDesc('created_at')->paginate(10);

        return view('admin.contacts.index', compact('messages'));
    }

    public function show(ContactMessage $contact)
    {
        if (is_null($contact->read_at)) {
            $contact->update(['read_at' => now()]);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(ContactMessage $contact)
    {
        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Сообщение удалено.');
    }
}

