@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Edit Community</h1>

    <a href="{{ route('admin.communities.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    <form action="{{ route('admin.communities.update', $community->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Community Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $community->name }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Community Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($community->image)
                <p class="mt-2">
                    <img src="{{ asset('storage/' . $community->image) }}" alt="{{ $community->name }}" width="100">
                </p>
            @endif
        </div>

        <div class="mb-3">
            <label for="emirates_id" class="form-label">Select Emirate</label>
            <select name="emirates_id" id="emirates_id" class="form-control">
                <option value="">Select an emirate</option>
                @foreach($emirates as $emirate)
                    <option value="{{ $emirate->id }}" {{ $community->emirates_id == $emirate->id ? 'selected' : '' }}>
                        {{ $emirate->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Community</button>
    </form>
</div>
@endsection
