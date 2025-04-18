@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Add Figure</h1>

    <form action="{{ route('admin.crypto-home-in-figures.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label>Text</label>
            <textarea name="text" class="form-control" rows="4" required>{{ old('text') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" selected>Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
