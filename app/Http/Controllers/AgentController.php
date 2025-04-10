<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Models\Agent;
use App\Models\Company;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\Listing;
use Illuminate\Http\Request;

class AgentController extends Controller
{
       /**
     * Display a listing of agents.
     */
    public function index()
    {
        $agents = Agent::paginate(20); 
        return view('admin.agents.index', compact('agents'));
    }

    public function userIndex(Request $request)
    {
        $communities = Listing::where('community', '!=', '')
            ->distinct()
            ->pluck('community');

        $defaultCommunity = $communities->first();
        $community = $request->get('community', $defaultCommunity);
        
        // Get all agents, with optional pagination
        $agents = Agent::whereHas('listings', function ($query) use ($community) {
            $query->where('community', $community);
        })
        ->with(['saleListings', 'rentListings'])
        ->paginate(10);
        // Get unique unit_type and unit_model
        $unitTypesAndModels = Listing::select('unit_type', 'unit_model')
            ->whereNotNull('unit_type')
            ->whereNotNull('unit_model')
            ->distinct()
            ->get();
  
        // Get unique ad_types for filter
        $adTypes = Listing::select('ad_type')
            ->whereNotNull('ad_type')
            ->distinct()
            ->pluck('ad_type');

        // Get unique property types (unit_type)
        $propertyTypes = Listing::select('unit_type')
            ->whereNotNull('unit_type')
            ->distinct()
            ->pluck('unit_type');

    
        $noOfRooms = Listing::where('no_of_rooms', '!=', '')
            ->distinct()
            ->pluck('no_of_rooms');

        $noOfBathrooms = Listing::where('no_of_bathroom', '!=', '')
            ->distinct()
            ->pluck('no_of_bathroom');

        $completionStatus = Listing::where('completion_status', '!=', '')
            ->distinct()
            ->pluck('completion_status');

        $amenities = Facility::where('name', '!=', '')
            ->distinct()
            ->pluck('name');

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

        $min = Listing::whereNotNull('price')->min('price');
        $max = Listing::whereNotNull('price')->max('price');
    
        $minRounded = floor($min / 10000000) * 10000000;
        $maxRounded = ceil($max / 10000000) * 10000000;
    
        $steps = range($minRounded, $maxRounded, 10000000);
    
        $priceRange = [
            'min'   => $minRounded,
            'max'   => $maxRounded,
            'steps' => $steps,
        ];
        $faqs = Faq::all();

        return view('agent-dashboard', compact('agents', 'unitTypesAndModels', 'adTypes', 'propertyTypes', 'noOfRooms', 'noOfBathrooms', 'completionStatus', 'amenities', 'priceRange', 'plotAreaRange', 'faqs', 'community', 'communities'));
    }

    /**
     * Show the form for creating a new agent.
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.agents.create', compact('companies'));
    }

    /**
     * Store a newly created agent.
     */
    public function store(AgentRequest $request)
    {
        $data = $request->validated();
    
        $validated['superagent'] = $request->has('superagent');

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('agents', 'public');
        }
    
        Agent::create($data);
        return redirect()->route('admin.agents.index')->with('success', 'Agent created successfully.');
    }
    

    /**
     * Show the form for editing the specified agent.
     */
    public function edit(Agent $agent)
    {
        $companies = Company::all();
        return view('admin.agents.edit', compact('agent', 'companies'));
    }

    /**
     * Update the specified agent.
     */
    public function update(AgentRequest $request, Agent $agent)
    {
        $data = $request->validated();
    
        $validated['superagent'] = $request->has('superagent');

        // Handle photo update
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('agents', 'public');
        }

        $agent->load(['saleListings', 'rentListings']);
    
        $agent->update($data);
        return redirect()->route('admin.agents.index')->with('success', 'Agent updated successfully.');
    }
    
    public function show(Agent $agent)
    {

        $agent->load(['saleListings', 'rentListings']);

        return view('admin.agents.show', compact('agent'));
    }

    public function userShow(Agent $agent)
    {

         // Get unique unit_type and unit_model
         $unitTypesAndModels = Listing::select('unit_type', 'unit_model')
             ->whereNotNull('unit_type')
             ->whereNotNull('unit_model')
             ->distinct()
             ->get();
 
         // Get unique ad_types for filter
         $adTypes = Listing::select('ad_type')
             ->whereNotNull('ad_type')
             ->distinct()
             ->pluck('ad_type');
 
         // Get unique property types (unit_type)
         $propertyTypes = Listing::select('unit_type')
             ->whereNotNull('unit_type')
             ->distinct()
             ->pluck('unit_type');
 
      
         $noOfRooms = Listing::where('no_of_rooms', '!=', '')
             ->distinct()
             ->pluck('no_of_rooms');
 
         $noOfBathrooms = Listing::where('no_of_bathroom', '!=', '')
             ->distinct()
             ->pluck('no_of_bathroom');
 
         $completionStatus = Listing::where('completion_status', '!=', '')
             ->distinct()
             ->pluck('completion_status');
 
         $amenities = Facility::where('name', '!=', '')
             ->distinct()
             ->pluck('name');
        // Load related listings (both sale and rent)
        $agent->load(['saleListings', 'rentListings']);

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

        $min = Listing::whereNotNull('price')->min('price');
        $max = Listing::whereNotNull('price')->max('price');
    
        $minRounded = floor($min / 10000000) * 10000000;
        $maxRounded = ceil($max / 10000000) * 10000000;
    
        $steps = range($minRounded, $maxRounded, 10000000);
    
        $priceRange = [
            'min'   => $minRounded,
            'max'   => $maxRounded,
            'steps' => $steps,
        ];

        $faqs = Faq::all();

        $agentListingsQuery = $agent->listings()->with(['images', 'facilities'])->latest();

        if (request()->has('ad_type')) {
            $agentListingsQuery->where('ad_type', request('ad_type'));
        }

        $sortBy = request('sort_by');

        switch ($sortBy) {
            case 'featured':
                $agentListingsQuery->where('featured', 1);
                break;
            case 'from_highest_price':
                $agentListingsQuery->orderByDesc('price');
                break;
            case 'from_lowest_price':
                $agentListingsQuery->orderBy('price');
                break;
            case 'newest':
                $agentListingsQuery->orderByDesc('listing_date');
                break;
            default:
                $agentListingsQuery->latest(); // Default fallback: order by created_at descending
                break;
        }
        

        $agentListings = $agentListingsQuery->paginate(10);

 
        return view('agent-detials', compact('agent', 'unitTypesAndModels', 'adTypes', 'propertyTypes', 'noOfRooms', 'noOfBathrooms', 'completionStatus', 'amenities', 'priceRange', 'plotAreaRange', 'faqs', 'agentListings'));
    }


    /**
     * Remove the specified agent.
     */
    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route('admin.agents.index')->with('success', 'Agent deleted successfully.');
    }
}
