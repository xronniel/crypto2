<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::latest()->paginate(10); // Paginate to 10 per page
        return view('admin.listings.index', compact('listings'));
    }

    public function create()
    {
        $facilities = Facility::all();
        return view('admin.listings.create', compact('facilities'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'property_title' => 'required|string|max:255',
            'ad_type' => 'required|string|max:255',
            'community' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'listing_agent' => 'required|string|max:255',
            'listing_agent_phone' => 'nullable|string|max:255',
            'listing_agent_email' => 'nullable|email|max:255',
            'listing_agent_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // ✅ Fix for agent photo
            'property_ref_no' => 'required|string|max:255',
            'property_name' => 'required|string|max:255',
            'unit_type' => 'nullable|string|max:255',
            'unit_model' => 'nullable|string|max:255',
            'primary_view' => 'nullable|string|max:255',
            'unit_builtup_area' => 'nullable|numeric|min:0',
            'unit_reference_no' => 'nullable|string|max:255',
            'plot_area' => 'nullable|numeric|min:0',
            'no_of_bathroom' => 'nullable|integer|min:0',
            'no_of_rooms' => 'nullable|integer|min:0',
            'bedrooms' => 'nullable|integer|min:0',
            'latitude' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
            'emirate' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', 
            'permit_number' => 'nullable|string|max:255',
            'completion_status' => 'nullable|string|max:255',
            'listing_date' => 'nullable|date',
            'web_remarks' => 'nullable|string',
            'description' => 'nullable|string',
            'brochure' => 'nullable|mimes:pdf,jpeg,png,jpg,gif,svg',
            'cheques' => 'nullable|integer|min:1', 
            'parking' => 'nullable|integer|min:0', 
            'unit_measure' => 'nullable|string|max:255',
            'listing_agent_permit' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // ✅ For multiple image uploads
            'facilities' => 'nullable|array',
            'facilities.*' => 'exists:facilities,id',
      
        ]);

        // Set xml to 0 by default
        $validatedData['xml'] = 0;

        // ✅ Handle file uploads
        if ($request->hasFile('listing_agent_photo')) {
            $data['listing_agent_photo'] = $request->file('listing_agent_photo')->store('uploads/listing_agents', 'public');
        }

        if ($request->hasFile('company_logo')) {
            $data['company_logo'] = $request->file('company_logo')->store('uploads/company_logos', 'public');
        }

        if ($request->hasFile('brochure')) {
            $data['brochure'] = $request->file('brochure')->store('uploads/brochures', 'public');
        }

        $listing = Listing::create($validatedData);
        dd($listing, $request->all());
        if ($validatedData['xml'] == 0) {
            // 🖼️ Upload and Save Images if XML is 0
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('listings', 'public');
                    $listing->images()->create([
                        'url' => $path,
                    ]);
                }
            }
        } elseif ($validatedData['xml'] == 1) {
            // 🔗 Save Image Links if XML is 1
            if ($request->has('image_links')) {
                foreach ($request->image_links as $link) {
                    if ($link) {
                        $listing->images()->create([
                            'url' => $link,
                        ]);
                    }
                }
            }
        }

        if ($request->has('facilities')) {
            $listing->facilities()->sync($request->facilities);
        }
    

        return redirect()->route('admin.listings.index')->with('success', 'Listing created successfully.');
    }

    public function edit(Listing $listing)
    {
        $facilities = Facility::all();
        $selectedFacilities = $listing->facilities->pluck('id')->toArray();
        return view('admin.listings.edit', compact('listing', 'facilities', 'selectedFacilities'));
    }

    public function update(Request $request, Listing $listing)
    {
  
        $validatedData = $request->validate([
            'ad_type' => 'required|string|max:255',
            'unit_type' => 'required|string|max:255',
            'unit_model' => 'nullable|string|max:255',
            'primary_view' => 'nullable|string|max:255',
            'unit_builtup_area' => 'required|numeric',
            'no_of_bathroom' => 'required|integer',
            'property_title' => 'required|string|max:255',
            'web_remarks' => 'nullable|string',
            'emirate' => 'required|string|max:255',
            'community' => 'required|string|max:255',
            'exclusive' => 'boolean',
            'cheques' => 'required|integer',
            'plot_area' => 'required|numeric',
            'property_name' => 'required|string|max:255',
            'property_ref_no' => 'required|string|max:255|unique:listings,property_ref_no,' . $listing->id,
            'listing_agent' => 'required|string|max:255',
            'listing_agent_phone' => 'required|string|max:255',
            'listing_agent_photo' => 'nullable|string|max:255',
            'listing_agent_permit' => 'required|string|max:255',
            'listing_date' => 'nullable|date',
            'last_updated' => 'nullable|date',
            'bedrooms' => 'required|string|max:255',
            'listing_agent_email' => 'required|email|max:255',
            'price' => 'required|numeric',
            'unit_reference_no' => 'required|string|max:255',
            'no_of_rooms' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'unit_measure' => 'required|string|max:255',
            'featured' => 'boolean',
            'fitted' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'web_tour' => 'nullable|string|max:255',
            'threesixty_tour' => 'nullable|string|max:255',
            'virtual_tour' => 'nullable|string|max:255',
            'qr_code' => 'nullable|string|max:255',
            'company_logo' => 'nullable|string|max:255',
            'parking' => 'required|integer',
            'preview_link' => 'nullable|string|max:255',
            'strno' => 'nullable|string|max:255',
            'price_on_application' => 'boolean',
            'off_plan' => 'boolean',
            'permit_number' => 'required|string|max:255',
            'completion_status' => 'required|string|max:255',
            'xml' => 'boolean',
            'available_from' => 'nullable|date',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'brochure' => 'nullable|string|max:255',
            'new' => 'boolean',
            'verified' => 'boolean',
            'superagent' => 'boolean',
            'listing_agent_whatsapp' => 'nullable|string|max:255',
            'type' => 'nullable|in:NA,Residential,Commercial,Holiday,Mortgages',
            'developer_id' => 'nullable|exists:developers,id',
            'district_id' => 'nullable|exists:districts,id',
            'images.*' => 'nullable|file|mimes:jpeg,png,jpg,gif',
            'image_links.*' => 'nullable|string|max:255',
            'facilities' => 'nullable|array',
            'facilities.*' => 'exists:facilities,id',    
        ]);

        $listing->update($validatedData);

        $listing->images()->delete();

        if ($listing->xml == 0) {
            // 🖼️ Upload and Save Images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('listings', 'public');
                    $listing->images()->create([
                        'url' => $path,
                    ]);
                }
            }
        } elseif ($listing->xml == 1) {
            // 🔗 Save Image Links
            if ($request->has('image_links')) {
                foreach ($request->image_links as $link) {
                    if ($link) {
                        $listing->images()->create([
                            'url' => $link,
                        ]);
                    }
                }
            }
        }
    

        // ✅ Sync Facilities if Provided
        if ($request->has('facilities')) {
            $listing->facilities()->sync($request->facilities);
        } else {
            // Remove facilities if none are selected
            $listing->facilities()->detach();
        }

        return redirect()->route('listings.index')->with('success', 'Listing updated successfully.');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->route('admin.listings.index')->with('success', 'Listing deleted successfully.');
    }
    
    public function show($id)
{
    $listing = Listing::findOrFail($id);

    // List of fillable fields to dynamically populate in views
    $fillable = [
        'ad_type',
        'unit_type',
        'unit_model',
        'primary_view',
        'unit_builtup_area',
        'no_of_bathroom',
        'property_title',
        'web_remarks',
        'emirate',
        'community',
        'exclusive',
        'cheques',
        'plot_area',
        'property_name',
        'property_ref_no',
        'listing_agent',
        'listing_agent_phone',
        'listing_agent_photo',
        'listing_agent_permit',
        'listing_date',
        'last_updated',
        'bedrooms',
        'listing_agent_email',
        'price',
        'unit_reference_no',
        'no_of_rooms',
        'latitude',
        'longitude',
        'unit_measure',
        'featured',
        'fitted',
        'company_name',
        'web_tour',
        'threesixty_tour',
        'virtual_tour',
        'qr_code',
        'company_logo',
        'parking',
        'preview_link',
        'strno',
        'price_on_application',
        'off_plan',
        'permit_number',
        'completion_status',
        'xml',
        'available_from',
        'description',
        'location',
        'brochure',
        'new',
        'verified',
        'superagent',
        'listing_agent_whatsapp',
        'type',
        'created_at',
        'updated_at',
        'developer_id',
        'district_id',
    ];

    return view('admin.listings.show', compact('listing', 'fillable'));
}


}
