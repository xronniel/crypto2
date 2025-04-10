<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'phone',
        'permit',
        'email',
        'whatsapp',
        'address',
        'nationality',
        'language',
        'experience',
        'BRN',
        'about',
        'position',
        'superagent',
        'company_id',
    ];

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    public function saleListings()
    {
        return $this->hasMany(Listing::class)->where('ad_type', 'sale');
    }

    public function rentListings()
    {
        return $this->hasMany(Listing::class)->where('ad_type', 'rent');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
