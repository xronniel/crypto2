@extends('layouts.front-office.app')


{{-- @php
    dd( $properties);
@endphp --}}

@section('content')
    <section class="blog pt-50 pb-50">
        <div class="container">
            <form action="{{ route('properties.index') }}" method="GET">
                @csrf
                <div class="property-filter-box">
                    
                    <div class="property-filter property-filter-header">
                        <button type="submit" class="search-button-property">
                            <img src="{{ asset('assets/img/property/search.png') }}" alt="search">
                        </button>
                        <input type="text" placeholder="City, community or building" value="" name="search">
                    </div>

                    <div class="property-filter-two">
                        <div class="back-filter-box" onclick="window.location.href='/'">
                            <img class="back-filter-img" src="{{ asset('assets/img/home/return-icon.svg') }}"
                                alt="arrow">

                        </div>
                        <div class="property-filter-select">
                            <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}" alt="arrow">
                            <p class="filter-badge">NEW</p>
                            <select name="filter_type" class="form-select" id="filter_type">
                                <option value="">Select Type</option>
                                <option value="rent">Rent</option>
                                <option value="buy">Buy</option>
                                <option value="new_projects">New Projects</option>
                                <option value="commercial">Commercial</option>
                            </select>
                        </div>
                        <div class="property-filter-select">
                            <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}" alt="arrow">
                            <select name="property_type" id="propertyTypeSelect" class="form-select">
                                <option value="">Select Property Type</option>
                                @foreach ($propertyTypes as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Price Filter -->
                        <div class="property-filter-select">
                            <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}" alt="arrow">
                            <button class="Price-button" type="button" id="priceToggle">Price</button>
                            {{-- <input type="hidden" name="min_price" id="selectedMinPrice" value="">
                            <input type="hidden" name="max_price" id="selectedMaxPrice" value=""> --}}
                        </div>
                        <!-- Area Filter -->
                        <div class="property-filter-select">
                            <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}" alt="arrow">
                            <button class="Price-button" type="button" id="AreaToggle">Area Size</button>
                            {{-- <input type="hidden" name="min_area" id="selectedMinArea" value="">
                            <input type="hidden" name="max_area" id="selectedMaxArea" value=""> --}}
                        </div>


                        <!-- Filters Toggle Button -->
                        <div class="property-filter-select">
                            <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}" alt="arrow">
                            <button class="filter-button" type="button" id="FiltersToggle">
                                <span>More Filters</span>

                                <img class="property-filter-img-two"
                                    src="{{ asset('assets/img/home/FilterButtonMobile.svg') }}" alt="FilterButtonMobile">
                            </button>
                            <input type="hidden" name="" id="" value="">
                        </div>

                        <button class="property-filter-button" type="submit">Find</button>
                        {{-- !-- Area Dropdown --> --}}
                        <div class="dropdown-dialog" id="areaDropdown">
                            <p>Area Size</p>
                  
                            <div class="dropdown-dialog-content">
                                <div class="black-dropdown black-dropdown-one ">
                                    <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}"
                                        alt="arrow">
                                    <select name="min_area" class="price-dropdown form-select">
                                        <option value="" selected>Min. Area</option> <!-- Default option set to 0 -->
                                        @foreach ($plotAreaRange['steps'] as $step)
                                            <option value="{{ $step }}">{{ $step }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="black-dropdown black-dropdown-one ">
                                    <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}"
                                        alt="arrow">
                                    <select name="max_area" class="price-dropdown form-select">
                                        <option value="" selected>Max. Area</option> <!-- Default option set to 0 -->
                                        @foreach ($plotAreaRange['steps'] as $step)
                                            <option value="{{ $step }}">{{ $step }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="done-btn"
                                onclick="closeDropdownArea('areaDropdown')">Done</button>
                        </div>


                        {{-- !-- Price Dropdown --> --}}
                        <div class="dropdown-dialog" id="priceDropdown">

                            <div class="dropdown-dialog-content">
                                <div class="dropdown-dialog-content-one">
                                    <p>Minimum Price</p>
                                    <div class="black-dropdown">
                                        <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}"
                                            alt="arrow">
                                        <select name="min_price" class="price-dropdown form-select">
                                            <option value="" selected>Min. price</option>
                                            @foreach ($priceRange['steps'] as $price)
                                                <option value="{{ $price }}">{{ $price }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="dropdown-dialog-content-one">
                                    <p>Maximum Price</p>
                                    <div class="black-dropdown">
                                        <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}"
                                            alt="arrow">
                                        <select name="max_price" class="price-dropdown form-select">
                                            <option value="" selected>Max. price</option>
                                            @foreach ($priceRange['steps'] as $price)
                                                <option value="{{ $price }}">{{ $price }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="done-btn"
                                onclick="closeDropdowntwo('priceDropdown')">Done</button>
                        </div>



                        <!-- More Filters Dropdown -->
                        
                        <div class="dropdown-dialog  More-FIlters-div" id="FiltersDropdown">

                            <div>
                                <h1>
                                    More FIlters
                                </h1>
                            </div>
                            <div style="padding:20px;">
                                <p>
                                    <img src="{{ asset('assets/img/property/search-icon.svg') }}" alt="search">
                                    Search
                                </p>

                                <div class="property-filter">
                                    <img src="{{ asset('assets/img/property/search.png') }}" alt="search">
                                    <input type="text" placeholder="Search : e.g. Villa, Office, etc." value=""
                                        name="search-filters">
                                </div>
                            </div>
                            <div class="filters-secroll-box">



                                <p>
                                    <img src="{{ asset('assets/img/property/furnishing-icon.svg') }}" alt="search">
                                    Furnishing
                                </p>

                                <div class="beds-baths-options">

                                    <button type="button" class="furnished" data-value="">All
                                        Furnishing</button>
                                    <button type="button" class="furnished" data-value="furnished">Furnished</button>
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
                                    <img src="{{ asset('assets/img/property/amenities-icon-1.svg') }}" alt="search">
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


                            <input type="hidden" name="furnishing" id="" value="">
                            <input type="hidden" name="completion" id="" value="">
                            {{-- <input type="hidden" type="checkbox" name="amenities[]" value=""> --}}





                            <button type="button" class="done-btn hide-mobile"
                                onclick="closeDropdowntwo('FiltersDropdown')">Done</button>
                            <button type="submit" class="done-btn show-mobile-two"
                                onclick="closeDropdowntwo('FiltersDropdown')">Done</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- breadcrumb start -->
    <section class="breadcrumb bg_img pos-rel" data-background="assets/img/bg/breadcrumb.jpg">
        <div class="container">
            <div class="breadcrumb__content">
                <h2 class="breadcrumb__title">Properties for Sale in UAE</h2>
                <ul style="    flex-direction: column;" class="bread-crumb clearfix ul_li_center">
                    <li class="breadcrumb-item"><a href="#">Items Found</a></li>
                    <li class="breadcrumb-item">{{ $properties->total() }} properties</li>
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

    <!-- blog start -->
    <section class="blog pt-130">
        <div class="container">

            <div class="page-line-path">
                <img src="assets/img/property/home.png" alt="home">
                <img src="assets/img/property/right-arrow.png" alt="home">
                <p>Properties for sale in UAE</p>
            </div>

            <h2 class="page-line-title">
                Buy Properties in Dubai
            </h2>

            <div class="page-line-filter-box">
                <div class="page-line-filter">
                    <div class="page-line-filter-h3">
                        <p>{{ $properties->count() }}</p>
                        <span>properties available</span>
                    </div>

                    <div class="page-line-filter-links">
                        <a class="page-line-filter-links-ctive" href="#">Any</a>
                        <a href="#">Off-plan</a>
                        <a href="#">Ready</a>
                    </div>

                </div>


                <div class="page-line-filter">

                    <div class="page-line-filter-links-two mobile-view">
                        <a href="#">
                            <img style="    width: 22px;" class="page-line-filter-links-two-img"
                                src="assets/img/property/location.png" alt="home">
                            Map view</a>
                        <a href="#">
                            <img style="    width: 19px;" class="page-line-filter-links-two-img"
                                src="assets/img/property/alert.png" alt="home">
                            Create alert</a>
                    </div>

                    <div class="page-line-filter-links-two">
                        <img class="filter-links-two-img" src="assets/img/home/arrow.png" alt="">
                        <label for="#">Sort by:</label>

                        <select name="#" id="#">
                            <option value="volvo">1</option>
                        </select>
                    </div>

                </div>
            </div>


            <div class="row mt-none-30">
                <div class="col-lg-9 mt-30">
                    {{-- card   --}}
                    {{-- card   --}}

                    @foreach ($properties as $property)
                        <div onclick="window.location.href='{{ route('properties.show', ['property' => $property->property_ref_no]) }}'"
                            style="margin-bottom: 50px; cursor: pointer;" class="blog-post-wrap mt-none-30">
                            <article class="blog__item mt-30 blog__item-property">
                                <div class="blog__item-property-one swiper">
                                    <img class="Favorite-green" src="assets/img/property/green-Favorite.png"
                                        alt="Favorite">
                                    <img class="location-green" src="assets/img/property/location-green.png"
                                        alt="location">
                                    <!-- Image Slider Count -->
                                    <div class="img-slider-count">
                                        <img class="" src="assets/img/property/cam.png" alt="location">
                                        <p>{{ $property->images->count() }}</p>
                                    </div>


                                    <div class="budge-three-div">
                                        <!-- If Verified -->
                                        @if ($property->verified == 1)
                                            <p>
                                                <img class="" src="assets/img/property/Verified-img.png"
                                                    alt="location">
                                                Verified
                                            </p>
                                        @endif

                                        <!-- If SuperAgent -->
                                        @if ($property->superagent == 1)
                                            <p>
                                                <img class="" src="assets/img/property/SuperAgent-img.png"
                                                    alt="location">
                                                SuperAgent
                                            </p>
                                        @endif

                                        <!-- If New -->
                                        @if ($property->new == 1)
                                            <p>New</p>
                                        @endif
                                    </div>
                                    <div class="swiper-wrapper">
                                        @foreach ($property->images as $image)
                                            <div class="swiper-slide">
                                                <img class="blog__item-property-one-img-slide"
                                                    src="{{ $property->xml ? $image->url : asset('storage/' . $image->url) }}"
                                                    alt="Property Image">
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div style="background-image: url(assets/img/bg/tm_bg.png);
            background-size: cover;
        "
                                    class="blog__item-property-two">

                                    <div class="blog__item-property-two-box">
                                        <h1 class="blog__item-property-two-title">{{ $property->unit_type }}</h1>
                                        <p>Premium</p>
                                    </div>
                                    <div class="blog__item-property-two-box-two">
                                        <div class="blog__item-property-two-box-one">
                                            <p class="box-two-p-one">
                                                {{ $property->getConvertedPrice()['converted_price'] }}({{ $property->getConvertedPrice()['currency_code'] }})
                                            </p>
                                            <p class="box-two-p-two">
                                                {{ $property->price }} AED
                                            </p>
                                        </div>

                                        <div class="blog__item-property-two-img">
                                            <img src="assets/img/property/state-logo.jpeg" alt="logo">
                                        </div>

                                    </div>
                                    <div class="blog__item-property-two-box-three">
                                        <p>{{ $property->property_title }}</p>
                                    </div>
                                    <div class="location-property-two-box-three">
                                        <img src="assets/img/property/green-location.png" alt="location">
                                        <p>Hattan, Arabian Ranches, Dubai</p>
                                    </div>
                                    <div class="property-two-box-four">
                                        {{-- Rooms --}}
                                        @if (isset($property->no_of_rooms) && $property->no_of_rooms > 0)
                                            <img class="img-four" src="{{ asset('assets/img/property/green-bed.png') }}"
                                                alt="bed">
                                            <p>{{ $property->no_of_rooms }}</p>
                                            <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                        @endif

                                        {{-- Bathrooms --}}
                                        @if (isset($property->no_of_bathroom) && $property->no_of_bathroom > 0)
                                            <img class="img-four" src="{{ asset('assets/img/property/green-bath.png') }}"
                                                alt="bath">
                                            <p>{{ $property->no_of_bathroom }}</p>
                                            <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                        @endif

                                        {{-- Built-Up Area --}}
                                        @if (isset($property->unit_builtup_area) && $property->unit_builtup_area > 0)
                                            <img class="img-four" src="{{ asset('assets/img/property/green-size.png') }}"
                                                alt="size">
                                            <p>{{ $property->unit_builtup_area }}{{ $property->unit_measure }}</p>
                                        @endif
                                    </div>

                                    <div class="property-two-box-five">

                                        <div class="property-two-box-five-one">

                                            <div class="property-two-box-five-one-img">
                                                <img src="{{ asset($property->listing_agent_photo) }}" alt="person">
                                            </div>
                                            <div class="property-two-box-five-one-name">
                                                <p>{{ $property->listing_agent }}</p>
                                                <h4>Real Estate Agent</h4>
                                            </div>
                                        </div>


                                        <div class="property-two-box-five-two">
                                            <!-- Phone Call -->
                                            <a href="tel:{{ $property->listing_agent_phone }}">
                                                <img src="{{ asset('assets/img/property/dark-call.png') }}" alt="Call">
                                                <span>
                                                    Call
                                                </span>
                                            </a>
                
                                            <!-- Email -->
                                            <a href="mailto:{{ $property->listing_agent_email }}">
                                                <img src="{{ asset('assets/img/property/dark-mail.png') }}" alt="Email">
                                               <span>
                                                Email
                                               </span>
                                            </a>
                
                                            <!-- WhatsApp -->
                                            <a href="https://wa.me/{{ $property->listing_agent_whatsapp }}" target="_blank">
                                                <img src="{{ asset('assets/img/property/dark-WhatsApp.png') }}" alt="WhatsApp">
                                          <span>
                                                    WhatsApp
                                          </span>
                                            </a>
                                        </div>



                                    </div>





                                </div>
                            </article>
                        </div>
                    @endforeach
                    {{-- end card   --}}
                    {{ $properties->links() }}


                </div>
                <div class="col-lg-3 mt-30">
                    <div class="sidebar-area mt-none-30">

                        <div class="widget  widget-one mt-30">
                            <h3 class="widget__title">Nearby Areas</h3>
                            <ul class="widget__category list-unstyled">
                                <li><a href="#!">Properties for sale in Dubai</a></li>
                                <li><a href="#!">Properties for sale in Abu Dhabi</a></li>
                                <li><a href="#!">Properties for sale in Ajman</a></li>
                                <li><a href="#!">Properties for sale in Sharjah</a></li>
                            </ul>
                            <h3 class="widget__title">Popular Searches</h3>
                            <ul class="widget__category list-unstyled">
                                <li><a href="#!">Properties for sale in Dubai</a></li>
                                <li><a href="#!">Properties for sale in Abu Dhabi</a></li>
                                <li><a href="#!">Properties for sale in Ajman</a></li>
                                <li><a href="#!">Properties for sale in Sharjah</a></li>
                                <li><a href="#!">Properties for sale in Dubai</a></li>
                                <li><a href="#!">Properties for sale in Abu Dhabi</a></li>
                                <li><a href="#!">Properties for sale in Ajman</a></li>
                                <li><a href="#!">Properties for sale in Sharjah</a></li>
                                <li><a href="#!">Properties for sale in Dubai</a></li>
                                <li><a href="#!">Properties for sale in Abu Dhabi</a></li>
                                <li><a href="#!">Properties for sale in Ajman</a></li>
                                <li><a href="#!">Properties for sale in Sharjah</a></li>
                            </ul>
                        </div>



                        <div 
                        style="padding: 0;"
                        class="widget widget-two mt-30">

                            <div class="widget-two-one">
                                <img src="assets/img/property/amar.png" alt="amar">
                            </div>
                            <div class="widget-two-two">
                                <img src="assets/img/property/amar-1.png" alt="amar">
                                <img src="assets/img/property/amar-2.png" alt="amar">
                                <img src="assets/img/property/amar-link.png" alt="amar">
                                <img src="assets/img/property/amar-3.png" alt="amar">
                            </div>
                        </div>



                        <div 
                            style="padding: 0;"
                        class="widget widget-three mt-30">
                            <img src="assets/img/property/marta.gif" alt="amar">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog end -->



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
