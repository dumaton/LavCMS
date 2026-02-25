@extends('layouts.admin')

@section('title', 'Новый раздел')
@section('page_title', 'Новый раздел каталога')

@section('content')
<form action="{{ route('admin.product-categories.store') }}" method="POST" enctype="multipart/form-data" class="max-w-xl space-y-6">
    @csrf

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Название *</label>
        <input type="text" name="name" value="{{ old('name') }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        <p class="text-xs text-stone-500 mt-1">
            Slug для ссылки будет сгенерирован автоматически.
        </p>
        @error('name')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Описание</label>
        <textarea name="description" rows="4"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500 js-richtext">{{ old('description') }}</textarea>
        @error('description')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Фото раздела</label>
        <input type="file" name="image"
               class="w-full text-sm text-stone-700 file:mr-4 file:py-2 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
        <p class="text-xs text-stone-500 mt-1">Используется как обложка раздела в каталоге.</p>
        @error('image')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="pt-4 border-t border-stone-200 flex items-center justify-between">
        <a href="{{ route('admin.product-categories.index') }}" class="text-sm text-stone-500 hover:text-stone-700">
            Отмена
        </a>
        <button type="submit"
                class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">
            Сохранить
        </button>
    </div>
</form>
@endsection

