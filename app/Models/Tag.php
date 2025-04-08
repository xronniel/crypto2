<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use App\Models\Article;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_tags');
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tags');
    }
}
