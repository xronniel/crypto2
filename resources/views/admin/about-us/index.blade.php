@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1 class="mb-4">About Us</h1>

    <form 
        action="{{ $aboutus ? route('admin.aboutus.update', $aboutus->id) : route('admin.aboutus.store') }}" 
        method="POST" 
        enctype="multipart/form-data"
    >
        @csrf
        @if($aboutus)
            @method('PUT')
        @endif

        <div>
            <label>Hero Title</label>
            <input type="text" name="hero_title" class="form-control" 
                   value="{{ old('hero_title', $aboutus->hero_title ?? '') }}" required>
        </div>

        <div>
            <label>Hero Text</label>
            <textarea name="hero_text" class="form-control" required>{{ old('hero_text', $aboutus->hero_text ?? '') }}</textarea>
        </div>

        <div>
            <label>Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @if($aboutus && $aboutus->image)
                @php $isUrl = filter_var($aboutus->image, FILTER_VALIDATE_URL); @endphp
                <img src="{{ $isUrl ? $aboutus->image : asset('storage/' . $aboutus->image) }}" width="100" class="mt-2">
            @endif
        </div>

        <hr>
        <h4>WWO Section 1</h4>
        <div><label>Title 1</label><input type="text" name="wwo_section1_title1" class="form-control" value="{{ old('wwo_section1_title1', $aboutus->wwo_section1_title1 ?? '') }}"></div>
        <div><label>Text 1</label><textarea name="wwo_section1_text1" class="form-control">{{ old('wwo_section1_text1', $aboutus->wwo_section1_text1 ?? '') }}</textarea></div>
        <div><label>Title 2</label><input type="text" name="wwo_section1_title2" class="form-control" value="{{ old('wwo_section1_title2', $aboutus->wwo_section1_title2 ?? '') }}"></div>

        <hr>
        <h4>WWO Section 2</h4>
        <div><label>Title 1</label><input type="text" name="wwo_section2_title1" class="form-control" value="{{ old('wwo_section2_title1', $aboutus->wwo_section2_title1 ?? '') }}"></div>
        <div><label>Text 1</label><textarea name="wwo_section2_text1" class="form-control">{{ old('wwo_section2_text1', $aboutus->wwo_section2_text1 ?? '') }}</textarea></div>
        <div><label>Title 2</label><input type="text" name="wwo_section2_title2" class="form-control" value="{{ old('wwo_section2_title2', $aboutus->wwo_section2_title2 ?? '') }}"></div>
        <div><label>Text 2</label><textarea name="wwo_section2_text2" class="form-control">{{ old('wwo_section2_text2', $aboutus->wwo_section2_text2 ?? '') }}</textarea></div>
        <div><label>Title 3</label><input type="text" name="wwo_section2_title3" class="form-control" value="{{ old('wwo_section2_title3', $aboutus->wwo_section2_title3 ?? '') }}"></div>
        <div><label>Text 3</label><textarea name="wwo_section2_text3" class="form-control">{{ old('wwo_section2_text3', $aboutus->wwo_section2_text3 ?? '') }}</textarea></div>

        <hr>
        <h4>WWO Section 3</h4>
        <div><label>Title</label><input type="text" name="wwo_section3_title1" class="form-control" value="{{ old('wwo_section3_title1', $aboutus->wwo_section3_title1 ?? '') }}"></div>
        <div><label>Text</label><textarea name="wwo_section3_text1" class="form-control">{{ old('wwo_section3_text1', $aboutus->wwo_section3_text1 ?? '') }}</textarea></div>
        <div>
            <label>Icon Image</label>
            <input type="file" name="wwo_section3_icon" class="form-control" accept="image/*">
            @if($aboutus && $aboutus->wwo_section3_icon)
                @php $isIconUrl = filter_var($aboutus->wwo_section3_icon, FILTER_VALIDATE_URL); @endphp
                <img src="{{ $isIconUrl ? $aboutus->wwo_section3_icon : asset('storage/' . $aboutus->wwo_section3_icon) }}" width="50" class="mt-2">
            @endif
        </div>

        <br>
        <button type="submit" class="btn btn-{{ $aboutus ? 'warning' : 'primary' }}">
            {{ $aboutus ? 'Update' : 'Save' }}
        </button>

        @if($aboutus)
            <form action="{{ route('admin.aboutus.destroy', $aboutus->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">
                    Delete
                </button>
            </form>
        @endif
    </form>
</div>
@endsection
