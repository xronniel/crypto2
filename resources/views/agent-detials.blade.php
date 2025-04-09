@extends('layouts.front-office.app')
@section('content')

{{-- {{$agent}} --}}
    <div style="background: #0B0F28;
            padding: 100px 0 0 0;
            display: flex;
            ">
        <div class="container">
            <div onclick="window.location.href='/properties'" class="page-path-line">
                <img src="{{ asset('assets/img/propertydetails/arrow-left.png') }}" alt="home">
                <p>Home</p>
                <p>/ Property Listing</p>
                <p class="active-path-line">/ Bespoke Upgrades | Extended | Vacant</p>
            </div>

            <div class="grid-img-container">
               
                    <div class="main-image">
         

                       <img src="{{ asset('assets/img/agent/agent-1.jpeg') }}" alt="agent">

             
                    </div>
                    <div class="grid-left-side">


                        <div class="grid-left-side-one">

                            <div class="agent-flex ">
                                <div class="agent-flex">
                                    <span>10</span>
                                    <p>Properties for Sale</p>
                                </div>
                                <div class="agent-flex">
                                    <span>10</span>
                                    <p>Properties for Sale</p>
                                </div>
                            </div>
                                <h2 class="grid-left-side-title">
                                    Meerim Shekeeva
                                </h2>
                                <p class="grid-left-side-title-p">Associate Director</p>
                        </div>


                        <div class="agent-flex-links">
                            <a href="#">
                                    <img src="{{ asset('assets/img/agent/Call.png') }}" alt="agent">
                                +971 4 987 6543</a>
                            <a href="#">
                                    <img src="{{ asset('assets/img/agent/Email.png') }}" alt="agent">
                                meerim.shekeeva@cryptohomes.com</a>
                            <a href="#">
                                    <img src="{{ asset('assets/img/agent/Location.png') }}" alt="agent">
                                Suite 205, Marina Plaza, Dubai Marina, Dubai, UAE</a>
                        </div>

                        <a class="agent-flex-link-two" href="#">
                            Send Message
                            <img src="{{ asset('assets/img/agent/arrow.png') }}" alt="agent">
                    </a>



                    </div>

                    <div class="agent-logo-container">
                        <h4>
                            Brokerage
                        </h4>
                        <img src="{{ asset('assets/img/agent/agent-logo.jpeg') }}" alt="#">
                        <p>
                            Espace Real Estate
                        </p>
                    </div>
            </div>












            <div class="Description-big-box">
                <div class="property-details-Description">
                    <span class="active-filter-link">Description</span>
                </div>
                <div class="Description-second-box">
                    <div class="Description-second-box-one">
                        <div>
                            <h4 class="agent-right-box-card-left-p">Nationality: <span>Iran</span></h4>
                            <h4 class="agent-right-box-card-left-p">Language: <span>English, Spanish</span></h4>
                            <h4 class="agent-right-box-card-left-p">Experience: <span>English, Spanish</span></h4>
                            <h4 class="agent-right-box-card-left-p">Dubai Broker License (BRN): <span>English, Spanish</span></h4>
                        </div>
                    </div>
                    <div class="Description-second-box-two">
                        <h4>About Me</h4>
                 <p>
                    Originally from the UK, Meerim Shekeeva embarked on a journey to Dubai to seize greater career opportunities and immerse himself in the city's dynamic real estate market. With over seven years of experience in high-performance sales  environments, Jack has honed his skills in customer service and relationship-building across various sectors, including telecommunications and premium automotive brands like Mercedes-Benz and Volkswagen. 

While advancing his professional career, Meerim pursued academic excellence, earning a Bachelor’s Degree in Accounting and Business Management from Keele University. This academic achievement underscores his commitment to personal and professional growth.

In 2024, Meerim joined Espace Properties, focusing on becoming a specialist in one of Dubai’s most iconic areas—Palm Jumeirah. His goal is to build lasting client relationships while delivering exceptional service and results. 

Beyond his professional endeavors, Meerim is passionate about entrepreneurship and is actively involved in scaling a concierge business with a close friend. He also enjoys training at the gym, watching football, and spending quality time with friends. 
                 </p>

                    </div>
                </div>
            </div>


        </div>
    </div>

    <div style="background: #0B0F28;
    padding: 1px 0;
    " class="bg_img top-center pos-rel pb-145"
      data-background="{{ asset('assets/img/bg/team-bg.png') }}">


        <!-- faq start -->
        <section style="    padding-bottom: 126px;" class="faq pt-130">
            <div class="container">
                <div class="section-title pb-55 wow fadeInUp" data-wow-duration=".7s">
                    <h1 class="title">Have Any Questions?</h1>
                </div>
                <div class="faq__blockchain wow fadeInUp" data-wow-duration=".7s" data-wow-delay="200ms">
                    <ul class="accordion_box clearfix">
                        @foreach($faqs as $faq)
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
        <!-- faq end -->


        <div class="footer-shape">
            <div class="shape shape--1">
                <img class="leftToRight" src="{{ asset('assets/img/shape/team-sp_01.svg') }}" alt="">
            </div>
            <div class="shape shape--2">
                <img class="topToBottom" src="{{ asset('assets/img/shape/team-sp_02.svg') }}" alt="">
            </div>
        </div>
    </div>




<style>
.agent-flex {
    display: flex
;
    gap: 5px;
}

.agent-flex-links {
    display: flex;
    flex-direction: column;
    gap: 10px;
}


.agent-flex span{
    font-family: "Manrope", sans-serif;
font-weight: 700;
font-size: 30px;
line-height: 32px;
letter-spacing: 0%;
vertical-align: middle;
color: #2DD98F;

}
.agent-flex p {
    font-family: "Manrope", sans-serif;
font-weight: 400;
font-size: 14px;
line-height: 24px;
letter-spacing: 0%;
vertical-align: middle;
color: #4F4F4F;


}


.grid-left-side-title{
    font-family: "Outfit", sans-serif;
font-weight: 700;
font-size: 60px;
line-height: 100%;
letter-spacing: -0.03px;
vertical-align: middle;
text-transform: capitalize;
color: #FFFFFF;

}

.grid-left-side-title-p{
    font-family: "Outfit", sans-serif;
font-weight: 300;
font-size: 24px;
line-height: 100%;
letter-spacing: -0.03px;
vertical-align: middle;
text-transform: capitalize;
color: #767676;

}






.agent-flex-links a{
    font-family: "Outfit", sans-serif;
font-weight: 400;
font-size: 18px;
line-height: 100%;
letter-spacing: -0.03px;
vertical-align: middle;
text-transform: capitalize;
color: #767676;
}



.agent-flex-link-two{
    background: #FFFFFF;

border-radius: 3px;
padding: 10px 40px;
font-family: "Outfit", sans-serif;
font-weight: 300;
font-size: 14px;
line-height: 100%;
letter-spacing: -0.03px;
vertical-align: middle;
text-transform: capitalize;
color: #000000;

}


.grid-left-side-one{
    display: flex
;
    flex-direction: column;
    gap: 10px;
}



.main-image {
    position: relative;
    width: 440.296875px;
height: 474.8800048828125px;

    border-radius: 5px;
    overflow: hidden;
}



.grid-left-side{
    display: flex
;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
}

.grid-container-one {
    display: grid
;
    width: 40%;
    height: 100%;
}


.agent-logo-container {
    display: flex;
    flex-direction: column;
    gap: 10px;
    align-items: center;
    justify-content: center;
    padding: 20px 0;
    border: 1px solid #737373;
border-radius: 20px;
padding: 15px;






width: 248px;
height: 182px;

}


.agent-logo-container img {
    width: 80px;
}


.agent-logo-container h4 {
    font-family: "Manrope", sans-serif;
font-weight: 600;
font-size: 16px;
line-height: 28px;
letter-spacing: 0%;
vertical-align: middle;
color: #FFFFFF;

}


.agent-logo-container p {
    font-family: "Manrope", sans-serif;
font-weight: 400;
font-size: 14px;
line-height: 24px;
letter-spacing: 0%;
vertical-align: middle;


}





.agent-right-box-card-left-p {
            font-family: "Manrope", sans-serif;
            color: #767676;

font-weight: 400;
font-size: 20px;
line-height: 28px;
letter-spacing: 0%;
vertical-align: middle;


        }

        .agent-right-box-card-left-p span {
            font-family: "Manrope", sans-serif;

            margin: 7px 0 0 0;

font-weight: 400;
font-size: 20px;
line-height: 28px;
letter-spacing: 0%;
vertical-align: middle;
color: #FFFFFF;

        }

.Description-second-box-two h4 {
    font-family: "Manrope", sans-serif;
font-weight: 600;
font-size: 20px;
line-height: 28px;
letter-spacing: 0%;
vertical-align: middle;
color: #2DD98F;

}
.Description-second-box-two p {
    font-family: "Manrope", sans-serif;
font-weight: 400;
font-size: 20px;
line-height: 28px;
letter-spacing: 0%;
vertical-align: middle;
color: #FFFFFF;

}







</style>
@endsection
