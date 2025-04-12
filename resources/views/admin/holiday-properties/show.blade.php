@extends('layouts.back-office.app')

@section('content')
<div class="container pt-4">
    <h1 class="mb-4">Holiday Property Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reference Number: {{ $holidayProperty->reference_number }}</h5>

            <p><strong>Offering Type:</strong> {{ $holidayProperty->offering_type }}</p>
            <p><strong>Property Type:</strong> {{ $holidayProperty->property_type }}</p>
            <p><strong>Price on Application:</strong> {{ $holidayProperty->price_on_application ? 'Yes' : 'No' }}</p>
            <p><strong>Price:</strong> {{ $holidayProperty->price }}</p>
            <p><strong>Rental Period:</strong> {{ $holidayProperty->rental_period }}</p>
            <p><strong>City:</strong> {{ $holidayProperty->city }}</p>
            <p><strong>Community:</strong> {{ $holidayProperty->community }}</p>
            <p><strong>Sub Community:</strong> {{ $holidayProperty->sub_community }}</p>
            <p><strong>Property Name:</strong> {{ $holidayProperty->property_name }}</p>
            <p><strong>Title:</strong> {{ $holidayProperty->title_en }}</p>
            <p><strong>Description:</strong> {{ $holidayProperty->description_en }}</p>

            {{-- Amenities --}}
            <p><strong>Amenities (Raw):</strong> {{ $holidayProperty->amenities }}</p>
            <p><strong>Amenities (From Relationship):</strong>
                @forelse($holidayProperty->holidayAmenities as $amenity)
                    <span class="badge bg-info text-dark">{{ $amenity->name }}</span>
                @empty
                    <span>No amenities listed.</span>
                @endforelse
            </p>

            <p><strong>Size:</strong> {{ $holidayProperty->size }} sqft</p>
            <p><strong>Bedrooms:</strong> {{ $holidayProperty->bedroom }}</p>
            <p><strong>Bathrooms:</strong> {{ $holidayProperty->bathroom }}</p>
            <p><strong>Parking:</strong> {{ $holidayProperty->parking }}</p>
            <p><strong>Furnished:</strong> {{ $holidayProperty->furnished ? 'Yes' : 'No' }}</p>
            <p><strong>Latitude:</strong> {{ $holidayProperty->latitude }}</p>
            <p><strong>Longitude:</strong> {{ $holidayProperty->longitude }}</p>
            <p><strong>Last Updated:</strong> {{ $holidayProperty->last_update }}</p>
            <p><strong>New:</strong> {{ $holidayProperty->new ? 'Yes' : 'No' }}</p>

            {{-- Agent Info --}}
            <h5 class="mt-4">Agent Information</h5>
            <p><strong>Name:</strong> {{ $holidayProperty->agent_name }}</p>
            <p><strong>Email:</strong> {{ $holidayProperty->agent_email }}</p>
            <p><strong>Phone:</strong> {{ $holidayProperty->agent_phone }}</p>
            <p><strong>License:</strong> {{ $holidayProperty->agent_license }}</p>
            @if($holidayProperty->agent_photo)
                @if(filter_var($holidayProperty->agent_photo, FILTER_VALIDATE_URL))
                    <img src="{{ $holidayProperty->agent_photo }}" alt="Agent Photo" width="100">
                @else
                    <img src="{{ asset('storage/' . $holidayProperty->agent_photo) }}" alt="Agent Photo" width="100">
                @endif
            @endif

            {{-- Photos --}}
            <h5 class="mt-4">Photos</h5>
            @if($holidayProperty->holidayPhotos)
                @foreach($holidayProperty->holidayPhotos as $photo)
                    @if(filter_var($photo->url, FILTER_VALIDATE_URL))
                        <img src="{{ $photo->url }}" alt="Photo" width="100" class="mt-2 me-2">
                    @else
                        <img src="{{ asset('storage/' . $photo) }}" alt="Photo" width="100" class="mt-2 me-2">
                    @endif
                @endforeach
            @else
                <p>No photos available.</p>
            @endif
        
        </div>
    </div>

    <a href="{{ route('admin.holiday-properties.index') }}" class="btn btn-secondary mt-4">Back to List</a>
</div>
@endsection
