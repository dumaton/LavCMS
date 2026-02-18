<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Админ') — LavCMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Manrope', sans-serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }
    </style>
</head>
<body class="bg-stone-100 text-stone-800 min-h-screen">
    <div class="flex min-h-screen">
        <aside class="w-56 bg-stone-900 text-stone-100 flex flex-col fixed h-full">
            <div class="p-4 border-b border-stone-700">
                <a href="{{ route('admin.dashboard') }}" class="font-mono text-lg font-semibold">LavCMS</a>
                <p class="text-xs text-stone-400 mt-1">Админ-панель</p>
            </div>
            <nav class="flex-1 p-3 space-y-1">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-stone-800 transition {{ request()->routeIs('admin.dashboard') ? 'bg-stone-800 text-amber-400' : '' }}">
                    <svg class="w-4 h-4 shrink-0 text-stone-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12L12 3l9 9" />
                        <path d="M5 10v11h5v-6h4v6h5V10" />
                    </svg>
                    <span>Дашборд</span>
                </a>
                
                <a href="{{ route('admin.news.index') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-stone-800 transition {{ request()->routeIs('admin.news.*') ? 'bg-stone-800 text-amber-400' : '' }}">
                    <svg class="w-4 h-4 shrink-0 text-stone-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="4" width="16" height="16" rx="2" />
                        <path d="M8 9h8" />
                        <path d="M8 13h5" />
                    </svg>
                    <span>Новости</span>
                </a>
                
                <a href="{{ route('admin.articles.index') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-stone-800 transition {{ request()->routeIs('admin.articles.*') ? 'bg-stone-800 text-amber-400' : '' }}">
                    <svg class="w-4 h-4 shrink-0 text-stone-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7 4h7l5 5v11H7z" />
                        <path d="M14 4v5h5" />
                        <path d="M9 13h6" />
                        <path d="M9 17h4" />
                    </svg>
                    <span>Статьи</span>
                </a>

                <a href="{{ route('admin.contacts.index') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-stone-800 transition {{ request()->routeIs('admin.contacts.*') ? 'bg-stone-800 text-amber-400' : '' }}">
                    <svg class="w-4 h-4 shrink-0 text-stone-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16v12H5.5L4 17.5z" />
                        <path d="m22 6-10 5L2 6" />
                    </svg>
                    <span>Обратная связь</span>
                </a>

                <a href="{{ route('admin.menu.index') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-stone-800 transition {{ request()->routeIs('admin.menu.*') ? 'bg-stone-800 text-amber-400' : '' }}">
                    <svg class="w-4 h-4 shrink-0 text-stone-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12" />
                        <line x1="3" y1="6" x2="21" y2="6" />
                        <line x1="3" y1="18" x2="21" y2="18" />
                    </svg>
                    <span>Меню</span>
                </a>

                <a href="{{ route('admin.users.index') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-stone-800 transition {{ request()->routeIs('admin.users.*') ? 'bg-stone-800 text-amber-400' : '' }}">
                    <svg class="w-4 h-4 shrink-0 text-stone-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Z" />
                        <path d="M5 20a7 7 0 0 1 14 0" />
                    </svg>
                    <span>Пользователи</span>
                </a>

                <a href="{{ route('admin.settings.edit') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-stone-800 transition {{ request()->routeIs('admin.settings.*') ? 'bg-stone-800 text-amber-400' : '' }}">
                    <svg class="w-4 h-4 shrink-0 text-stone-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3" />
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06A1.65 1.65 0 0 0 15 19.4a1.65 1.65 0 0 0-1 .6 1.65 1.65 0 0 0-.33 1.1V22a2 2 0 1 1-4 0v-.1a1.65 1.65 0 0 0-.33-1.1 1.65 1.65 0 0 0-1-.6 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.6 15a1.65 1.65 0 0 0-1.1-.33H3.4a2 2 0 1 1 0-4h.1A1.65 1.65 0 0 0 4.6 10a1.65 1.65 0 0 0-.6-1 1.65 1.65 0 0 0-1.1-.33H3a2 2 0 1 1 0-4h.1a1.65 1.65 0 0 0 1.1-.33 1.65 1.65 0 0 0 .6-1A1.65 1.65 0 0 0 4.6 2.6l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 2.6a1.65 1.65 0 0 0 1-.6A1.65 1.65 0 0 0 10.4.9V.8a2 2 0 1 1 4 0v.1a1.65 1.65 0 0 0 .33 1.1 1.65 1.65 0 0 0 1 .6 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9c.26.53.4 1.12.4 1.7s-.14 1.17-.4 1.7Z" />
                    </svg>
                    <span>Настройки</span>
                </a>
            </nav>
            <div class="p-3 border-t border-stone-700">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-sm text-stone-400 hover:text-stone-200">На сайт</a>
                <form action="{{ route('admin.logout') }}" method="POST" class="mt-1">
                    @csrf
                    <button type="submit" class="block w-full text-left px-3 py-2 text-sm text-stone-400 hover:text-amber-400">Выход</button>
                </form>
            </div>
        </aside>
        <div class="flex-1 ml-56">
            <header class="bg-white border-b border-stone-200 px-8 py-4">
                <h1 class="text-xl font-semibold">@yield('page_title', 'Админ')</h1>
            </header>
            <main class="p-8">
                @if(session('success'))
                    <div class="mb-4 px-4 py-2 bg-emerald-100 text-emerald-800 rounded-lg">{{ session('success') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editors = document.querySelectorAll('textarea.js-richtext');

            if (!editors.length) {
                return;
            }

            const ctor =
                (window.ClassicEditor)
                || (window.CKEDITOR && window.CKEDITOR.ClassicEditor);

            if (!ctor) {
                console.error('CKEditor ClassicEditor глобально не найден. Проверьте, что public/js/ckeditor.js загружается без ошибок.');
                return;
            }

            editors.forEach((el) => {
                ctor.create(el, {
                    // Используем бесплатную GPL-лицензию.
                    licenseKey: 'GPL',
                }).catch((err) => {
                    console.error('Ошибка инициализации CKEditor:', err);
                });
            });
        });
    </script>
</body>
</html>
