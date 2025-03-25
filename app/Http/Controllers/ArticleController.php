<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleGallery;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articleList = Article::with('galleries')->latest()->paginate(10); // Paginate results
        return view('admin.articles.index', compact('articleList'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(ArticleRequest $request)
    {
        // Upload main thumbnail
        $thumbnailPath = $request->file('thumbnail')->store('articles/thumbnails', 'public');
    
        // Upload mobile thumbnail if provided
        $mobileThumbnailPath = $request->file('mobile_thumbnail') ? $request->file('mobile_thumbnail')->store('articles/mobile_thumbnails', 'public') : null;
    

        $article = Article::create([
            'thumbnail' => $thumbnailPath,
            'mobile_thumbnail' => $mobileThumbnailPath,
            'title' => $request->title,
            'state' => $request->state,
            'country' => $request->country,
            'date' => $request->date,
            'time' => $request->time,
            'content' => $request->content,
        ]);
    
        // Upload and attach gallery images if provided
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $galleryPath = $image->store('articles/gallery', 'public');
                ArticleGallery::create([
                    'news_id' => $article->id,
                    'image_path' => $galleryPath,
                ]);
            }
        }
    
        return redirect()->route('admin.articles.index')->with('success', 'Article added successfully!');
    }

    public function show(Article $article)
    {
        $article->load('galleries');
        return view('admin.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $article->load('galleries');
        return view('admin.articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, Article $article)
    {

        // Update thumbnails if provided
        if ($request->hasFile('thumbnail')) {
            $article->thumbnail = $request->file('thumbnail')->store('articles/thumbnails', 'public');
        }
        if ($request->hasFile('mobile_thumbnail')) {
            $article->mobile_thumbnail = $request->file('mobile_thumbnail')->store('articles/mobile_thumbnails', 'public');
        }
    
        // Update news fields
        $article->update($request->validated());
    
        // Upload and attach new gallery images if provided
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $galleryPath = $image->store('articles/gallery', 'public');
                ArticleGallery::create([
                    'article_id' => $article->id,
                    'image_path' => $galleryPath,
                ]);
            }
        }
    
        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully!');
    }

    public function destroy(Article $article)
    {
        $article->galleries()->delete(); 
        $article->delete(); 

        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully!');
    }
}
