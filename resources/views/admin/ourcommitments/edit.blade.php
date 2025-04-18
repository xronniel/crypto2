@extends('layouts.back-office.app')


@section('content')
<div class="container">
    <h1>Edit Our Commitment</h1>

    <form action="{{ route('admin.ourcommitments.update', $commitment->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $commitment->title) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Text</label>
            <textarea name="text" class="form-control" rows="4" required>{{ old('text', $commitment->text) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Current Icon</label><br>
            @if($commitment->icon)
                <img src="{{ asset('storage/' . $commitment->icon) }}" width="80" alt="icon" class="mb-2">
            @else
                <p>No Icon Uploaded</p>
            @endif
        </div>

        <div class="mb-3">
            <label>Change Icon</label>
            <input type="file" name="icon" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="1" {{ old('status', $commitment->status) == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $commitment->status) == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
