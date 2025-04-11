@extends('layouts.back-office.app')

@section('content')
<div class="container pt-4">
    <h1 class="mb-4">Holiday Property Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reference Number: {{ $holidayProperty->reference_number }}</h5>
            <p class="card-text"><strong>Property Name:</strong> {{ $holidayProperty->property_name }}</p>
            <p class="card-text"><strong>Price:</strong> {{ $holidayProperty->price }}</p>
            <p class="card-text"><strong>Community:</strong> {{ $holidayProperty->community }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $holidayProperty->description_en }}</p>
            <p class="card-text"><strong>Amenities:</strong> {{ $holidayProperty->amenities }}</p>

            <h5>Photos:</h5>
            @if($holidayProperty->photos)
                @foreach(json_decode($holidayProperty->photos) as $photo)
                    @if(filter_var($photo, FILTER_VALIDATE_URL))
                        <!-- If the photo is a URL -->
                        <img src="{{ $photo }}" alt="Photo" width="100" class="mt-2">
                    @else
                        <!-- If the photo is from storage -->
                        <img src="{{ asset('storage/' . $photo) }}" alt="Photo" width="100" class="mt-2">
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