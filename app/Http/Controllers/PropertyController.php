<?php

namespace App\Http\Controllers;

use App\Models\Emirates;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\Listing;
use App\Models\Property;
use App\Models\UserSavedProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $adType = $request->input('ad_type');
        $propertyType = $request->input('property_type');
        $unitType = $request->input('unit_type');
        $sortBy = $request->input('sort_by');

        $query = Listing::query();

        $emirates = Listing::where('emirate', '!=', '')
        ->distinct()
        ->pluck('emirate');

        if (!$request->filled('emirate')) {
            return redirect()->route('properties.index', array_merge(
                ['emirate' => $emirates->first()], // Add emirate if not filled
                $request->except('page') // Include all other query parameters except 'page'
            ));
        }

        $selectedEmirate = $request->filled('emirate') ? $request->emirate : $emirates->first();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('unit_type', 'LIKE', "%{$search}%")
                  ->orWhere('community', 'LIKE', "%{$search}%")
                  ->orWhere('property_name', 'LIKE', "%{$search}%")
                  ->orWhere('property_title', 'LIKE', "%{$search}%");
            });
        }

        // Apply the sort_by functionality
        if ($sortBy) {
            switch ($sortBy) {
                case 'featured':
                    // Filter listings where featured is 1
                    $query->where('featured', 1);
                    break;
                case 'from_lowest_price':
                    // Sort listings by price in ascending order (lowest to highest)
                    $query->orderBy('price', 'asc');
                    break;
                case 'from_highest_price':
                    // Sort listings by price in descending order (highest to lowest)
                    $query->orderBy('price', 'desc');
                    break;
                case 'newest':
                    // Sort listings by listing_date in descending order (newest first)
                    $query->orderBy('listing_date', 'desc');
                    break;
                default:
                    $query->latest();
                    break;
            }
        }

        $query->when(request('filter_type') == 'rent', function ($q) {
            $q->where('ad_type', 'Rent');
        });
        
        $query->when(request('filter_type') == 'buy', function ($q) {
            $q->where('ad_type', 'Sale');
        });
        
        $query->when(request('filter_type') == 'new_projects', function ($q) {
            $q->where('off_plan', 1);
        });
        
        $query->when(request('filter_type') == 'commercial', function ($q) {
            $q->where('type', 'Commercial');
        });

        $query->when(request()->has('new') && request('new') == 1, function ($q) {
            $q->where('new', 1);
        });

        // Filter by `commercial` if it's present and equals 1
        $query->when(request()->has('commercial') && request('commercial') == 1, function ($q) {
            $q->where('type', 'Commercial');
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

        $query->when(request()->filled('completion_status'), function ($q) {
            $status = request('completion_status');
        
            match ($status) {
                'off_plan' => $q->where('off_plan', 1),
                'ready'    => $q->whereIn('completion_status', ['completed_property', 'complete']),
                default    => null,
            };
        });

        $query->when($selectedEmirate, function ($q) use ($selectedEmirate) {
            $q->where('emirate', $selectedEmirate);
        });

        $query->when($request->has('type') && $request->type != '', function ($q) use ($request) {
            $q->where('type', $request->type);
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
        $properties = $query->with(['images', 'facilities'])->latest()->paginate(10)->appends(request()->query());

            // Add `favorite` boolean to each property
        $user = Auth::user();
        if ($user) {
            $savedProperties = UserSavedProperty::where('user_id', $user->id)
                ->where('propertyable_type', Listing::class)
                ->pluck('propertyable_id')
                ->toArray();

            $properties->getCollection()->transform(function ($property) use ($savedProperties) {
                $property->favorite = in_array($property->id, $savedProperties);
                return $property;
            });
        }

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

            $topListings = DB::table('listings')
                ->select('community', 'property_title', 'ad_type', 'unit_type')
                ->orderByDesc('visit_count')
                ->limit(10)
                ->get();

            $recentSearches = [
                'community' => $topListings->map(fn($item) => [
                    'name' => $item->community,
                    'ad_type' => $item->ad_type,
                ])->unique()->values()->all(),

                'property_title' => collect($topListings)
                ->flatMap(function ($item) {
                    $titles = preg_split('/\s*[|\/]\s*/', $item->property_title);
                    return collect($titles)->map(fn($title) => [
                        'title' => trim($title),
                        'ad_type' => $item->ad_type,
                    ]);
                })
                ->unique(fn($item) => $item['title']) // optional: remove duplicate titles
                ->values()
                ->all(),

                'unit_type' => $topListings->map(fn($item) => [
                    'name' => $item->unit_type,
                    'ad_type' => $item->ad_type,
                ])->unique()->values()->all(),
            ];

            $emirateCounts = Listing::select('emirate', DB::raw('COUNT(*) as count'))
            ->where('off_plan', 1)
            ->groupBy('emirate')
            ->orderByDesc('count')
            ->get()
            ->map(function ($item) {
                return [
                    'emirate' => $item->emirate,
                    'count' => $item->count,
                ];
            });

        return view('property', compact('properties', 'unitTypesAndModels', 'adTypes', 'propertyTypes', 'search','completionStatus', 'noOfRooms', 'noOfBathrooms', 'request', 'amenities', 'emirates', 'plotAreaRange', 'priceRange', 'recentSearches', 'request', 'emirateCounts'));
    }

    public function newIndex(Request $request)
    {
        // dd($request->all());    
        $query = Property::with(['photos', 'agent']);

        $offeringType = $request->input('offering_type');
        $propertyType = $request->input('property_type');
        $type = $request->input('type');
        $propertyStatus = $request->input('property_status');
        $sortBy = $request->input('sort_by');

        if ($offeringType === 'rent' && $type === 'commercial') {
            $query->where('offering_type', 'CR');
        } elseif ($offeringType === 'rent' && !$type) {
            $query->where('offering_type', 'RR');
        } elseif ($offeringType === 'sale' && $type === 'commercial') {
            $query->where('offering_type', 'CS');
        } elseif ($offeringType === 'sale' && !$type) {
            $query->where('offering_type', 'RS');
        } elseif ($offeringType) {
            $query->where('offering_type', $offeringType);
        }

        if ($propertyType) {
            $query->where('property_type', $propertyType);
        }

        if ($propertyStatus === 'off_plan') {
            $query->where('off_plan', true);
        } elseif ($propertyStatus === 'ready') {
            $query->where('is_ready', true);
        }

        // Apply the sort_by functionality
        if ($sortBy) {
            switch ($sortBy) {
                case 'featured':
                    // Filter listings where featured is 1
                    $query->where('featured', 1);
                    break;
                case 'from_lowest_price':
                    // Sort listings by price in ascending order (lowest to highest)
                    $query->orderBy('price', 'asc');
                    break;
                case 'from_highest_price':
                    // Sort listings by price in descending order (highest to lowest)
                    $query->orderBy('price', 'desc');
                    break;
                case 'newest':
                    // Sort listings by listing_date in descending order (newest first)
                    $query->orderBy('listing_date', 'desc');
                    break;
                default:
                    $query->latest();
                    break;
            }
        }

        if ($request->filled('search')) {
            $keywords = explode(' ', $request->search);
            $query->where(function ($q) use ($keywords) {
                foreach ($keywords as $word) {
                    $q->orWhere('property_name', 'LIKE', "%{$word}%")
                      ->orWhere('title_en', 'LIKE', "%{$word}%")
                      ->orWhere('description_en', 'LIKE', "%{$word}%");
                }
            });
        }

        // Filter by `min_price` and `max_price` if present
        $query->when(request()->has('min_price') && request('min_price') != '', function ($q) {
            $q->where('price', '>=', request('min_price'));
        });

        $query->when(request()->has('max_price') && request('max_price') != '', function ($q) {
            $q->where('price', '<=', request('max_price'));
        });

        // Filter by `min_area` and `max_area` if present
        $query->when(request()->has('min_area') && request('min_area') != '', function ($q) {
            $q->where('unit_builtup_area', '>=', request('min_area'));
        });

        $query->when(request()->has('max_area') && request('max_area') != '', function ($q) {
            $q->where('unit_builtup_area', '<=', request('max_area'));
        });

        $sortBy = $request->input('sort_by');
        $query->when(request()->has('no_of_rooms') && request('no_of_rooms') != '', function ($q) {
            $q->where('beddroom', request('no_of_rooms'));
        });
        
        $query->when(request()->has('no_of_bathroom') && request('no_of_rooms') != '', function ($q) {
            $q->where('bathroom', request('no_of_bathroom'));
        });

        $minPrice = Property::whereNotNull('price')->min('price');
        $maxPrice = Property::whereNotNull('price')->max('price');
    
        $minRounded = floor($minPrice / 10000000) * 10000000;
        $maxRounded = ceil($maxPrice / 10000000) * 10000000;
    
        $steps = range($minRounded, $maxRounded, 10000000);
    
        $priceRange = [
            'min'   => $minRounded,
            'max'   => $maxRounded,
            'steps' => $steps,
        ];

        $minArea = Property::whereNotNull('size')->min('size');
        $maxArea = Property::whereNotNull('size')->max('size');
    
        $minRounded = floor($minArea / 10000000) * 10000000;
        $maxRounded = ceil($maxRounded / 10000000) * 10000000;
    
        $steps = range($minRounded, $maxRounded, 10000000);
    
        $plotAreaRange = [
            'min'   => $minRounded,
            'max'   => $maxRounded,
            'steps' => $steps,
        ];

        $topListings = DB::table('properties')
            ->select('emirate_id', 'title_en', 'offering_type', 'property_type')
            ->orderByDesc('visit_count')
            ->limit(10)
            ->get();

            $recentSearches = [
                'community' => $topListings->map(fn($item) => [
                    'name' => Emirates::find($item->emirate_id)->name ?? 'Unknown',
                    'ad_type' => $item->offering_type,
                ])->unique()->values()->all(),

                'property_title' => collect($topListings)
                ->flatMap(function ($item) {
                    $titles = preg_split('/\s*[|\/]\s*/', $item->title_en);
                    return collect($titles)->map(fn($title) => [
                        'title' => trim($title),
                        'ad_type' => $item->offering_type,
                    ]);
                })
                ->unique(fn($item) => $item['title']) // optional: remove duplicate titles
                ->values()
                ->all(),

                'unit_type' => $topListings->map(fn($item) => [
                    'name' => $item->property_type,
                    'ad_type' => $item->offering_type,
                ])->unique()->values()->all(),

            ];

        $emirates = Emirates::pluck('name');

        $properties = $query->paginate(10);
  
        // Add `favorite` boolean to each property
        return view('new-properties', compact('properties', 'offeringType', 'propertyType', 'type', 'propertyStatus', 'sortBy', 'request', 'priceRange', 'plotAreaRange', 'recentSearches', 'emirates'));
    
    }

    public function show($property_ref_no)
    {
        $property = Listing::with(['images', 'facilities', 'offPlanKeys', 'offPlanImages', 'paymentPlanCards', 'paymentPlanTimelines'])
            ->where('property_ref_no', $property_ref_no)
            ->firstOrFail();

        // Increment visit_count
        $property->increment('visit_count');

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

        $propertiesSameArea = Listing::with('images')
            ->where('community', $property->community)
            ->where('id', '!=', $property->id)
            ->latest()
            ->take(5)
            ->get();

        $offPlanKeys = $property->offPlanKeys;
        $offPlanImages = $property->offPlanImages;
        $paymentPlanCards = $property->paymentPlanCards;
        $timelines = $property->paymentPlanTimelines;

        $currencyCode = auth()->check() && auth()->user()->currency_code 
        ? auth()->user()->currency_code 
        : Cookie::get('currency_code', 'AED');
        
        return view('propertydetails', compact(
            'property', 
            'unitTypesAndModels', 
            'adTypes', 
            'propertyTypes', 
            'completionStatus', 
            'noOfRooms', 
            'noOfBathrooms', 
            'amenities', 
            'faqs', 
            'priceRange', 
            'plotAreaRange', 
            'propertiesSameArea',
            'offPlanKeys',
            'offPlanImages',
            'paymentPlanCards',
            'timelines',
            'currencyCode',
        ));
    }

    public function showProperty($property_ref_no)
    {
        $property = Property::with(['photos', 'agent'])
        ->where('reference_number', $property_ref_no)
        ->firstOrFail();

        $property->increment('visit_count');
        
        dd($property);
    }

}
