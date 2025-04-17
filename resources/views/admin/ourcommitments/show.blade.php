@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Commitment Details</h1>

    <div class="card">
        <div class="card-body">

            @if($commitment->icon)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $commitment->icon) }}" alt="icon" width="100">
                </div>
            @endif

            <div class="mb-3">
                <strong>Title:</strong>
                <p>{{ $commitment->title }}</p>
            </div>

            <div class="mb-3">
                <strong>Text:</strong>
                <p>{{ $commitment->text }}</p>
            </div>

            <div class="mb-3">
                <strong>Status:</strong>
                <span class="badge bg-{{ $commitment->status ? 'success' : 'secondary' }}">
                    {{ $commitment->status ? 'Active' : 'Inactive' }}
                </span>
            </div>

            <a href="{{ route('admin.ourcommitments.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
