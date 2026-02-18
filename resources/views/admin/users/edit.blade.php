@extends('layouts.admin')

@section('title', 'Редактировать пользователя')
@section('page_title', 'Редактировать пользователя')

@section('content')
<form action="{{ route('admin.users.update', $user) }}" method="POST" class="max-w-xl space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Имя *</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="email" class="block text-sm font-medium text-stone-700 mb-1">Email *</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="password" class="block text-sm font-medium text-stone-700 mb-1">Новый пароль</label>
            <input type="password" name="password" id="password"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
            @error('password')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-stone-400 mt-1">Оставьте пустым, если не нужно менять пароль.</p>
        </div>
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-stone-700 mb-1">Повтор пароля</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
        </div>
    </div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-medium rounded-lg transition">Сохранить</button>
        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 border border-stone-300 rounded-lg hover:bg-stone-50 transition">Отмена</a>
    </div>
</form>
@endsection

