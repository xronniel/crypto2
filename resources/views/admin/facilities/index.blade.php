@extends('layouts.back-office.app')

@section('content')
<div class="container pt-4">
    <h1 class="mb-4">Facilities</h1>
    <a href="{{ route('admin.facilities.create') }}" class="btn btn-success mb-4">+ Add Facility</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facilities as $facility)
            <tr>
                <td>{{ $facility->name }}</td>
                <td>
                    @if($facility->image)
                        <img src="{{ asset('storage/' . $facility->image) }}" alt="{{ $facility->name }}" width="50">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.facilities.edit', $facility->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.facilities.destroy', $facility->id) }}" method="POST" style="display:inline-block;">
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
        {{ $facilities->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection