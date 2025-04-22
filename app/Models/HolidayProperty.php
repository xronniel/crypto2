<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

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

    public function holidayPhotos()
    {
        return $this->hasMany(HolidayPropertyPhoto::class);
    }

    public function holidayAmenities()
    {
        return $this->belongsToMany(HolidayPropertyAmenity::class, 'holiday_property_amenity');
    }
    
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function savedByUsers()
    {
        return $this->morphMany(UserSavedProperty::class, 'propertyable');
    }

    public function contactedByUsers()
    {
        return $this->morphMany(UserContactedProperty::class, 'propertyable');
    }

    public function getConvertedPrice()
    {
        // Get the selected currency code from the authenticated user or cookie (default to AED)
        $currencyCode = auth()->user() ? auth()->user()->currency_code : Cookie::get('currency_code', 'AED');  // Default to AED (if you prefer a default)
    
        // Get the selected currency's rate from the `currencies` table
        $currency = Currency::where('code', $currencyCode)->first();
    
        // If the currency is found
        if ($currency) {
            // If the selected currency is crypto
            if ($currency->type == 'crypto') {
                $convertedPrice = $this->price * $currency->rate;
            } else {
                // For fiat or no conversion needed
                $convertedPrice = $this->price;
            }
    
            // Return an array with converted price and selected currency code
            return [
                'converted_price' => $convertedPrice,
                'currency_code' => $currencyCode
            ];
        }
    
        // If currency not found, return the original price and default currency (AED)
        return [
            'converted_price' => $this->price,
            'currency_code' => 'AED' 
        ];
    }

}
