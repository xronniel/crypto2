@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Agent Details</h1>

    <a href="{{ route('admin.agents.index') }}" class="btn btn-secondary mb-3">← Back to List</a>

    <div class="card p-4">
        <div class="row mb-3">
            <div class="col-md-2 font-weight-bold">Photo:</div>
            <div class="col-md-10">
                @if($agent->photo)
                    @php $isUrl = filter_var($agent->photo, FILTER_VALIDATE_URL); @endphp
                    <img src="{{ $isUrl ? $agent->photo : asset('storage/' . $agent->photo) }}" 
                         alt="{{ $agent->name }}" width="100">
                @else
                    No Image
                @endif
            </div>
        </div>

        <div class="row mb-2"><div class="col-md-2 font-weight-bold">Name:</div><div class="col-md-10">{{ $agent->name }}</div></div>
        <div class="row mb-2"><div class="col-md-2 font-weight-bold">Phone:</div><div class="col-md-10">{{ $agent->phone }}</div></div>
        <div class="row mb-2"><div class="col-md-2 font-weight-bold">Email:</div><div class="col-md-10">{{ $agent->email }}</div></div>
        <div class="row mb-2"><div class="col-md-2 font-weight-bold">WhatsApp:</div><div class="col-md-10">{{ $agent->whatsapp }}</div></div>
        <div class="row mb-2"><div class="col-md-2 font-weight-bold">Permit:</div><div class="col-md-10">{{ $agent->permit }}</div></div>
        <div class="row mb-2"><div class="col-md-2 font-weight-bold">Address:</div><div class="col-md-10">{{ $agent->address }}</div></div>
        <div class="row mb-2"><div class="col-md-2 font-weight-bold">Nationality:</div><div class="col-md-10">{{ $agent->nationality }}</div></div>
        <div class="row mb-2"><div class="col-md-2 font-weight-bold">Language:</div><div class="col-md-10">{{ $agent->language }}</div></div>
        <div class="row mb-2"><div class="col-md-2 font-weight-bold">Experience:</div><div class="col-md-10">{{ $agent->experience }} years</div></div>
        <div class="row mb-2"><div class="col-md-2 font-weight-bold">BRN:</div><div class="col-md-10">{{ $agent->BRN }}</div></div>
        <div class="row mb-2"><div class="col-md-2 font-weight-bold">Position:</div><div class="col-md-10">{{ $agent->position }}</div></div>
        <div class="row mb-2"><div class="col-md-2 font-weight-bold">About:</div><div class="col-md-10">{{ $agent->about }}</div></div>
    </div>
</div>
@endsection
