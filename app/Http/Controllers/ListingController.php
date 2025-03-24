<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingRequest;
use App\Models\Developer;
use App\Models\District;
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
        $districts = District::all();
        $developers = Developer::all();
        return view('admin.listings.create', compact('facilities', 'districts', 'developers'));
    }

    public function store(ListingRequest $request)
    {
        $validatedData = $request->validated();

        // Set xml to 0 by default
        $validatedData['xml'] = 0;

        // ✅ Handle file uploads
        if ($request->hasFile('listing_agent_photo')) {
            $validatedData['listing_agent_photo'] = $request->file('listing_agent_photo')->store('uploads/listing_agents', 'public');
        }

        if ($request->hasFile('company_logo')) {
            $validatedData['company_logo'] = $request->file('company_logo')->store('uploads/company_logos', 'public');
        }

        if ($request->hasFile('brochure')) {
            $validatedData['brochure'] = $request->file('brochure')->store('uploads/brochures', 'public');
        }

        $listing = Listing::create($validatedData);

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
        $districts = District::all();
        $developers = Developer::all();
        $facilities = Facility::all();
        $selectedFacilities = $listing->facilities->pluck('id')->toArray();
        return view('admin.listings.edit', compact('listing', 'facilities', 'selectedFacilities', 'districts', 'developers'));  
    }

    public function update(ListingRequest $request, Listing $listing)
    {
        $validatedData = $request->validated();
    
        // ✅ Handle file uploads properly
        if ($request->hasFile('listing_agent_photo')) {
            // Delete old photo if exists
            if ($listing->listing_agent_photo) {
                \Storage::delete('public/' . $listing->listing_agent_photo);
            }
            $validatedData['listing_agent_photo'] = $request->file('listing_agent_photo')->store('uploads/listing_agents', 'public');
        }
    
        if ($request->hasFile('company_logo')) {
            if ($listing->company_logo) {
                \Storage::delete('public/' . $listing->company_logo);
            }
            $validatedData['company_logo'] = $request->file('company_logo')->store('uploads/company_logos', 'public');
        }
    
        if ($request->hasFile('brochure')) {
            if ($listing->brochure) {
                \Storage::delete('public/' . $listing->brochure);
            }
            $validatedData['brochure'] = $request->file('brochure')->store('uploads/brochures', 'public');
        }
    
        // ✅ Update listing with validated data
        $listing->update($validatedData);
    
        // ✅ Handle images if XML is 0
        if ($listing->xml == 0) {
            // 🖼️ Upload and replace new images
            if ($request->hasFile('images')) {
                // Delete old images
                $listing->images()->delete();
                foreach ($request->file('images') as $image) {
                    $path = $image->store('listings', 'public');
                    $listing->images()->create([
                        'url' => $path,
                    ]);
                }
            }
        } elseif ($listing->xml == 1) {
            // 🔗 Update Image Links if XML is 1
            if ($request->has('image_links')) {
                $listing->images()->delete(); // Remove old image links
                foreach ($request->image_links as $link) {
                    if ($link) {
                        $listing->images()->create([
                            'url' => $link,
                        ]);
                    }
                }
            }
        }
    
        // ✅ Sync facilities if updated
        if ($request->has('facilities')) {
            $listing->facilities()->sync($request->facilities);
        }
    
        return redirect()->route('admin.listings.index')->with('success', 'Listing updated successfully.');
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
