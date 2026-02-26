@extends('layouts.app')

@section('title', 'Страница не найдена — 404')
@section('meta_description', 'Запрошенная страница не найдена или была перемещена.')

@section('content')
    <section class="min-h-[60vh] flex items-center bg-background">
        <div class="mx-auto max-w-3xl px-6 py-16 text-center">
            <p class="text-xs font-medium tracking-[0.3em] text-[#9ca3af] uppercase mb-4">
                Ошибка 404
            </p>
            <h1 class="font-serif text-4xl md:text-5xl font-bold text-[#111827] mb-4">
                Страница не найдена
            </h1>
            <p class="text-base md:text-lg text-[#6b7280] mb-8">
                Возможно, страница была удалена, перемещена или вы ошиблись в адресе.
                Вы можете вернуться на главную страницу или открыть каталог продукции.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="{{ route('home') }}"
                   class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-sm bg-[#2c5282] text-white text-sm font-medium tracking-wide uppercase hover:bg-[#3b6db5] transition-colors">
                    На главную
                </a>
                <a href="{{ route('catalog.index') }}"
                   class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-sm border border-[#d1d5db] bg-white text-sm font-medium tracking-wide uppercase text-[#374151] hover:bg-[#f3f4f6] transition-colors">
                    В каталог
                </a>
            </div>
        </div>
    </section>
@endsection

