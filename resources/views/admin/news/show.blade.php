@extends('layouts.back-office.app')

@section('content')
<div class="container pt-4">
    <!-- News Title and Meta -->
    <div class="mb-4 text-center">
        <h1 class="mb-2">{{ $news->title }}</h1>
        <p class="text-muted">
            {{ $news->state }}, {{ $news->country }} - {{ $news->date->format('M d, Y') }}
        </p>
    </div>

    <!-- News Thumbnail -->
    <div class="text-center mb-4">
        <img src="{{ asset('storage/' . $news->thumbnail) }}" class="img-fluid rounded" alt="{{ $news->title }}" style="max-width: 600px;">
    </div>

    <!-- News Content -->
    <div class="content mb-5">
        {!! $news->content !!}
    </div>

    <!-- Gallery Section -->
    @if($news->galleries->count() > 0)
        <h3 class="mt-5 mb-3">Gallery</h3>
        <div class="row">
            @foreach($news->galleries as $gallery)
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="text-center">
                        <img src="{{ asset('storage/' . $gallery->image_path) }}" class="img-fluid rounded shadow-sm" alt="Gallery Image" style="max-height: 250px;">
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Action Buttons -->
    <div class="d-flex justify-content-center mt-4">
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary me-2">Back to News</a>
        <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-warning">Edit News</a>
    </div>
</div>
@endsection
