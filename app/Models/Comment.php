<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Collection;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'commentable_id',
        'commentable_type',
        'parent_id',
        'content',
        'is_active'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope to get active comments
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope to get comments with their children
    public function scopeWithChildren($query)
    {
        return $query->with(['children' => function($query) {
            return $query->withChildren();
        }]);
    }

    /**
     * Get comments organized in a nested structure
     *
     * @param \Illuminate\Support\Collection $comments
     * @return \Illuminate\Support\Collection
     */
    public static function getNestedComments($comments)
    {
        $nestedComments = collect();
        foreach ($comments as $comment) {
            if (!$comment->parent_id) {
                $nestedComments->push($comment);
            }
        }

        $nestedComments->each(function($comment) use ($comments) {
            $comment->replies = self::getReplies($comment->id, $comments);
        });

        return $nestedComments;
    }

    /**
     * Get replies for a specific comment
     *
     * @param int $parentId
     * @param \Illuminate\Support\Collection $comments
     * @return \Illuminate\Support\Collection
     */
    private static function getReplies($parentId, $comments)
    {
        $replies = collect();
        foreach ($comments as $comment) {
            if ($comment->parent_id == $parentId) {
                $replies->push($comment);
                $comment->replies = self::getReplies($comment->id, $comments);
            }
        }
        return $replies;
    }

    /**
     * Get the count of top-level comments
     *
     * @param \Illuminate\Support\Collection $comments
     * @return int
     */
    public static function getTopLevelCommentsCount($comments)
    {
        return $comments->filter(function($comment) {
            return !$comment->parent_id;
        })->count();
    }

    /**
     * Get the total count of all comments including replies
     *
     * @param \Illuminate\Support\Collection $comments
     * @return int
     */
    public static function getTotalCommentsCount($comments)
    {
        $total = $comments->count();
        
        foreach ($comments as $comment) {
            if (isset($comment->replies)) {
                $total += self::getTotalCommentsCount($comment->replies);
            }
        }
        
        return $total;
    }
}
