@extends('layouts.front-office.app')

@section('content')

<!-- breadcrumb start -->
<section class="breadcrumb bg_img pos-rel" data-background="{{ asset('assets/img/bg/breadcrumb.jpg') }}">
    <div class="container">
        <div class="breadcrumb__content">
            <h2 class="breadcrumb__title">Contact Us</h2>
            <ul class="bread-crumb clearfix ul_li_center">
                <li class="breadcrumb-item"><a href="/">Home</a> </li> 
                <li> - </li>
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
<!-- breadcrumb end -->

<!-- contact start -->
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
                        Sunshine Business Park <br> Sector-94, Poland
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
                        <a href="tel:+88(0)555-0108">+88(0) 555-0108</a> <br> 
                        <a href="tel:+88(0)555-01117">+88(0) 555-01117</a>
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
                        <a href="mailto:info@cryco.com">info@cryco.com</a> <br> 
                        <a href="mailto:example@cryco.com">example@cryco.com</a>
                    </p>
                </div>
            </div>
       </div>
    </div>
</section>
<!-- contact end -->

<!-- google map start -->
<section class="google-map">
    <div class="google-map__inner">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14602.254272231177!2d90.3654215!3d23.7985508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1592852423971!5m2!1sen!2sbd" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
</section>
<!-- google map end -->

@endsection