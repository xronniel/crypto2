@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Add Review</h1>
    <form action="{{ route('admin.reviews.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.reviews.form')
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
