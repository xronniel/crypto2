<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\NewsGallery;
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
        return view('admin.news.create');
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
        ]);
    
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
        $news->load('galleries');
        return view('admin.news.edit', compact('news'));
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
}
