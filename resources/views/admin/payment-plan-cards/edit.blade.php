@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1 class="mb-4">Edit Plan Card</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.listings.payment-plan-cards.update', [$listing, $paymentPlanCard]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="payment_plan_name" class="form-label">Payment Plan Name</label>
                    <input type="text" class="form-control" id="payment_plan_name" name="payment_plan_name" value="{{ $paymentPlanCard->payment_plan_name }}" required>
                </div>

                <div class="mb-3">
                    <label for="percentage" class="form-label">Percentage (%)</label>
                    <input type="number" class="form-control" id="percentage" name="percentage" min="0" max="100" value="{{ $paymentPlanCard->percentage }}" required>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Description</label>
                    <textarea class="form-control" id="text" name="text" rows="3" required>{{ $paymentPlanCard->text }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="active" {{ $paymentPlanCard->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $paymentPlanCard->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Update Payment Plan Card</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection