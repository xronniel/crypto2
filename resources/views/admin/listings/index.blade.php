@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Listings</h1>
    <a href="{{ route('admin.listings.create') }}" class="btn btn-primary mb-3">Add New Listing</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Property Title</th>
                <th>Price</th>
                <th>Community</th>
                <th>Listing Agent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($listings as $listing)
                <tr>
                    <td>{{ $listing->id }}</td>
                    <td>{{ $listing->property_title }}</td>
                    <td>{{ number_format($listing->price, 2) }}</td>
                    <td>{{ $listing->community }}</td>
                    <td>{{ $listing->listing_agent }}</td>
                    <td>
                        <a href="{{ route('admin.listings.show', $listing->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.listings.edit', $listing->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.listings.destroy', $listing->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No listings found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $listings->links() }}
</div>
@endsection
