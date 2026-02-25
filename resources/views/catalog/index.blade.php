@extends('layouts.app')

@section('title', 'Каталог товаров')

@section('content')
<div class="flex flex-col md:flex-row gap-8">
    <aside class="md:w-64 shrink-0">
        <h2 class="text-lg font-semibold text-stone-900 mb-3">Разделы</h2>
        <div class="bg-white rounded-xl border border-stone-200 shadow-sm">
            <nav class="py-2">
                <a href="{{ route('catalog.index') }}"
                   class="block px-4 py-2 text-sm rounded-none {{ !$activeCategory ? 'bg-stone-900 text-amber-400' : 'text-stone-700 hover:bg-stone-50' }}">
                    Все товары
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('catalog.category', $category->slug) }}"
                       class="block px-4 py-2 text-sm rounded-none {{ $activeCategory && $activeCategory->id === $category->id ? 'bg-stone-900 text-amber-400' : 'text-stone-700 hover:bg-stone-50' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
                @if($categories->isEmpty())
                    <p class="px-4 py-3 text-sm text-stone-500">Разделы ещё не созданы.</p>
                @endif
            </nav>
        </div>
    </aside>

    <section class="flex-1">
        <div class="mb-6 space-y-3">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-stone-900">
                        @if($activeCategory)
                            {{ $activeCategory->name }}
                        @else
                            Каталог товаров
                        @endif
                    </h1>
                    <p class="text-sm text-stone-500 mt-1">
                        Найдено товаров: {{ $products->total() }}
                    </p>
                </div>
                @if($activeCategory && $activeCategory->image)
                    <div class="hidden sm:block w-32 h-20 rounded-lg overflow-hidden border border-stone-200 bg-stone-50">
                        <img src="{{ asset('storage/' . $activeCategory->image) }}"
                             alt="{{ $activeCategory->name }}"
                             class="w-full h-full object-cover">
                    </div>
                @endif
            </div>

            @if($activeCategory && $activeCategory->description)
                <div class="prose prose-stone max-w-none text-sm text-stone-700">
                    {!! $activeCategory->description !!}
                </div>
            @endif
        </div>

        @if($products->isEmpty())
            <p class="text-stone-500 mt-6">Товаров пока нет.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <article class="bg-white rounded-xl border border-stone-200 overflow-hidden shadow-sm hover:border-amber-200 transition flex flex-col">
                        @if($product->main_image)
                            <a href="{{ route('catalog.show', $product) }}" class="block aspect-[4/3] bg-stone-100 overflow-hidden">
                                <img src="{{ asset('storage/' . $product->main_image) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover">
                            </a>
                        @endif
                        <div class="p-4 flex flex-col flex-1">
                            <a href="{{ route('catalog.show', $product) }}"
                               class="font-semibold text-stone-900 hover:text-amber-600 line-clamp-2">
                                {{ $product->name }}
                            </a>
                            @if($product->category)
                                <p class="text-xs text-stone-400 mt-1">
                                    {{ $product->category->name }}
                                </p>
                            @endif
                            @if($product->description)
                                <p class="text-sm text-stone-600 mt-2 line-clamp-3">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($product->description), 120) }}
                                </p>
                            @endif
                            <div class="mt-4 flex items-center justify-between">
                                <div class="text-lg font-semibold text-emerald-700">
                                    {{ number_format((int) $product->price, 0, ',', ' ') }} ₽
                                </div>
                                <a href="{{ route('catalog.show', $product) }}"
                                   class="text-sm text-amber-600 hover:text-amber-700 font-medium">
                                    Подробнее
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $products->links() }}
            </div>
        @endif
    </section>
</div>
@endsection

