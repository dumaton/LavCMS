<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::ordered()->get();

        return view('admin.prices.index', compact('prices'));
    }

    public function create()
    {
        $nextSortOrder = (Price::max('sort_order') ?? 0) + 1;

        return view('admin.prices.create', compact('nextSortOrder'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price_text' => ['nullable', 'string', 'max:255'],
            'is_featured' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:1'],
        ]);

        $data['is_featured'] = $request->boolean('is_featured', false);

        $nextSortOrder = (Price::max('sort_order') ?? 0) + 1;
        $data['sort_order'] = (int) ($data['sort_order'] ?? $nextSortOrder);

        $price = Price::create($data);

        if ($request->input('action') === 'apply') {
            return redirect()
                ->route('admin.prices.edit', $price)
                ->with('success', 'Позиция стоимости добавлена.');
        }

        return redirect()
            ->route('admin.prices.index')
            ->with('success', 'Позиция стоимости добавлена.');
    }

    public function edit(Price $price)
    {
        return view('admin.prices.edit', compact('price'));
    }

    public function update(Request $request, Price $price)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price_text' => ['nullable', 'string', 'max:255'],
            'is_featured' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:1'],
        ]);

        $data['is_featured'] = $request->boolean('is_featured', false);
        $data['sort_order'] = (int) ($data['sort_order'] ?? $price->sort_order);

        $price->update($data);

        if ($request->input('action') === 'apply') {
            return redirect()
                ->route('admin.prices.edit', $price)
                ->with('success', 'Позиция стоимости обновлена.');
        }

        return redirect()
            ->route('admin.prices.index')
            ->with('success', 'Позиция стоимости обновлена.');
    }

    public function destroy(Price $price)
    {
        $price->delete();

        return redirect()
            ->route('admin.prices.index')
            ->with('success', 'Позиция стоимости удалена.');
    }

    public function reorder(Request $request)
    {
        $data = $request->validate([
            'order' => ['required', 'array'],
            'order.*' => ['integer', 'exists:prices,id'],
        ]);

        foreach ($data['order'] as $index => $id) {
            Price::whereKey($id)->update(['sort_order' => $index + 1]);
        }

        return response()->json(['status' => 'ok']);
    }
}

