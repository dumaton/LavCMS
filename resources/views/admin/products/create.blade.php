@extends('layouts.admin')

@section('title', 'Новый товар')
@section('page_title', 'Новый товар')

@section('content')
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl space-y-6">
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-stone-700 mb-1">Раздел</label>
            @if($categories->isEmpty())
                <p class="text-sm text-stone-500">Разделы ещё не созданы. Товар можно сохранить без привязки к разделу.</p>
            @else
                <select name="product_category_id"
                        class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
                    <option value="">Без раздела</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('product_category_id') == $category->id)>
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
            <label class="block text-sm font-medium text-stone-700 mb-1">Бренд</label>
            @if($brands->isEmpty())
                <p class="text-sm text-stone-500">Бренды ещё не созданы. Товар можно сохранить без привязки к бренду.</p>
            @else
                <select name="brand_id"
                        class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
                    <option value="">Без бренда</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            @endif
            @error('brand_id')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Название *</label>
        <input type="text" name="name" value="{{ old('name') }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('name')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">URL</label>
        <input type="text" name="slug" value="{{ old('slug') }}" placeholder=""
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500 font-mono text-sm">
        <p class="text-xs text-stone-500 mt-1">Оставьте пустым — сгенерируется из названия. Часть URL товара. Только латиница, цифры и дефис.</p>
        @error('slug')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Описание</label>
        <textarea name="description" rows="6"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500 js-richtext">{{ old('description') }}</textarea>
        @error('description')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Артикул</label>
        <input type="text" name="article" value="{{ old('article') }}" placeholder=""
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500 font-mono text-sm">
        <p class="text-xs text-stone-500 mt-1">Артикул или код товара для отображения в каталоге (необязательно).</p>
        @error('article')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-stone-700 mb-1">Цена, ₽</label>
            <input type="number" name="price" step="1" min="0"
                   value="{{ old('price') }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('price')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-wrap items-center gap-6 mt-6 sm:mt-0">
            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_published" value="1"
                       class="rounded border-stone-300 text-amber-600 focus:ring-amber-500"
                       @checked(old('is_published', true))>
                <span class="text-sm text-stone-700">Опубликовано</span>
            </label>
            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="in_stock" value="1"
                       class="rounded border-stone-300 text-amber-600 focus:ring-amber-500"
                       @checked(old('in_stock', true))>
                <span class="text-sm text-stone-700">В наличии</span>
            </label>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-stone-700 mb-1">Основное фото</label>
            <input type="file" name="main_image"
                   class="w-full text-sm text-stone-700 file:mr-4 file:py-2 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
            @error('main_image')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-stone-700 mb-1">Дополнительные фото</label>
            <input type="file" name="gallery[]" multiple
                   class="w-full text-sm text-stone-700 file:mr-4 file:py-2 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
            <p class="text-xs text-stone-500 mt-1">Можно выбрать несколько файлов.</p>
            @error('gallery.*')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="pt-4 border-t border-stone-200 flex items-center justify-between">
        <a href="{{ route('admin.products.index') }}" class="text-sm text-stone-500 hover:text-stone-700">Отмена</a>
        <div class="flex gap-2">
            <button type="submit" name="action" value="apply"
                    class="px-4 py-2 bg-amber-100 hover:bg-amber-200 text-amber-900 font-medium rounded-lg border border-amber-300 transition">
                Применить
            </button>
            <button type="submit"
                    class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">
                Сохранить
            </button>
        </div>
    </div>
</form>
@endsection

