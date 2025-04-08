<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $casts = [
        'date' => 'date', // Cast date to Carbon instance
    ];
    

    protected $fillable = [
        'thumbnail',
        'mobile_thumbnail',
        'title',
        'state',
        'country',
        'date',
        'time',
        'content',
        'category_id'
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->active();
    }

    // Relationship with gallery images
    public function galleries()
    {
        return $this->hasMany(ArticleGallery::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags');
    }
}
