<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'mortgage_landing_page_id',
        'icon',
        'title',
        'description',
    ];

    public function mortgageLandingPage()
    {
        return $this->belongsTo(MortgageLandingPage::class);
    }
}
