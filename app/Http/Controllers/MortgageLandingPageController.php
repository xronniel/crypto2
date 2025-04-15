<?php

namespace App\Http\Controllers;

use App\Models\MortgageLandingPage;
use App\Models\TrustItem;
use Illuminate\Http\Request;

class MortgageLandingPageController extends Controller
{
    public function index()
    {
        // Retrieve the first MortgageLandingPage item
        $page = MortgageLandingPage::first();

        // Redirect to the appropriate view
        if ($page) {
            return redirect()->route('admin.mortgage-landing-page.edit', $page->id);
        } else {
            return redirect()->route('admin.mortgage-landing-page.create');
        }
    }

    public function create()
    {
        return view('admin.mortgage-landing-page.create');
    }

    public function store(Request $request)
    {
        $data = $request->only(['hero_title', 'trust_section_title', 'trust_section_image', 'step_section_title']);
    
        $page = MortgageLandingPage::create($data);
    
        if ($request->has('trust_items')) {
            foreach ($request->trust_items as $item) {
                $page->trustItems()->create([
                    'icon' => $item['icon'] ?? null,
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
        $data = $request->only(['hero_title', 'trust_section_title', 'trust_section_image', 'step_section_title']);
        $page->update($data);

        $existingIds = [];

        if ($request->has('trust_items')) {
            foreach ($request->trust_items as $item) {
                if (isset($item['id'])) {
                    // Update existing
                    $trustItem = TrustItem::find($item['id']);
                    if ($trustItem) {
                        $trustItem->update([
                            'icon' => $item['icon'] ?? null,
                            'description' => $item['description'],
                        ]);
                        $existingIds[] = $trustItem->id;
                    }
                } else {
                    // New item
                    $page->trustItems()->create([
                        'icon' => $item['icon'] ?? null,
                        'description' => $item['description'],
                    ]);
                }
            }
        }

        // Delete removed trust items
        $page->trustItems()->whereNotIn('id', $existingIds)->delete();

        return redirect()->back()->with('success', 'Mortgage landing page updated successfully!');
    }
    
}
