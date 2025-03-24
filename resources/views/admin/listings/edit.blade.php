@extends('layouts.back-office.app')

@section('content')
<div class="container">
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
                    <input type="text" name="property_title" class="form-control" value="{{ $listing->property_title }}" required>
                </div>

                <div class="form-group">
                    <label for="ad_type">Ad Type</label>
                    <input type="text" name="ad_type" class="form-control" value="{{ $listing->ad_type }}" required>
                </div>

                <div class="form-group">
                    <label for="community">Community</label>
                    <input type="text" name="community" class="form-control" value="{{ $listing->community }}" required>
                </div>

                <div class="form-group">
                    <label for="price">Price (AED)</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ $listing->price }}" required>
                </div>

                <div class="form-group">
                    <label for="listing_agent">Listing Agent</label>
                    <input type="text" name="listing_agent" class="form-control" value="{{ $listing->listing_agent }}" required>
                </div>

                <div class="form-group">
                    <label for="listing_agent_phone">Listing Agent Phone</label>
                    <input type="text" name="listing_agent_phone" class="form-control" value="{{ $listing->listing_agent_phone }}" required>
                </div>

                <div class="form-group">
                    <label for="listing_agent_email">Listing Agent Email</label>
                    <input type="email" name="listing_agent_email" class="form-control" value="{{ $listing->listing_agent_email }}" required>
                </div>

                <!-- ✅ Existing Listing Agent Photo -->
                <div class="form-group">
                    <label for="listing_agent_photo">Listing Agent Photo</label>
                    <input type="file" name="listing_agent_photo" class="form-control">
                    @if($listing->listing_agent_photo)
                        <p>Current Photo: <a href="{{ asset('storage/listings/' . $listing->listing_agent_photo) }}" target="_blank">View</a></p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="property_ref_no">Property Ref No</label>
                    <input type="text" name="property_ref_no" class="form-control" value="{{ $listing->property_ref_no }}" required>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="no_of_bathroom">No. of Bathrooms</label>
                    <input type="number" name="no_of_bathroom" class="form-control" value="{{ $listing->no_of_bathroom }}" required>
                </div>

                <div class="form-group">
                    <label for="bedrooms">No. of Bedrooms</label>
                    <input type="number" name="bedrooms" class="form-control" value="{{ $listing->bedrooms }}" required>
                </div>

                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" name="latitude" class="form-control" value="{{ $listing->latitude }}" required>
                </div>

                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" name="longitude" class="form-control" value="{{ $listing->longitude }}" required>
                </div>

                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" name="company_name" class="form-control" value="{{ $listing->company_name }}" required>
                </div>

                <!-- ✅ Existing Company Logo -->
                <div class="form-group">
                    <label for="company_logo">Company Logo</label>
                    <input type="file" name="company_logo" class="form-control">
                    @if($listing->company_logo)
                        <p>Current Logo: <a href="{{ asset('storage/listings/' . $listing->company_logo) }}" target="_blank">View</a></p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="permit_number">Permit Number</label>
                    <input type="text" name="permit_number" class="form-control" value="{{ $listing->permit_number }}" required>
                </div>
            </div>
        </div>

        <hr>

        <!-- ✅ Edit Images (Uploaded or Link) -->
        <div class="form-group mt-3">
            <h4>Existing Images</h4>
            <div class="row">
                @if($listing->xml == 1)
                    <!-- ✅ Display Image Links if XML -->
                    @foreach($listing->images as $image)
                        <div class="col-md-3 mb-2">
                            <img src="{{ $image->url }}" class="img-thumbnail" width="100%">
                            <input type="text" name="image_links[]" class="form-control mt-2" value="{{ $image->url }}" placeholder="Edit Image Link">
                        </div>
                    @endforeach
                @else
                    <!-- ✅ Display Uploaded Images from Database -->
                    @foreach($listing->images as $image)
                        <div class="col-md-3 mb-2">
                            <img src="{{ asset('storage/listings/' . $image->url) }}" class="img-thumbnail" width="100%">
                            <input type="checkbox" name="delete_images[]" value="{{ $image->id }}"> Delete
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="form-group mt-3">
            <h4>Manage Images</h4>
        
            @if($listing->xml == 1)
                <!-- ✅ XML Mode: Add/Edit Image Links -->
                <div class="form-group mt-3">
                    <label for="image_links">Edit/Add Image Links</label>
                    @if(!empty($listing->image_links))
                        @foreach($listing->image_links as $link)
                            <div class="row mb-2">
                                <div class="col-md-10">
                                    <input type="text" name="image_links[]" class="form-control" value="{{ $link }}" placeholder="Edit Image URL">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger remove-link">Remove</button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <input type="text" name="image_links[]" class="form-control mb-2" placeholder="Add New Image URL">
                        <input type="text" name="image_links[]" class="form-control mb-2" placeholder="Add Another Image URL">
                    @endif
                </div>
        
                <!-- ✅ Add New Link Button -->
                <button type="button" class="btn btn-info mb-3" id="add-link">Add More Links</button>
        
            @else
                <!-- ✅ Database Mode: Upload/Delete/Replace Images -->
                <div class="form-group mt-3">
                    <h5>Existing Images</h5>
                    <div class="row">
                        @foreach($listing->images as $image)
                            <div class="col-md-3 mb-2">
                                <img src="{{ asset('storage/listings/' . $image->url) }}" class="img-thumbnail" width="100%">
                                <div class="form-check mt-2">
                                    <input type="checkbox" name="delete_images[]" value="{{ $image->id }}"> Delete
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        
                <!-- ✅ Upload New Images -->
                <div class="form-group mt-3">
                    <label for="images">Upload New Images (Multiple)</label>
                    <input type="file" name="images[]" class="form-control" multiple>
                </div>
            @endif
        </div>

        <!-- ✅ Select/Update Facilities -->
        <div class="form-group mt-3">
            <label for="facilities">Select Facilities</label>
            <div class="row">
                @foreach($facilities as $facility)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="facilities[]" value="{{ $facility->id }}"
                                {{ in_array($facility->id, $selectedFacilities) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $facility->name }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <hr>

        <!-- Boolean Fields -->
        <div class="row mt-4">
            <div class="col-md-12">
                <h4>Additional Options</h4>
                @foreach(['exclusive', 'featured', 'price_on_application', 'off_plan', 'new', 'verified', 'superagent', 'xml'] as $field)
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="{{ $field }}" value="1" {{ $listing->$field ? 'checked' : '' }}>
                        <label class="form-check-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <hr>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Update Listing</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add new link dynamically
        document.getElementById('add-link').addEventListener('click', function () {
            let linkInput = `
                <div class="row mb-2">
                    <div class="col-md-10">
                        <input type="text" name="image_links[]" class="form-control" placeholder="Add New Image URL">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-link">Remove</button>
                    </div>
                </div>`;
            this.insertAdjacentHTML('beforebegin', linkInput);
        });

        // Remove link dynamically
        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-link')) {
                event.target.closest('.row').remove();
            }
        });
    });
</script>

@endsection
