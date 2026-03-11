@extends('layouts.app')

@php
    /** @var \Illuminate\Support\Collection|\array_access|null $settings */
    $homeTitle = $settings['home_title'];
    $homeDescription = $settings['home_description'];
    $keywords = $settings['keywords'];
    $heroTitle = $settings['hero_title'];
    $heroSubtitleHighlight = $settings['hero_subtitle_highlight'] ?? null;
    $heroSubtitle = $settings['hero_subtitle'];
    $heroDescription = $settings['hero_description'];
    $aboutBadge = $settings['about_badge'];
    $aboutTitle = $settings['about_title'];
    $aboutText = $settings['about_text'];
    $phoneMobile = $settings['phone_mobile'];
    $phoneCity = $settings['phone_city'];
    $contactEmail = $settings['contact_email'];
    $contactAddress = $settings['contact_address'];
    $contactLegalAddress = $settings['contact_legal_address'];
    $contactHours = $settings['contact_hours'];
    $citiesJson = $settings['cities'] ?? '[]';
    $cities = [];
    if (is_string($citiesJson) && $citiesJson !== '') {
        $decoded = json_decode($citiesJson, true);
        if (is_array($decoded)) {
            $cities = $decoded;
        }
    }
@endphp

@section('title', $homeTitle)
@section('meta_description', $homeDescription)
@section('meta_keywords', $keywords)

@section('content')
    <!-- ПРИВЕТСТВЕННЫЙ БЛОК -->
    <section class="relative overflow-hidden bg-navy pt-20">
        <div class="absolute inset-0 opacity-10">
          <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,_rgba(198,161,91,0.15),_transparent_60%)]"></div>
        </div>
        <div class="relative mx-auto flex max-w-7xl flex-col items-center gap-12 px-4 py-16 lg:flex-row lg:gap-16 lg:px-8 lg:py-24">
          <div class="flex flex-1 flex-col items-center text-center lg:items-start lg:text-left">
            <h1 class="font-serif text-4xl font-bold leading-tight tracking-tight text-primary-foreground md:text-5xl lg:text-6xl">
              @if($heroTitle)
                  <span class="text-balance">{{ $heroTitle }}</span><br>
              @endif
              @if($heroSubtitleHighlight)
                  <span class="text-balance text-gold">{{ $heroSubtitleHighlight }}</span><br>
              @endif
              @if($heroSubtitle)
                  <span class="text-balance">{{ $heroSubtitle }}</span>
              @endif
            </h1>
            <p class="mt-6 max-w-lg text-lg leading-relaxed text-primary-foreground/70">
              {{ $heroDescription }}
            </p>
            <div class="mt-8 flex flex-col gap-4 sm:flex-row">
              <a class="inline-flex items-center justify-center gap-2 rounded-lg bg-gold px-8 py-4 text-sm font-semibold text-navy transition-colors hover:bg-gold-light" href="#consultation">
                Бесплатная первичная беседа
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-4 w-4" aria-hidden="true">
                  <path d="M5 12h14"></path>
                  <path d="m12 5 7 7-7 7"></path>
                </svg>
              </a>
              <a class="inline-flex items-center justify-center gap-2 rounded-lg border border-primary-foreground/20 px-8 py-4 text-sm font-semibold text-primary-foreground transition-colors hover:border-gold hover:text-gold" href="#services">
                Услуги
              </a>
            </div>
          </div>
          <div class="relative flex-shrink-0">
            <div class="relative h-[400px] w-[320px] overflow-hidden rounded-lg border-2 border-gold/20 md:h-[480px] md:w-[380px]">
              <img alt="Адвокат Гиндуллин Ришат Хатмуллович" decoding="async" class="object-cover" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" src="/images/lawer2.jpg">
            </div>
            <div class="absolute -bottom-4 -left-4 rounded-lg border border-gold/30 bg-navy-light px-6 py-3">
              <p class="text-xs font-medium uppercase tracking-widest text-gold">
                Руководитель «Уфимская Коллегия Адвокатов» РБ
              </p>
            </div>
          </div>
        </div>
        <div class="border-t border-navy-light">
          <div class="mx-auto grid max-w-7xl grid-cols-2 gap-px md:grid-cols-4">
            <div class="flex flex-col items-center gap-1 border-r border-navy-light px-6 py-6 last:border-r-0">
              <span class="font-serif text-2xl font-bold text-gold md:text-3xl">30+</span>
              <span class="text-xs font-medium uppercase tracking-wider text-primary-foreground/60">лет опыта</span>
            </div>
            <div class="flex flex-col items-center gap-1 border-r border-navy-light px-6 py-6 last:border-r-0">
              <span class="font-serif text-2xl font-bold text-gold md:text-3xl">500+</span>
              <span class="text-xs font-medium uppercase tracking-wider text-primary-foreground/60">выигранных дел</span>
            </div>
            <div class="flex flex-col items-center gap-1 border-r border-navy-light px-6 py-6 last:border-r-0">
              <span class="font-serif text-2xl font-bold text-gold md:text-3xl">100%</span>
              <span class="text-xs font-medium uppercase tracking-wider text-primary-foreground/60">конфиденциальность</span>
            </div>
            <div class="flex flex-col items-center gap-1 border-r border-navy-light px-6 py-6 last:border-r-0">
              <span class="font-serif text-2xl font-bold text-gold md:text-3xl">24/7</span>
              <span class="text-xs font-medium uppercase tracking-wider text-primary-foreground/60">на связи</span>
            </div>
          </div>
        </div>
    </section>
    <!-- END ПРИВЕТСТВЕННЫЙ БЛОК -->

    <!-- ОБ АДВОКАТЕ -->
    <section id="about" class="bg-background py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 lg:px-8">
          <div class="flex flex-col items-center gap-16 lg:flex-row">
            <div class="flex-1">
              <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-gold">Об адвокате</p>
              <h2 class="font-serif text-3xl font-bold leading-tight text-foreground md:text-4xl">
                {!! nl2br(e($aboutTitle)) !!}
              </h2>
              <div class="mt-6 h-1 w-16 bg-gold"></div>
              <p class="mt-8 text-lg leading-relaxed text-muted-foreground">
                {!! nl2br(e($aboutText)) !!}
              </p>
              <div class="mt-8 inline-flex items-center gap-3 rounded-lg border border-gold/30 bg-gold/5 px-5 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award h-5 w-5 text-gold" aria-hidden="true">
                  <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
                  <circle cx="12" cy="8" r="6"></circle>
                </svg>
                <span class="text-sm font-semibold text-foreground">
                  Руководитель НО «Уфимская коллегия адвокатов» РБ
                </span>
              </div>
            </div>
            <div class="flex flex-1 flex-col gap-6">
              <div class="flex gap-5 rounded-lg border border-border bg-secondary p-6 transition-colors hover:border-gold/30">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg bg-navy">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scale h-6 w-6 text-gold" aria-hidden="true">
                    <path d="M12 3v18"></path>
                    <path d="m19 8 3 8a5 5 0 0 1-6 0zV7"></path>
                    <path d="M3 7h1a17 17 0 0 0 8-2 17 17 0 0 0 8 2h1"></path>
                    <path d="m5 8 3 8a5 5 0 0 1-6 0zV7"></path>
                    <path d="M7 21h10"></path>
                  </svg>
                </div>
                <div>
                  <h3 class="font-serif text-lg font-semibold text-foreground">Профессионализм</h3>
                  <p class="mt-1 text-sm leading-relaxed text-muted-foreground">
                    Глубокое знание законодательства и многолетний опыт ведения сложных дел различных категорий.
                  </p>
                </div>
              </div>
              <div class="flex gap-5 rounded-lg border border-border bg-secondary p-6 transition-colors hover:border-gold/30">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg bg-navy">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield h-6 w-6 text-gold" aria-hidden="true">
                    <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                  </svg>
                </div>
                <div>
                  <h3 class="font-serif text-lg font-semibold text-foreground">Конфиденциальность</h3>
                  <p class="mt-1 text-sm leading-relaxed text-muted-foreground">
                    Полная защита информации клиента. Адвокатская тайна гарантирована законом.
                  </p>
                </div>
              </div>
              <div class="flex gap-5 rounded-lg border border-border bg-secondary p-6 transition-colors hover:border-gold/30">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg bg-navy">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award h-6 w-6 text-gold" aria-hidden="true">
                    <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
                    <circle cx="12" cy="8" r="6"></circle>
                  </svg>
                </div>
                <div>
                  <h3 class="font-serif text-lg font-semibold text-foreground">Результативность</h3>
                  <p class="mt-1 text-sm leading-relaxed text-muted-foreground">
                    Индивидуальный подход к каждому делу и стремление к достижению наилучшего результата.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- END ОБ АДВОКАТЕ -->

    <!-- УСЛУГИ -->
    <section id="services" class="bg-secondary py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 lg:px-8">
          <div class="text-center">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-gold">Направления</p>
            <h2 class="font-serif text-3xl font-bold text-foreground md:text-4xl">Услуги адвоката</h2>
            <div class="mx-auto mt-6 h-1 w-16 bg-gold"></div>
          </div>
          <div class="mt-16 grid gap-12 lg:grid-cols-2">
            <div>
              <div class="mb-8 flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-navy">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gavel h-5 w-5 text-gold" aria-hidden="true">
                    <path d="m14 13-8.381 8.38a1 1 0 0 1-3.001-3l8.384-8.381"></path>
                    <path d="m16 16 6-6"></path>
                    <path d="m21.5 10.5-8-8"></path>
                    <path d="m8 8 6-6"></path>
                    <path d="m8.5 7.5 8 8"></path>
                  </svg>
                </div>
                <h3 class="font-serif text-xl font-bold text-foreground">Уголовные дела</h3>
              </div>
              @if($criminalServices->isNotEmpty())
                <div class="flex flex-col gap-4">
                  @foreach($criminalServices as $service)
                    <div class="group flex gap-4 rounded-lg border border-border bg-background p-5 transition-all hover:border-gold/30 hover:shadow-sm">
                      <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md border border-gold/20 bg-gold/5 transition-colors group-hover:bg-gold/10 overflow-hidden">
                        <div class="h-6 w-6 text-gold [&>svg]:h-6 [&>svg]:w-6 [&>svg]:block">
                          {!! $service->icon !!}
                        </div>
                      </div>
                      <div>
                        <h4 class="font-semibold text-foreground">{{ $service->name }}</h4>
                        @if($service->description)
                          <p class="mt-1 text-sm leading-relaxed text-muted-foreground">
                            {{ $service->description }}
                          </p>
                        @endif
                      </div>
                    </div>
                  @endforeach
                </div>
              @else
                <p class="mt-4 text-sm text-muted-foreground">
                  Услуги по уголовным делам будут добавлены позже.
                </p>
              @endif
            </div>
            <div>
              <div class="mb-8 flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-navy">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scale h-5 w-5 text-gold" aria-hidden="true">
                    <path d="M12 3v18"></path>
                    <path d="m19 8 3 8a5 5 0 0 1-6 0zV7"></path>
                    <path d="M3 7h1a17 17 0 0 0 8-2 17 17 0 0 0 8 2h1"></path>
                    <path d="m5 8 3 8a5 5 0 0 1-6 0zV7"></path>
                    <path d="M7 21h10"></path>
                  </svg>
                </div>
                <h3 class="font-serif text-xl font-bold text-foreground">Гражданские дела</h3>
              </div>
              @if($civilServices->isNotEmpty())
                <div class="flex flex-col gap-4">
                  @foreach($civilServices as $service)
                    <div class="group flex gap-4 rounded-lg border border-border bg-background p-5 transition-all hover:border-gold/30 hover:shadow-sm">
                      <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md border border-gold/20 bg-gold/5 transition-colors group-hover:bg-gold/10 overflow-hidden">
                        <div class="h-6 w-6 text-gold [&>svg]:h-6 [&>svg]:w-6 [&>svg]:block">
                          {!! $service->icon !!}
                        </div>
                      </div>
                      <div>
                        <h4 class="font-semibold text-foreground">{{ $service->name }}</h4>
                        @if($service->description)
                          <p class="mt-1 text-sm leading-relaxed text-muted-foreground">
                            {{ $service->description }}
                          </p>
                        @endif
                      </div>
                    </div>
                  @endforeach
                </div>
              @else
                <p class="mt-4 text-sm text-muted-foreground">
                  Услуги по гражданским делам будут добавлены позже.
                </p>
              @endif
            </div>
          </div>
        </div>
    </section>
    <!-- END УСЛУГИ -->

    <!-- СТОИМОСТЬ -->
    <section id="prices" class="bg-background py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 lg:px-8">
          <div class="text-center">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-gold">Стоимость</p>
            <h2 class="font-serif text-3xl font-bold text-foreground md:text-4xl">Минимальные расценки</h2>
            <div class="mx-auto mt-6 h-1 w-16 bg-gold"></div>
            <p class="mx-auto mt-6 max-w-lg text-muted-foreground">
              Стоимость услуг определяется индивидуально после ознакомления с делом. Первичная беседа проводится бесплатно.
            </p>
          </div>
          <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @forelse($prices as $price)
              @php
                  $isFeatured = $price->is_featured;
              @endphp
              <div class="relative flex flex-col rounded-lg border p-6 transition-all hover:shadow-md {{ $isFeatured ? 'border-gold bg-navy text-primary-foreground' : 'border-border bg-background text-foreground hover:border-gold/30' }}">
                @if($isFeatured)
                  <div class="absolute -top-3 left-1/2 -translate-x-1/2 rounded-full bg-gold px-4 py-1 text-xs font-semibold text-navy">
                    Популярное
                  </div>
                @endif
                <h3 class="font-serif text-lg font-bold {{ $isFeatured ? 'text-primary-foreground' : 'text-foreground' }}">
                  {{ $price->name }}
                </h3>
                @if($price->price_text)
                  <p class="mt-4 font-serif text-2xl font-bold text-gold">
                    {{ $price->price_text }}
                  </p>
                @endif
                @if($price->description)
                  <p class="mt-2 flex-1 text-sm leading-relaxed {{ $isFeatured ? 'text-primary-foreground/70' : 'text-muted-foreground' }}">
                    {{ $price->description }}
                  </p>
                @endif
                @if($isFeatured)
                  <a class="mt-6 inline-flex items-center justify-center gap-2 rounded-lg px-6 py-3 text-sm font-semibold transition-colors bg-gold text-navy hover:bg-gold-light" href="#consultation">Записаться</a>
                @else
                  <a class="mt-6 inline-flex items-center justify-center gap-2 rounded-lg px-6 py-3 text-sm font-semibold transition-colors border border-border bg-secondary text-foreground hover:border-gold/30" href="tel:89177570368">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4" aria-hidden="true">
                      <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384">
                      </path>
                    </svg>Обсудить</a>
                @endif
              </div>
            @empty
              <p class="mt-4 text-sm text-muted-foreground">
                Позиции стоимости пока не настроены. Добавьте их в админ-панели.
              </p>
            @endforelse
          </div>
        </div>
    </section>
    <!-- END СТОИМОСТЬ -->

    <!-- ГЕОГРАФИЯ -->
    <section class="bg-navy py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 lg:px-8">
          <div class="text-center">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-gold">География</p>
            <h2 class="font-serif text-3xl font-bold text-primary-foreground md:text-4xl">
              Работаем в городах<br class="hidden sm:block">республики и России
            </h2>
            <div class="mx-auto mt-6 h-1 w-16 bg-gold"></div>
          </div>
          <div class="mt-14 grid grid-cols-2 gap-4 sm:grid-cols-4">
            @foreach($cities as $city)
              <div class="flex items-center justify-center gap-2 rounded-lg border border-navy-light bg-navy-light/50 px-6 py-5 transition-colors hover:border-gold/30">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4 text-gold" aria-hidden="true">
                  <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                  <circle cx="12" cy="10" r="3"></circle>
                </svg>
                <span class="font-medium text-primary-foreground">{{ $city }}</span>
              </div>
            @endforeach
          </div>
        </div>
    </section>
    <!-- END ГЕОГРАФИЯ -->

    <!-- КОНСУЛЬТАЦИЯ -->
    <section id="consultation" class="bg-secondary py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 lg:px-8">
          <div class="flex flex-col gap-16 lg:flex-row">
            <div class="flex-1">
              <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-gold">Обратная связь</p>
              <h2 class="font-serif text-3xl font-bold text-foreground md:text-4xl">
                Бесплатная<br>первичная беседа
              </h2>
              <div class="mt-6 h-1 w-16 bg-gold"></div>
              <p class="mt-8 max-w-md text-lg leading-relaxed text-muted-foreground">
                Оставьте заявку и адвокат свяжется с вами для обсуждения вашего вопроса. Первичная беседа проводится бесплатно.
              </p>
              <div class="mt-8 flex items-center gap-3 rounded-lg border border-border bg-background px-5 py-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle h-5 w-5 text-gold" aria-hidden="true">
                  <path d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719"></path>
                </svg>
                <p class="text-sm text-muted-foreground">
                  Согласование времени встречи по телефону, мессенджерам или электронной почте
                  <a href="mailto:gind@mail.ru">gind@mail.ru</a>
                </p>
              </div>
            </div>
            <div class="flex-1">
              <form
                action="{{ route('contact.submit') }}"
                method="POST"
                class="flex flex-col gap-5 rounded-lg border border-border bg-background p-8"
              >
                @csrf
                <input type="hidden" name="from_home" value="1">
                <input type="hidden" name="subject" value="Заявка с лендинга">
                <div>
                  <label for="name" class="mb-2 block text-sm font-medium text-foreground">Ваше имя *</label>
                  <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full rounded-lg border border-input bg-background px-4 py-3 text-sm text-foreground placeholder:text-muted-foreground focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold"
                    placeholder="Как к вам обращаться"
                  >
                  @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                  @enderror
                </div>
                <div>
                  <label for="phone" class="mb-2 block text-sm font-medium text-foreground">Телефон</label>
                  <input
                    type="tel"
                    id="phone"
                    name="phone"
                    value="{{ old('phone') }}"
                    class="w-full rounded-lg border border-input bg-background px-4 py-3 text-sm text-foreground placeholder:text-muted-foreground focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold"
                    placeholder="+7 (___) ___-__-__"
                  >
                    @error('phone')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                  @enderror
                </div>
                <div>
                  <label for="message" class="mb-2 block text-sm font-medium text-foreground">Ваш вопрос *</label>
                  <textarea
                    id="message"
                    name="message"
                    rows="4"
                    required
                    class="w-full resize-none rounded-lg border border-input bg-background px-4 py-3 text-sm text-foreground placeholder:text-muted-foreground focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold"
                    placeholder="Кратко опишите вашу ситуацию"
                  >{{ old('message') }}</textarea>
                  @error('message')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                  @enderror
                </div>
                <button type="submit" class="mt-2 inline-flex items-center justify-center gap-2 rounded-lg bg-gold px-8 py-4 text-sm font-semibold text-navy transition-colors hover:bg-gold-light">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send h-4 w-4" aria-hidden="true">
                    <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path>
                    <path d="m21.854 2.147-10.94 10.939"></path>
                  </svg>
                  Отправить заявку
                </button>
              </form>
            </div>
          </div>
        </div>
    </section>
    <!-- END КОНСУЛЬТАЦИЯ -->

    <!-- КОНТАКТЫ -->
    <section id="contacts" class="bg-background py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 lg:px-8">
          <div class="text-center">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-gold">Контакты</p>
            <h2 class="font-serif text-3xl font-bold text-foreground md:text-4xl">Свяжитесь с нами</h2>
            <div class="mx-auto mt-6 h-1 w-16 bg-gold"></div>
          </div>
          <div class="mt-14 grid gap-8 lg:grid-cols-2">
            <div class="flex flex-col gap-6">
              <div class="flex items-start gap-4 rounded-lg border border-border bg-secondary p-6">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg bg-navy">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-6 w-6 text-gold" aria-hidden="true">
                    <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                  </svg>
                </div>
                <div>
                  <h3 class="font-serif text-lg font-semibold text-foreground">Адрес</h3>
                  <p class="mt-1 text-muted-foreground">{{ $contactAddress }}</p>
                </div>
              </div>
              <div class="flex items-start gap-4 rounded-lg border border-border bg-secondary p-6">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg bg-navy">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock h-6 w-6 text-gold" aria-hidden="true">
                    <path d="M12 6v6l4 2"></path>
                    <circle cx="12" cy="12" r="10"></circle>
                  </svg>
                </div>
                <div>
                  <h3 class="font-serif text-lg font-semibold text-foreground">Часы работы</h3>
                  <p class="mt-1 text-muted-foreground">{!! nl2br(e($contactHours)) !!}</p>
                </div>
              </div>
              <div class="flex items-start gap-4 rounded-lg border border-border bg-secondary p-6">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg bg-navy">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-6 w-6 text-gold" aria-hidden="true">
                    <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                  </svg>
                </div>
                <div>
                  <h3 class="font-serif text-lg font-semibold text-foreground">Телефоны</h3>
                  <div class="mt-1 flex flex-col gap-1">
                    @if($phoneMobile)
                      <a href="tel:{{ preg_replace('/\D+/', '', $phoneMobile) }}" class="text-muted-foreground transition-colors hover:text-gold">
                        {{ $phoneMobile }}
                      </a>
                    @endif
                    @if($phoneCity)
                      <a href="tel:{{ preg_replace('/\D+/', '', $phoneCity) }}" class="text-muted-foreground transition-colors hover:text-gold">
                        {{ $phoneCity }}
                      </a>
                    @endif
                  </div>
                </div>
              </div>
              <div class="flex items-start gap-4 rounded-lg border border-border bg-secondary p-6">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg bg-navy">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail h-6 w-6 text-gold" aria-hidden="true">
                    <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                    <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                  </svg>
                </div>
                <div>
                  <h3 class="font-serif text-lg font-semibold text-foreground">E-mail</h3>
                  <div class="mt-1 flex flex-col gap-1">
                    @if($contactEmail)
                      <a href="mailto:{{ $contactEmail }}" class="text-muted-foreground transition-colors hover:text-gold">
                        {{ $contactEmail }}
                      </a>
                    @endif
                  </div>
                </div>
              </div>
              <div class="flex items-center gap-4">
                <a href="https://t.me/+79177570368" target="_blank" rel="noopener noreferrer" class="flex h-12 w-12 items-center justify-center rounded-lg border border-border bg-secondary transition-colors hover:border-gold/30" aria-label="Telegram">
                  <svg class="h-5 w-5 text-foreground" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.479.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"></path>
                  </svg>
                </a>
                <a href="https://vk.com" target="_blank" rel="noopener noreferrer" class="flex h-12 w-12 items-center justify-center rounded-lg border border-border bg-secondary transition-colors hover:border-gold/30" aria-label="VKontakte">
                  <svg class="h-5 w-5 text-foreground" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M15.684 0H8.316C1.592 0 0 1.592 0 8.316v7.368C0 22.408 1.592 24 8.316 24h7.368C22.408 24 24 22.408 24 15.684V8.316C24 1.592 22.391 0 15.684 0zm3.692 17.123h-1.744c-.66 0-.864-.525-2.05-1.727-1.033-1-1.49-1.135-1.744-1.135-.356 0-.458.102-.458.593v1.575c0 .424-.135.678-1.253.678-1.846 0-3.896-1.118-5.335-3.202C4.624 10.857 4.03 8.57 4.03 8.096c0-.254.102-.491.593-.491h1.744c.44 0 .61.203.78.677.863 2.49 2.303 4.675 2.896 4.675.22 0 .322-.102.322-.66V9.721c-.068-1.186-.695-1.287-.695-1.71 0-.204.17-.407.44-.407h2.744c.372 0 .508.203.508.643v3.473c0 .372.17.508.271.508.22 0 .407-.136.813-.542 1.254-1.406 2.151-3.574 2.151-3.574.119-.254.322-.491.763-.491h1.744c.525 0 .644.27.525.643-.22 1.017-2.354 4.031-2.354 4.031-.186.305-.254.44 0 .78.186.254.796.779 1.203 1.253.745.847 1.32 1.558 1.473 2.05.17.49-.085.744-.576.744z"></path>
                  </svg>
                </a>
              </div>
            </div>
            <div class="overflow-hidden rounded-lg border border-border">
              <iframe
                src="https://yandex.ru/map-widget/v1/?indoorLevel=1&ll=55.940303%2C54.728987&mode=map&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgg1NzcwNTUxNRJt0KDQvtGB0YHQuNGPLCDQoNC10YHQv9GD0LHQu9C40LrQsCDQkdCw0YjQutC-0YDRgtC-0YHRgtCw0L0sINCj0YTQsCwg0J_QtdGA0LLQvtC80LDQudGB0LrQsNGPINGD0LvQuNGG0LAsIDEwMCIKDe5yYEIVljlbQg%2C%2C&z=16&theme=dark"
                width="100%"
                height="100%"
                frameborder="0"
                allowfullscreen="false"
                style="position:relative;">
              </iframe>
            </div>
          </div>
        </div>
    </section>
    <!-- END КОНТАКТЫ -->
@endsection
