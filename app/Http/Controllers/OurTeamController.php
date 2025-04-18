<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurTeam;
use Illuminate\Support\Facades\Storage;

class OurTeamController extends Controller
{
    public function index()
    {
        $team = OurTeam::all();
        return view('admin.ourteam.index', compact('team'));
    }

    public function create()
    {
        return view('admin.ourteam.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'role' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile' => 'nullable|string|max:20',
            'sno' => 'nullable|string', 
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('ourteam', 'public');
        }

        OurTeam::create($validated);

        return redirect()->route('admin.ourteam.index')->with('success', 'Team member added successfully!');
    }

    public function show($id)
    {
        $member = OurTeam::findOrFail($id);
        return view('admin.ourteam.show', compact('member'));
    }

    public function edit($id)
    {
        $member = OurTeam::findOrFail($id);
        return view('admin.ourteam.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = OurTeam::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'role' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile' => 'nullable|string|max:20',
            'sno' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // delete old image
            if ($member->image && Storage::disk('public')->exists($member->image)) {
                Storage::disk('public')->delete($member->image);
            }

            $validated['image'] = $request->file('image')->store('ourteam', 'public');
        }

        $member->update($validated);

        return redirect()->route('admin.ourteam.index')->with('success', 'Team member updated successfully!');
    }

    public function destroy($id)
    {
        $member = OurTeam::findOrFail($id);

        if ($member->image && Storage::disk('public')->exists($member->image)) {
            Storage::disk('public')->delete($member->image);
        }

        $member->delete();

        return redirect()->route('admin.ourteam.index')->with('success', 'Team member deleted successfully!');
    }
}
