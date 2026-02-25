@extends('layouts.app')

@section('title', 'Обратная связь')

@section('content')
<div class="max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold text-stone-900 mb-6">Обратная связь</h1>
    <p class="text-stone-600 mb-6">
        Оставьте свои контактные данные и сообщение, и мы ответим вам как можно скорее.
    </p>

    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4 bg-white border border-stone-200 rounded-xl p-6 shadow-sm">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Ваше имя *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
                @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="company" class="block text-sm font-medium text-stone-700 mb-1">Компания</label>
                <input type="text" name="company" id="company" value="{{ old('company') }}"
                       class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
                @error('company')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="email" class="block text-sm font-medium text-stone-700 mb-1">Email *</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                       class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
                @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-stone-700 mb-1">Телефон</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                       class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
                @error('phone')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
        </div>
        <div>
            <label for="subject" class="block text-sm font-medium text-stone-700 mb-1">Тема</label>
            <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('subject')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="message" class="block text-sm font-medium text-stone-700 mb-1">Сообщение *</label>
            <textarea name="message" id="message" rows="5" required
                      class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">{{ old('message') }}</textarea>
            @error('message')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="pt-2">
            <button type="submit" class="px-5 py-2.5 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">
                Отправить
            </button>
        </div>
    </form>
</div>
@endsection

