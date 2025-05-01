<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id', 'url', 'watermark', 'last_update'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

}
