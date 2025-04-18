@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1 class="mb-4">About Us List</h1>

    <a href="{{ route('admin.aboutus.create') }}" class="btn btn-primary mb-3">Add About Us</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hero Title</th>
                <th>Hero Text</th>
                <th>Image</th>
                <th>WWO Title 1</th>
                <th>WWO Text 1</th>
                <th>WWO Title 2</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aboutus as $abount)
                <tr>
                    <td>{{ $abount->hero_title }}</td>
                    <td>{{ $abount->hero_text }}</td>
                    <td>
                        @if($abount->image)
                            @php $isUrl = filter_var($abount->image, FILTER_VALIDATE_URL); @endphp
                            <img src="{{ $isUrl ? $abount->image : asset('storage/' . $abount->image) }}" 
                                 alt="About Us Image" width="50">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $abount->wwo_section1_title1 }}</td>
                    <td>{{ $abount->wwo_section1_text1 }}</td>
                    <td>{{ $abount->wwo_section1_title2 }}</td>
                    <td>
                        <a href="{{ route('admin.aboutus.edit', $abount->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('admin.aboutus.show', $abount->id) }}" class="btn btn-sm btn-info">View</a>
                        <form action="{{ route('admin.aboutus.destroy', $abount->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
