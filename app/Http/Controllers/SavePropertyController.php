<?php

namespace App\Http\Controllers;

use App\Models\UserSavedProperty;
use App\Rules\ValidPropertyableType;
use Illuminate\Http\Request;

class SavePropertyController extends Controller
{
    public function index()
    {
        // Ensure the user is authenticated
        $user = auth()->user();

        // Retrieve saved properties for the authenticated user
        $savedProperties = UserSavedProperty::with(['propertyable'])
            ->where('user_id', $user->id)
            ->get();
 
        return view('user.user-account.blade', compact('savedProperties'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'propertyable_id' => 'required|integer',
            'propertyable_type' => 'required|string|in:commercial,holiday',
            'property_ref_no' => 'nullable|string|max:255',
        ]);
    
        $propertyableType = match ($validated['propertyable_type']) {
            'commercial' => \App\Models\Listing::class,
            'holiday' => \App\Models\HolidayProperty::class,
            default => null,
        };
    
        $validated['propertyable_type'] = $propertyableType;
    
        [$savedProperty, $created] = UserSavedProperty::firstOrCreate(
            [
                'user_id' => $user->id,
                'propertyable_id' => $validated['propertyable_id'],
                'propertyable_type' => $validated['propertyable_type'],
                'property_ref_no' => $validated['property_ref_no'],
            ]
        );
    
        if (!$created) {
            return redirect()->back()->with('info', 'Property already saved.');
        }
    
        return redirect()->back()->with('success', 'Property saved successfully.');
    }

    public function destroy(Request $request)
    {
        $user = auth()->user();

        // Validate the request
        $validated = $request->validate([
            'propertyable_id' => 'required|integer',
            'propertyable_type' => 'required|string|in:commercial,holiday',
        ]);

        // Determine the propertyable type
        $propertyableType = match ($validated['propertyable_type']) {
            'commercial' => \App\Models\Listing::class,
            'holiday' => \App\Models\HolidayProperty::class,
            default => null,
        };

        // Find the saved property
        $savedProperty = UserSavedProperty::where('user_id', $user->id)
            ->where('propertyable_id', $validated['propertyable_id'])
            ->where('propertyable_type', $propertyableType)
            ->first();

        if (!$savedProperty) {
            return redirect()
                ->back()
                ->with('error', 'Property not found in your saved list.');
        }

        // Delete the saved property
        $savedProperty->delete();

        return redirect()
            ->back()
            ->with('success', 'Property removed successfully.');
    }
}
