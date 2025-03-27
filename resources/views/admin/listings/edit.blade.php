@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1>Edit Listing</h1>
    <a href="{{ route('admin.listings.index') }}" class="btn btn-secondary mb-3">Back to Listings</a>

    {{-- Display Errors --}}
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

    {{-- Form to Update Listing --}}
    <form action="{{ route('admin.listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Column 1 -->
            <div class="col-md-6">
                {{-- Basic Property Information --}}
                <div class="form-group">
                    <label for="property_title">Property Title</label>
                    <input type="text" name="property_title" class="form-control" value="{{ old('property_title', $listing->property_title) }}" required>
                </div>

                <div class="form-group">
                    <label for="property_name">Property Name</label>
                    <input type="text" name="property_name" class="form-control" value="{{ old('property_name', $listing->property_name) }}">
                </div>

                <div class="form-group">
                    <label for="property_ref_no">Property Ref No</label>
                    <input type="text" name="property_ref_no" class="form-control" value="{{ old('property_ref_no', $listing->property_ref_no) }}" required>
                </div>

                <div class="form-group">
                    <label for="unit_reference_no">Unit Reference Number</label>
                    <input type="text" name="unit_reference_no" class="form-control" value="{{ old('unit_reference_no', $listing->unit_reference_no) }}">
                </div>

                {{-- Ad Type & Unit Type --}}
                <div class="form-group">
                    <label for="ad_type">Ad Type</label>
                    <select name="ad_type" class="form-control">
                        <option value="">Select Ad Type</option>
                        @foreach($adTypes as $ad)
                            <option value="{{ $ad }}" {{ old('ad_type', $listing->ad_type) == $ad ? 'selected' : '' }}>{{ $ad }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="unit_type">Unit Type</label>
                    <select name="unit_type" class="form-control">
                        <option value="">Select Unit Type</option>
                        @foreach($unitTypes as $unit)
                            <option value="{{ $unit }}" {{ old('unit_type', $listing->unit_type) == $unit ? 'selected' : '' }}>{{ $unit }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Unit Details --}}
                <div class="form-group">
                    <label for="unit_model">Unit Model</label>
                    <input type="text" name="unit_model" class="form-control" value="{{ old('unit_model', $listing->unit_model) }}">
                </div>

                <div class="form-group">
                    <label for="primary_view">Primary View</label>
                    <input type="text" name="primary_view" class="form-control" value="{{ old('primary_view', $listing->primary_view) }}">
                </div>

                <div class="form-group">
                    <label for="unit_builtup_area">Built-up Area (Sq. Ft.)</label>
                    <input type="number" step="0.01" name="unit_builtup_area" class="form-control" value="{{ old('unit_builtup_area', $listing->unit_builtup_area) }}">
                </div>

                <div class="form-group">
                    <label for="plot_area">Plot Area (Sq. Ft.)</label>
                    <input type="number" step="0.01" name="plot_area" class="form-control" value="{{ old('plot_area', $listing->plot_area) }}">
                </div>
            </div>

            <!-- Column 2 -->
            <div class="col-md-6">
                {{-- Location & Agent --}}
                <div class="form-group">
                    <label for="emirate">Emirate</label>
                    <select name="emirate" class="form-control">
                        <option value="">Select Emirate</option>
                        @foreach($emirates as $emirate)
                            <option value="{{ $emirate->name }}" {{ old('emirate', $listing->emirate) == $emirate->name ? 'selected' : '' }}>{{ $emirate->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="community_id">Community</label>
                    <select name="community_id" class="form-control">
                        <option value="">Select Community</option>
                        @foreach($communities as $community)
                            <option value="{{ $community->id }}" {{ old('community_id', $listing->community_id) == $community->id ? 'selected' : '' }}>{{ $community->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="district_id">District</label>
                    <select name="district_id" class="form-control">
                        <option value="">Select District</option>
                        @foreach($districts as $district)
                            <option value="{{ $district->id }}" {{ old('district_id', $listing->district_id) == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="developer_id">Developer</label>
                    <select name="developer_id" class="form-control">
                        <option value="">Select Developer</option>
                        @foreach($developers as $developer)
                            <option value="{{ $developer->id }}" {{ old('developer_id', $listing->developer_id) == $developer->id ? 'selected' : '' }}>{{ $developer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="agent_id">Listing Agent</label>
                    <select name="agent_id" class="form-control">
                        <option value="">Select Listing Agent</option>
                        @foreach($agents as $agent)
                            <option value="{{ $agent->id }}" {{ old('agent_id', $listing->agent_id) == $agent->id ? 'selected' : '' }}>{{ $agent->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Pricing & Payment --}}
                <div class="form-group">
                    <label for="price">Price (AED)</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $listing->price) }}" required>
                </div>

                <div class="form-group">
                    <label for="cheques">No. of Cheques</label>
                    <input type="number" name="cheques" class="form-control" value="{{ old('cheques', $listing->cheques) }}">
                </div>

                {{-- Additional Info --}}
                <div class="form-group">
                    <label for="available_from">Available From</label>
                    <input type="date" name="available_from" class="form-control" value="{{ old('available_from', $listing->available_from) }}">
                </div>

                <div class="form-group">
                    <label for="completion_status">Completion Status</label>
                    <input type="text" name="completion_status" class="form-control" value="{{ old('completion_status', $listing->completion_status) }}">
                </div>

                <div class="form-group">
                    <label for="permit_number">Permit Number</label>
                    <input type="text" name="permit_number" class="form-control" value="{{ old('permit_number', $listing->permit_number) }}">
                </div>

                <div class="form-group">
                    <label for="listing_date">Listing Date</label>
                    <input type="date" name="listing_date" class="form-control" value="{{ old('listing_date', $listing->listing_date) }}">
                </div>
            </div>
        </div>

        <hr>

        {{-- Property Descriptions --}}
        <div class="form-group">
            <label for="web_remarks">Web Remarks (HTML Allowed)</label>
            <textarea name="web_remarks" class="form-control" rows="3">{{ old('web_remarks', $listing->web_remarks) }}</textarea>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $listing->description) }}</textarea>
        </div>

        {{-- Uploads --}}
    <!-- Company Logo -->
    <div class="form-group">
        <label for="company_logo">Company Logo</label>
        <input type="file" name="company_logo" class="form-control" accept="image/*">

        @if($listing->company_logo)
            @if($listing->xml == 1)
                {{-- External Logo Link --}}
                <a href="{{ $listing->company_logo }}" target="_blank" class="d-block mt-2">
                    <img src="{{ $listing->company_logo }}" alt="Company Logo" class="mt-2" width="100">
                </a>
            @else
                {{-- Stored Logo --}}
                <img src="{{ asset('storage/' . $listing->company_logo) }}" alt="Company Logo" class="mt-2" width="100">
            @endif
        @endif
    </div>

    <!-- Brochure -->
    <div class="form-group">
        <label for="brochure">Brochure (PDF)</label>
        <input type="file" name="brochure" class="form-control">

        @if($listing->brochure)
            @if($listing->xml == 1)
                {{-- External Brochure Link --}}
                <a href="{{ $listing->brochure }}" target="_blank" class="d-block mt-2">View Current Brochure</a>
            @else
                {{-- Stored Brochure --}}
                <a href="{{ asset('storage/' . $listing->brochure) }}" target="_blank" class="d-block mt-2">View Current Brochure</a>
            @endif
        @endif
    </div>

        <div class="form-group">
            <label for="images">Upload Images (Multiple)</label>
            <input type="file" name="images[]" class="form-control" multiple>
            
            {{-- Show Images if Available --}}
            @if($listing->images)
                <div class="mt-3">
                    @foreach($listing->images as $image)
                        @if($listing->xml == 1)
                            {{-- XML Image Link --}}
                            <a href="{{ $image->url }}" target="_blank" class="d-block mb-2">
                                <img src="{{ $image->url }}" alt="Listing Image" class="img-thumbnail mr-2" width="100">
                            </a>
                        @else
                            {{-- Storage Image --}}
                            <img src="{{ asset('storage/' . $image->url) }}" alt="Listing Image" class="img-thumbnail mr-2" width="100">
                        @endif
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Facilities --}}
        <div class="form-group">
            <label for="facilities">Select Facilities</label>
            <div class="row">
                @foreach($facilities as $facility)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="facilities[]" value="{{ $facility->id }}"
                                {{ in_array($facility->id, old('facilities', $listing->facilities->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $facility->name }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Boolean Options --}}
        <div class="row mt-4">
            <div class="col-md-12">
                <h4>Additional Options</h4>
                @foreach(['exclusive', 'featured', 'price_on_application', 'off_plan', 'new', 'verified', 'superagent'] as $field)
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="{{ $field }}" value="1" {{ old($field, $listing->$field) ? 'checked' : '' }}>
                        <label class="form-check-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <hr>

        {{-- Submit Button --}}
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Update Listing</button>
        </div>
    </form>
</div>
@endsection
