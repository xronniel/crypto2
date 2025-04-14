<?php

namespace App\Http\Controllers;

use App\Models\PhoneCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserPageController extends Controller
{
    public function account()
    {
        $user = auth()->user();
        $phonecodes = PhoneCode::select('name', 'phonecode')->get();

        return view('user.user-account', compact('user', 'phonecodes'));
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
