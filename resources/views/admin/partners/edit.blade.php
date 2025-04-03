@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h2>Edit Partner</h2>

    <form action="{{ route('admin.partners.update', $partner) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $partner->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Current Image:</label><br>
            <img src="{{ asset('storage/' . $partner->image) }}" width="100">
        </div>

        <div class="mb-3">
            <label class="form-label">New Image:</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
