<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffPlanImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'image',
        'type'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
