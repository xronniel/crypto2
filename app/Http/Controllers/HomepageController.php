<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Faq;
use App\Models\HomepageContent;
use App\Models\Listing;
use App\Models\News;
use App\Models\Partner;
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

        $featuredListings = Listing::with(['images', 'facilities'])
            ->where('featured', 1)
            ->latest()
            ->take(3)
            ->get();

        $communities = Listing::where('emirate', '!=', '')
            ->distinct()
            ->pluck('emirate');

        $query = Listing::with(['images', 'facilities'])
            ->where('featured', 1);

       // If no community is provided in the request, use the first community as the default
       $defaultCommunity = $communities->first();
       $community = $request->get('community', $defaultCommunity);
   
       if ($community) {
           $query->where('emirate', $community);
       }

        $featuredListings = $query->latest()->paginate(3);
 
        $newsList = News::latest()->take(3)->get();

        $faqs = Faq::all();

        $amenities = Facility::where('name', '!=', '')
        ->distinct()
        ->pluck('name');
        $partners = Partner::all();

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

        return view('home', compact('newsList', 'homepageContent', 'propertyTypes', 'unitType', 'noOfRooms', 'noOfBathrooms', 'request', 'featuredListings', 'communities', 'community', 'faqs', 'amenities', 'partners', 'plotAreaRange'));
    }

    public function getFeaturedListingsByCommunity(Request $request)
    {
        // Fetch distinct communities
        $communities = Listing::where('emirate', '!=', '')
             ->distinct()
             ->pluck('emirate');

        $query = Listing::with(['images', 'facilities'])
             ->where('featured', 1);

        // If no community is provided in the request, use the first community as the default
        $defaultCommunity = $communities->first();
        $community = $request->get('community', $defaultCommunity);

        if ($community) {
            $query->where('emirate', $community);
        }

        $featuredListings = $query->latest()->paginate(3);

        // Return the data as JSON
        return response()->json([
            'success' => true,
            'data' => $featuredListings->toArray(),
            'default_community' => $defaultCommunity,
            'communities' => $communities,
        ]);
    }
}
