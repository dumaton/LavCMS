@extends('layouts.app')

@section('title', 'Политика в отношении обработки персональных данных')
@section('meta_description', 'Политика конфиденциальности сайта ООО «Химтехпром».')

@section('content')
    <section class="py-16 bg-background">
        <div class="mx-auto max-w-7xl px-6">
            <div class="mx-auto max-w-7xl px-6 group flex flex-col gap-4 rounded-sm border border-border bg-card p-6">
                <h1 class="font-serif text-3xl md:text-4xl font-bold text-foreground mb-6">
                    Политика в отношении обработки персональных данных
                </h1>

                @if($content)
                    <div class="prose prose-sm max-w-none text-muted-foreground leading-relaxed">
                        {!! $content !!}
                    </div>
                @else
                    <p class="text-sm text-muted-foreground">
                        Текст политики конфиденциальности пока не заполнен. 
                    </p>
                @endif
            </div>
        </div>
    </section>
@endsection

