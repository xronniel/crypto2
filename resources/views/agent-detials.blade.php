@extends('layouts.front-office.app')
@section('content')

{{$agent}}
    <div style="background: #0B0F28;
            padding: 100px 0 0 0;
            ">
        <div class="container">
            <div onclick="window.location.href='/properties'" class="page-path-line">
                <img src="{{ asset('assets/img/propertydetails/arrow-left.png') }}" alt="home">
                <p>Home</p>
                <p>/ Property Listing</p>
                <p class="active-path-line">/ Bespoke Upgrades | Extended | Vacant</p>
            </div>

            <div class="grid-img-container">
                <div class="grid-container">
                    <div class="main-image">
         

                <img src="{{ asset('assets/img/bg/team-bg.png') }}" alt="">

             
                    </div>

                </div>


                <div class="grid-left-side">
                <p>
                    eicnewiocnweov wvkv weov ewojv ewvewvj ne rigberiubeh vbe vuerb iuernv ier
                </p>
                </div>
            </div>

            <div class="Description-big-box">
                <div class="property-details-Description">
                    <span class="active-filter-link">Description</span>
                </div>
                <div class="Description-second-box">
                    <div class="Description-second-box-one">
                 wegewgrger erg rh rth rt
                    </div>
                    <div class="Description-second-box-two">
                        <p>Property details</p>
                 

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
        {{-- <section style="    padding-bottom: 126px;" class="faq pt-130">
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
        </section> --}}
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
    ul {
    list-style-type: none;  
    padding: 0;            
    margin: 0;              
}

ul li {
    margin: 0;              
    padding: 0;            
}
.beds-baths-options button {
    flex: 1 1 calc(25% - 10px); 
    min-width: 120px; 
    padding: 10px;
    text-align: center;
    white-space: nowrap;
}
.property-filter .search-button-property {
    position: absolute;
    left: 4px;
    top: 0.7px;
    bottom: 0;
    margin: auto;
    width: fit-content;
    height: fit-content;
    background: none;
    display: flex
;
    border-radius: 50% 0 0 50%;
    justify-content: center;
    align-items: center;
    height: 43px;
    padding: 10px 8px;
    align-content: center;
}






@media (max-width: 700px) {
    .property-filter {
        width: 60%;
    }

    .filter-button {
        right: 2%;
    }
}
@media (max-width: 700px) {
    .property-filter {
        width: 60%;
    }

    .filter-button {
        right: 2%;
    }


    .property-filter img {
        filter: brightness(0) invert(1); 
    }
    

    .property-filter .search-button-property {
        position: absolute;
        left: 2px;
        top: 0.7px;
        bottom: 0;
        margin: auto;
        width: fit-content;
        height: fit-content;
        background: #2dd98f;
        display: flex
    ;
        border-radius: 50% 0 0 50%;
        justify-content: center;
        align-items: center;
        height: 43px;
        padding: 10px 8px;
        align-content: center;
    }
    
    


}

</style>
@endsection
