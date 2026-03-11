@extends('layouts.admin')

@section('title', 'Редактировать услугу')
@section('page_title', 'Редактировать услугу')

@section('content')
<form action="{{ route('admin.services.update', $service) }}" method="POST" class="max-w-xl space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Название *</label>
        <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" required
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="type" class="block text-sm font-medium text-stone-700 mb-1">Тип *</label>
        <select name="type" id="type"
                class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
                required>
            <option value="">Выберите тип</option>
            <option value="criminal" {{ old('type', $service->type ?? 'civil') === 'criminal' ? 'selected' : '' }}>Уголовные дела</option>
            <option value="civil" {{ old('type', $service->type ?? 'civil') === 'civil' ? 'selected' : '' }}>Гражданские дела</option>
        </select>
        @error('type')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-stone-700 mb-1">Описание</label>
        <textarea name="description" id="description" rows="4"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">{{ old('description', $service->description) }}</textarea>
        @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="icon" class="block text-sm font-medium text-stone-700 mb-1">SVG-иконка (код)</label>
        <textarea name="icon" id="icon" rows="4"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
        >{{ old('icon', $service->icon) }}</textarea>
        @error('icon')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-stone-400 mt-1">Вставьте сюда полный SVG-код иконки. Он будет выведен как HTML.</p>
    </div>

    <div>
        <label for="sort_order" class="block text-sm font-medium text-stone-700 mb-1">Порядок</label>
        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $service->sort_order) }}" min="1"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('sort_order')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="pt-4 border-t border-stone-200 flex items-center justify-between">
        <a href="{{ route('admin.services.index') }}" class="text-sm text-stone-500 hover:text-stone-700">Отмена</a>
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

