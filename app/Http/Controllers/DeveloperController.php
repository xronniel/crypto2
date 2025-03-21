<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeveloperRequest;
use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
       /**
     * Display a listing of developers.
     */
    public function index()
    {
        $developers = Developer::all();
        return view('admin.developers.index', compact('developers'));
    }

    /**
     * Show the form for creating a new developer.
     */
    public function create()
    {
        return view('admin.developers.create');
    }

    /**
     * Store a newly created developer.
     */
    public function store(DeveloperRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('developers', 'public');
        }

        Developer::create($data);
        return redirect()->route('admin.developers.index')->with('success', 'Developer created successfully.');
    }

    /**
     * Show the form for editing the specified developer.
     */
    public function edit(Developer $developer)
    {
        return view('admin.developers.edit', compact('developer'));
    }

    /**
     * Update the specified developer.
     */
    public function update(DeveloperRequest $request, Developer $developer)
    {
        $data = $request->validated();

        // Handle image update
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('developers', 'public');
        }

        $developer->update($data);
        return redirect()->route('admin.developers.index')->with('success', 'Developer updated successfully.');
    }

    /**
     * Remove the specified developer.
     */
    public function destroy(Developer $developer)
    {
        $developer->delete();
        return redirect()->route('admin.developers.index')->with('success', 'Developer deleted successfully.');
    }
}
