<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $fillable = [
        'id', 'reference_number', 'permit_number', 'price', 'offering_type', 'property_type',
        'latitude', 'longitude', 'property_name',
        'title_en', 'description_en', 'size', 'bedroom', 'bathroom',
        'price_on_application', 'is_featured', 'is_exclusive', 'last_update', 'agent_id',
        'emirate_id', 'community_id', 'sub_community_id', 'off_plan', 'new', 'visit_count'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function photos()
    {
        return $this->hasMany(PropertyPhoto::class);
    }
    public function emirate()
    {
        return $this->belongsTo(Emirates::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function subCommunity()
    {
        return $this->belongsTo(SubCommunity::class);
    }
}
