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
        $categories = ProductCategory::ordered()->paginate(10);

        return view('admin.product_categories.index', compact('categories'));
    }

    public function create()
    {
        $nextSortOrder = (ProductCategory::max('sort_order') ?? 0) + 1;

        return view('admin.product_categories.create', compact('nextSortOrder'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s\-]+$/'],
            'description' => ['nullable', 'string'],
            'type' => ['nullable', 'string', 'in:equipment,chemistry'],
            'svg_icon' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'show_on_home' => ['boolean'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:1'],
        ]);

        $slugFromInput = isset($data['slug']) && $data['slug'] !== '' ? Str::slug(trim($data['slug'])) : '';
        if ($slugFromInput !== '') {
            $slugBase = $slugFromInput;
            $slug = $slugBase;
            $i = 1;
            while (ProductCategory::where('slug', $slug)->exists()) {
                $slug = $slugBase . '-' . $i++;
            }
        } else {
            $slugBase = Str::slug($data['name']);
            $slug = $slugBase;
            $i = 1;
            while (ProductCategory::where('slug', $slug)->exists()) {
                $slug = $slugBase . '-' . $i++;
            }
        }

        $categoryData = [
            'name' => $data['name'],
            'slug' => $slug,
            'description' => $data['description'] ?? null,
            'type' => $data['type'] ?? null,
            'svg_icon' => $data['svg_icon'] ?? null,
            'show_on_home' => $request->boolean('show_on_home', true),
            'is_active' => $request->boolean('is_active', true),
            'sort_order' => $data['sort_order'] ?? (ProductCategory::max('sort_order') ?? 0) + 1,
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
            'slug' => ['nullable', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s\-]+$/'],
            'description' => ['nullable', 'string'],
            'type' => ['nullable', 'string', 'in:equipment,chemistry'],
            'svg_icon' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'show_on_home' => ['boolean'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:1'],
        ]);

        $slugFromInput = isset($data['slug']) && $data['slug'] !== '' ? Str::slug(trim($data['slug'])) : '';
        if ($slugFromInput !== '') {
            $slugBase = $slugFromInput;
            $slug = $slugBase;
            $i = 1;
            while (ProductCategory::where('slug', $slug)->where('id', '!=', $product_category->id)->exists()) {
                $slug = $slugBase . '-' . $i++;
            }
            $product_category->slug = $slug;
        } elseif ($data['name'] !== $product_category->name) {
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
        $product_category->type = $data['type'] ?? null;
        $product_category->svg_icon = $data['svg_icon'] ?? null;
        $product_category->show_on_home = $request->boolean('show_on_home', true);
        $product_category->is_active = $request->boolean('is_active', true);
        $product_category->sort_order = $data['sort_order'] ?? $product_category->sort_order;

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

    public function reorder(Request $request)
    {
        $data = $request->validate([
            'order' => ['required', 'array'],
            'order.*' => ['integer', 'exists:product_categories,id'],
        ]);

        foreach ($data['order'] as $index => $id) {
            ProductCategory::whereKey($id)->update(['sort_order' => $index + 1]);
        }

        return response()->json(['status' => 'ok']);
    }
}

