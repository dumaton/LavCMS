@extends('layouts.app')

@php
    /** @var \Illuminate\Support\Collection|\array_access|null $settings */
    $homeTitle = $settings['home_title'] ?? 'ХимТехПром - промышленное оборудование и химия под заказ';
    $homeDescription = $settings['home_description'] ?? 'Комплексные поставки промышленного оборудования, промышленной химии, инструмента и расходных материалов от ведущих мировых производителей.';
    $keywords = $settings['keywords'] ?? '';
    $heroBadge = $settings['hero_badge'] ?? 'Надежный поставщик';
    $heroTitle = $settings['hero_title'] ?? 'Промышленное оборудование и химия';
    $heroSubtitle = $settings['hero_subtitle'] ?? 'для вашего производства';
    $heroDescription = $settings['hero_description'] ?? 'Комплексные поставки промышленного оборудования, промышленной химии, инструмента и расходных материалов от ведущих мировых производителей. Индивидуальный подход к каждому клиенту.';
    $aboutBadge = $settings['about_badge'] ?? 'О компании';
    $aboutTitle = $settings['about_title'] ?? 'Комплексный поставщик промышленного оборудования и промышленной химии';
    $aboutText = $settings['about_text'] ?? 'ООО «Химтехпром» — динамично развивающаяся компания, специализирующаяся на поставках:<br>
- промышленного оборудования, инструмента и расходных материалов для предприятий нефтегазовой, химической промышленности;<br>
- промышленной химии для нефтеперерабатывающих, химических, лакокрасочных, пищевых отраслей.<br>
Рассмотрим все запросы и постараемся учесть все потребности покупателя. Мы ценим каждого клиента и стремимся к долгосрочным отношениям.';
    $phoneMobile = $settings['phone_mobile'] ?? '+7 (917) 436-00-01';
    $phoneCity = $settings['phone_city'] ?? '+7 (347) 215-17-57';
    $contactEmail = $settings['contact_email'] ?? 'ooohtp@mail.ru';
    $contactAddress = $settings['contact_address'] ?? 'г. Уфа, ул. Гоголя, 60/1';
    $contactLegalAddress = $settings['contact_legal_address'] ?? '';
    $contactHours = $settings['contact_hours'] ?? "Пн-Пт: 9:00-18:00\nСб-Вс: выходной";
@endphp

@section('title', $homeTitle)
@section('meta_description', $homeDescription)
@section('meta_keywords', $keywords)

@section('content')
    {{-- HERO / INTRO --}}
    <section class="relative min-h-screen flex items-center overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image:url('{{ asset('images/hero-bg.jpg') }}')"></div>
        <div class="absolute inset-0 bg-[#0a1628]/80"></div>
        <div class="absolute inset-0 opacity-[0.03]"
             style="background-image:linear-gradient(rgba(255,255,255,.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.1) 1px, transparent 1px);background-size:60px 60px">
        </div>
        <div class="relative z-10 mx-auto max-w-7xl px-6 py-32 lg:py-0">
            <div class="flex flex-col gap-8 max-w-3xl">
                <div class="inline-flex w-fit items-center gap-2 rounded-sm border border-[#2c5282]/40 bg-[#1a2b4c]/60 px-4 py-2 backdrop-blur-sm">
                    <div class="h-2 w-2 rounded-full bg-[#3b82f6] animate-pulse"></div>
                    <span class="text-xs font-medium tracking-widest text-[#8b9ab5] uppercase">{{ $heroBadge }}</span>
                </div>
                <h1 class="font-serif text-4xl font-bold leading-tight text-[#f8f9fb] md:text-5xl lg:text-6xl text-balance">
                    {{ $heroTitle }}
                    <span class="text-[#5a9cf5]">{{ $heroSubtitle }}</span>
                </h1>
                <p class="text-lg leading-relaxed text-[#8b9ab5] max-w-xl text-pretty">
                    {{ $heroDescription }}
                </p>
                <div class="flex flex-wrap items-center gap-4">
                    <a class="inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-10 has-[>svg]:px-4 bg-[#2c5282] text-[#f8f9fb] hover:bg-[#3b6db5] rounded-sm px-8 text-sm tracking-wide uppercase" href="#contacts">
                        Получить предложение
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 h-4 w-4" aria-hidden="true">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-background to-transparent"></div>
    </section>

    {{-- ABOUT --}}
    <section id="about" class="py-24 bg-background">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col gap-4 max-w-2xl mb-16">
                <span class="text-xs font-medium tracking-widest text-[#2c5282] uppercase">{{ $aboutBadge }}</span>
                <h2 class="font-serif text-3xl font-bold text-foreground md:text-4xl text-balance">
                    {{ $aboutTitle }}
                </h2>
                <p class="text-base leading-relaxed text-muted-foreground text-pretty">{!! $aboutText !!}</p>
            </div>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div class="group flex flex-col gap-4 rounded-sm border border-border bg-card p-6 transition-all hover:border-[#2c5282]/40 hover:shadow-lg hover:shadow-[#2c5282]/5">
                    <div class="flex h-12 w-12 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282] transition-colors group-hover:bg-[#2c5282] group-hover:text-[#f8f9fb]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-truck h-6 w-6" aria-hidden="true">
                            <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                            <path d="M15 18H9"></path>
                            <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                            <circle cx="17" cy="18" r="2"></circle>
                            <circle cx="7" cy="18" r="2"></circle>
                        </svg>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-card-foreground">Логистика по всей РФ</h3>
                    <p class="text-sm leading-relaxed text-muted-foreground">
                        В адрес покупателя отправим транспортной компанией «Деловые линии», «ПЭК».
                    </p>
                </div>
                <div class="group flex flex-col gap-4 rounded-sm border border-border bg-card p-6 transition-all hover:border-[#2c5282]/40 hover:shadow-lg hover:shadow-[#2c5282]/5">
                    <div class="flex h-12 w-12 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282] transition-colors group-hover:bg-[#2c5282] group-hover:text-[#f8f9fb]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-headphones h-6 w-6" aria-hidden="true">
                            <path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"></path>
                        </svg>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-card-foreground">Техническая поддержка</h3>
                    <p class="text-sm leading-relaxed text-muted-foreground">
                        Команда специалистов поможет подобрать оборудование и обеспечит сервисное сопровождение на всех этапах.
                    </p>
                </div>
                <div class="group flex flex-col gap-4 rounded-sm border border-border bg-card p-6 transition-all hover:border-[#2c5282]/40 hover:shadow-lg hover:shadow-[#2c5282]/5">
                    <div class="flex h-12 w-12 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282] transition-colors group-hover:bg-[#2c5282] group-hover:text-[#f8f9fb]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-check h-6 w-6" aria-hidden="true">
                            <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-card-foreground">Гарантия качества</h3>
                    <p class="text-sm leading-relaxed text-muted-foreground">
                        Поставим продукцию, соответствующую требованиям стандартов.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- BRANDS --}}
    <section id="brands" class="py-24 bg-[#1a2b4c]">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col items-center gap-4 text-center mb-16">
                <span class="text-xs font-medium tracking-widest text-[#5a9cf5] uppercase">Наши партнеры</span>
                <h2 class="font-serif text-3xl font-bold text-[#f8f9fb] md:text-4xl text-balance">
                    Работаем с ведущими мировыми брендами
                </h2>
                <p class="max-w-xl text-base leading-relaxed text-[#8b9ab5] text-pretty">
                    Гарантируем подлинность продукции и лучшие условия поставок
                </p>
            </div>
            @if($brands->isNotEmpty())
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-[repeat(auto-fill,minmax(11rem,1fr))] gap-4">
                    @foreach($brands as $brand)
                        <div class="flex flex-col items-center justify-center gap-3 min-h-[200px] rounded-lg bg-[#162240] p-6 transition-colors hover:bg-[#1e3054]">
                            @if($brand->image)
                                <img src="{{ asset('storage/' . $brand->image) }}"
                                     alt="{{ $brand->name }}"
                                     class="h-24 w-auto max-w-full object-contain object-center opacity-90 transition-opacity hover:opacity-100"
                                     loading="lazy">
                            @else
                                <span class="h-24 w-full flex items-center justify-center text-xs text-[#8b9ab5] border border-dashed border-[#2c5282]/40 rounded">
                                    Без логотипа
                                </span>
                            @endif
                            <span class="text-xs text-center text-[#8b9ab5] tracking-wide">
                                {{ $brand->name }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-center text-[#8b9ab5]">
                    Бренды пока не добавлены. 
                </p>
            @endif
        </div>
    </section>

    {{-- PRODUCTS / CATALOG: Промышленное оборудование --}}
    <section id="products" class="py-24 bg-background">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col items-center gap-4 text-center mb-16">
                <span class="text-xs font-medium tracking-widest text-[#2c5282] uppercase">Каталог</span>
                <h2 class="font-serif text-3xl font-bold text-foreground md:text-4xl text-balance">Промышленное оборудование</h2>
                <p class="max-w-xl text-base leading-relaxed text-muted-foreground text-pretty">
                    Наличие на складе продукции уточняйте.
                </p>
            </div>

            @if(isset($equipmentCategories) && $equipmentCategories->isNotEmpty())
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4 mb-16">
                    @foreach($equipmentCategories as $category)
                        <a href="{{ route('catalog.category', $category->slug) }}"
                           class="group relative flex flex-col gap-4 rounded-sm border border-border bg-card p-8 transition-all hover:border-[#2c5282]/40 hover:shadow-lg hover:shadow-[#2c5282]/5">
                            <div class="flex items-center justify-between">
                                <div class="flex h-12 w-12 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282] transition-colors group-hover:bg-[#2c5282] group-hover:text-[#f8f9fb]">
                                    @if($category->svg_icon)
                                        {!! $category->svg_icon !!}
                                    @endif
                                </div>
                                <span class="text-xs font-medium text-muted-foreground tracking-wide">
                                    {{ $category->products()->count() }} позиций
                                </span>
                            </div>
                            <h3 class="font-serif text-lg font-semibold text-card-foreground">
                                {{ $category->name }}
                            </h3>
                            @if($category->description)
                                <p class="text-sm leading-relaxed text-muted-foreground line-clamp-4">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($category->description), 160) }}
                                </p>
                            @else
                                <p class="text-sm leading-relaxed text-muted-foreground">
                                    Раздел промышленного оборудования из каталога.
                                </p>
                            @endif
                            <div class="mt-auto pt-4 border-t border-border">
                                <span class="text-xs font-medium text-[#2c5282] tracking-wide uppercase cursor-pointer group-hover:text-[#3b6db5] transition-colors">
                                    Подробнее →
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif

            {{-- ПРОМЫШЛЕННАЯ ХИМИЯ --}}
            <div class="flex flex-col items-center gap-4 text-center mb-16">
                <h2 class="font-serif text-3xl font-bold text-foreground md:text-4xl text-balance">Промышленная химия</h2>
                <p class="max-w-xl text-base leading-relaxed text-muted-foreground text-pretty">
                    Наличие на складе продукции уточняйте.
                </p>
            </div>

            @if(isset($chemistryCategories) && $chemistryCategories->isNotEmpty())
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 mb-16">
                    @foreach($chemistryCategories as $category)
                        <a href="{{ route('catalog.category', $category->slug) }}"
                           class="group relative flex flex-col gap-4 rounded-sm border border-border bg-card p-8 transition-all hover:border-[#2c5282]/40 hover:shadow-lg hover:shadow-[#2c5282]/5">
                            <div class="flex items-center justify-between">
                                <div class="flex h-12 w-12 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282] transition-colors group-hover:bg-[#2c5282] group-hover:text-[#f8f9fb]">
                                    @if($category->svg_icon)
                                        {!! $category->svg_icon !!}
                                    @endif
                                </div>
                                <span class="text-xs font-medium text-muted-foreground tracking-wide">
                                    {{ $category->products()->count() }} позиций
                                </span>
                            </div>
                            <h3 class="font-serif text-lg font-semibold text-card-foreground">
                                {{ $category->name }}
                            </h3>
                            @if($category->description)
                                <p class="text-sm leading-relaxed text-muted-foreground line-clamp-4">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($category->description), 160) }}
                                </p>
                            @endif
                            <div class="mt-auto pt-4 border-t border-border">
                                <span class="text-xs font-medium text-[#2c5282] tracking-wide uppercase cursor-pointer group-hover:text-[#3b6db5] transition-colors">
                                    Подробнее →
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif            
</div>
    </section>

    {{-- CONTACTS --}}
    <section id="contacts" class="py-24 bg-[#f0f2f5]">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col items-center gap-4 text-center mb-16">
                <span class="text-xs font-medium tracking-widest text-[#2c5282] uppercase">Контакты</span>
                <h2 class="font-serif text-3xl font-bold text-[#1a2b4c] md:text-4xl text-balance">Свяжитесь с нами</h2>
                <p class="max-w-xl text-base leading-relaxed text-[#5a6a85] text-pretty">
                    Оставьте заявку и наш специалист подготовит коммерческое предложение
                </p>
            </div>
            <div class="grid gap-8 lg:grid-cols-2">
                <div class="rounded-sm border border-[#d1d5db] bg-[#ffffff] p-8">
                    <form class="flex flex-col gap-5" action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="from_home" value="1">
                        <input type="hidden" name="subject" value="Заявка с лендинга">
                        <h3 class="font-serif text-xl font-semibold text-[#1a2b4c] mb-2">
                            Запросить коммерческое предложение
                        </h3>
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="flex flex-col gap-1.5">
                                <label for="name" class="text-xs font-medium text-[#5a6a85] tracking-wide uppercase">Имя *</label>
                                <input id="name" name="name" type="text" placeholder="Иван Петров" value="{{ old('name') }}"
                                       class="file:text-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 h-9 w-full min-w-0 border px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive rounded-sm border-[#d1d5db] bg-[#f8f9fb] text-[#1a2b4c] placeholder:text-[#8b9ab5] focus-visible:ring-[#2c5282]" required>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="company" class="text-xs font-medium text-[#5a6a85] tracking-wide uppercase">Компания *</label>
                                <input id="company" name="company" type="text" placeholder="ООО «Компания»" value="{{ old('company') }}" required
                                       class="file:text-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 h-9 w-full min-w-0 border px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive rounded-sm border-[#d1d5db] bg-[#f8f9fb] text-[#1a2b4c] placeholder:text-[#8b9ab5] focus-visible:ring-[#2c5282]">
                            </div>
                        </div>
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="flex flex-col gap-1.5">
                                <label for="email" class="text-xs font-medium text-[#5a6a85] tracking-wide uppercase">E-mail *</label>
                                <input id="email" name="email" type="email" placeholder="info@company.ru" value="{{ old('email') }}"
                                       class="file:text-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 h-9 w-full min-w-0 border px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive rounded-sm border-[#d1d5db] bg-[#f8f9fb] text-[#1a2b4c] placeholder:text-[#8b9ab5] focus-visible:ring-[#2c5282]" required>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="phone" class="text-xs font-medium text-[#5a6a85] tracking-wide uppercase">Телефон *</label>
                                <input id="phone" name="phone" type="tel" placeholder="+7 (___) ___-__-__" value="{{ old('phone') }}"
                                       class="file:text-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 h-9 w-full min-w-0 border px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive rounded-sm border-[#d1d5db] bg-[#f8f9fb] text-[#1a2b4c] placeholder:text-[#8b9ab5] focus-visible:ring-[#2c5282]" required>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label for="message" class="text-xs font-medium text-[#5a6a85] tracking-wide uppercase">Сообщение</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="4"
                                placeholder="Опишите ваш запрос..."
                                class="focus-visible:border-ring aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 flex field-sizing-content min-h-16 w-full border px-3 py-2 text-base shadow-xs transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm rounded-sm border-[#d1d5db] bg-[#f8f9fb] text-[#1a2b4c] placeholder:text-[#8b9ab5] focus-visible:ring-[#2c5282] resize-none"
                            >{{ old('message') }}</textarea>
                        </div>
                        <button type="submit"
                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-9 px-4 has-[>svg]:px-3 bg-[#2c5282] text-[#f8f9fb] hover:bg-[#3b6db5] rounded-sm w-full py-3 text-sm tracking-wide uppercase">
                            Отправить заявку
                        </button>
                        <p class="text-[11px] text-[#8b9ab5] text-center">
                            Нажимая кнопку, вы соглашаетесь с политикой обработки персональных данных
                        </p>
                    </form>
                </div>
                <div class="flex flex-col gap-6">
                    <div class="relative flex-1 min-h-[280px] rounded-sm overflow-hidden border border-[#d1d5db] bg-[#1a2b4c]">
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?indoorLevel=1&ll=55.940303%2C54.728987&mode=map&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgg1NzczMzc3MhJi0KDQvtGB0YHQuNGPLCDQoNC10YHQv9GD0LHQu9C40LrQsCDQkdCw0YjQutC-0YDRgtC-0YHRgtCw0L0sINCj0YTQsCwg0YPQu9C40YbQsCDQk9C-0LPQvtC70Y8sIDYwLzEiCg3ewl9CFXzqWkI%2C&z=16&theme=dark"
                            width="100%"
                            height="100%"
                            frameborder="0"
                            allowfullscreen="false"
                            style="position:relative;">
                        </iframe>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="flex items-start gap-3 rounded-sm border border-[#d1d5db] bg-[#ffffff] p-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-5 w-5" aria-hidden="true">
                                    <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-medium tracking-widest text-[#8b9ab5] uppercase">Телефон</p>
                                <p class="text-sm font-semibold text-[#1a2b4c]">{{ $phoneMobile }}</p>
                                <p class="text-sm font-semibold text-[#1a2b4c]">{{ $phoneCity }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 rounded-sm border border-[#d1d5db] bg-[#ffffff] p-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail h-5 w-5" aria-hidden="true">
                                    <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                                    <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-medium tracking-widest text-[#8b9ab5] uppercase">E-mail</p>
                                <p class="text-sm font-semibold text-[#1a2b4c]">{{ $contactEmail }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 rounded-sm border border-[#d1d5db] bg-[#ffffff] p-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-5 w-5" aria-hidden="true">
                                    <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-medium tracking-widest text-[#8b9ab5] uppercase">Адрес</p>
                                <p class="text-sm font-semibold text-[#1a2b4c]">{{ $contactAddress }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 rounded-sm border border-[#d1d5db] bg-[#ffffff] p-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock h-5 w-5" aria-hidden="true">
                                    <path d="M12 6v6l4 2"></path>
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-medium tracking-widest text-[#8b9ab5] uppercase">Режим работы</p>
                                <p class="text-sm font-semibold text-[#1a2b4c]">{!! nl2br(e($contactHours)) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
