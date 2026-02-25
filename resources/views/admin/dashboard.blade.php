@extends('layouts.admin')

@section('title', 'Дашборд')
@section('page_title', 'Дашборд')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-xl border border-stone-200 p-6 shadow-sm">
        <h3 class="text-stone-500 text-sm font-medium">Каталог</h3>
        <p class="text-3xl font-semibold text-stone-800 mt-1">{{ $categoriesCount }} разделов · {{ $productsCount }} товаров</p>
        <div class="mt-3 flex gap-4">
            <a href="{{ route('admin.product-categories.index') }}" class="text-amber-600 hover:text-amber-700 text-sm font-medium">Разделы →</a>
            <a href="{{ route('admin.products.index') }}" class="text-amber-600 hover:text-amber-700 text-sm font-medium">Товары →</a>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-stone-200 p-6 shadow-sm">
        <h3 class="text-stone-500 text-sm font-medium">Обратная связь</h3>
        <p class="text-3xl font-semibold text-stone-800 mt-1">{{ $contactsCount }} сообщений</p>
        @if($contactsUnreadCount > 0)
            <p class="text-sm text-amber-600 mt-1">{{ $contactsUnreadCount }} непрочитанных</p>
        @endif
        <a href="{{ route('admin.contacts.index') }}" class="inline-block mt-3 text-amber-600 hover:text-amber-700 text-sm font-medium">Управление →</a>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl border border-stone-200 p-6 shadow-sm">
        <h3 class="font-medium text-stone-800 mb-3">Разделы каталога</h3>
        @forelse($recentCategories as $item)
            <div class="py-2 border-b border-stone-100 last:border-0">
                <a href="{{ route('admin.product-categories.edit', $item) }}" class="text-stone-700 hover:text-amber-600">{{ Str::limit($item->name, 40) }}</a>
                <p class="text-xs text-stone-400">{{ $item->slug }} · {{ $item->is_active ? 'Активен' : 'Скрыт' }}</p>
            </div>
        @empty
            <p class="text-stone-500 text-sm">Нет разделов</p>
        @endforelse
        <a href="{{ route('admin.product-categories.index') }}" class="inline-block mt-3 text-amber-600 hover:text-amber-700 text-sm font-medium">Все разделы →</a>
    </div>
    <div class="bg-white rounded-xl border border-stone-200 p-6 shadow-sm">
        <h3 class="font-medium text-stone-800 mb-3">Последние сообщения</h3>
        @forelse($recentContacts as $item)
            <div class="py-2 border-b border-stone-100 last:border-0">
                <a href="{{ route('admin.contacts.show', $item) }}" class="text-stone-700 hover:text-amber-600">{{ Str::limit($item->company ?? $item->name, 30) }} — {{ Str::limit($item->phone ?? $item->email, 25) }}</a>
                <p class="text-xs text-stone-400">{{ $item->created_at->format('d.m.Y H:i') }} · {{ $item->read_at ? 'Прочитано' : 'Новое' }}</p>
            </div>
        @empty
            <p class="text-stone-500 text-sm">Нет сообщений</p>
        @endforelse
        <a href="{{ route('admin.contacts.index') }}" class="inline-block mt-3 text-amber-600 hover:text-amber-700 text-sm font-medium">Все сообщения →</a>
    </div>
</div>
@endsection
