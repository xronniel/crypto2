<?php

namespace App\Http\Controllers;

use App\Models\MortgageLandingPage;
use App\Models\TrustItem;
use Illuminate\Http\Request;

class MortgageLandingPageController extends Controller
{
    public function index()
    {
        $page = MortgageLandingPage::first();
        return $page
            ? redirect()->route('admin.mortgage-landing-page.edit', $page->id)
            : redirect()->route('admin.mortgage-landing-page.create');
    }

    public function create()
    {
        return view('admin.mortgage-landing-page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hero_title' => 'required|string|max:255',
            'trust_section_title' => 'nullable|string|max:255',
            'trust_section_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'step_section_title' => 'nullable|string|max:255',
            'trust_items.*.icon' => 'nullable|file|image|mimes:jpg,jpeg,png,svg,webp|max:2048', // ✅ UPDATED
        ]);

        $data = $request->only(['hero_title', 'trust_section_title', 'step_section_title']);

        // ✅ UPDATED: Handle trust_section_image upload
        if ($request->hasFile('trust_section_image')) {
            $data['trust_section_image'] = $request->file('trust_section_image')->store('trust_images', 'public');
        }

        $page = MortgageLandingPage::create($data);

        // ✅ UPDATED: Handle trust item icon uploads
        if ($request->has('trust_items')) {
            foreach ($request->trust_items as $item) {
                $iconPath = null;
                if (isset($item['icon']) && is_file($item['icon'])) {
                    $iconPath = $item['icon']->store('trust_icons', 'public');
                }

                $page->trustItems()->create([
                    'icon' => $iconPath,
                    'description' => $item['description'],
                ]);
            }
        }

        return redirect()->back()->with('success', 'Mortgage landing page created successfully!');
    }

    public function edit(MortgageLandingPage $page)
    {
        return view('admin.mortgage-landing-page.edit', compact('page'));
    }

    public function update(Request $request, MortgageLandingPage $page)
    {
        $request->validate([
            'hero_title' => 'required|string|max:255',
            'trust_section_title' => 'nullable|string|max:255',
            'trust_section_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'step_section_title' => 'nullable|string|max:255',
            'trust_items.*.icon' => 'nullable|file|image|mimes:jpg,jpeg,png,svg,webp|max:2048', // ✅ UPDATED
        ]);

        $data = $request->only(['hero_title', 'trust_section_title', 'step_section_title']);

        // ✅ UPDATED: Image update for main section
        if ($request->hasFile('trust_section_image')) {
            $data['trust_section_image'] = $request->file('trust_section_image')->store('trust_images', 'public');
        }

        $page->update($data);

        $existingIds = [];

        // ✅ UPDATED: Loop through trust items and manage file uploads
        if ($request->has('trust_items')) {
            foreach ($request->trust_items as $item) {
                $iconPath = null;
                if (isset($item['icon']) && is_file($item['icon'])) {
                    $iconPath = $item['icon']->store('trust_icons', 'public');
                }

                if (!empty($item['id'])) {
                    $trustItem = $page->trustItems()->find($item['id']);
                    if ($trustItem) {
                        $trustItem->update([
                            'icon' => $iconPath ?? $trustItem->icon, // Keep old if not updated
                            'description' => $item['description'],
                        ]);
                        $existingIds[] = $trustItem->id;
                    }
                } else {
                    $newItem = $page->trustItems()->create([
                        'icon' => $iconPath,
                        'description' => $item['description'],
                    ]);
                    $existingIds[] = $newItem->id;
                }
            }
        }

        $page->trustItems()->whereNotIn('id', $existingIds)->delete();

        return redirect()->back()->with('success', 'Mortgage landing page updated successfully!');
    }

    
    
}
