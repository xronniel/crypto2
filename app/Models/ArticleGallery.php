<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'image_path',
    ];

    // Inverse relationship with news
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
