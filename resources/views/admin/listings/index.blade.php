@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1 class="mb-4">Listings f</h1>
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
                        <div style="display: flex; gap: 4px; flex-wrap: wrap;">
                            <a href="{{ route('admin.listings.show', $listing->id) }}" class="btn btn-info btn-sm px-2">View</a>
                            <a href="{{ route('admin.listings.edit', $listing->id) }}" class="btn btn-warning btn-sm px-2">Edit</a>
                            @if($listing->off_plan == 1)
                                <a href="{{ route('admin.listings.payment-plan-cards.index', $listing) }}" class="btn btn-primary btn-sm px-2">Payment Cards</a>
                                <a href="{{ route('admin.listings.payment-plan-timelines.index', $listing) }}" class="btn btn-primary btn-sm px-2">Timelines</a>
                            @endif
                            <form action="{{ route('admin.listings.destroy', $listing->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm px-2">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No listings found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $listings->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
