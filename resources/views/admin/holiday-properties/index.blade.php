@extends('layouts.back-office.app')

@section('content')
<div class="container pt-4">
    <h1 class="mb-4">Holiday Properties</h1>
    <a href="{{ route('admin.holiday-properties.create') }}" class="btn btn-success mb-4">+ Add Holiday Property</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Reference Number</th>
                <th>Property Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($holidayProperties as $property)
            <tr>
                <td>{{ $property->id }}</td>
                <td>{{ $property->reference_number }}</td>
                <td>{{ $property->property_name }}</td>
                <td>{{ $property->price }}</td>
                <td>
                    <a href="{{ route('admin.holiday-properties.show', $property->id) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('admin.holiday-properties.edit', $property->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.holiday-properties.destroy', $property->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        {{ $holidayProperties->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection