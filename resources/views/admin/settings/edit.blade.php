@extends('layouts.admin')

@section('title', 'Настройки сайта')
@section('page_title', 'Настройки сайта')

@section('content')
@php
    $homeTitle = $settings['home_title'] ?? 'Главная';
    $homeDescription = $settings['home_description'] ?? 'Простая CMS для новостей и статей.';
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
    $notificationsEmail = $settings['notifications_email'] ?? $contactEmail;
    $contactAddress = $settings['contact_address'] ?? 'г. Уфа, ул. Гоголя, 60/1';
    $contactLegalAddress = $settings['contact_legal_address'] ?? '';
    $contactHours = $settings['contact_hours'] ?? "Пн-Пт: 9:00-18:00\nСб-Вс: выходной";
    $requisitesCompany = $settings['requisites_company'] ?? 'ООО «Химтехпром»';
    $requisitesInn = $settings['requisites_inn'] ?? '0276974787';
    $requisitesKpp = $settings['requisites_kpp'] ?? '027401001';
    $requisitesOgrn = $settings['requisites_ogrn'] ?? '1230200013779';
    $requisitesBank = $settings['requisites_bank'] ?? '';
@endphp

<form action="{{ route('admin.settings.update') }}" method="POST" class="max-w-2xl space-y-6">
    @csrf
    @method('PUT')

    <div class="space-y-2">
        <h2 class="text-lg font-semibold text-stone-800">Основные</h2>
        <p class="text-sm text-stone-500">Базовые настройки отображения главной страницы сайта.</p>
    </div>

    <div>
        <label for="home_title" class="block text-sm font-medium text-stone-700 mb-1">Title для главной</label>
        <input type="text" name="home_title" id="home_title" value="{{ old('home_title', $homeTitle) }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('home_title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Тег &lt;title&gt; на главной странице (для вкладки браузера и SEO).</p>
    </div>

    <div>
        <label for="home_description" class="block text-sm font-medium text-stone-700 mb-1">Description для главной</label>
        <textarea name="home_description" id="home_description" rows="3"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">{{ old('home_description', $homeDescription) }}</textarea>
        @error('home_description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Краткое описание сайта для главной страницы и мета‑тега description.</p>
    </div>

    <div>
        <label for="keywords" class="block text-sm font-medium text-stone-700 mb-1">Keywords (мета-тег)</label>
        <input type="text" name="keywords" id="keywords" value="{{ old('keywords', $keywords) }}" maxlength="4096"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('keywords')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Ключевые слова для главной страницы, через запятую (SEO).</p>
    </div>

    <div class="space-y-2 pt-4 border-t border-stone-200">
        <h2 class="text-lg font-semibold text-stone-800">Приветственный блок на главной</h2>
        <p class="text-sm text-stone-500">Тексты верхнего промо-блока на главной странице.</p>
    </div>

        <div>
            <label for="hero_badge" class="block text-sm font-medium text-stone-700 mb-1">Ярлык</label>
            <input type="text" name="hero_badge" id="hero_badge" value="{{ old('hero_badge', $heroBadge) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('hero_badge')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-stone-400 mt-1">Небольшой ярлык над заголовком, например: «Надежный поставщик».</p>
        </div>

    <div>
        <label for="hero_title" class="block text-sm font-medium text-stone-700 mb-1">Заголовок</label>
        <input type="text" name="hero_title" id="hero_title" value="{{ old('hero_title', $heroTitle) }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('hero_title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Основной заголовок, например: «Промышленное оборудование и химия».</p>
    </div>

        <div>
            <label for="hero_subtitle" class="block text-sm font-medium text-stone-700 mb-1">Подзаголовок</label>
            <input type="text" name="hero_subtitle" id="hero_subtitle" value="{{ old('hero_subtitle', $heroSubtitle) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('hero_subtitle')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-stone-400 mt-1">Выделенная часть заголовка, например: «для вашего производства».</p>
        </div>


    <div>
        <label for="hero_description" class="block text-sm font-medium text-stone-700 mb-1">Описание</label>
        <textarea name="hero_description" id="hero_description" rows="3"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">{{ old('hero_description', $heroDescription) }}</textarea>
        @error('hero_description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Текст под заголовком, кратко о компании и предложении.</p>
    </div>

    <div class="space-y-2 pt-4 border-t border-stone-200">
        <h2 class="text-lg font-semibold text-stone-800">Блок «О компании»</h2>
        <p class="text-sm text-stone-500">Тексты информационного блока «О компании» на главной странице.</p>
    </div>

        <div>
            <label for="about_badge" class="block text-sm font-medium text-stone-700 mb-1">Ярлык</label>
            <input type="text" name="about_badge" id="about_badge" value="{{ old('about_badge', $aboutBadge) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('about_badge')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-stone-400 mt-1">Небольшой ярлык над заголовком, например: «О компании».</p>
        </div>
        <div>
            <label for="about_title" class="block text-sm font-medium text-stone-700 mb-1">Заголовок</label>
            <input type="text" name="about_title" id="about_title" value="{{ old('about_title', $aboutTitle) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('about_title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-stone-400 mt-1">Основной заголовок блока «О компании».</p>
        </div>


    <div>
        <label for="about_text" class="block text-sm font-medium text-stone-700 mb-1">Текст блока «О компании»</label>
        <textarea name="about_text" id="about_text" rows="4"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">{{ old('about_text', $aboutText) }}</textarea>
        @error('about_text')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Можно использовать переносы строк или теги &lt;br&gt; для форматирования.</p>
    </div>

    <div class="space-y-2 pt-4 border-t border-stone-200">
        <h2 class="text-lg font-semibold text-stone-800">Контакты</h2>
        <p class="text-sm text-stone-500">Контактные данные, которые отображаются на главной, в шапке и подвале.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
            <label for="phone_mobile" class="block text-sm font-medium text-stone-700 mb-1">Мобильный телефон</label>
            <input type="text" name="phone_mobile" id="phone_mobile" value="{{ old('phone_mobile', $phoneMobile) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('phone_mobile')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-stone-400 mt-1">Например: +7 (917) 436-00-01</p>
        </div>
        <div>
            <label for="phone_city" class="block text-sm font-medium text-stone-700 mb-1">Городской телефон</label>
            <input type="text" name="phone_city" id="phone_city" value="{{ old('phone_city', $phoneCity) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('phone_city')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-stone-400 mt-1">Например: +7 (347) 215-17-57</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
            <label for="contact_email" class="block text-sm font-medium text-stone-700 mb-1">E-mail</label>
            <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $contactEmail) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('contact_email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-stone-400 mt-1">Почта для запросов, например: ooohtp@mail.ru</p>
        </div>
        <div>
            <label for="notifications_email" class="block text-sm font-medium text-stone-700 mb-1">E-mail для уведомлений</label>
            <input type="email" name="notifications_email" id="notifications_email" value="{{ old('notifications_email', $notificationsEmail) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('notifications_email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-stone-400 mt-1">Почта администратора для уведомлений с сайта. Если не заполнена — будет использоваться основная почта.</p>
        </div>
    </div>

    <div>
        <label for="contact_address" class="block text-sm font-medium text-stone-700 mb-1">Адрес (фактический)</label>
        <input type="text" name="contact_address" id="contact_address" value="{{ old('contact_address', $contactAddress) }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('contact_address')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Например: г. Уфа, ул. Гоголя, 60/1</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
            <label for="contact_legal_address" class="block text-sm font-medium text-stone-700 mb-1">Юридический адрес</label>
            <input type="text" name="contact_legal_address" id="contact_legal_address" value="{{ old('contact_legal_address', $contactLegalAddress) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('contact_legal_address')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-stone-400 mt-1">Если отличается от фактического (необязательно).</p>
        </div>
        <div>
            <label for="contact_hours" class="block text-sm font-medium text-stone-700 mb-1">Режим работы</label>
            <textarea name="contact_hours" id="contact_hours" rows="3"
                      class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">{{ old('contact_hours', $contactHours) }}</textarea>
            @error('contact_hours')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-stone-400 mt-1">Например: «Пн–Пт: 9:00–18:00\nСб–Вс: выходной».</p>
        </div>
    </div>

    <div class="space-y-2 pt-4 border-t border-stone-200">
        <h2 class="text-lg font-semibold text-stone-800">Реквизиты</h2>
        <p class="text-sm text-stone-500">Отображаются в подвале сайта.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
            <label for="requisites_company" class="block text-sm font-medium text-stone-700 mb-1">Название организации</label>
            <input type="text" name="requisites_company" id="requisites_company" value="{{ old('requisites_company', $requisitesCompany) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('requisites_company')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-stone-400 mt-1">Например: ООО «Химтехпром»</p>
        </div>
        <div>
            <label for="requisites_inn" class="block text-sm font-medium text-stone-700 mb-1">ИНН</label>
            <input type="text" name="requisites_inn" id="requisites_inn" value="{{ old('requisites_inn', $requisitesInn) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('requisites_inn')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
            <label for="requisites_kpp" class="block text-sm font-medium text-stone-700 mb-1">КПП</label>
            <input type="text" name="requisites_kpp" id="requisites_kpp" value="{{ old('requisites_kpp', $requisitesKpp) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('requisites_kpp')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="requisites_ogrn" class="block text-sm font-medium text-stone-700 mb-1">ОГРН</label>
            <input type="text" name="requisites_ogrn" id="requisites_ogrn" value="{{ old('requisites_ogrn', $requisitesOgrn) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('requisites_ogrn')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div>
        <label for="requisites_bank" class="block text-sm font-medium text-stone-700 mb-1">Банковские реквизиты</label>
        <textarea name="requisites_bank" id="requisites_bank" rows="4"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">{{ old('requisites_bank', $requisitesBank) }}</textarea>
        @error('requisites_bank')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Банк, БИК, расчётный счёт, корр. счёт — каждая строка с новой линии.</p>
    </div>

    <div class="flex gap-3 pt-4">
        <button type="submit" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">
            Сохранить
        </button>
    </div>
</form>
@endsection

