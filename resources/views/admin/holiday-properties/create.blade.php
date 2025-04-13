@extends('layouts.back-office.app')

@section('content')
<div class="container pt-4">
    <h1 class="mb-4">Add Holiday Property</h1>

    <form action="{{ route('admin.holiday-properties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

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
            <input type="text" name="reference_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="property_name">Property Name</label>
            <input type="text" name="property_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="property_name">Title</label>
            <input type="text" name="title_en" class="form-control">
        </div>

        <div class="form-group">
            <label for="description_en">Description</label>
            <textarea name="description_en" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="offering_type">Offering Type</label>
            <select name="offering_type" class="form-control">
                <option value="Sale">Sale</option>
                <option value="Rent">Rent</option>
            </select>
        </div>

        <div class="form-group">
            <label for="property_type">Property Type</label>
            <select name="property_type" class="form-control" required>
                <option value="">Select Property Type</option>
                @foreach($propertyTypes as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control">
        </div>

        <div class="form-group">
            <label for="rental_period">Rental Period</label>
            <select name="rental_period" class="form-control">
                <option value="M">Monthly</option>
                <option value="Y">Yearly</option>
            </select>
        </div>

        <div class="form-group">
            <label for="agent_id">Choose Agent</label>
            <select name="agent_id" class="form-control" required>
                <option value="">Select Agent</option>
                @foreach($agents as $agent)
                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control">
        </div>

        <div class="form-group">
            <label for="community">Community</label>
            <input type="text" name="community" class="form-control">
        </div>

        <div class="form-group">
            <label for="sub_community">Sub Community</label>
            <input type="text" name="sub_community" class="form-control">
        </div>

        <div class="form-group">
            <label for="bedroom">Number of Bedrooms</label>
            <input type="number" name="bedroom" class="form-control">
        </div>

        <div class="form-group">
            <label for="bathroom">Number of Bathrooms</label>
            <input type="number" name="bathroom" class="form-control">
        </div>

        <div class="form-group">
            <label for="furnished">Furnished</label>
            <select name="furnished" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" class="form-control">
        </div>

        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" class="form-control">
        </div>

        <div class="form-group">
            <label for="amenities">Amenities</label>
            <select name="amenities[]" class="form-control" multiple>
                @foreach($amenities as $amenity)
                    <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="photos">Photos</label>
            <input type="file" name="photos[]" class="form-control" multiple>
        </div>

        <div class="form-group">
            <label for="is_featured">New</label>
            <div class="form-check">
                <input type="checkbox" name="new" id="new" class="form-check-input" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_featured">Check if this property is featured</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection