@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Countries</h1>
    <a href="{{ route('admin.countries.create') }}" class="btn btn-primary mb-3">Add Country</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $country)
            <tr>
                <td>{{ $country->id }}</td>
                <td>{{ $country->name }}</td>
                <td>
                    <a href="{{ route('admin.countries.edit', $country->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.countries.destroy', $country->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $countries->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
