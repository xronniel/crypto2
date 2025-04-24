<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\OurTeam;
use App\Models\OurCommitment;
use App\Models\CryptoHomeInFigure;
use Illuminate\Support\Facades\Storage;
class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutus = AboutUs::first();
        return view('admin.about-us.index', compact('aboutus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about-us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_text' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            'wwo_section1_title1' => 'nullable|string|max:255',
            'wwo_section1_text1' => 'nullable|string',
            'wwo_section1_title2' => 'nullable|string|max:255',
            'wwo_section1_text2' => 'nullable|string',

            'wwo_section2_title1' => 'nullable|string|max:255',
            'wwo_section2_text1' => 'nullable|string',
            'wwo_section2_title2' => 'nullable|string|max:255',
            'wwo_section2_text2' => 'nullable|string',
            'wwo_section2_title3' => 'nullable|string|max:255',
            'wwo_section2_text3' => 'nullable|string',

            'wwo_section3_title1' => 'nullable|string|max:255',
            'wwo_section3_text1' => 'nullable|string',
            'wwo_section3_icon' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('aboutus', 'public');
        }

        if ($request->hasFile('wwo_section3_icon')) {
            $validated['wwo_section3_icon'] = $request->file('wwo_section3_icon')->store('aboutus/icons', 'public');
        }

        AboutUs::create($validated);

        return redirect()->route('admin.aboutus.index')->with('success', 'About Us content created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $aboutus = AboutUs::findOrFail($id);
        return view('admin.about-us.show', compact('aboutus'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aboutus = AboutUs::findOrFail($id);
        return view('admin.about-us.edit', compact('aboutus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $about = AboutUs::findOrFail($id);

        $validated = $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_text' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'wwo_section3_icon' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            'wwo_section1_title1' => 'nullable|string|max:255',
            'wwo_section1_text1' => 'nullable|string',
            'wwo_section1_title2' => 'nullable|string|max:255',
            'wwo_section1_text2' => 'nullable|string',

            'wwo_section2_title1' => 'nullable|string|max:255',
            'wwo_section2_text1' => 'nullable|string',
            'wwo_section2_title2' => 'nullable|string|max:255',
            'wwo_section2_text2' => 'nullable|string',
            'wwo_section2_title3' => 'nullable|string|max:255',
            'wwo_section2_text3' => 'nullable|string',

            'wwo_section3_title1' => 'nullable|string|max:255',
            'wwo_section3_text1' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($about->image && \Storage::disk('public')->exists($about->image)) {
                \Storage::disk('public')->delete($about->image);
            }

            $validated['image'] = $request->file('image')->store('aboutus', 'public');
        }

        if ($request->hasFile('wwo_section3_icon')) {
            if ($about->wwo_section3_icon && \Storage::disk('public')->exists($about->wwo_section3_icon)) {
                \Storage::disk('public')->delete($about->wwo_section3_icon);
            }

            $validated['wwo_section3_icon'] = $request->file('wwo_section3_icon')->store('aboutus/icons', 'public');
        }

        $about->update($validated);

        return redirect()->route('admin.aboutus.index')->with('success', 'About Us content updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $about = AboutUs::findOrFail($id);

        if ($about->image && \Storage::disk('public')->exists($about->image)) {
            \Storage::disk('public')->delete($about->image);
        }

        if ($about->wwo_section3_icon && \Storage::disk('public')->exists($about->wwo_section3_icon)) {
            \Storage::disk('public')->delete($about->wwo_section3_icon);
        }

        $about->delete();

        return redirect()->route('admin.aboutus.index')->with('success', 'About Us entry deleted successfully!');
    }

    public function aboutUs()
    {
        $aboutUs = AboutUs::all(); 
        $ourTeam = OurTeam::all(); 
        $ourCommitment = OurCommitment::all();
        $cryptoHomeInFigures = CryptoHomeInFigure::all();

        return view('aboutUs', compact('aboutUs', 'ourTeam', 'ourCommitment', 'cryptoHomeInFigures'));
    }

}
