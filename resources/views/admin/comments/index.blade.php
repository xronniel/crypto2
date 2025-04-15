@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Comments Management</h2>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Filter Form -->
                    <div class="mb-4">
                        <form action="{{ route('admin.comments.index') }}" method="GET" class="row g-3">
                            <div class="col-md-4">
                                <select name="type" id="comment-type" class="form-select">
                                    <option value="">-- All Content Types --</option>
                                    <option value="news" {{ request('type') == 'news' ? 'selected' : '' }}>News</option>
                                    <option value="article" {{ request('type') == 'article' ? 'selected' : '' }}>Article</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="content_id" id="content-dropdown" class="form-select">
                                    <option value="">-- All Content --</option>
                                    @if(request('type') == 'news')
                                        @foreach($newsItems as $news)
                                            <option value="{{ $news->id }}" {{ request('content_id') == $news->id ? 'selected' : '' }}>{{ $news->title }}</option>
                                        @endforeach
                                    @elseif(request('type') == 'article')
                                        @foreach($articleItems as $article)
                                            <option value="{{ $article->id }}" {{ request('content_id') == $article->id ? 'selected' : '' }}>{{ $article->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="{{ route('admin.comments.index') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>
                    </div>
                    
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const typeSelect = document.getElementById('comment-type');
                            const contentDropdown = document.getElementById('content-dropdown');
                            
                            const emptyOption = '<option value="">-- All Content --</option>';
                            const newsOptions = [
                                emptyOption,
                                @foreach($newsItems as $news)
                                    '<option value="{{ $news->id }}">{{ addslashes($news->title) }}</option>',
                                @endforeach
                            ];
                            
                            const articleOptions = [
                                emptyOption,
                                @foreach($articleItems as $article)
                                    '<option value="{{ $article->id }}">{{ addslashes($article->title) }}</option>',
                                @endforeach
                            ];
                            
                            typeSelect.addEventListener('change', function() {
                                contentDropdown.innerHTML = '';
                                
                                if (this.value === 'news') {
                                    contentDropdown.innerHTML = newsOptions.join('');
                                } else if (this.value === 'article') {
                                    contentDropdown.innerHTML = articleOptions.join('');
                                } else {
                                    contentDropdown.innerHTML = emptyOption;
                                }
                            });
                        });
                    </script>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Content</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($comments as $comment)
                                    <tr class="table-primary">
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->name }}</td>
                                        <td>{{ Str::limit($comment->content, 50) }}</td>
                                        <td>
                                            {{ class_basename($comment->commentable_type) }}:
                                            @if($comment->commentable)
                                                <a href="{{ $comment->commentable_type === 'App\\Models\\News' ? route('admin.news.edit', $comment->commentable->id) : route('admin.articles.edit', $comment->commentable->id) }}" target="_blank">
                                                    {{ $comment->commentable->title ?? 'Unknown' }}
                                                </a>
                                            @else
                                                Item not found
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge {{ $comment->is_active ? 'bg-success' : 'bg-danger' }}">
                                                {{ $comment->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>{{ $comment->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.comments.edit', $comment) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    
                                    @foreach($comment->children as $reply)
                                        @include('admin.comments.partials.comment-row', ['comment' => $reply, 'level' => 1])
                                    @endforeach
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No comments found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $comments->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
