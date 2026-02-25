@extends('layouts.admin')

@section('title', 'Редактировать товар')
@section('page_title', 'Редактировать товар')

@section('content')
<form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="max-w-3xl space-y-6">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Название *</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('name')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Раздел</label>
        @if($categories->isEmpty())
            <p class="text-sm text-stone-500">Разделы ещё не созданы. Товар можно сохранить без привязки к разделу.</p>
        @else
            <select name="product_category_id"
                    class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
                <option value="">Без раздела</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(old('product_category_id', $product->product_category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        @endif
        @error('product_category_id')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Описание</label>
        <textarea name="description" rows="6"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500 js-richtext">{{ old('description', $product->description) }}</textarea>
        @error('description')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-stone-700 mb-1">Цена, ₽ *</label>
            <input type="number" name="price" step="0.01" min="0"
                   value="{{ old('price', $product->price) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('price')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center gap-2 mt-6 sm:mt-0">
            <input type="checkbox" name="is_published" id="is_published" value="1"
                   class="rounded border-stone-300 text-amber-600 focus:ring-amber-500"
                   @checked(old('is_published', $product->is_published))>
            <label for="is_published" class="text-sm text-stone-700">Опубликовано</label>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-stone-700 mb-1">Основное фото</label>
            @if($product->main_image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" class="w-40 h-40 object-cover rounded-lg border border-stone-200">
                </div>
            @endif
            <input type="file" name="main_image"
                   class="w-full text-sm text-stone-700 file:mr-4 file:py-2 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
            @error('main_image')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-stone-700 mb-1">Добавить дополнительные фото</label>
            <input type="file" name="gallery[]" multiple
                   class="w-full text-sm text-stone-700 file:mr-4 file:py-2 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
            <p class="text-xs text-stone-500 mt-1">Можно выбрать несколько файлов. Уже добавленные фото показаны ниже.</p>
            @error('gallery.*')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    @if($product->images->isNotEmpty())
        <div>
            <label class="block text-sm font-medium text-stone-700 mb-2">Дополнительные фото</label>
            <div class="grid grid-cols-3 gap-3">
                @foreach($product->images as $image)
                    <div class="bg-white rounded-lg border border-stone-200 overflow-hidden">
                        <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->name }}" class="w-full h-24 object-cover">
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="pt-4 border-t border-stone-200 flex items-center justify-between">
        <a href="{{ route('admin.products.index') }}" class="text-sm text-stone-500 hover:text-stone-700">Отмена</a>
        <button type="submit" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">
            Сохранить
        </button>
    </div>
</form>
@endsection

