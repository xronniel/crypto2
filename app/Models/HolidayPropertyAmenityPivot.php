<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayPropertyAmenityPivot extends Model
{
    use HasFactory;
    protected $fillable = [
        'holiday_property_id',
        'amenity_id',
    ];
}
