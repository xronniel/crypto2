@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Add New Agent</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.agents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Permit</label>
            <input type="text" name="permit" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>WhatsApp</label>
            <input type="text" name="whatsapp" class="form-control">
        </div>

        <div class="mb-3">
            <label>Company</label>
            <select name="company_id" class="form-control">
                <option value="">-- Select Company --</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- New Fields --}}
        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="address" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nationality</label>
            <input type="text" name="nationality" class="form-control">
        </div>

        <div class="mb-3">
            <label>Language</label>
            <input type="text" name="language" class="form-control">
        </div>

        <div class="mb-3">
            <label>Experience (years)</label>
            <input type="number" name="experience" class="form-control" min="0">
        </div>

        <div class="mb-3">
            <label>BRN</label>
            <input type="text" name="BRN" class="form-control">
        </div>

        <div class="mb-3">
            <label>Position</label>
            <input type="text" name="position" class="form-control">
        </div>

        <div class="mb-3">
            <label>About</label>
            <textarea name="about" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="superagent" class="form-check-input" id="superagent">
            <label class="form-check-label" for="superagent">Super Agent</label>
        </div>
        
        {{-- End New Fields --}}

        <button type="submit" class="btn btn-success">Add Agent</button>
    </form>
</div>
@endsection
