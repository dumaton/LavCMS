@extends('layouts.admin')

@section('title', 'Редактировать раздел')
@section('page_title', 'Редактировать раздел каталога')

@section('content')
<form action="{{ route('admin.product-categories.update', $category) }}" method="POST" enctype="multipart/form-data" class="max-w-xl space-y-6">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Название *</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('name')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">URL</label>
        <input type="text" name="slug" value="{{ old('slug', $category->slug) }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500 font-mono text-sm">
        <p class="text-xs text-stone-500 mt-1">Часть URL раздела. Оставьте пустым — подставится из названия. Только латиница, цифры и дефис.</p>
        @error('slug')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Тип</label>
        <select name="type" class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            <option value="">— выбрать —</option>
            @foreach(\App\Models\ProductCategory::typeOptions() as $value => $label)
                <option value="{{ $value }}" {{ old('type', $category->type) === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        @error('type')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Описание</label>
        <textarea name="description" rows="4"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500 js-richtext">{{ old('description', $category->description) }}</textarea>
        @error('description')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>


    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Фото раздела</label>
        @if($category->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                     class="w-40 h-40 object-cover rounded-lg border border-stone-200">
            </div>
        @endif
        <input type="file" name="image"
               class="w-full text-sm text-stone-700 file:mr-4 file:py-2 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
        <p class="text-xs text-stone-500 mt-1">Можно загрузить новое фото, старое будет заменено.</p>
        @error('image')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">SVG иконка</label>
        <textarea name="svg_icon" rows="4"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500 font-mono text-xs"
                  placeholder="<svg>...">{{ old('svg_icon', $category->svg_icon) }}</textarea>
        <p class="text-xs text-stone-500 mt-1">Вставьте код SVG без тега &lt;script&gt;.</p>
        @error('svg_icon')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex flex-wrap gap-6 items-center">
        <label class="inline-flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="show_on_home" value="1" {{ old('show_on_home', $category->show_on_home) ? 'checked' : '' }}
                   class="rounded border-stone-300 text-amber-500 focus:ring-amber-500">
            <span class="text-sm text-stone-700">Выводить на главную</span>
        </label>
        <label class="inline-flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                   class="rounded border-stone-300 text-amber-500 focus:ring-amber-500">
            <span class="text-sm text-stone-700">Активность</span>
        </label>
    </div>

    <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Порядок</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $category->sort_order) }}" min="1"
               class="w-24 px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        <p class="text-xs text-stone-500 mt-1">Число для сортировки (можно менять перетаскиванием в списке).</p>
        @error('sort_order')
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

