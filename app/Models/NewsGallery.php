<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_id',
        'image_path',
    ];

    // Inverse relationship with news
    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
