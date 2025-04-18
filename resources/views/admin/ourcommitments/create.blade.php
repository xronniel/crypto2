@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Add Our Commitment</h1>

    <form action="{{ route('admin.ourcommitments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Text</label>
            <textarea name="text" class="form-control" rows="4" required>{{ old('text') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Icon Image</label>
            <input type="file" name="icon" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection