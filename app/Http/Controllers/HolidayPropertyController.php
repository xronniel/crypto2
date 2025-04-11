<?php

namespace App\Http\Controllers;

use App\Http\Requests\HolidayPropertyRequest;
use App\Models\Faq;
use App\Models\HolidayProperty;
use App\Models\HolidayPropertyAmenity;
use Illuminate\Http\Request;
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

        $query->when(request('filter_type') == 'Sale', function ($q) {
            $q->where('offering_type', 'SR');
        });

        $query->when(request('filter_type') == 'new_projects', function ($q) {
            $q->where('new', 1);
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
        //$holidayProperties = HolidayProperty::with('photos')->latest()->paginate(10);
        return view('holiday-homes', compact('holidayProperties', 'propertyTypes', 'priceRange', 'recentSearches', 'noOfRooms', 'noOfBathrooms', 'faqs', 'amenities', 'topListings', 'plotAreaRange'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.holiday-properties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validated();

        // Handle photos upload
        if ($request->hasFile('photos')) {
            $photos = [];
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('holiday-properties/photos', 'public');
            }
            $validated['photos'] = json_encode($photos);
        }

        HolidayProperty::create($validated);

        return redirect()->route('admin.holiday-properties.index')->with('success', 'Holiday Property created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HolidayProperty $holidayProperty)
    {
        return view('admin.holiday-properties.show', compact('holidayProperty'));
    }

    public function userShow(HolidayProperty $holidayProperty)
    {
        $holidayProperty->increment('visit_count');
        $holidayProperty->load('holidayPhotos');

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

        return view('holiday-homes-details', compact('holidayProperty', 'propertyTypes', 'priceRange', 'noOfRooms', 'noOfBathrooms', 'faqs', 'amenities', 'plotAreaRange', 'holidayPropertiesSameArea'));
    }

    public function edit(HolidayProperty $holidayProperty)
    {
        return view('admin.holiday-properties.edit', compact('holidayProperty'));
    }

    public function update(HolidayPropertyRequest $request, HolidayProperty $holidayProperty)
    {
        $validated = $request->validated();

        // Handle photos upload
        if ($request->hasFile('photos')) {
            $photos = [];
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('holiday-properties/photos', 'public');
            }
            $validated['photos'] = json_encode($photos);
        }

        $holidayProperty->update($validated);

        return redirect()->route('admin.holiday-properties.index')->with('success', 'Holiday Property updated successfully!');
    }

    public function destroy(HolidayProperty $holidayProperty)
    {
        $holidayProperty->delete();
        return redirect()->route('admin.holiday-properties.index')->with('success', 'Holiday Property deleted successfully!');
    }
}
