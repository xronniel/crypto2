@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Edit Agent</h1>

    <form action="{{ route('admin.agents.update', $agent->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $agent->name }}" required>
        </div>

        <div class="mb-3">
            <label>Photo</label>
            <input type="file" name="photo" class="form-control">
            @if($agent->photo)
                <img src="{{ asset('storage/'.$agent->photo) }}" alt="{{ $agent->name }}" width="50">
            @endif
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $agent->phone }}" required>
        </div>

        <div class="mb-3">
            <label>Permit</label>
            <input type="text" name="permit" class="form-control" value="{{ $agent->permit }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $agent->email }}" required>
        </div>

        <div class="mb-3">
            <label>WhatsApp</label>
            <input type="text" name="whatsapp" class="form-control" value="{{ $agent->whatsapp }}">
        </div>

        <button type="submit" class="btn btn-success">Update Agent</button>
    </form>
</div>
@endsection