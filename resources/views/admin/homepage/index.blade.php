@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1 class="mb-4">Home Page Content Management</h1>

    {{-- Display Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Display Error Messages --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> Please correct the errors below.
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Edit Button --}}
    <a href="{{ route('admin.homepage.edit') }}" class="btn btn-primary mb-4">Edit Contents</a>

    {{-- Main Content Sections --}}
    <div class="row">
        <!-- Hero Section -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3>Hero Section</h3>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('storage/' . ($homepageContent->hero_image ?? 'default-hero.jpg')) }}" alt="Hero Image" class="img-fluid mb-3" width="200">
                    <p>{{ $homepageContent->text_hero_banner ?? 'No text available' }}</p>
                </div>
            </div>
        </div>

        <!-- Calculator Section -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3>Calculator Section</h3>
                </div>
                <div class="card-body">
                    <p><strong>{{ $homepageContent->calculator_title ?? 'No Title' }}</strong> - {{ $homepageContent->calculator_title2 ?? 'No Subtitle' }}</p>
                    <p>{{ $homepageContent->calculator_text ?? 'No text available' }}</p>
                </div>
            </div>
        </div>

        <!-- Buying Process Section -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3>Buying Process</h3>
                </div>
                <div class="card-body">
                    <p><strong>{{ $homepageContent->buying_process_title ?? 'No Title' }}</strong></p>
                    <p>{{ $homepageContent->buying_process_text ?? 'No description available' }}</p>
                </div>
            </div>
        </div>

        <!-- Requirements Section -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3>Requirements Section</h3>
                </div>
                <div class="card-body">
                    <p><strong>{{ $homepageContent->requirements_title ?? 'No Title' }}</strong></p>
                    <p>{{ $homepageContent->requirements_text ?? 'No description available' }}</p>
                </div>
            </div>
        </div>

        <!-- App Coming Soon Section -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3>App Coming Soon Section</h3>
                </div>
                <div class="card-body">
                    <p><strong>{{ $homepageContent->app_coming_soon_title ?? 'No Title' }}</strong></p>
                    <p>{{ $homepageContent->app_coming_soon_text ?? 'No text available' }}</p>
                </div>
            </div>
        </div>

        <!-- Social Links Section -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3>Social Links</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ $homepageContent->facebook_link ?? '#' }}" target="_blank" class="btn btn-outline-primary">Facebook</a>
                        <a href="{{ $homepageContent->linkedin_link ?? '#' }}" target="_blank" class="btn btn-outline-info">LinkedIn</a>
                        <a href="{{ $homepageContent->instagram_link ?? '#' }}" target="_blank" class="btn btn-outline-danger">Instagram</a>
                        <a href="{{ $homepageContent->tiktok_link ?? '#' }}" target="_blank" class="btn btn-outline-dark">TikTok</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
