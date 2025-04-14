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

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view your saved properties.');
        }

        // Retrieve saved properties for the authenticated user
        $savedProperties = UserSavedProperty::with(['propertyable'])
            ->where('user_id', $user->id)
            ->get();

        return view('saved_properties.index', compact('savedProperties'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
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

        $savedProperty = UserSavedProperty::create([
            'user_id' => $validated['user_id'],
            'propertyable_id' => $validated['propertyable_id'],
            'propertyable_type' => $validated['propertyable_type'],
            'property_ref_no' => $validated['property_ref_no'],
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Property saved successfully.',
            'data' => $savedProperty,
        ]);
    }
}
