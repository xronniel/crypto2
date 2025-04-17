<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffPlanKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'listing_id',
        'status'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
