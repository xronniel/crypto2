<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'emirates_id'];

    // Relationship with Emirates
    public function emirate()
    {
        return $this->belongsTo(Emirates::class, 'emirates_id');
    }

    // Accessor for Image URL
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('images/default.png');
    }
}
