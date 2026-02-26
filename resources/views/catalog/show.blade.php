@extends('layouts.app')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tmp.css') }}">
    <style>
        /* Fallback-шрифты с выравниванием метрик */
        @font-face {
            font-family: Inter Fallback;
            src: local(Arial);
            ascent-override: 90.44%;
            descent-override: 22.52%;
            line-gap-override: 0%;
            size-adjust: 107.12%;
        }
        @font-face {
            font-family: Roboto Slab Fallback;
            src: local("Times New Roman");
            ascent-override: 89.69%;
            descent-override: 23.2%;
            line-gap-override: 0%;
            size-adjust: 116.83%;
        }
        /* Галерея: главное фото — обёртка заполняет область, img внутри без absolute */
        .js-product-gallery-area {
            position: relative;
            overflow: hidden;
        }
        .js-product-gallery-area .gallery-main-slide {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            box-sizing: border-box;
        }
        .js-product-gallery-area .gallery-main-slide.is-hidden {
            display: none;
            z-index: 0;
        }
        .js-product-gallery-area .gallery-main-slide img {
            display: block;
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            object-fit: contain;
            object-position: center;
            margin: 0;
            padding: 0;
        }
        .js-gallery-thumb img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        /* Отступ «Назад в каталог» только на мобильных */
        .back-to-catalog-link { margin-top: 1rem; }
        @media (min-width: 768px) {
            .back-to-catalog-link { margin-top: 0; }
        }
    </style>
@endpush

@section('title', $product->name)

@php
    $mainImg = $product->main_image ? [asset('storage/' . ltrim($product->main_image, '/'))] : [];
    $extraImgs = $product->images->map(fn($i) => asset('storage/' . ltrim($i->path, '/')))->toArray();
    $allImages = array_values(array_filter(array_merge($mainImg, $extraImgs)));
    $totalImages = count($allImages);
@endphp

@section('content')
<section class="py-16 bg-background">
        <div class="mx-auto max-w-7xl px-6 group flex flex-col gap-4 rounded-sm border border-border bg-card p-6">
            <div class="">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">

                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-[#1a2b4c]">{{ $product->name }}</h1>

                    </div>
                </div>
            </div>
        </div>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                <div class="order-2 lg:order-1">
                    <div class="space-y-4">
                        <div class="js-product-gallery-area"
                             style="position: relative; overflow: hidden; border-radius: 0.75rem;
                                    background: linear-gradient(to bottom, #f3f4f6, #e5e7eb);
                                    height: 24rem; max-height: 500px; width: 100%;">
                            @if($totalImages > 0)
                                @foreach($allImages as $idx => $imgSrc)
                                    <div class="gallery-main-slide {{ $idx === 0 ? '' : 'is-hidden' }}" data-index="{{ $idx }}">
                                        <img src="{{ $imgSrc }}" alt="{{ $product->name }}">
                                    </div>
                                @endforeach
                                @if($totalImages > 1)
                                    <button type="button" class="js-gallery-prev absolute left-4 top-1/2 -translate-y-1/2 bg-white hover:bg-gray-50 p-2.5 rounded-full shadow-lg transition-all z-10 border border-[#e5e7eb]" aria-label="Предыдущее фото">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-[#5a6a85]"><path d="m15 18-6-6 6-6"></path></svg>
                                    </button>
                                    <button type="button" class="js-gallery-next absolute right-4 top-1/2 -translate-y-1/2 bg-white hover:bg-gray-50 p-2.5 rounded-full shadow-lg transition-all z-10 border border-[#e5e7eb]" aria-label="Следующее фото">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-[#5a6a85]"><path d="m9 18 6-6-6-6"></path></svg>
                                    </button>
                                    <div class="js-gallery-counter absolute bottom-4 left-4 bg-black/50 text-white px-3 py-1.5 rounded-md text-sm font-medium">1/{{ $totalImages }}</div>
                                @elseif($totalImages === 1)
                                    <div class="js-gallery-counter absolute bottom-4 left-4 bg-black/50 text-white px-3 py-1.5 rounded-md text-sm font-medium">1/1</div>
                                @endif
                            @else
                                <div class="absolute inset-0 flex items-center justify-center text-[#5a6a85] text-sm">Фото товара отсутствует</div>
                            @endif
                        </div>
                        @if($totalImages > 0)
                            <div class="flex gap-3 overflow-x-auto pb-2 js-gallery-thumbs">
                                @foreach($allImages as $idx => $imgSrc)
                                    <div role="button" tabindex="0"
                                         class="js-gallery-thumb relative w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden border-2 transition-all bg-white cursor-pointer {{ $idx === 0 ? 'border-[#2c5282] shadow-md' : 'border-[#d1d5db] hover:border-[#2c5282]' }}"
                                         data-index="{{ $idx }}">
                                        <img src="{{ $imgSrc }}" alt="{{ $product->name }}" class="block w-full h-full object-cover" loading="lazy">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="order-1 lg:order-2 space-y-8">
                    @if($product->brand || $product->category)
                        <div class="flex gap-3 flex-wrap">
                            @if($product->category)
                                <a href="{{ route('catalog.category', $product->category->slug) }}"
                                   class="px-3 py-1 bg-[#e5e7eb] text-[#1a2b4c] text-sm font-medium rounded-full hover:bg-[#d1d5db] transition-colors">
                                    {{ $product->category->name }}
                                </a>
                            @endif
                        </div>
                    @endif

                    <div class="bg-white rounded-lg border border-[#d1d5db] p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-[#5a6a85] font-medium">Наличие</span>
                            <span class="inline-flex items-center gap-2 align-middle">
                                <span class="w-2 h-2 rounded-full" style="background-color: {{ $product->in_stock ? '#22c55e' : '#f59e0b' }};"></span>
                                <span class="text-[#1a2b4c] font-semibold">{{ $product->in_stock ? 'В наличии' : 'Под заказ' }}</span>
                            </span>
                        </div>
                        @if($product->price && (int) $product->price > 0)
                            <div class="text-3xl font-bold text-[#1a2b4c]">{{ number_format((int) $product->price, 0, ',', ' ') }} ₽</div>
                            <p class="text-sm text-[#5a6a85] mt-2">Цена ориентировочная. Актуальную стоимость уточняйте у менеджера.</p>
                        @else
                            <div class="text-xl font-bold text-[#1a2b4c]">Цена по запросу</div>
                            <p class="text-sm text-[#5a6a85] mt-2">Свяжитесь с нами для расчёта стоимости.</p>
                        @endif
                    </div>


                    @if($product->article || $product->brand)
                        <div class="border-t border-[#e5e7eb] pt-6 text-sm text-[#5a6a85]">
                            @if($product->article)
                                <p class="mb-2"><span class="font-semibold text-[#1a2b4c]">Артикул:</span> {{ $product->article }}</p>
                            @endif
                            @if($product->brand)
                                <p><span class="font-semibold text-[#1a2b4c]">Производитель:</span> {{ $product->brand->name }}</p>
                            @endif
                        </div>
                    @endif

                    <div>
                        <h2 class="text-sm font-semibold text-[#5a6a85] uppercase mb-3">О товаре</h2>
                        @if($product->description)
                            <div class="text-[#5a6a85] leading-relaxed prose prose-sm max-w-none">
                                {!! $product->description !!}
                            </div>
                        @else
                            <p class="text-[#5a6a85] leading-relaxed">Описание товара будет добавлено позже.</p>
                        @endif
                    </div>



                    <div class="space-y-3 pt-4">
                        <a href="{{ url('/#contacts') }}" class="inline-flex items-center justify-center gap-2 w-full bg-[#1a2b4c] hover:bg-[#0f1725] text-white h-12 rounded-lg font-semibold text-sm transition-colors">
                            Запросить КП
                        </a>
                    </div>

                </div>
            </div>
                <a class="back-to-catalog-link inline-flex items-center gap-2 text-[#2c5282] hover:text-[#1a2b4c] font-medium mb-4" href="{{ route('catalog.category', $product->category->slug) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" aria-hidden="true"><path d="m12 19-7-7 7-7"></path><path d="M19 12H5"></path></svg>
                    Назад в каталог
                </a>            
        </main>
    </div>
    </section>
@endsection

@if($totalImages > 0)
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var slides = document.querySelectorAll('.gallery-main-slide');
            var thumbs = document.querySelectorAll('.js-gallery-thumb');
            var prev = document.querySelector('.js-gallery-prev');
            var next = document.querySelector('.js-gallery-next');
            var counter = document.querySelector('.js-gallery-counter');
            var n = slides.length;
            var idx = 0;

            function show(i) {
                idx = (i + n) % n;
                slides.forEach(function (el, k) {
                    el.classList.toggle('is-hidden', k !== idx);
                });
                thumbs.forEach(function (el, k) {
                    el.classList.toggle('border-[#2c5282]', k === idx);
                    el.classList.toggle('shadow-md', k === idx);
                    el.classList.toggle('border-[#d1d5db]', k !== idx);
                });
                if (counter) counter.textContent = (idx + 1) + '/' + n;
            }

            thumbs.forEach(function (el, i) {
                el.addEventListener('click', function () { show(i); });
                el.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        show(i);
                    }
                });
            });
            if (prev) prev.addEventListener('click', function () { show(idx - 1); });
            if (next) next.addEventListener('click', function () { show(idx + 1); });
        });
    </script>
@endpush
@endif
