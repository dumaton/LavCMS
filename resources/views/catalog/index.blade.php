@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/tmp.css') }}">
@endpush

@section('title', 'Каталог товаров')

@section('content')
    <section class="py-16 bg-background">
        <div class="mx-auto max-w-7xl px-6 bg-[#f9fafb]">

<div class="min-h-screen bg-[#f9fafb]">
  <div class="mx-auto max-w-7xl px-6">
<div class="w-1/5 bg-blue-100 p-4 rounded-sm bg-card p-6 transition-all">
                            <h1 class="text-3xl md:text-4xl font-bold text-[#1a2b4c] mb-2">
                                @if($activeCategory)
                                    {{ $activeCategory->name }}
                                @else
                                    Каталог товаров
                                @endif
                            </h1> 
</div>
  
    <div class="flex">
      <!-- Левая колонка (25%) -->
      <div class="w-1/5 bg-blue-100 p-4 rounded-sm bg-card p-6 transition-all">
<nav class="space-y-1">
                        <a href="{{ route('catalog.index') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium {{ !$activeCategory ? 'bg-[#2c5282] text-white' : 'text-[#5a6a85] hover:text-[#1a2b4c] hover:bg-[#f3f4f6]' }} transition-colors">
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-md bg-[#f3f4f6] text-[#1a2b4c] shrink-0 category-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
                            </span>
                            <span>Все товары</span>
                        </a>

                        @foreach($categories as $category)
                            <a href="{{ route('catalog.category', $category->slug) }}"
                               class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium {{ $activeCategory && $activeCategory->id === $category->id ? 'bg-[#2c5282] text-white' : 'text-[#5a6a85] hover:text-[#1a2b4c] hover:bg-[#f3f4f6]' }} transition-colors">
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-md bg-[#f3f4f6] text-[#1a2b4c] shrink-0 category-icon">
                                    @if($category->svg_icon)
                                        {!! $category->svg_icon !!}
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/></svg>
                                    @endif
                                </span>
                                <span>{{ $category->name }}</span>
                            </a>
                        @endforeach

                        @if($categories->isEmpty())
                            <p class="px-3 py-2 text-sm text-[#5a6a85] rounded-md bg-[#f9fafb]">
                                Разделы ещё не созданы.
                            </p>
                        @endif
                    </nav>
      </div>
      

 
      <!-- Правая колонка (75%) -->
      <div class="w-4/5 bg-green-100 p-4 rounded-sm bg-card p-6 transition-all w-full">
<div class="grid min-w-0 grid-cols-1 gap-2 sm:grid-cols-1 lg:gap-6 lg:grid-cols-2">

                                @if($products->isEmpty())
                                    <p class="text-sm text-muted-foreground">
                                        Раздел наполняется, актуальную информацию Вы можете получить, <a class="font-bold" href="/#contacts">связавшись</a> с нами.
                                    </p>
                                @endif

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
                                                    {{ $product->article }}
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
                                                @if($product->price && (int) $product->price > 0)
                                                    <span class="text-lg font-bold text-[#2c5282]">
                                                        {{ number_format((int) $product->price, 0, ',', ' ') }} ₽
                                                    </span>
                                                @else
                                                    <span class="text-lg font-bold text-[#2c5282]">
                                                        Цена по запросу
                                                    </span>
                                                @endif
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
      </div>
    </div>
  </div>
</div>
            </div>
        </div>
    </section>
@endsection

