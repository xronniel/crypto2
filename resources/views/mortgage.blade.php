@extends('layouts.front-office.app')

@section('content')
    <section class="hero bg_img pos-rel pt-80 dynamic-bg">
        <div class="hero-shape">
            <div class="shape--1">
                <img class="leftToRight" src="{{ asset('assets/img/shape/hero-sp_01.svg') }}" alt="">
            </div>
            <div class="shape--2">
                <img class="topToBottom" src="{{ asset('assets/img/shape/hero-sp_02.svg') }}" alt="">
            </div>
            <div class="shape--3">
                <img class="leftToRight" src="{{ asset('assets/img/shape/hero-sp_04.svg') }}" alt="">
            </div>
            <div class="shape--4">
                <img class="topToBottom" src="{{ asset('assets/img/shape/hero-sp_03.svg') }}" alt="">
            </div>
        </div>
        <div class="container">
            <div class="hero__content-wrap">
                <div class="wow fadeInUp" data-wow-duration=".7s">
                    <h1 class="title first-banner-title">{!! $page->hero_title !!}</h1>
                </div>

                <!-- Embed the external page in an iframe -->
                <div class="iframe-container">
                    <iframe src="https://elite.useholo.com/en/mortgage-products-services" width="100%" frameborder="0"
                        style="border: none; border-radius: 20px; overflow: hidden;" allowfullscreen></iframe>
                </div>
                <section class="section-bg-blue-shadow"></section>




                <div class="wow fadeInUp" data-wow-duration=".7s">
                    <h1 class="second-title-mortgage">{!! $page->trust_section_title !!}</h1>
                </div>


                <div class="crypto-mortgage-section">
                    <!-- Left: Content -->
                    <div class="crypto-content">

                        @foreach ($page->trustItems as $item)
                            <div class="crypto-feature">
                                <img class="feature-icon leftToRight" src="{{ asset('storage/' . $item['icon']) }}"
                                    alt="icon">
                                <div class="feature-text">
                                    <h4 class="feature-title">{{ $item['title'] }}</h4>
                                    <p class="feature-desc">{{ $item['description'] }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <!-- Right: Image -->
                    <div class="crypto-image">
                        <img class="crypto-img leftToRight" src="{{ asset('storage/' . $page->trust_section_image) }}"
                            alt="Crypto Real Estate">
                    </div>
                </div>

            </div>

        </div>
        </div>
    </section>
    <!-- partners section start  -->
    <section class="partners z-3">
        <div class="patners-title text-center">
            <span><img src="assets/img/partner/partner_07.png" alt=""> our top partners <img
                    src="assets/img/partner/partner_08.png" alt=""></span>
        </div>

        <div class="partner-active partner-slider ul_li">
            <div class="swiper-wrapper">
                @foreach ($partners as $partner)
                    <div class="swiper-slide">
                        <div class="xb-item--brand">
                            <div class="xb-item--brand_logo">
                                <img src="{{ asset('storage/' . $partner->image) }}" alt="">
                            </div>
                            <span> {{ $partner->name }}</span>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- partners section end  -->
    <div class="container">
        <div class="wow fadeInUp" data-wow-duration=".7s">
            <h1 class="second-title-mortgage-two">{!! $page->step_section_title !!}</h1>
        </div>
    </div>
    <div class="partner-slider-three-box">
        <div class="swiper partner-slider-three">
          <div class="swiper-wrapper swiper-wrapper-three">
            @foreach ($page->stepItems as $step)
              <div class="swiper-slide">
                <div class="card">
                  <div class="icon">
                    <img src="{{ asset('storage/' . $step['icon']) }}" alt="{{ $step['title'] }}" />
                  </div>
                  <h3>{{ $step['title'] }}</h3>
                  <p>{{ $step['description'] }}</p>
                </div>
              </div>
            @endforeach
          </div>
      
 
        </div>
      </div>
      





    <!-- team & faq section start -->
    <div class="bg_img top-center pos-rel pb-145">


        <!-- faq start -->
        <section class="faq pt-130">
            <div class="container">
                <div class="section-title pb-55 wow fadeInUp" data-wow-duration=".7s">
                    <h1 class="title">Have Any Questions?</h1>
                </div>
                <div class="faq__blockchain wow fadeInUp" data-wow-duration=".7s" data-wow-delay="200ms">
                    <ul class="accordion_box clearfix">
                        @foreach ($faqs as $faq)
                            <li class="accordion block">
                                <div class="acc-btn">
                                    {{ $faq['question'] }}
                                    <span class="arrow"><span></span></span>
                                </div>
                                <div class="acc_body">
                                    <div class="content">
                                        {{ $faq['answer'] }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    </div>






    <style>
        .first-banner-title {
            font-family: "Manrope", sans-serif;
            font-weight: 700;
            font-size: 102px;
            line-height: 100%;
            letter-spacing: -3.06px;
            text-align: center;
            vertical-align: middle;
            text-transform: capitalize;
            margin: 50px 0 0 0;
        }

        .swiper-wrapper-three {
            justify-content: center;
        }

        .section-bg-blue-shadow {
            background-image: url('{{ asset('assets/img/bg/blue-shadow.png') }}');
            background-position: center 40%;
            background-size: cover;
            width: 100%;
            height: 100px;
            margin: 0 0 60px 0;
        }



        .iframe-container {
            background: #4A21EF2E;
            border: 1px solid #FFFFFF2E;
            backdrop-filter: blur(70px);
            ;
            left: 207px;
            border-radius: 25px;
            border-width: 1px;
            overflow: hidden;
            padding: 20px;
            width: 100%;
            height: fit-content;
        }

        .iframe-container iframe {
            height: 812px;
        }

        .hero .hero-shape .shape--2 {
            position: absolute;
            left: 194px;
            top: 299px;
        }

        .hero .hero-shape .shape--1 {
            position: absolute;
            top: 5%;
            left: 7%;
        }

        .hero .hero-shape .shape--4 {
            position: absolute;
            top: 45px;
            right: 250px;
        }

        .hero .hero-shape .shape--3 {
            position: absolute;
            right: 120px;
            top: 339px;
        }




        .second-title-mortgage {
            font-family: "Manrope", sans-serif;
            font-weight: 700;
            font-size: 60px;
            line-height: 100%;
            letter-spacing: -0.03px;
            text-align: center;
            vertical-align: middle;
            text-transform: capitalize;
            margin: 180px 0 0 0;

        }

        .second-title-mortgage-two {
            font-family: "Manrope", sans-serif;
            font-weight: 700;
            font-size: 60px;
            line-height: 100%;
            letter-spacing: -0.03px;
            text-align: center;
            vertical-align: middle;
            text-transform: capitalize;
            margin: 180px 0 100px 0;

        }


        .crypto-feature {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            margin-right: 1rem;
            margin-top: 0 0 1.3rem;
        }

        .feature-title {
            margin: 0 0 1.3rem;
            font-family: "Outfit", sans-serif;
            font-weight: 400;
            font-size: 20px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #C1C7DE;
        }

        .feature-desc {
            margin: 0;
            font-family: "Outfit", sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 100%;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #C1C7DE;

        }



        /* Optional animation for leftToRight if used */
        .leftToRight {
            animation: slideIn 0.8s ease forwards;
            opacity: 0;
            transform: translateX(-20px);
        }



        .iframe-container {
            width: 100%;
            justify-content: center;
            display: flex;
            margin-top: 150px;
        }


        .crypto-mortgage-section {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
            align-items: stretch;
            padding: 4rem 2rem;
            color: white;
            gap: 2rem;
            margin: 150px 0 0 0;
        }

        .crypto-content {
            flex: 1;
            min-width: 0;
            padding-right: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .crypto-image {
            flex: 1;
            min-width: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .crypto-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 1rem;
        }



        .partner-slider-three {
            padding: 2rem 1rem;

        }

        .swiper-slide-partner-slider-three {
            display: flex;
            justify-content: center;
            align-items: stretch;
        }

        .card {
            border-radius: 15px;
            color: white;
            padding: 3rem 1.5rem;
            text-align: center;
            align-items: center;
            gap: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .card {
            background-image: url('/assets/img/mortgage/mor-card-bg.png');
            background-size: cover;
            background-position: center;
            /* your existing styles */
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card .icon {
            width: 150px;
            height: 150px;
        }

        .card .icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card h3 {
            font-family: "Manrope", sans-serif;
            font-weight: 700;
            font-size: 30px;
            line-height: 42px;
            letter-spacing: -0.02px;
            text-align: center;
            vertical-align: middle;
            text-transform: capitalize;
            color: #FFFFFF;
        }

        .card p {
            font-family: "Outfit", sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 24px;
            letter-spacing: 0%;
            text-align: center;
            vertical-align: middle;
            color: #C1C7DE;
        }



        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }


        @media (max-width: 1124px) {


            .section-bg-blue-shadow {
                margin: 0 0 0 0;
            }
        }

        @media (max-width: 1142px) {
            .first-banner-title {
                font-size: 61px;
            }

            .iframe-container {
                margin-top: 93px;
            }



            .second-title-mortgage {

                font-size: 44px;

                margin: 0;
            }



            .crypto-mortgage-section {
                margin: 20px 0 0 0;
            }

            .second-title-mortgage-two {
                font-size: 44px;
                line-height: 100%;
                margin: 125px 0 30px 0;
            }


        }

        @media (max-width: 991px) {
            .crypto-mortgage-section {
                flex-direction: column-reverse;
                flex-wrap: wrap;
            }

            .crypto-content,
            .crypto-image {
                width: 100%;
                padding: 0;
            }

            .crypto-img {
                height: 280px;
            }

            .hero {
                padding-top: 50px;
            }

            .swiper-wrapper-three {
                justify-content: flex-start;
            }

            .section-bg-blue-shadow {
                display: none;
            }

            .second-title-mortgage {
                font-weight: 700;
                font-size: 20px;
                line-height: 100%;
                letter-spacing: 0;
                margin: 50px 0 0 0;

            }

            .iframe-container iframe {
                height: 600px;
            }

            .crypto-mortgage-section {
                padding: 4rem 0;
            }


            .second-title-mortgage-two {
                font-weight: 700;
                font-size: 20px;
                line-height: 100%;
                letter-spacing: 0;
                margin: 60px 0 30px 0;
            }



            .card h3 {
                font-weight: 700;
                font-size: 20px;
                line-height: 100%;
                letter-spacing: -0.02px;
                text-align: center;
                vertical-align: middle;
                text-transform: capitalize;
                margin: 0;
            }


            .card p {
                font-weight: 400;
                font-size: 14px;
                line-height: 100%;
                letter-spacing: 0;
                text-align: center;
                vertical-align: middle;

            }







        }


        @media (max-width: 768px) {
            .iframe-container {
                margin-top: 50px;
            }

            .first-banner-title {
                font-weight: 700;
                font-size: 30px;
                line-height: 100%;
                letter-spacing: 0;
                text-align: center;
                vertical-align: middle;
                text-transform: capitalize;
                margin: 10px 0 0 0;
            }


            .hero .hero-shape .shape--1 {
                position: absolute;
                top: 0%;
                left: 4%;
            }


            .hero .hero-shape .shape--3 {
                position: absolute;
                right: 4%;
                top: 5%;
            }


            .hero .hero-shape .shape--2 {
                position: absolute;
                left: 3%;
                top: 8%;
            }


            .hero .hero-shape .shape--4 {
                position: absolute;
                top: 1%;
                right: 9%;
            }

        }
    </style>
    <script>
        window.addEventListener('load', function() {
            setTimeout(() => {
                window.scrollTo(0, 0);
            }, 50);
        });
    </script>
@endsection
