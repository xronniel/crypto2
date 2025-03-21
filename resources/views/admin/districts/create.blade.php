@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Add New District</h1>

    <a href="{{ route('admin.districts.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    <form action="{{ route('admin.districts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">District Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">District Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="emirates_id" class="form-label">Select Emirate</label>
            <select name="emirates_id" id="emirates_id" class="form-control">
                <option value="">Select an emirate</option>
                @foreach($emirates as $emirate)
                    <option value="{{ $emirate->id }}">{{ $emirate->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add District</button>
    </form>
</div>
@endsection
