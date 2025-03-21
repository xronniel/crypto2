@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Add New Developer</h1>

    <a href="{{ route('admin.developers.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    <form action="{{ route('admin.developers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Developer Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Developer Image</label>
            <input type="file" name="img" id="img" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Add Developer</button>
    </form>
</div>
@endsection
