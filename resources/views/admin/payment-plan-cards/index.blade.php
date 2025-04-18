@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1 class="mb-4">Payment Plan Cards</h1>

    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('admin.listings.payment-plan-cards.create', $listing) }}" class="btn btn-primary btn-sm px-2">
            Add New Payment Plan Card
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
                <th>Payment Plan Name</th>
                <th>Percentage</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paymentPlanCards as $card)
                <tr>
                    <td>{{ $card->payment_plan_name }}</td>
                    <td>{{ $card->percentage }}%</td>
                    <td>{{ ucfirst($card->status) }}</td>
                    <td>
                        <a href="{{ route('admin.listings.payment-plan-cards.edit', [$listing, $card]) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.listings.payment-plan-cards.destroy', [$listing, $card]) }}" method="POST" style="display:inline;">
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