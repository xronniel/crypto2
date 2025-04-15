@extends('layouts.front-office.app')

@section('content')
<div class="container">
    

                    <form
                    class="login-modal-form" 
                    method="POST" 
                    action="{{ route('login') }}" 
                    id="loginForm">
                  @csrf
              
      
              
                  <!-- Title -->
                  <h1 
                  style="max-width: 500px;"
                  class="login-modal-form-title">Get Started with Crypto Property Investments</h1>
              
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
              
                  <!-- Email Input -->
                  <div class="input-div">
                      <span>Email</span>
                      <input id="email" placeholder="Email" type="email" class="login-input @error('email') is-invalid @enderror" 
                             name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                      @enderror
                  </div>
              
                  <!-- Password Input -->
                  <div class="input-div">
                      <span>Password</span>
                      <input id="password" placeholder="Password" type="password" class="login-input @error('password') is-invalid @enderror" 
                             name="password" required autocomplete="current-password">
                      @error('password')
                          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                      @enderror
                  </div>
              
                  <!-- Submit Button -->
                  <div class="input-div">
                      <button class="them-btn-login" type="submit">Continue</button>
              
                      @if (Route::has('password.request'))
                          <a class="password-request" href="{{ route('password.request') }}">Forgot Your Password?</a>
                      @endif
              
                      <p class="accept-p" id="showRegister" onclick="window.location.href='/register'">Create Your Account</p>
                      <p class="accept-p">By registering, you accept our Terms & Conditions and our Privacy Policy.</p>
                  </div>
              </form>
               

</div>



<style>
    .input-div{
        width: 395.18896484375px;
    }
</style>
@endsection
