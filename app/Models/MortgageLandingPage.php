<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MortgageLandingPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_title',
        'trust_section_title',
        'trust_section_image',
        'step_section_title',
    ];

    public function trustItems()
    {
        return $this->hasMany(TrustItem::class);
    }
}
