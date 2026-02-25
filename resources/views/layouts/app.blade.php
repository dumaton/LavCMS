<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LavCMS')</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Manrope', sans-serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }
    </style>
</head>
<body class="bg-stone-50 text-stone-800 min-h-screen flex flex-col">
    <nav class="bg-stone-900 text-stone-100 shadow-lg">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-mono text-lg font-semibold tracking-tight">LavCMS</a>
            <div class="flex gap-6">
                @foreach($menuItems ?? [] as $item)
                    <a href="{{ $item->url }}"
                       class="hover:text-amber-400 transition {{ request()->url() === url($item->url) ? 'text-amber-400' : '' }}"
                       @if($item->open_new_tab) target="_blank" rel="noopener" @endif>
                        {{ $item->title }}
                    </a>
                @endforeach
                <a href="{{ route('admin.dashboard') }}" class="text-amber-400 hover:text-amber-300 transition">Админ</a>
            </div>
        </div>
    </nav>
    <main class="max-w-6xl mx-auto px-4 py-10 flex-1 w-full">
        @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-emerald-100 text-emerald-800 rounded-lg">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
    <footer class="bg-stone-900 text-stone-400 mt-auto">
        <div class="max-w-6xl mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <a href="{{ route('home') }}" class="font-mono text-stone-100 font-semibold">LavCMS</a>
                    <p class="text-sm mt-1">Простая CMS для новостей и статей</p>
                </div>
                <div class="flex flex-wrap gap-4 text-sm">
                    @foreach($menuItems ?? [] as $item)
                        <a href="{{ $item->url }}"
                           class="hover:text-amber-400 transition"
                           @if($item->open_new_tab) target="_blank" rel="noopener" @endif>
                            {{ $item->title }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="border-t border-stone-800 mt-4 pt-4 text-sm text-center md:text-left">
                &copy; {{ date('Y') }} LavCMS. Все права защищены.
            </div>
        </div>
    </footer>
</body>
</html>
