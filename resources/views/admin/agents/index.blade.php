@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Agents List</h1>
    <a href="{{ route('admin.agents.create') }}" class="btn btn-primary mb-3">Add Agent</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Photo</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Super Agent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agents as $agent)
                <tr>
                    <td>{{ $agent->name }}</td>
                    <td>
                        @if($agent->photo)
                            @php
                                // Check if the agent photo is a URL or stored in storage
                                $isUrl = filter_var($agent->photo, FILTER_VALIDATE_URL);
                            @endphp
                            <img src="{{ $isUrl ? $agent->photo : asset('storage/' . $agent->photo) }}" 
                                 alt="{{ $agent->name }}" width="50">
                        @else
                            No Image
                        @endif
                    </td>
                    
                    <td>{{ $agent->phone }}</td>
                    <td>{{ $agent->email }}</td>
                    <td>{{ $agent->superagent ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('admin.agents.show', $agent->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('admin.agents.edit', $agent->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.agents.destroy', $agent->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $agents->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection