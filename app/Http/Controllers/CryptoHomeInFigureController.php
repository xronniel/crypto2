<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CryptoHomeInFigure;

class CryptoHomeInFigureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $figures = CryptoHomeInFigure::all();
        return view('admin.crypto_home_in_figures.index', compact('figures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crypto_home_in_figures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'status' => 'required|boolean',
        ]);

        CryptoHomeInFigure::create($validated);

        return redirect()->route('admin.crypto-home-in-figures.index')->with('success', 'Figure added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $figure = CryptoHomeInFigure::findOrFail($id);
        return view('admin.crypto_home_in_figures.show', compact('figure'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $figure = CryptoHomeInFigure::findOrFail($id);
        return view('admin.crypto_home_in_figures.edit', compact('figure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $figure = CryptoHomeInFigure::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $figure->update($validated);

        return redirect()->route('admin.crypto-home-in-figures.index')->with('success', 'Figure updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $figure = CryptoHomeInFigure::findOrFail($id);
        $figure->delete();

        return redirect()->route('admin.crypto-home-in-figures.index')->with('success', 'Figure deleted successfully!');
    }
}
