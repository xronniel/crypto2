@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>{{ $news->title }}</h1>
    <p><small class="text-muted">{{ $news->state }}, {{ $news->country }} - {{ $news->date->format('M d, Y') }}</small></p>

    <img src="{{ asset('storage/' . $news->thumbnail) }}" class="img-fluid mb-4" alt="{{ $news->title }}">

    <div class="content">
        {!! $news->content !!}
    </div>

    <!-- Gallery Images -->
    @if($news->galleries->count() > 0)
    <h3 class="mt-4">Gallery</h3>
    <div class="row">
        @foreach($news->galleries as $gallery)
        <div class="col-md-4 mb-3">
            <img src="{{ asset('storage/' . $gallery->image_path) }}" class="img-fluid" alt="Gallery Image">
        </div>
        @endforeach
    </div>
    @endif

    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary mt-4">Back to News</a>
</div>
@endsection
