@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <section class="py-16 bg-background">
        <div class="mx-auto max-w-7xl px-6">
            <div class="grid gap-10 lg:grid-cols-4">
                <aside class="lg:pr-8 lg:border-r lg:border-stone-200 lg:col-span-1">
                    <h2 class="text-xs font-medium tracking-widest text-[#6b7280] uppercase mb-3">
                        Разделы каталога
                    </h2>
                    <div class="rounded-sm border border-border bg-card overflow-hidden">
                        <nav class="py-1">
                            <a href="{{ route('catalog.index') }}"
                               class="block px-4 py-2 text-sm {{ !$activeCategory ? 'bg-[#111827] text-[#f9fafb]' : 'text-stone-700 hover:bg-stone-50' }}">
                                Все товары
                            </a>
                            @foreach($categories as $category)
                                <a href="{{ route('catalog.category', $category->slug) }}"
                                   class="block px-4 py-2 text-sm {{ $activeCategory && $activeCategory->id === $category->id ? 'bg-[#111827] text-[#f9fafb]' : 'text-stone-700 hover:bg-stone-50' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                            @if($categories->isEmpty())
                                <p class="px-4 py-3 text-sm text-stone-500">Разделы ещё не созданы.</p>
                            @endif
                        </nav>
                    </div>
                </aside>

                <div class="space-y-6 lg:col-span-3">
                    <div class="mb-2">
                        <a href="{{ url()->previous() ?: route('catalog.index') }}"
                           class="text-xs text-stone-500 hover:text-stone-700">
                            ← Вернуться к каталогу
                        </a>
                    </div>

                    <article class="grid grid-cols-1 lg:grid-cols-2 gap-10 rounded-sm border border-border bg-card p-6 md:p-8 lg:p-10 shadow-sm">
                        <div class="space-y-4">
                            @if($product->main_image)
                                <div class="overflow-hidden rounded-sm border border-stone-200 bg-stone-50 cursor-zoom-in js-product-main-image"
                                     data-full="{{ asset('storage/' . $product->main_image) }}">
                                    <img src="{{ asset('storage/' . $product->main_image) }}"
                                         alt="{{ $product->name }}"
                                         class="w-full h-auto object-cover">
                                </div>
                            @endif

                            @if($product->images->isNotEmpty())
                                <div class="grid grid-cols-3 gap-3">
                                    @foreach($product->images as $image)
                                        <button type="button"
                                                class="group bg-white rounded-sm border border-stone-200 overflow-hidden focus:outline-none focus:ring-2 focus:ring-[#2c5282] js-product-thumb"
                                                data-full="{{ asset('storage/' . $image->path) }}">
                                            <img src="{{ asset('storage/' . $image->path) }}"
                                                 alt="{{ $product->name }}"
                                                 class="w-full h-24 object-cover group-hover:scale-[1.03] transition-transform duration-200">
                                        </button>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="space-y-6">
                            <div class="space-y-3">
                                <span class="text-xs font-medium tracking-widest text-[#2c5282] uppercase">
                                    Товар каталога
                                </span>
                                <h1 class="font-serif text-3xl md:text-4xl font-bold text-foreground text-balance">
                                    {{ $product->name }}
                                </h1>
                                @if($product->brand)
                                    <p class="text-sm text-stone-500">
                                        Бренд: {{ $product->brand->name }}
                                    </p>
                                @elseif($product->category)
                                    <p class="text-sm text-stone-500">
                                        Раздел: {{ $product->category->name }}
                                    </p>
                                @endif
                            </div>

                            <div>
                                <p class="text-xs uppercase tracking-wide text-stone-400 mb-1">
                                    Ориентировочная стоимость
                                </p>
                                <div class="text-2xl font-semibold text-stone-900">
                                    {{ number_format((int) $product->price, 0, ',', ' ') }} ₽
                                </div>
                            </div>

                            <div class="pt-4 border-t border-stone-200">
                                @if($product->description)
                                    <div class="prose prose-sm max-w-none text-muted-foreground leading-relaxed">
                                        {!! $product->description !!}
                                    </div>
                                @else
                                    <p class="text-sm text-muted-foreground">
                                        Описание товара будет добавлено позже.
                                    </p>
                                @endif
                            </div>
                        </div>
                    </article>
                </div>
            </div>

            <div id="product-image-modal"
                 class="fixed inset-0 z-50 hidden items-center justify-center"
                 style="background: rgba(0,0,0,0.7);">
                <button type="button"
                        id="product-image-modal-close"
                        class="absolute top-4 right-4 text-stone-100 hover:text-white text-2xl leading-none px-2">
                    ×
                </button>
                <img id="product-image-modal-img"
                     src=""
                     alt="{{ $product->name }}"
                     class="object-contain shadow-2xl rounded-sm bg-black"
                     style="max-height:90vh;max-width:90vw;">
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('product-image-modal');
            if (!modal) return;

            const modalImg = document.getElementById('product-image-modal-img');
            const closeBtn = document.getElementById('product-image-modal-close');

            function openModal(src) {
                if (!src) return;
                modalImg.src = src;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }

            function closeModal() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                modalImg.src = '';
            }

            document.querySelectorAll('.js-product-main-image, .js-product-thumb').forEach(function (el) {
                el.addEventListener('click', function () {
                    const full = el.getAttribute('data-full');
                    openModal(full);
                });
            });

            if (closeBtn) {
                closeBtn.addEventListener('click', closeModal);
            }

            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    closeModal();
                }
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        });
    </script>
@endpush

