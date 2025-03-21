@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Add New Country</h1>
    <form action="{{ route('admin.countries.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Country Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <button class="btn btn-success">Add Country</button>
        <a href="{{ route('admin.countries.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
