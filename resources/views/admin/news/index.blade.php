@extends('layouts.back-office.app')

@section('content')
<div class="container pt-4">
    <h1 class="mb-4">Manage News</h1>

    <!-- Add News Button -->
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('admin.news.create') }}" class="btn btn-success">+ Add News</a>
    </div>

    <!-- News List Section -->
    <div class="row">
        @foreach($newsList as $news)
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <!-- News Thumbnail -->
                <img src="{{ asset('storage/' . $news->thumbnail) }}" class="card-img-top" alt="{{ $news->title }}" style="height: 200px; object-fit: cover;">

                <div class="card-body d-flex flex-column">
                    <!-- News Title -->
                    <h5 class="card-title">{{ $news->title }}</h5>

                    <!-- News Content (Limited Characters) -->
                    <p class="card-text text-muted">
                        {{ \Illuminate\Support\Str::limit(strip_tags($news->content), 150) }}
                    </p>

                    <!-- News Date and Location -->
                    <p class="text-muted mb-3">
                        <small>{{ $news->state }}, {{ $news->country }} - {{ $news->date->format('M d, Y') }}</small>
                    </p>

                    <!-- Action Buttons -->
                    <div class="mt-auto d-flex justify-content-between">
                        <a href="{{ route('admin.news.show', $news->id) }}" class="btn btn-sm btn-primary">Read More</a>
                        <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- No News Found Message -->
    @if($newsList->isEmpty())
    <div class="alert alert-info text-center" role="alert">
        No news available. <a href="{{ route('admin.news.create') }}" class="alert-link">Add some news</a> to get started.
    </div>
    @endif

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $newsList->links() }}
    </div>
</div>
@endsection
