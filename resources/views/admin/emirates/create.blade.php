@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1>Add New Emirate</h1>
    <form action="{{ route('admin.emirates.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Emirate Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="country_id">Country</label>
            <select name="country_id" class="form-control" required>
                @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Add Emirate</button>
        <a href="{{ route('admin.emirates.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
