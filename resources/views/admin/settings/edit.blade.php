@extends('layouts.admin')

@section('title', 'Настройки сайта')
@section('page_title', 'Настройки сайта')

@section('content')
@php
    $siteName = $settings['site_name'] ?? config('app.name', 'LavCMS');
    $homeTitle = $settings['home_title'] ?? 'Главная';
    $homeDescription = $settings['home_description'] ?? 'Простая CMS для новостей и статей.';
@endphp

<form action="{{ route('admin.settings.update') }}" method="POST" class="max-w-2xl space-y-6">
    @csrf
    @method('PUT')

    <div class="space-y-2">
        <h2 class="text-lg font-semibold text-stone-800">Основные</h2>
        <p class="text-sm text-stone-500">Базовые настройки отображения главной страницы сайта.</p>
    </div>

    <div>
        <label for="site_name" class="block text-sm font-medium text-stone-700 mb-1">Название сайта</label>
        <input type="text" name="site_name" id="site_name" value="{{ old('site_name', $siteName) }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('site_name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Используется как основное имя проекта и заголовок на главной.</p>
    </div>

    <div>
        <label for="home_title" class="block text-sm font-medium text-stone-700 mb-1">Title для главной</label>
        <input type="text" name="home_title" id="home_title" value="{{ old('home_title', $homeTitle) }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('home_title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Тег &lt;title&gt; на главной странице (для вкладки браузера и SEO).</p>
    </div>

    <div>
        <label for="home_description" class="block text-sm font-medium text-stone-700 mb-1">Description для главной</label>
        <textarea name="home_description" id="home_description" rows="3"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">{{ old('home_description', $homeDescription) }}</textarea>
        @error('home_description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Краткое описание сайта для главной страницы и мета‑тега description.</p>
    </div>

    <div class="flex gap-3 pt-2">
        <button type="submit" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">
            Сохранить
        </button>
    </div>
</form>
@endsection

