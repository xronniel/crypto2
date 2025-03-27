@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Add New FAQ</h1>

    <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    <form action="{{ route('admin.faqs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" name="question" id="question" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <textarea name="answer" id="answer" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="is_active" class="form-label">Status</label>
            <select name="is_active" id="is_active" class="form-control">
                <option value="1" selected>Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add FAQ</button>
    </form>
</div>
@endsection
