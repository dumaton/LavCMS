@extends('layouts.admin')

@section('title', 'Обратная связь')
@section('page_title', 'Сообщения с сайта')

@section('content')
<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-stone-50 border-b border-stone-200">
            <tr>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Email</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Компания / Телефон</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Получено</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Статус</th>
                <th class="text-right px-4 py-3 text-sm font-medium text-stone-600">Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $msg)
                <tr class="border-b border-stone-100 hover:bg-stone-50/50">
                    <td class="px-4 py-3 text-sm text-stone-600"><a href="{{ route('admin.contacts.show', $msg) }}" class="text-stone-800 hover:text-amber-600 font-medium">{{ $msg->email }}</a></td>
                    <td class="px-4 py-3 text-xs text-stone-600">
                        @if($msg->company)
                            <div>{{ $msg->company }}</div>
                        @endif
                        @if($msg->phone)
                            <div class="text-stone-500">{{ $msg->phone }}</div>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-xs text-stone-500">{{ $msg->created_at?->format('d.m.Y H:i') }}</td>
                    <td class="px-4 py-3 text-xs">
                        @if($msg->read_at)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700">
                                Прочитано
                            </span>
                        @else
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-amber-50 text-amber-700">
                                Новое
                            </span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-right text-sm">
                        <a href="{{ route('admin.contacts.show', $msg) }}" class="text-amber-600 hover:text-amber-700 mr-3">Открыть</a>
                        <form action="{{ route('admin.contacts.destroy', $msg) }}" method="POST" class="inline" onsubmit="return confirm('Удалить сообщение?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-8 text-center text-stone-500">Сообщений пока нет</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3 border-t border-stone-200">
        {{ $messages->links() }}
    </div>
</div>
@endsection

