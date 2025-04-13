@extends('layouts.back-office.app')

@section('content')
<div class="container pt-4">
    <h1 class="mb-4">Edit Holiday Property</h1>

    <form action="{{ route('admin.holiday-properties.update', $holidayProperty->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="reference_number">Reference Number</label>
            <input type="text" name="reference_number" class="form-control" value="{{ old('reference_number', $holidayProperty->reference_number) }}" required>
        </div>

        <div class="form-group">
            <label for="property_name">Property Name</label>
            <input type="text" name="property_name" class="form-control" value="{{ old('property_name', $holidayProperty->property_name) }}">
        </div>

        <div class="form-group">
            <label for="title_en">Title</label>
            <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $holidayProperty->title_en) }}">
        </div>

        <div class="form-group">
            <label for="description_en">Description</label>
            <textarea name="description_en" class="form-control" rows="5" required>{{ old('description_en', $holidayProperty->description_en) }}</textarea>
        </div>

        <div class="form-group">
            <label for="offering_type">Offering Type</label>
            <select name="offering_type" class="form-control">
                <option value="Sale" {{ $holidayProperty->offering_type === 'Sale' ? 'selected' : '' }}>Sale</option>
                <option value="Rent" {{ $holidayProperty->offering_type === 'Rent' ? 'selected' : '' }}>Rent</option>
            </select>
        </div>

        <div class="form-group">
            <label for="property_type">Property Type</label>
            <select name="property_type" class="form-control" required>
                @foreach($propertyTypes as $type)
                    <option value="{{ $type }}" {{ $holidayProperty->property_type === $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $holidayProperty->price) }}">
        </div>

        <div class="form-group">
            <label for="rental_period">Rental Period</label>
            <select name="rental_period" class="form-control">
                <option value="M" {{ $holidayProperty->rental_period === 'M' ? 'selected' : '' }}>Monthly</option>
                <option value="Y" {{ $holidayProperty->rental_period === 'Y' ? 'selected' : '' }}>Yearly</option>
            </select>
        </div>

        <div class="form-group">
            <label for="agent_id">Choose Agent</label>
            <select name="agent_id" class="form-control" required>
                @foreach($agents as $agent)
                    <option value="{{ $agent->id }}" {{ $holidayProperty->agent_id == $agent->id ? 'selected' : '' }}>
                        {{ $agent->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control" value="{{ old('city', $holidayProperty->city) }}">
        </div>

        <div class="form-group">
            <label for="community">Community</label>
            <input type="text" name="community" class="form-control" value="{{ old('community', $holidayProperty->community) }}">
        </div>

        <div class="form-group">
            <label for="sub_community">Sub Community</label>
            <input type="text" name="sub_community" class="form-control" value="{{ old('sub_community', $holidayProperty->sub_community) }}">
        </div>

        <div class="form-group">
            <label for="bedroom">Number of Bedrooms</label>
            <input type="number" name="bedroom" class="form-control" value="{{ old('bedroom', $holidayProperty->bedroom) }}">
        </div>

        <div class="form-group">
            <label for="bathroom">Number of Bathrooms</label>
            <input type="number" name="bathroom" class="form-control" value="{{ old('bathroom', $holidayProperty->bathroom) }}">
        </div>

        <div class="form-group">
            <label for="furnished">Furnished</label>
            <select name="furnished" class="form-control">
                <option value="1" {{ $holidayProperty->furnished ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$holidayProperty->furnished ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" class="form-control" value="{{ old('latitude', $holidayProperty->latitude) }}">
        </div>

        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" class="form-control" value="{{ old('longitude', $holidayProperty->longitude) }}">
        </div>

        <div class="form-group">
            <label for="amenities">Amenities</label>
            <select name="amenities[]" class="form-control" multiple>
                @foreach($amenities as $amenity)
                    <option value="{{ $amenity->id }}"
                        {{ $holidayProperty->holidayAmenities->contains($amenity->id) ? 'selected' : '' }}>
                        {{ $amenity->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="photos">Photos (Add more)</label>
            <input type="file" name="photos[]" class="form-control" multiple>
            <div class="mt-2">
                @foreach($holidayProperty->holidayPhotos as $photo)
                    <img src="{{ asset('storage/' . $photo->url) }}" alt="Photo" width="100" class="mr-2 mb-2">
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label for="is_featured">New</label>
            <div class="form-check">
                <input type="checkbox" name="new" id="new" class="form-check-input" value="1"
                    {{ old('new', $holidayProperty->new) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_featured">Check if this property is New</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
