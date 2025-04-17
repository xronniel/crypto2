@extends('layouts.front-office.app')

@section('content')

<!-- breadcrumb start -->
<section class="breadcrumb bg_img pos-rel" data-background="{{ asset('assets/img/bg/breadcrumb.jpg') }}">
    <div class="container">
        <div class="breadcrumb__content">
            <h2 class="breadcrumb__title">Contact Us</h2>
            <ul class="bread-crumb clearfix ul_li_center">
                <li class="breadcrumb-item"><a href="/">Home</a></li> 
                <li
                style="margin: 0 10px"
                > - </li>
                <li class="breadcrumb-item">Contact Us</li>
            </ul>
        </div>
    </div>
    <div class="breadcrumb__icon">
        <div class="icon icon--1">
            <img class="leftToRight" src="{{ asset('assets/img/icon/bi_01.png') }}" alt="">
        </div>
        <div class="icon icon--2">
            <img class="topToBottom" src="{{ asset('assets/img/icon/bi_02.png') }}" alt="">
        </div>
        <div class="icon icon--3">
            <img class="topToBottom" src="{{ asset('assets/img/icon/bi_03.png') }}" alt="">
        </div>
        <div class="icon icon--4">
            <img class="leftToRight" src="{{ asset('assets/img/icon/bi_04.png') }}" alt="">
        </div>
    </div>
</section>

<section class="contact-info pt-130 pb-120">
    <div class="container">
        <div class="row justify-content-md-center mt-none-30">
            <div class="col-lg-4 col-md-6 mt-30">
                <div class="contact-info__item xb-border text-center">
                    <div class="icon">
                        <img src="{{ asset('assets/img/icon/location.svg') }}" alt="">
                    </div>
                    <h3>Location</h3>
                    <p>
                        {{ $contactInfo->address ?? 'No address available' }}
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-30">
                <div class="contact-info__item xb-border text-center">
                    <div class="icon">
                        <img src="{{ asset('assets/img/icon/call.svg') }}" alt="">
                    </div>
                    <h3>Contact</h3>
                    <p>
                        @foreach($contacts as $contact)
                            <a href="tel:{{ $contact }}">{{ $contact }}</a> <br> 
                        @endforeach
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-30">
                <div class="contact-info__item xb-border text-center">
                    <div class="icon">
                        <img src="{{ asset('assets/img/icon/mail.svg') }}" alt="">
                    </div>
                    <h3>Email</h3>
                    <p>
                        @foreach($emails as $email)
                            <a href="mailto:{{ $email }}">{{ $email }}</a> <br>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="google-map">
    <input type="checkbox" id="toggleMap" class="map-toggle" />
    
    <label for="toggleMap" class="google-map__overlay">
      <p>Click anywhere to view our Headquarter’s location on the map</p>
    </label>
  
    <div class="google-map__inner">
      {!! $contactInfo->map !!}
    </div>
  </section>
  







<style>
    .contact-info__item{
        min-height: 380px;
    }



    










    .google-map {
  position: relative;

}

.map-toggle {
  display: none;
}

.google-map__overlay {
  position: absolute;
  inset: 0;
  background: rgba(255, 255, 255, 0.6);
  backdrop-filter: blur(5px);
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  z-index: 1;
  transition: opacity 0.3s ease;




  color: #000000;


  font-family: "Manrope", sans-serif;
font-weight: 400;
font-size: 30px;
line-height: 100%;
letter-spacing: 0%;
text-align: center;
vertical-align: middle;

}
.google-map__overlay p { 
    padding: 0 0 200px 0;
}
.map-toggle:checked + .google-map__overlay {
  display: none;
}

@media (max-width: 950px) {
 

    .google-map__overlay {

font-weight: 400;
font-size: 20px;
line-height: 100%;
letter-spacing: 0%;
text-align: center;
vertical-align: middle;

    }

}
</style>
@endsection