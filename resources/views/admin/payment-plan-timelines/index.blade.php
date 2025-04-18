@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1 class="mb-4">Payment Plan Timelines</h1>

    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('admin.listings.payment-plan-timelines.create', $listing) }}" class="btn btn-primary btn-sm px-2">
            Add New Payment Plan Timeline
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paymentPlanTimelines as $timeline)
                <tr>
                    <td>{{ $timeline->title }}</td>
                    <td>{{ $timeline->date }}</td>
                    <td>{{ ucfirst($timeline->status) }}</td>
                    <td>
                        <a href="{{ route('admin.listings.payment-plan-timelines.edit', [$listing, $timeline]) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.listings.payment-plan-timelines.destroy', [$listing, $timeline]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection