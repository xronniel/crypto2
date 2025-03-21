<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmiratesRequest;
use App\Models\Country;
use App\Models\Emirates;
use Illuminate\Http\Request;

class EmiratesController extends Controller
{
    public function index()
    {
        $emirates = Emirates::with('country')->latest()->paginate(10);
        return view('admin.emirates.index', compact('emirates'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.emirates.create', compact('countries'));
    }

    public function store(EmiratesRequest $request)
    {
        Emirates::create($request->validated());
        return redirect()->route('admin.emirates.index')->with('success', 'Emirate added successfully!');
    }

    public function show(Emirates $emirate)
    {
        return view('admin.emirates.show', compact('emirate'));
    }

    public function edit(Emirates $emirate)
    {
        $countries = Country::all();
        return view('admin.emirates.edit', compact('emirate', 'countries'));
    }

    public function update(EmiratesRequest $request, Emirates $emirate)
    {
        $emirate->update($request->validated());
        return redirect()->route('admin.emirates.index')->with('success', 'Emirate updated successfully!');
    }

    public function destroy(Emirates $emirate)
    {
        $emirate->delete();
        return redirect()->route('admin.emirates.index')->with('success', 'Emirate deleted successfully!');
    }
}
