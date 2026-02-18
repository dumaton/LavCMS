@extends('layouts.admin')

@section('title', 'Новости')
@section('page_title', 'Новости')

@section('content')
<div class="mb-4 flex justify-end">
    <a href="{{ route('admin.news.create') }}" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">Добавить новость</a>
</div>
<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-stone-50 border-b border-stone-200">
            <tr>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Заголовок</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Статус</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Дата создания</th>
                <th class="text-right px-4 py-3 text-sm font-medium text-stone-600">Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($news as $item)
                <tr class="border-b border-stone-100 hover:bg-stone-50/50">
                    <td class="px-4 py-3">
                        <a href="{{ route('admin.news.edit', $item) }}" class="text-stone-800 hover:text-amber-600 font-medium">{{ Str::limit($item->title, 75)}}</a>
                    </td>
                    <td class="px-4 py-3">
                        @if($item->is_published)
                            <span class="text-emerald-600 text-sm">Опубликовано</span>
                        @else
                            <span class="text-stone-400 text-sm">Черновик</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-stone-500 text-sm">{{ $item->created_at->format('d.m.Y') }}</td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.news.edit', $item) }}" class="text-amber-600 hover:text-amber-700 text-sm mr-3">Изменить</a>
                        <form action="{{ route('admin.news.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Удалить новость?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700 text-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-8 text-center text-stone-500">Новостей пока нет</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3 border-t border-stone-200">
        {{ $news->links() }}
    </div>
</div>
@endsection
