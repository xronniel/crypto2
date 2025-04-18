@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1 class="mb-4">Edit Contact Us Page</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.contact-us.update', $contactUs) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $contactUs->address }}" required>
                </div>

                <div class="mb-3">
                    <label for="map" class="form-label">Embed Map</label>
                    <textarea class="form-control" id="map" name="map" rows="3" required>{{ $contactUs->map }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="emails" class="form-label">Emails (Comma separated)</label>
                    <input type="text" class="form-control" id="emails" name="emails" value="{{ $contactUs->emails }}" required>
                </div>

                <div class="mb-3">
                    <label for="contacts" class="form-label">Contact Numbers (Comma separated)</label>
                    <input type="text" class="form-control" id="contacts" name="contacts" value="{{ $contactUs->contacts }}" required>
                </div>

                <div class="mb-3">
                    <label for="address_icon" class="form-label">Address Icon</label>
                    <input type="file" class="form-control" id="address_icon" name="address_icon">
                    @if($contactUs->address_icon)
                        <img src="{{ asset('storage/' . $contactUs->address_icon) }}" alt="Current Address Icon" class="mt-2" width="100">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="contact_icon" class="form-label">Contact Icon</label>
                    <input type="file" class="form-control" id="contact_icon" name="contact_icon">
                    @if($contactUs->contact_icon)
                        <img src="{{ asset('storage/' . $contactUs->contact_icon) }}" alt="Current Contact Icon" class="mt-2" width="100">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="email_icon" class="form-label">Email Icon</label>
                    <input type="file" class="form-control" id="email_icon" name="email_icon">
                    @if($contactUs->email_icon)
                        <img src="{{ asset('storage/' . $contactUs->email_icon) }}" alt="Current Email Icon" class="mt-2" width="100">
                    @endif
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Update Contact Information</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection