<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход — LavCMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Manrope', sans-serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }
    </style>
</head>
<body class="bg-stone-900 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-sm">
        <h1 class="font-mono text-2xl font-semibold text-amber-400 text-center mb-8">LavCMS</h1>
        <div class="bg-stone-800 rounded-xl shadow-xl p-6 border border-stone-700">
            <h2 class="text-stone-100 text-lg font-medium mb-4">Вход в админ-панель</h2>
            @if($errors->any())
                <div class="mb-4 p-3 bg-red-900/50 text-red-200 rounded-lg text-sm">
                    @foreach($errors->all() as $err)
                        <p>{{ $err }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('admin.login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm text-stone-400 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                           class="w-full px-3 py-2 bg-stone-700 border border-stone-600 rounded-lg text-stone-100 focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
                </div>
                <div>
                    <label for="password" class="block text-sm text-stone-400 mb-1">Пароль</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-3 py-2 bg-stone-700 border border-stone-600 rounded-lg text-stone-100 focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
                </div>
                <label class="flex items-center gap-2 text-stone-400 text-sm">
                    <input type="checkbox" name="remember" class="rounded border-stone-600 bg-stone-700 text-amber-500 focus:ring-amber-500">
                    Запомнить меня
                </label>
                <button type="submit" class="w-full py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">Войти</button>
            </form>
            <p class="mt-4 text-center text-stone-500 text-sm">
                <a href="{{ route('home') }}" class="hover:text-amber-400">На главную</a>
            </p>
        </div>
    </div>
</body>
</html>
