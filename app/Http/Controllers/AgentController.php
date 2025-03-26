<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Models\Agent;
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
    
        // Handle photo update
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('agents', 'public');
        }
    
        $agent->update($data);
        return redirect()->route('admin.agents.index')->with('success', 'Agent updated successfully.');
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
