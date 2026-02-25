@extends('layouts.admin')

@section('title', 'Дашборд')
@section('page_title', 'Дашборд')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    @if(config('features.news_enabled'))
        <div class="bg-white rounded-xl border border-stone-200 p-6 shadow-sm">
            <h3 class="text-stone-500 text-sm font-medium">Новостей</h3>
            <p class="text-3xl font-semibold text-stone-800 mt-1">{{ $newsCount }}</p>
            <a href="{{ route('admin.news.index') }}" class="inline-block mt-3 text-amber-600 hover:text-amber-700 text-sm font-medium">Управление →</a>
        </div>
    @endif
    @if(config('features.articles_enabled'))
        <div class="bg-white rounded-xl border border-stone-200 p-6 shadow-sm">
            <h3 class="text-stone-500 text-sm font-medium">Статей</h3>
            <p class="text-3xl font-semibold text-stone-800 mt-1">{{ $articlesCount }}</p>
            <a href="{{ route('admin.articles.index') }}" class="inline-block mt-3 text-amber-600 hover:text-amber-700 text-sm font-medium">Управление →</a>
        </div>
    @endif
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @if(config('features.news_enabled'))
        <div class="bg-white rounded-xl border border-stone-200 p-6 shadow-sm">
            <h3 class="font-medium text-stone-800 mb-3">Последние новости</h3>
            @forelse($recentNews as $item)
                <div class="py-2 border-b border-stone-100 last:border-0">
                    <a href="{{ route('admin.news.edit', $item) }}" class="text-stone-700 hover:text-amber-600">{{ Str::limit($item->title, 40) }}</a>
                    <p class="text-xs text-stone-400">{{ $item->created_at->format('d.m.Y') }} · {{ $item->is_published ? 'Опубликовано' : 'Черновик' }}</p>
                </div>
            @empty
                <p class="text-stone-500 text-sm">Нет новостей</p>
            @endforelse
        </div>
    @endif
    @if(config('features.articles_enabled'))
        <div class="bg-white rounded-xl border border-stone-200 p-6 shadow-sm">
            <h3 class="font-medium text-stone-800 mb-3">Последние статьи</h3>
            @forelse($recentArticles as $item)
                <div class="py-2 border-b border-stone-100 last:border-0">
                    <a href="{{ route('admin.articles.edit', $item) }}" class="text-stone-700 hover:text-amber-600">{{ Str::limit($item->title, 40) }}</a>
                    <p class="text-xs text-stone-400">{{ $item->created_at->format('d.m.Y') }} · {{ $item->is_published ? 'Опубликовано' : 'Черновик' }}</p>
                </div>
            @empty
                <p class="text-stone-500 text-sm">Нет статей</p>
            @endforelse
        </div>
    @endif
</div>
@endsection
