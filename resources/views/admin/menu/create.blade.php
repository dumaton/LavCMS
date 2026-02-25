@extends('layouts.admin')

@section('title', 'Новый пункт меню')
@section('page_title', 'Новый пункт меню')

@section('content')
<form action="{{ route('admin.menu.store') }}" method="POST" class="max-w-xl space-y-4">
    @csrf
    <div>
        <label for="title" class="block text-sm font-medium text-stone-700 mb-1">Название *</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
               placeholder="Новости">
        @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="url" class="block text-sm font-medium text-stone-700 mb-1">Ссылка (URL) *</label>
        <input type="text" name="url" id="url" value="{{ old('url') }}" required
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
               placeholder="/articles или https://...">
        @error('url')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Внутренние: /articles, /catalog, /contact. Внешние: https://...</p>
    </div>
    <div>
        <label for="sort_order" class="block text-sm font-medium text-stone-700 mb-1">Порядок</label>
        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $nextSortOrder ?? 1) }}" min="1"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('sort_order')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <label class="flex items-center gap-2">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
               class="rounded border-stone-300 text-amber-500 focus:ring-amber-500">
        Показывать в меню
    </label>
    <label class="flex items-center gap-2">
        <input type="hidden" name="open_new_tab" value="0">
        <input type="checkbox" name="open_new_tab" value="1" {{ old('open_new_tab') ? 'checked' : '' }}
               class="rounded border-stone-300 text-amber-500 focus:ring-amber-500">
        Открывать в новой вкладке
    </label>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">Добавить</button>
        <a href="{{ route('admin.menu.index') }}" class="px-4 py-2 border border-stone-300 rounded-lg hover:bg-stone-50 transition">Отмена</a>
    </div>
</form>
@endsection
