<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomepageContentRequest;
use App\Models\HomepageContent;
use Illuminate\Http\Request;

class HomepageContentController extends Controller
{
     /**
     * Display a listing of the homepage contents.
     */
    public function index()
    {
        $homepageContent = HomepageContent::first();

        // Check if content exists, if not create a new record
        if (!$homepageContent) {
            $homepageContent = HomepageContent::create([]);
        }
    
        return view('admin.homepage.index', compact('homepageContent'));
    
    }

    /**
     * Show the form for editing the homepage content.
     */
    public function edit()
    {
        $homepageContent = HomepageContent::first();
        return view('admin.homepage.edit', compact('homepageContent'));
    }

    /**
     * Update the homepage content in storage.
     */
    public function update(HomepageContentRequest $request)
    {
        try {
            $homepageContent = HomepageContent::first();
    
            // Handle image uploads
            $images = [
                'hero_image', 'mobile_hero_image',
                'requirements_icon1', 'requirements_icon2', 'requirements_icon3',
                'features_card1_icon', 'features_card2_icon', 'features_card3_icon', 'features_card4_icon'
            ];
    
            foreach ($images as $image) {
                if ($request->hasFile($image)) {
                    // Delete old image if exists
                    if ($homepageContent->$image) {
                        \Storage::disk('public')->delete($homepageContent->$image);
                    }
    
                    // Upload new image
                    $homepageContent->$image = $request->file($image)->store('home', 'public');
                }
            }
    
            // Update other content excluding image fields
            $homepageContent->update($request->except($images));
    
            return redirect()->route('admin.homepage.index')->with('success', 'Home page updated successfully.');
        } catch (\Exception $e) {
            // Debug and display the exact error message
            return redirect()->route('admin.homepage.index')->withErrors(['error' => $e->getMessage()]);
        }
    }
}
