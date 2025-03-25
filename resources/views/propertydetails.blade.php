@extends('layouts.front-office.app')

@section('content')
{{-- {{$property}} --}}



    <section style="background: #080B18;" class="blog pt-50 pb-50">
        <div class="container">
            <div class="property-filter-box">
                <div class="property-filter">
                    <img src="{{ asset('assets/img/property/search.png') }}" alt="search">
                    <input placeholder="City, community or building" type="text">
                </div>
                <div class="property-filter-two">
                    <div class="property-filter-select">
                        <img class="property-filter-img" 
                        src="{{ asset('assets/img/home/arrow.png') }}"
                        alt="arrow">
                        <p class="filter-badge">NEW</p>
                        <select name="cars" id="cars">
                            <option value="Buy">Buy</option>
                        </select>
                    </div>
                    <div class="property-filter-select">
                        <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}"  alt="arrow">
                        <select name="cars" id="cars">
                            <option value="Buy">Property type</option>
                        </select>
                    </div>
                    <div class="property-filter-select">
                        <img class="property-filter-img" 
                        src="{{ asset('assets/img/home/arrow.png') }}"
                        alt="arrow">
                        <select name="cars" id="cars">
                            <option value="Buy">Beds & Baths</option>
                        </select>
                    </div>
                    <div class="property-filter-select">
                              <img class="property-filter-img" 
                        src="{{ asset('assets/img/home/arrow.png') }}"
                        alt="arrow">
                        <select name="cars" id="cars">
                            <option value="Buy">Price</option>
                        </select>
                    </div>
                    <div class="property-filter-select">
                              <img class="property-filter-img" 
                        src="{{ asset('assets/img/home/arrow.png') }}"
                        alt="arrow">
                        <select name="cars" id="cars">
                            <option value="Buy">More Filters</option>
                        </select>
                    </div>
                    <button class="property-filter-button">
                        Find
                    </button>
                </div>
            </div>
        </div>
    </section>
    <div style="background: #0B0F28;
            padding: 1px 0;
            ">
        <div class="container">
            <div class="page-path-line">
                <img 
                   src="{{ asset('assets/img/propertydetails/arrow-left.png') }}"
                 alt="home">
                <p>Home</p>
                <p>/ Property Listing</p>
                <p class="active-path-line">/ Bespoke Upgrades | Extended | Vacant</p>
            </div>
            <div class="grid-img-container">
                <div class="grid-container">
                    <div class="main-image">
                        <div class="budge-three-div">
                            <p>
                                <img 
                                  src="{{ asset('assets/img/property/Verified-img.png') }}"
                                class=""  alt="location">
                                Verified
                            </p>
                            <p>
                                <img class="" 
                                  src="{{ asset('assets/img/property/SuperAgent-img.png') }}"
                                     alt="location">
                                SuperAgent
                            </p>
                        </div>
                        <img class="main-image-img" 
                            src="{{ asset('assets/img/propertydetails/img-one.png') }}"
                       alt="home">
                        <div class="floor-plan-div">
                            <img 
                              src="{{ asset('assets/img/propertydetails/floor-plan.png') }}"
                         alt="floor-plan">
                            <p>Floor Plan</p>
                        </div>
                    </div>
                    <div class="small-images">
                        <img class="small-images-img" 
                          src="{{ asset('assets/img/propertydetails/img-one.png') }}"
                        alt="home">
                        <img class="small-images-img" 
                          src="{{ asset('assets/img/propertydetails/img-one.png') }}"
                       alt="home">
                        <img class="small-images-img" 
                          src="{{ asset('assets/img/propertydetails/img-one.png') }}"
                        alt="home">
                    </div>
                </div>
                <div class="grid-left-side">
                    <div class="grid-left-side-fisrt-dev">
                        <p>{{$property->ad_type}}</p>
                        <p>6% OFF</p>
                    </div>
                    <h3 class="grid-left-side-one">{{ $property->property_title }}</h3>
                    <h3 class="grid-left-side-two">{{ $property->unit_type }} | {{ $property->fitted }}</h3>
                    <h3 class="grid-left-side-three">
                        Listed exclusively with Espace Real Estate is this fabulous example of an E2 in Hattan, Arabian
                        Ranches. This property has been completely remodeled from its original design, now boasting over
                        6,000 sq ft BUA and 6 functional double bedrooms. The designer kitchen with Miele appliances has
                        been moved to the rear of the house and opens to three spacious living/dining areas. The property
                        has been fully refitted throughout, including all MEP works, Spanish porcelain floor tiles, Bagno
                        design sanitary ware and a fully landscaped garden amongst others. Call today for a full spec list
                        or to book your viewing via the exclusive agent.
                    </h3>
                    <div class="grid-left-side-price-box">
                        <div class=" grid-left-side-price">
                            <img 
                               src="{{ asset('assets/img/propertydetails/USDT.png') }}"
                            alt="USDT">
                            <div class="grid-left-side-price-div">
                                <p class="grid-left-side-price-div-one">830.22 XRP</p>
                                <p class="grid-left-side-price-div-two">36,238.45 <span>XRP</span></p>
                            </div>
                            <h4 class="grid-left-side-price-div-four">/Month</h4>
                        </div>
                        <div class="grid-left-side-price-two">
                            <div class="grid-left-side-price-two-one">
                                <img class="img-four" src="{{ asset('assets/img/property/green-bed.png') }}" alt="bed">
                                <p>{{ $property->bedrooms ?? 'N/A' }} Bedroom</p>
                            </div>
                            <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                            <div class="grid-left-side-price-two-one">
                                <img class="img-four" src="{{ asset('assets/img/property/green-bath.png') }}" alt="bath">
                                <p>{{ $property->no_of_bathroom }} Bathroom</p>
                            </div>
                            <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                            <div class="grid-left-side-price-two-one">
                                <img class="img-four" src="{{ asset('assets/img/property/green-size.png') }}" alt="size">
                                <p>{{ number_format($property->unit_builtup_area, 2) }} sq. ft.</p>
                            </div>
                        </div>
                    </div>
                    <div class="Converter-div-box">
                        <div style="width: 35%;" class="Converter-div-input">
                            <div style="width: 100%;" class="Converter-select-input">
                                <select style="width: 100%;" name="cars" id="cars">
                                    <option value="Bitcoin">
                                        Bitcoin
                                        <span class="Converter-select-span">BTC</span>
                                    </option>
                                </select>
                                <img class="Converter-img-select" src="{{ asset('assets/img/home/frame-7.svg.png') }}" alt="">
                                <img class="Converter-img" src="{{ asset('assets/img/home/Border.png') }}" alt="icon">
                            </div>
                        </div>
                        <div class="icon-box-Converter">
                            <img src="{{ asset('assets/img/home/frame-7.svg.png') }}" alt="icon">
                            <img src="{{ asset('assets/img/propertydetails/USDT2.png') }}" alt="icon">
                            <img src="{{ asset('assets/img/propertydetails/USDT3.png') }}" alt="icon">
                            <img src="{{ asset('assets/img/propertydetails/USDT.png') }}" alt="icon">
                        </div>
                    </div>
                    <div class="property-two-box-five-box">
                        <div class="property-two-box-five-one">
                            <div class="property-two-box-five-one-img">
                                <img src="{{ asset('assets/img/property/person.jpeg') }}" alt="person">
                            </div>
                            <div class="property-two-box-five-one-name">
                                <p>John Doe</p>
                                <h4>Real Estate Agent</h4>
                            </div>
                        </div>
                        <div class="property-two-box-five-two">
                            <!-- Phone Call -->
                            <a href="tel:{{ $property->listing_agent_phone }}">
                                <img src="{{ asset('assets/img/property/dark-call.png') }}" alt="Call">
                                Call
                            </a>
                            
                            <!-- Email -->
                            <a href="mailto:{{ $property->listing_agent_email }}">
                                <img src="{{ asset('assets/img/property/dark-mail.png') }}" alt="Email">
                                Email
                            </a>
                            
                            <!-- WhatsApp -->
                            <a href="https://wa.me/{{ $property->listing_agent_whatsapp }}" target="_blank">
                                <img src="{{ asset('assets/img/property/dark-WhatsApp.png') }}" alt="WhatsApp">
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="Description-big-box">
                <div class="property-details-Description">
                    <span class="active-filter-link">Description</span>
                </div>
                <div class="Description-second-box">
                    <div class="Description-second-box-one">
                        {!! $property->web_remarks !!} <!-- Render HTML content -->
                        
                        <div class="custom-list-two">
                            <p><span>Office location :</span> {{ $property->company_name }} - {{ $property->community }}, {{ $property->emirate }}</p>
                            <p><span>Tel No :</span> {{ $property->listing_agent_phone }}</p>
                            <p><span>RERA No :</span> {{ $property->listing_agent_permit }}</p>
                        </div>
            
                        <p>This property is managed by {{ $property->company_name }}.</p>
                    </div>
                    <div class="Description-second-box-two">
                        <p>Property details</p>
                        <div class="Description-second-box-two-one">
                            <div class="Description-second-box-two-box-one">
                                <div class="property-details-Description-two">
                                    <p>
                                        <img src="{{ asset('assets/img/propertydetails/Component3.png') }}" alt="Property">
                                        Property
                                    </p>
                                    <span>{{ $property->unit_type }}</span>
                                </div>
                                <div class="property-details-Description-two">
                                    <p>
                                        <img src="{{ asset('assets/img/propertydetails/Component2.png') }}" alt="Bathrooms">
                                        Bathrooms
                                    </p>
                                    <span>{{ $property->bedrooms ?? 'N/A' }}</span>
                                </div>
                                <div class="property-details-Description-two">
                                    <p>
                                        <img src="{{ asset('assets/img/propertydetails/Component1.png') }}" alt="Available from">
                                        Available from
                                    </p>
                                    <span>Q2 2026</span>
                                </div>
                            </div>
                            <div class="Description-second-box-two-box-one">
                                <div class="property-details-Description-two">
                                    <p>
                                        <img src="{{ asset('assets/img/propertydetails/Component3.png') }}" alt="Property Size">
                                        Property Size
                                    </p>
                                    <span>{{ number_format($property->unit_builtup_area, 0) }} {{ $property->unit_measure }}</span>
                                </div>
                                <div class="property-details-Description-two">
                                    <p>
                                        <img src="{{ asset('assets/img/propertydetails/Component2.png') }}" alt="Price">
                                        Bathrooms
                                    </p>
                                    <span>{{ $property->no_of_bathroom }}</span>
                                </div>
                            </div>
                        </div>
                        <p class="Amenities-p-tag">Amenities</p>
                        <div class="Description-second-box-two-one">
                            @php
                                $amenities = [
                                    'Study' => 'Component5.png',
                                    'Balcony' => 'Component4.png',
                                    'Security' => 'Component6.png',
                                    'Covered Parking' => 'Component7.png',
                                    'Kitchen Appliances' => 'Component8.png',
                                    'Central A/C' => 'Component9.png',
                                    'Shared Pool' => 'Component10.png',
                                    'Concierge' => 'Component11.png',
                                    'Built in Wardrobes' => 'Component12.png',
                                    'Pets Allowed' => 'Component13.png',
                                ];
                                $splitIndex = ceil(count($amenities) / 2); // Divide the amenities into two equal parts
                                $firstHalf = array_slice($amenities, 0, $splitIndex, true);
                                $secondHalf = array_slice($amenities, $splitIndex, null, true);
                            @endphp
                        
                            <div class="Description-second-box-two-box-one">
                                @foreach ($firstHalf as $amenity => $icon)
                                    <div class="property-details-Description-two">
                                        <p>
                                            <img src="{{ asset('assets/img/propertydetails/' . $icon) }}" alt="{{ $amenity }}">
                                            {{ $amenity }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        
                            <div class="Description-second-box-two-box-one">
                                @foreach ($secondHalf as $amenity => $icon)
                                    <div class="property-details-Description-two">
                                        <p>
                                            <img src="{{ asset('assets/img/propertydetails/' . $icon) }}" alt="{{ $amenity }}">
                                            {{ $amenity }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="Description-big-box">
                <div class="property-details-Description">
                    <span class="active-filter-link">Floor Plan</span>
                </div>
                <div class="Floor-Plan-div">
                    <div class="Floor-Plan-div-one">
                        <img src="{{ asset('assets/img/propertydetails/Floor-Plan-bg.png') }}" alt="floor-plan">
                    </div>
                    <div class="Floor-Plan-div-two">
                        <div class="video-container">
                            <video id="propertyVideo" src="{{ asset('assets/img/propertydetails/example.mp4') }}"
                                alt="floor-plan"></video>
                            <button id="playButton" class="play-button">
                                <img src="{{ asset('assets/img/propertydetails/play-icon.png') }}" alt="floor-plan">
                                Watch video tour</button>
                        </div>
                        <div class="Floor-Plan-div-three">
                            <div class="Floor-Plan-div-three-box">
                                <div class="Floor-Plan-div-three-box-one">
                                    <p>
                                        Rent this property from just
                                    </p>
                                    <h3>83338.37
                                        <span>USDT /month</span>
                                    </h3>
                                    <h4>
                                        59, 383 AED
                                    </h4>
                                    <h4>Fixed rates from: <span>3.75%</span></h4>
                                </div>
                                <div class="Floor-Plan-div-three-line"></div>
                                <div class="Floor-Plan-div-three-box-two">
                                    <p>
                                        In partnership with
                                    </p>
                                    <img src="{{ asset('assets/img/propertydetails/logo-1.png') }}" alt="logo">
                                    <a class="pre-approved" href="#">Get pre-approved</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





  
                <div style="margin: 20px 0;">
                    <div class="property-details-Description">
                        <span class="active-filter-link">Location</span>
                    </div>
                    <div class="Floor-Plan-div">
                        <div class="map-div-one">
                            <img src="{{ asset('assets/img/propertydetails/map.jpeg') }}" alt="floor-plan">
                        </div>
        
        
                        <div class="Floor-Plan-div-two">
        
                            <div class="map-div-three">
                                <div class="Location-div-three-box">
                                    <div class="Location-div-three-box-one">
                                        <div class="Location-img-one">
                                            <img src="{{ asset('assets/img/propertydetails/map-section-one.png') }}" alt="floor-plan">
                                        </div>
                                        <div>
                                            <p>
                                                Collective 2.0 Tower B
                                            </p>
                                            <p class="Location-img-one-p-two">
                                                Residential Insights
                                            </p>
                                        </div>
                                        <img class="Location-img-two" src="{{ asset('assets/img/propertydetails/arrow-right-green.png') }}" alt="floor-plan">
                                    </div>
                                    <div class="Location-div-three-line"></div>
                                    <div class="map-div-three-box-two">
                                        <div class="map-div-three-box-two-one">
                                            <img src="{{ asset('assets/img/propertydetails/Component15.png') }}" alt="floor-plan">
                                            <p> Floor Plans :</p>
                                            <span>256 units</span>
                                        </div>
                                        <div class="map-div-three-box-two-one">
                                            <img src="{{ asset('assets/img/propertydetails/Component16.png') }}" alt="floor-plan">
                                            <p> Price Range :</p>
                                            <span>80K - 165K AED/year</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="map-div-three">
                                <div class="Location-div-three-box">
                                    <div class="Location-div-three-box-one">
                                        <div class="Location-img-one">
                                            <img src="{{ asset('assets/img/propertydetails/map-section-one.png') }}" alt="floor-plan">
                                        </div>
                                        <div>
                                            <p>
                                                Collective 2.0 Tower B
                                            </p>
                                            <p class="Location-img-one-p-two">
                                                Residential Insights
                                            </p>
                                            <div class="Location-one-p-box">
                                                <p class="Location-img-one-p-three">4.2/5</p>
                                                <span class="Location-img-one-span">19 building reviews</span>
                                            </div>
                                        </div>
                                        <img class="Location-img-two" src="{{ asset('assets/img/propertydetails/arrow-right-green.png') }}" alt="floor-plan">
                                    </div>
                                    <div class="Location-div-three-line"></div>
                                    <div class="map-div-three-box-two">
                                        <div class="map-div-three-box-two-one">
                                            <span>Apartments and villas | Family-Friendly</span>
                                        </div>
                                        <div class="map-div-three-box-two-one">
                                            <img src="{{ asset('assets/img/propertydetails/Component16.png') }}" alt="floor-plan">
                                            <p> Price Range :</p>
                                            <span>80K - 165K AED/year</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>
         

        </div>
    </div>

    <div style="background: #0B0F28;
    padding: 1px 0;
    " class="bg_img top-center pos-rel pb-145" data-background="assets/img/bg/team-bg.png">






        <div 
        class="container">
            <div 
            
            class="card-title">
                <h1>More available in the same area</h1>
            </div>
            <div class="row mt-none-30 justify-content-center">
                <div class="col-lg-3 col-md-6 mt-30">
                    <div class="xb-event-card">
                        <div class="cards-property-img">
                            <img src="{{ asset('assets/img/event/event-img01.jpg') }}" alt="">
                        </div>
                        <div class="xb-item--cards-property">
                            <p class="">APARTMENT</p>
                            <p class="cards-property-title-two">2623.06 BTC</p>
                            <p class="cards-property-title-three">2623.06 ETH / month</p>
                            <p class="cards-property-title-four">87, 000 AED/ month</p>
                            <p class="cards-property-title-five">Collective 2.0 Tower B, Collective 2.0, Dubai, Hills Estate, Dubai</p>
                            
                            <div class="grid-left-side-price-two">
                                <div class="grid-left-side-price-two-card">
                                    <img class="img-card" src="{{ asset('assets/img/property/green-bed.png') }}" alt="bed">
                                    <p>6</p>
                                </div>
                                <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                <div class="grid-left-side-price-two-card">
                                    <img class="img-card" src="{{ asset('assets/img/property/green-bath.png') }}" alt="bath">
                                    <p>6 </p>
                                </div>
                                <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                <div class="grid-left-side-price-two-card">
                                    <img class="img-card" src="{{ asset('assets/img/property/green-size.png') }}" alt="size">
                                    <p>6,000 sq. ft.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- faq start -->
        <section 
        style="    padding-bottom: 126px;"
        class="faq pt-130">
            <div class="container">
                <div class="section-title pb-55 wow fadeInUp"  data-wow-duration=".7s">
                    <h1 class="title">Have Any Questions?</h1>
                </div>
                <div class="faq__blockchain wow fadeInUp" data-wow-duration=".7s" data-wow-delay="200ms">
                    <ul class="accordion_box clearfix">
                        <li class="accordion block">
                            <div class="acc-btn">
                                How do I participate in the ICO?
                                <span class="arrow"><span></span></span>
                            </div>
                            <div class="acc_body">
                                <div class="content">
                                    An ICO, or Initial Coin Offering, is a fundraising method used by cryptocurrency and blockchain projects to raise capital by issuing tokens to investors. In an ICO, investors purchase these tokens with cryptocurrencies or fiat currencies in exchange for a stake to its products or services.
                                </div>
                            </div>
                        </li>
                        <li class="accordion block active-block">
                            <div class="acc-btn">
                                What is an ICO?
                                <span class="arrow"><span></span></span>
                            </div>
                            <div class="acc_body current">
                                <div class="content">
                                    An ICO, or Initial Coin Offering, is a fundraising method used by cryptocurrency and blockchain projects to raise capital by issuing tokens to investors. In an ICO, investors purchase these tokens with cryptocurrencies or fiat currencies in exchange for a stake to its products or services. 
                                </div>
                            </div>
                        </li>
                        <li class="accordion block">
                            <div class="acc-btn">
                                What is the purpose of your project?
                                <span class="arrow"><span></span></span>
                            </div>
                            <div class="acc_body">
                                <div class="content">
                                    An ICO, or Initial Coin Offering, is a fundraising method used by cryptocurrency and blockchain projects to raise capital by issuing tokens to investors. In an ICO, investors purchase these tokens with cryptocurrencies or fiat currencies in exchange for a stake to its products or services.
                                </div>
                            </div>
                        </li>
                        <li class="accordion block">
                            <div class="acc-btn">
                                What are the benefits of holding your token?
                                <span class="arrow"><span></span></span>
                            </div>
                            <div class="acc_body">
                                <div class="content">
                                    An ICO, or Initial Coin Offering, is a fundraising method used by cryptocurrency and blockchain projects to raise capital by issuing tokens to investors. In an ICO, investors purchase these tokens with cryptocurrencies or fiat currencies in exchange for a stake to its products or services.
                                </div>
                            </div>
                        </li>
                        <li class="accordion block">
                            <div class="acc-btn">
                                How is the token distributed?
                                <span class="arrow"><span></span></span>
                            </div>
                            <div class="acc_body">
                                <div class="content">
                                    An ICO, or Initial Coin Offering, is a fundraising method used by cryptocurrency and blockchain projects to raise capital by issuing tokens to investors. In an ICO, investors purchase these tokens with cryptocurrencies or fiat currencies in exchange for a stake to its products or services.
                                </div>
                            </div>
                        </li>
                        <li class="accordion block">
                            <div class="acc-btn">
                                Is there a minimum investment requirement?
                                <span class="arrow"><span></span></span>
                            </div>
                            <div class="acc_body">
                                <div class="content">
                                    An ICO, or Initial Coin Offering, is a fundraising method used by cryptocurrency and blockchain projects to raise capital by issuing tokens to investors. In an ICO, investors purchase these tokens with cryptocurrencies or fiat currencies in exchange for a stake to its products or services.
                                </div>
                            </div>
                        </li>
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









    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const video = document.getElementById("propertyVideo");
            const playButton = document.getElementById("playButton");

            playButton.addEventListener("click", function() {
                video.play();
                playButton.style.display = "none"; // Hide button when video starts playing
            });
        });
    </script>
@endsection
