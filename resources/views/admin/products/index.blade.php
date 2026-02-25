@extends('layouts.admin')

@section('title', 'Каталог товаров')
@section('page_title', 'Каталог товаров')

@section('content')
<div class="mb-4 flex justify-end">
    <a href="{{ route('admin.products.create') }}" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">
        Добавить товар
    </a>
</div>
<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-stone-50 border-b border-stone-200">
            <tr>
                <th class="w-20 text-left px-4 py-3 text-sm font-medium text-stone-600">Фото</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Название</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Раздел</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Цена</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Статус</th>
                <th class="text-right px-4 py-3 text-sm font-medium text-stone-600">Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr class="border-b border-stone-100 hover:bg-stone-50/50">
                    <td class="px-4 py-3">
                        @if($product->main_image)
                            <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" width="50" height="50" class="object-cover rounded">
                        @else
                            <span class="text-xs text-stone-400">Нет фото</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <a href="{{ route('admin.products.edit', $product) }}" class="text-stone-800 hover:text-amber-600 font-medium">
                            {{ \Illuminate\Support\Str::limit($product->name, 60) }}
                        </a>
                    </td>
                    <td class="px-4 py-3 text-sm text-stone-600">
                        {{ $product->category?->name ?? '—' }}
                    </td>
                    <td class="px-4 py-3 text-sm text-stone-800">
                        {{ number_format((int) $product->price, 0, ',', ' ') }} ₽
                    </td>
                    <td class="px-4 py-3 text-sm">
                        @if($product->is_published)
                            <span class="text-emerald-600">Опубликовано</span>
                        @else
                            <span class="text-stone-400">Черновик</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-right text-sm">
                        <a href="{{ route('admin.products.edit', $product) }}" class="text-amber-600 hover:text-amber-700 mr-3">Изменить</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Удалить товар?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-8 text-center text-stone-500">
                        Товаров пока нет. Добавьте первый.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3 border-t border-stone-200">
        {{ $products->links() }}
    </div>
</div>
@endsection

