@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Property Lead Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Lead ID: {{ $lead->id }}</h5>
            <p><strong>Full Name:</strong> {{ $lead->full_name }}</p>
            <p><strong>Email:</strong> {{ $lead->email }}</p>
            <p><strong>Phone:</strong> {{ $lead->phone ?? 'N/A' }}</p>
            <p><strong>Message:</strong> {{ $lead->message }}</p>
            <p><strong>Source Page:</strong> {{ $lead->source_page }}</p>
            <p><strong>Property Name:</strong> {{ isset($property) ? ($type === 'holiday' ? $property->property_name : $property->property_name) : 'N/A' }}</p>
            <p><strong>Property Ref No:</strong> {{ $lead->property_ref_no ?? 'N/A' }}</p>
            <p><strong>Created At:</strong> {{ $lead->created_at->format('F j, Y g:i A') }}</p>

        </div>
    </div>

    <a href="{{ route('admin.property-leads.index') }}" class="btn btn-secondary mt-3">Back to Leads</a>
</div>
@endsection