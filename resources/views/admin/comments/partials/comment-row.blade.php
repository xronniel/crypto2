<tr class="table-light">
    <td>
        @if($level > 0)
            <div style="padding-left: {{ $level * 20 }}px;">
                <i class="fas fa-reply text-muted"></i>
                {{ $comment->id }}
            </div>
        @else
            {{ $comment->id }}
        @endif
    </td>
    <td>
        <div class="{{ $level > 0 ? 'ms-' . ($level * 2 + 1) : '' }}">
            {{ $comment->name }}
        </div>
    </td>
    <td>
        <div class="{{ $level > 0 ? 'ms-' . ($level * 2 + 1) : '' }}">
            {{ Str::limit($comment->content, 50) }}
        </div>
    </td>
    <td>
        <div class="{{ $level > 0 ? 'ms-' . ($level * 2 + 1) : '' }}">
            @if($level > 0)
                <small class="text-muted">Same as parent</small>
            @else
                @if($comment->commentable)
                    {{ class_basename($comment->commentable_type) }}:
                    <a href="{{ $comment->commentable_type === 'App\\Models\\News' ? route('admin.news.edit', $comment->commentable->id) : route('admin.articles.edit', $comment->commentable->id) }}" target="_blank">
                        {{ $comment->commentable->title ?? 'Unknown' }}
                    </a>
                @else
                    Item not found
                @endif
            @endif
        </div>
    </td>
    <td>
        <span class="badge {{ $comment->is_active ? 'bg-success' : 'bg-danger' }}">
            {{ $comment->is_active ? 'Active' : 'Inactive' }}
        </span>
    </td>
    <td>{{ $comment->created_at->format('Y-m-d H:i') }}</td>
    <td>
        @php
            $btnClass = $level === 0 ? 'primary' : ($level === 1 ? 'outline-primary' : 'outline-secondary');
            $btnDangerClass = $level === 0 ? 'danger' : ($level === 1 ? 'outline-danger' : 'outline-secondary');
        @endphp
        
        <a href="{{ route('admin.comments.edit', $comment) }}" class="btn btn-sm btn-{{ $btnClass }}">Edit</a>
        <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-{{ $btnDangerClass }}" onclick="return confirm('Are you sure you want to delete this {{ $level > 0 ? 'reply' : 'comment' }}?')">Delete</button>
        </form>
    </td>
</tr>

@if(isset($comment->children) && $comment->children->count() > 0)
    @foreach($comment->children as $childComment)
        @include('admin.comments.partials.comment-row', ['comment' => $childComment, 'level' => $level + 1])
    @endforeach
@endif
