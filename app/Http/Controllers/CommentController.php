<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of comments
     * 
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $typeMap = [
            'news' => 'App\\Models\\News',
            'article' => 'App\\Models\\Article'
        ];
        
        $newsItems = [];
        $articleItems = [];
        
        if (class_exists('App\\Models\\News')) {
            $newsItems = \App\Models\News::orderBy('title')->get(['id', 'title']);
        }
        
        if (class_exists('App\\Models\\Article')) {
            $articleItems = \App\Models\Article::orderBy('title')->get(['id', 'title']);
        }
        
        $loadNestedReplies = function ($query) use (&$loadNestedReplies) {
            $query->with(['commentable', 'children' => $loadNestedReplies])->orderBy('created_at', 'desc');
        };
        
        $query = Comment::with([
            'commentable',
            'children' => $loadNestedReplies
        ]);
        
        if ($request->filled('type') && $request->type != '') {
            $type = strtolower($request->type);
            
            if (isset($typeMap[$type])) {
                $query->where('commentable_type', $typeMap[$type]);
                
                if ($request->filled('content_id') && $request->content_id != '') {
                    $query->where('commentable_id', $request->content_id);
                }
            }
        }
        

        $query->whereNull('parent_id');

        $query->orderBy('created_at', 'desc');
        
        $comments = $query->paginate(15);
        
        return view('admin.comments.index', compact('comments', 'newsItems', 'articleItems'));
    }
    
    /**
     * Show the form for editing a comment
     * 
     * @param Comment $comment
     * @return \Illuminate\View\View
     */
    public function edit(Comment $comment)
    {
        $comment->load('commentable');
        return view('admin.comments.edit', compact('comment'));
    }
    
    /**
     * Update the specified comment
     * 
     * @param Request $request
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
            'name' => 'sometimes|string|max:255'
        ]);
        
        $validated['is_active'] = $request->has('is_active');
        
        $comment->update($validated);
        
        return redirect()->route('admin.comments.index')
            ->with('success', 'Comment updated successfully');
    }
    
    /**
     * Remove the specified comment
     * 
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        
        return redirect()->route('admin.comments.index')
            ->with('success', 'Comment deleted successfully');
    }
    
    /**
     * Display the specified comment
     * 
     * @param Comment $comment
     * @return \Illuminate\View\View
     */
    public function show(Comment $comment)
    {
        $comment->load(['commentable', 'parent', 'children']);
        return view('admin.comments.show', compact('comment'));
    }
}
