@extends('layouts.app')

@section('title', 'Пользовательское соглашение')
@section('meta_description', 'Пользовательское соглашение сайта ООО «Химтехпром».')

@section('content')
    <section class="py-16 bg-background">
        <div class="mx-auto max-w-4xl px-6">
            <h1 class="font-serif text-3xl md:text-4xl font-bold text-foreground mb-6">
                Пользовательское соглашение
            </h1>

            @if($content)
                <div class="prose prose-sm max-w-none text-muted-foreground leading-relaxed">
                    {!! $content !!}
                </div>
            @else
                <p class="text-sm text-muted-foreground">
                    Текст пользовательского соглашения пока не заполнен. Обратитесь к администратору сайта.
                </p>
            @endif
        </div>
    </section>
@endsection

