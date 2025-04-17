@extends('layouts.front-office.app')
@section('content')
    {{-- {{ $property }} --}}
    <section class="blog pt-50 pb-50">
        <x-property-filter-two :propertyTypes="$propertyTypes" :priceRange="$priceRange" :noOfRooms="$noOfRooms" :noOfBathrooms="$noOfBathrooms" />
    </section>
    {{-- {{ $property }} --}}
    <div style="background: #0B0F28;
            padding: 1px 0;
            ">
        <div class="container">
            <div onclick="window.location.href='/properties'" class="page-path-line">
                <img src="{{ asset('assets/img/propertydetails/arrow-left.png') }}" alt="home">
                <p>Home</p>
                <p>/ Property Listing</p>
                @php
                $propertyTypeMap = [
                    'AP' => 'Apartment',
                    'VH' => 'Villa',
                    'OF' => 'Office',
                    'ST' => 'Studio',
                    // Add more as needed
                ];
            
                $propertyTypeLabel = $propertyTypeMap[$holidayProperty->property_type] ?? $holidayProperty->property_type;
            @endphp
            
            <p class="active-path-line">/ {{ $propertyTypeLabel }}</p>
            
            </div>
            <div class="grid-img-container">
                <div class="grid-container">
                    <div class="main-image">
                        {{-- Show One Main Image --}}
                        @if ($holidayProperty->holidayPhotos->isNotEmpty())
                            <img class="main-image-img" alt="Property Image"
                                src="{{ $holidayProperty->holidayPhotos->first()->url }}">
                        @endif

                        <div class="floor-plan-div">
                            <img src="{{ asset('assets/img/propertydetails/floor-plan.png') }}" alt="floor-plan">
                            <p>Floor Plan</p>
                        </div>
                    </div>

                    {{-- Small Images --}}
                    <div class="small-images">
                        @foreach ($holidayProperty->holidayPhotos->take(3) as $image)
                            <img class="small-images-img" src="{{ $image->url }}" alt="home">
                        @endforeach

                        {{-- See More Button --}}
                        <div class="small-images-see-more" onclick="openSwiperPopup()">
                            See More
                        </div>
                    </div>
                </div>
                <div class="properties-swiper-mobile swiper">
                    <div class="swiper-wrapper">
                        {{-- Main Image --}}
                        @if ($holidayProperty->holidayPhotos->isNotEmpty())
                            <div class="swiper-slide">
                                <img class="main-image-img" alt="Property Image"
                                    src="{{ Str::startsWith($holidayProperty->holidayPhotos->first()->url, 'http')
                                        ? $holidayProperty->holidayPhotos->first()->url
                                        : asset('storage/' . $holidayProperty->holidayPhotos->first()->url) }}">
                            </div>
                        @endif

                        {{-- Small Images --}}
                        @foreach ($holidayProperty->holidayPhotos->take(3) as $image)
                            <div class="swiper-slide">
                                <img class="small-images-img"
                                    src="{{ Str::startsWith($image->url, 'http') ? $image->url : asset('storage/' . $image->url) }}"
                                    alt="home">
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination & Navigation -->
                    <div class="swiper-pagination"></div>
                    {{-- <div class="swiper-button-prev"></div> --}}
                    {{-- <div class="swiper-button-next"></div> --}}
                </div>
                {{-- Swiper Popup Modal --}}
                <div id="imagePopup" class="image-popup">
                    <span class="close-btn" onclick="closeSwiperPopup()">&times;</span>
                    <div class="popup-content">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($holidayProperty->holidayPhotos as $photo)
                                    <div class="swiper-slide">
                                        <img src="{{ Str::startsWith($photo->url, 'http') ? $photo->url : asset('storage/' . $photo->url) }}"
                                            alt="Property Image">
                                    </div>
                                @endforeach
                            </div>
                            <!-- Swiper navigation -->
                            <div class="swiper-button-next swiper-button-next-property"></div>
                            <div class="swiper-button-prev swiper-button-prev-property"></div>
                        </div>
                    </div>

                    <div class="slide-count">
                        <span id="current-slide">1</span> /
                        <span id="total-slides">{{ count($holidayProperty->holidayPhotos) }}</span>
                    </div>

                    <div class="popup-small-img">
                        @foreach ($holidayProperty->holidayPhotos as $photo)
                            <img src="{{ Str::startsWith($photo->url, 'http') ? $photo->url : asset('storage/' . $photo->url) }}"
                                alt="Property Image" class="thumbnail-img">
                        @endforeach
                    </div>
                </div>
                <div class="grid-left-side">
                    <div class="grid-left-side-fisrt-dev hide-mobile">
                        <p>{{ $holidayProperty->offering_type }}</p>
                    </div>
                    <h3 class="grid-left-side-one hide-mobile">{{ $holidayProperty->title_en }}</h3>
                    @php
                    $propertyTypeMap = [
                        'AP' => 'Apartment',
                        'VH' => 'Villa',
                        'OF' => 'Office',
                        'ST' => 'Studio',
                        // Add more as needed
                    ];
                
                    $propertyTypeLabel = $propertyTypeMap[$holidayProperty->property_type] ?? $holidayProperty->property_type;
                @endphp
                
                <h3 class="grid-left-side-two hide-mobile">{{ $propertyTypeLabel }} | {{ $holidayProperty->furnished == 1 ? 'Furnished' : 'Unfurnished' }}
                </h3>
                
                    <h3 class="grid-left-side-three">
                        {!! nl2br(e($holidayProperty->description_en)) !!}
                    </h3>
                    <h3 class="grid-left-side-one show-mobile">{{ $holidayProperty->title_en }}</h3>
                    <h3 class="grid-left-side-two show-mobile">{{ $holidayProperty->property_type }} | Furnished</h3>
                
                    <div class="grid-left-side-fisrt-dev show-mobile">
                        <p>{{ $holidayProperty->offering_type }}</p>
                    </div>
                    <div class="grid-left-side-price-box">
                        <div class=" grid-left-side-price">
                            <img src="{{ asset('assets/img/propertydetails/USDT.png') }}" alt="USDT">
                            <div class="grid-left-side-price-div">
                                @php
                                if (!function_exists('formatNumber')) {
                                    function formatNumber($num) {
                                        if ($num >= 1000000000) {
                                            return number_format($num / 1000000000, 2) . 'B';
                                        } elseif ($num >= 1000000) {
                                            return number_format($num / 1000000, 2) . 'M';
                                        } elseif ($num >= 1000) {
                                            return number_format($num / 1000, 2) . 'K';
                                        }
                                        return number_format($num, 2);
                                    }
                                }
                                @endphp
                
                                <p class="grid-left-side-price-div-two">
                                    {{ $holidayProperty->price_on_application ? 'Price on Application' : formatNumber($holidayProperty->price) }}<span>AED</span>
                                </p>
                            </div>
                            <h4 class="grid-left-side-price-div-four">
                                {{ $holidayProperty->rental_period === 'M' ? '/Month' : '' }}
                            </h4>
                        </div>
                
                        <div class="grid-left-side-price-two">
                            @php $segments = []; @endphp
                
                            @if ($holidayProperty->bedroom)
                                @php $segments[] = '
                                    <div class="grid-left-side-price-two-one">
                                        <img class="img-four" src="' . asset("assets/img/property/green-bed.png") . '" alt="bed">
                                        <p>' . $holidayProperty->bedroom . ' Bedroom</p>
                                    </div>'; @endphp
                            @endif
                
                            @if ($holidayProperty->bathroom)
                                @php $segments[] = '
                                    <div class="grid-left-side-price-two-one">
                                        <img class="img-four" src="' . asset("assets/img/property/green-bath.png") . '" alt="bath">
                                        <p>' . $holidayProperty->bathroom . ' Bathroom</p>
                                    </div>'; @endphp
                            @endif
                
                            @if ($holidayProperty->size)
                                @php $segments[] = '
                                    <div class="grid-left-side-price-two-one">
                                        <img class="img-four" src="' . asset("assets/img/property/green-size.png") . '" alt="size">
                                        <p>' . number_format($holidayProperty->size, 2) . ' sq. ft.</p>
                                    </div>'; @endphp
                            @endif
                
                            @foreach ($segments as $index => $segment)
                                {!! $segment !!}
                                @if ($index < count($segments) - 1)
                                    <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                @endif
                            @endforeach
                        </div>
                    </div>
                
                    <div class="Converter-div-box hide-mobile">
                        <div style="width: 35%;" class="Converter-div-input">
                            <div style="width: 100%;" class="Converter-select-input">
                                <select style="width: 100%;" name="crypto" id="crypto">
                                    <option value="Bitcoin">Bitcoin <span class="Converter-select-span">BTC</span></option>
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
                                <img src="{{ $holidayProperty->agent_photo }}" alt="person">
                            </div>
                            <div class="property-two-box-five-one-name">
                                <p>{{ $holidayProperty->agent_name }}</p>
                                <h4>Real Estate Agent</h4>
                            </div>
                        </div>


                        <div class="property-two-box-five-two" 
                                            
                  @auth
                  data-user-id="{{ auth()->user()->id }}"
                  data-property-id="{{ $holidayProperty->id }}"
                  data-property-ref="{{ $holidayProperty->reference_number }}"
                  data-url="{{ url()->current() }}"  
                  data-property-type="holiday"
                  @endauth
                        >

                        <!-- Phone Call -->
                        <a href="tel:{{ $holidayProperty->listing_agent_phone }}" class="contact-btn"
                            data-method="Call">
                            <img src="{{ asset('assets/img/property/dark-call.png') }}"
                                alt="Call">
                            <span>Call</span>
                        </a>

                        <!-- Email -->
                        <a href="mailto:{{ $holidayProperty->listing_agent_email }}" class="contact-btn"
                            data-method="Email">
                            <img src="{{ asset('assets/img/property/dark-mail.png') }}"
                                alt="Email">
                            <span>Email</span>
                        </a>

                        <!-- WhatsApp -->
                        <a href="https://wa.me/{{ $holidayProperty->listing_agent_whatsapp }}"
                            class="contact-btn" data-method="WhatsApp" target="_blank">
                            <img src="{{ asset('assets/img/property/dark-WhatsApp.png') }}"
                                alt="WhatsApp">
                            <span>WhatsApp</span>
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
                        {!! nl2br(e($holidayProperty->description_en)) !!}
                        <div class="custom-list-two">
                            <p><span>Office location :</span> ELITE Vacation Homes LLC - {{ $holidayProperty->sub_community }},
                                {{ $holidayProperty->city }}</p>
                            <p><span>Tel No :</span> +971 4 770 1087</p>
                            <p><span>RERA No :</span> 25831</p>
                        </div>
            
                        <p>This property is managed by ELITE Vacation Homes LLC.</p>
                    </div>
            
                    <div class="Description-second-box-two">
                        <p>Property details</p>
                        <div class="Description-second-box-two-one">
                            <div class="Description-second-box-two-box-one">
                                <div class="property-details-Description-two">
                                    <p>
                                        <img src="{{ asset('assets/img/propertydetails/Component3.png') }}"
                                            alt="Property">
                                        Property
                                    </p>
                                    @php
                                    $propertyTypeMap = [
                                        'AP' => 'Apartment',
                                        'VH' => 'Villa',
                                        'OF' => 'Office',
                                        'ST' => 'Studio',
                                        // Add more as needed
                                    ];
                                
                                    $propertyTypeLabel = $propertyTypeMap[$holidayProperty->property_type] ?? $holidayProperty->property_type;
                                @endphp
                                
                                <span>{{ $propertyTypeLabel }}</span>
                                
                                </div>
            
                                <div class="property-details-Description-two">
                                    <p>
                                        <img src="{{ asset('assets/img/propertydetails/Component2.png') }}"
                                            alt="Bedrooms">
                                        Bedrooms
                                    </p>
                                    <span>{{ $holidayProperty->bedroom ?? 'N/A' }}</span>
                                </div>
            
                                <div class="property-details-Description-two">
                                    <p>
                                        <img src="{{ asset('assets/img/propertydetails/Component1.png') }}"
                                            alt="Furnished">
                                        Furnished
                                    </p>
                                    <span>{{ $holidayProperty->furnished ? 'Yes' : 'No' }}</span>
                                </div>
                            </div>
            
                            <div class="Description-second-box-two-box-one">
                                <div class="property-details-Description-two">
                                    <p>
                                        <img src="{{ asset('assets/img/propertydetails/Component3.png') }}"
                                            alt="Property Size">
                                        Property Size
                                    </p>
                                    <span>{{ number_format($holidayProperty->size, 0) }} sqft</span>
                                </div>
            
                                <div class="property-details-Description-two">
                                    <p>
                                        <img src="{{ asset('assets/img/propertydetails/Component2.png') }}"
                                            alt="Bathrooms">
                                        Bathrooms
                                    </p>
                                    <span>{{ $holidayProperty->bathroom ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
            
                        <p class="Amenities-p-tag">Amenities</p>
                        <div class="Description-second-box-two-one">
                            @php
                                $amenityMap = [
                                    'BA' => ['Balcony', 'Component4.png'],
                                    'AN' => ['Annex', 'Component5.png'],
                                    'BW' => ['Built in Wardrobes', 'Component12.png'],
                                    'AC' => ['Central A/C', 'Component9.png'],
                                    'FF' => ['Fully Furnished', 'Component6.png'],
                                    'BK' => ['Built-in Kitchen Appliances', 'Component8.png'],
                                    'MB' => ['Maid Room', 'Component3.png'],
                                    'SP' => ['Shared Pool', 'Component10.png'],
                                    'SE' => ['Security', 'Component6.png'],
                                    'MT' => ['Maintenance Staff', 'Component11.png'],
                                    'SM' => ['Smart Home Technology', 'Component7.png'],
                                    'RT' => ['Retail in Building', 'Component11.png'],
                                    'CS' => ['Concierge', 'Component11.png'],
                                    'SY' => ['Study', 'Component5.png'],
                                ];
                                $amenityCodes = explode(',', str_replace(' ', '', $holidayProperty->amenities));
                                $filteredAmenities = array_filter($amenityMap, fn($v, $k) => in_array($k, $amenityCodes), ARRAY_FILTER_USE_BOTH);
                                $splitIndex = ceil(count($filteredAmenities) / 2);
                                $firstHalf = array_slice($filteredAmenities, 0, $splitIndex, true);
                                $secondHalf = array_slice($filteredAmenities, $splitIndex, null, true);
                            @endphp
            
                            <div class="Description-second-box-two-box-one">
                                @foreach ($firstHalf as [$name, $icon])
                                    <div class="property-details-Description-two">
                                        <p>
                                            <img src="{{ asset('assets/img/propertydetails/' . $icon) }}"
                                                alt="{{ $name }}">
                                            {{ $name }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
            
                            <div class="Description-second-box-two-box-one">
                                @foreach ($secondHalf as [$name, $icon])
                                    <div class="property-details-Description-two">
                                        <p>
                                            <img src="{{ asset('assets/img/propertydetails/' . $icon) }}"
                                                alt="{{ $name }}">
                                            {{ $name }}
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
                        {{-- <img src="{{ asset('assets/img/propertydetails/Floor-Plan-bg.png') }}" alt="floor-plan"> --}}
                        {{-- <img src="{{asset('storage/' . $property->floor_plan ) }}" alt="floor-plan"> --}}
                    </div>
        
                    <div class="Floor-Plan-div-two">
               
                        <div class="video-container">
                       
                            <video id="propertyVideo" src="{{ asset('assets/img/propertydetails/example.mp4') }}" controls alt="floor-plan"></video>
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
                                    {{-- <h3>83338.37
                                        <span>USDT /month</span>
                                    </h3>
                                    <h4>
                                        59, 383 AED
                                    </h4>
                                    <h4>Fixed rates from: <span>3.75%</span></h4> --}}
                                </div>
                                <div class="Floor-Plan-div-three-line"></div>
                                <div class="Floor-Plan-div-three-box-two">
                                    <p>
                                        In partnership with
                                    </p>
                                    {{-- <img src="{{ asset($property->company_logo) }}" alt="logo">
                                    <a class="pre-approved" href="{{$property->preview_link}}">Get pre-approved</a> --}}
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
                        <div id="map" style="height: 100%; width: 100%;  border-radius: 5px;"></div>
                    </div>


                </div>
            </div>



            
        </div>
    </div>


    <div style="
            background-image: url(http://127.0.0.1:8000/assets/img/bg/team-bg.png);
            background-color: rgb(11, 15, 40);
            background-repeat: no-repeat;
            background-position: center -77%;
            background-size: cover;
        }
            "
        class="bg_img top-center pos-rel ">
        <div class="container">
            <div class="card-title">
                <h1>More available in the same area</h1>
            </div>
            <div class="row mt-none-30 justify-content-center">
                @foreach($holidayPropertiesSameArea as $property)
                <div class="col-lg-3 col-md-6 mt-30">
                    <div class="xb-event-card">
                        <div class="cards-property-img">
                            <img src="{{ asset('assets/img/event/event-img01.jpg') }}" alt="">
                        </div>
                        <div class="xb-item--cards-property">
                            <p class="">APARTMENT</p>
                            <p class="cards-property-title-two">{{ $property->price }} BTC</p>
                            <p class="cards-property-title-three">{{ $property->price / 10 }} ETH / month</p>
                            <p class="cards-property-title-four">{{ $property->price }} AED / month</p>
                            <p class="cards-property-title-five">{{ $property->property_name }}</p>
                            <p class="cards-property-title-five">{{ $property->community }}, {{ $property->city }}</p>
                            <div class="grid-left-side-price-two">
                                <div class="grid-left-side-price-two-card">
                                    <img class="img-card" src="{{ asset('assets/img/property/green-bed.png') }}" alt="bed">
                                    <p>{{ $property->bedroom }}</p>
                                </div>
                                <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                <div class="grid-left-side-price-two-card">
                                    <img class="img-card" src="{{ asset('assets/img/property/green-bath.png') }}" alt="bath">
                                    <p>{{ $property->bathroom }}</p>
                                </div>
                                <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                <div class="grid-left-side-price-two-card">
                                    <img class="img-card" src="{{ asset('assets/img/property/green-size.png') }}" alt="size">
                                    <p>{{ $property->size }} sq. ft.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
            </div>
        </div>


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



    <!-- Leaflet.js CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>

document.addEventListener("DOMContentLoaded", function() {
            var latitude = {{ $holidayProperty->latitude }};
            var longitude = {{ $holidayProperty->longitude }};

            var map = L.map('map').setView([latitude, longitude], 15); // Zoom level 15

            // Load OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Add a marker at the location
            L.marker([latitude, longitude]).addTo(map)
                .bindPopup("Property Location")
                .openPopup();
        });

        document.addEventListener("DOMContentLoaded", function() {
            const video = document.getElementById("propertyVideo");
            const playButton = document.getElementById("playButton");

            playButton.addEventListener("click", function() {
                video.play();
                playButton.style.display = "none";
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var swiper;

            window.openSwiperPopup = function() {
                document.getElementById("imagePopup").style.display = "flex";

                if (!swiper) {
                    swiper = new Swiper(".mySwiper", {
                        loop: true,
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                        autoplay: {
                            delay: 3000,
                        },
                        on: {
                            slideChange: function() {
                                document.getElementById("current-slide").textContent = this
                                    .realIndex + 1;
                                updateActiveThumbnail(this.realIndex);
                            },
                        },
                    });
                }
                updateActiveThumbnail(swiper.realIndex); // Ensure correct initial border
            };

            window.closeSwiperPopup = function() {
                document.getElementById("imagePopup").style.display = "none";
            };

            function updateActiveThumbnail(activeIndex) {
                const thumbnails = document.querySelectorAll(".popup-small-img img");

                thumbnails.forEach((thumb, index) => {
                    if (index === activeIndex) {
                        thumb.classList.add("active-thumbnail");
                    } else {
                        thumb.classList.remove("active-thumbnail");
                    }
                });
            }
        });


        document.addEventListener("DOMContentLoaded", function() {
            const scrollContainer = document.querySelector(".popup-small-img");

            let isHolding = false;
            let speed = 5; // Adjust scrolling speed

            // Function to scroll while holding
            function scrollLeft() {
                if (isHolding) {
                    scrollContainer.scrollLeft -= speed;
                    requestAnimationFrame(scrollLeft);
                }
            }

            function scrollRight() {
                if (isHolding) {
                    scrollContainer.scrollLeft += speed;
                    requestAnimationFrame(scrollRight);
                }
            }

            scrollContainer.addEventListener("mousedown", (e) => {
                isHolding = true;
                if (e.clientX < window.innerWidth / 2) {
                    scrollLeft();
                } else {
                    scrollRight();
                }
            });

            scrollContainer.addEventListener("mouseup", () => {
                isHolding = false;
            });

            scrollContainer.addEventListener("mouseleave", () => {
                isHolding = false; // Stop scrolling when leaving the container
            });
        });




        document.addEventListener("DOMContentLoaded", function() {

            let container = document.querySelector(".Description-second-box-one");

            if (container) {

                container.querySelectorAll("p").forEach(p => p.remove());
            }
        });
    </script>

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



        @media (max-width: 986px) {

            .page-path-line {
                display: none;
            }
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
