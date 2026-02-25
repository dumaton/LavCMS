<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::orderBy('name')->paginate(10);

        return view('admin.product_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.product_categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);

        $slugBase = Str::slug($data['name']);
        $slug = $slugBase;
        $i = 1;
        while (ProductCategory::where('slug', $slug)->exists()) {
            $slug = $slugBase . '-' . $i++;
        }

        $categoryData = [
            'name' => $data['name'],
            'slug' => $slug,
            'description' => $data['description'] ?? null,
        ];

        if ($request->hasFile('image')) {
            $categoryData['image'] = $request->file('image')->store('product-categories', 'public');
        }

        ProductCategory::create($categoryData);

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Раздел добавлен.');
    }

    public function edit(ProductCategory $product_category)
    {
        return view('admin.product_categories.edit', [
            'category' => $product_category,
        ]);
    }

    public function update(Request $request, ProductCategory $product_category)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);

        if ($data['name'] !== $product_category->name) {
            $slugBase = Str::slug($data['name']);
            $slug = $slugBase;
            $i = 1;
            while (ProductCategory::where('slug', $slug)->where('id', '!=', $product_category->id)->exists()) {
                $slug = $slugBase . '-' . $i++;
            }
            $product_category->slug = $slug;
        }

        $product_category->name = $data['name'];
        $product_category->description = $data['description'] ?? null;

        if ($request->hasFile('image')) {
            if ($product_category->image) {
                Storage::disk('public')->delete($product_category->image);
            }
            $product_category->image = $request->file('image')->store('product-categories', 'public');
        }

        $product_category->save();

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Раздел обновлён.');
    }

    public function destroy(ProductCategory $product_category)
    {
        if ($product_category->products()->exists()) {
            return redirect()
                ->route('admin.product-categories.index')
                ->with('success', 'Нельзя удалить раздел, к которому привязаны товары.');
        }

        if ($product_category->image) {
            Storage::disk('public')->delete($product_category->image);
        }

        $product_category->delete();

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Раздел удалён.');
    }
}

