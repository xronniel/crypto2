<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacilityRequest;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::where('name', '!=', '')->latest()->paginate(10);
        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.facilities.create');
    }

    public function store(FacilityRequest $request)
    {
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('facilities', 'public');
        }

        Facility::create($validated);

        return redirect()->route('admin.facilities.index')->with('success', 'Facility created successfully!');
    }

    public function edit(Facility $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(FacilityRequest $request, Facility $facility)
    {
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($facility->image && \Storage::disk('public')->exists($facility->image)) {
                \Storage::disk('public')->delete($facility->image);
            }

            $validated['image'] = $request->file('image')->store('facilities', 'public');
        }

        $facility->update($validated);

        return redirect()->route('admin.facilities.index')->with('success', 'Facility updated successfully!');
    }

    public function destroy(Facility $facility)
    {
        // Delete image if exists
        if ($facility->image && \Storage::disk('public')->exists($facility->image)) {
            \Storage::disk('public')->delete($facility->image);
        }

        $facility->delete();

        return redirect()->route('admin.facilities.index')->with('success', 'Facility deleted successfully!');
    }
}
