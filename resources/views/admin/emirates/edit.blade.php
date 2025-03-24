@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1>Edit Emirate</h1>
    <form action="{{ route('admin.emirates.update', $emirate->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Emirate Name</label>
            <input type="text" name="name" class="form-control" value="{{ $emirate->name }}" required>
        </div>
        <div class="form-group">
            <label for="country_id">Country</label>
            <select name="country_id" class="form-control" required>
                @foreach($countries as $country)
                <option value="{{ $country->id }}" {{ $emirate->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Update Emirate</button>
        <a href="{{ route('admin.emirates.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
