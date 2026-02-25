@extends('layouts.admin')

@section('title', 'Новый бренд')
@section('page_title', 'Новый бренд')

@section('content')
<form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data" class="max-w-xl space-y-6">
    @csrf

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Название *</label>
        <input type="text" name="name" value="{{ old('name') }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('name')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-stone-700 mb-1">Порядок</label>
            <input type="number" name="sort_order" min="1" value="{{ old('sort_order', $nextSortOrder ?? 1) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('sort_order')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center gap-2 mt-6 sm:mt-0">
            <input type="checkbox" name="is_active" id="is_active" value="1"
                   class="rounded border-stone-300 text-amber-600 focus:ring-amber-500"
                   @checked(old('is_active', true))>
            <label for="is_active" class="text-sm text-stone-700">Показывать на сайте</label>
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Логотип</label>
        <input type="file" name="image"
               class="w-full text-sm text-stone-700 file:mr-4 file:py-2 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
        <p class="text-xs text-stone-500 mt-1">Рекомендуется PNG, с прозрачным фоном, размер 300x300</p>
        @error('image')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="pt-4 border-t border-stone-200 flex items-center justify-between">
        <a href="{{ route('admin.brands.index') }}" class="text-sm text-stone-500 hover:text-stone-700">Отмена</a>
        <button type="submit" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">
            Сохранить
        </button>
    </div>
</form>
@endsection

