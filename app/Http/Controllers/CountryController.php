<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::latest()->paginate(10);
        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(CountryRequest $request)
    {
        Country::create($request->validated());
        return redirect()->route('admin.countries.index')->with('success', 'Country added successfully!');
    }

    public function show(Country $country)
    {
        return view('admin.countries.show', compact('country'));
    }

    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, Country $country)
    {
        $country->update($request->validated());
        return redirect()->route('admin.countries.index')->with('success', 'Country updated successfully!');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('admin.countries.index')->with('success', 'Country deleted successfully!');
    }
}
