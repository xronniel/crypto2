@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Edit Developer</h1>

    <a href="{{ route('admin.developers.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    <form action="{{ route('admin.developers.update', $developer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Developer Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $developer->name }}" required>
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Developer Image</label>
            <input type="file" name="img" id="img" class="form-control">
            @if($developer->img)
                <p class="mt-2">
                    <img src="{{ asset('storage/' . $developer->img) }}" alt="{{ $developer->name }}" width="100">
                </p>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update Developer</button>
    </form>
</div>
@endsection
