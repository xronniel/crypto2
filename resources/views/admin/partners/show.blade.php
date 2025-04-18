@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Partner Details</h1>

    <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary mb-3">← Back to List</a>

    <div class="card p-4">
        <div class="row mb-3">
            <div class="col-md-2 font-weight-bold">Image:</div>
            <div class="col-md-10">
                @if($partner->image)
                    <img src="{{ asset('storage/' . $partner->image) }}" 
                         alt="{{ $partner->name }}" width="100">
                @else
                    No Image
                @endif
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-2 font-weight-bold">Name:</div>
            <div class="col-md-10">{{ $partner->name }}</div>
        </div>
    </div>
</div>
@endsection
