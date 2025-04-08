<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a new comment or reply to an existing comment
     *
     * @param CommentRequest $request
     * @return JsonResponse
     */
    public function store(CommentRequest $request): JsonResponse
    {
        $validated = $request->validated();
        
        // Get the commentable model (News or Article)
        $commentable = $validated['commentable_type']::findOrFail($validated['commentable_id']);
        
        // Create the comment
        $comment = new Comment([
            'content' => $validated['content'],
            'parent_id' => $validated['parent_id'] ?? null,
            'user_id' => auth()->id()
        ]);
        
        // Attach the comment to the commentable model
        $commentable->comments()->save($comment);
        
        // Load relationships for the response
        $comment->load(['user', 'parent', 'children']);
        
        return response()->json([
            'success' => true,
            'data' => $comment
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update a comment's status (activate/deactivate)
     *
     * @param Request $request
     * @param Comment $comment
     * @return JsonResponse
     */
    public function updateStatus(Request $request, Comment $comment): JsonResponse
    {
        $this->authorize('update', $comment);

        $comment->update([
            'is_active' => $request->boolean('is_active')
        ]);

        return response()->json([
            'success' => true,
            'data' => $comment->load(['user', 'parent', 'children'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Delete a comment
     *
     * @param Comment $comment
     * @return JsonResponse
     */
    public function destroy(Comment $comment): JsonResponse
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comment deleted successfully'
        ]);
    }
}
