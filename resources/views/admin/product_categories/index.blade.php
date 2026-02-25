@extends('layouts.admin')

@section('title', 'Разделы каталога')
@section('page_title', 'Разделы каталога')

@section('content')
<div class="mb-4 flex justify-end">
    <a href="{{ route('admin.product-categories.create') }}"
       class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">
        Добавить раздел
    </a>
</div>
<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-stone-50 border-b border-stone-200">
            <tr>
                <th class="w-20 text-left px-4 py-3 text-sm font-medium text-stone-600">Фото</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Название</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Slug</th>
                <th class="text-right px-4 py-3 text-sm font-medium text-stone-600">Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr class="border-b border-stone-100 hover:bg-stone-50/50">
                    <td class="px-4 py-3">
                        @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                 class="w-12 h-12 object-cover rounded-md border border-stone-200">
                        @else
                            <span class="text-xs text-stone-400">нет</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-stone-800 font-medium">
                        {{ $category->name }}
                    </td>
                    <td class="px-4 py-3 text-sm text-stone-500">
                        {{ $category->slug }}
                    </td>
                    <td class="px-4 py-3 text-right text-sm">
                        <a href="{{ route('admin.product-categories.edit', $category) }}"
                           class="text-amber-600 hover:text-amber-700 mr-3">
                            Изменить
                        </a>
                        <form action="{{ route('admin.product-categories.destroy', $category) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Удалить раздел?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-8 text-center text-stone-500">
                        Разделов пока нет. Добавьте первый.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3 border-t border-stone-200">
        {{ $categories->links() }}
    </div>
</div>
@endsection

