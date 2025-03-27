@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Add New Community</h1>

    <a href="{{ route('admin.communities.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    <form action="{{ route('admin.communities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Community Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Community Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="emirates_id" class="form-label">Select Emirate</label>
            <select name="emirates_id" id="emirates_id" class="form-control">
                <option value="">Select an Emirate</option>
                @foreach($emirates as $emirate)
                    <option value="{{ $emirate->id }}">{{ $emirate->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add Community</button>
    </form>
</div>
@endsection
