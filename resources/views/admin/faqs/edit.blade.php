@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Edit FAQ</h1>

    <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" name="question" id="question" class="form-control" value="{{ $faq->question }}" required>
        </div>

        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <textarea name="answer" id="answer" class="form-control" rows="5" required>{{ $faq->answer }}</textarea>
        </div>

        <div class="mb-3">
            <label for="is_active" class="form-label">Status</label>
            <select name="is_active" id="is_active" class="form-control">
                <option value="1" {{ $faq->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$faq->is_active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update FAQ</button>
    </form>
</div>
@endsection
