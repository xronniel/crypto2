@csrf
@if(isset($listing))
    @method('PUT')
@endif

<div class="row">
    <!-- Column 1 -->
    <div class="col-md-6">
        {{-- Basic Property Information --}}
        <div class="form-group">
            <label for="property_title">Property Title</label>
            <input type="text" name="property_title" class="form-control" value="{{ old('property_title', $listing->property_title ?? '') }}" required>
        </div>
        
        <div class="form-group">
            <label for="property_name">Property Name</label>
            <input type="text" name="property_name" class="form-control" value="{{ old('property_name', $listing->property_name ?? '') }}">
        </div>
        
        <div class="form-group">
            <label for="property_ref_no">Property Ref No</label>
            <input type="text" name="property_ref_no" class="form-control" value="{{ old('property_ref_no', $listing->property_ref_no ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="unit_reference_no">Unit Reference Number</label>
            <input type="text" name="unit_reference_no" class="form-control" value="{{ old('unit_reference_no', $listing->unit_reference_no ?? '') }}">
        </div>

        {{-- Ad Type & Unit Type --}}
        <div class="form-group">
            <label for="ad_type">Ad Type</label>
            <select name="ad_type" class="form-control">
                <option value="">Select Ad Type</option>
                @foreach($adTypes as $ad)
                    <option value="{{ $ad }}" {{ old('ad_type', $listing->ad_type ?? '') == $ad ? 'selected' : '' }}>{{ $ad }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="unit_type">Unit Type</label>
            <select name="unit_type" class="form-control">
                <option value="">Select Unit Type</option>
                @foreach($unitTypes as $unit)
                    <option value="{{ $unit }}" {{ old('unit_type', $listing->unit_type ?? '') == $unit ? 'selected' : '' }}>{{ $unit }}</option>
                @endforeach
            </select>
        </div>

        {{-- Unit Details --}}
        <div class="form-group">
            <label for="unit_model">Unit Model</label>
            <input type="text" name="unit_model" class="form-control" value="{{ old('unit_model', $listing->unit_model ?? '') }}">
        </div>

        <div class="form-group">
            <label for="primary_view">Primary View</label>
            <input type="text" name="primary_view" class="form-control" value="{{ old('primary_view', $listing->primary_view ?? '') }}">
        </div>

        <div class="form-group">
            <label for="unit_builtup_area">Built-up Area (Sq. Ft.)</label>
            <input type="number" step="0.01" name="unit_builtup_area" class="form-control" value="{{ old('unit_builtup_area', $listing->unit_builtup_area ?? '') }}">
        </div>

        <div class="form-group">
            <label for="plot_area">Plot Area (Sq. Ft.)</label>
            <input type="number" step="0.01" name="plot_area" class="form-control" value="{{ old('plot_area', $listing->plot_area ?? '') }}">
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
                    <option value="{{ $emirate->name }}" {{ old('emirate', $listing->emirate ?? '') == $emirate->name ? 'selected' : '' }}>{{ $emirate->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="community">Community</label>
            <select name="community_id" class="form-control">
                <option value="">Select Community</option>
                @foreach($communities as $community)
                    <option value="{{ $community->id }}" {{ old('community_id', $listing->community_id ?? '') == $community->id ? 'selected' : '' }}>{{ $community->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="listing_agent">Listing Agent</label>
            <select name="agent_id" class="form-control">
                <option value="">Select Listing Agent</option>
                @foreach($agents as $agent)
                    <option value="{{ $agent->id }}" {{ old('agent_id', $listing->agent_id ?? '') == $agent->id ? 'selected' : '' }}>{{ $agent->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Pricing & Payment --}}
        <div class="form-group">
            <label for="price">Price (AED)</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $listing->price ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="cheques">No. of Cheques</label>
            <input type="number" name="cheques" class="form-control" value="{{ old('cheques', $listing->cheques ?? '') }}">
        </div>

        {{-- Additional Info --}}
        <div class="form-group">
            <label for="available_from">Available From</label>
            <input type="date" name="available_from" class="form-control" value="{{ old('available_from', $listing->available_from ?? '') }}">
        </div>

        <div class="form-group">
            <label for="completion_status">Completion Status</label>
            <input type="text" name="completion_status" class="form-control" value="{{ old('completion_status', $listing->completion_status ?? '') }}">
        </div>

        <div class="form-group">
            <label for="permit_number">Permit Number</label>
            <input type="text" name="permit_number" class="form-control" value="{{ old('permit_number', $listing->permit_number ?? '') }}">
        </div>

        <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $listing->company_name ?? '') }}">
        </div>

        <div class="form-group">
            <label for="listing_date">Listing Date</label>
            <input type="date" name="listing_date" class="form-control" value="{{ old('listing_date', $listing->listing_date ?? '') }}">
        </div>
    </div>
</div>

<hr>

{{-- Property Details --}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="no_of_bathroom">No. of Bathrooms</label>
            <input type="number" name="no_of_bathroom" class="form-control" value="{{ old('no_of_bathroom', $listing->no_of_bathroom ?? '') }}">
        </div>

        <div class="form-group">
            <label for="bedrooms">No. of Bedrooms</label>
            <input type="number" name="bedrooms" class="form-control" value="{{ old('bedrooms', $listing->bedrooms ?? '') }}">
        </div>

        <div class="form-group">
            <label for="no_of_rooms">No. of Rooms</label>
            <input type="number" name="no_of_rooms" class="form-control" value="{{ old('no_of_rooms', $listing->no_of_rooms ?? '') }}">
        </div>

        <div class="form-group">
            <label for="parking">No. of Parking</label>
            <input type="number" name="parking" class="form-control" value="{{ old('parking', $listing->parking ?? '') }}">
        </div>

        <div class="form-group">
            <label for="unit_measure">Unit Measure (e.g., Sq.Ft.)</label>
            <input type="text" name="unit_measure" class="form-control" value="{{ old('unit_measure', $listing->unit_measure ?? '') }}">
        </div>
    </div>

    <div class="col-md-6">
        {{-- Virtual Tours --}}
        <div class="form-group">
            <label for="web_tour">Web Tour</label>
            <input type="text" name="web_tour" class="form-control" value="{{ old('web_tour', $listing->web_tour ?? '') }}">
        </div>

        <div class="form-group">
            <label for="threesixty_tour">360 Tour</label>
            <input type="text" name="threesixty_tour" class="form-control" value="{{ old('threesixty_tour', $listing->threesixty_tour ?? '') }}">
        </div>

        <div class="form-group">
            <label for="virtual_tour">Virtual Tour</label>
            <input type="text" name="virtual_tour" class="form-control" value="{{ old('virtual_tour', $listing->virtual_tour ?? '') }}">
        </div>

        <div class="form-group">
            <label for="preview_link">Preview Link</label>
            <input type="text" name="preview_link" class="form-control" value="{{ old('preview_link', $listing->preview_link ?? '') }}">
        </div>

        <div class="form-group">
            <label for="qr_code">QR Code</label>
            <input type="text" name="qr_code" class="form-control" value="{{ old('qr_code', $listing->qr_code ?? '') }}">
        </div>
    </div>
</div>

<hr>


{{-- Descriptions & Remarks --}}
<div class="form-group">
    <label for="web_remarks">Web Remarks (HTML Allowed)</label>
    <textarea name="web_remarks" class="form-control" rows="3">{{ old('web_remarks', $listing->web_remarks ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $listing->description ?? '') }}</textarea>
</div>

{{-- Uploads --}}
<div class="form-group">
    <label for="company_logo">Company Logo</label>
    <input type="file" name="company_logo" class="form-control" accept="image/*">
    @if(!empty($listing->company_logo))
        <img src="{{ asset('storage/' . $listing->company_logo) }}" width="100">
    @endif
</div>

<div class="form-group">
    <label for="brochure">Brochure (PDF)</label>
    <input type="file" name="brochure" class="form-control">
    @if(!empty($listing->brochure))
        <a href="{{ asset('storage/' . $listing->brochure) }}" target="_blank">View Brochure</a>
    @endif
</div>

<div class="form-group">
    <label for="floor_plan">Floor Plan</label>
    <input type="file" name="floor_plan" class="form-control" accept="image/*">
    @if(!empty($listing->floor_plan))
        <img src="{{ asset('storage/' . $listing->floor_plan) }}" width="100">
    @endif
</div>

<div class="form-group">
    <label for="fact_sheet">fact sheet</label>
    <input type="file" name="fact_sheet" class="form-control" accept="image/*">
    @if(!empty($listing->fact_sheet))
        <img src="{{ asset('storage/' . $listing->fact_sheet) }}" width="100">
    @endif
</div>

<div class="form-group">
    <label for="payment_plan">payment plan</label>
    <input type="file" name="payment_plan" class="form-control" accept="image/*">
    @if(!empty($listing->payment_plan))
        <img src="{{ asset('storage/' . $listing->payment_plan) }}" width="100">
    @endif
</div>

<div class="form-group">
    <label for="images">Upload Images (Multiple)</label>
    <input type="file" name="images[]" class="form-control" multiple>
    @if(!empty($listing->images))
        @foreach($listing->images as $image)
            <img src="{{ asset('storage/' . $image->path) }}" width="100">
        @endforeach
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
                        {{ in_array($facility->id, old('facilities', isset($listing) && $listing->facilities ? $listing->facilities->pluck('id')->toArray() : [])) ? 'checked' : '' }}>
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
            <input class="form-check-input" type="checkbox" name="{{ $field }}" value="1" 
                id="{{ $field }}" {{ old($field, $listing->$field ?? false) ? 'checked' : '' }}
                onchange="toggleOffPlan()">
            <label class="form-check-label" for="{{ $field }}">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
        </div>
    @endforeach
    



    </div>
</div>



    <!-- Button & Dynamic Inputs -->
    <div class="mt-4 mb-4"  id="offPlanContainer" style="display: none;">
        <button type="button" class="btn btn-primary mb-2" onclick="addOffPlanInput()">Add Off-Plan Key</button>
        <div id="offPlanInputs">
            @if(!empty($listing->offPlanKeys))
                @foreach($listing->offPlanKeys as $index => $keyData)
                    <div class="mb-2">
                        <input class="mb-2" type="text" name="off_plan_keys[{{ $index }}][key]" value="{{ $keyData->key }}" required>
                        <input class="mb-2" type="text" name="off_plan_keys[{{ $index }}][value]" value="{{ $keyData->value }}" required>
                        <select class="mb-2" name="off_plan_keys[{{ $index }}][status]">
                            <option value="active" {{ $keyData->status === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $keyData->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                @endforeach
            @endif
        </div>
    </div>




<div class="form-group" id="developer-field" style="display: {{ old('off_plan', $listing->off_plan ?? false) ? 'block' : 'none' }};">
    <label for="developer_id">Developer</label>
    <select name="developer_id" id="developer_id" class="form-control">
        <option value="">Select Developer</option>
        @foreach($developers as $developer)
            <option value="{{ $developer->id }}" {{ old('developer_id', $listing->developer_id ?? '') == $developer->id ? 'selected' : '' }}>{{ $developer->name }}</option>
        @endforeach
    </select>
</div>

<hr>

<div class="row mt-4">
    <div class="col-md-12">
        <h4>Location</h4>
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" class="form-control" value="{{ old('latitude', $listing->latitude ?? '') }}">
        </div>
        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" class="form-control" value="{{ old('longitude', $listing->longitude ?? '') }}">
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Update Listing</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const offPlanCheckbox = document.getElementById('off_plan');
        const developerField = document.getElementById('developer-field');
        const developerSelect = document.getElementById('developer_id');

        function toggleDeveloperField() {
            if (offPlanCheckbox.checked) {
                developerField.style.display = 'block';
            } else {
                developerField.style.display = 'none';
                developerSelect.value = '';
            }
        }

        if (offPlanCheckbox) {
            toggleDeveloperField();
            offPlanCheckbox.addEventListener('change', toggleDeveloperField);
        }
    });


    
 
    document.addEventListener("DOMContentLoaded", function() {
        toggleOffPlan(); 
    });
    
    function toggleOffPlan() {
        document.getElementById('offPlanContainer').style.display =
            document.getElementById('off_plan').checked ? 'block' : 'none';
    }
    
    function addOffPlanInput() {
        const container = document.getElementById('offPlanInputs');
        const index = container.children.length;
        container.innerHTML += `
            <div class="mb-2">
                <input class="mb-2" type="text" name="off_plan_keys[${index}][key]" placeholder="Key" required>
                <input class="mb-2" type="text" name="off_plan_keys[${index}][value]" placeholder="Value" required>
                <select class="mb-2" name="off_plan_keys[${index}][status]">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>`;
    }
    </script>
