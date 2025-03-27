@extends('layouts.back-office.app')

@section('content')
<div class="container pt-2">
    <h1 class="mb-4">Listing Details</h1>
    <a href="{{ route('admin.listings.index') }}" class="btn btn-secondary mb-3">Back to Listings</a>

    <div class="card shadow-sm">
        <div class="card-body">
            <!-- Basic Information Section -->
            <h4 class="mb-4">Basic Information</h4>
            <div class="row">
                @foreach($fillable as $column)
                    @if(!in_array($column, [
                        'listing_agent', 
                        'listing_agent_phone', 
                        'listing_agent_email', 
                        'listing_agent_photo', 
                        'listing_agent_permit', 
                        'listing_agent_whatsapp'
                    ])) <!-- Skip agent-related fields -->
            
                        <div class="col-md-6 mb-3">
                            <strong>{{ ucfirst(str_replace('_', ' ', $column)) }}:</strong>
                            @if(in_array($column, ['exclusive', 'featured', 'price_on_application', 'off_plan', 'new', 'verified', 'superagent', 'xml']))
                                {{ $listing->$column ? 'Yes' : 'No' }}
                            @elseif(strpos($column, 'price') !== false || strpos($column, 'area') !== false)
                                AED {{ number_format($listing->$column, 2) }}
                            @elseif(strpos($column, 'date') !== false || strpos($column, 'updated_at') !== false || strpos($column, 'created_at') !== false)
                                {{ $listing->$column ? \Carbon\Carbon::parse($listing->$column)->format('d M Y') : 'N/A' }}
                            @elseif($column == 'type')
                                {{ $listing->$column ?? 'N/A' }}
                            @elseif($column == 'company_logo' || $column == 'qr_code' || $column == 'floor_plan')
                                @php
                                    $isUrl = filter_var($listing->$column, FILTER_VALIDATE_URL);
                                @endphp
                                @if($listing->$column)
                                    <img src="{{ $isUrl ? $listing->$column : asset('storage/' . $listing->$column) }}" alt="{{ $column }}" class="img-fluid mt-2" width="150">
                                @else
                                    N/A
                                @endif
                            @elseif($column == 'web_remarks')
                                {!! $listing->$column ?: '<p>N/A</p>' !!}
                            @elseif($column == 'description')
                                <p>{{ $listing->$column ?: 'N/A' }}</p>
                            @else
                                {{ $listing->$column ?: 'N/A' }}
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
            

            <hr>

            <!-- Agent Details Section -->
            <h4 class="mt-4">Listing Agent</h4>
            <div class="row mb-4">
                <div class="col-md-6">
                    <p><strong>Name:</strong> {{ $listing->listing_agent ?: 'N/A' }}</p>
                    <p><strong>Email:</strong> {{ $listing->listing_agent_email ?: 'N/A' }}</p>
                    <p><strong>Phone:</strong> {{ $listing->listing_agent_phone ?: 'N/A' }}</p>
                    <p><strong>Permit:</strong> {{ $listing->listing_agent_permit ?: 'N/A' }}</p>
                    <p><strong>WhatsApp:</strong> {{ $listing->listing_agent_whatsapp ?: 'N/A' }}</p>
                </div>
                <div class="col-md-6 text-center">
                    @if($listing->listing_agent_photo)
                        @php
                            // Check if the listing_agent_photo is an external URL
                            $isUrl = filter_var($listing->listing_agent_photo, FILTER_VALIDATE_URL);
                        @endphp
                
                        <img src="{{ $isUrl ? $listing->listing_agent_photo : asset('storage/' . $listing->listing_agent_photo) }}" 
                            alt="Agent Photo" class="img-thumbnail mt-2" width="150">
                    @else
                        <p>No Agent Photo</p>
                    @endif
                </div>
            </div>

            <hr>

            <!-- Facilities Section -->
            <h4 class="mt-4">Facilities</h4>
            @if($listing->facilities->isNotEmpty())
                <ul class="list-group">
                    @foreach($listing->facilities as $facility)
                        <li class="list-group-item">{{ $facility->name }}</li>
                    @endforeach
                </ul>
            @else
                <p>No facilities added.</p>
            @endif

            <hr>

            <!-- Floor Plan Section -->
            <h4 class="mt-4">Floor Plan</h4>
            @if($listing->floor_plan)
                <div class="mt-2">
                    <img src="{{ $listing->xml ? $listing->floor_plan : asset('storage/' . $listing->floor_plan) }}" 
                        alt="Floor Plan" class="img-fluid img-thumbnail" style="max-height: 300px;">
                    <p class="mt-2">
                        <a href="{{ $listing->xml ? $listing->floor_plan : asset('storage/' . $listing->floor_plan) }}" target="_blank">
                            View Full Floor Plan
                        </a>
                    </p>
                </div>
            @else
                <p>No floor plan available.</p>
            @endif

            <hr>

            <!-- Brochure Section -->
            <h4 class="mt-4">Brochure</h4>
            @if($listing->brochure)
                <p>
                    <a href="{{ asset('storage/' . $listing->brochure) }}" target="_blank" class="btn btn-outline-primary">
                        View Brochure
                    </a>
                </p>
            @else
                <p>No brochure available.</p>
            @endif

            <hr>

            <!-- Company Logo Section -->
            <h4 class="mt-4">Company Logo</h4>
            @if($listing->company_logo)
                @php
                    // Check if the company_logo is a URL or stored in storage
                    $isUrl = filter_var($listing->company_logo, FILTER_VALIDATE_URL);
                @endphp
                <img src="{{ $isUrl ? $listing->company_logo : asset('storage/' . $listing->company_logo) }}" 
                     alt="Company Logo" class="img-fluid" width="150">
            @else
                <p>No company logo available.</p>
            @endif
            <hr>

            <!-- Images Section -->
            <h4 class="mt-4">Images</h4>
            <div class="row">
                @if($listing->images->isNotEmpty())
                    @foreach($listing->images as $image)
             
                        <div class="col-md-3 mb-3">
                            <img src="{{ $listing->xml ? $image->url : asset('storage/' . $image->url) }}" 
                                alt="Listing Image" class="img-fluid img-thumbnail" style="max-height: 200px;">
                        </div>
                    @endforeach
                @else
                    <p class="col-md-12">No images available.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
