<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\HolidayProperty;
use App\Models\Listing;
use App\Models\PhoneCode;
use App\Models\UserContactedProperty;
use App\Models\UserSavedProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserPageController extends Controller
{
    public function account()
    {
        $user = auth()->user();
        $phonecodes = PhoneCode::select('name', 'phonecode')->get();
        $user = auth()->user();

        $savedPropertiesQuery = UserSavedProperty::with([
            'propertyable' => function ($query) {
                $query->when($query->getModel() instanceof Listing, function ($q) {
                    $q->with('images');
                })->when($query->getModel() instanceof HolidayProperty, function ($q) {
                    $q->with('holidayPhotos');
                });
            }
        ])
        ->where('user_id', $user->id);
    
        // Apply filters if saved_category exists
        if (request()->has('saved_category')) {
            $savedPropertiesQuery->where('propertyable_type', Listing::class);
    
            $savedPropertiesQuery->whereHasMorph(
                'propertyable',
                [Listing::class],
                function ($q) {
                    if (request('saved_category') == 'rent') {
                        $q->where('ad_type', 'Rent');
                    }
    
                    if (request('saved_category') == 'buy') {
                        $q->where('ad_type', 'Sale');
                    }
    
                    if (request('saved_category') == 'new_projects') {
                        $q->where('off_plan', 1);
                    }
    
                    if (request('saved_category') == 'commercial') {
                        $q->where('type', 'Commercial');
                    }

                }
            );
        }
    
        $savedProperties = $savedPropertiesQuery->paginate(10);
    
        foreach ($savedProperties as $savedProperty) {
            if ($savedProperty->propertyable instanceof Listing) {
                $savedProperty->propertyable->load('images');
            } elseif ($savedProperty->propertyable instanceof HolidayProperty) {
                $savedProperty->propertyable->load('holidayPhotos');
            }
        }
    

        // Manually ensure images or photos are loaded for each item (optional redundancy)
        foreach ($savedProperties as $savedProperty) {
            if ($savedProperty->propertyable instanceof \App\Models\Listing) {
                $savedProperty->propertyable->load('images');
            } elseif ($savedProperty->propertyable instanceof \App\Models\HolidayProperty && !request()->has('saved_category')) {
                $savedProperty->propertyable->load('holidayPhotos');
            }
        }
   
        $matchedAgentIds = [];

        if (request()->filled('agent_search')) {
            $matchedAgentIds = Agent::where('name', 'like', '%' . request('agent_search') . '%')->pluck('id')->toArray();
        }

        $contactedPropertiesQuery = UserContactedProperty::with([
            'propertyable' => function ($query) {
                $query->when($query->getModel() instanceof Listing, function ($q) {
                    $q->with('images');
                })->when($query->getModel() instanceof HolidayProperty, function ($q) {
                    $q->with('holidayPhotos');
                });
            }
        ])->where('user_id', $user->id);
        
        if (request()->has('contacted_category') || !empty($matchedAgentIds)) {
            // Remove hardcoded `propertyable_type` = Listing::class
            $contactedPropertiesQuery->whereHasMorph(
                'propertyable',
                [Listing::class, HolidayProperty::class],
                function ($q, $type) use ($matchedAgentIds) {
                    // Common agent_id filter for both models
                    if (!empty($matchedAgentIds)) {
                        $q->whereIn('agent_id', $matchedAgentIds);
                    }
        
                    // Additional filters only for Listing model
                    if ($type === Listing::class) {
                        if (request('contacted_category') == 'rent') {
                            $q->where('ad_type', 'Rent');
                        }
        
                        if (request('contacted_category') == 'buy') {
                            $q->where('ad_type', 'Sale');
                        }
        
                        if (request('contacted_category') == 'new_projects') {
                            $q->where('off_plan', 1);
                        }
        
                        if (request('contacted_category') == 'commercial') {
                            $q->where('type', 'Commercial');
                        }
        
                        if (request('new') == 1) {
                            $q->where('new', 1);
                        }
                    }
                }
            );
        }

        
        // Get the properties, group by the property ID to ensure no duplicates
        $contactedProperties = $contactedPropertiesQuery->get()->unique('propertyable_id')->values();
        
        // Paginate the results manually, since you're using `unique()` on the collection
        $contactedProperties = $contactedProperties->forPage(request()->get('page', 1), 10);
        
        // Optional fallback eager loading
        foreach ($contactedProperties as $contactedProperty) {
            if ($contactedProperty->propertyable instanceof Listing) {
                $contactedProperty->propertyable->loadMissing('images');
            } elseif ($contactedProperty->propertyable instanceof HolidayProperty) {
                $contactedProperty->propertyable->loadMissing('holidayPhotos');
            }
        }
      
        return view('user.user-account', compact('user', 'phonecodes', 'savedProperties', 'contactedProperties'));
    }

    public function userSavedProperties()
    {
        $user = auth()->user();
        $savedProperties = $user->savedProperties; // Assuming you have a relationship defined in User model
        return view('user.saved_properties', compact('savedProperties'));
    }

    public function userContactedProperties()
    {
        $user = auth()->user();

        $contactedProperties = $user->contactedProperties; // Assuming you have a relationship defined in User model
        return view('user.contacted_properties', compact('contactedProperties'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        // Validate the request data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'country_code' => 'nullable|string|max:10',
            'mobile_number' => 'nullable|string|max:20',
        ]);

        // Update user details
        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->email = $validated['email'];
        $user->country_code = $validated['country_code'];
        $user->mobile_number = $validated['mobile_number'];

        $user->save();

        return redirect()->route('user.account')->with('success', 'Account updated successfully!');
    }
}
