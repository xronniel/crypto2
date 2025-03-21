@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Districts List</h1>
    <a href="{{ route('admin.districts.create') }}" class="btn btn-primary mb-3">Add District</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Emirate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($districts as $district)
                <tr>
                    <td>{{ $district->name }}</td>
                    <td>
                        @if($district->image)
                            <img src="{{ asset('storage/' . $district->image) }}" alt="{{ $district->name }}" width="50">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $district->emirate->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.districts.edit', $district->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.districts.destroy', $district->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this district?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No districts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $districts->links() }}
</div>
@endsection
