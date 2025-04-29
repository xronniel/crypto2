<?php

namespace App\Http\Controllers;

use App\Http\Requests\HolidayPropertyRequest;
use App\Models\Agent;
use App\Models\Faq;
use App\Models\HolidayProperty;
use App\Models\HolidayPropertyAmenity;
use App\Models\UserSavedProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class HolidayPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $holidayProperties = HolidayProperty::latest()->paginate(10);
        return view('admin.holiday-properties.index', compact('holidayProperties'));
    }

    public function userIndex(Request $request)
    {
        $search = $request->input('search');
        $adType = $request->input('ad_type');
        $propertyType = $request->input('property_type');
        $unitType = $request->input('unit_type');
        $sortBy = $request->input('sort_by');

        $emirates = HolidayProperty::whereNotNull('city')
            ->where('city', '!=', '')
            ->distinct()
            ->orderBy('city', 'asc')
            ->pluck('city');

            if (!$request->filled('emirate')) {
                return redirect()->route('holiday-properties.index', array_merge(
                    ['emirate' => $emirates->first()], // Add emirate if not filled
                    $request->except('page') // Include all other query parameters except 'page'
                ));
            }

        $selectedEmirate = $request->filled('emirate') ? $request->emirate : $emirates->first();

        $query = HolidayProperty::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('community', 'LIKE', "%{$search}%")
                  ->orWhere('sub_community', 'LIKE', "%{$search}%")
                  ->orWhere('property_name', 'LIKE', "%{$search}%")
                  ->orWhere('title_en', 'LIKE', "%{$search}%")
                  ->orWhere('description_en', 'LIKE', "%{$search}%");
            });
        }

        if ($sortBy) {
            switch ($sortBy) {
                case 'furnished':
                    // Filter listings where featured is 1
                    $query->where('furnished', 1);
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
                    $query->orderBy('last_update', 'desc');
                    break;
                default:
                    $query->latest();
                    break;
            }
        }

        $query->when(request('filter_type') == 'Rent', function ($q) {
            $q->where('offering_type', 'RR');
        });

        $query->when(request('filter_type') == 'buy', function ($q) {
            $q->where('offering_type', 'SR');
        });

        $query->when(request('filter_type') == 'new_projects', function ($q) {
            $q->where('new', 1);
        });

        // $query->when(request()->has('emirate'), function ($q) {
        //     $q->where('city', '=', request('emirate'));
        // });

        $query->when($selectedEmirate, function ($q) use ($selectedEmirate) {
            $q->where('city', $selectedEmirate);
        });

        // Filter by `min_price` and `max_price` if present
        $query->when(request()->has('min_price') && request('min_price') != '', function ($q) {
            $q->where('price', '>=', request('min_price'));
        });

        $query->when(request()->has('max_price') && request('max_price') != '', function ($q) {
            $q->where('price', '<=', request('max_price'));
        });

        $query->when(request()->has('no_of_rooms') && request('no_of_rooms') != '', function ($q) {
            $q->where('bedroom', request('no_of_rooms'));
        });
        
        $query->when(request()->has('no_of_bathroom') && request('no_of_rooms') != '', function ($q) {
            $q->where('bathroom', request('no_of_bathroom'));
        });
        

        if ($propertyType) {
            $query->where('property_type', $propertyType);
        }

        $holidayProperties = $query->with(['holidayPhotos'])->latest()->paginate(10);

        $user = Auth::user();
        if ($user) {
            $savedProperties = UserSavedProperty::where('user_id', $user->id)
                ->where('propertyable_type', HolidayProperty::class)
                ->pluck('propertyable_id')
                ->toArray();

            $holidayProperties->getCollection()->transform(function ($property) use ($savedProperties) {
                $property->favorite = in_array($property->id, $savedProperties);
                return $property;
            });
        }

        $propertyTypes = HolidayProperty::select('property_type')
            ->whereNotNull('property_type')
            ->distinct()
            ->pluck('property_type');
        $min = HolidayProperty::whereNotNull('price')->min('price');
        $max = HolidayProperty::whereNotNull('price')->max('price');
    
        $minRounded = floor($min / 10000) * 10000;
        $maxRounded = ceil($max / 10000) * 10000;
    
        $steps = range($minRounded, $maxRounded, 10000);
    
        $priceRange = [
            'min'   => $minRounded,
            'max'   => $maxRounded,
            'steps' => $steps,
        ];

        $topListings = DB::table('holiday_properties')
            ->select('community', 'property_name', 'property_type', 'offering_type', 'visit_count')
            ->orderByDesc('visit_count')
            ->limit(10)
            ->get();
        $recentSearches = [
            'community' => $topListings->map(fn($item) => [
                'name' => $item->community,
                'ad_type' => $item->offering_type == 'RR' ? 'Rent' : 'Sale',
            ])->unique()->values()->all(),
            'property_title' => collect($topListings)
                ->flatMap(function ($item) {
                    $titles = preg_split('/\s*[|\/]\s*/', $item->property_name);
                    return collect($titles)
                        ->map(fn($title) => trim($title))
                        ->filter(fn($title) => !empty($title)) // ✅ exclude null or empty
                        ->map(fn($title) => [
                            'title' => $title,
                            'ad_type' => $item->offering_type == 'RR' ? 'Rent' : 'Sale',
                        ]);
                })
                ->unique(fn($item) => $item['title']) // optional: remove duplicate titles
                ->values()
                ->all(),
            'unit_type' => $topListings->map(fn($item) => [
                'name' => $item->property_type,
                'ad_type' => $item->offering_type == 'RR' ? 'Rent' : 'Sale',
            ])->unique()->values()->all(),
        ];

        $noOfRooms = HolidayProperty::where('bedroom', '!=', '')
            ->distinct()
            ->orderBy('bedroom', 'asc')
            ->pluck('bedroom');

        $noOfBathrooms = HolidayProperty::where('bathroom', '!=', '')
            ->distinct()
            ->orderBy('bathroom', 'asc')
            ->pluck('bathroom');
        $faqs = Faq::all();
        $amenities = HolidayPropertyAmenity::all();
        $plotAreaRange = [];

        $route = route('holiday-properties.index');
        //$holidayProperties = HolidayProperty::with('photos')->latest()->paginate(10);
        return view('holiday-homes', compact('holidayProperties', 'propertyTypes', 'priceRange', 'recentSearches', 'noOfRooms', 'noOfBathrooms', 'faqs', 'amenities', 'topListings', 'plotAreaRange', 'emirates', 'route'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $amenities = HolidayPropertyAmenity::all();
        $propertyTypes = HolidayProperty::select('property_type')
            ->whereNotNull('property_type')
            ->distinct()
            ->pluck('property_type');
        $agents = Agent::all();
        return view('admin.holiday-properties.create', compact('amenities', 'propertyTypes', 'agents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HolidayPropertyRequest $request)
    {
        $validated = $request->validated();
    
        $validated['amenities'] = is_array($request->input('amenities'))
            ? implode(',', $request->input('amenities'))
            : null;
    
        // Get the agent by ID
        $agent = Agent::findOrFail($validated['agent_id']);
    
        // Add agent fields to validated data
        $validated['agent_name'] = $agent->name;
        $validated['agent_email'] = $agent->email;
        $validated['agent_phone'] = $agent->phone;
        $validated['agent_license'] = $agent->license ?? null;
        $validated['agent_photo'] = $agent->photo ?? null;
        $validated['new'] = $validated['new'] ?? 0; // Set new to 1 for new properties
        // Remove photos before creating property
        unset($validated['photos']);
        
        $validated['xml'] = 0; // Set xml to 1 for new properties
        // Create the property
        $holidayProperty = HolidayProperty::create($validated);
    
        // Store photos in holiday_property_photos table
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('holiday-properties/photos', 'public');
                $holidayProperty->holidayPhotos()->create(['url' => $path]);
            }
        }
    
        // Sync amenities
        if ($request->has('amenities')) {
            $holidayProperty->holidayAmenities()->sync($request->input('amenities'));
        }
    
        return redirect()->route('admin.holiday-properties.index')
            ->with('success', 'Holiday Property created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HolidayProperty $holidayProperty)
    {
        return view('admin.holiday-properties.show', compact('holidayProperty'));
    }

    public function userShow($reference_no)
    {
        $holidayProperty = HolidayProperty::with('holidayPhotos')
            ->where('reference_number', $reference_no)
            ->firstOrFail();

        $holidayProperty->increment('visit_count');


        $propertyTypes = HolidayProperty::select('property_type')
            ->whereNotNull('property_type')
            ->distinct()
            ->pluck('property_type');
        $min = HolidayProperty::whereNotNull('price')->min('price');
        $max = HolidayProperty::whereNotNull('price')->max('price');

        $minRounded = floor($min / 10000) * 10000;
        $maxRounded = ceil($max / 10000) * 10000;

        $steps = range($minRounded, $maxRounded, 10000);

        $priceRange = [
            'min'   => $minRounded,
            'max'   => $maxRounded,
            'steps' => $steps,
        ];

        $noOfRooms = HolidayProperty::where('bedroom', '!=', '')
            ->distinct()
            ->orderBy('bedroom', 'asc')
            ->pluck('bedroom');

        $noOfBathrooms = HolidayProperty::where('bathroom', '!=', '')
            ->distinct()
            ->orderBy('bathroom', 'asc')
            ->pluck('bathroom');
        $faqs = Faq::all();
        $amenities = HolidayPropertyAmenity::all();
        $plotAreaRange = [];

        $holidayPropertiesSameArea = HolidayProperty::with('holidayPhotos')
            ->where('community', $holidayProperty->community)
            ->where('id', '!=', $holidayProperty->id)
            ->latest()
            ->take(5)
            ->get();

        $currencyCode = auth()->check() && auth()->user()->currency_code 
            ? auth()->user()->currency_code 
            : Cookie::get('currency_code', 'AED');

        return view('holiday-homes-details', compact('holidayProperty', 'propertyTypes', 'priceRange', 'noOfRooms', 'noOfBathrooms', 'faqs', 'amenities', 'plotAreaRange', 'holidayPropertiesSameArea', 'currencyCode'));
    }

    public function edit(HolidayProperty $holidayProperty)
    {
        $amenities = HolidayPropertyAmenity::all();
        $propertyTypes = HolidayProperty::select('property_type')
            ->whereNotNull('property_type')
            ->distinct()
            ->pluck('property_type');
        $agents = Agent::all();
        return view('admin.holiday-properties.edit', compact('holidayProperty', 'amenities', 'propertyTypes', 'agents'));
    }

    public function update(HolidayPropertyRequest $request, $id)
    {
        // Find the holiday property by ID
        $holidayProperty = HolidayProperty::findOrFail($id);
    
        // Validate the request data
        $validated = $request->validated();
    
        // Handle amenities input
        $validated['amenities'] = is_array($request->input('amenities'))
            ? implode(',', $request->input('amenities'))
            : null;
    
        // Get the agent by ID
        $agent = Agent::findOrFail($validated['agent_id']);
    
        // Add agent fields to validated data
        $validated['agent_name'] = $agent->name;
        $validated['agent_email'] = $agent->email;
        $validated['agent_phone'] = $agent->phone;
        $validated['agent_license'] = $agent->license ?? null;
        $validated['agent_photo'] = $agent->photo ?? null;
        
        // If 'new' is not set in request, set it to 0
        $validated['new'] = $validated['new'] ?? 0;
        
        // If 'xml' is not set, set it to 0 (or handle it based on your logic)
        $validated['xml'] = $validated['xml'] ?? 0;
    
        // Remove photos from validated data before updating property
        unset($validated['photos']);
        
        // Update the holiday property with validated data
        $holidayProperty->update($validated);
    
        // Handle photo updates
        if ($request->hasFile('photos')) {
            // Delete old photos
            foreach ($holidayProperty->holidayPhotos as $photo) {
                // You can optionally delete the old photo from storage here, e.g.:
                // Storage::delete($photo->url);
                $photo->delete();
            }
    
            // Store new photos in holiday_property_photos table
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('holiday-properties/photos', 'public');
                $holidayProperty->holidayPhotos()->create(['url' => $path]);
            }
        }
    
        // Sync amenities
        if ($request->has('amenities')) {
            $holidayProperty->holidayAmenities()->sync($request->input('amenities'));
        }
    
        return redirect()->route('admin.holiday-properties.index')
            ->with('success', 'Holiday Property updated successfully!');
    }

    public function destroy(HolidayProperty $holidayProperty)
    {
        $holidayProperty->delete();
        return redirect()->route('admin.holiday-properties.index')->with('success', 'Holiday Property deleted successfully!');
    }
}
