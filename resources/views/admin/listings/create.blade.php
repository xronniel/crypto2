@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Add New Listing</h1>
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

    <form action="{{ route('admin.listings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <!-- Column 1 -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="property_title">Property Title</label>
                    <input type="text" name="property_title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="property_name">Property Name</label>
                    <input type="text" name="property_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="unit_reference_no">Unit Reference Number</label>
                    <input type="text" name="unit_reference_no" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="ad_type">Ad Type</label>
                    <input type="text" name="ad_type" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="community">Community</label>
                    <input type="text" name="community" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="price">Price (AED)</label>
                    <input type="number" step="0.01" name="price" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="listing_agent">Listing Agent</label>
                    <input type="text" name="listing_agent" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="listing_agent_phone">Listing Agent Phone</label>
                    <input type="text" name="listing_agent_phone" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="listing_agent_email">Listing Agent Email</label>
                    <input type="email" name="listing_agent_email" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="listing_agent_photo">Listing Agent Photo</label>
                    <input type="file" name="listing_agent_photo" class="form-control" accept="image/*">
                </div>
                
                <!-- Company Logo -->
                <div class="form-group">
                    <label for="company_logo">Company Logo</label>
                    <input type="file" name="company_logo" class="form-control" accept="image/*">
                </div>

                <div class="form-group">
                    <label for="property_ref_no">Property Ref No</label>
                    <input type="text" name="property_ref_no" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="cheques">No. of Cheques</label>
                    <input type="number" name="cheques" class="form-control" >
                </div>
                
                <div class="form-group">
                    <label for="listing_agent_permit">Listing Agent Permit</label>
                    <input type="text" name="listing_agent_permit" class="form-control" >
                </div>
                
                <div class="form-group">
                    <label for="unit_measure">Unit Measure (e.g., Sq.Ft.)</label>
                    <input type="text" name="unit_measure" class="form-control" >
                </div>
                
                <div class="form-group">
                    <label for="parking">No. of Parking</label>
                    <input type="number" name="parking" class="form-control" >
                </div>
                

                <div class="form-group">
                    <label for="unit_type">Unit Type</label>
                    <input type="text" name="unit_type" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="unit_model">Unit Model</label>
                    <input type="text" name="unit_model" class="form-control">
                </div>

                <div class="form-group">
                    <label for="primary_view">Primary View</label>
                    <input type="text" name="primary_view" class="form-control">
                </div>

                <div class="form-group">
                    <label for="unit_builtup_area">Built-up Area (Sq. Ft.)</label>
                    <input type="number" step="0.01" name="unit_builtup_area" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="plot_area">Plot Area (Sq. Ft.)</label>
                    <input type="number" step="0.01" name="plot_area" class="form-control" >
                </div>
            </div>

            <!-- Column 2 -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="no_of_bathroom">No. of Bathrooms</label>
                    <input type="number" name="no_of_bathroom" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="no_of_rooms">No. of Rooms</label>
                    <input type="number" name="no_of_rooms" class="form-control">
                </div>

                <div class="form-group">
                    <label for="bedrooms">No. of Bedrooms</label>
                    <input type="number" name="bedrooms" class="form-control">
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
                    <label for="emirate">Emirate</label>
                    <input type="text" name="emirate" class="form-control">
                </div>

                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" name="company_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="permit_number">Permit Number</label>
                    <input type="text" name="permit_number" class="form-control">
                </div>

                <div class="form-group">
                    <label for="completion_status">Completion Status</label>
                    <input type="text" name="completion_status" class="form-control">
                </div>

                <div class="form-group">
                    <label for="listing_date">Listing Date</label>
                    <input type="date" name="listing_date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="web_remarks">Web Remarks (HTML Allowed)</label>
                    <textarea name="web_remarks" class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="brochure">Brochure (PDF)</label>
                    <input type="file" name="brochure" class="form-control">
                </div>
            </div>
        </div>

        <hr>


        <!-- ✅ Upload Images if XML is 0 -->
        <div class="form-group mt-3">
            <label for="images">Upload Images (Multiple)</label>
            <input type="file" name="images[]" class="form-control" multiple>
        </div>
        
        <!-- ✅ Select Facilities -->
        <div class="form-group mt-3">
            <label for="facilities">Select Facilities</label>
            <div class="row">
                @foreach($facilities as $facility)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="facilities[]" value="{{ $facility->id }}">
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
                        <input class="form-check-input" type="checkbox" name="{{ $field }}" value="1">
                        <label class="form-check-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <hr>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Add Listing</button>
        </div>
    </form>
</div>
@endsection