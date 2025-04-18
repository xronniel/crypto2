@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Edit Figure</h1>

    <form action="{{ route('admin.crypto-home-in-figures.update', $figure->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $figure->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Text</label>
            <textarea name="text" class="form-control" rows="4" required>{{ old('text', $figure->text) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $figure->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$figure->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
