@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Edit About Us</h1>

    <form action="{{ route('admin.aboutus.update', $aboutus->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label>Hero Title</label>
            <input type="text" name="hero_title" class="form-control" value="{{ $aboutus->hero_title }}">
        </div>

        <div>
            <label>Hero Text</label>
            <textarea name="hero_text" class="form-control">{{ $aboutus->hero_text }}</textarea>
        </div>

        <div>
            <label>Image</label><br>
            @if($aboutus->image)
                <img src="{{ asset('storage/' . $aboutus->image) }}" alt="Current Image" width="100" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <hr>

        <h4>WWO Section 1</h4>
        <div>
            <label>Title 1</label>
            <input type="text" name="wwo_section1_title1" class="form-control" value="{{ $aboutus->wwo_section1_title1 }}">
        </div>
        <div>
            <label>Text 1</label>
            <textarea name="wwo_section1_text1" class="form-control">{{ $aboutus->wwo_section1_text1 }}</textarea>
        </div>
        <div>
            <label>Title 2</label>
            <input type="text" name="wwo_section1_title2" class="form-control" value="{{ $aboutus->wwo_section1_title2 }}">
        </div>
        <div>
            <label>Text 2</label>
            <textarea name="wwo_section1_text2" class="form-control">{{ $aboutus->wwo_section1_text2 }}</textarea>
        </div>

        <hr>

        <h4>WWO Section 2</h4>
        <div>
            <label>Title 1</label>
            <input type="text" name="wwo_section2_title1" class="form-control" value="{{ $aboutus->wwo_section2_title1 }}">
        </div>
        <div>
            <label>Text 1</label>
            <textarea name="wwo_section2_text1" class="form-control">{{ $aboutus->wwo_section2_text1 }}</textarea>
        </div>
        <div>
            <label>Title 2</label>
            <input type="text" name="wwo_section2_title2" class="form-control" value="{{ $aboutus->wwo_section2_title2 }}">
        </div>
        <div>
            <label>Text 2</label>
            <textarea name="wwo_section2_text2" class="form-control">{{ $aboutus->wwo_section2_text2 }}</textarea>
        </div>
        <div>
            <label>Title 3</label>
            <input type="text" name="wwo_section2_title3" class="form-control" value="{{ $aboutus->wwo_section2_title3 }}">
        </div>
        <div>
            <label>Text 3</label>
            <textarea name="wwo_section2_text3" class="form-control">{{ $aboutus->wwo_section2_text3 }}</textarea>
        </div>

        <hr>

        <h4>WWO Section 3</h4>
        <div>
            <label>Title</label>
            <input type="text" name="wwo_section3_title1" class="form-control" value="{{ $aboutus->wwo_section3_title1 }}">
        </div>
        <div>
            <label>Text</label>
            <textarea name="wwo_section3_text1" class="form-control">{{ $aboutus->wwo_section3_text1 }}</textarea>
        </div>
        <div>
            <label>Icon (Image)</label><br>
            @if($aboutus->wwo_section3_icon)
                <img src="{{ asset('storage/' . $aboutus->wwo_section3_icon) }}" alt="Current Icon" width="100" class="mb-2">
            @endif
            <input type="file" name="wwo_section3_icon" class="form-control" accept="image/*">
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
