<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $items = MenuItem::ordered()->paginate(10);

        return view('admin.menu.index', compact('items'));
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['boolean'],
            'open_new_tab' => ['boolean'],
        ]);

        $data['sort_order'] = (int) ($data['sort_order'] ?? MenuItem::max('sort_order') + 1);
        $data['is_active'] = $request->boolean('is_active');
        $data['open_new_tab'] = $request->boolean('open_new_tab');

        MenuItem::create($data);

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Пункт меню добавлен.');
    }

    public function edit(MenuItem $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, MenuItem $menu)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['boolean'],
            'open_new_tab' => ['boolean'],
        ]);

        $data['sort_order'] = (int) ($data['sort_order'] ?? $menu->sort_order);
        $data['is_active'] = $request->boolean('is_active');
        $data['open_new_tab'] = $request->boolean('open_new_tab');

        $menu->update($data);

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Пункт меню обновлён.');
    }

    public function destroy(MenuItem $menu)
    {
        $menu->delete();

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Пункт меню удалён.');
    }

    public function reorder(Request $request)
    {
        $data = $request->validate([
            'order' => ['required', 'array'],
            'order.*' => ['integer', 'exists:menu_items,id'],
        ]);

        foreach ($data['order'] as $index => $id) {
            MenuItem::whereKey($id)->update(['sort_order' => $index]);
        }

        return response()->json(['status' => 'ok']);
    }
}
