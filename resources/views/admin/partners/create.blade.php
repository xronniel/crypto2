@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h2>Add New Partner</h2>

    <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Image:</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
