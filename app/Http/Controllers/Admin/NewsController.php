<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
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
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        News::create($data);
        return redirect()->route('admin.news.index')->with('success', 'Новость создана.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:2048',
            'body' => 'required|string',
            'is_published' => 'boolean',
        ]);
        $data['slug'] = Str::slug($data['title']);
        $data['published_at'] = $request->boolean('is_published') ? ($news->published_at ?? now()) : null;
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);
        return redirect()->route('admin.news.index')->with('success', 'Новость обновлена.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость удалена.');
    }
}
