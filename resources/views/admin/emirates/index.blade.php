@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1>Emirates</h1>
    <a href="{{ route('admin.emirates.create') }}" class="btn btn-primary mb-3">Add Emirate</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emirates as $emirate)
            <tr>
                <td>{{ $emirate->id }}</td>
                <td>{{ $emirate->name }}</td>
                <td>{{ $emirate->country->name }}</td>
                <td>
                    <a href="{{ route('admin.emirates.edit', $emirate->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.emirates.destroy', $emirate->id) }}" method="POST" style="display:inline;">
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
        {{ $emirates->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
