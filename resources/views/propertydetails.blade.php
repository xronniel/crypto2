@extends('layouts.front-office.app')
@section('content')
    {{-- {{ $property }} --}}
    <section style="background: #080B18;" class="blog blog-padding">
        <x-property-filter :propertyTypes="$propertyTypes" :plotAreaRange="$plotAreaRange" :priceRange="$priceRange" :amenities="$amenities" />
    </section>
    {{-- {{ $property }} --}}

    <div style="background: #0B0F28;
            padding: 1px 0;
            ">
        <div class="container">
            <div onclick="window.location.href='/properties'" class="page-path-line pt-50">
                <img src="{{ asset('assets/img/propertydetails/arrow-left.png') }}" alt="home">
                <p>Home</p>
                <p>/ Property Listing</p>
                <p class="active-path-line">/ Bespoke Upgrades | Extended | Vacant</p>
            </div>

            <div class="grid-img-container">


                <div class="grid-container">
                    <div class="main-image">
                        <div class="budge-three-div">

                            <!-- If Verified -->
                            @if ($property->verified == 1)
                                <p>
                                    <img class="" src="assets/img/property/Verified-img.png" alt="location">
                                    Verified
                                </p>
                            @endif

                            <!-- If SuperAgent -->
                            @if ($property->superagent == 1)
                                <p>
                                    <img class="" src="assets/img/property/SuperAgent-img.png" alt="location">
                                    SuperAgent
                                </p>
                            @endif



                        </div>

                        {{-- Show One Main Image --}}
                        @if ($property->images->isNotEmpty())
                            <img class="main-image-img" alt="Property Image"
                                src="{{ $property->xml ? $property->images->first()->url : asset('storage/' . $property->images->first()->url) }}">
                        @endif

                        <div class="floor-plan-div">
                            <img src="{{ asset('assets/img/propertydetails/floor-plan.png') }}" alt="floor-plan">
                            <p>Floor Plan</p>
                        </div>
                    </div>

                    {{-- Small Images --}}
                    <div class="small-images">
                        @foreach ($property->images->take(3) as $image)
                            <img class="small-images-img"
                                src="{{ $property->xml ? $image->url : asset('storage/' . $image->url) }}" alt="home">
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
                        @if ($property->images->isNotEmpty())
                            <div class="swiper-slide">
                                <img class="main-image-img" alt="Property Image"
                                    src="{{ $property->xml ? $property->images->first()->url : asset('storage/' . $property->images->first()->url) }}">
                            </div>
                        @endif

                        {{-- Small Images --}}
                        @foreach ($property->images->take(3) as $image)
                            <div class="swiper-slide">
                                <img class="small-images-img"
                                    src="{{ $property->xml ? $image->url : asset('storage/' . $image->url) }}"
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
                                @foreach ($property->images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ $property->xml ? $image->url : asset('storage/' . $image->url) }}"
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
                        <span id="current-slide">1</span> / <span id="total-slides">{{ count($property->images) }}</span>
                    </div>
                    <div class="popup-small-img">
                        @foreach ($property->images as $image)
                            <img src="{{ $property->xml ? $image->url : asset('storage/' . $image->url) }}"
                                alt="Property Image" class="thumbnail-img">
                        @endforeach
                    </div>

                </div>

                <div class="grid-left-side">

                    <div class="grid-left-side-one">
                        <div class="grid-left-side-fisrt-dev hide-mobile">
                            <p>{{ $property->ad_type }}</p>
                            {{-- <p>6% OFF</p> --}}
                        </div>
                        <h3 class="grid-left-side-one hide-mobile">{{ $property->property_title }}</h3>
                        <h3 class="grid-left-side-two hide-mobile">{{ $property->unit_type }} | {{ $property->fitted }}</h3>
                        <h3 class="grid-left-side-three">
                            @php
                                $html = $property->web_remarks;
    
                                $dom = new DOMDocument();
                                libxml_use_internal_errors(true); // Suppress HTML5 warnings
                                $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
    
                                $pTags = $dom->getElementsByTagName('p');
                                $output = '';
    
                                foreach ($pTags as $p) {
                                    // Remove <strong> and <br> tags
                                    foreach (iterator_to_array($p->getElementsByTagName('*')) as $node) {
                                        if ($node->nodeName === 'strong' || $node->nodeName === 'br') {
                                            // Replace node with its text content or nothing
                                            $text = $node->textContent;
                                            $textNode = $dom->createTextNode($text);
                                            $node->parentNode->replaceChild($textNode, $node);
                                        }
                                    }
    
                                    // Save final <p> tag with cleaned content
                                    $output .= $dom->saveHTML($p);
                                }
                            @endphp
    
                            {!! $output !!}
    
                        </h3>
                    </div>

                    <div class="grid-left-side-one">
                        <h3 class="grid-left-side-one show-mobile">{{ $property->property_title }}</h3>
                        <h3 class="grid-left-side-two show-mobile">{{ $property->unit_type }} | {{ $property->fitted }}</h3>
    
                        <div class="grid-left-side-fisrt-dev show-mobile">
                            <p>{{ $property->ad_type }}</p>
                            {{-- <p>6% OFF</p> --}}
                        </div>
                        <div class="grid-left-side-price-box">
                            <div class=" grid-left-side-price">
                                <img src="{{ asset('assets/img/propertydetails/USDT.png') }}" alt="USDT">
                                <div class="grid-left-side-price-div">
                                    {{-- <p class="grid-left-side-price-div-one">830.22 XRP</p> --}}
                                    @php
                                        if (!function_exists('formatNumber')) {
                                            function formatNumber($num)
                                            {
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
                                        {{ $property->getConvertedPrice()['converted_price'] }}<span>{{ $property->getConvertedPrice()['currency_code'] }}</span></p>
                                </div>
                                <h4 class="grid-left-side-price-div-four">/Month</h4>
                            </div>
    
                            <div class="grid-left-side-price-two">
                                @php
                                    // Build an array of available segments.
                                    $segments = [];
                                @endphp
    
                                @if (isset($property->bedrooms) && $property->bedrooms > 0)
                                    @php
                                        $segments[] =
                                            '
                                            <div class="grid-left-side-price-two-one">
                                                <img class="img-four" src="' .
                                            asset('assets/img/property/green-bed.png') .
                                            '" alt="bed">
                                                <p>' .
                                            $property->bedrooms .
                                            ' Bedroom</p>
                                            </div>';
                                    @endphp
                                @endif
    
                                @if (isset($property->no_of_bathroom) && $property->no_of_bathroom > 0)
                                    @php
                                        $segments[] =
                                            '
                                            <div class="grid-left-side-price-two-one">
                                                <img class="img-four" src="' .
                                            asset('assets/img/property/green-bath.png') .
                                            '" alt="bath">
                                                <p>' .
                                            $property->no_of_bathroom .
                                            ' Bathroom</p>
                                            </div>';
                                    @endphp
                                @endif
    
                                @if (isset($property->unit_builtup_area) && $property->unit_builtup_area > 0)
                                    @php
                                        $segments[] =
                                            '
                                            <div class="grid-left-side-price-two-one">
                                                <img class="img-four" src="' .
                                            asset('assets/img/property/green-size.png') .
                                            '" alt="size">
                                                <p>' .
                                            number_format($property->unit_builtup_area, 2) .
                                            ' sq. ft.</p>
                                            </div>';
                                    @endphp
                                @endif
    
                                {{-- Loop through segments and insert pipeline image in-between --}}
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
                                    <select style="width: 100%;" name="cars" id="cars">
                                        <option value="Bitcoin">
                                            Bitcoin
                                            <span class="Converter-select-span">BTC</span>
                                        </option>
                                    </select>
                                    <img class="Converter-img-select" src="{{ asset('assets/img/home/frame-7.svg.png') }}"
                                        alt="">
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
                                    <img src="{{ asset($property->listing_agent_photo) }}" alt="person">
                                </div>
                                <div class="property-two-box-five-one-name">
                                    <p>{{ $property->listing_agent }}</p>
                                    <h4>Real Estate Agent</h4>
                                </div>
                            </div>
                            <div class="property-two-box-five-two"
                                @auth
    data-user-id="{{ auth()->user()->id }}"
                       data-property-id="{{ $property->id }}"
                       data-property-ref="{{ $property->property_ref_no }}"
                       data-url="{{ url()->current() }}" @endauth>
    
                                <!-- Phone Call -->
                                <a href="tel:{{ $property->listing_agent_phone }}" class="contact-btn" data-method="Call">
                                    <img src="{{ asset('assets/img/property/dark-call.png') }}" alt="Call">
                                    <span>Call</span>
                                </a>
    
                                <!-- Email -->
                                <a href="mailto:{{ $property->listing_agent_email }}" class="contact-btn"
                                    data-method="Email">
                                    <img src="{{ asset('assets/img/property/dark-mail.png') }}" alt="Email">
                                    <span>Email</span>
                                </a>
    
                                <!-- WhatsApp -->
                                <a href="https://wa.me/{{ $property->listing_agent_whatsapp }}" class="contact-btn"
                                    data-method="WhatsApp" target="_blank">
                                    <img src="{{ asset('assets/img/property/dark-WhatsApp.png') }}" alt="WhatsApp">
                                    <span>WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @if ($property->off_plan)
                <div class="download-grid">
                    @if ($property->brochure)
                        <a href="{{ asset('storage/' . $property->brochure) }}" class="download-btn" download
                            target="_blank">
                            Download Brochure
                        </a>
                    @endif

                    @if ($property->floor_plan)
                        <a href="{{ asset('storage/' . $property->floor_plan) }}" class="download-btn" download
                            target="_blank">
                            Download Floor Plan
                        </a>
                    @endif

                    @if ($property->payment_plan)
                        <a href="{{ asset('storage/' . $property->payment_plan) }}" class="download-btn" download
                            target="_blank">
                            Download Payment Plan
                        </a>
                    @endif

                    @if ($property->fact_sheet)
                        <a href="{{ asset('storage/' . $property->fact_sheet) }}" class="download-btn" download
                            target="_blank">
                            Download Fact Sheet
                        </a>
                    @endif
                </div>
            @endif
            @if ($property->off_plan)
                <div class="Description-big-box">
                    <div class="property-details-Description">
                        <span class="active-filter-link">Key Information</span>
                    </div>

                    <div class="Description-second-box">
                        <div class="description-grid">
                            @foreach ($offPlanKeys as $item)
                                <div class="description-item">
                                    <p class="label">{{ $item['key'] }}</p>
                                    <p class="value">
                                        @if ($item['key'] === 'Starting Price')
                                            <span class="highlight">{{ explode('|', $item['value'])[0] }}</span> |
                                            {{ explode('|', $item['value'])[1] }}
                                        @else
                                            {{ $item['value'] }}
                                        @endif
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            @if ($property->off_plan)
                <div class="Description-big-box">
                    <div class="property-details-Description">
                        <span class="active-filter-link">Payment Plans</span>
                    </div>

                    <div class="Description-second-box">
                        @foreach ($paymentPlanCards as $index => $card)
                            <div class="payment-card">
                                <div class="plan-title">{{ $card['payment_plan_name'] }}</div>
                                <div class="plan-percent">{{ rtrim($card['percentage'], '.00') }}%</div>
                                <div class="plan-description">{{ $card['text'] }}</div>
                            </div>

                            @if (!$loop->last)
                                <img class="payment-img" src="{{ asset('assets/img/home/arrow.png') }}" alt="Arrow">
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
            @if ($property->off_plan)
                <div class="Description-big-box">
                    <div class="property-details-Description">
                        <span class="active-filter-link">Payment Plans</span>
                    </div>

                    <div class="Description-second-box">
                        <div class="timeline">
                            @foreach ($timelines as $index => $item)
                                <div class="timeline-item">
                                    <div class="timeline-icon-wrapper {{ $loop->last ? 'unchecked' : '' }}">
                                        <img src="{{ asset($loop->last ? 'assets/img/home/Unchecked.png' : 'assets/img/home/green-check.png') }}"
                                            alt="Status Icon" class="timeline-icon" />
                                    </div>

                                    <div class="timeline-text">
                                        <p class="timeline-title">{{ $item['title'] }}</p>
                                        <p class="timeline-date">
                                            {{ \Carbon\Carbon::parse($item['date'])->format('F j, Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            @endif
            @if ($property->off_plan)
                <div class="Description-big-box">
                    <div class="property-details-Description">
                        <span class="active-filter-link">Features</span>
                    </div>
                    <div class="Description-second-box-three">

                        <div class="custom-offplan-swiper-div">

                            <div class="swiper custom-offplan-swiper">
                                <div class="swiper-wrapper swiper-wrapper-offplan">
                                    @foreach (json_decode($property->offPlanImages, true) as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/' . $image['image']) }}" alt="Property Image">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="description">
                            <p>
                                {{ $property->feature_description }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif


            <div class="Description-big-box">
                <div class="property-details-Description">
                    <span class="active-filter-link">Description</span>
                </div>
                <div class="Description-second-box">
                    <div class="Description-second-box-one">
                        {!! $property->web_remarks !!}
                        <div class="custom-list-two">
                            <p><span>Office location :</span> {{ $property->company_name }} - {{ $property->community }},
                                {{ $property->emirate }}</p>
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
                                        <img src="{{ asset('assets/img/propertydetails/Component3.png') }}"
                                            alt="Property">
                                        Property
                                    </p>
                                    <span>{{ $property->unit_type }}</span>
                                </div>
                                <div class="property-details-Description-two">
                                    <p>
                                        <img src="{{ asset('assets/img/propertydetails/Component2.png') }}"
                                            alt="Bathrooms">
                                        Bathrooms
                                    </p>
                                    <span>{{ $property->bedrooms ?? 'N/A' }}</span>
                                </div>
                                <div class="property-details-Description-two">
                                    <p>
                                        <img src="{{ asset('assets/img/propertydetails/Component1.png') }}"
                                            alt="Available from">
                                        Available from
                                    </p>
                                    <span>Q2 2026</span>
                                </div>
                            </div>
                            <div class="Description-second-box-two-box-one">
                                <div class="property-details-Description-two">
                                    <p>
                                        <img src="{{ asset('assets/img/propertydetails/Component3.png') }}"
                                            alt="Property Size">
                                        Property Size
                                    </p>
                                    <span>{{ number_format($property->unit_builtup_area, 0) }}
                                        {{ $property->unit_measure }}</span>
                                </div>
                                <div class="property-details-Description-two">
                                    <p>
                                        <img src="{{ asset('assets/img/propertydetails/Component2.png') }}"
                                            alt="Price">
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
                                            <img src="{{ asset('assets/img/propertydetails/' . $icon) }}"
                                                alt="{{ $amenity }}">
                                            {{ $amenity }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>

                            <div class="Description-second-box-two-box-one">
                                @foreach ($secondHalf as $amenity => $icon)
                                    <div class="property-details-Description-two">
                                        <p>
                                            <img src="{{ asset('assets/img/propertydetails/' . $icon) }}"
                                                alt="{{ $amenity }}">
                                            {{ $amenity }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @if (!$property->off_plan)
                <div class="Description-big-box">
                    <div class="property-details-Description">
                        <span class="active-filter-link">Floor Plan</span>


                    </div>
                    <div class="Floor-Plan-div">
                        <div class="Floor-Plan-div-one">
                            {{-- <img src="{{ asset('assets/img/propertydetails/Floor-Plan-bg.png') }}" alt="floor-plan"> --}}
                            <img src="{{ asset('storage/' . $property->floor_plan) }}" alt="floor-plan">
                        </div>

                        <div class="Floor-Plan-div-two">

                            <div class="video-container">
                                @if ($property->web_tour)
                                    @php
                                        // Extract the video ID from a YouTube Shorts URL
                                        $videoId = Str::afterLast($property->web_tour, '/');
                                    @endphp

                                    <iframe width="100%" height="100%"
                                        src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                @else
                                    <video id="propertyVideo" src="{{ asset('assets/img/propertydetails/example.mp4') }}"
                                        controls alt="floor-plan"></video>
                                    <button id="playButton" class="play-button">
                                        <img src="{{ asset('assets/img/propertydetails/play-icon.png') }}"
                                            alt="floor-plan">
                                        Watch video tour</button>
                                @endif



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
                                        <img src="{{ asset($property->company_logo) }}" alt="logo">
                                        <a class="pre-approved" href="{{ $property->preview_link }}">Get pre-approved</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif





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
                @foreach ($propertiesSameArea->take(4) as $property)
                    <div class="col-lg-3 col-md-6 mt-30">
                        <div class="xb-event-card">
                            <div class="cards-property-img">
                                <img src="{{ $property->images[0]['url'] ?? asset('assets/img/event/event-img01.jpg') }}"
                                    alt="">
                            </div>
                            <div class="xb-item--cards-property">
                                <p class="">{{ strtoupper($property->unit_type ?? 'N/A') }}</p>
                                {{-- <p class="cards-property-title-two">{{ number_format($property->price / 155000) }} BTC</p> --}}
                                <p class="cards-property-title-three">{{ number_format($property->getConvertedPrice()['converted_price']) }} {{ $property->getConvertedPrice()['currency_code'] }} /
                                    month</p>
                                <p class="cards-property-title-four">{{ number_format($property->price, 0) }} AED</p>
                                <p class="cards-property-title-five">{{ $property->property_name }},
                                    {{ $property->community }}, {{ $property->emirate }}</p>

                                <div class="grid-left-side-price-two">
                                    <div class="grid-left-side-price-two-card">
                                        <img class="img-card" src="{{ asset('assets/img/property/green-bed.png') }}"
                                            alt="bed">
                                        <p>{{ $property->bedrooms }}</p>
                                    </div>
                                    <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                    <div class="grid-left-side-price-two-card">
                                        <img class="img-card" src="{{ asset('assets/img/property/green-bath.png') }}"
                                            alt="bath">
                                        <p>{{ $property->no_of_bathroom }}</p>
                                    </div>
                                    <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                    <div class="grid-left-side-price-two-card">
                                        <img class="img-card" src="{{ asset('assets/img/property/green-size.png') }}"
                                            alt="size">
                                        <p>{{ number_format($property->unit_builtup_area, 0) }} sq. ft.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>


        <!-- faq start -->
        <section style="padding:100px 0  126px 0;" class="faq ">
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
            var latitude = {{ $property->latitude }};
            var longitude = {{ $property->longitude }};

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

        .beds-baths-options button {
            flex: 1 1 calc(25% - 10px);
            min-width: 120px;
            padding: 10px;
            text-align: center;
            white-space: nowrap;
        }












        .payment-card {
            background-color: #1D2458;
            border: 1px solid #73737380;
            padding: 30px 20px;
            width: 220px;
            border-radius: 3px;
            text-align: center;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .plan-title {
            font-size: 18px;
            margin-bottom: 8px;

            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 20px;
            line-height: 16px;
            letter-spacing: 0%;
            text-align: center;
            vertical-align: middle;
            color: #ffffff80;
        }

        .plan-percent {
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 5px;

            font-family: "Manrope", sans-serif;
            font-weight: 700;
            font-size: 20px;
            line-height: 16px;
            letter-spacing: 0%;
            text-align: center;
            vertical-align: middle;
            color: #FFFFFF;

        }

        .plan-description {
            font-size: 14px;
            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 16px;
            letter-spacing: 0%;
            text-align: center;
            vertical-align: middle;
            color: #ffffff80;
        }

        .header-arrow-img {
            width: 24px;
            height: auto;
        }

        .payment-img {
            rotate: -90deg;
            filter: brightness(0) invert(1);
            width: 24px;
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

        .timeline {
            position: relative;
            width: 100%;
        }

        .timeline-item {
            display: flex;
            align-items: flex-start;
            position: relative;
            padding-bottom: 34px;
        }

        .timeline-icon-wrapper {
            position: relative;
            z-index: 1;
            width: 30px;
            height: 30px;
            flex-shrink: 0;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            top: 25px;
            left: 14.5px;
            width: 2px;
            height: 79%;
            background-color: #2DD98F;
            z-index: 0;
        }

        .timeline-item:last-child .timeline-icon-wrapper::before {
            display: none;
        }

        .timeline-icon {
            width: 100%;
            height: 100%;
            display: block;
        }

        .timeline-text {
            margin-left: 10px;
            color: white;
        }

        .timeline-title {
            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 20px;
            line-height: 24px;
            letter-spacing: 0%;
            vertical-align: middle;
            padding-bottom: 10px;
        }

        .timeline-date {
            font-family: "Manrope", sans-serif;
            font-weight: 700;
            font-size: 20px;
            line-height: 24px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #ffffff80;
        }

        .timeline-item:last-child::before {
            display: none;
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


        .description-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 30px;
        }

        .description-item .lable {
            font-family: "Manrope", sans-serif;
            font-weight: 500;
            font-size: 20px;
            line-height: 24px;
            letter-spacing: -0.5px;
            vertical-align: middle;
            color: #FFFFFF80;

        }

        .description-item .value {
            font-family: "Manrope", sans-serif;
            font-weight: 700;
            font-size: 20px;
            line-height: 24px;
            letter-spacing: -0.5px;
            vertical-align: middle;
            color: #FFFFFF;


        }

        .highlight {
            color: #2ed89b;
        }

        @media (min-width: 640px) {
            .description-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .description-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }



        .download-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
            width: fit-content;
            margin: 20px 0 0 0;
        }

        .download-btn {
            display: inline-block;
            border: 1px solid #FFFFFF33;
            color: white;
            text-decoration: none;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 400;
            line-height: 24px;
            font-family: "Manrope", sans-serif;
            width: fit-content;
            min-width: 221px;
            letter-spacing: 0;
            text-align: center;
            vertical-align: middle;
            border-radius: 4px;
            transition: background 0.3s ease;
        }

        .download-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        @media (min-width: 640px) {
            .download-grid {
                grid-template-columns: repeat(4, 1fr);
                margin: 45px 0 0 0;
            }
        }



        @media (max-width: 900px) {
            .description-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .download-grid {
                margin: 45px auto 0;
            }

            .payment-img {
                rotate: 0deg;
            }

            .description-item .value {

                font-weight: 700;
                font-size: 14px;
                line-height: 24px;
                letter-spacing: -0.5px;
                vertical-align: middle;



            }













        }



        .Description-second-box-three {
            display: flex;
            gap: 20px;
            width: 100%;
            align-items: flex-start;
            margin: 50px 0 0 0;
        }

        .container-Features {
            display: flex;
            align-items: stretch;
            justify-content: space-between;
            gap: 20px;
        }



        .custom-offplan-swiper-div {
            height: 400px;
            width: 50%;
            overflow: hidden;
        }

        .custom-offplan-swiper {
            /* width: 50% !important; */
            height: 100%;
            overflow: hidden;
        }

        .custom-offplan-swiper .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .description {
            width: 50%;
            font-family: "Manrope", sans-serif;
            font-weight: 600;
            font-size: 20px;
            line-height: 1.4;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            padding: 0 10px;

        }

        /* Responsive */
        @media (max-width: 900px) {
            .container-Features {
                flex-direction: column;
                text-align: center;
                width: 50%;
            }

            .custom-offplan-swiper,
            .description {
                flex: 1 1 100%;
                width: 100%;
            }

            .Description-second-box-three {
                flex-direction: column;
            }

            .custom-offplan-swiper-div {
                height: 400px;
                width: 100%;
            }

            .description {
                font-size: 14px;
                width: 100%;
                padding: 10px;
            }
        }
    </style>
@endsection
