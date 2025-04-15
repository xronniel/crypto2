@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Property Leads</h1>

    @if ($leads->isEmpty())
        <p>No leads found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Source Page</th>
                    <th>Property Ref No</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $lead)
                    <tr>
                        <td>{{ $lead->id }}</td>
                        <td>{{ $lead->full_name }}</td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->source_page }}</td>
                        <td>{{ $lead->property_ref_no ?? 'N/A' }}</td>
                        <td>{{ $lead->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.property-leads.show', $lead) }}" class="btn btn-primary btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        {{ $leads->links('pagination::bootstrap-4') }}

    @endif
</div>
@endsection