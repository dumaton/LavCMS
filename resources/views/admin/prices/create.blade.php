@extends('layouts.admin')

@section('title', 'Новая позиция стоимости')
@section('page_title', 'Новая позиция стоимости')

@section('content')
<form action="{{ route('admin.prices.store') }}" method="POST" class="max-w-xl space-y-4">
    @csrf

    <div>
        <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Название *</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
               placeholder="Например: Консультация">
        @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-stone-700 mb-1">Описание</label>
        <textarea name="description" id="description" rows="3"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
                  placeholder="Кратко опишите, что входит в услугу">{{ old('description') }}</textarea>
        @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="price_text" class="block text-sm font-medium text-stone-700 mb-1">Цена (текстом)</label>
        <input type="text" name="price_text" id="price_text" value="{{ old('price_text') }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
               placeholder="Например: Бесплатно, от 10 000 ₽, Договорная">
        @error('price_text')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" id="is_featured" name="is_featured" value="1"
               class="rounded border-stone-300 text-amber-600 focus:ring-amber-500"
               {{ old('is_featured') ? 'checked' : '' }}>
        <label for="is_featured" class="text-sm font-medium text-stone-700">Выделить как «популярное»</label>
    </div>

    <div>
        <label for="sort_order" class="block text-sm font-medium text-stone-700 mb-1">Порядок</label>
        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $nextSortOrder ?? 1) }}" min="1"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('sort_order')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="pt-4 border-t border-stone-200 flex items-center justify-between">
        <a href="{{ route('admin.prices.index') }}" class="text-sm text-stone-500 hover:text-stone-700">Отмена</a>
        <div class="flex gap-2">
            <button type="submit" name="action" value="apply"
                    class="px-4 py-2 bg-amber-100 hover:bg-amber-200 text-amber-900 font-medium rounded-lg border border-amber-300 transition">
                Применить
            </button>
            <button type="submit"
                    class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">
                Добавить
            </button>
        </div>
    </div>
</form>
@endsection

