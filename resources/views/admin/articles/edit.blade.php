@extends('layouts.back-office.app')

@section('content')
<div class="container pt-4">
    <h1 class="mb-4">Edit Article</h1>

    <!-- Edit News Form -->
    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Title Section -->
            <div class="col-md-12 mb-3">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $article->title) }}" required>
            </div>
        </div>

        <div class="row">
                <!-- Emirates -->
                <div class="col-md-6 mb-3">
                    <label for="state">Emirates:</label>
                    <select name="state" class="form-control" id="state" required>
                        <option value="" disabled selected>Select Emirates</option>
                        @foreach ($emirates as $emirate)
                            <option value="{{ $emirate->name }}" {{ old('state') == $emirate->name  ? 'selected' : '' }}>{{ $emirate->name }}</option>
                        @endforeach
                    </select>
                </div>
            
                <!-- Country -->
                <div class="col-md-6 mb-3">
                    <label for="country">Country:</label>
                    <select name="country" class="form-control" id="country" required>
                        <option value="" disabled selected>Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->name }}" {{ old('country') ==  $country->name  ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
        </div>

        <div class="row">
            <!-- Date -->
            <div class="col-md-6 mb-3">
                <label for="date">Date:</label>
                <input type="date" name="date" class="form-control" id="date" value="{{ old('date', $article->date) }}" required>
            </div>

            <!-- Time -->
            <div class="col-md-6 mb-3">
                <label for="time">Time:</label>
                <input type="time" name="time" class="form-control" id="time" value="{{ old('time', $article->time) }}" required>
            </div>
        </div>

        <div class="row">
            <!-- Thumbnail -->
            <div class="col-md-6 mb-3">
                <label for="thumbnail">Thumbnail:</label>
                <input type="file" name="thumbnail" class="form-control" id="thumbnail">
                @if($article->thumbnail)
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Current Thumbnail" class="img-thumbnail mt-2" width="150">
                @endif
            </div>

            <!-- Mobile Thumbnail -->
            <div class="col-md-6 mb-3">
                <label for="mobile_thumbnail">Mobile Thumbnail:</label>
                <input type="file" name="mobile_thumbnail" class="form-control" id="mobile_thumbnail">
                @if($article->mobile_thumbnail)
                    <img src="{{ asset('storage/' . $article->mobile_thumbnail) }}" alt="Current Mobile Thumbnail" class="img-thumbnail mt-2" width="150">
                @endif
            </div>
        </div>

        <!-- Content Section -->
        <div class="mb-3">
            <label for="content">Content:</label>
            <textarea name="content" class="form-control" id="content" rows="6" required>{{ old('content', $article->content) }}</textarea>
        </div>

        <!-- Gallery Upload -->
        <div class="mb-3">
            <label for="gallery">Gallery Images:</label>
            <input type="file" name="gallery[]" class="form-control" id="gallery" multiple>
        </div>

        <!-- Buttons Section -->
        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Article</button>
        </div>
    </form>

    <!-- Existing Gallery Images Section -->
    @if($article->galleries->count() > 0)
    <h5 class="mt-4">Current Gallery Images:</h5>
    <div class="row">
        @foreach($article->galleries as $gallery)
        <div class="col-md-2 mb-3 text-center">
            <img src="{{ asset('storage/' . $gallery->image_path) }}" class="img-thumbnail mb-2" width="150">

            <!-- Delete Image Form (separate form to delete individual images) -->
            <form action="{{ route('admin.gallery.delete', $gallery->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
