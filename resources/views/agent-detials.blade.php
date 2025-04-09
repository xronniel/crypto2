@extends('layouts.front-office.app')
@section('content')


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
