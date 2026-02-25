@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-6">
        <a href="{{ url()->previous() }}" class="text-sm text-stone-500 hover:text-stone-700">&larr; Назад в каталог</a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div>
            @if($product->main_image)
                <div class="bg-white rounded-xl border border-stone-200 overflow-hidden shadow-sm mb-4">
                    <img src="{{ asset('storage/' . $product->main_image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-auto object-cover">
                </div>
            @endif

            @if($product->images->isNotEmpty())
                <div class="grid grid-cols-3 gap-3">
                    @foreach($product->images as $image)
                        <div class="bg-white rounded-lg border border-stone-200 overflow-hidden">
                            <img src="{{ asset('storage/' . $image->path) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-24 object-cover">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div>
            <h1 class="text-3xl font-bold text-stone-900 mb-4">{{ $product->name }}</h1>
            @if($product->category)
                <p class="text-sm text-stone-500 mb-2">
                    Раздел: {{ $product->category->name }}
                </p>
            @endif

            <div class="text-2xl font-semibold text-emerald-700 mb-6">
                {{ number_format((int) $product->price, 0, ',', ' ') }} ₽
            </div>

            @if($product->description)
                <div class="prose prose-stone max-w-none text-stone-700">
                    {!! $product->description !!}
                </div>
            @else
                <p class="text-stone-600">Описание товара будет добавлено позже.</p>
            @endif
        </div>
    </div>
</div>
@endsection

