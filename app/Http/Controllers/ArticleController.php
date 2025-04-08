<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleGallery;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Country;
use App\Models\Emirates;
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
        $emirates = Emirates::all();
        $countries = Country::all();
        $categories = Category::all();
        $existingTags = Tag::all();
        return view('admin.articles.create', compact('emirates', 'countries', 'categories', 'existingTags'));
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
            'category_id' => $request->category_id,
        ]);

        // Handle tags
        if ($request->has('tags')) {
            foreach ($request->tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $article->tags()->attach($tag->id);
            }
        }
    
        // Upload and attach gallery images if provided
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $galleryPath = $image->store('articles/gallery', 'public');
                ArticleGallery::create([
                    'article_id' => $article->id,
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
        $emirates = Emirates::all();
        $countries = Country::all();
        $categories = Category::all();
        $existingTags = Tag::all();
        $article->load('tags'); // Eager load tags
        return view('admin.articles.edit', compact('article', 'emirates', 'countries', 'categories', 'existingTags'));
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
        // Update tags
        if ($request->has('tags')) {
            $article->tags()->detach(); // Remove existing tags
            if (!empty($request->tags)) {
                $tags = json_decode($request->tags);
                if (is_array($tags)) {
                    foreach ($tags as $tagName) {
                        if (!empty($tagName->value)) {
                            $tag = Tag::firstOrCreate(['name' => $tagName->value]);
                            $article->tags()->attach($tag->id);
                        }
                    }
                }
            }
        }

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

    public function userIndex()
    {
        $articleList = Article::with('galleries')->latest()->paginate(10); // Paginate results
        return view('user.articles.index', compact('articleList'));
    }

    public function userShow(Article $article)
    {
        $article->load('galleries');
        return view('user.articles.show', compact('article'));
    }

    public function deleteGalleryImage($id)
    {
        $gallery = ArticleGallery::findOrFail($id);
        // Delete the image file from storage
        if ($gallery->image_path && \Storage::disk('public')->exists($gallery->image_path)) {
            \Storage::disk('public')->delete($gallery->image_path);
        }

        // Delete the gallery record from the database
        $gallery->delete();

        return redirect()->back()->with('success', 'Gallery image deleted successfully!');
    }

    public function indexUser()
    {
        $latestArticles = Article::with(['galleries', 'tags'])->latest()->take(3)->get()->map(function($article) {
            $article->link = route('articles.gallery.show', ['article' => $article->id]);
            return $article;
        });
        
        $categories = Category::withCount('articles')->get();
        $tags = Tag::all();
        
        $articlesList = Article::with(['galleries', 'tags', 'comments' => function($query) {
            return $query->active();
        }])->latest()->withCount('comments')->paginate(10);
        
        return view('article-gallery', compact('articlesList', 'latestArticles', 'categories', 'tags'));
    }

    public function showUser($id)
    {
        $latestArticles = Article::with(['galleries', 'tags'])->latest()->take(3)->get()->map(function($article) {
            $article->link = route('articles.gallery.show', ['article' => $article->id]);
            return $article;
        });
        
        $categories = Category::withCount('articles')->get();
        $tags = Tag::all();

        $article = Article::with(['galleries', 'tags', 'comments' => function($query) {
            return $query->active()->with(['user', 'parent', 'children']);
        }])->findOrFail($id);
        
        $article->comments = Comment::getNestedComments($article->comments);
        $article->comments_count = Comment::getTotalCommentsCount($article->comments);
        
        return view('article-details', compact('article', 'latestArticles', 'categories', 'tags'));
    }
}
