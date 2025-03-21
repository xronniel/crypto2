<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DistrictRequest;
use App\Models\District;
use App\Models\Emirate;
use App\Models\Emirates;
use Illuminate\Support\Facades\Storage;


class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::with('emirate')->latest()->paginate(10);
        return view('admin.districts.index', compact('districts'));
    }

    public function create()
    {
        $emirates = Emirates::all();
        return view('admin.districts.create', compact('emirates'));
    }

    public function store(DistrictRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('districts', 'public');
        }

        District::create($data);
        return redirect()->route('admin.districts.index')->with('success', 'District created successfully.');
    }

    public function show(District $district)
    {
        return view('districts.show', compact('district'));
    }

    public function edit(District $district)
    {
        $emirates = Emirates::all();
        return view('admin.districts.edit', compact('district', 'emirates'));
    }

    public function update(DistrictRequest $request, District $district)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($district->image) {
                Storage::disk('public')->delete($district->image);
            }
            $data['image'] = $request->file('image')->store('districts', 'public');
        }

        $district->update($data);
        return redirect()->route('admin.districts.index')->with('success', 'District updated successfully.');
    }

    public function destroy(District $district)
    {
        if ($district->image) {
            Storage::disk('public')->delete($district->image);
        }
        $district->delete();
        return redirect()->route('admin.districts.index')->with('success', 'District deleted successfully.');
    }
}
