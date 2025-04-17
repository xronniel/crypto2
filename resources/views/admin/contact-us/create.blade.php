@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1 class="mb-4">Create Contact Us Page</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.contact-us.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>

                <div class="mb-3">
                    <label for="map" class="form-label">Embed Map</label>
                    <textarea class="form-control" id="map" name="map" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="emails" class="form-label">Emails (Comma separated)</label>
                    <input type="text" class="form-control" id="emails" name="emails" required>
                </div>

                <div class="mb-3">
                    <label for="contacts" class="form-label">Contact Numbers (Comma separated)</label>
                    <input type="text" class="form-control" id="contacts" name="contacts" required>
                </div>

                <div class="mb-3">
                    <label for="address_icon" class="form-label">Address Icon</label>
                    <input type="file" class="form-control" id="address_icon" name="address_icon">
                </div>

                <div class="mb-3">
                    <label for="contact_icon" class="form-label">Contact Icon</label>
                    <input type="file" class="form-control" id="contact_icon" name="contact_icon">
                </div>

                <div class="mb-3">
                    <label for="email_icon" class="form-label">Email Icon</label>
                    <input type="file" class="form-control" id="email_icon" name="email_icon">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Create Contact Information</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection