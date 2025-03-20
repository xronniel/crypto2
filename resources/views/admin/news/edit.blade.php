@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit News</h1>

    <!-- Form to Edit News -->
    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="form-group mb-3">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $news->title) }}" required>
        </div>

        <!-- State and Country -->
        <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label for="state">State:</label>
                <input type="text" name="state" class="form-control" id="state" value="{{ old('state', $news->state) }}" required>
            </div>

            <div class="col-md-6 form-group mb-3">
                <label for="country">Country:</label>
                <input type="text" name="country" class="form-control" id="country" value="{{ old('country', $news->country) }}" required>
            </div>
        </div>

        <!-- Date and Time -->
        <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label for="date">Date:</label>
                <input type="date" name="date" class="form-control" id="date" value="{{ old('date', $news->date) }}" required>
            </div>

            <div class="col-md-6 form-group mb-3">
                <label for="time">Time:</label>
                <input type="time" name="time" class="form-control" id="time" value="{{ old('time', $news->time) }}" required>
            </div>
        </div>

        <!-- Thumbnail -->
        <div class="form-group mb-3">
            <label for="thumbnail">Thumbnail:</label>
            <input type="file" name="thumbnail" class="form-control" id="thumbnail">
            @if($news->thumbnail)
                <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="Current Thumbnail" class="img-thumbnail mt-2" width="150">
            @endif
        </div>

        <!-- Mobile Thumbnail -->
        <div class="form-group mb-3">
            <label for="mobile_thumbnail">Mobile Thumbnail:</label>
            <input type="file" name="mobile_thumbnail" class="form-control" id="mobile_thumbnail">
            @if($news->mobile_thumbnail)
                <img src="{{ asset('storage/' . $news->mobile_thumbnail) }}" alt="Current Mobile Thumbnail" class="img-thumbnail mt-2" width="150">
            @endif
        </div>

        <!-- Content -->
        <div class="form-group mb-3">
            <label for="content">Content:</label>
            <textarea name="content" class="form-control" id="content" rows="6" required>{{ old('content', $news->content) }}</textarea>
        </div>

        <!-- Gallery -->
        <div class="form-group mb-3">
            <label for="gallery">Gallery Images:</label>
            <input type="file" name="gallery[]" class="form-control" id="gallery" multiple>
        </div>

        <!-- Existing Gallery Images -->
        @if($news->galleries->count() > 0)
            <h5 class="mt-3">Current Gallery Images:</h5>
            <div class="row">
                @foreach($news->galleries as $gallery)
                <div class="col-md-2 mb-3 text-center">
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" class="img-thumbnail mb-2" width="150">
                    <form action="{{ route('admin.gallery.delete', $gallery->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
                @endforeach
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Update News</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection
