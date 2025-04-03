@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Edit Review</h1>
    <form action="{{ route('admin.reviews.update', $review) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.reviews.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
