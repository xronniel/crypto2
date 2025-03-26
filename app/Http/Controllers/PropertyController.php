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

        $query->when(request('filter_type') == 'rent', function ($q) {
            $q->where('ad_type', 'Rent');
        });
        
        $query->when(request('filter_type') == 'buy', function ($q) {
            $q->where('ad_type', 'Sale');
        });
        
        $query->when(request('filter_type') == 'new_projects', function ($q) {
            $q->where('new', 1);
        });
        
        $query->when(request('filter_type') == 'commercial', function ($q) {
            $q->whereIn('unit_type', [
                'Commercial Full Building',
                'Retail',
                'Warehouse',
                'Labour Camp',
                'Land Commercial',
                'Factory',
                'Land Mixed Use',
                'Commercial Full Floor',
            ]);
        });

        $query->when(request()->has('new') && request('new') == 1, function ($q) {
            $q->where('new', 1);
        });

        // Filter by `commercial` if it's present and equals 1
        $query->when(request()->has('commercial') && request('commercial') == 1, function ($q) {
            $q->whereIn('unit_type', [
                'Commercial Full Building',
                'Retail',
                'Warehouse',
                'Labour Camp',
                'Land Commercial',
                'Factory',
                'Land Mixed Use',
                'Commercial Full Floor',
            ]);
        });

        $query->when(request()->has('no_of_rooms') && request('no_of_rooms') != '', function ($q) {
            $q->where('no_of_rooms', request('no_of_rooms'));
        });
        
        $query->when(request()->has('no_of_bathroom') && request('no_of_rooms') != '', function ($q) {
            $q->where('no_of_bathroom', request('no_of_bathroom'));
        });


        // Filter by `min_area` and `max_area` if present
        $query->when(request()->has('min_area') && request('min_area') != '', function ($q) {
            $q->where('unit_builtup_area', '>=', request('min_area'));
        });

        $query->when(request()->has('max_area') && request('max_area') != '', function ($q) {
            $q->where('unit_builtup_area', '<=', request('max_area'));
        });

        // Filter by `min_price` and `max_price` if present
        $query->when(request()->has('min_price') && request('min_price') != '', function ($q) {
            $q->where('price', '>=', request('min_price'));
        });

        $query->when(request()->has('max_price') && request('max_price') != '', function ($q) {
            $q->where('price', '<=', request('max_price'));
        });

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

     
        $noOfRooms = Listing::where('no_of_rooms', '!=', '')
            ->distinct()
            ->pluck('no_of_rooms');

        $noOfBathrooms = Listing::where('no_of_bathroom', '!=', '')
            ->distinct()
            ->pluck('no_of_bathroom');

        

        return view('property', compact('properties', 'unitTypesAndModels', 'adTypes', 'propertyTypes', 'search', 'adType', 'propertyType', 'unitType'));
    }

    public function show($property_ref_no)
    {
        $property = Listing::with(['images', 'facilities'])
        ->where('property_ref_no', $property_ref_no)
        ->firstOrFail();

        return view('propertydetails', compact('property'));
    }
}
