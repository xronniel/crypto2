<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayProperty extends Model
{
    use HasFactory;

    protected $table = 'holiday_properties';

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
        'property_name',
        'title_en',
        'description_en',
        'amenities',
        'size',
        'bedroom',
        'bathroom',
        'agent_id',
        'agent_name',
        'agent_email',
        'agent_phone',
        'agent_license',
        'agent_photo',
        'parking',
        'furnished',
        'photos',
        'latitude',
        'longitude',
        'last_update',
        'new',
    ];

    protected $casts = [
        'price_on_application' => 'boolean',
        'furnished' => 'boolean',
        'last_update' => 'datetime',
    ];

    public function photos()
    {
        return $this->hasMany(HolidayPropertyPhoto::class);
    }
}
