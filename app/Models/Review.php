<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'country_name',
        'country_image',
        'reviewer_details',
        'review',
        'active',
        'reviewer_name',
    ];
}
