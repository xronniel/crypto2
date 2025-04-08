@extends('layouts.back-office.app')

@section('content')
<div class="container pt-4">
    <h1 class="mb-4">Add New News</h1>

    <!-- Form to Create News -->
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="mb-4" onsubmit="return document.activeElement.id !== 'news-tags-input';">
        @csrf
        <div class="row">
            <!-- Category -->
            <div class="col-md-6 mb-3">
                <label for="category_id">Category:</label>
                <select name="category_id" class="form-control" id="category_id" required>
                    <option value="" disabled selected>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <!-- Title Section -->
            <div class="col-md-12 mb-3">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
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
                <input type="date" name="date" class="form-control" id="date" value="{{ old('date') }}" required>
            </div>

            <!-- Time -->
            <div class="col-md-6 mb-3">
                <label for="time">Time:</label>
                <input type="time" name="time" class="form-control" id="time" value="{{ old('time') }}" required>
            </div>
        </div>

        <div class="row">
            <!-- Thumbnail -->
            <div class="col-md-6 mb-3">
                <label for="thumbnail">Thumbnail:</label>
                <input type="file" name="thumbnail" class="form-control" id="thumbnail" required>
            </div>

            <!-- Mobile Thumbnail -->
            <div class="col-md-6 mb-3">
                <label for="mobile_thumbnail">Mobile Thumbnail:</label>
                <input type="file" name="mobile_thumbnail" class="form-control" id="mobile_thumbnail">
            </div>
        </div>

        <!-- Content Section -->
        <div class="mb-3">
            <label for="content">Content:</label>
            <textarea name="content" class="form-control" id="content" rows="6" required>{{ old('content') }}</textarea>
        </div>

        <!-- Gallery Upload -->
        <div class="mb-3">
            <label for="gallery">Gallery Images:</label>
            <input type="file" name="gallery[]" class="form-control" id="gallery" multiple>
        </div>

        <!-- Tags Section -->
        <x-tag-input :existing-tags="$existingTags" name="tags" label="Tags" id="news-tags" />

        <!-- Buttons Section -->
        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-success">Add News</button>
        </div>
    </form>
</div>
@endsection
