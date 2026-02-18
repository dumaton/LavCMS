@extends('layouts.admin')

@section('title', 'Сообщение с сайта')
@section('page_title', 'Сообщение с сайта')

@section('content')
<div class="max-w-3xl space-y-6">
    <div class="bg-white border border-stone-200 rounded-xl p-6 shadow-sm">
        <div class="flex justify-between items-start gap-4 mb-4">
            <div>
                <p class="text-sm text-stone-500 mb-1">От:</p>
                <p class="text-stone-900 font-medium">{{ $contact->name }}</p>
                <p class="text-stone-600 text-sm">{{ $contact->email }}</p>
            </div>
            <div class="text-right text-xs text-stone-500">
                <p>Получено: {{ $contact->created_at?->format('d.m.Y H:i') }}</p>
                @if($contact->read_at)
                    <p class="mt-1 text-emerald-600">Прочитано: {{ $contact->read_at->format('d.m.Y H:i') }}</p>
                @else
                    <p class="mt-1 text-amber-600">Новое</p>
                @endif
            </div>
        </div>

        <div class="mb-4">
            <p class="text-sm text-stone-500 mb-1">Тема:</p>
            <p class="text-stone-900 font-medium">{{ $contact->subject ?: 'Без темы' }}</p>
        </div>

        <div>
            <p class="text-sm text-stone-500 mb-1">Сообщение:</p>
            <div class="whitespace-pre-wrap text-stone-800 text-sm border border-stone-100 rounded-lg px-4 py-3 bg-stone-50">
                {{ $contact->message }}
            </div>
        </div>
    </div>

    <div class="flex justify-between items-center">
        <a href="mailto:{{ $contact->email }}?subject={{ rawurlencode('Re: ' . ($contact->subject ?: 'Сообщение с сайта')) }}"
           class="inline-flex items-center px-4 py-2 rounded-lg border border-stone-300 text-sm text-stone-700 hover:bg-stone-50 transition">
            Ответить по email
        </a>
        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Удалить сообщение?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition">
                Удалить
            </button>
        </form>
    </div>
</div>
@endsection

