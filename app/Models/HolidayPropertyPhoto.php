<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayPropertyPhoto extends Model
{
    use HasFactory;


    protected $fillable = [
        'holiday_property_id',
        'url',
    ];

    public function property()
    {
        return $this->belongsTo(HolidayProperty::class);
    }
}
