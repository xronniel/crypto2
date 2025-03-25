@extends('layouts.back-office.app')

@section('content')
<div class="container pt-4">
    <h1 class="mb-4">Manage Article</h1>

    <!-- Add News Button -->
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('admin.articles.create') }}" class="btn btn-success">+ Add Article</a>
    </div>

    <!-- News List Section -->
    <div class="row">
        @foreach($articleList as $article)
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <!-- News Thumbnail -->
                <img src="{{ asset('storage/' . $article->thumbnail) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">

                <div class="card-body d-flex flex-column">
                    <!-- News Title -->
                    <h5 class="card-title">{{ $article->title }}</h5>

                    <!-- News Content (Limited Characters) -->
                    <p class="card-text text-muted">
                        {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 150) }}
                    </p>

                    <!-- News Date and Location -->
                    <p class="text-muted mb-3">
                        <small>{{ $article->state }}, {{ $article->country }} - {{ $article->date->format('M d, Y') }}</small>
                    </p>

                    <!-- Action Buttons -->
                    <div class="mt-auto d-flex justify-content-between">
                        <a href="{{ route('admin.articles.show', $article->id) }}" class="btn btn-sm btn-primary">Read More</a>
                        <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- No News Found Message -->
    @if($articleList->isEmpty())
    <div class="alert alert-info text-center" role="alert">
        No article available. <a href="{{ route('admin.articles.create') }}" class="alert-link">Add some article</a> to get started.
    </div>
    @endif

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $articleList->links() }}
    </div>
</div>
@endsection
