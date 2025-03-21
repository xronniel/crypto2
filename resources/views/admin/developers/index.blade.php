@extends('layouts.back-office..app')

@section('content')
<div class="container">
    <h1 class="mb-4">Developers List</h1>

    <a href="{{ route('admin.developers.create') }}" class="btn btn-primary mb-3">Add Developer</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($developers as $developer)
                <tr>
                    <td>{{ $developer->name }}</td>
                    <td>
                        @if($developer->img)
                            <img src="{{ asset('storage/' . $developer->img) }}" alt="{{ $developer->name }}" width="50">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.developers.edit', $developer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.developers.destroy', $developer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this developer?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No developers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
