@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1 class="mb-4">Create Payment Plan Timeline</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.listings.payment-plan-timelines.store', $listing) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Create Payment Plan Timeline</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection