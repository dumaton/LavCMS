@extends('layouts.app')

@section('title', $news->title)

@section('content')
<article class="max-w-3xl">
    <a href="{{ route('news.index') }}" class="text-amber-600 hover:text-amber-700 text-sm mb-4 inline-block">← Все новости</a>
    <h1 class="text-3xl font-bold text-stone-900 mb-2">{{ $news->title }}</h1>
    <p class="text-stone-500 text-sm mb-1">{{ $news->published_at?->format('d.m.Y') }}</p>
    <p class="text-stone-400 text-xs mb-4">Создано: {{ $news->created_at->format('d.m.Y H:i') }}</p>
    @if($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="mb-6 rounded-xl shadow-sm max-h-80 object-cover">
    @endif
    @if($news->excerpt)
        <p class="text-stone-600 text-lg mb-4">{{ $news->excerpt }}</p>
    @endif
    <div class="prose prose-stone max-w-none text-stone-700">{!! $news->body !!}</div>
</article>
@endsection
