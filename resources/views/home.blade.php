@extends('layouts.front-office.app')

@section('content')
    <style>
        .hero.dynamic-bg {
            background-image: url('{{ asset("storage/{$homepageContent->hero_image}") }}');
            background-size: cover;
            background-position: center;
        }

        @media (max-width: 768px) {
            .hero.dynamic-bg {
                background-image: url('{{ asset("storage/{$homepageContent->mobile_hero_image}") }}');
            }
        }
    </style>
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
                    <h1 class="title first-banner-title">{!! $homepageContent->text_hero_banner !!}</h1>
                </div>

                <form class="desktop-form-home" action="{{ route('properties.index') }}" method="GET">
                    @csrf

                    <input type="hidden" name="filter_type" id="filterTypeInput" value="rent"> <!-- Default value -->
                    <input type="hidden" name="no_of_rooms" id="selectedRooms" value=""> <!-- Selected rooms -->
                    <input type="hidden" name="no_of_bathroom" id="selectedBathrooms" value="">
                    <!-- Selected bathrooms -->

                    <div class="hero__btn btns pt-50 wow fadeInUp">
                        <div class="first-section-border">
                            <div class="first-section-border-first-div">
                                <span class="filter-btn active-button-home" data-value="rent">Rent</span>
                                <span class="filter-btn" data-value="buy">Buy</span>
                                <span class="filter-btn" data-value="new_projects">
                                    <p class="new-bar">New</p>
                                    New projects
                                </span>
                                <span class="filter-btn" data-value="commercial">Commercial</span>
                            </div>
                            <div class="first-section-border-second-div">
                                <span>
                                    <img class="Vector-img" src="assets/img/home/Vector.png" alt="">
                                    <input type="text" placeholder="City, community or building" value=""
                                        name="search">
                                </span>

                                <select name="property_type" id="propertyTypeSelect" class="form-select">
                                    <option value="">Select Property Type</option>

                                    @foreach ($propertyTypes as $type)
                                        <option class="form-select-option" value="{{ $type }}">{{ $type }}
                                        </option>
                                    @endforeach

                                </select>

                                <span id="bedsBathsToggle">
                                    <p>Beds & Baths</p>
                                    <img class="arrow-img" src="assets/img/home/arrow.png" alt="">
                                </span>

                                <!-- Beds & Baths Dropdown -->
                                <div class="beds-baths-dropdown" id="bedsBathsDropdown">
                                    <p>Bedroom</p>
                                    <div class="beds-baths-options">
                                        <button type="button" class="room-option" data-value="Studio">Studio</button>
                                        @foreach ($noOfRooms as $room)
                                            <button type="button" class="room-option"
                                                data-value="{{ $room }}">{{ $room }}</button>
                                        @endforeach
                                    </div>

                                    <p>Bathroom</p>
                                    <div class="beds-baths-options">
                                        @foreach ($noOfBathrooms as $bathroom)
                                            <button type="button" class="bath-option"
                                                data-value="{{ $bathroom }}">{{ $bathroom }}</button>
                                        @endforeach
                                    </div>

                                    <button type="button" class="done-btn" onclick="closeDropdown()">Done</button>
                                </div>

                                <button class="submit-button" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </form>



                <form class="mobile-form-home" action="{{ route('properties.index') }}" method="GET">
                    @csrf

                    <input type="hidden" name="filter_type" id="filterTypeInput" value="rent"> <!-- Default value -->
                    <input type="hidden" name="no_of_rooms" id="selectedRooms" value=""> <!-- Selected rooms -->
                    <input type="hidden" name="no_of_bathroom" id="selectedBathrooms" value="">
                    <!-- Selected bathrooms -->

                    <div class="hero__btn btns pt-50 wow fadeInUp">
                        <div class="first-section-border">
                            <div class="first-section-border-second-div">
                                <span>
                                    <img class="Vector-img" src="assets/img/home/Vector.png" alt="">
                                    <input type="text" placeholder="City, community or building" value=""
                                        name="search">
                                </span>
                            </div>

                            <button style="width:100%;" class="them-btn" id='More-Filters' type="button">
                                <span style="    padding: 17px 0px 14px;" class="btn_label"
                                    data-text="Filters">Filters</span>
                                <span class="btn_icon">
                                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z"
                                            fill="white"></path>
                                    </svg>
                                </span>
                            </button>

                            <!-- More Filters Dropdown -->
                            <div class="dropdown-dialog-home" id="Filters-Dropdown">

                                <div style="position: relative;">
                                    <h1>
                                        More FIlters
                                    </h1>
                                    <img class="Filters-close-button-home"
                                        src="{{ asset('assets/img/property/mobile-close-icon.png') }}" alt="search">
                                </div>
                                <div style="padding:20px;">
                                    <p>
                                        <img src="{{ asset('assets/img/property/search-icon.svg') }}" alt="search">
                                        Search
                                    </p>
{{-- 
                                    <div class="property-filter">
                                        <img src="{{ asset('assets/img/property/search.png') }}" alt="search">
                                        <input type="text" placeholder="Search : e.g. Villa, Office, etc."
                                            value="" name="search-filters">
                                    </div> --}}
                                </div>
                                <div class="filters-secroll-box">



                                    <p>
                                        <img src="{{ asset('assets/img/property/furnishing-icon.svg') }}" alt="search">
                                        Furnishing
                                    </p>

                                    <div class="beds-baths-options">

                                        <button type="button" class="furnished" data-value="">All
                                            Furnishing</button>
                                        <button type="button" class="furnished"
                                            data-value="furnished">Furnished</button>
                                        <button type="button" class="furnished"
                                            data-value="unfurnished">Unfurnished</button>
                                        <button type="button" class="furnished" data-value="partly furnished">Partly
                                            Furnished</button>

                                    </div>

                                    <p>
                                        <img src="{{ asset('assets/img/property/completion.svg') }}" alt="search">
                                        Completion Status
                                    </p>

                                    <div class="beds-baths-options">

                                        <button type="button" class="Completion" data-value="">Any</button>
                                        <button type="button" class="Completion" data-value="off_plan">Off-plan</button>
                                        <button type="button" class="Completion" data-value="ready">Ready</button>

                                    </div>

                                    <p>
                                        <img src="{{ asset('assets/img/property/amenities-icon-1.svg') }}"
                                            alt="search">
                                        Amenities
                                    </p>
                                    <div class="amenities-box">


                                        @foreach ($amenities as $amenity)
                                            <label class="amenities">
                                                <input type="checkbox" name="amenities[]" value="{{ $amenity }}">
                                                {{ $amenity }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>


                                <input type="hidden" name="furnishing" id="furnishing" value="">
                                <input type="hidden" name="completion" id="completion" value="">
                                <input type="hidden" type="checkbox" name="amenities[]" value="">





                                <button type="button" class="done-btn"
                                    onclick="closeDropdown('FiltersDropdown')">Done</button>
                            </div>




                        </div>
                    </div>
                </form>

            </div>
            <div class="hero-scroll pt-105">
                <span>scroll to down</span>
                <div class="scroll-down text-center">
                    <div class="chevron">
                        <img class="scrolling-img" src="assets/img/home/scrolling-down 2.png" alt="">
                    </div>
                    <div class="chevron">
                        <img class="scrolling-img" src="assets/img/home/scrolling-down 2.png" alt="">
                    </div>
                    <div class="chevron">
                        <img class="scrolling-img" src="assets/img/home/scrolling-down 2.png" alt="">
                    </div>
                </div>
            </div>


            <div class="token-structure mt-145 wow fadeInUp" data-wow-duration=".7s" data-wow-delay="450ms">
                <div class="row row-mobile">

                    <div 
                    style="padding-bottom: 20px;"
                    class="hero-token">
                        <h3 > {!! $homepageContent->calculator_title2 !!}</h3>

                        <p class="xb-item--content">
                            {!! $homepageContent->calculator_text !!}
                        </p>
                        <div class="xb-item--accept">
                            <h5 class="xb-item--acc-title">We accept :</h5>
                            <ul class="xb-item--list ul_li">
                                <li><img src="assets/img/icon/hero-icon01.svg" alt="">Bitcoin</li>
                                <li><img src="assets/img/icon/hero-icon02.svg" alt="">Ethereum</li>
                                <li><img src="assets/img/icon/hero-icon03.svg" alt="">Litecoin</li>
                                <li><img src="assets/img/icon/hero-icon04.svg" alt="">Ripple</li>
                            </ul>
                        </div>
                    </div>


                    <div class="hero-sale">
                        <div class="Converter-div">
                            <h2> {{ $homepageContent->calculator_title }}</h2>

                            <div class="Converter-div-two">
                                <div class="Converter-div-input">
                                    <input type="text" placeholder="Enter Amount">
                                    <div class="Converter-select-input">
                                        <select name="cars" id="cars">
                                            <option value="Bitcoin">
                                                Bitcoin
                                                <span class="Converter-select-span">BTC</span>
                                            </option>
                                        </select>
                                        <img class="Converter-img-select" src="assets/img/home/frame-7.svg.png"
                                            alt="">
                                        <img class="Converter-img" src="assets/img/home/Border.png" alt="">
                                    </div>
                                </div>
                                <img class="Swap-img" src="assets/img/home/Swap Icon.png" alt="">
                                <div class="Converter-div-input">
                                    <input type="text" placeholder="I will recieve">
                                    <div class="Converter-select-input">
                                        <select name="cars" id="cars">
                                            <option value="Bitcoin">
                                                AED
                                            </option>
                                        </select>
                                        <img class="Converter-img" src="assets/img/home/Border.png" alt="">
                                    </div>
                                </div>

                                <button class="Converter-button">Calculate</button>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- hero section end  -->

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
                            <img src="{{ asset('storage/' . $partner->image ) }}" alt="">
                        </div>
                        <span> {{ $partner->name }}</span>
                    </div>
                </div>
            @endforeach
              
           
            </div>
        </div>
    </section>
    <!-- partners section end  -->

    <!-- about section start-->
    <section class="about pos-rel">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-wrap wow fadeInLeft" data-wow-duration=".7s">
                        <h2 class="xb-item--title">{!! $homepageContent->buying_process_title !!}</h2>
                        <p class="xb-item--content">
                            {!! $homepageContent->buying_process_text !!}
                        </p>
                        <h3 class="xb-item--title xb-item--title1">{!! $homepageContent->equirements_title !!}</h3>
                        <p class="xb-item--content xb-item--content1">
                            {!! $homepageContent->requirements_text !!}
                        </p>
                        <div class="xb-item--list">
                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z"
                                        fill="white" />
                                    <path
                                        d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z"
                                        fill="#080B18" />
                                </svg> {!! $homepageContent->requirements_step1 !!} </span>

                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z"
                                        fill="white" />
                                    <path
                                        d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z"
                                        fill="#080B18" />
                                </svg> {!! $homepageContent->requirements_step2 !!}</span>

                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z"
                                        fill="white" />
                                    <path
                                        d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z"
                                        fill="#080B18" />
                                </svg> {!! $homepageContent->requirements_step3 !!}</span>

                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z"
                                        fill="white" />
                                    <path
                                        d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z"
                                        fill="#080B18" />
                                </svg> {!! $homepageContent->requirements_step4 !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-img bg_img">
            <img class="wow fadeInRight" data-wow-duration=".7s" data-wow-delay="200ms" src="assets/img/home/Link.png"
                alt="">
        </div>
    </section>
    <!-- about section end-->

    <!-- process start -->
    <section class="process z-3 pb-150 pt-35">
        <div class="container pt-100">
            <div class="row justify-content-center mt-none-130">
                <div class="col-xl-4 col-lg-6 process-col mt-130">
                    <div class="xb-process pos-rel">
                        <div class="xb-item--icon">
                            <img src="{{ asset('storage/' . $homepageContent->requirements_icon1) }}"
                                alt="requirements_icon1">
                        </div>
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title xb-item--title-process"> {!! $homepageContent->requirements_icon1_title !!}</h2>
                            <p class="xb-item--content xb-item--content-process">
                                {!! $homepageContent->requirements_icon1_text !!}
                            </p>
                        </div>
                        <div class="xb-item--shape">
                            <span>
                                <svg width="410" height="274" viewBox="0 0 410 274" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                    <path d="M302.5 0C220.1 55.6 135.5 23.1667 103.5 0L0 274H410L302.5 0Z"
                                        fill="url(#p_shape1)" />
                                    <defs>
                                        <radialGradient id="p_shape1" cx="0" cy="0" r="1"
                                            gradientUnits="userSpaceOnUse"
                                            gradientTransform="translate(205 12) rotate(90) scale(611.5 749.061)">
                                            <stop offset="0" stop-color="#EBF7FD" />
                                            <stop offset="0.09" stop-color="#9162FF" />
                                            <stop offset="0.26792" stop-color="#1C30A8" />
                                            <stop offset="0.474094" stop-color="#080B18" />
                                        </radialGradient>
                                    </defs>
                                </svg>
                            </span>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 process-col mt-130">
                    <div class="xb-process pos-rel">
                        <div class="xb-item--icon">
                            <img src="{{ asset('storage/' . $homepageContent->requirements_icon2) }}"
                                alt="requirements_icon2">
                        </div>
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title xb-item--title-process"> {!! $homepageContent->requirements_icon2_title !!}</h2>
                            <p class="xb-item--content xb-item--content-process">
                                {!! $homepageContent->requirements_icon2_text !!}
                            </p>
                        </div>
                        <div class="xb-item--shape">
                            <span>
                                <svg width="410" height="274" viewBox="0 0 410 274" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                    <path d="M302.5 0C220.1 55.6 135.5 23.1667 103.5 0L0 274H410L302.5 0Z"
                                        fill="url(#p_shape2)" />
                                    <defs>
                                        <radialGradient id="p_shape2" cx="0" cy="0" r="1"
                                            gradientUnits="userSpaceOnUse"
                                            gradientTransform="translate(205 12) rotate(90) scale(611.5 749.061)">
                                            <stop offset="0" stop-color="#EBF7FD" />
                                            <stop offset="0.09" stop-color="#9162FF" />
                                            <stop offset="0.26792" stop-color="#1C30A8" />
                                            <stop offset="0.474094" stop-color="#080B18" />
                                        </radialGradient>
                                    </defs>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 process-col mt-130">
                    <div class="xb-process pos-rel">
                        <div class="xb-item--icon">
                            <img src="{{ asset('storage/' . $homepageContent->requirements_icon3) }}"
                                alt="requirements_icon3">
                        </div>
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title xb-item--title-process"> {!! $homepageContent->requirements_icon3_title !!}</h2>
                            <p class="xb-item--content xb-item--content-process">
                                {!! $homepageContent->requirements_icon3_text !!}
                            </p>
                        </div>
                        <div class="xb-item--shape">
                            <span>
                                <svg width="410" height="274" viewBox="0 0 410 274" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                    <path d="M302.5 0C220.1 55.6 135.5 23.1667 103.5 0L0 274H410L302.5 0Z"
                                        fill="url(#p_shape3)" />
                                    <defs>
                                        <radialGradient id="p_shape3" cx="0" cy="0" r="1"
                                            gradientUnits="userSpaceOnUse"
                                            gradientTransform="translate(205 12) rotate(90) scale(611.5 749.061)">
                                            <stop offset="0" stop-color="#EBF7FD" />
                                            <stop offset="0.09" stop-color="#9162FF" />
                                            <stop offset="0.26792" stop-color="#1C30A8" />
                                            <stop offset="0.474094" stop-color="#080B18" />
                                        </radialGradient>
                                    </defs>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- process end -->

    <!-- token section start  -->
    <section id="chart" class="token z-1 mt-70 pt-150 pb-150 bg_img pos-rel"
        data-background="assets/img/bg/token-bg.png">
        <div class="container">
            <div class="section-title pb-55">
                <h1 class="title ">Featured Properties</h1>
            </div>
            <div id="communities-span" class="token-wrap-location-filter">
                @foreach ($communities as $communityName)
                    <span class="community-tab {{ $communityName === $community ? 'active-filter-link' : '' }}"
                        data-community="{{ $communityName }}">
                        {{ $communityName }}
                    </span>
                @endforeach
            </div>



            <div class="token-wrap-location-filter-two">
                Discover the latest off-plan properties and be informed.
            </div>

            <!-- Section where new properties will be displayed -->
            <div id="featured-properties">
                show the loop of data .data
            </div>


        </div>
        <div class="toke-shape">
            <div class="shape--one">
                <img class="leftToRight" src="assets/img/shape/token.svg" alt="">
            </div>
            <div class="shape--two">
                <img class="topToBottom" src="assets/img/shape/token1.svg" alt="">
            </div>
        </div>
    </section>
    <!-- token section end -->



    <!-- feature section start -->
    <section id="features" class="feature pos-rel pt-125 mb-170">
        <div class="container">
            <div class="section-title pb-65">
                <h1 class="title">{!! $homepageContent->features_title !!}</h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="feature-wrap ul_li">
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title">{!! $homepageContent->features_card1_title !!}</h2>
                            <p class="xb-item--content">{!! $homepageContent->features_card1_text !!}</p>
                        </div>
                        <div class="xb-item--feature-icon">
                            <img src="{{ asset('storage/' . $homepageContent->features_card1_icon) }}"
                                alt="features_card1_icon">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature-wrap ul_li">
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title">{!! $homepageContent->features_card2_title !!}</h2>
                            <p class="xb-item--content">{!! $homepageContent->features_card2_text !!}</p>
                        </div>
                        <div class="xb-item--feature-icon">
                            <img src="{{ asset('storage/' . $homepageContent->features_card2_icon) }}"
                                alt="features_card2_icon">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature-wrap ul_li">
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title">{!! $homepageContent->features_card3_title !!}</h2>
                            <p class="xb-item--content">{!! $homepageContent->features_card3_text !!}</p>
                        </div>
                        <div class="xb-item--feature-icon">
                            <img src="{{ asset('storage/' . $homepageContent->features_card3_icon) }}"
                                alt="features_card3_icon">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature-wrap ul_li">
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title">{!! $homepageContent->features_card4_title !!}</h2>
                            <p class="xb-item--content">{!! $homepageContent->features_card4_text !!}</p>
                        </div>
                        <div class="xb-item--feature-icon">
                            <img src="{{ asset('storage/' . $homepageContent->features_card4_icon) }}"
                                alt="features_card4_icon">
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature-crypto bg_img" data-background="assets/img/bg/feature-bg.png">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="mobile-crypto">
                            <div class="xb-item--sub-title">
                                <span><svg width="16" height="20" viewBox="0 0 16 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.6448 8.99798C14.223 8.02696 13.6099 7.15543 12.8438 6.43787L12.2116 5.84453C12.1901 5.82499 12.1643 5.81106 12.1363 5.80409C12.1084 5.79704 12.0792 5.79721 12.0513 5.80443C12.0234 5.81165 11.9978 5.82584 11.9764 5.84555C11.9551 5.86535 11.9389 5.89016 11.9292 5.91786L11.6468 6.74682C11.4708 7.26683 11.1471 7.79797 10.6886 8.32018C10.6582 8.35349 10.6235 8.36241 10.5996 8.36462C10.5757 8.36683 10.5388 8.36241 10.5062 8.33132C10.4758 8.30464 10.4606 8.26462 10.4627 8.22459C10.5431 6.88685 10.1521 5.37789 9.29609 3.73562C8.58788 2.37114 7.60377 1.30668 6.3741 0.564432L5.47683 0.0244217C5.35957 -0.0466972 5.2096 0.0466409 5.21615 0.186644L5.26398 1.25334C5.29653 1.98225 5.21402 2.62671 5.01842 3.16227C4.77949 3.81784 4.43622 4.42675 3.99735 4.97343C3.69198 5.35333 3.34581 5.69703 2.96549 5.9979C2.04933 6.71827 1.3044 7.64137 0.786445 8.69796C0.269767 9.7638 0.000628769 10.9373 0 12.127C0 13.1759 0.202039 14.1914 0.601783 15.1492C0.987762 16.0714 1.54477 16.9083 2.24201 17.6137C2.94587 18.3248 3.76276 18.8849 4.67303 19.2738C5.61592 19.6782 6.61524 19.8826 7.64719 19.8826C8.67913 19.8826 9.67845 19.6782 10.6213 19.276C11.5293 18.8894 12.3551 18.3255 13.0523 17.6159C13.7563 16.9048 14.3081 16.0737 14.6925 15.1514C15.0917 14.1963 15.2965 13.1679 15.2944 12.1292C15.2944 11.0447 15.0771 9.99135 14.6448 8.99798Z"
                                            fill="#FF0000" />
                                    </svg>Mobile App 2.0 <span class="new-btn">new</span>
                                </span>
                            </div>
                            <h2 class="xb-item--title">
                                {!! $homepageContent->app_coming_soon_title !!}
                            </h2>
                            <p class="xb-item--content">
                                {!! $homepageContent->app_coming_soon_text !!}
                            </p>
                            <ul class="xb-item--crypto-list">
                                <li><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z"
                                            fill="white"></path>
                                        <path
                                            d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z"
                                            fill="#080B18"></path>
                                    </svg> No limits on transaction volume.</li>
                                <li><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z"
                                            fill="white"></path>
                                        <path
                                            d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z"
                                            fill="#080B18"></path>
                                    </svg> ApplePay, Samsung Pay, AndroidPay, QR code</li>
                                <li><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z"
                                            fill="white"></path>
                                        <path
                                            d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z"
                                            fill="#080B18"></path>
                                    </svg> Contactless payments options</li>
                                <li><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z"
                                            fill="white"></path>
                                        <path
                                            d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z"
                                            fill="#080B18"></path>
                                    </svg> Integration with third-party payment wallets or services</li>
                            </ul>
                            <div
                            style="flex-wrap: nowrap;"
                            class="xb-item--crypto-btn">
                                <a class="them-btn crp-btn" href="#!">
                                    <span class="btn_icon">
                                        <i class="fab fa-apple"></i>
                                    </span>
                                    <span class="btn_label" data-text="Apple iOS">Apple iOS</span>
                                </a>
                                <a class="them-btn crp-btn" href="#!">
                                    <span class="btn_icon"><svg width="21" height="14" viewBox="0 0 21 14"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.398804 12.1266C0.537847 10.5267 1.04394 9.05395 1.91712 7.70827C2.78967 6.3626 3.95204 5.29345 5.40423 4.50098L3.68942 1.63014C3.59672 1.49556 3.57354 1.35352 3.61989 1.204C3.66624 1.05447 3.76666 0.942338 3.92114 0.867577C4.04473 0.792815 4.18378 0.777861 4.33826 0.822713C4.49276 0.867577 4.61635 0.957281 4.70904 1.09186L6.42386 3.96269C7.75246 3.42441 9.14288 3.15528 10.5951 3.15528C12.0472 3.15528 13.4377 3.42441 14.7662 3.96269L16.4811 1.09186C16.5738 0.957281 16.6974 0.867577 16.8518 0.822713C17.0063 0.777861 17.1454 0.792815 17.269 0.867577C17.4235 0.942338 17.5239 1.05447 17.5702 1.204C17.6165 1.35352 17.5934 1.49556 17.5007 1.63014L15.7859 4.50098C17.238 5.29345 18.4007 6.3626 19.2739 7.70827C20.1464 9.05395 20.6523 10.5267 20.7913 12.1266V13.826H0.398804V12.1266ZM6.78336 9.3339C6.55904 9.55096 6.28467 9.6595 5.96025 9.6595C5.63581 9.6595 5.36175 9.55096 5.13805 9.3339C4.91374 9.1174 4.80158 8.85207 4.80158 8.53814C4.80158 8.22409 4.91374 7.95888 5.13805 7.74238C5.36175 7.5252 5.63581 7.41666 5.96025 7.41666C6.28467 7.41666 6.55904 7.5252 6.78336 7.74238C7.00706 7.95888 7.11891 8.22409 7.11891 8.53814C7.11891 8.85207 7.00706 9.1174 6.78336 9.3339ZM16.0527 9.3339C15.8283 9.55096 15.5539 9.6595 15.2296 9.6595C14.9051 9.6595 14.6311 9.55096 14.4074 9.3339C14.1831 9.1174 14.071 8.85207 14.071 8.53814C14.071 8.22409 14.1831 7.95888 14.4074 7.74238C14.6311 7.5252 14.9051 7.41666 15.2296 7.41666C15.5539 7.41666 15.8283 7.5252 16.0527 7.74238C16.2764 7.95888 16.3882 8.22409 16.3882 8.53814C16.3882 8.85207 16.2764 9.1174 16.0527 9.3339Z"
                                                fill="#080B18" />
                                        </svg></span>
                                    <span class="btn_label" data-text="Android">Android</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="cry-mobile-img">
                            <img src="assets/img/feature/fea-mobile.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="feature-shape align-items-center">
            <img src="assets/img/feature/fea-color-sp.png" alt="">
        </div>
    </section>
    <!-- feature section end -->

    <!-- team & faq section start -->
    <div class="bg_img top-center pos-rel pb-145" data-background="{{ asset('assets/img/bg/team-bg.png') }}">
        <!-- team section start -->
        <section class="team pt-140">
            <div class="container">
                <div class="section-title pb-55">
                    <h1 class="title">News and Media</h1>
                </div>
                <div class="row mt-none-30 justify-content-center">
                    @foreach ($newsList as $news)
                        <div class="col-lg-4 col-md-6 mt-30">
                            <div class="xb-event">
                                <!-- Dynamic Thumbnail -->
                                <div class="xb-item--img">
                                    <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}">
                                </div>

                                <div class="xb-item--holder">
                                    <!-- Location -->
                                    <div class="xb-item--location">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <span>{{ $news->state }} {{ $news->country }}</span>
                                    </div>

                                    <!-- Title -->
                                    <h2 class="xb-item--title border_effect">
                                        <a href="#!">{{ $news->title }}</a>
                                    </h2>

                                    <!-- Date and Time -->
                                    <div class="xb-item--date-time ul_li_between">
                                        <div class="xb-item--date xb-item--date-time1">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.66663 1.66675V4.16675" stroke="white" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M13.3334 1.66675V4.16675" stroke="white" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M5.83337 10.8333H12.5" stroke="white" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M5.83337 14.1667H10" stroke="white" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M13.3333 2.91675C16.1083 3.06675 17.5 4.12508 17.5 8.04175V13.1917C17.5 16.6251 16.6667 18.3417 12.5 18.3417H7.5C3.33333 18.3417 2.5 16.6251 2.5 13.1917V8.04175C2.5 4.12508 3.89167 3.07508 6.66667 2.91675H13.3333Z"
                                                    stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span>{{ \Carbon\Carbon::parse($news->date)->format('d / m / Y') }}</span>
                                        </div>
                                        <div class="xb-item--time xb-item--date-time1">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.2917 11.0417C17.2917 15.0667 14.025 18.3333 10 18.3333C5.97504 18.3333 2.70837 15.0667 2.70837 11.0417C2.70837 7.01667 5.97504 3.75 10 3.75C14.025 3.75 17.2917 7.01667 17.2917 11.0417Z"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M10 6.66675V10.8334" stroke="white" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7.5 1.66675H12.5" stroke="white" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <span>{{ $news->time }}</span>
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <p>{{ $news->content }}</p>

                                    <!-- Button -->
                                    <div class="xb-item--event-btn">
                                        <a class="them-btn" href="{{ route('news.gallery.show', ['news' => $news]) }}">
                                            <span class="btn_label" data-text="Find out more">Find out more</span>
                                            <span class="btn_icon">
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z"
                                                        fill="white"></path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- team section end -->

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
        <!-- faq end -->
        <div class="team-shape">
            <div class="shape shape--1">
                <img class="leftToRight" src="assets/img/shape/team-sp_01.svg" alt="">
            </div>
            <div class="shape shape--2">
                <img class="topToBottom" src="assets/img/shape/team-sp_02.svg" alt="">
            </div>
            <div class="shape shape--3">
                <img class="leftToRight" src="assets/img/shape/team-sp_03.svg" alt="">
            </div>
            <div class="shape shape--4">
                <img class="topToBottom" src="assets/img/shape/team-sp_04.svg" alt="">
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".filter-btn");
            const hiddenInput = document.getElementById("filterTypeInput");

            buttons.forEach(button => {
                button.addEventListener("click", function() {

                    buttons.forEach(btn => btn.classList.remove("active-button-home"));


                    this.classList.add("active-button-home");


                    hiddenInput.value = this.dataset.value;
                });
            });
        });



        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById("bedsBathsToggle").addEventListener("click", function() {
                document.getElementById("bedsBathsDropdown").classList.toggle("active");
            });


            document.querySelectorAll(".room-option").forEach(button => {
                button.addEventListener("click", function() {
                    document.querySelectorAll(".room-option").forEach(btn => btn.classList.remove(
                        "active"));
                    this.classList.add("active");
                    document.getElementById("selectedRooms").value = this.getAttribute(
                        "data-value");
                });
            });

            document.querySelectorAll(".bath-option").forEach(button => {
                button.addEventListener("click", function() {
                    document.querySelectorAll(".bath-option").forEach(btn => btn.classList.remove(
                        "active"));
                    this.classList.add("active");
                    document.getElementById("selectedBathrooms").value = this.getAttribute(
                        "data-value");
                });
            });
        });


        function closeDropdown() {
            document.getElementById("bedsBathsDropdown").classList.remove("active");
        }

        document.addEventListener("DOMContentLoaded", () => {
            const propertyTypeSelect = document.getElementById("propertyTypeSelect");
            const bedsBathsToggle = document.getElementById("bedsBathsToggle");
            const roomInput = document.getElementById("selectedRooms");
            const bathroomInput = document.getElementById("selectedBathrooms");

            const commercialPropertyTypes = [
                "Commercial Full Building",
                "Retail",
                "Warehouse",
                "Labour Camp",
                "Land Commercial",
                "Factory",
                "Land Mixed Use",
                "Commercial Full Floor"
            ];

            propertyTypeSelect.addEventListener("change", () => {
                const selectedValue = propertyTypeSelect.value;

                if (commercialPropertyTypes.includes(selectedValue)) {

                    bedsBathsToggle.style.display = "none";


                    if (roomInput) roomInput.value = "";
                    if (bathroomInput) bathroomInput.value = "";
                } else {

                    bedsBathsToggle.style.display = "flex";
                }
            });
        });

        document.addEventListener("DOMContentLoaded", () => {
            const locationFilter = document.getElementById("communities-span");

            let isDragging = false;
            let startX;
            let scrollLeft;

            locationFilter.addEventListener("mousedown", (e) => {
                isDragging = true;
                locationFilter.classList.add("dragging");
                startX = e.pageX - locationFilter.offsetLeft;
                scrollLeft = locationFilter.scrollLeft;
            });

            locationFilter.addEventListener("mouseleave", () => {
                isDragging = false;
                locationFilter.classList.remove("dragging");
            });

            locationFilter.addEventListener("mouseup", () => {
                isDragging = false;
                locationFilter.classList.remove("dragging");
            });

            locationFilter.addEventListener("mousemove", (e) => {
                if (!isDragging) return;
                e.preventDefault();
                const x = e.pageX - locationFilter.offsetLeft;
                const walk = (x - startX) * 2;
                locationFilter.scrollLeft = scrollLeft - walk;
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            let currentPage = 1;
            let totalPages = 1;

            function loadListings(communityName, page = 1) {
                if (!communityName) {
                    console.error("Community is undefined or missing.");
                    return;
                }

                fetch(`/api/featured-listings?community=${encodeURIComponent(communityName)}&page=${page}`)
                    .then(response => response.json())
                    .then(responseData => {
                        // console.log("API Response:", responseData.data.data[0].images[0].url); 

                        let propertiesContainer = document.getElementById("featured-properties");
                        propertiesContainer.innerHTML = "";

                        let listings = responseData.data?.data || [];
                        totalPages = responseData.data?.last_page || 1;
                        currentPage = responseData.data?.current_page || 1;

                        if (listings.length === 0) {
                            propertiesContainer.innerHTML = "<p>No properties found.</p>";
                            return;
                        }

                        let listing1 = listings[0] || {};
                        let listing2 = listings[1] || {};
                        let listing3 = listings[2] || {};


                        let agentPhoto1 = listing1.images[0].url || "default-image.jpg";
                        let agentPhoto2 = listing2.images[0].url || "default-image.jpg";
                        let agentPhoto3 = listing3.images[0].url || "default-image.jpg";

                        let whatsappLink1 = listing1.listing_agent_whatsapp ?
                            `href="${listing1.listing_agent_whatsapp} h"` : "";
                        let whatsappLink2 = listing2.listing_agent_whatsapp ?
                            `href="${listing2.listing_agent_whatsapp}"` : "";
                        let whatsappLink3 = listing3.listing_agent_whatsapp ?
                            `href="${listing3.listing_agent_whatsapp}"` : "";

                        let cardsHTML = `
                    <div class="token-wrap">
                        <div class="row mt-none-30">
                `;

                        if (listings.length >= 1) {
                            cardsHTML += `
                        <div class="col-xl-5 col-lg-6 mt-30">
                            <div style="background-image: url('${agentPhoto1}');" class="token-distribut">
                                <div class="token-distribut-location-div">
                                    <h1 class="token-distribut-location-h1">${listing1.community || ""}</h1>
                                    <div class="token-distribut-location-span">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <span>${listing1.location || ""}</span>
                                    </div>
                                    <div class="token-distribut-location-span-two">
                                        <span class="token-distribut-location-span-two-one">Launch price:</span>
                                        <span class="token-distribut-location-span-two-two">${listing1.price || "N/A"} AED</span>
                                    </div>
                                    <a class="token-location-button" ${whatsappLink1}>
                                        <img class="WhatsApp-img" src="assets/img/home/WhatsApp.png" alt="">
                                        <span>WhatsApp</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    `;
                        }

                        if (listings.length >= 2) {
                            cardsHTML += `
                        <div class="col-xl-7 col-lg-6 mt-30">
                            <div style="background-image: url('${agentPhoto2}');" class="token-sale img-cards-Featured">
                                <div class="token-distribut-location-div">
                                    <h1 class="token-distribut-location-h1">${listing2.community || ""}</h1>
                                    <div class="token-distribut-location-span">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <span>${listing2.location || ""}</span>
                                    </div>
                                    <div class="token-distribut-location-span-two">
                                        <span class="token-distribut-location-span-two-one">Launch price:</span>
                                        <span class="token-distribut-location-span-two-two">${listing2.price || "N/A"} AED</span>
                                    </div>
                                    <a class="token-location-button" ${whatsappLink2}>
                                        <img class="WhatsApp-img" src="assets/img/home/WhatsApp.png" alt="">
                                        <span>WhatsApp</span>
                                    </a>
                                </div>
                            </div>
                    `;
                        }

                        if (listings.length === 3) {
                            cardsHTML += `
                            <div style="background-image: url('${agentPhoto3}');" class="token-sale img-cards-Featured model">
                                <div class="token-distribut-location-div">
                                    <h1 class="token-distribut-location-h1">${listing3.community || ""}</h1>
                                    <div class="token-distribut-location-span">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <span>${listing3.location || ""}</span>
                                    </div>
                                    <div class="token-distribut-location-span-two">
                                        <span class="token-distribut-location-span-two-one">Launch price:</span>
                                        <span class="token-distribut-location-span-two-two">${listing3.price || "N/A"} AED</span>
                                    </div>
                                    <a class="token-location-button" ${whatsappLink3}>
                                        <img class="WhatsApp-img" src="assets/img/home/WhatsApp.png" alt="">
                                        <span>WhatsApp</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    `;
                        }
                        cardsHTML += `
                            </div>
                        </div>
                        <div class="pagination_wrap pt-50">
                            <ul>
                                <li><a href="javascript:void(0);" id="prevPage" ${currentPage === 1 ? "disabled" : ""}><i class="far fa-long-arrow-left"></i></a></li>
                                <li><a href="javascript:void(0);" class="current_page">${currentPage < 10 ? "0" + currentPage : currentPage}</a></li>
                                ${currentPage < totalPages - 1 ? `<li><a href="javascript:void(0);">${currentPage + 1}</a></li>` : ""}
                                ${currentPage < totalPages ? `<li><a href="javascript:void(0);">${totalPages}</a></li>` : ""}
                                <li><a href="javascript:void(0);" id="nextPage" ${currentPage === totalPages ? "disabled" : ""}><i class="far fa-long-arrow-right"></i></a></li>
                            </ul>
                        </div>
                        `;



                        document.addEventListener("DOMContentLoaded", function() {
                            document.querySelectorAll(".pagination_wrap a").forEach(link => {
                                link.addEventListener("click", function(event) {
                                    event.preventDefault();
                                });
                            });
                        });



                        propertiesContainer.innerHTML = cardsHTML;

                        document.getElementById("prevPage").addEventListener("click", function() {
                            if (currentPage > 1) {
                                loadListings(communityName, currentPage - 1);
                            }
                        });

                        document.getElementById("nextPage").addEventListener("click", function() {
                            if (currentPage < totalPages) {
                                loadListings(communityName, currentPage + 1);
                            }
                        });
                    })
                    .catch(error => console.error("Error fetching data:", error));
            }

            let defaultTab = document.querySelector(".community-tab.active-filter-link");
            if (defaultTab) {
                let defaultCommunity = defaultTab.getAttribute("data-community");
                loadListings(defaultCommunity);
            }

            document.querySelectorAll(".community-tab").forEach(tab => {
                tab.addEventListener("click", function() {
                    let communityName = this.getAttribute("data-community");

                    if (!communityName) {
                        console.error("Community is undefined or missing.");
                        return;
                    }

                    document.querySelectorAll(".community-tab").forEach(el => el.classList.remove(
                        "active-filter-link"));
                    this.classList.add("active-filter-link");

                    loadListings(communityName);
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
    const filterButton = document.getElementById("More-Filters");
    const filterDropdown = document.getElementById("Filters-Dropdown");
    const doneButton = document.querySelector(".done-btn");
    const closeButton = document.querySelector(".Filters-close-button-home");


    filterButton.addEventListener("click", function () {
        filterDropdown.classList.toggle("active");
    });


    doneButton.addEventListener("click", function () {
        filterDropdown.classList.remove("active");
    });

  
    closeButton.addEventListener("click", function () {
        filterDropdown.classList.remove("active");
    });
});
    </script>
@endsection
