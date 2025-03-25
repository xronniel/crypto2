@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1>Edit Listing</h1>
    <a href="{{ route('admin.listings.index') }}" class="btn btn-secondary mb-3">Back to Listings</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> Please correct the errors below.
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Column 1 -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="property_title">Property Title</label>
                    <input type="text" name="property_title" class="form-control" value="{{ old('property_title', $listing->property_title) }}">
                </div>

                <div class="form-group">
                    <label for="property_name">Property Name</label>
                    <input type="text" name="property_name" class="form-control" value="{{ old('property_name', $listing->property_name) }}">
                </div>

                <div class="form-group">
                    <label for="unit_reference_no">Unit Reference Number</label>
                    <input type="text" name="unit_reference_no" class="form-control" value="{{ old('unit_reference_no', $listing->unit_reference_no) }}">
                </div>

                <div class="form-group">
                    <label for="ad_type">Ad Type</label>
                    <input type="text" name="ad_type" class="form-control" value="{{ old('ad_type', $listing->ad_type) }}">
                </div>

                <div class="form-group">
                    <label for="community">Community</label>
                    <input type="text" name="community" class="form-control" value="{{ old('community', $listing->community) }}">
                </div>

                <div class="form-group">
                    <label for="price">Price (AED)</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $listing->price) }}">
                </div>

                <div class="form-group">
                    <label for="listing_agent">Listing Agent</label>
                    <input type="text" name="listing_agent" class="form-control" value="{{ old('listing_agent', $listing->listing_agent) }}">
                </div>

                <div class="form-group">
                    <label for="listing_agent_phone">Listing Agent Phone</label>
                    <input type="text" name="listing_agent_phone" class="form-control" value="{{ old('listing_agent_phone', $listing->listing_agent_phone) }}">
                </div>

                <div class="form-group">
                    <label for="listing_agent_email">Listing Agent Email</label>
                    <input type="email" name="listing_agent_email" class="form-control" value="{{ old('listing_agent_email', $listing->listing_agent_email) }}">
                </div>

                <div class="form-group">
                    <label for="listing_agent_photo">Listing Agent Photo</label>
                    <input type="file" name="listing_agent_photo" class="form-control" accept="image/*">
                    @if($listing->xml == 1)
                        @if($listing->listing_agent_photo)
                            <img src="{{ $listing->listing_agent_photo }}" alt="Agent Photo" class="img-thumbnail mt-2" width="120">
                        @else
                            <p class="text-muted mt-2">No agent photo available.</p>
                        @endif
                    @else
                        @if($listing->listing_agent_photo)
                            <img src="{{ asset('storage/' . $listing->listing_agent_photo) }}" alt="Agent Photo" class="img-thumbnail mt-2" width="120">
                        @else
                            <p class="text-muted mt-2">No agent photo available.</p>
                        @endif
                    @endif
                </div>

                <div class="form-group">
                    <label for="company_logo">Company Logo</label>
                    <input type="file" name="company_logo" class="form-control" accept="image/*">
                    @if($listing->company_logo)
                        <img src="{{ asset('storage/' . $listing->company_logo) }}" alt="Company Logo" class="img-thumbnail mt-2" width="120">
                    @endif
                </div>

                <div class="form-group">
                    <label for="property_ref_no">Property Ref No</label>
                    <input type="text" name="property_ref_no" class="form-control" value="{{ old('property_ref_no', $listing->property_ref_no) }}">
                </div>

                <div class="form-group">
                    <label for="cheques">No. of Cheques</label>
                    <input type="number" name="cheques" class="form-control" value="{{ old('cheques', $listing->cheques) }}">
                </div>

                <div class="form-group">
                    <label for="listing_agent_permit">Listing Agent Permit</label>
                    <input type="text" name="listing_agent_permit" class="form-control" value="{{ old('listing_agent_permit', $listing->listing_agent_permit) }}">
                </div>

                <div class="form-group">
                    <label for="unit_measure">Unit Measure (e.g., Sq.Ft.)</label>
                    <input type="text" name="unit_measure" class="form-control" value="{{ old('unit_measure', $listing->unit_measure) }}">
                </div>

                <div class="form-group">
                    <label for="parking">No. of Parking</label>
                    <input type="number" name="parking" class="form-control" value="{{ old('parking', $listing->parking) }}">
                </div>
            </div>

            <!-- Column 2 -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="no_of_bathroom">No. of Bathrooms</label>
                    <input type="number" name="no_of_bathroom" class="form-control" value="{{ old('no_of_bathroom', $listing->no_of_bathroom) }}">
                </div>

                <div class="form-group">
                    <label for="no_of_rooms">No. of Rooms</label>
                    <input type="number" name="no_of_rooms" class="form-control" value="{{ old('no_of_rooms', $listing->no_of_rooms) }}">
                </div>

                <div class="form-group">
                    <label for="bedrooms">No. of Bedrooms</label>
                    <input type="number" name="bedrooms" class="form-control" value="{{ old('bedrooms', $listing->bedrooms) }}">
                </div>

                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" name="latitude" class="form-control" value="{{ old('latitude', $listing->latitude) }}">
                </div>

                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" name="longitude" class="form-control" value="{{ old('longitude', $listing->longitude) }}">
                </div>

                <div class="form-group">
                    <label for="emirate">Emirate</label>
                    <input type="text" name="emirate" class="form-control" value="{{ old('emirate', $listing->emirate) }}">
                </div>

                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $listing->company_name) }}">
                </div>

                <div class="form-group">
                    <label for="permit_number">Permit Number</label>
                    <input type="text" name="permit_number" class="form-control" value="{{ old('permit_number', $listing->permit_number) }}">
                </div>

                <div class="form-group">
                    <label for="completion_status">Completion Status</label>
                    <input type="text" name="completion_status" class="form-control" value="{{ old('completion_status', $listing->completion_status) }}">
                </div>

                <div class="form-group">
                    <label for="listing_date">Listing Date</label>
                    <input type="date" name="listing_date" class="form-control" value="{{ old('listing_date', $listing->listing_date) }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $listing->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="district_id">District</label>
                    <select name="district_id" class="form-control">
                        <option value="">Select District</option>
                        @foreach($districts as $district)
                            <option value="{{ $district->id }}" {{ $listing->district_id == $district->id ? 'selected' : '' }}>
                                {{ $district->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="developer_id">Developer</label>
                    <select name="developer_id" class="form-control">
                        <option value="">Select Developer</option>
                        @foreach($developers as $developer)
                            <option value="{{ $developer->id }}" {{ $listing->developer_id == $developer->id ? 'selected' : '' }}>
                                {{ $developer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="available_from">Available From</label>
                    <input type="date" name="available_from" class="form-control" value="{{ old('available_from', $listing->available_from) }}">
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" class="form-control">
                        <option value="NA" {{ $listing->type == 'NA' ? 'selected' : '' }}>NA</option>
                        <option value="Residential" {{ $listing->type == 'Residential' ? 'selected' : '' }}>Residential</option>
                        <option value="Commercial" {{ $listing->type == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                        <option value="Holiday" {{ $listing->type == 'Holiday' ? 'selected' : '' }}>Holiday</option>
                        <option value="Mortgages" {{ $listing->type == 'Mortgages' ? 'selected' : '' }}>Mortgages</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Facilities -->
        <div class="form-group mt-3">
            <label for="facilities">Select Facilities</label>
            <div class="row">
                @foreach($facilities as $facility)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="facilities[]" value="{{ $facility->id }}" 
                            {{ in_array($facility->id, $listing->facilities->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $facility->name }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Boolean Fields -->
        <div class="row mt-4">
            <div class="col-md-12">
                <h4>Additional Options</h4>
                @foreach(['exclusive', 'featured', 'price_on_application', 'off_plan', 'new', 'verified', 'superagent'] as $field)
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="{{ $field }}" value="1" 
                        {{ $listing->$field ? 'checked' : '' }}>
                        <label class="form-check-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <hr>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Update Listing</button>
        </div>
    </form>
</div>
@endsection
