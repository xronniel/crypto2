@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1 class="mb-4">Edit Payment Plan Timeline</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.listings.payment-plan-timelines.update', [$listing, $paymentPlanTimeline]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $paymentPlanTimeline->title }}" required>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ $paymentPlanTimeline->date }}" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="active" {{ $paymentPlanTimeline->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $paymentPlanTimeline->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Update Payment Plan Timeline</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection