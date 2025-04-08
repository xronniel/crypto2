@extends('layouts.front-office.app')

@section('content')
    {{-- {{ $property }} --}}



    <section style="background: #080B18;" class="blog pt-50 pb-50">
        <div class="container">
            <form action="{{ route('properties.index') }}" method="GET">
                @csrf
                <div class="property-filter-box">
                    <div class="property-filter">
                        <img src="{{ asset('assets/img/property/search.png') }}" alt="search">
                        <input type="text" placeholder="City, community or building" value="" name="search">
                    </div>

                    <div class="property-filter-two">
                        <div class="back-filter-box" onclick="window.location.href='/properties'">
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
                            <input type="hidden" name="min_price" id="selectedMinPrice" value="">
                            <input type="hidden" name="max_price" id="selectedMaxPrice" value="">
                        </div>
                        <!-- Area Filter -->
                        <div class="property-filter-select">
                            <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}" alt="arrow">
                            <button class="Price-button" type="button" id="AreaToggle">Area Size</button>
                            <input type="hidden" name="min_area" id="selectedMinArea" value="">
                            <input type="hidden" name="max_area" id="selectedMaxArea" value="">
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
                                        @for ($price = 500; $price <= 9000; $price += 100)
                                            <option value="{{ $price }}">{{ number_format($price) }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="black-dropdown black-dropdown-one ">
                                    <img class="property-filter-img" src="{{ asset('assets/img/home/arrow.png') }}"
                                        alt="arrow">
                                    <select name="max_area" class="price-dropdown form-select">
                                        <option value="" selected>Max. Area</option> <!-- Default option set to 0 -->
                                        @for ($price = 500; $price <= 9000; $price += 100)
                                            <option value="{{ $price }}">{{ number_format($price) }}</option>
                                        @endfor
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
                                            <!-- Default option set to 0 -->
                                            @for ($price = 500; $price <= 9000; $price += 100)
                                                <option value="{{ $price }}">{{ number_format($price) }}</option>
                                            @endfor
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
                                            <!-- Default option set to 0 -->
                                            @for ($price = 500; $price <= 9000; $price += 100)
                                                <option value="{{ $price }}">{{ number_format($price) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="done-btn"
                                onclick="closeDropdown('priceDropdown')">Done</button>
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
                            <input type="hidden" type="checkbox" name="amenities[]" value="">





                            <button type="button" class="done-btn"
                                onclick="closeDropdown('FiltersDropdown')">Done</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
    <div style="background: #0B0F28;
            padding: 1px 0;
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
                        <div class="budge-three-div">

                                     <!-- If Verified -->
                            @if($property->verified == 1)
                                <p>
                                    <img class="" src="assets/img/property/Verified-img.png" alt="location">
                                    Verified
                                </p>
                            @endif
                        
                            <!-- If SuperAgent -->
                            @if($property->superagent == 1)
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
                               src="{{ $property->xml ? $image->url  : asset('storage/' . $image->url ) }}"
                            
                        alt="home">
                        @endforeach

                        {{-- See More Button --}}
                        <div class="small-images-see-more" onclick="openSwiperPopup()">
                            See More
                        </div>
                    </div>
                </div>

<div class="properties-swiper-mobile swiper">
    <div
    
    class="swiper-wrapper">
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
                     src="{{ $property->xml ? $image->url  : asset('storage/' . $image->url ) }}" 
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
                                        <img   src="{{ $property->xml ? $image->url  : asset('storage/' . $image->url ) }}" alt="Property Image">
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
                            <img   src="{{ $property->xml ? $image->url  : asset('storage/' . $image->url ) }}" alt="Property Image" class="thumbnail-img">
                        @endforeach
                    </div>

                </div>

                <div class="grid-left-side">
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
                            @endphp
                            
                            <p class="grid-left-side-price-div-two">{{ formatNumber($property->price) }}<span>AED</span></p>
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
                                    $segments[] = '
                                        <div class="grid-left-side-price-two-one">
                                            <img class="img-four" src="' . asset("assets/img/property/green-bed.png") . '" alt="bed">
                                            <p>' . $property->bedrooms . ' Bedroom</p>
                                        </div>';
                                @endphp
                            @endif
                        
                            @if (isset($property->no_of_bathroom) && $property->no_of_bathroom > 0)
                                @php
                                    $segments[] = '
                                        <div class="grid-left-side-price-two-one">
                                            <img class="img-four" src="' . asset("assets/img/property/green-bath.png") . '" alt="bath">
                                            <p>' . $property->no_of_bathroom . ' Bathroom</p>
                                        </div>';
                                @endphp
                            @endif
                        
                            @if (isset($property->unit_builtup_area) && $property->unit_builtup_area > 0)
                                @php
                                    $segments[] = '
                                        <div class="grid-left-side-price-two-one">
                                            <img class="img-four" src="' . asset("assets/img/property/green-size.png") . '" alt="size">
                                            <p>' . number_format($property->unit_builtup_area, 2) . ' sq. ft.</p>
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
                                <img class="Converter-img" src="{{ asset('assets/img/home/Border.png') }}"
                                    alt="icon">
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
            </div>

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

            <div class="Description-big-box">
                <div class="property-details-Description">
                    <span class="active-filter-link">Floor Plan</span>

                   
                </div>
                <div class="Floor-Plan-div">
                    <div class="Floor-Plan-div-one">
                        {{-- <img src="{{ asset('assets/img/propertydetails/Floor-Plan-bg.png') }}" alt="floor-plan"> --}}
                        <img src="{{asset('storage/' . $property->floor_plan ) }}" alt="floor-plan">
                    </div>
        
                    <div class="Floor-Plan-div-two">
               
                        <div class="video-container">
                            @if($property->web_tour)
                            @php
                                // Extract the video ID from a YouTube Shorts URL
                                $videoId = Str::afterLast($property->web_tour, '/');
                            @endphp
                        
                                <iframe 
                                    width="100%" 
                                    height="100%" 
                                    src="https://www.youtube.com/embed/{{ $videoId }}" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                                </iframe>
                     
                        @else
                            <video id="propertyVideo" src="{{ asset('assets/img/propertydetails/example.mp4') }}" controls alt="floor-plan"></video>
                            <button id="playButton" class="play-button">
                                <img src="{{ asset('assets/img/propertydetails/play-icon.png') }}" alt="floor-plan">
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
                                    <a class="pre-approved" href="{{$property->preview_link}}">Get pre-approved</a>
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


                    <div class="Floor-Plan-div-two">

                        <div class="map-div-three">
                            <div class="Location-div-three-box">
                                <div class="Location-div-three-box-one">
                                    <div class="Location-img-one">
                                        <img src="{{ asset('assets/img/propertydetails/map-section-one.png') }}"
                                            alt="floor-plan">
                                    </div>
                                    <div>
                                        <p>
                                            Collective 2.0 Tower B
                                        </p>
                                        <p class="Location-img-one-p-two">
                                            Residential Insights
                                        </p>
                                    </div>
                                    <img class="Location-img-two"
                                        src="{{ asset('assets/img/propertydetails/arrow-right-green.png') }}"
                                        alt="floor-plan">
                                </div>
                                <div class="Location-div-three-line"></div>
                                <div class="map-div-three-box-two">
                                    <div class="map-div-three-box-two-one">
                                        <img src="{{ asset('assets/img/propertydetails/Component15.png') }}"
                                            alt="floor-plan">
                                        <p> Floor Plans :</p>
                                        <span>256 units</span>
                                    </div>
                                    <div class="map-div-three-box-two-one">
                                        <img src="{{ asset('assets/img/propertydetails/Component16.png') }}"
                                            alt="floor-plan">
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
                                        <img src="{{ asset('assets/img/propertydetails/map-section-one.png') }}"
                                            alt="floor-plan">
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
                                    <img class="Location-img-two"
                                        src="{{ asset('assets/img/propertydetails/arrow-right-green.png') }}"
                                        alt="floor-plan">
                                </div>
                                <div class="Location-div-three-line"></div>
                                <div class="map-div-three-box-two">
                                    <div class="map-div-three-box-two-one">
                                        <span>Apartments and villas | Family-Friendly</span>
                                    </div>
                                    <div class="map-div-three-box-two-one">
                                        <img src="{{ asset('assets/img/propertydetails/Component16.png') }}"
                                            alt="floor-plan">
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
    " class="bg_img top-center pos-rel pb-145"
      data-background="{{ asset('assets/img/bg/team-bg.png') }}">






        <div class="container">
            <div class="card-title">
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
                            <p class="cards-property-title-five">Collective 2.0 Tower B, Collective 2.0, Dubai, Hills
                                Estate, Dubai</p>

                            <div class="grid-left-side-price-two">
                                <div class="grid-left-side-price-two-card">
                                    <img class="img-card" src="{{ asset('assets/img/property/green-bed.png') }}"
                                        alt="bed">
                                    <p>6</p>
                                </div>
                                <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                <div class="grid-left-side-price-two-card">
                                    <img class="img-card" src="{{ asset('assets/img/property/green-bath.png') }}"
                                        alt="bath">
                                    <p>6 </p>
                                </div>
                                <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                <div class="grid-left-side-price-two-card">
                                    <img class="img-card" src="{{ asset('assets/img/property/green-size.png') }}"
                                        alt="size">
                                    <p>6,000 sq. ft.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

</style>
@endsection
