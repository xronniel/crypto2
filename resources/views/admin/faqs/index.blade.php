@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1 class="mb-4">FAQ List</h1>
    <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary mb-3">Add FAQ</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Question</th>
                <th>Answer</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($faqs as $faq)
                <tr>
                    <td>{{ $faq->question }}</td>
                    <td>{{ Str::limit($faq->answer, 50) }}</td>
                    <td>{{ $faq->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this FAQ?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No FAQs found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        {{ $faqs->links() }}
    </div>
</div>
@endsection
