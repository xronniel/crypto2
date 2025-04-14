<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPageController extends Controller
{
    public function account()
    {
        $user = auth()->user();
        return view('user.user-account', compact('user'));
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
}
