<?php

namespace App\Http\Controllers;

use App\Models\PhoneCode;
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

        // Retrieve saved properties for the authenticated user
        // $savedProperties = UserSavedProperty::with([
        //     'propertyable' => function ($query) {
        //         if ($query->getModel() instanceof \App\Models\Listing) {
        //             $query->with('images'); // Load images for Listing model
        //         } elseif ($query->getModel() instanceof \App\Models\HolidayProperty) {
        //             $query->with('holidayPhotos'); // Load holidayPhotos for HolidayProperty model
        //         }
        //     }
        // ])->where('user_id', $user->id)->get();

        // foreach ($savedProperties as $savedProperty) {
        //     if ($savedProperty->propertyable instanceof \App\Models\Listing) {
        //         dd($savedProperty->propertyable->relationLoaded('images')); // Should return true
        //     } elseif ($savedProperty->propertyable instanceof \App\Models\HolidayProperty) {
        //         dd($savedProperty->propertyable->relationLoaded('holidayPhotos')); // Should return true
        //     }
        // }
        $savedProperties = UserSavedProperty::with([
            'propertyable' => function ($query) {
                // Eager loading relationships dynamically based on the model
                $query->when(
                    $query->getModel() instanceof \App\Models\Listing,
                    function ($q) {
                        $q->with('images'); // For Listing model
                    }
                )->when(
                    $query->getModel() instanceof \App\Models\HolidayProperty,
                    function ($q) {
                        $q->with('holidayPhotos'); // For HolidayProperty model
                    }
                );
            }
        ])->where('user_id', $user->id)->get();

        foreach ($savedProperties as $savedProperty) {
            $images = [];
            
            if ($savedProperty->propertyable instanceof \App\Models\Listing) {
                $images = $savedProperty->propertyable->images; // Fetch images from Listing
            } elseif ($savedProperty->propertyable instanceof \App\Models\HolidayProperty) {
                $images = $savedProperty->propertyable->holidayPhotos; // Fetch photos from HolidayProperty
            }
            
        }

        foreach ($savedProperties as $savedProperty) {
            if ($savedProperty->propertyable instanceof \App\Models\Listing) {
                $savedProperty->propertyable->load('images');
            } elseif ($savedProperty->propertyable instanceof \App\Models\HolidayProperty) {
                $savedProperty->propertyable->load('holidayPhotos');
            }
        }
        return view('user.user-account', compact('user', 'phonecodes', 'savedProperties'));
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
