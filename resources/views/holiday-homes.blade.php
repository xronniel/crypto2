@extends('layouts.front-office.app')
@section('content')
    {{-- <section class="blog pt-50 pb-50">
        <x-property-filter 
            :propertyTypes="$propertyTypes" 
            :plotAreaRange="$plotAreaRange" 
            :priceRange="$priceRange" 
            :amenities="$amenities" 
        />
    </section> --}}


    {{-- {{$holidayProperties}}  --}}



    <!-- breadcrumb start -->
    <section class="breadcrumb bg_img pos-rel section-bg-agent"
        data-background="{{ asset('assets/img/holiday-property/holidayProperty.png') }}">
        <div class="container">
            <div class="breadcrumb__content">
                <h2 class="breadcrumb__title">Properties for Sale in UAE</h2>
                <ul style="    flex-direction: column;" class="bread-crumb clearfix ul_li_center">
                    <li class="breadcrumb-item"><a href="#">Items Found</a></li>
                    <li class="breadcrumb-item">{{ $holidayProperties->total() }} properties</li>
                </ul>
            </div>
            <div 
                class="section-bg-agent-bottom-img"
                data-background="{{ asset('assets/img/bg/breadcrumb.jpg') }}"
            >
                <p>Find us on Booking.com and AirBnB</p>
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

            <div onclick="window.location.href='/properties'" class="page-path-line">
                <img src="{{ asset('assets/img/propertydetails/arrow-left.png') }}" alt="home">
                <p>Home</p>
                <p class="active-path-line">/ Holiday homes in dubai</p>
            </div>


            <h2 class="page-line-title">
                Exclusive Holiday Homes in Dubai Available for Cryptocurrency Purchase
            </h2>

            <div class="page-line-filter-box">
                <div class="page-line-filter">
                    <div class="page-line-filter-h3">
                        <p>{{ $holidayProperties->count() }}</p>
                        <span>properties available</span>
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

                    <form action="{{ route('properties.index') }}" method="GET">
                        <div class="page-line-filter-links-two">
                            <img class="filter-links-two-img" src="assets/img/home/arrow.png" alt="">
                            <label for="sort-options">Sort by:</label>

                            <select name="sort" id="sort-options" onchange="this.form.submit()">
                                <option value="">Select an option</option>
                                <option value="featured">Featured</option>
                                <option value="newest">Newest</option>
                                <option value="from_lowest_price">From Lowest Price</option>
                                <option value="from_highest_price">From Highest Price</option>
                            </select>
                        </div>
                    </form>

                </div>
            </div>


            <div class="row mt-none-30">
                <div class="col-lg-9 mt-30">
                    {{-- card   --}}





                    @foreach ($holidayProperties as $holiday)
                        <div onclick="window.location.href='{{ route('holiday-properties.show', ['holidayProperty' => $holiday->id]) }}'"
                            style="margin-bottom: 50px; cursor: pointer;" class="blog-post-wrap mt-none-30">
                            <article class="blog__item mt-30 blog__item-property">
                                <div class="blog__item-property-one swiper">
                                    <img class="Favorite-green" src="assets/img/property/green-Favorite.png" alt="Favorite">
                                    <img class="location-green" src="assets/img/property/location-green.png" alt="location">

                                    <div class="img-slider-count">
                                        <img src="assets/img/property/cam.png" alt="camera">
                                        @php
                                            $images = json_decode($holiday->photos ?? '[]');
                                        @endphp

                                        <p>{{ count($images) }}</p>

                                    </div>

                                    <div class="budge-three-div">
                                        <!-- If Verified -->
                                        @if ($holiday->verified == 1)
                                            <p>
                                                <img class="" src="assets/img/property/Verified-img.png"
                                                    alt="location">
                                                Verified
                                            </p>
                                        @endif

                                        <!-- If SuperAgent -->
                                        @if ($holiday->superagent == 1)
                                            <p>
                                                <img class="" src="assets/img/property/SuperAgent-img.png"
                                                    alt="location">
                                                SuperAgent
                                            </p>
                                        @endif

                                        <!-- If New -->
                                        @if ($holiday->new == 1)
                                            <p>New</p>
                                        @endif
                                    </div>

                                    <div class="swiper-wrapper">
                                        @php
                                            $images = json_decode($holiday->photos ?? '[]');
                                        @endphp

                                        @foreach ($images as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ $image }}" alt="Property Image">
                                            </div>
                                        @endforeach

                                    </div>

                                    <div class="swiper-pagination"></div>
                                </div>


                                <div style="background-image: url(assets/img/bg/tm_bg.png); background-size: cover;"
                                    class="blog__item-property-two">
                                    <div class="blog__item-property-two-box">
                                        <h1 class="blog__item-property-two-title">{{ $holiday->property_type }}</h1>
                                        <p>Premium</p>
                                    </div>
                                    <div class="blog__item-property-two-box-two">
                                        <div class="blog__item-property-two-box-one">
                                            <p class="box-two-p-one">
                                                {{ $holiday->price }} AED
                                            </p>
                                            <p class="box-two-p-two">
                                                {{ $holiday->rental_period }}
                                            </p>
                                        </div>
                                        <div class="blog__item-property-two-img">
                                            <img src="assets/img/property/state-logo.jpeg" alt="logo">
                                        </div>
                                    </div>

                                    <div class="blog__item-property-two-box-three">
                                        <p>{{ $holiday->title_en }}</p>
                                    </div>

                                    <div class="location-property-two-box-three">
                                        <img src="assets/img/property/green-location.png" alt="location">
                                        <p>{{ $holiday->sub_community }}, {{ $holiday->community }}, {{ $holiday->city }}
                                        </p>
                                    </div>

                                    <div class="property-two-box-four">
                                        @if (!empty($holiday->bedroom))
                                            <img class="img-four" src="{{ asset('assets/img/property/green-bed.png') }}"
                                                alt="bed">
                                            <p>{{ $holiday->bedroom }}</p>
                                            <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                        @endif

                                        @if (!empty($holiday->bathroom))
                                            <img class="img-four" src="{{ asset('assets/img/property/green-bath.png') }}"
                                                alt="bath">
                                            <p>{{ $holiday->bathroom }}</p>
                                            <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                        @endif

                                        @if (!empty($holiday->size))
                                            <img class="img-four" src="{{ asset('assets/img/property/green-size.png') }}"
                                                alt="size">
                                            <p>{{ $holiday->size }} sqft</p>
                                        @endif
                                    </div>


                                    <div class="property-two-box-five">
                                        <div class="property-two-box-five-one">
                                            <div class="property-two-box-five-one-img">
                                                <img src="{{ $holiday->agent_photo ?? asset('assets/img/property/avatar-placeholder.png') }}"
                                                    alt="person">
                                            </div>
                                            <div class="property-two-box-five-one-name">
                                                <p>{{ $holiday->agent_name ?? 'Agent Name' }}</p>
                                                <h4>Real Estate Agent</h4>
                                            </div>
                                        </div>
                                        <div class="property-two-box-five-two">
                                            @if (!empty($holiday->agent_phone))
                                                <a href="tel:{{ $holiday->agent_phone }}">
                                                    <img src="{{ asset('assets/img/property/dark-call.png') }}"
                                                        alt="Call">
                                                    <span>Call</span>
                                                </a>
                                            @endif

                                            @if (!empty($holiday->agent_email))
                                                <a href="mailto:{{ $holiday->agent_email }}">
                                                    <img src="{{ asset('assets/img/property/dark-mail.png') }}"
                                                        alt="Email">
                                                    <span>Email</span>
                                                </a>
                                            @endif

                                            @if (!empty($holiday->agent_phone))
                                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $holiday->agent_phone) }}"
                                                    target="_blank">
                                                    <img src="{{ asset('assets/img/property/dark-WhatsApp.png') }}"
                                                        alt="WhatsApp">
                                                    <span>WhatsApp</span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </article>
                        </div>
                    @endforeach

                    {{-- end card   --}}
                    {{ $holidayProperties->links() }}








                    {{-- card   --}}


                </div>
                <div class="col-lg-3 mt-30">
                    <div class="sidebar-area mt-none-30">

                        <div class="widget  widget-one mt-30">
                            <h3 class="widget__title">Nearby Areas</h3>
                            <ul class="widget__category list-unstyled">
                                {{-- @foreach ($emirates as $emirate)
                                    <li>
                                        <a href="javascript:void(0);" onclick="window.location.href='{{ route('properties.index', ['filter_type' => 'sale', 'emirate' => $emirate]) }}'">
                                            Properties for sale in {{ $emirate }}
                                        </a>
                                    </li>
                                @endforeach --}}
                            </ul>
                            <h3 class="widget__title">Popular Searches</h3>
                            <ul class="widget__category list-unstyled">
                                {{-- @foreach (collect($recentSearches['unit_type'])->unique('name') as $recent)
                                    <li>
                                        <a href="javascript:void(0);"
                                         onclick="window.location.href='{{ route('properties.index', ['filter_type' =>  $recent['ad_type'] , 'search' => $recent['name']]) }}'"
                                        >
                                            {{ $recent['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                                @foreach ($recentSearches['community'] as $recent)
                                    <li>
                                        <a href="javascript:void(0);"
                                        onclick="window.location.href='{{ route('properties.index', ['filter_type' =>  $recent['ad_type'] , 'search' => $recent['name']]) }}'"
                                        >
                                            {{ $recent['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                                @foreach ($recentSearches['property_title'] as $recent)
                                    <li>
                                        <a 
                                          onclick="window.location.href='{{ route('properties.index', ['filter_type' =>  $recent['ad_type'] , 'search' => $recent['title']]) }}'"
                                        href="javascript:void(0);">
                                            {{ $recent['title'] }}
                                        </a>
                                    </li>
                                @endforeach --}}
                            </ul>


                        </div>



                        <div style="padding: 0;" class="widget widget-two mt-30">

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



                        <div style="padding: 0;" class="widget widget-three mt-30">
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
            display: flex;
            border-radius: 50% 0 0 50%;
            justify-content: center;
            align-items: center;
            height: 43px;
            padding: 10px 8px;
            align-content: center;
        }


        .widget__title {
            text-align: start;
        }

        .section-bg-agent {
            background-position: center bottom;
            background-size: cover;
            position: relative;
        }
        .section-bg-agent-bottom-img {
            background-position: center 73%;
            background-size: cover;
            position: absolute;
    width: 100%;
    bottom: 0;
    right: 0;
    left: 0;
    text-align: center;
height: 44px;
box-shadow: 0px 7px 16px 0px #00000040;
display: flex
;
    align-items: center;
    justify-content: center;
        }

        .section-bg-agent-bottom-img p{
            font-family: "Manrope", sans-serif;
font-weight: 700;
font-size: 16px;
line-height: 24px;
letter-spacing: 0%;
vertical-align: middle;
color: #2DD98F;


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
                display: flex;
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
