<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emirates extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function communities()
    {
        return $this->hasMany(Community::class, 'emirates_id');
    }
}
