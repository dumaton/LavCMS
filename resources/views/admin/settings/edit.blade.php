@extends('layouts.admin')

@section('title', 'Настройки сайта')
@section('page_title', 'Настройки сайта')

@section('content')
@php
    $homeTitle = $settings['home_title'] ?? null;
    $homeDescription = $settings['home_description'] ?? null;
    $keywords = $settings['keywords'] ?? null;
    $heroTitle = $settings['hero_title'] ?? null;
    $heroSubtitleHighlight = $settings['hero_subtitle_highlight'] ?? null;
    $heroSubtitle = $settings['hero_subtitle'] ?? null;
    $heroDescription = $settings['hero_description'] ?? null;
    $aboutTitle = $settings['about_title'] ?? null;
    $aboutText = $settings['about_text'] ?? null;
    $phoneMobile = $settings['phone_mobile'] ?? null;
    $phoneCity = $settings['phone_city'] ?? null;
    $contactEmail = $settings['contact_email'] ?? null;
    $notificationsEmail = $settings['notifications_email'] ?? null;
    $contactAddress = $settings['contact_address'] ?? null;
    $contactLegalAddress = $settings['contact_legal_address'] ?? null;
    $contactHours = $settings['contact_hours'] ?? null;
    $citiesJson = $settings['cities'] ?? '[]';
    $cities = [];
    if (is_string($citiesJson) && $citiesJson !== '') {
        $decoded = json_decode($citiesJson, true);
        if (is_array($decoded)) {
            $cities = $decoded;
        }
    }
    $privacyPolicy = $settings['privacy_policy'] ?? null;
    $termsOfUse = $settings['terms_of_use'] ?? null;
    $analyticsCode = $settings['analytics_code'] ?? null;
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
        <label for="hero_title" class="block text-sm font-medium text-stone-700 mb-1">Заголовок</label>
        <input type="text" name="hero_title" id="hero_title" value="{{ old('hero_title', $heroTitle) }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('hero_title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Основной заголовок</p>
    </div>

    <div>
        <label for="hero_subtitle_highlight" class="block text-sm font-medium text-stone-700 mb-1">Выделенный подзаголовок</label>
        <input type="text" name="hero_subtitle_highlight" id="hero_subtitle_highlight" value="{{ old('hero_subtitle_highlight', $heroSubtitleHighlight) }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('hero_subtitle_highlight')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Часть подзаголовка, которая будет визуально выделена.</p>
    </div>

    <div>
        <label for="hero_subtitle" class="block text-sm font-medium text-stone-700 mb-1">Подзаголовок</label>
        <input type="text" name="hero_subtitle" id="hero_subtitle" value="{{ old('hero_subtitle', $heroSubtitle) }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('hero_subtitle')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Обычная часть подзаголовка.</p>
    </div>


    <div>
        <label for="hero_description" class="block text-sm font-medium text-stone-700 mb-1">Описание</label>
        <textarea name="hero_description" id="hero_description" rows="3"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">{{ old('hero_description', $heroDescription) }}</textarea>
        @error('hero_description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Текст под заголовком.</p>
    </div>

    <div class="space-y-2 pt-4 border-t border-stone-200">
        <h2 class="text-lg font-semibold text-stone-800">Блок «Об адвокате»</h2>
        <p class="text-sm text-stone-500">Тексты информационного блока «Об адвокате» на главной странице.</p>
    </div>

    <div>
            <label for="about_title" class="block text-sm font-medium text-stone-700 mb-1">Заголовок</label>
            <input type="text" name="about_title" id="about_title" value="{{ old('about_title', $aboutTitle) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('about_title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-stone-400 mt-1">Основной заголовок блока «Об адвокате».</p>
        </div>


    <div>
        <label for="about_text" class="block text-sm font-medium text-stone-700 mb-1">Текст блока «Об адвокате»</label>
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
        <h2 class="text-lg font-semibold text-stone-800">Список городов</h2>
        <p class="text-sm text-stone-500">
            Города, с которыми вы работаете. Можно добавлять новые и менять порядок кнопками.
        </p>
    </div>

    <div id="cities-settings" class="space-y-3">
        <input type="hidden" name="cities" id="cities-input" value="{{ old('cities', json_encode($cities, JSON_UNESCAPED_UNICODE)) }}">
        <div id="cities-list" class="space-y-2">
            <!-- Ряды городов будут добавлены скриптом -->
        </div>
        <button type="button"
                id="add-city-btn"
                class="inline-flex items-center rounded-lg border border-stone-300 px-3 py-1.5 text-sm font-medium text-stone-700 hover:bg-stone-50">
            + Добавить город
        </button>
        <p class="text-xs text-stone-400">
            Порядок в списке определяется сверху вниз. Пустые строки при сохранении будут автоматически убраны.
        </p>
    </div>

    <div class="space-y-2 pt-4 border-t border-stone-200">
        <h2 class="text-lg font-semibold text-stone-800">Правовая информация</h2>
        <p class="text-sm text-stone-500">
            Тексты страниц «Политика конфиденциальности» и «Пользовательское соглашение», которые открываются по ссылкам в подвале сайта.
        </p>
    </div>

    <div>
        <label for="privacy_policy" class="block text-sm font-medium text-stone-700 mb-1">Политика конфиденциальности</label>
        <textarea name="privacy_policy" id="privacy_policy" rows="8"
                  class="js-richtext w-full px-3 py-2 border border-stone-300 rounded-lg font-mono text-xs leading-relaxed focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
                  placeholder="Текст политики конфиденциальности...">{{ old('privacy_policy', $privacyPolicy) }}</textarea>
        @error('privacy_policy')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">
            Можно использовать HTML‑разметку (&lt;p&gt;, &lt;ul&gt;, &lt;strong&gt; и т.п.) для форматирования текста.
        </p>
    </div>

    <div>
        <label for="terms_of_use" class="block text-sm font-medium text-stone-700 mb-1">Пользовательское соглашение</label>
        <textarea name="terms_of_use" id="terms_of_use" rows="8"
                  class="js-richtext w-full px-3 py-2 border border-stone-300 rounded-lg font-mono text-xs leading-relaxed focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
                  placeholder="Текст пользовательского соглашения...">{{ old('terms_of_use', $termsOfUse) }}</textarea>
        @error('terms_of_use')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">
            Также поддерживается базовый HTML для оформления разделов и списков.
        </p>
    </div>

    <div class="space-y-2 pt-4 border-t border-stone-200">
        <h2 class="text-lg font-semibold text-stone-800">Счётчики и аналитика</h2>
        <p class="text-sm text-stone-500">
            Код внешних сервисов (Яндекс.Метрика, Google Analytics и др.), который будет выведен в самом конце страницы перед закрывающим тегом &lt;/body&gt;.
        </p>
    </div>

    <div>
        <label for="analytics_code" class="block text-sm font-medium text-stone-700 mb-1">Код счётчиков и аналитики</label>
        <textarea name="analytics_code" id="analytics_code" rows="6"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg font-mono text-xs leading-relaxed focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
                  placeholder="&lt;!-- Пример: Яндекс.Метрика --&gt;&#10;&lt;script type=&quot;text/javascript&quot;&gt;...&lt;/script&gt;">{{ old('analytics_code', $analyticsCode) }}</textarea>
        @error('analytics_code')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">
            Вставьте сюда полный код счётчиков. Будьте внимательны: этот код выполняется на всех страницах сайта.
        </p>
    </div>

    <div class="flex gap-3 pt-4">
        <button type="submit" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">
            Сохранить
        </button>
    </div>
</form>

<script>
    (function () {
        const listEl = document.getElementById('cities-list');
        const hiddenInput = document.getElementById('cities-input');
        const addBtn = document.getElementById('add-city-btn');
        if (!listEl || !hiddenInput || !addBtn) {
            return;
        }

        function readFromHidden() {
            try {
                const value = hiddenInput.value || '[]';
                const parsed = JSON.parse(value);
                if (Array.isArray(parsed)) {
                    return parsed;
                }
            } catch (e) {
                console.warn('Invalid cities JSON in settings', e);
            }
            return [];
        }

        function writeToHidden() {
            const names = Array.from(listEl.querySelectorAll('.js-city-name-input'))
                .map(function (input) { return input.value.trim(); })
                .filter(function (value) { return value.length > 0; });
            hiddenInput.value = JSON.stringify(names);
        }

        function createRow(name) {
            const row = document.createElement('div');
            row.className = 'flex items-center gap-2';

            const input = document.createElement('input');
            input.type = 'text';
            input.value = name || '';
            input.className = 'js-city-name-input flex-1 px-3 py-1.5 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500 text-sm';

            const controls = document.createElement('div');
            controls.className = 'flex items-center gap-1';

            const upBtn = document.createElement('button');
            upBtn.type = 'button';
            upBtn.textContent = '↑';
            upBtn.className = 'px-2 py-1 text-xs border border-stone-300 rounded hover:bg-stone-50';

            const downBtn = document.createElement('button');
            downBtn.type = 'button';
            downBtn.textContent = '↓';
            downBtn.className = 'px-2 py-1 text-xs border border-stone-300 rounded hover:bg-stone-50';

            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.textContent = '×';
            removeBtn.className = 'px-2 py-1 text-xs border border-red-300 text-red-600 rounded hover:bg-red-50';

            upBtn.addEventListener('click', function () {
                const prev = row.previousElementSibling;
                if (prev) {
                    listEl.insertBefore(row, prev);
                    writeToHidden();
                }
            });

            downBtn.addEventListener('click', function () {
                const next = row.nextElementSibling;
                if (next) {
                    listEl.insertBefore(next, row);
                    writeToHidden();
                }
            });

            removeBtn.addEventListener('click', function () {
                row.remove();
                writeToHidden();
            });

            input.addEventListener('change', writeToHidden);
            input.addEventListener('blur', writeToHidden);

            controls.appendChild(upBtn);
            controls.appendChild(downBtn);
            controls.appendChild(removeBtn);

            row.appendChild(input);
            row.appendChild(controls);

            return row;
        }

        function renderInitial() {
            const cities = readFromHidden();
            listEl.innerHTML = '';
            if (cities.length === 0) {
                listEl.appendChild(createRow(''));
                return;
            }
            cities.forEach(function (name) {
                listEl.appendChild(createRow(name));
            });
        }

        addBtn.addEventListener('click', function () {
            listEl.appendChild(createRow(''));
            writeToHidden();
        });

        renderInitial();
    })();
</script>

@endsection
