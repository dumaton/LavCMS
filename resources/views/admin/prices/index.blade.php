@extends('layouts.admin')

@section('title', 'Стоимость')
@section('page_title', 'Стоимость')

@section('content')
<div class="mb-4 flex justify-end">
    <a href="{{ route('admin.prices.create') }}" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">
        Добавить позицию
    </a>
</div>
<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-stone-50 border-b border-stone-200">
            <tr>
                <th class="w-10 px-3 py-3 text-left text-sm font-medium text-stone-600"></th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Название</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Описание</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Цена (текст)</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Выделение</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Порядок</th>
                <th class="text-right px-4 py-3 text-sm font-medium text-stone-600">Действия</th>
            </tr>
        </thead>
        <tbody id="prices-sortable">
        @forelse($prices as $price)
            <tr class="border-b border-stone-100 hover:bg-stone-50/50" data-id="{{ $price->id }}">
                <td class="px-3 py-3 text-stone-400 cursor-move js-handle text-center align-middle">
                    &#8942;
                </td>
                <td class="px-4 py-3 font-medium text-stone-800">
                    <a href="{{ route('admin.prices.edit', $price) }}" class="text-stone-800 hover:text-amber-600 font-medium">
                        {{ $price->name }}
                    </a>
                </td>
                <td class="px-4 py-3 text-stone-600 text-sm max-w-xs truncate" title="{{ $price->description }}">
                    {{ $price->description }}
                </td>
                <td class="px-4 py-3 text-stone-800 text-sm">
                    {{ $price->price_text }}
                </td>
                <td class="px-4 py-3 text-sm">
                    @if($price->is_featured)
                        <span class="inline-flex items-center rounded-full bg-amber-100 px-2.5 py-0.5 text-xs font-medium text-amber-900">
                            Да
                        </span>
                    @else
                        <span class="text-xs text-stone-400">Нет</span>
                    @endif
                </td>
                <td class="px-4 py-3 text-sm text-stone-600 js-order">
                    {{ $price->sort_order }}
                </td>
                <td class="px-4 py-3 text-right">
                    <a href="{{ route('admin.prices.edit', $price) }}" class="text-amber-600 hover:text-amber-700 text-sm mr-3">Изменить</a>
                    <form action="{{ route('admin.prices.destroy', $price) }}" method="POST" class="inline" onsubmit="return confirm('Удалить позицию?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-700 text-sm">Удалить</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="px-4 py-8 text-center text-stone-500">Пока нет ни одной позиции стоимости.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<script src="{{ asset('js/sortable.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tbody = document.getElementById('prices-sortable');
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

                fetch('{{ route('admin.prices.reorder') }}', {
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

