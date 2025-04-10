@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Edit Agent</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                @php
                    $isUrl = filter_var($agent->photo, FILTER_VALIDATE_URL);
                @endphp
        
                @if($isUrl)
                    <img src="{{ $agent->photo }}" alt="{{ $agent->name }}" width="50">
                @else
                    <img src="{{ asset('storage/' . $agent->photo) }}" alt="{{ $agent->name }}" width="50">
                @endif
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

        {{-- New Fields --}}
        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="{{ $agent->address }}">
        </div>

        <div class="mb-3">
            <label>Nationality</label>
            <input type="text" name="nationality" class="form-control" value="{{ $agent->nationality }}">
        </div>

        <div class="mb-3">
            <label>Language</label>
            <input type="text" name="language" class="form-control" value="{{ $agent->language }}">
        </div>

        <div class="mb-3">
            <label>Experience (years)</label>
            <input type="number" name="experience" class="form-control" value="{{ $agent->experience }}" min="0">
        </div>

        <div class="mb-3">
            <label>BRN</label>
            <input type="text" name="BRN" class="form-control" value="{{ $agent->BRN }}">
        </div>

        <div class="mb-3">
            <label>Position</label>
            <input type="text" name="position" class="form-control" value="{{ $agent->position }}">
        </div>

        <div class="mb-3">
            <label>About</label>
            <textarea name="about" class="form-control" rows="4">{{ $agent->about }}</textarea>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="superagent" class="form-check-input" id="superagent" {{ old('superagent', $agent->superagent) ? 'checked' : '' }}>
            <label class="form-check-label" for="superagent">Super Agent</label>
        </div>
        
        {{-- End New Fields --}}

        <button type="submit" class="btn btn-success">Update Agent</button>
    </form>
</div>
@endsection
