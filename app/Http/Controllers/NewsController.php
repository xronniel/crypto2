<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Country;
use App\Models\Emirates;
use App\Models\News;
use App\Models\NewsGallery;
use App\Models\Tag;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $newsList = News::with('galleries')->latest()->paginate(10); // Paginate results
        return view('admin.news.index', compact('newsList'));
    }

    public function create()
    {
        $emirates = Emirates::all();
        $countries = Country::all();
        $categories = Category::all();
        $existingTags = Tag::all();
        return view('admin.news.create', compact('emirates', 'countries', 'categories', 'existingTags'));
    }

    public function store(NewsRequest $request)
    {
        // Upload main thumbnail
        $thumbnailPath = $request->file('thumbnail')->store('news/thumbnails', 'public');
    
        // Upload mobile thumbnail if provided
        $mobileThumbnailPath = $request->file('mobile_thumbnail') ? $request->file('mobile_thumbnail')->store('news/mobile_thumbnails', 'public') : null;
    
        // Create the news entry
        $news = News::create([
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
            $news->tags()->detach(); // Remove existing tags
            if (!empty($request->tags)) {
                $tags = json_decode($request->tags);
                if (is_array($tags)) {
                    foreach ($tags as $tagName) {
                        if (!empty($tagName->value)) {
                            $tag = Tag::firstOrCreate(['name' => $tagName->value]);
                            $news->tags()->attach($tag->id);
                        }
                    }
                }
            }
        }
    
        // Upload and attach gallery images if provided
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $galleryPath = $image->store('news/gallery', 'public');
                NewsGallery::create([
                    'news_id' => $news->id,
                    'image_path' => $galleryPath,
                ]);
            }
        }
    
        return redirect()->route('admin.news.index')->with('success', 'News added successfully!');
    }

    public function show(News $news)
    {
        $news->load('galleries');
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        $emirates = Emirates::all();
        $countries = Country::all();
        $categories = Category::all();
        $existingTags = Tag::all();
        $news->load('tags'); // Eager load tags
        return view('admin.news.edit', compact('news', 'emirates', 'countries', 'categories', 'existingTags'));
    }

    public function update(NewsRequest $request, News $news)
    {

        // Update thumbnails if provided
        if ($request->hasFile('thumbnail')) {
            $news->thumbnail = $request->file('thumbnail')->store('news/thumbnails', 'public');
        }
        if ($request->hasFile('mobile_thumbnail')) {
            $news->mobile_thumbnail = $request->file('mobile_thumbnail')->store('news/mobile_thumbnails', 'public');
        }
    
        // Update news fields
        // Update tags
        if ($request->has('tags')) {
            $news->tags()->detach(); // Remove existing tags
            if (!empty($request->tags)) {
                $tags = json_decode($request->tags);
                if (is_array($tags)) {
                    foreach ($tags as $tagName) {
                        if (!empty($tagName->value)) {
                            $tag = Tag::firstOrCreate(['name' => $tagName->value]);
                            $news->tags()->attach($tag->id);
                        }
                    }
                }
            }
        }

        $news->update($request->validated());
    
        // Upload and attach new gallery images if provided
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $galleryPath = $image->store('news/gallery', 'public');
                NewsGallery::create([
                    'news_id' => $news->id,
                    'image_path' => $galleryPath,
                ]);
            }
        }
    
        return redirect()->route('admin.news.index')->with('success', 'News updated successfully!');
    }
    
    public function destroy(News $news)
    {
        $news->galleries()->delete(); 
        $news->delete(); 

        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully!');
    }

    public function userIndex()
    {
        $newsList = News::with('galleries')->latest()->paginate(10); // Paginate results
        return view('user.news.index', compact('newsList'));
    }

    // Display a single news article for users
    public function userShow(News $news)
    {
        $news->load('galleries');
        return view('user.news.show', compact('news'));
    }

    public function deleteGalleryImage($id)
    {
        $gallery = NewsGallery::findOrFail($id);

        // Delete the image file from storage
        if ($gallery->image_path && \Storage::disk('public')->exists($gallery->image_path)) {
            \Storage::disk('public')->delete($gallery->image_path);
        }

        // Delete the gallery record from the database
        $gallery->delete();

        return redirect()->back()->with('success', 'Gallery image deleted successfully!');
    }

    public function indexUser(Request $request)
    {
        $latestNews = News::with(['galleries', 'tags'])->latest()->take(3)->get()->map(function($news) {
            $news->link = route('news.gallery.show', ['news' => $news->id]);
            return $news;
        });
        
        $categories = Category::withCount('news')->get();
        $tags = Tag::all();
        
        $query = News::query();
        
        if ($request->has('q')) {
            $search = $request->input('q');
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%");
            });
        }
        
        if ($request->has('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }
        
        if ($request->has('tag_id')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('tags.id', $request->input('tag_id'));
            });
        }
        
        $newsList = $query->with(['galleries', 'tags', 'comments' => function($query) {
            return $query->active();
        }])->latest()->withCount('comments')->paginate(10);
        
        return view('news-gallery', compact('newsList', 'latestNews', 'categories', 'tags'));
    }

    public function showUser($id)
    {
        $latestNews = News::with(['galleries', 'tags'])->latest()->take(3)->get()->map(function($news) {
            $news->link = route('news.gallery.show', ['news' => $news->id]);
            return $news;
        });
        
        $categories = Category::withCount('news')->get();
        $tags = Tag::all();

        $news = News::with(['galleries', 'tags', 'comments' => function($query) {
            return $query->active()->with(['parent', 'children']);
        }])->findOrFail($id);
        
        $news->comments = Comment::getNestedComments($news->comments);
        $news->comments_count = Comment::getTotalCommentsCount($news->comments);

        return view('news-details', compact('news', 'latestNews', 'categories', 'tags'));
    }
}
