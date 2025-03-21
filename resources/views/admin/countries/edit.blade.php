@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Edit Country</h1>
    <form action="{{ route('admin.countries.update', $country->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Country Name</label>
            <input type="text" name="name" class="form-control" value="{{ $country->name }}" required>
        </div>
        <button class="btn btn-primary">Update Country</button>
        <a href="{{ route('admin.countries.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
