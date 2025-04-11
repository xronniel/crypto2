@extends('layouts.back-office.app')

@section('content')
<div class="container pt-4">
    <h1 class="mb-4">Edit Holiday Property</h1>

    <form action="{{ route('admin.holiday-properties.update', $holidayProperty->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="reference_number">Reference Number</label>
            <input type="text" name="reference_number" class="form-control" value="{{ $holidayProperty->reference_number }}" required>
        </div>

        <div class="form-group">
            <label for="property_name">Property Name</label>
            <input type="text" name="property_name" class="form-control" value="{{ $holidayProperty->property_name }}">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" value="{{ $holidayProperty->price }}">
        </div>

        <div class="form-group">
            <label for="photos">Photos</label>
            <input type="file" name="photos[]" class="form-control" multiple>
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
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection