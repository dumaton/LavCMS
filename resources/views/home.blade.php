@extends('layouts.app')

@php
    /** @var \Illuminate\Support\Collection|\array_access|null $settings */
    $siteName = $settings['site_name'] ?? config('app.name', 'LavCMS');
    $homeTitle = $settings['home_title'] ?? 'Главная';
    $homeDescription = $settings['home_description'] ?? 'Простая CMS для новостей и статей на Laravel.';
@endphp

@section('title', $homeTitle)

@section('content')
<div class="mb-10">
    <h1 class="text-3xl font-bold text-stone-900 mb-2">{{ $siteName }}</h1>
    <p class="text-stone-600">{{ $homeDescription }}</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <section>
        <h2 class="text-xl font-semibold text-stone-800 mb-4 border-b border-amber-500 pb-2">Новости</h2>
        @forelse($news as $item)
            <article class="mb-4">
                <a href="{{ route('news.show', $item) }}" class="text-stone-800 hover:text-amber-600 font-medium">{{ $item->title }}</a>
                @if($item->excerpt)
                    <p class="text-stone-500 text-sm mt-1">{{ Str::limit($item->excerpt, 100) }}</p>
                @endif
                <p class="text-stone-400 text-xs mt-1">{{ $item->published_at?->format('d.m.Y') }}</p>
            </article>
        @empty
            <p class="text-stone-500">Новостей пока нет.</p>
        @endforelse
        <a href="{{ route('news.index') }}" class="inline-block mt-2 text-amber-600 hover:text-amber-700 font-medium text-sm">Все новости →</a>
    </section>
    <section>
        <h2 class="text-xl font-semibold text-stone-800 mb-4 border-b border-amber-500 pb-2">Статьи</h2>
        @forelse($articles as $item)
            <article class="mb-4">
                <a href="{{ route('articles.show', $item) }}" class="text-stone-800 hover:text-amber-600 font-medium">{{ $item->title }}</a>
                @if($item->excerpt)
                    <p class="text-stone-500 text-sm mt-1">{{ Str::limit($item->excerpt, 100) }}</p>
                @endif
                <p class="text-stone-400 text-xs mt-1">{{ $item->published_at?->format('d.m.Y') }}</p>
            </article>
        @empty
            <p class="text-stone-500">Статей пока нет.</p>
        @endforelse
        <a href="{{ route('articles.index') }}" class="inline-block mt-2 text-amber-600 hover:text-amber-700 font-medium text-sm">Все статьи →</a>
    </section>
</div>
@endsection
