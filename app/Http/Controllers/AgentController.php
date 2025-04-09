<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Models\Agent;
use App\Models\Facility;
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

    public function userIndex()
    {
        // Get all agents, with optional pagination
        $agents = Agent::paginate(10);  // You can adjust the pagination limit

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

        return view('agents', compact('agents', 'unitTypesAndModels', 'adTypes', 'propertyTypes', 'noOfRooms', 'noOfBathrooms', 'completionStatus', 'amenities'));
    }

    /**
     * Show the form for creating a new agent.
     */
    public function create()
    {
        return view('admin.agents.create');
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
        return view('admin.agents.edit', compact('agent'));
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

        return view('agentDetails', compact('agent', 'unitTypesAndModels', 'adTypes', 'propertyTypes', 'noOfRooms', 'noOfBathrooms', 'completionStatus', 'amenities'));
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
