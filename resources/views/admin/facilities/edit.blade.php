@extends('layouts.back-office.app')

@section('content')
<div class="container pt-4">
    <h1 class="mb-4">Edit Facility</h1>

    <form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Facility Name</label>
            <input type="text" name="name" class="form-control" value="{{ $facility->name }}" required>
        </div>

        <div class="form-group">
            <label for="image">Facility Image</label>
            <input type="file" name="image" class="form-control">
            @if($facility->image)
                <img src="{{ asset('storage/' . $facility->image) }}" alt="{{ $facility->name }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection