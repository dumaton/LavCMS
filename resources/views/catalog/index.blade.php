@extends('layouts.app')

@section('title', 'Каталог товаров')

@section('content')
    <section class="py-16 bg-background">
        <div class="mx-auto max-w-7xl px-6">
            <div class="grid gap-10 lg:grid-cols-4">
                <aside class="lg:col-span-1 border-r border-[#d1d5db] bg-white p-6 h-full overflow-y-auto">
                    <div class="mb-6">
                        <h2 class="text-lg font-bold text-[#1a2b4c] mb-4">Разделы каталога</h2>
                    </div>

                    <nav class="space-y-1">
                        <a href="{{ route('catalog.index') }}"
                           class="flex items-center justify-between px-3 py-2 rounded-md text-sm font-medium {{ !$activeCategory ? 'bg-[#2c5282] text-white' : 'text-[#5a6a85] hover:text-[#1a2b4c] hover:bg-[#f3f4f6]' }} transition-colors">
                            <span>Все товары</span>
                        </a>

                        @foreach($categories as $category)
                            <a href="{{ route('catalog.category', $category->slug) }}"
                               class="flex items-center justify-between px-3 py-2 rounded-md text-sm font-medium {{ $activeCategory && $activeCategory->id === $category->id ? 'bg-[#2c5282] text-white' : 'text-[#5a6a85] hover:text-[#1a2b4c] hover:bg-[#f3f4f6]' }} transition-colors">
                                <span>{{ $category->name }}</span>
                            </a>
                        @endforeach

                        @if($categories->isEmpty())
                            <p class="px-3 py-2 text-sm text-[#5a6a85] rounded-md bg-[#f9fafb]">
                                Разделы ещё не созданы.
                            </p>
                        @endif
                    </nav>
                </aside>

                <section class="space-y-8 lg:col-span-3">
                    <div class="space-y-3">
                        <div class="p-5 md:p-6 lg:p-8 border-b border-[#d1d5db] bg-white rounded-t-lg">
                            <h1 class="text-3xl md:text-4xl font-bold text-[#1a2b4c] mb-2">
                                @if($activeCategory)
                                    {{ $activeCategory->name }}
                                @else
                                    Каталог товаров
                                @endif
                            </h1>
                            <p class="text-sm text-[#5a6a85]">
                                Найдено товаров: {{ $products->total() }}
                            </p>
                        </div>

                        @if($activeCategory && $activeCategory->image)
                            <div class="hidden sm:block w-40 h-24 rounded-sm overflow-hidden border border-stone-200 bg-stone-50">
                                <img src="{{ asset('storage/' . $activeCategory->image) }}"
                                     alt="{{ $activeCategory->name }}"
                                     class="w-full h-full object-cover">
                            </div>
                        @endif

                        @if($activeCategory && $activeCategory->description)
                            <div class="prose prose-sm max-w-none text-muted-foreground leading-relaxed">
                                {!! $activeCategory->description !!}
                            </div>
                        @endif
                    </div>

                    @if($products->isEmpty())
                        <p class="text-sm text-muted-foreground">
                            Товаров в этом разделе пока нет.
                        </p>
                    @else
                        <div class="p-4 lg:p-0">
                            <div class="grid gap-4 lg:gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                                @foreach($products as $product)
                                    <article class="group flex flex-col overflow-hidden rounded-lg border border-[#d1d5db] bg-white shadow-sm transition-all duration-300 hover:shadow-lg hover:border-[#2c5282]">
                                        <a href="{{ route('catalog.show', $product) }}" class="relative h-56 w-full overflow-hidden bg-[#f3f4f6]">
                                            @if($product->main_image)
                                                <img
                                                    src="{{ asset('storage/' . $product->main_image) }}"
                                                    alt="{{ $product->name }}"
                                                    loading="lazy"
                                                    class="object-cover transition-transform duration-300 group-hover:scale-105 w-full h-full">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-xs text-[#9ca3af]">
                                                    Фото товара отсутствует
                                                </div>
                                            @endif
                                            @if($product->brand)
                                                <div class="absolute top-3 right-3 rounded-md bg-[#2c5282] px-2.5 py-1 text-xs font-semibold text-white">
                                                    {{ $product->brand->name }}
                                                </div>
                                            @endif
                                        </a>

                                        <div class="flex flex-1 flex-col gap-3 p-4 lg:p-5">
                                            <div class="flex items-start justify-between gap-2">
                                                @if($product->category)
                                                    <span class="inline-block rounded bg-[#e5e7eb] px-2 py-1 text-xs font-medium text-[#1a2b4c]">
                                                        {{ $product->category->name }}
                                                    </span>
                                                @endif
                                                <span class="text-xs text-[#5a6a85] truncate max-w-[120px]">
                                                    {{ $product->slug }}
                                                </span>
                                            </div>

                                            <h3 class="text-base font-semibold text-[#1a2b4c] line-clamp-2">
                                                {{ $product->name }}
                                            </h3>

                                            @if($product->description)
                                                <p class="flex-1 text-sm text-[#5a6a85] line-clamp-2">
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($product->description), 140) }}
                                                </p>
                                            @endif

                                            <div class="flex items-center justify-between gap-3 pt-2">
                                                <span class="text-lg font-bold text-[#2c5282]">
                                                    {{ number_format((int) $product->price, 0, ',', ' ') }} ₽
                                                </span>
                                                <a href="{{ route('catalog.show', $product) }}"
                                                   class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium border bg-background h-8 rounded-md gap-1.5 px-3 border-[#2c5282] text-[#2c5282] hover:bg-[#2c5282] hover:text-white transition-colors">
                                                    Подробнее
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-8">
                            {{ $products->links() }}
                        </div>
                    @endif
                </section>
            </div>
        </div>
    </section>
@endsection

