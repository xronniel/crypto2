@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Comment</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.comments.update', $comment) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $comment->name) }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $comment->content) }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $comment->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>
                            <small class="text-muted">Toggle to activate or deactivate this comment</small>
                        </div>
                        
                        <div class="mb-3">
                            <p><strong>Comment Type:</strong> {{ class_basename($comment->commentable_type) }}</p>
                            <p>
                                <strong>Related Content:</strong>
                                @if($comment->commentable)
                                    <a href="{{ $comment->commentable_type === 'App\\Models\\News' ? route('admin.news.edit', $comment->commentable->id) : route('admin.articles.edit', $comment->commentable->id) }}" target="_blank">
                                        {{ $comment->commentable->title ?? 'Unknown' }}
                                    </a>
                                @else
                                    Item not found
                                @endif
                            </p>
                            <p><strong>Created At:</strong> {{ $comment->created_at->format('Y-m-d H:i') }}</p>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.comments.index') }}" class="btn btn-secondary">Back to List</a>
                            <button type="submit" class="btn btn-primary">Update Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
