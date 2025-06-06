<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyLeadRequest;
use App\Mail\AdminNewLeadNotification;
use App\Mail\UserNewLeadConfirmation;
use App\Models\PropertyLead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PropertyLeadController extends Controller
{
    public function store(StorePropertyLeadRequest $request)
    {
        $url = $request->input('url');
        $sourcePage = 'Unknown Page';
        $propertyRefNo = null;
    
        // Parse and segment the path from the URL
        $parsedUrl = parse_url($url, PHP_URL_PATH);
        $segments = collect(explode('/', trim($parsedUrl, '/')));
        $firstSegment = $segments->first();

        switch ($firstSegment) {
            case 'properties':
                if ($segments->count() === 2) {
                    $sourcePage = 'Property Details Page';
                    $propertyRefNo = $segments->last();
                }
                else {
                    $sourcePage = 'Properties Page';
                    $propertyRefNo = null;
                }
                break;

            case 'holiday-properties':
                if ($segments->count() === 2) {
                    $sourcePage = 'Holiday Property Details Page';
                    $propertyRefNo = $segments->last();
                }else {
                    $sourcePage = 'Holiday Properties Page';
                    $propertyRefNo = null;
                }
                break;
    
            case null:
                $sourcePage = 'Homepage';
                break;
    
            case 'contact':
                $sourcePage = 'Contact Page';
                break;
    
            case 'about':
                $sourcePage = 'About Page';
                break;
    
            case 'blog':
                $sourcePage = 'Blog Page';
                break;
    
            default:
                $sourcePage = ucfirst($firstSegment) . ' Page';
                break;
        }
    
        $lead = PropertyLead::create([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'source_page' => $sourcePage,
            'property_ref_no' => $propertyRefNo,
        ]);


         // Retrieve all users with the "Admin" role
        $adminUsers = User::role('Admin')->get();

        // Send email to all admins
        foreach ($adminUsers as $admin) {
            // Mail::to($admin->email)->send(new AdminNewLeadNotification($lead));
        }


        // Send confirmation email to the user
        // Mail::to($request->input('email'))->send(new UserNewLeadConfirmation($lead));
    
        return response()->json([
            'message' => 'Thank you! Your inquiry has been received.',
            'data' => $lead
        ], 201);
    }

    public function index()
    {
        // Retrieve all property leads, optionally with pagination
        $leads = PropertyLead::latest()->paginate(10);

        // Return a view for the admin to display the leads
        return view('admin.property-leads.index', compact('leads'));
    }
    
    public function show(PropertyLead $lead)
    {
        $property = null;
        $type = null;

        // Determine the property type based on the source page or property_ref_no
        if (str_contains($lead->source_page, 'Holiday')) {
            $property = \App\Models\HolidayProperty::where('reference_number', $lead->property_ref_no)->first();
            $type = 'holiday';
        } else {
            $property = \App\Models\Listing::where('property_ref_no', $lead->property_ref_no)->first();
            $type = 'listing';
        }
        // dd($lead, $property, $type);
        return view('admin.property-leads.show', compact('lead', 'property', 'type'));
    }

}
