<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request, ?string $categorySlug = null)
    {
        $categories = ProductCategory::orderBy('name')->get();
        $activeCategory = null;

        $query = Product::with(['category'])
            ->where('is_published', true)
            ->latest('created_at');

        if ($categorySlug) {
            $activeCategory = ProductCategory::where('slug', $categorySlug)->firstOrFail();
            $query->where('product_category_id', $activeCategory->id);
        }

        $products = $query->paginate(12)->withQueryString();

        return view('catalog.index', compact('categories', 'products', 'activeCategory'));
    }

    public function show(Product $product)
    {
        if (!$product->is_published) {
            abort(404);
        }

        $product->load(['category', 'images']);

        return view('catalog.show', compact('product'));
    }
}

