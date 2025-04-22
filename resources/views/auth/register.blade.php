@extends('layouts.front-office.app')

@section('content')
<div class="container">
    <form class="login-modal-form" method="POST" action="{{ route('register') }}" id="registerForm">
        @csrf

        <!-- Title -->
        <h1 style="max-width: 500px;" class="login-modal-form-title">
            Create Your Crypto Property Investment Account
        </h1>

        <!-- Social login buttons -->
        <a class="login-modal-form-links" href="#">
            <img src="{{ asset('assets/img/footer/google.png') }}" alt="Google Icon">
            Continue with Google
        </a>

        <a class="login-modal-form-links" href="#">
            <img src="{{ asset('assets/img/footer/Facebook.png') }}" alt="Facebook Icon">
            Continue with Facebook
        </a>

        <img class="OR-icon" src="{{ asset('assets/img/footer/or.png') }}" alt="OR">

        <!-- First Name Input -->
        <div class="input-div">
            <span>First Name</span>
            <input id="first_name" placeholder="First Name" type="text" class="login-input @error('first_name') is-invalid @enderror" 
                   name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
            @error('first_name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- Last Name Input -->
        <div class="input-div">
            <span>Last Name</span>
            <input id="last_name" placeholder="Last Name" type="text" class="login-input @error('last_name') is-invalid @enderror" 
                   name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
            @error('last_name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- Email Input -->
        <div class="input-div">
            <span>Email</span>
            <input id="email" placeholder="Email" type="email" class="login-input @error('email') is-invalid @enderror" 
                   name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- Password Input -->
        <div class="input-div">
            <span>Password</span>
            <input id="password" placeholder="Password" type="password" class="login-input @error('password') is-invalid @enderror" 
                   name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <!-- Confirm Password Input -->
        <div class="input-div">
            <span>Confirm Password</span>
            <input id="password-confirm" placeholder="Confirm Password" type="password" class="login-input" 
                   name="password_confirmation" required autocomplete="new-password">
        </div>

        <!-- Submit Button -->
        <div class="input-div">
            <button class="them-btn-login" type="submit">Sign Up</button>

            <p class="accept-p">By registering, you accept our Terms & Conditions and our Privacy Policy.</p>

            <p class="accept-p" id="showLogin" onclick="window.location.href='/login'">Already have an account? Log in</p>
        </div>
    </form>
</div>

<style>
    .input-div {
        width: 395px;
    }



    
</style>
@endsection
