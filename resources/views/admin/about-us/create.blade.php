@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Create About Us</h1>

    <form action="{{ route('admin.aboutus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Hero Title</label>
            <input type="text" name="hero_title" class="form-control">
        </div>

        <div>
            <label>Hero Text</label>
            <textarea name="hero_text" class="form-control"></textarea>
        </div>

        <div>
            <label>Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <hr>

        <h4>WWO Section 1</h4>
        <div>
            <label>Title 1</label>
            <input type="text" name="wwo_section1_title1" class="form-control">
        </div>
        <div>
            <label>Text 1</label>
            <textarea name="wwo_section1_text1" class="form-control"></textarea>
        </div>
        <div>
            <label>Title 2</label>
            <input type="text" name="wwo_section1_title2" class="form-control">
        </div>
        <div>
            <label>Text 2</label>
            <textarea name="wwo_section1_text2" class="form-control"></textarea>
        </div>

        <hr>

        <h4>WWO Section 2</h4>
        <div>
            <label>Title 1</label>
            <input type="text" name="wwo_section2_title1" class="form-control">
        </div>
        <div>
            <label>Text 1</label>
            <textarea name="wwo_section2_text1" class="form-control"></textarea>
        </div>
        <div>
            <label>Title 2</label>
            <input type="text" name="wwo_section2_title2" class="form-control">
        </div>
        <div>
            <label>Text 2</label>
            <textarea name="wwo_section2_text2" class="form-control"></textarea>
        </div>
        <div>
            <label>Title 3</label>
            <input type="text" name="wwo_section2_title3" class="form-control">
        </div>
        <div>
            <label>Text 3</label>
            <textarea name="wwo_section2_text3" class="form-control"></textarea>
        </div>

        <hr>

        <h4>WWO Section 3</h4>
        <div>
            <label>Title</label>
            <input type="text" name="wwo_section3_title1" class="form-control">
        </div>
        <div>
            <label>Text</label>
            <textarea name="wwo_section3_text1" class="form-control"></textarea>
        </div>
        <div>
            <label>Icon</label>
            <input type="text" name="wwo_section3_icon" class="form-control">
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection