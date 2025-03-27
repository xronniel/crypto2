<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommunityRequest;
use App\Models\Community;
use App\Models\Emirates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::with('emirate')->latest()->paginate(10);
        return view('admin.communities.index', compact('communities'));
    }

    public function create()
    {
        $emirates = Emirates::all(); // Corrected to fetch Emirates
        return view('admin.communities.create', compact('emirates'));
    }

    public function store(CommunityRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('communities', 'public');
        }

        Community::create($data);
        return redirect()->route('admin.communities.index')->with('success', 'Community created successfully.');
    }

    public function show(Community $community)
    {
        return view('admin.communities.show', compact('community'));
    }

    public function edit(Community $community)
    {
        $emirates = Emirates::all();
        return view('admin.communities.edit', compact('community', 'emirates'));
    }

    public function update(CommunityRequest $request, Community $community)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($community->image) {
                Storage::disk('public')->delete($community->image);
            }
            $data['image'] = $request->file('image')->store('communities', 'public');
        }

        $community->update($data);
        return redirect()->route('admin.communities.index')->with('success', 'Community updated successfully.');
    }

    public function destroy(Community $community)
    {
        if ($community->image) {
            Storage::disk('public')->delete($community->image);
        }
        $community->delete();
        return redirect()->route('admin.communities.index')->with('success', 'Community deleted successfully.');
    }
}
