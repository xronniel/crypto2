@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1 class="mb-4">Contact Us Page</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('admin.contact-us.create') }}" class="btn btn-primary btn-sm px-2">
            Add Contact Information
        </a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Address</th>
                <th>Map</th>
                <th>Emails</th>
                <th>Contacts</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->address }}</td>
                    <td>{!! $contact->map !!}</td>
                    <td>{{ $contact->emails }}</td>
                    <td>{{ $contact->contacts }}</td>
                    <td>
                        <a href="{{ route('admin.contact-us.edit', $contact) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.contact-us.destroy', $contact) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $contacts->links() }} <!-- Pagination links -->
    </div>
</div>
@endsection