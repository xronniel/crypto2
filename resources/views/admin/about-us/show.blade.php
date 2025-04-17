@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1 class="mb-4">About Us Details</h1>

    <div class="card">
        <div class="card-body">
            <h4>Hero Section</h4>
            <p><strong>Title:</strong> {{ $aboutus->hero_title }}</p>
            <p><strong>Text:</strong> {{ $aboutus->hero_text }}</p>
            @if($aboutus->image)
                <p><strong>Image:</strong></p>
                <img src="{{ asset('storage/' . $aboutus->image) }}" alt="Hero Image" width="200">
            @endif

            <hr>
            <h4>WWO Section 1</h4>
            <p><strong>Title 1:</strong> {{ $aboutus->wwo_section1_title1 }}</p>
            <p><strong>Text 1:</strong> {{ $aboutus->wwo_section1_text1 }}</p>
            <p><strong>Title 2:</strong> {{ $aboutus->wwo_section1_title2 }}</p>
            <p><strong>Text 2:</strong> {{ $aboutus->wwo_section1_text2 }}</p>

            <hr>
            <h4>WWO Section 2</h4>
            <p><strong>Title 1:</strong> {{ $aboutus->wwo_section2_title1 }}</p>
            <p><strong>Text 1:</strong> {{ $aboutus->wwo_section2_text1 }}</p>
            <p><strong>Title 2:</strong> {{ $aboutus->wwo_section2_title2 }}</p>
            <p><strong>Text 2:</strong> {{ $aboutus->wwo_section2_text2 }}</p>
            <p><strong>Title 3:</strong> {{ $aboutus->wwo_section2_title3 }}</p>
            <p><strong>Text 3:</strong> {{ $aboutus->wwo_section2_text3 }}</p>

            <hr>
            <h4>WWO Section 3</h4>
            <p><strong>Title:</strong> {{ $aboutus->wwo_section3_title1 }}</p>
            <p><strong>Text:</strong> {{ $aboutus->wwo_section3_text1 }}</p>
            <p><strong>Icon:</strong> {{ $aboutus->wwo_section3_icon }}</p>

            <hr>
            <a href="{{ route('admin.aboutus.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
