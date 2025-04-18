@extends('layouts.back-office.app')


@section('content')
<div class="container">
    <h1 class="mb-4">Our Team</h1>

    <a href="{{ route('admin.ourteam.create') }}" class="btn btn-primary mb-3">Add Team Member</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Role</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>SNO</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($team as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>
                        @if($member->image)
                            <img src="{{ asset('storage/' . $member->image) }}" width="50" alt="Team Member">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $member->role }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->mobile }}</td>
                    <td>{{ $member->sno }}</td>
                    <td>
                        <a href="{{ route('admin.ourteam.show', $member->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.ourteam.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.ourteam.destroy', $member->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
