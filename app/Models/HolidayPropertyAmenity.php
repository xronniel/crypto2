<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayPropertyAmenity extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'image',
    ];

    public function holidayProperties()
    {
        return $this->belongsToMany(HolidayProperty::class, 'holiday_property_amenity', 'amenity_id', 'holiday_property_id');
    }
}
