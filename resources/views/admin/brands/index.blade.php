@extends('layouts.admin')

@section('title', 'Бренды')
@section('page_title', 'Бренды')

@section('content')
<div class="mb-4 flex justify-end">
    <a href="{{ route('admin.brands.create') }}" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">
        Добавить бренд
    </a>
</div>
<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-stone-50 border-b border-stone-200">
            <tr>
                <th class="w-10 px-3 py-3 text-left text-sm font-medium text-stone-600"></th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Логотип</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Название</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Порядок</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Статус</th>
                <th class="text-right px-4 py-3 text-sm font-medium text-stone-600">Действия</th>
            </tr>
        </thead>
        <tbody id="brands-sortable">
            @forelse($brands as $brand)
                <tr class="border-b border-stone-100 hover:bg-stone-50/50" data-id="{{ $brand->id }}">
                    <td class="px-3 py-3 text-stone-400 cursor-move js-handle text-center align-middle">&#8942;</td>
                    <td class="px-4 py-3">
                        @if($brand->image)
                            <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" width="50" height="50" class="object-contain rounded">
                        @else
                            <span class="text-xs text-stone-400">Нет фото</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-sm text-stone-800">
                        <a href="{{ route('admin.brands.edit', $brand) }}" class="hover:text-amber-600 font-medium">
                            {{ $brand->name }}
                        </a>
                    </td>
                    <td class="px-4 py-3 text-sm text-stone-600 js-order">
                        {{ $brand->sort_order }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        @if($brand->is_active)
                            <span class="text-emerald-600">Активен</span>
                        @else
                            <span class="text-stone-400">Скрыт</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-right text-sm">
                        <a href="{{ route('admin.brands.edit', $brand) }}" class="text-amber-600 hover:text-amber-700 mr-3">Изменить</a>
                        <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" class="inline" onsubmit="return confirm('Удалить бренд?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-8 text-center text-stone-500">
                        Бренды пока не добавлены. Добавьте первый.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3 border-t border-stone-200">
        {{ $brands->links() }}
    </div>
</div>

<script src="{{ asset('js/sortable.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tbody = document.getElementById('brands-sortable');
        if (!tbody) return;

        const sortable = new Sortable(tbody, {
            handle: '.js-handle',
            animation: 150,
            onEnd: () => {
                const rows = Array.from(tbody.querySelectorAll('tr[data-id]'));

                rows.forEach((row, index) => {
                    const orderCell = row.querySelector('.js-order');
                    if (orderCell) {
                        orderCell.textContent = index + 1;
                    }
                });

                const ids = rows.map(row => row.dataset.id);

                fetch('{{ route('admin.brands.reorder') }}', {
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
    });
</script>
@endsection

