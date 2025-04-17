@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Figure Detail</h1>

    <div class="card">
        <div class="card-body">
            <h4>{{ $figure->title }}</h4>
            <p>{{ $figure->text }}</p>
            <p>
                <strong>Status:</strong>
                <span class="badge bg-{{ $figure->status ? 'success' : 'secondary' }}">
                    {{ $figure->status ? 'Active' : 'Inactive' }}
                </span>
            </p>

            <a href="{{ route('admin.crypto-home-in-figures.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
