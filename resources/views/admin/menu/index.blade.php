@extends('layouts.admin')

@section('title', 'Меню сайта')
@section('page_title', 'Меню сайта')

@section('content')
<div class="mb-4 flex justify-end">
    <a href="{{ route('admin.menu.create') }}" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">
        Добавить пункт
    </a>
</div>
<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-stone-50 border-b border-stone-200">
            <tr>
                <th class="w-10 px-3 py-3 text-left text-sm font-medium text-stone-600"></th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Название</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Ссылка</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Порядок</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Статус</th>
                <th class="text-right px-4 py-3 text-sm font-medium text-stone-600">Действия</th>
            </tr>
        </thead>
        <tbody id="menu-sortable">
            @forelse($items as $item)
                <tr class="border-b border-stone-100 hover:bg-stone-50/50" data-id="{{ $item->id }}">
                    <td class="px-3 py-3 text-stone-400 cursor-move js-handle text-center align-middle">
                        &#8942;
                    </td>
                    <td class="px-4 py-3 font-medium text-stone-800">
                        <a href="{{ route('admin.menu.edit', $item) }}" class="text-stone-800 hover:text-amber-600 font-medium">{{ $item->title }}</a>
                    </td>
                    <td class="px-4 py-3 text-stone-600 text-sm max-w-xs truncate" title="{{ $item->url }}">{{ $item->url }}</td>
                    <td class="px-4 py-3 text-sm text-stone-600 js-order">
                        {{ $item->sort_order }}
                    </td>
                    <td class="px-4 py-3">
                        @if($item->is_active)
                            <span class="text-emerald-600 text-sm">Вкл</span>
                        @else
                            <span class="text-stone-400 text-sm">Выкл</span>
                        @endif
                        @if($item->open_new_tab)
                            <span class="text-stone-400 text-xs ml-1" title="Открывать в новой вкладке">↗</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.menu.edit', $item) }}" class="text-amber-600 hover:text-amber-700 text-sm mr-3">Изменить</a>
                        <form action="{{ route('admin.menu.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Удалить пункт меню?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700 text-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-8 text-center text-stone-500">Пунктов меню пока нет. Добавьте первый.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3 border-t border-stone-200">
        {{ $items->links() }}
    </div>
</div>

<script src="{{ asset('js/sortable.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tbody = document.getElementById('menu-sortable');
        if (!tbody) return;

        const sortable = new Sortable(tbody, {
            handle: '.js-handle',
            animation: 150,
            onEnd: () => {
                const rows = Array.from(tbody.querySelectorAll('tr[data-id]'));

                rows.forEach((row, index) => {
                    const orderCell = row.querySelector('.js-order');
                    if (orderCell) {
                        orderCell.textContent = index;
                    }
                });

                const ids = rows.map(row => row.dataset.id);

                fetch('{{ route('admin.menu.reorder') }}', {
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
