<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'offering_type',
        'property_type',
        'price_on_application',
        'price',
        'rental_period',
        'city',
        'community',
        'sub_community',
        'title_en',
        'description_en',
        'amenities',
        'size',
        'bedroom',
        'bathroom',
        'parking',
        'agent_name',
        'agent_email',
        'agent_phone',
        'agent_photo',
    ];

    public function photos()
    {
        return $this->hasMany(HolidayPropertyPhoto::class);
    }
}
