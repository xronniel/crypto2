<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPlanTimeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'listing_id',
        'status'
    ];

    protected $casts = [
        'date' => 'date'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
