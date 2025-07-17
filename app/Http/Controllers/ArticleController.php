<?php

namespace App\Http\Controllers;

use App\Models\Article;  // Pastikan model Article sudah di-import
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
   public function index()
    {
    $articles = Article::with('category', 'likes')->get();

    return view('articles.index', compact('articles'));
    }

   
    public function store(Request $request)
    {
    $request->validate([
    'title' => 'required|string|max:255',
    'content' => 'required',
    'slug' => 'nullable|string|max:255',
    'category_id' => 'required|exists:categories,id',
    'is_publish' => 'nullable|boolean',
]);


    Article::create([
    'title' => $request->title,
    'content' => $request->content,
    'slug' => Str::slug($request->title),
    'category_id' => $request->category_id,
    'is_publish' => $request->has('is_publish'), // TRUE kalau dicentang, FALSE kalau tidak
    'published_at' => $request->has('is_publish') ? now() : null,
]);
    
    return redirect()->route('articles.index')->with('success', 'Artikel berhasil disimpan!');

  
}

    public function create()
    {   
    $categories = Category::all(); // Mengambil semua data kategori
    return view('articles.create', compact('categories'));
    }

    public function edit(Article $article)
    {
    $categories = \App\Models\Category::all();
    return view('articles.edit', compact('article', 'categories'));
    }

    public function like($id)
    {
    $article = Article::findOrFail($id);
    $article->likes()->create();
    return back()->with('success', 'Berhasil menyukai artikel.');
    }

}
