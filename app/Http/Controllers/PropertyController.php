<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Faq;
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

        $query = Listing::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('emirate', 'LIKE', "%{$search}%")
                  ->orWhere('community', 'LIKE', "%{$search}%")
                  ->orWhere('property_name', 'LIKE', "%{$search}%")
                  ->orWhere('property_title', 'LIKE', "%{$search}%");;
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

        $query->when(request('completion_status'), function ($q) {
            if (request('completion_status') === 'ready') {
                $q->whereIn('completion_status', ['completed_property', 'complete']);
            } else {
                $q->where('completion_status', request('completion_status'));
            }
        });

        $query->when($request->has('emirate') && $request->emirate != '', function ($q) use ($request) {
            $q->where('emirate', $request->emirate);
        });

        $query->when($request->has('type') && $request->type != '', function ($q) use ($request) {
            $q->where('type', $request->type);
        });

        $query->when(request()->has('completion_status') && request('completion_status') !== '', function ($q) {
            $status = request('completion_status');
       
            if ($status === 'off_plan') {
                $q->where('completion_status', 'off_plan');
            } elseif ($status === 'ready') {
                $q->whereIn('completion_status', ['completed_property', 'complete']);
            }
        });

        if ($request->has('furnishing') && !empty($request->furnishing)) {
            $query->where('property_title', 'like', '%' . $request->furnishing . '%');
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

        if ($request->has('amenities') && is_array($request->amenities)) {
            $query->whereHas('facilities', function ($q) use ($request) {
                $q->whereIn('name', $request->amenities);
            });
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

        $completionStatus = Listing::where('completion_status', '!=', '')
            ->distinct()
            ->pluck('completion_status');

        $amenities = Facility::where('name', '!=', '')
            ->distinct()
            ->pluck('name');

        $emirates = Listing::where('emirate', '!=', '')
            ->distinct()
            ->pluck('emirate');

            $min = Listing::whereNotNull('plot_area')->min('plot_area');
            $max = Listing::whereNotNull('plot_area')->max('plot_area');
        
            $minRounded = floor($min / 10000000) * 10000000;
            $maxRounded = ceil($max / 10000000) * 10000000;
        
            $steps = range($minRounded, $maxRounded, 10000000);
        
            $plotAreaRange = [
                'min'   => $minRounded,
                'max'   => $maxRounded,
                'steps' => $steps,
            ];

            $min = Listing::whereNotNull('price')->min('price');
            $max = Listing::whereNotNull('price')->max('price');
        
            $minRounded = floor($min / 10000000) * 10000000;
            $maxRounded = ceil($max / 10000000) * 10000000;
        
            $steps = range($minRounded, $maxRounded, 10000000);
        
            $priceRange = [
                'min'   => $minRounded,
                'max'   => $maxRounded,
                'steps' => $steps,
            ];

        return view('property', compact('properties', 'unitTypesAndModels', 'adTypes', 'propertyTypes', 'search','completionStatus', 'noOfRooms', 'noOfBathrooms', 'request', 'amenities', 'emirates', 'plotAreaRange', 'priceRange'));
    }

    public function show($property_ref_no)
    {
        $property = Listing::with(['images', 'facilities'])
        ->where('property_ref_no', $property_ref_no)
        ->firstOrFail();

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

        $completionStatus = Listing::where('completion_status', '!=', '')
            ->distinct()
            ->pluck('completion_status');

        $amenities = Facility::where('name', '!=', '')
            ->distinct()
            ->pluck('name');

        $faqs = Faq::all();


        $min = Listing::whereNotNull('plot_area')->min('plot_area');
        $max = Listing::whereNotNull('plot_area')->max('plot_area');
    
        $minRounded = floor($min / 10000000) * 10000000;
        $maxRounded = ceil($max / 10000000) * 10000000;
    
        $steps = range($minRounded, $maxRounded, 10000000);
    
        $plotAreaRange = [
            'min'   => $minRounded,
            'max'   => $maxRounded,
            'steps' => $steps,
        ];

        $min = Listing::whereNotNull('price')->min('price');
        $max = Listing::whereNotNull('price')->max('price');
    
        $minRounded = floor($min / 10000000) * 10000000;
        $maxRounded = ceil($max / 10000000) * 10000000;
    
        $steps = range($minRounded, $maxRounded, 10000000);
    
        $priceRange = [
            'min'   => $minRounded,
            'max'   => $maxRounded,
            'steps' => $steps,
        ];

        return view('propertydetails', compact('property', 'unitTypesAndModels', 'adTypes', 'propertyTypes', 'completionStatus', 'noOfRooms', 'noOfBathrooms', 'amenities', 'faqs', 'priceRange', 'plotAreaRange'));
    }
}
