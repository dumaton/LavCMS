<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormNotification;
use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'from_home' => ['nullable', 'boolean'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'company' => [Rule::requiredIf(fn () => $request->boolean('from_home')), 'nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $contactMessage = ContactMessage::create($data);

        $adminEmail = Setting::get('notifications_email') ?? Setting::get('contact_email');
        if ($adminEmail) {
            try {
                Mail::to($adminEmail)->send(new ContactFormNotification($contactMessage));
            } catch (\Throwable $e) {
                // Логируем, но не прерываем ответ пользователю
                report($e);
            }
        }

        if ($request->boolean('from_home')) {
            return back()->with('success', 'Сообщение отправлено. Мы свяжемся с вами.');
        }

        return redirect()
            ->route('contact.show')
            ->with('success', 'Сообщение отправлено. Мы свяжемся с вами.');
    }
}

