@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Add Team Member</h1>

    <form action="{{ route('admin.ourteam.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Role:</label>
            <input type="text" name="role" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Mobile:</label>
            <input type="text" name="mobile" class="form-control">
        </div>

        <div class="mb-3">
            <label>SNO</label>
            <input type="text" name="sno" value="{{ old('sno') }}" class="form-control">
        </div>
        

        <button type="submit" class="btn btn-success">Add</button>
        <a href="{{ route('admin.ourteam.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
