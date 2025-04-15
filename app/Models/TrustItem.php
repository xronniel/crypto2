<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrustItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'mortgage_landing_page_id',
        'icon',
        'description',
    ];

    public function mortgageLandingPage()
    {
        return $this->belongsTo(MortgageLandingPage::class);
    }
}
