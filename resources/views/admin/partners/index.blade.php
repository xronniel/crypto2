@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h2>Partners</h2>
    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">Add Partner</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partners as $partner)
                <tr>
                    <td>{{ $partner->name }}</td>
                    <td><img src="{{ asset('storage/' . $partner->image) }}" width="100" alt="Partner Image"></td>
                    <td>
                        <a href="{{ route('admin.partners.show', $partner) }}" class="btn btn-info">View</a>
                        <a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
