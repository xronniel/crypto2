@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Communities List</h1>
    <a href="{{ route('admin.communities.create') }}" class="btn btn-primary mb-3">Add Community</a>

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
            @forelse($communities as $community)
                <tr>
                    <td>{{ $community->name }}</td>
                    <td>
                        @if($community->image)
                            <img src="{{ asset('storage/' . $community->image) }}" alt="{{ $community->name }}" width="50">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $community->emirate->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.communities.edit', $community->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.communities.destroy', $community->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this community?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No communities found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $communities->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
