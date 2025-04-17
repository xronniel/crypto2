<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPlanCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_plan_name',
        'percentage',
        'text',
        'listing_id',
        'status'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
