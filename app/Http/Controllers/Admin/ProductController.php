<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Brand;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->latest()
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::ordered()->get();
        $brands = Brand::orderBy('sort_order')->orderBy('name')->get();

        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_category_id' => ['nullable', 'integer', 'exists:product_categories,id'],
            'brand_id' => ['nullable', 'integer', 'exists:brands,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s\-]+$/'],
            'description' => ['nullable', 'string'],
            'price' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['boolean'],
            'in_stock' => ['boolean'],
            'main_image' => ['nullable', 'image', 'max:4096'],
            'gallery.*' => ['nullable', 'image', 'max:4096'],
        ]);

        $slugFromInput = isset($data['slug']) && $data['slug'] !== '' ? Str::slug(trim($data['slug'])) : '';
        if ($slugFromInput !== '') {
            $slugBase = $slugFromInput;
            $slug = $slugBase;
            $i = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = $slugBase . '-' . $i++;
            }
        } else {
            $slugBase = Str::slug($data['name']);
            $slug = $slugBase;
            $i = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = $slugBase . '-' . $i++;
            }
        }
        $data['slug'] = $slug;
        $data['is_published'] = $request->boolean('is_published');
        $data['in_stock'] = $request->boolean('in_stock', true);

        if (!isset($data['price']) || $data['price'] === null || $data['price'] === '') {
            unset($data['price']);
        }

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('products', 'public');
        }

        $product = Product::create($data);

        if ($request->hasFile('gallery')) {
            $nextSort = (ProductImage::where('product_id', $product->id)->max('sort_order') ?? 0);
            foreach ($request->file('gallery') as $file) {
                $path = $file->store('products/gallery', 'public');
                $nextSort++;
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $path,
                    'sort_order' => $nextSort,
                ]);
            }
        }

        if ($request->input('action') === 'apply') {
            return redirect()
                ->route('admin.products.edit', $product)
                ->with('success', 'Товар создан.');
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Товар создан.');
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::ordered()->get();
        $brands = Brand::orderBy('sort_order')->orderBy('name')->get();
        $product->load('images', 'brand');

        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'product_category_id' => ['nullable', 'integer', 'exists:product_categories,id'],
            'brand_id' => ['nullable', 'integer', 'exists:brands,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s\-]+$/'],
            'description' => ['nullable', 'string'],
            'price' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['boolean'],
            'in_stock' => ['boolean'],
            'main_image' => ['nullable', 'image', 'max:4096'],
            'gallery.*' => ['nullable', 'image', 'max:4096'],
        ]);

        $slugFromInput = isset($data['slug']) && $data['slug'] !== '' ? Str::slug(trim($data['slug'])) : '';
        if ($slugFromInput !== '') {
            $slugBase = $slugFromInput;
            $slug = $slugBase;
            $i = 1;
            while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = $slugBase . '-' . $i++;
            }
            $data['slug'] = $slug;
        } elseif ($data['name'] !== $product->name) {
            $slugBase = Str::slug($data['name']);
            $slug = $slugBase;
            $i = 1;
            while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = $slugBase . '-' . $i++;
            }
            $data['slug'] = $slug;
        }
        $data['is_published'] = $request->boolean('is_published');
        $data['in_stock'] = $request->boolean('in_stock', true);

        if (!isset($data['price']) || $data['price'] === null || $data['price'] === '') {
            unset($data['price']);
        }

        if ($request->hasFile('main_image')) {
            if ($product->main_image) {
                Storage::disk('public')->delete($product->main_image);
            }
            $data['main_image'] = $request->file('main_image')->store('products', 'public');
        }

        $product->update($data);

        if ($request->hasFile('gallery')) {
            $nextSort = (ProductImage::where('product_id', $product->id)->max('sort_order') ?? 0);
            foreach ($request->file('gallery') as $file) {
                $path = $file->store('products/gallery', 'public');
                $nextSort++;
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $path,
                    'sort_order' => $nextSort,
                ]);
            }
        }

        if ($request->input('action') === 'apply') {
            return redirect()
                ->route('admin.products.edit', $product)
                ->with('success', 'Товар обновлён.');
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Товар обновлён.');
    }

    public function destroy(Product $product)
    {
        if ($product->main_image) {
            Storage::disk('public')->delete($product->main_image);
        }

        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->path);
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Товар удалён.');
    }

    public function destroyImage(Product $product, ProductImage $image)
    {
        if ($image->product_id !== $product->id) {
            abort(404);
        }

        if ($image->path) {
            Storage::disk('public')->delete($image->path);
        }

        $image->delete();

        return back()->with('success', 'Фото удалено.');
    }

    public function reorderImages(Request $request, Product $product)
    {
        $data = $request->validate([
            'order' => ['required', 'array'],
            'order.*' => ['integer', 'exists:product_images,id'],
        ]);

        foreach ($data['order'] as $index => $id) {
            ProductImage::where('product_id', $product->id)
                ->whereKey($id)
                ->update(['sort_order' => $index + 1]);
        }

        return response()->json(['status' => 'ok']);
    }
}

