<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $adType = $request->input('ad_type');
        $propertyType = $request->input('property_type');
        $unitType = $request->input('unit_type');
        $price = $request->input('price');

        $query = Listing::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('emirate', 'LIKE', "%{$search}%")
                  ->orWhere('community', 'LIKE', "%{$search}%")
                  ->orWhere('property_name', 'LIKE', "%{$search}%");
            });
        }

        // Filter by ad_type
        if ($adType) {
            $query->where('ad_type', $adType);
        }
    
        // Filter by property_type (unit_type)
        if ($propertyType) {
            $query->where('unit_type', $propertyType);
        }
    
        // Filter by unit_type if specified
        if ($unitType) {
            $query->where('unit_type', $unitType);
        }

        // Filter by price with 5% difference
        if ($price !== null) {
            $price = (float) $price;
            $minPrice = $price - ($price * 0.05); // 5% below
            $maxPrice = $price + ($price * 0.05); // 5% above
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        // Get paginated properties with filters applied
        $properties = $query->with(['images', 'facilities'])->latest()->paginate(10);

        // Get unique unit_type and unit_model
        $unitTypesAndModels = Listing::select('unit_type', 'unit_model')
            ->whereNotNull('unit_type')
            ->whereNotNull('unit_model')
            ->distinct()
            ->get();

        // Get unique ad_types for filter
        $adTypes = Listing::select('ad_type')
            ->whereNotNull('ad_type')
            ->distinct()
            ->pluck('ad_type');

        // Get unique property types (unit_type)
        $propertyTypes = Listing::select('unit_type')
            ->whereNotNull('unit_type')
            ->distinct()
            ->pluck('unit_type');
        dd($properties);
        return view('property', compact('properties', 'unitTypesAndModels', 'adTypes', 'propertyTypes', 'search', 'adType', 'propertyType', 'unitType'));
    }

    public function show($property_ref_no)
    {
        $property = Listing::where('property_ref_no', $property_ref_no)->firstOrFail();

        return view('propertydetails', compact('property'));
    }
}
