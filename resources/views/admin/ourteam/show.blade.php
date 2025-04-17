@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Team Member Details</h1>

    <div class="card">
        <div class="card-body">
            <h4>Name: {{ $member->name }}</h4>
            <p><strong>Role:</strong> {{ $member->role }}</p>
            <p><strong>Email:</strong> {{ $member->email }}</p>
            <p><strong>Mobile:</strong> {{ $member->mobile }}</p>
            <p><strong>SNO:</strong> {{ $member->sno }}</p>
            @if($member->image)
                <p><strong>Image:</strong></p>
                <img src="{{ asset('storage/' . $member->image) }}" width="150">
            @endif

            <br><br>
            <a href="{{ route('admin.ourteam.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
