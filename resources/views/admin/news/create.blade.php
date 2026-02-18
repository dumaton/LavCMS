@extends('layouts.admin')

@section('title', 'Новая новость')
@section('page_title', 'Новая новость')

@section('content')
<form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl space-y-4">
    @csrf
    <div>
        <label for="title" class="block text-sm font-medium text-stone-700 mb-1">Заголовок *</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="excerpt" class="block text-sm font-medium text-stone-700 mb-1">Краткое описание</label>
        <input type="text" name="excerpt" id="excerpt" value="{{ old('excerpt') }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('excerpt')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="image" class="block text-sm font-medium text-stone-700 mb-1">Фото</label>
        <input type="file" name="image" id="image"
               class="w-full text-sm text-stone-700 file:mr-4 file:py-2 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
        @error('image')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="body" class="block text-sm font-medium text-stone-700 mb-1">Текст *</label>
        <textarea name="body" id="body" rows="10" required
                  class="js-richtext w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">{{ old('body') }}</textarea>
        @error('body')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <label class="flex items-center gap-2">
        <input type="hidden" name="is_published" value="0">
        <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}
               class="rounded border-stone-300 text-amber-500 focus:ring-amber-500">
        Опубликовать
    </label>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">Создать</button>
        <a href="{{ route('admin.news.index') }}" class="px-4 py-2 border border-stone-300 rounded-lg hover:bg-stone-50 transition">Отмена</a>
    </div>
</form>
@endsection
