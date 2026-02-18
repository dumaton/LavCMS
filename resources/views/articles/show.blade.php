@extends('layouts.app')

@section('title', $article->title)

@section('content')
<article class="max-w-3xl">
    <a href="{{ route('articles.index') }}" class="text-amber-600 hover:text-amber-700 text-sm mb-4 inline-block">← Все статьи</a>
    <h1 class="text-3xl font-bold text-stone-900 mb-2">{{ $article->title }}</h1>
    <p class="text-stone-500 text-sm mb-1">{{ $article->published_at?->format('d.m.Y') }}</p>
    <p class="text-stone-400 text-xs mb-4">Создано: {{ $article->created_at->format('d.m.Y H:i') }}</p>
    @if($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="mb-6 rounded-xl shadow-sm max-h-80 object-cover">
    @endif
    @if($article->excerpt)
        <p class="text-stone-600 text-lg mb-4">{{ $article->excerpt }}</p>
    @endif
    <div class="prose prose-stone max-w-none text-stone-700">{!! $article->body !!}</div>
</article>
@endsection
