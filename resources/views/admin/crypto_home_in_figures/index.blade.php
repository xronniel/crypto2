@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1 class="mb-4">CryptoHome In Figures</h1>

    <a href="{{ route('admin.crypto-home-in-figures.create') }}" class="btn btn-primary mb-3">Add New Figure</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Text</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($figures as $figure)
                <tr>
                    <td>{{ $figure->title }}</td>
                    <td>{{ Str::limit($figure->text, 50) }}</td>
                    <td>
                        <span class="badge bg-{{ $figure->status ? 'success' : 'secondary' }}">
                            {{ $figure->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.crypto-home-in-figures.show', $figure->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.crypto-home-in-figures.edit', $figure->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.crypto-home-in-figures.destroy', $figure->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No records found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
