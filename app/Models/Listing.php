<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Listing extends Model
{
    use HasFactory;


    protected $fillable = [
        'ad_type',
        'unit_type',
        'unit_model',
        'primary_view',
        'unit_builtup_area',
        'no_of_bathroom',
        'property_title',
        'web_remarks',
        'emirate',
        'community',
        'exclusive',
        'cheques',
        'plot_area',
        'property_name',
        'property_ref_no',
        'listing_agent',
        'listing_agent_phone',
        'listing_agent_photo',
        'listing_agent_permit',
        'listing_date',
        'last_updated',
        'bedrooms',
        'listing_agent_email',
        'price',
        'unit_reference_no',
        'no_of_rooms',
        'latitude',
        'longitude',
        'unit_measure',
        'featured',
        'fitted',
        'company_name',
        'web_tour',
        'threesixty_tour',
        'virtual_tour',
        'qr_code',
        'company_logo',
        'parking',
        'preview_link',
        'strno',
        'price_on_application',
        'off_plan',
        'permit_number',
        'completion_status',
        'xml',
        'available_from',
        'description',
        'location',
        'brochure',
        'floor_plan',
        'new',
        'verified',
        'superagent',
        'listing_agent_whatsapp',
        'type',
        'developer_id',
        'district_id',
        'agent_id',
        'community_id',
        'visit_count',
        'fact_sheet',
        'payment_plan',
        'feature_description',
    ];

    protected $appends = ['converted_price', 'currency_code'];

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'listing_facility');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function offPlanImages()
    {
        return $this->hasMany(OffPlanImage::class);
    }

    public function paymentPlanCards()
    {
        return $this->hasMany(PaymentPlanCard::class);
    }

    public function paymentPlanTimelines()
    {
        return $this->hasMany(PaymentPlanTimeline::class);
    }

    public function offPlanKeys()
    {
        return $this->hasMany(OffPlanKey::class);
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function community()
    {
        return $this->belongsTo(Community::class, 'community_id');
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

    public function savedByUsers()
    {
        return $this->morphMany(UserSavedProperty::class, 'propertyable');
    }

    public function contactedByUsers()
    {
        return $this->morphMany(UserContactedProperty::class, 'propertyable');
    }

    public function getConvertedPriceAttribute()
    {
        return $this->getConvertedPrice()['converted_price'];
    }

    public function getCurrencyCodeAttribute()
    {
        return $this->getConvertedPrice()['currency_code'];
    }

}
