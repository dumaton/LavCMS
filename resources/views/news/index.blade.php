@extends('layouts.app')

@section('title', 'Новости')

@section('content')
<h1 class="text-3xl font-bold text-stone-900 mb-6">Новости</h1>

<div class="space-y-6">
    @forelse($news as $item)
        <article class="bg-white rounded-xl border border-stone-200 p-6 shadow-sm hover:border-amber-200 transition">
            <a href="{{ route('news.show', $item) }}" class="text-xl font-semibold text-stone-800 hover:text-amber-600">{{ $item->title }}</a>
            @if($item->excerpt)
                <p class="text-stone-600 mt-2">{{ $item->excerpt }}</p>
            @else
                <p class="text-stone-600 mt-2">{{ Str::limit(strip_tags($item->body), 200) }}</p>
            @endif
            <p class="text-stone-400 text-sm mt-3">{{ $item->published_at?->format('d.m.Y') }}</p>
        </article>
    @empty
        <p class="text-stone-500">Новостей пока нет.</p>
    @endforelse
</div>

<div class="mt-8">
    {{ $news->links() }}
</div>
@endsection
