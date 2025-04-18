@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Our Commitments</h1>

    <a href="{{ route('admin.ourcommitments.create') }}" class="btn btn-primary mb-3">Add Commitment</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Icon</th>
                <th>Title</th>
                <th>Text</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commitments as $commitment)
                <tr>
                    <td>
                        @if($commitment->icon)
                            <img src="{{ asset('storage/' . $commitment->icon) }}" alt="icon" width="50">
                        @else
                            No Icon
                        @endif
                    </td>
                    <td>{{ $commitment->title }}</td>
                    <td>{{ Str::limit($commitment->text, 50) }}</td>
                    <td>
                        <span class="badge bg-{{ $commitment->status ? 'success' : 'secondary' }}">
                            {{ $commitment->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.ourcommitments.show', $commitment->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.ourcommitments.edit', $commitment->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.ourcommitments.destroy', $commitment->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this commitment?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if($commitments->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">No commitments found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection