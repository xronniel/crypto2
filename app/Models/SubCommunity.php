<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCommunity extends Model
{
    use HasFactory;

    protected $fillable = ['community_id', 'name', 'image'];

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
