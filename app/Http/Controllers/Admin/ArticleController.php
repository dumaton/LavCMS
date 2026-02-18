<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:2048',
            'body' => 'required|string',
            'is_published' => 'boolean',
        ]);
        $data['slug'] = Str::slug($data['title']);
        $data['published_at'] = $request->boolean('is_published') ? now() : null;
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        Article::create($data);
        return redirect()->route('admin.articles.index')->with('success', 'Статья создана.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:2048',
            'body' => 'required|string',
            'is_published' => 'boolean',
        ]);
        $data['slug'] = Str::slug($data['title']);
        $data['published_at'] = $request->boolean('is_published') ? ($article->published_at ?? now()) : null;
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);
        return redirect()->route('admin.articles.index')->with('success', 'Статья обновлена.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Статья удалена.');
    }
}
