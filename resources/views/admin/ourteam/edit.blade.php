@extends('layouts.back-office.app')


@section('content')
<div class="container">
    <h1>Edit Team Member</h1>

    <form action="{{ route('admin.ourteam.update', $member->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" value="{{ $member->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Image:</label>
            @if($member->image)
                <img src="{{ asset('storage/' . $member->image) }}" width="100" class="d-block mb-2">
            @endif
            <input type="file" name="image" accept="image/*" class="form-control">
        </div>

        <div class="mb-3">
            <label>Role:</label>
            <input type="text" name="role" value="{{ $member->role }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" value="{{ $member->email }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Mobile:</label>
            <input type="text" name="mobile" value="{{ $member->mobile }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>SNO (Serial Number):</label>
            <input type="text" name="sno" value="{{ $member->sno }}" class="form-control">
        </div>
        

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.ourteam.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
