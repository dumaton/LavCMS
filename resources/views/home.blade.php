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
    {{-- HERO / INTRO из v2 --}}
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

    {{-- ABOUT из v2 --}}
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

    {{-- BRANDS из v2 --}}
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
                    Бренды пока не добавлены. Обратитесь к администратору сайта.
                </p>
            @endif
        </div>
    </section>

    {{-- PRODUCTS из v2 --}}
    <section id="products" class="py-24 bg-background">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col items-center gap-4 text-center mb-16">
                <span class="text-xs font-medium tracking-widest text-[#2c5282] uppercase">Каталог</span>
                <h2 class="font-serif text-3xl font-bold text-foreground md:text-4xl text-balance">Промышленное оборудование</h2>
                <p class="max-w-xl text-base leading-relaxed text-muted-foreground text-pretty">
                    Наличие на складе продукции уточняйте
                </p>
            </div>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4 mb-16">
                <div class="group relative flex flex-col gap-4 rounded-sm border border-border bg-card p-8 transition-all hover:border-[#2c5282]/40 hover:shadow-lg hover:shadow-[#2c5282]/5">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282] transition-colors group-hover:bg-[#2c5282] group-hover:text-[#f8f9fb]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cog h-6 w-6" aria-hidden="true">
                                <path d="M11 10.27 7 3.34"></path>
                                <path d="m11 13.73-4 6.93"></path>
                                <path d="M12 22v-2"></path>
                                <path d="M12 2v2"></path>
                                <path d="M14 12h8"></path>
                                <path d="m17 20.66-1-1.73"></path>
                                <path d="m17 3.34-1 1.73"></path>
                                <path d="M2 12h2"></path>
                                <path d="m20.66 17-1.73-1"></path>
                                <path d="m20.66 7-1.73 1"></path>
                                <path d="m3.34 17 1.73-1"></path>
                                <path d="m3.34 7 1.73 1"></path>
                                <circle cx="12" cy="12" r="2"></circle>
                                <circle cx="12" cy="12" r="8"></circle>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-muted-foreground tracking-wide">
                            800+ позиций
                        </span>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-card-foreground">Приводная техника</h3>
                    <p class="text-sm leading-relaxed text-muted-foreground">
                        Редукторы, мотор-редукторы, частотные преобразователи, муфты и подшипники.
                    </p>
                    <div class="mt-auto pt-4 border-t border-border">
                        <span class="text-xs font-medium text-[#2c5282] tracking-wide uppercase cursor-pointer hover:text-[#3b6db5] transition-colors">
                            Подробнее →
                        </span>
                    </div>
                </div>

                <div class="group relative flex flex-col gap-4 rounded-sm border border-border bg-card p-8 transition-all hover:border-[#2c5282]/40 hover:shadow-lg hover:shadow-[#2c5282]/5">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282] transition-colors group-hover:bg-[#2c5282] group-hover:text-[#f8f9fb]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gauge h-6 w-6" aria-hidden="true">
                                <path d="m12 14 4-4"></path>
                                <path d="M3.34 19a10 10 0 1 1 17.32 0"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-muted-foreground tracking-wide">
                            650+ позиций
                        </span>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-card-foreground">КИП и автоматика</h3>
                    <p class="text-sm leading-relaxed text-muted-foreground">
                        Датчики, контроллеры, измерительные приборы, системы управления.
                    </p>
                    <div class="mt-auto pt-4 border-t border-border">
                        <span class="text-xs font-medium text-[#2c5282] tracking-wide uppercase cursor-pointer hover:text-[#3b6db5] transition-colors">
                            Подробнее →
                        </span>
                    </div>
                </div>

                <div class="group relative flex flex-col gap-4 rounded-sm border border-border bg-card p-8 transition-all hover:border-[#2c5282]/40 hover:shadow-lg hover:shadow-[#2c5282]/5">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282] transition-colors group-hover:bg-[#2c5282] group-hover:text-[#f8f9fb]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hammer h-10 w-10" aria-hidden="true">
                                <path fill="currentColor" d="m11.98 9.788l-.657.981q-.521.8-.672 1.16q-.151.361-.151.79q0 .616.434 1.054t1.066.439t1.066-.434t.434-1.066q0-.4-.16-.79t-.682-1.153zm.018 8.039q-2.425 0-4.125-1.702t-1.7-4.127t1.702-4.125t4.127-1.7t4.125 1.702t1.7 4.127t-1.702 4.125t-4.127 1.7m8.502-6.558V10.5h-1.979q-.333-1.5-1.255-2.664T15.017 6H20.5v-.77h1v6.04zm-18 7.5v-6.038h1v.769h1.979q.333 1.5 1.255 2.664T8.983 18H3.5v.77z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-muted-foreground tracking-wide">
                            400+ позиций
                        </span>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-card-foreground">Насосное оборудование</h3>
                    <p class="text-sm leading-relaxed text-muted-foreground">
                        Центробежные, поршневые, мембранные насосы и комплектующие.
                    </p>
                    <div class="mt-auto pt-4 border-t border-border">
                        <span class="text-xs font-medium text-[#2c5282] tracking-wide uppercase cursor-pointer hover:text-[#3b6db5] transition-colors">
                            Подробнее →
                        </span>
                    </div>
                </div>

                <div class="group relative flex flex-col gap-4 rounded-sm border border-border bg-card p-8 transition-all hover:border-[#2c5282]/40 hover:shadow-lg hover:shadow-[#2c5282]/5">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282] transition-colors group-hover:bg-[#2c5282] group-hover:text-[#f8f9fb]">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                 width="980" height="980" viewBox="0 0 980 980"
                                 preserveAspectRatio="xMidYMid meet" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gauge h-10 w-10" aria-hidden="true">
                                <g transform="translate(0.000000,980.000000) scale(0.100000,-0.100000)"
                                   fill="currentColor" stroke="none">
                                    <path d="M3013 7895 c-230 -50 -384 -276 -345 -505 23 -136 116 -266 232 -325 98 -50 149 -55 593 -55 l407 0 0 -199 c0 -219 5 -241 61 -306 53 -61 79 -69 224 -75 l130 -5 3 -97 3 -98 -275 0 c-166 0 -296 -4 -328 -11 -178 -38 -319 -188 -351 -374 -27 -158 52 -340 189 -430 89 -59 153 -75 309 -75 74 0 136 -4 139 -8 4 -7 9 -566 6 -638 0 -7 -26 -31 -57 -55 -32 -24 -103 -87 -159 -141 l-101 -98 -161 0 -162 0 0 58 c0 145 -47 268 -136 362 -152 160 -362 199 -562 105 -171 -81 -272 -247 -272 -447 l0 -78 -812 -2 -813 -3 0 -965 0 -965 800 -2 c440 -2 806 -3 813 -3 8 0 12 -21 12 -73 0 -143 46 -253 146 -353 190 -189 490 -186 681 6 91 93 142 222 143 362 l0 57 158 3 157 3 117 -112 c297 -283 633 -424 1013 -425 359 -1 661 112 953 356 51 43 111 100 134 127 l41 49 244 0 243 0 0 -47 c0 -209 103 -385 275 -469 187 -91 402 -56 550 91 99 99 145 210 145 352 l0 73 813 2 812 3 3 968 2 967 -815 0 -815 0 0 78 c0 144 -44 254 -140 353 -97 99 -256 158 -384 143 -266 -30 -446 -239 -446 -516 l0 -58 -222 -1 c-123 -1 -232 0 -243 1 -11 1 -49 32 -85 69 -36 37 -84 84 -108 104 l-42 37 2 363 3 362 165 3 c230 4 305 28 410 133 243 242 122 656 -217 744 -44 12 -121 15 -335 15 l-279 0 3 98 3 97 131 5 c121 5 134 7 171 32 48 32 85 79 102 127 7 21 11 109 11 227 l0 193 438 3 c489 4 487 4 600 77 234 151 267 487 68 686 -58 58 -155 110 -235 125 -35 6 -693 10 -1875 9 -1494 0 -1832 -3 -1883 -14z"/>
                                </g>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-muted-foreground tracking-wide">
                            700+ позиций
                        </span>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-card-foreground">Трубопроводная арматура</h3>
                    <p class="text-sm leading-relaxed text-muted-foreground">
                        Запорная, регулирующая, предохранительная арматура для различных сред и давлений.
                    </p>
                    <div class="mt-auto pt-4 border-t border-border">
                        <span class="text-xs font-medium text-[#2c5282] tracking-wide uppercase cursor-pointer hover:text-[#3b6db5] transition-colors">
                            Подробнее →
                        </span>
                    </div>
                </div>
            </div>

            {{-- ПРОМЫШЛЕННАЯ ХИМИЯ из v2 --}}
            <div class="flex flex-col items-center gap-4 text-center mb-16">
                <h2 class="font-serif text-3xl font-bold text-foreground md:text-4xl text-balance">Промышленная химия</h2>
                <p class="max-w-xl text-base leading-relaxed text-muted-foreground text-pretty">
                    Наличие на складе продукции уточняйте
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div class="group relative flex flex-col gap-4 rounded-sm border border-border bg-card p-8 transition-all hover:border-[#2c5282]/40 hover:shadow-lg hover:shadow-[#2c5282]/5">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282] transition-colors group-hover:bg-[#2c5282] group-hover:text-[#f8f9fb]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gauge h-6 w-6" aria-hidden="true"><path fill="currentColor" d="M411 68.31v.7c0 25.9-53.6 46.99-155 46.99c-106.5 0-155-21.09-155-46.99v-1.2c0-15 16.7-26.9 49.7-35.3c28.2-7.2 65.6-11.1 105.3-11.1c39.6 0 77 3.9 105.3 11.1c33 8.4 49.7 20.3 49.7 35.3zm-177-.5c0-4.2-13.2-7.5-29.4-7.5c-16.3 0-29.5 3.3-29.5 7.5c0 4.1 13.2 7.5 29.5 7.5c16.2 0 29.4-3.4 29.4-7.5m167.6 97.89v-60.2c-8.7 6.6-21.9 12.2-39.6 16.7c-28.5 7.3-66.1 11.2-106 11.2s-77.5-4-106-11.2c-17.7-4.5-30.9-10-39.6-16.7v60.2c-6.3 5.3-9.4 11.2-9.4 17.7v1.1c0 25.9 48.5 46.9 155 46.9c101.4 0 155-21 155-46.9v-1.1c0-6.5-3.1-12.4-9.4-17.7m0 128.9v-73.5c-8.7 6.6-21.9 12.2-39.6 16.7c-28.5 7.2-66.1 11.2-106 11.2s-77.5-4-106-11.2c-17.7-4.5-30.9-10.1-39.6-16.7v73.5c-6.3 5.3-9.4 11.2-9.4 17.7v.9c0 25.9 48.5 46.9 155 46.9c101.4 0 155-21 155-46.9v-.9c0-6.6-3.1-12.5-9.4-17.7m8.9 145.4c-1.1-4.9-4-9.4-8.9-13.5V350c-8.7 6.6-21.9 12.2-39.6 16.7c-28.5 7.2-66.1 11.2-106 11.2s-77.5-4-106-11.2c-17.7-4.5-30.9-10.1-39.6-16.7v76.5c-4.9 4.1-7.8 8.6-8.9 13.5c-.3 1.2-.5 2.5-.5 3.7v.5c0 5.7 2.3 10.9 7 15.6c17 18 64.8 30.8 148 30.8c60.2 0 103.6-7.4 128.9-18.9c17.3-7.5 26.1-16.6 26.1-27.5v-.5c0-1.2-.2-2.5-.5-3.7"/></svg>
                        </div>
                        <span class="text-xs font-medium text-muted-foreground tracking-wide">
                            800+ позиций
                        </span>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-card-foreground">Химия для нефтеперерабатывающих предприятий</h3>
                    <p class="text-sm leading-relaxed text-muted-foreground">
                        Сульфанол, ингибиторы коррозии.
                    </p>
                    <div class="mt-auto pt-4 border-t border-border">
                        <span class="text-xs font-medium text-[#2c5282] tracking-wide uppercase cursor-pointer hover:text-[#3b6db5] transition-colors">
                            Подробнее →
                        </span>
                    </div>
                </div>

                <div class="group relative flex flex-col gap-4 rounded-sm border border-border bg-card p-8 transition-all hover:border-[#2c5282]/40 hover:shadow-lg hover:shadow-[#2c5282]/5">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282] transition-colors group-hover:bg-[#2c5282] group-hover:text-[#f8f9fb]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gauge h-6 w-6" aria-hidden="true"><path fill="currentColor" d="M20.02 20.02c-1.415 1.414-2.87 4.939-1.404 12.857c1.467 7.919 5.948 19.18 14.07 32.718l.075.124l.07.126c36.072 64.774 100.54 100.053 156.894 156.407c3.535 3.535 4.692 8.141 4.86 12.202c.168 4.06-.524 8.036-1.648 12.226c-2.248 8.38-6.392 17.635-11.551 27.216c-8.686 16.13-20.094 32.615-30.883 44.898l10.23 10.231l168.292-168.291l-10.231-10.231c-12.283 10.789-28.768 22.197-44.899 30.883c-9.58 5.159-18.835 9.303-27.215 11.551c-4.19 1.124-8.166 1.816-12.226 1.648s-8.667-1.325-12.202-4.86c-53.66-53.66-81.946-115.656-156.388-156.882l-.137-.076l-.132-.08c-13.537-8.123-24.8-12.605-32.718-14.07c-7.918-1.467-11.443-.012-12.858 1.402zm27.576 27.576A32 16 45 0 1 81.538 58.91A32 16 45 0 1 92.85 92.851a32 16 45 0 1-33.94-11.313a32 16 45 0 1-11.315-33.942zm125.865 294.157l9.9 9.9L351.652 183.36l-9.9-9.9zm22.628 22.627l9.9 9.9l168.29-168.292l-9.899-9.9zm22.53 22.724c21.7 21.843 56.445 58.776 71.301 106.89l18.939-18.938c.264-11.26-.095-21.74-1.047-31.48c5.234 4.6 10.043 11.404 14.27 18.257l25.795-25.795c-4.578-9.167-10.801-17.054-16.325-25.486c8.741 5.196 17.668 10.207 25.477 16.334l40.646-40.646c-6.681-2.406-12.95-6.323-19.066-10.804c9.83 1.596 20.11.934 30.588-.718l25.66-25.66c-3.612-10.324-7.613-20.26-13.055-28.756c11.272 2.37 19.41 8.292 27.163 14.648l19.88-19.88c-3.56-2.767-6.356-6.46-9.117-14.082c6.663 3.66 13.225 3.978 19.931 3.268l14.336-14.336c-48.115-14.856-85.048-49.601-106.89-71.3z"/></svg>
                        </div>
                        <span class="text-xs font-medium text-muted-foreground tracking-wide">
                            650+ позиций
                        </span>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-card-foreground">Химия для лакокрасочных предприятий</h3>
                    <p class="text-sm leading-relaxed text-muted-foreground">
                        Органобентонит, сурик свинцовый.
                    </p>
                    <div class="mt-auto pt-4 border-t border-border">
                        <span class="text-xs font-medium text-[#2c5282] tracking-wide uppercase cursor-pointer hover:text-[#3b6db5] transition-colors">
                            Подробнее →
                        </span>
                    </div>
                </div>

                <div class="group relative flex flex-col gap-4 rounded-sm border border-border bg-card p-8 transition-all hover:border-[#2c5282]/40 hover:shadow-lg hover:shadow-[#2c5282]/5">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-sm bg-[#2c5282]/10 text-[#2c5282] transition-colors group-hover:bg-[#2c5282] group-hover:text-[#f8f9fb]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gauge h-6 w-6" aria-hidden="true"><path fill="currentColor" d="M18.25 3.25a.75.75 0 0 1 .743.648L19 4v16a.75.75 0 0 1-1.493.102L17.5 20v-5h-2.25a.75.75 0 0 1-.743-.648l-.007-.102V7a3.75 3.75 0 0 1 3.75-3.75m-6 0a.75.75 0 0 1 .743.648L13 4v4c0 1.953-1.4 3.578-3.25 3.93V20a.75.75 0 0 1-1.493.102L8.25 20v-8.07a4 4 0 0 1-3.245-3.722L5 8V4a.75.75 0 0 1 1.493-.102L6.5 4v4c0 1.12.736 2.067 1.75 2.386V4a.75.75 0 0 1 1.493-.102L9.75 4v6.385a2.5 2.5 0 0 0 1.743-2.2L11.5 8V4a.75.75 0 0 1 .75-.75M17.5 13.5V4.878a2.25 2.25 0 0 0-1.494 1.95L16 7v6.5zV4.878z"/></svg>
                        </div>
                        <span class="text-xs font-medium text-muted-foreground tracking-wide">
                            400+ позиций
                        </span>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-card-foreground">Химия для пищевой промышленности</h3>
                    <p class="text-sm leading-relaxed text-muted-foreground">
                        Лимонная кислота, лецитин, соль пищевая и техническая.
                    </p>
                    <div class="mt-auto pt-4 border-t border-border">
                        <span class="text-xs font-medium text-[#2c5282] tracking-wide uppercase cursor-pointer hover:text-[#3b6db5] transition-colors">
                            Подробнее →
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CONTACTS из v2 --}}
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
