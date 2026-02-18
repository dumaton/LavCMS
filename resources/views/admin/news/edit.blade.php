@extends('layouts.admin')

@section('title', 'Редактировать новость')
@section('page_title', 'Редактировать новость')

@section('content')
<form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data" class="max-w-2xl space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label for="title" class="block text-sm font-medium text-stone-700 mb-1">Заголовок *</label>
        <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" required
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="excerpt" class="block text-sm font-medium text-stone-700 mb-1">Краткое описание</label>
        <input type="text" name="excerpt" id="excerpt" value="{{ old('excerpt', $news->excerpt) }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('excerpt')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="image" class="block text-sm font-medium text-stone-700 mb-1">Фото</label>
        @if($news->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="h-24 rounded border border-stone-200 object-cover">
            </div>
        @endif
        <input type="file" name="image" id="image"
               class="w-full text-sm text-stone-700 file:mr-4 file:py-2 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
        @error('image')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="body" class="block text-sm font-medium text-stone-700 mb-1">Текст *</label>
        <textarea name="body" id="body" rows="10" required
                  class="js-richtext w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">{{ old('body', $news->body) }}</textarea>
        @error('body')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <label class="flex items-center gap-2">
        <input type="hidden" name="is_published" value="0">
        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $news->is_published) ? 'checked' : '' }}
               class="rounded border-stone-300 text-amber-500 focus:ring-amber-500">
        Опубликовать
    </label>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">Сохранить</button>
        <a href="{{ route('admin.news.index') }}" class="px-4 py-2 border border-stone-300 rounded-lg hover:bg-stone-50 transition">Отмена</a>
    </div>
</form>
@endsection
