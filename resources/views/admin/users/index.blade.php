@extends('layouts.admin')

@section('title', 'Пользователи')
@section('page_title', 'Пользователи')

@section('content')
<div class="mb-4 flex justify-end">
    <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">
        Новый пользователь
    </a>
</div>
<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-stone-50 border-b border-stone-200">
            <tr>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Имя</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Email</th>
                <th class="text-left px-4 py-3 text-sm font-medium text-stone-600">Создан</th>
                <th class="text-right px-4 py-3 text-sm font-medium text-stone-600">Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr class="border-b border-stone-100 hover:bg-stone-50/50">
                    <td class="px-4 py-3">
                        <span class="text-stone-800 font-medium">{{ $user->name }}</span>
                        @if(auth()->id() === $user->id)
                            <span class="ml-2 text-xs text-emerald-600 border border-emerald-200 rounded-full px-2 py-0.5">вы</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-stone-600 text-sm">{{ $user->email }}</td>
                    <td class="px-4 py-3 text-stone-500 text-sm">{{ $user->created_at?->format('d.m.Y H:i') }}</td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.users.edit', $user) }}" class="text-amber-600 hover:text-amber-700 text-sm mr-3">Изменить</a>
                        @if(auth()->id() !== $user->id)
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Удалить пользователя?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700 text-sm">Удалить</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-8 text-center text-stone-500">Пользователей пока нет</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3 border-t border-stone-200">
        {{ $users->links() }}
    </div>
</div>
@endsection

