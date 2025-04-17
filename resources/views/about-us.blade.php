@extends('layouts.front-office.app')

@section('content')
<div class="container">
    <h1>About Us Page</h1>

    {{-- About Us Data --}}
    @foreach($aboutUs as $about)
        <section>
            <h2>{{ $about->hero_title }}</h2>
            <p>{{ $about->hero_text }}</p>
            @if($about->image)
                <img src="{{ asset('storage/' . $about->image) }}" alt="About Us Image" width="300">
            @endif
        </section>
    @endforeach

    {{-- Our Team Data --}}
    @if($ourTeam->count() > 0)
        <section>
            <h2>Our Team</h2>
            <div class="row">
                @foreach($ourTeam as $teamMember)
                    <div class="col-md-4">
                        <div class="card">
                            @if($teamMember->image)
                                <img src="{{ asset('storage/' . $teamMember->image) }}" class="card-img-top" alt="{{ $teamMember->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $teamMember->name }}</h5>
                                <p class="card-text">{{ $teamMember->role }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Our Commitment Data --}}
    @if($ourCommitment->count() > 0)
        <section>
            <h2>Our Commitment</h2>
            @foreach($ourCommitment as $commitment)
                <p><strong>{{ $commitment->title }}</strong></p>
                <p>{{ $commitment->text }}</p>
                @if($commitment->icon)
                    <img src="{{ asset('storage/' . $commitment->icon) }}" alt="Commitment Icon" width="50">
                @endif
            @endforeach
        </section>
    @endif

    {{-- Crypto Home In Figures --}}
    @if($cryptoHomeInFigures->count() > 0)
        <section>
            <h2>Crypto Home In Figures</h2>
            <ul>
                @foreach($cryptoHomeInFigures as $figure)
                    <li>
                        <strong>{{ $figure->title }}:</strong> {{ $figure->text }} 
                        @if($figure->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </section>
    @endif
</div>
@endsection
