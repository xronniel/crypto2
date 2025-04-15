@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1>Add New Listing</h1>
    <a href="{{ route('admin.listings.index') }}" class="btn btn-secondary mb-3">Back to Listings</a>

    {{-- Display Errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> Please correct the errors below.
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form to Add New Listing --}}
    <form action="{{ route('admin.listings.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.listings._form')
    </form>
</div>
@endsection