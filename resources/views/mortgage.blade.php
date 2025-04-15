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
            <div class="shape--5">
                <img class="topToBottom" src="{{ asset('assets/img/shape/hero-sp_05.svg') }}" alt="">
            </div>
            <div class="shape--6">
                <img class="leftToRight" src="{{ asset('assets/img/shape/hero-sp_06.svg') }}" alt="">
            </div>
        </div>

        <div class="container">
            <div class="hero__content-wrap">
                <div class="wow fadeInUp" data-wow-duration=".7s">
                    <h1 class="title first-banner-title">Calculate Your Crypto Mortgage Payments Instantly</h1>
                </div>

                <!-- Embed the external page in an iframe -->
                <div class="iframe-container mt-8">
                    <iframe src="https://elite.useholo.com/en/mortgage-products-services" width="100%" height="812"
                        frameborder="0" style="border: none; border-radius: 20px; overflow: hidden;"
                        allowfullscreen></iframe>
                </div>
                <section class="section-bg-blue-shadow"></section>




                <div class="wow fadeInUp" data-wow-duration=".7s">
                    <h1 class="second-title-mortgage">Why Thousands of Home Buyers
                        Trust Us with Their Crypto Mortgage Needs</h1>
                </div>


                <div class="crypto-mortgage-section">
                    <!-- Left: Content -->
                    <div class="crypto-content">
                        @php
                            $features = [
                                [
                                    'title' => 'Crypto Expertise',
                                    'desc' => 'Our team specializes in cryptocurrency-backed mortgages, ensuring seamless integration of your digital assets into real estate financing.'
                                ],
                                [
                                    'title' => 'Tailored Solutions',
                                    'desc' => 'We assess your unique financial situation to provide mortgage options that align with your investment goals.'
                                ],
                                [
                                    'title' => 'Efficient Process',
                                    'desc' => 'Leveraging advanced technology, we expedite approvals and transactions, making your home-buying journey smooth and swift.'
                                ],
                                [
                                    'title' => 'Transparent Communication',
                                    'desc' => 'We prioritize clear and open communication, keeping you informed at every stage of the mortgage process.'
                                ]
                            ];
                        @endphp
                
                        @foreach ($features as $feature)
                            <div class="crypto-feature">
                                <img class="feature-icon leftToRight" src="{{ asset('assets/img/mortgage/check.png') }}" alt="check">
                                <div class="feature-text">
                                    <h4 class="feature-title">{{ $feature['title'] }}</h4>
                                    <p class="feature-desc">{{ $feature['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                
                    <!-- Right: Image -->
                    <div class="crypto-image">
                        <img class="crypto-img leftToRight" src="{{ asset('assets/img/mortgage/mortgage-bg.png') }}" alt="Crypto Real Estate">
                    </div>
                </div>
                

                </div>

            </div>
        </div>
    </section>

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

        .hero .hero-shape .shape--2 {
            position: absolute;
            left: 4%;
            top: 22%;
        }

        .hero .hero-shape .shape--1 {
            position: absolute;
            top: 5%;
            left: 7%;
        }

        .hero .hero-shape .shape--4 {
            position: absolute;
            top: 4%;
            right: 15%;
        }

        .hero .hero-shape .shape--3 {
            position: absolute;
            right: 5%;
            top: 19%;
        }




.second-title-mortgage{
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




.crypto-mortgage-section {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    padding: 4rem 2rem;
    background-color: #0f172a;
    color: white;
}

.crypto-content {
    flex: 1 1 50%;
    min-width: 300px;
    padding-right: 2rem;
}

.crypto-feature {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1.5rem;
}

.feature-icon {
    width: 24px;
    height: 24px;
    margin-right: 1rem;
    margin-top: 0.2rem;
}

.feature-title {
    margin: 0 0 0.3rem;
    font-weight: 600;
}

.feature-desc {
    margin: 0;
    font-size: 0.95rem;
    line-height: 1.6;
}

.crypto-image {
    flex: 1 1 40%;
    min-width: 300px;
}

.crypto-img {
    width: 100%;
    height: auto;
    border-radius: 1rem;
}

/* Optional animation for leftToRight if used */
.leftToRight {
    animation: slideIn 0.8s ease forwards;
    opacity: 0;
    transform: translateX(-20px);
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

        @media (min-width: 1024px) {
            .container {
                max-width: 1416px;
            }
        }

        .iframe-container {
            width: 100%;
            margin-top: 150px;
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
                top: 10%;
            }


            .hero .hero-shape .shape--2 {
                position: absolute;
                left: 3%;
                top: 12%;
            }


            .hero .hero-shape .shape--4 {
                position: absolute;
                top: 1%;
                right: 9%;
            }








        }




        @media (max-width: 991px) {
            .hero {
                padding-top: 50px;
            }
        }
    </style>
    <script>
        window.addEventListener('load', function() {
            // Scroll to top after page load to avoid auto-scroll to iframe
            setTimeout(() => {
                window.scrollTo(0, 0);
            }, 50);
        });
    </script>
@endsection
