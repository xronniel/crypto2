@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Reviews</h1>
    <a href="{{ route('admin.reviews.create') }}" class="btn btn-primary">Add Review</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Country</th>
                <th>Reviewer</th>
                <th>Review</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
            <tr>
                <td>{{ $review->reviewer_name }}</td>
                <td><img src="{{ asset('storage/' . $review->image) }}" width="50"></td>
                <td>
                    <img src="{{ asset('storage/' . $review->country_image) }}" width="50"> 
                    {{ $review->country_name }}
                </td>
                <td>{{ $review->reviewer_details }}</td>
                <td>{{ Str::limit($review->review, 50) }}</td>
                <td>{{ $review->active ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('admin.reviews.edit', $review) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $reviews->links() }}
</div>
@endsection
