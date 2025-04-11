<?php

namespace App\Http\Controllers;

use App\Http\Requests\HolidayPropertyRequest;
use App\Models\HolidayProperty;
use Illuminate\Http\Request;

class HolidayPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $holidayProperties = HolidayProperty::latest()->paginate(10);
        return view('admin.holiday-properties.index', compact('holidayProperties'));
    }

    public function userIndex(Request $request)
    {
        $holidayProperties = HolidayProperty::latest()->paginate(10);
        return view('holiday-properties.index', compact('holidayProperties'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.holiday-properties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validated();

        // Handle photos upload
        if ($request->hasFile('photos')) {
            $photos = [];
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('holiday-properties/photos', 'public');
            }
            $validated['photos'] = json_encode($photos);
        }

        HolidayProperty::create($validated);

        return redirect()->route('admin.holiday-properties.index')->with('success', 'Holiday Property created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HolidayProperty $holidayProperty)
    {
        return view('admin.holiday-properties.show', compact('holidayProperty'));
    }

    public function userShow(HolidayProperty $holidayProperty)
    {
        return view('holiday-properties.show', compact('holidayProperty'));
    }

    public function edit(HolidayProperty $holidayProperty)
    {
        return view('admin.holiday-properties.edit', compact('holidayProperty'));
    }

    public function update(HolidayPropertyRequest $request, HolidayProperty $holidayProperty)
    {
        $validated = $request->validated();

        // Handle photos upload
        if ($request->hasFile('photos')) {
            $photos = [];
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('holiday-properties/photos', 'public');
            }
            $validated['photos'] = json_encode($photos);
        }

        $holidayProperty->update($validated);

        return redirect()->route('admin.holiday-properties.index')->with('success', 'Holiday Property updated successfully!');
    }

    public function destroy(HolidayProperty $holidayProperty)
    {
        $holidayProperty->delete();
        return redirect()->route('admin.holiday-properties.index')->with('success', 'Holiday Property deleted successfully!');
    }
}
