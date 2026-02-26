@extends('layouts.app')

@section('title', 'Страница не найдена — ошибка 404')
@section('meta_description', 'Запрошенная страница не найдена или была перемещена.')
@section('content')
    <section class="py-16 bg-background">
        <div class="mx-auto max-w-7xl px-6">
            <div class="mx-auto max-w-7xl px-6 group flex flex-col gap-4 rounded-sm border border-border bg-card p-6 text-center">
                <p class="text-xs font-medium tracking-[0.3em] text-[#9ca3af] uppercase mb-4">
                    Страница не найдена
                </p>
                <h1 class="font-serif text-4xl md:text-5xl font-bold text-[#111827] mb-4">
                    Ошибка 404
                </h1>
                <p class="text-base md:text-lg text-[#6b7280] mb-8">
                    Возможно, страница была удалена, перемещена или вы ошиблись в адресе.
                </p>
            </div>
        </div>
    </section>
@endsection

