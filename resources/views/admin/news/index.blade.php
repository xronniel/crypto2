@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1 class="mb-4">News</h1>

    <div class="mb-4">
        <a href="{{ route('admin.news.create') }}" class="btn btn-success">Add News</a>
    </div>

    @foreach($newsList as $news)
    <div class="card mb-4">
        <img src="{{ asset('storage/' . $news->thumbnail) }}" class="card-img-top" alt="{{ $news->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $news->title }}</h5>
            <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($news->content), 150) }}</p>
            <p><small class="text-muted">{{ $news->state }}, {{ $news->country }} - {{ $news->date->format('M d, Y') }}</small></p>
            <a href="{{ route('admin.news.show', $news->id) }}" class="btn btn-primary">Read More</a>
            <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
    @endforeach

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $newsList->links() }}
    </div>
</div>
@endsection
