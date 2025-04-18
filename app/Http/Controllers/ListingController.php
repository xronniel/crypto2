<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingRequest;
use App\Models\Agent;
use App\Models\Community;
use App\Models\Developer;
use App\Models\District;
use App\Models\Emirates;
use App\Models\Facility;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::latest()->paginate(10); // Paginate to 10 per page

        foreach ($listings as $listing) {
            if ($listing->off_plan == 1) {
                $listing->payment_plan_cards_url = route('admin.listings.payment-plan-cards.index', $listing);
                $listing->payment_plan_timelines_url = route('admin.listings.payment-plan-timelines.index', $listing);
            }
        }

        return view('admin.listings.index', compact('listings'));
    }

    public function create()
    {
        $facilities = Facility::where('name', '!=', '')->get();
        $districts = District::all();
        $developers = Developer::all();
        $agents = Agent::all(); 
        $communities = Community::all();
        $emirates = Emirates::all();
        $adTypes = Listing::distinct()->pluck('ad_type');
        $unitTypes = Listing::distinct()->pluck('unit_type');
  
        return view('admin.listings.create', compact('facilities', 'districts', 'developers', 'agents', 'communities', 'emirates', 'adTypes', 'unitTypes'))->with('listing', null);
    }

    public function store(ListingRequest $request)
    {
        $validatedData = $request->validated();

        // Set xml to 0 by default
        $validatedData['xml'] = 0;

        if (!empty($validatedData['community_id'])) {
            $community = Agent::find($validatedData['agent_id']);
            if ($community) {
                $validatedData['community'] = $community->name ?? null;
            }
        }


        if (!empty($validatedData['agent_id'])) {
            $agent = Agent::find($validatedData['agent_id']);
            if ($agent) {
                $validatedData['listing_agent'] = $agent->name ?? null;
                $validatedData['listing_agent_phone'] = $agent->phone ?? null;
                $validatedData['listing_agent_email'] = $agent->email ?? null;
                $validatedData['listing_agent_photo'] = $agent->photo ?? null;
                $validatedData['listing_agent_permit'] = $agent->permit ?? null;
                $validatedData['listing_agent_whatsapp'] = $agent->whatsapp ?? null;
            }
        }

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

        if ($request->hasFile('floor_plan')) {
            $validatedData['floor_plan'] = $request->file('floor_plan')->store('uploads/floor_plans', 'public');
        }

        if ($request->hasFile('fact_sheet') && isset($validatedData['off_plan']) && $validatedData['off_plan'] == 1) {
            $validatedData['fact_sheet'] = $request->file('fact_sheet')->store('uploads/fact_sheets', 'public');
        }

        if ($request->hasFile('payment_plan') && isset($validatedData['off_plan']) && $validatedData['off_plan'] == 1) {
            $validatedData['payment_plan'] = $request->file('payment_plan')->store('uploads/payment_plans', 'public');
        }

        $listing = Listing::create($validatedData);

        // Handle off-plan keys if off_plan is 1
        if (isset($validatedData['off_plan']) && $validatedData['off_plan'] == 1 && $request->has('off_plan_keys')) {
            foreach ($request->off_plan_keys as $key => $keyData) {
                $listing->offPlanKeys()->create([
                    'key' => $keyData['key'],
                    'value' => $keyData['value'],
                    'status' => $keyData['status'] ?? 'active'
                ]);
            }
        }

        // Handle off-plan images if off_plan is 1
        if (isset($validatedData['off_plan']) && $validatedData['off_plan'] == 1 && $request->has('off_plan_images') && is_array($request->off_plan_images)) {
            foreach ($request->off_plan_images as $key => $imageData) {
                $path = $imageData['image']->store('uploads/off_plan_images', 'public');
                $offPlanImage = [
                    'image' => $path,
                    'type' => $imageData['type']
                ];
                $listing->offPlanImages()->create($offPlanImage);
            }
        }

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
        $facilities = Facility::where('name', '!=', '')->get();
        $districts = District::all();
        $developers = Developer::all();
        $agents = Agent::all(); 
        $communities = Community::all();
        $emirates = Emirates::all();
        $adTypes = Listing::distinct()->pluck('ad_type');
        $unitTypes = Listing::distinct()->pluck('unit_type');
        $facilities = Facility::all();
        $selectedFacilities = $listing->facilities->pluck('id')->toArray();
        
        $offPlanKeys = [];
        $offPlanImages = [];
        if ($listing->off_plan) {
            $offPlanKeys = $listing->offPlanKeys()->get();
            $offPlanImages = $listing->offPlanImages()->get();
        }

        return view('admin.listings.edit', compact(
            'listing',
            'facilities',
            'selectedFacilities',
            'districts',
            'developers',
            'agents',
            'communities',
            'emirates',
            'adTypes',
            'unitTypes',
            'offPlanKeys',
            'offPlanImages'
        ));
    }

    public function update(ListingRequest $request, Listing $listing)
    {
        $validatedData = $request->validated();
        //dd($validatedData);
    
        // Preserve xml value to avoid overwriting
        $validatedData['xml'] = $listing->xml;
    
        // ✅ Update agent-related fields if agent_id changes
        if (!empty($validatedData['agent_id']) && $validatedData['agent_id'] != $listing->agent_id) {
            $agent = Agent::find($validatedData['agent_id']);
            if ($agent) {
                $validatedData['listing_agent'] = $agent->name ?? null;
                $validatedData['listing_agent_phone'] = $agent->phone ?? null;
                $validatedData['listing_agent_email'] = $agent->email ?? null;
                $validatedData['listing_agent_photo'] = $agent->photo ?? null;
                $validatedData['listing_agent_permit'] = $agent->permit ?? null;
                $validatedData['listing_agent_whatsapp'] = $agent->whatsapp ?? null;
            }
        }
    
        // ✅ Handle file uploads
        if ($request->hasFile('listing_agent_photo')) {
            if ($listing->listing_agent_photo && Storage::disk('public')->exists($listing->listing_agent_photo)) {
                Storage::disk('public')->delete($listing->listing_agent_photo);
            }
            $validatedData['listing_agent_photo'] = $request->file('listing_agent_photo')->store('uploads/listing_agents', 'public');
        }
    
        if ($request->hasFile('company_logo')) {
            if ($listing->company_logo && Storage::disk('public')->exists($listing->company_logo)) {
                Storage::disk('public')->delete($listing->company_logo);
            }
            $validatedData['company_logo'] = $request->file('company_logo')->store('uploads/company_logos', 'public');
        }
    
        if ($request->hasFile('brochure')) {
            if ($listing->brochure && Storage::disk('public')->exists($listing->brochure)) {
                Storage::disk('public')->delete($listing->brochure);
            }
            $validatedData['brochure'] = $request->file('brochure')->store('uploads/brochures', 'public');
        }

        if ($request->hasFile('floor_plan')) {
            if ($listing->floor_plan) {
                Storage::disk('public')->delete($listing->floor_plan);
            }
            $validatedData['floor_plan'] = $request->file('floor_plan')->store('uploads/floor_plans', 'public');
        }

        // Handle fact_sheet upload only if off_plan is 1
        if ($request->hasFile('fact_sheet') && isset($validatedData['off_plan']) && $validatedData['off_plan'] == 1) {
            if ($listing->fact_sheet) {
                Storage::disk('public')->delete($listing->fact_sheet);
            }
            $validatedData['fact_sheet'] = $request->file('fact_sheet')->store('uploads/fact_sheets', 'public');
        }

        if ($request->hasFile('payment_plan') && isset($validatedData['off_plan']) && $validatedData['off_plan'] == 1) {
            if ($listing->payment_plan) {
                Storage::disk('public')->delete($listing->payment_plan);
            }
            $validatedData['payment_plan'] = $request->file('payment_plan')->store('uploads/payment_plans', 'public');
        }

        // Handle off-plan keys if off_plan is 1
        if (isset($validatedData['off_plan']) && $validatedData['off_plan'] == 1 && $request->has('off_plan_keys')) {
            // Delete existing off-plan keys
            $listing->offPlanKeys()->delete();

            // Add new off-plan keys
            foreach ($request->off_plan_keys as $key => $keyData) {
                $listing->offPlanKeys()->create([
                    'key' => $keyData['key'],
                    'value' => $keyData['value'],
                    'status' => $keyData['status'] ?? 'active'
                ]);
            }
        }

        // Handle off-plan images if off_plan is 1
        if (isset($validatedData['off_plan']) && $validatedData['off_plan'] == 1 && $request->has('off_plan_images') && is_array($request->off_plan_images)) {
            foreach ($request->off_plan_images as $key => $imageData) {
                if (isset($imageData['id'])) {
                    $existingImage = $listing->offPlanImages()->find($imageData['id']);
                    if ($existingImage) {
                        if (isset($imageData['type'])) {
                            $existingImage->update(['type' => $imageData['type']]);
                        }

                        if (isset($imageData['image']) && $imageData['image'] instanceof \Illuminate\Http\UploadedFile) {
                            Storage::disk('public')->delete($existingImage->image);
                            $path = $imageData['image']->store('uploads/off_plan_images', 'public');
                            $existingImage->update(['image' => $path]);
                        }
                        continue;
                    }
                }
                
                if (isset($imageData['image']) && $imageData['image'] instanceof \Illuminate\Http\UploadedFile) {
                    $path = $imageData['image']->store('uploads/off_plan_images', 'public');
                    $offPlanImage = [
                        'image' => $path,
                        'type' => $imageData['type']
                    ];
                    $listing->offPlanImages()->create($offPlanImage);
                }
            }
        }
    
        // ✅ Update Listing
        $listing->update($validatedData);
    
        // ✅ Handle image updates based on xml value
        if ($validatedData['xml'] == 0) {
            // 🖼️ Remove previous images
            $listing->images()->delete();
    
            // 🖼️ Upload and Save New Images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('listings', 'public');
                    $listing->images()->create([
                        'url' => $path,
                    ]);
                }
            }
        } elseif ($validatedData['xml'] == 1) {
            // 🔗 Remove previous image links
            $listing->images()->delete();
    
            // 🔗 Save New Image Links
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
    
        // ✅ Sync facilities if selected
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
