@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Edit Home Page</h1>

    <form action="{{ route('admin.homepage.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h3>Hero Section</h3>
        <div class="form-group">
            <label>Hero Image</label>
            <input type="file" name="hero_image" class="form-control" />
            @if ($homepageContent->hero_image)
                <img src="{{ asset('storage/' . $homepageContent->hero_image) }}" width="100" class="mt-2" />
            @endif
        </div>

        <div class="form-group">
            <label>Mobile Hero Image</label>
            <input type="file" name="mobile_hero_image" class="form-control" />
            @if ($homepageContent->mobile_hero_image)
                <img src="{{ asset('storage/' . $homepageContent->mobile_hero_image) }}" width="100" class="mt-2" />
            @endif
        </div>

        <div class="form-group">
            <label>Text Hero Banner</label>
            <input type="text" name="text_hero_banner" class="form-control" value="{{ $homepageContent->text_hero_banner }}" />
        </div>

        <h3>Calculator Section</h3>
        <div class="form-group">
            <label>Calculator Title</label>
            <input type="text" name="calculator_title" class="form-control" value="{{ $homepageContent->calculator_title }}" />
        </div>

        <div class="form-group">
            <label>Calculator Title 2</label>
            <input type="text" name="calculator_title2" class="form-control" value="{{ $homepageContent->calculator_title2 }}" />
        </div>

        <div class="form-group">
            <label>Calculator Text</label>
            <textarea name="calculator_text" class="form-control">{{ $homepageContent->calculator_text }}</textarea>
        </div>

        <h3>Buying Process Section</h3>
        <div class="form-group">
            <label>Buying Process Title</label>
            <input type="text" name="buying_process_title" class="form-control" value="{{ $homepageContent->buying_process_title }}" />
        </div>

        <div class="form-group">
            <label>Buying Process Text</label>
            <textarea name="buying_process_text" class="form-control">{{ $homepageContent->buying_process_text }}</textarea>
        </div>

        <h3>Requirements Section</h3>
        <div class="form-group">
            <label>Requirements Title</label>
            <input type="text" name="requirements_title" class="form-control" value="{{ $homepageContent->requirements_title }}" />
        </div>

        <div class="form-group">
            <label>Requirements Text</label>
            <textarea name="requirements_text" class="form-control">{{ $homepageContent->requirements_text }}</textarea>
        </div>

        {{-- Requirements Steps Section --}}
        @for ($i = 1; $i <= 4; $i++)
            <div class="form-group">
                <label>Requirements Step {{ $i }}</label>
                <input type="text" name="requirements_step{{ $i }}" class="form-control" value="{{ $homepageContent->{'requirements_step'.$i} }}" />
            </div>
        @endfor

        {{-- Requirements Icons Section --}}
        @for ($i = 1; $i <= 3; $i++)
            <div class="form-group">
                <label>Requirements Icon {{ $i }}</label>
                <input type="file" name="requirements_icon{{ $i }}" class="form-control" />
                @if ($homepageContent->{'requirements_icon'.$i})
                    <img src="{{ asset('storage/' . $homepageContent->{'requirements_icon'.$i}) }}" width="100" class="mt-2" />
                @endif
            </div>

            <div class="form-group">
                <label>Requirements Icon {{ $i }} Title</label>
                <input type="text" name="requirements_icon{{ $i }}_title" class="form-control" value="{{ $homepageContent->{'requirements_icon'.$i.'_title'} }}" />
            </div>

            <div class="form-group">
                <label>Requirements Icon {{ $i }} Text</label>
                <textarea name="requirements_icon{{ $i }}_text" class="form-control">{{ $homepageContent->{'requirements_icon'.$i.'_text'} }}</textarea>
            </div>
        @endfor

        <h3>Features Section</h3>
        <div class="form-group">
            <label>Features Title</label>
            <input type="text" name="features_title" class="form-control" value="{{ $homepageContent->features_title }}" />
        </div>

        @for ($i = 1; $i <= 4; $i++)
            <div class="form-group">
                <label>Features Card {{ $i }} Title</label>
                <input type="text" name="features_card{{ $i }}_title" class="form-control" value="{{ $homepageContent->{'features_card'.$i.'_title'} }}" />
            </div>

            <div class="form-group">
                <label>Features Card {{ $i }} Icon</label>
                <input type="file" name="features_card{{ $i }}_icon" class="form-control" />
                @if ($homepageContent->{'features_card'.$i.'_icon'})
                    <img src="{{ asset('storage/' . $homepageContent->{'features_card'.$i.'_icon'}) }}" width="100" class="mt-2" />
                @endif
            </div>

            <div class="form-group">
                <label>Features Card {{ $i }} Text</label>
                <textarea name="features_card{{ $i }}_text" class="form-control">{{ $homepageContent->{'features_card'.$i.'_text'} }}</textarea>
            </div>
        @endfor

        <h3>App Coming Soon Section</h3>
        <div class="form-group">
            <label>App Coming Soon Title</label>
            <input type="text" name="app_coming_soon_title" class="form-control" value="{{ $homepageContent->app_coming_soon_title }}" />
        </div>

        <div class="form-group">
            <label>App Coming Soon Text</label>
            <textarea name="app_coming_soon_text" class="form-control">{{ $homepageContent->app_coming_soon_text }}</textarea>
        </div>

        <h3>Social Links</h3>
        <div class="form-group">
            <label>Facebook Link</label>
            <input type="url" name="facebook_link" class="form-control" value="{{ $homepageContent->facebook_link }}" />
        </div>

        <div class="form-group">
            <label>LinkedIn Link</label>
            <input type="url" name="linkedin_link" class="form-control" value="{{ $homepageContent->linkedin_link }}" />
        </div>

        <div class="form-group">
            <label>Instagram Link</label>
            <input type="url" name="instagram_link" class="form-control" value="{{ $homepageContent->instagram_link }}" />
        </div>

        <div class="form-group">
            <label>TikTok Link</label>
            <input type="url" name="tiktok_link" class="form-control" value="{{ $homepageContent->tiktok_link }}" />
        </div>

        <button type="submit" class="btn btn-success">Save Changes</button>
    </form>
</div>

@endsection