<?php
namespace App\Http\Controllers;

use App\Models\OurCommitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurCommitmentsController extends Controller
{
    public function index()
    {
        $commitments = OurCommitment::all();
        return view('admin.ourcommitments.index', compact('commitments'));
    }

    public function create()
    {
        return view('admin.ourcommitments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean',
        ]);

        // Handle icon image upload
        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('ourcommitments/icons', 'public');
        }

        OurCommitment::create($validated);

        return redirect()->route('admin.ourcommitments.index')->with('success', 'Our Commitment added successfully!');
    }

    public function edit($id)
    {
        $commitment = OurCommitment::findOrFail($id);
        return view('admin.ourcommitments.edit', compact('commitment'));
    }

    public function update(Request $request, $id)
    {
        $commitment = OurCommitment::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean',
        ]);

        // Handle icon update
        if ($request->hasFile('icon')) {
            // Delete old icon if it exists
            if ($commitment->icon && Storage::disk('public')->exists($commitment->icon)) {
                Storage::disk('public')->delete($commitment->icon);
            }

            $validated['icon'] = $request->file('icon')->store('ourcommitments/icons', 'public');
        }

        $commitment->update($validated);

        return redirect()->route('admin.ourcommitments.index')->with('success', 'Our Commitment updated successfully!');
    }

    public function destroy($id)
    {
        $commitment = OurCommitment::findOrFail($id);

        // Delete icon image if it exists
        if ($commitment->icon && Storage::disk('public')->exists($commitment->icon)) {
            Storage::disk('public')->delete($commitment->icon);
        }

        $commitment->delete();

        return redirect()->route('admin.ourcommitments.index')->with('success', 'Our Commitment deleted successfully!');
    }

    public function show($id)
    {
        $commitment = OurCommitment::findOrFail($id);
        return view('admin.ourcommitments.show', compact('commitment'));
    }
}
