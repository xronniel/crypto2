@extends('layouts.back-office.app')

@section('content')
<div class="container">
    <h1>Edit Mortgage Landing Page</h1>

        {{-- Display Success Message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops! Something went wrong.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    @include('admin.mortgage-landing-page._form')
</div>
@endsection
