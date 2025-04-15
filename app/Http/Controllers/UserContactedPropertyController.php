<?php

namespace App\Http\Controllers;

use App\Models\UserContactedProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserContactedPropertyController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'propertyable_id' => 'required|integer',
            'property_ref_no' => 'nullable|string',
            'contacted_through' => 'nullable|string',
            'url' => 'nullable|url',
        ]);

        $url = $request->input('url');
        $sourcePage = 'Unknown Page';
        $propertyableType = null;

        $parsedUrl = parse_url($url, PHP_URL_PATH);
        $segments = collect(explode('/', trim($parsedUrl, '/')));
        $firstSegment = $segments->first();

        switch ($firstSegment) {
            case 'properties':
                if ($segments->count() === 2) {
                    $sourcePage = 'Property Details Page';
                    $propertyableType = 'commercial';
                }
                else {
                    $sourcePage = 'Properties Page';
                    $propertyableType = 'commercial';
                }
                break;

            case 'agents':
                if ($segments->count() === 2) {
                    $sourcePage = 'Agent Details Page';
                    $propertyableType = 'commercial';
                }
                else {
                    $sourcePage = 'Agents Page';
                    $propertyableType = 'commercial';
                }
                break;

            case 'user':
                $sourcePage = 'User Account Page';
                $propertyableType = $request->property_type === 'holiday' ? 'holiday' : 'commercial';
                break;

            case 'holiday-properties':
                if ($segments->count() === 2) {
                    $sourcePage = 'Holiday Property Details Page';
                    $propertyableType = 'holiday';
                }else {
                    $sourcePage = 'Holiday Properties Page';
                    $propertyableType = 'holiday';
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

        $propertyableType = match ($propertyableType) {
            'commercial' => \App\Models\Listing::class,
            'holiday' => \App\Models\HolidayProperty::class,
            default => null,
        };

        if (!$propertyableType) {
            return response()->json(['error' => 'Invalid property type'], 422);
        }


        $contact = UserContactedProperty::create([
            'user_id' => $request->user_id,
            'propertyable_type' => $propertyableType,
            'propertyable_id' => $request->propertyable_id,
            'property_ref_no' => $request->property_ref_no,
            'source_page' => $sourcePage,
            'contacted_through' => $request->contacted_through,
        ]);

        return response()->json([
            'message' => 'Contact record saved successfully.',
            'data' => $contact
        ], 201);
    }
}
