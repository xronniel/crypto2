@extends('layouts.back-office.app')

@section('content')
<div class="container pt-4">
    <h1 class="mb-4">Add Holiday Property</h1>

    <form action="{{ route('admin.holiday-properties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="reference_number">Reference Number</label>
            <input type="text" name="reference_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="property_name">Property Name</label>
            <input type="text" name="property_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control">
        </div>

        <div class="form-group">
            <label for="photos">Photos</label>
            <input type="file" name="photos[]" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection