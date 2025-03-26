<?php

namespace App\Http\Controllers;

use App\Models\HomepageContent;
use App\Models\Listing;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function homepage(Request $request)
    {
        $homepageContent = HomepageContent::first();
        $propertyTypes = DB::table('listings')
            ->where('unit_type', '!=', '')
            ->distinct()
            ->pluck('unit_type');
        
        $unitType = DB::table('listings')
            ->where('unit_model', '!=', '')
            ->distinct()
            ->pluck('unit_model');

        $noOfRooms = Listing::where('no_of_rooms', '!=', '')
            ->distinct()
            ->pluck('no_of_rooms');

        $noOfBathrooms = Listing::where('no_of_bathroom', '!=', '')
            ->distinct()
            ->pluck('no_of_bathroom');

        $newsList = News::latest()->take(3)->get();
        return view('home', compact('newsList', 'homepageContent', 'propertyTypes', 'unitType', 'noOfRooms', 'noOfBathrooms', 'request'));
    }
}
