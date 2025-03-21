@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Home Page Settings</h1>
        {{-- Display Success Message --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Display Error Messages --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('admin.homepage.edit') }}" class="btn btn-primary">Edit</a>

    <div class="mt-4">
        <h3>Hero Section</h3>
        <img src="{{ asset('storage/' . ($homepageContent->hero_image ?? '')) }}" width="200" />
        <p>{{ $homepageContent->text_hero_banner ?? '' }}</p>

        <h3>Calculator Section</h3>
        <p>{{ $homepageContent->calculator_title ?? '' }} - {{ $homepageContent->calculator_title2 ?? '' }}</p>
        <p>{{ $homepageContent->calculator_text ?? '' }}</p>

        <h3>Buying Process</h3>
        <p>{{ $homepageContent->buying_process_title ?? '' }}</p>
        <p>{{ $homepageContent->buying_process_text ?? '' }}</p>

        <h3>Requirements Section</h3>
        <p>{{ $homepageContent->requirements_title ?? '' }}</p>
        <p>{{ $homepageContent->requirements_text ?? '' }}</p>

        <h3>App Coming Soon Section</h3>
        <p>{{ $homepageContent->app_coming_soon_title ?? '' }}</p>
        <p>{{ $homepageContent->app_coming_soon_text ?? '' }}</p>

        <h3>Social Links</h3>
        <a href="{{ $homepageContent->facebook_link ?? '#' }}" target="_blank">Facebook</a> |
        <a href="{{ $homepageContent->linkedin_link ?? '#' }}" target="_blank">LinkedIn</a> |
        <a href="{{ $homepageContent->instagram_link ?? '#' }}" target="_blank">Instagram</a> |
        <a href="{{ $homepageContent->tiktok_link ?? '#' }}" target="_blank">TikTok</a>
    </div>
</div>
@endsection