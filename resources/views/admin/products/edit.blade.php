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
        <label class="block text-sm font-medium text-stone-700 mb-1">URL</label>
        <input type="text" name="slug" value="{{ old('slug', $product->slug) }}"
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500 font-mono text-sm">
        <p class="text-xs text-stone-500 mt-1">Часть URL товара. Оставьте пустым — подставится из названия. Только латиница, цифры и дефис.</p>
        @error('slug')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

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
            <label class="block text-sm font-medium text-stone-700 mb-1">Бренд</label>
            @if($brands->isEmpty())
                <p class="text-sm text-stone-500">Бренды ещё не созданы. Товар можно сохранить без привязки к бренду.</p>
            @else
                <select name="brand_id"
                        class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
                    <option value="">Без бренда</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}"
                            @selected(old('brand_id', $product->brand_id) == $brand->id)>
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
        <label class="block text-sm font-medium text-stone-700 mb-1">Описание</label>
        <textarea name="description" rows="6"
                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500 js-richtext">{{ old('description', $product->description) }}</textarea>
        @error('description')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-stone-700 mb-1">Цена, ₽</label>
            <input type="number" name="price" step="1" min="0"
                   value="{{ old('price', (int) $product->price) }}"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('price')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-wrap items-center gap-6 mt-6 sm:mt-0">
            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_published" value="1"
                       class="rounded border-stone-300 text-amber-600 focus:ring-amber-500"
                       @checked(old('is_published', $product->is_published))>
                <span class="text-sm text-stone-700">Опубликовано</span>
            </label>
            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="in_stock" value="1"
                       class="rounded border-stone-300 text-amber-600 focus:ring-amber-500"
                       @checked(old('in_stock', $product->in_stock ?? true))>
                <span class="text-sm text-stone-700">В наличии</span>
            </label>
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
            <div id="product-gallery-sortable" class="grid grid-cols-3 gap-3">
                @foreach($product->images as $image)
                    <div class="bg-white rounded-lg border border-stone-200 overflow-hidden flex flex-col" data-id="{{ $image->id }}">
                        <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->name }}" class="w-full h-24 object-cover cursor-move">
                        <div class="px-1.5 py-1 border-t border-stone-200 flex justify-end">
                            <button type="button"
                                    class="js-delete-image inline-flex items-center justify-center w-7 h-7 rounded-full hover:bg-red-50 hover:text-red-700"
                                    data-url="{{ route('admin.products.images.destroy', [$product, $image]) }}"
                                    title="Удалить фото"
                                    aria-label="Удалить фото">
                                <svg viewBox="0 0 20 20" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 5l10 10M15 5L5 15" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

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

<script src="{{ asset('js/sortable.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.getElementById('product-gallery-sortable');
        if (container && typeof Sortable !== 'undefined') {
            new Sortable(container, {
                animation: 150,
                onEnd: () => {
                    const ids = Array
                        .from(container.querySelectorAll('[data-id]'))
                        .map((el) => el.dataset.id);

                    fetch('{{ route('admin.products.images.reorder', $product) }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        body: JSON.stringify({ order: ids }),
                    }).catch(() => {});
                },
            });
        }

        document.querySelectorAll('.js-delete-image').forEach((btn) => {
            btn.addEventListener('click', () => {
                const url = btn.dataset.url;
                if (!url || !confirm('Удалить это фото?')) {
                    return;
                }

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: JSON.stringify({ _method: 'DELETE' }),
                }).then(() => {
                    const card = btn.closest('[data-id]');
                    if (card) {
                        card.remove();
                    }
                }).catch(() => {});
            });
        });
    });
</script>
@endsection

