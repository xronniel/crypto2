@extends('layouts.front-office.app')
@section('content')
    {{-- {{ $property }} --}}
    <section class="blog blog-padding">
        <x-property-filter :propertyTypes="$propertyTypes" :plotAreaRange="$plotAreaRange" :priceRange="$priceRange" :amenities="$amenities" />
    </section>
    {{-- {{ $property }} --}}

    <!-- breadcrumb start -->
    <section class="breadcrumb bg_img pos-rel" data-background="assets/img/bg/breadcrumb.jpg">
        <div class="container">
            <div class="breadcrumb__content">
                @if (request()->is('properties') && request()->query('completion_status') === 'off_plan')
                <h2 class="breadcrumb__title">Off-Plan Properties in {{ request()->query('emirate') ? request()->query('emirate') : 'UAE' }}</h2>
                @elseif (request()->is('properties') && request()->query('type') === 'commercial')
                    <h2 class="breadcrumb__title">Commercial Buildings</h2>
                @else
                    <h2 class="breadcrumb__title">Properties for Sale in {{ request()->query('emirate') ? request()->query('emirate') : 'UAE' }}</h2>
                @endif
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

            {{-- @if (request()->is('properties') && request()->query('completion_status') === 'off_plan')
                <div onclick="window.location.href='/'" class="page-path-line">
                    <img src="{{ asset('assets/img/propertydetails/arrow-left.png') }}" alt="home">
                    <p>Home</p>
                    <p class="active-path-line">/ properties for sale in uae</p>
                </div>
            @elseif (request()->is('properties') && request()->query('type') === 'commercial')
                   <div onclick="window.location.href='/'" class="page-path-line">
                    <img src="{{ asset('assets/img/propertydetails/arrow-left.png') }}" alt="home">
                    <p>Home</p>
                    <p class="active-path-line">/ properties for sale in uae</p>
                </div>
            @else

            @endif --}}
            
            
            <div onclick="window.location.href='/'" class="page-path-line">
                <img src="{{ asset('assets/img/propertydetails/arrow-left.png') }}" alt="home">
                <p>Home</p>
                <p class="active-path-line">/ properties for sale in {{ request()->query('emirate') ? request()->query('emirate') : 'UAE' }}</p>
            </div>

            <h2 class="page-line-title">
                Buy Properties in {{ request()->query('emirate') ? request()->query('emirate') : 'UAE' }}
            </h2>

            <div class="page-line-filter-box">
                <div class="page-line-filter">
                    <div class="page-line-filter-h3">
                        <p>{{ $properties->total() }}</p>
                        <span>properties available</span>
                    </div>
                    <div class="page-line-filter-links">
                        <a href="{{ route('properties.index', array_merge(request()->all(), ['completion_status' => ''])) }}"
                            class="{{ request('completion_status') == '' ? 'page-line-filter-links-ctive' : '' }}">Any</a>
                    
                        <a href="{{ route('properties.index', array_merge(request()->all(), ['completion_status' => 'off_plan'])) }}"
                            class="{{ request('completion_status') == 'off_plan' ? 'page-line-filter-links-ctive' : '' }}">Off-plan</a>
                    
                        <a href="{{ route('properties.index', array_merge(request()->all(), ['completion_status' => 'ready'])) }}"
                            class="{{ request('completion_status') == 'ready' ? 'page-line-filter-links-ctive' : '' }}">Ready</a>
                    </div>

                </div>
            </div>

            <div class="page-line-filter">

                <div class="page-line-filter-links-two mobile-view">
                    <a href="#" >
                        <img style="width: 22px;" class="page-line-filter-links-two-img"
                            src="assets/img/property/location.png" alt="home">
                        Map view
                    </a>
                    
                    <a href="#" onclick="scrollToSection(event)">
                        <img style="    width: 19px;" class="page-line-filter-links-two-img"
                            src="assets/img/property/alert.png" alt="home">
                        Create alert</a>
                </div>

                <form action="{{ route('properties.index') }}" method="GET">
                    <div class="page-line-filter-links-two">
                        <img class="filter-links-two-img" src="assets/img/home/arrow.png" alt="">
                        <label for="sort-options">Sort by:</label>
                
                        <!-- Preserve emirate and other filters -->
                        <input type="hidden" name="emirate" value="{{ request('emirate') }}">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <input type="hidden" name="filter_type" value="{{ request('filter_type') }}">
                        <input type="hidden" name="completion_status" value="{{ request('completion_status') }}">
                
                        <select name="sort_by" id="sort-options" onchange="this.form.submit()">
                            <option value="">Select an option</option>
                            <option value="featured" {{ request('sort_by') == 'featured' ? 'selected' : '' }}>Featured</option>
                            <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Newest</option>
                            <option value="from_lowest_price" {{ request('sort_by') == 'from_lowest_price' ? 'selected' : '' }}>From Lowest Price</option>
                            <option value="from_highest_price" {{ request('sort_by') == 'from_highest_price' ? 'selected' : '' }}>From Highest Price</option>
                        </select>
                    </div>
                </form>

            </div>
                
       

            @if (request()->is('properties') && request()->query('completion_status') === 'off_plan')
                
                    <div class="emirate-title">Search by Locations</div>
                    
                    <div class="emirate-swiper-box">
                        <div class="swiper Swiper-emirate">
                            <div class="swiper-wrapper">
                                @foreach ($emirateCounts as $emirate)
                                    <div class="swiper-slide swiper-slide-emirate"
                                        onclick="location.href='{{ url('properties?completion_status=off_plan&emirate=' . urlencode($emirate['emirate'])) }}'">
                                        {{ $emirate['emirate'] }} ({{ $emirate['count'] }} projects)
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                            <!-- Navigation arrows -->
                            <div class="swiper-button-prev swiper-button-prev-emirate"></div>
                            <div class="swiper-button-next swiper-button-next-emirate"></div>
                    
                    </div>

            @endif


         

            <div class="row mt-none-30">
                <div class="col-lg-9 mt-30">
                    {{-- card   --}}
                    {{-- card   --}}

                    @foreach ($properties as $property)
                        <div onclick="window.location.href='{{ route('properties.show', ['property' => $property->property_ref_no]) }}'"
                            style="margin-bottom: 50px; cursor: pointer;" class="blog-post-wrap mt-none-30">
                            <article class="blog__item mt-30 blog__item-property">
                                <div class="blog__item-property-one swiper">
                                    {{-- <img class="Favorite-green" src="assets/img/property/green-Favorite.png" alt="Favorite"> --}}
                                    <form action="{{ url('saved-properties') }}" method="POST" class="favorite-form"
                                        style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="propertyable_id" value="{{ $property->id }}">
                                        <input type="hidden" name="propertyable_type" value="commercial">
                                        <input type="hidden" name="property_ref_no"
                                            value="{{ $property->property_ref_no }}">
                                            <button class="Favorite-green" type="submit"
                                            style="background: none; border: none; padding: 0; cursor: pointer;">
                                            @if ($property->favorite)
                                                <img class="Favorite-green"
                                                src="{{ asset('assets/img/property/fiv-icon.png') }}" alt="Favorite">
                                            @else
                                                <img class="Favorite-green"
                                                src="{{ asset('assets/img/property/green-Favorite.png') }}" alt="Favorite">
                                            @endif
                                        </button>
                                    </form>

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


                                        <div class="property-two-box-five-two" 
                                            
                               @auth
                               data-user-id="{{ auth()->user()->id }}"
                               data-property-id="{{ $property->id }}"
                               data-property-ref="{{ $property->property_ref_no }}"
                               data-url="{{ url()->current() }}"
                               @endauth
                                            
                                            >

                                            <!-- Phone Call -->
                                            <a href="tel:{{ $property->listing_agent_phone }}" class="contact-btn"
                                                data-method="Call">
                                                <img src="{{ asset('assets/img/property/dark-call.png') }}"
                                                    alt="Call">
                                                <span>Call</span>
                                            </a>

                                            <!-- Email -->
                                            <a href="mailto:{{ $property->listing_agent_email }}" class="contact-btn"
                                                data-method="Email">
                                                <img src="{{ asset('assets/img/property/dark-mail.png') }}"
                                                    alt="Email">
                                                <span>Email</span>
                                            </a>

                                            <!-- WhatsApp -->
                                            <a href="https://wa.me/{{ $property->listing_agent_whatsapp }}"
                                                class="contact-btn" data-method="WhatsApp" target="_blank">
                                                <img src="{{ asset('assets/img/property/dark-WhatsApp.png') }}"
                                                    alt="WhatsApp">
                                                <span>WhatsApp</span>
                                            </a>
                                        </div>



                                    </div>





                                </div>
                            </article>
                        </div>
                    @endforeach
                    {{-- end card   --}}
                    {{ $properties->appends(request()->except('page'))->links() }}
                </div>
                <div class="col-lg-3 mt-30">
                    <div class="sidebar-area mt-none-30">

                        @if (request()->is('properties') && request()->query('completion_status') === 'off_plan')
                        <div style="padding: 0;" class="widget widget-three mt-30">
                            <img 
                            style="height: 100%"
                            src="{{ asset('assets/img/property/off-plan-map.png') }}" alt="amar">
                        </div>
                    @endif

                      
                        <div class="widget  widget-one mt-30">
                            <h3 class="widget__title">Nearby Areas</h3>
                            <ul class="widget__category list-unstyled">
                                @foreach ($emirates as $emirate)
                                    <li>
                                        <a href="javascript:void(0);"
                                            onclick="window.location.href='{{ route('properties.index', ['filter_type' => 'sale', 'emirate' => $emirate]) }}'">
                                            Properties for sale in {{ $emirate }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <h3 class="widget__title">Popular Searches</h3>
                            <ul class="widget__category list-unstyled">
                                @foreach (collect($recentSearches['unit_type'])->unique('name') as $recent)
                                    <li>
                                        <a href="javascript:void(0);"
                                           onclick="window.location.href='{{ route('properties.index', array_merge(request()->except('page'), [
                                               'filter_type' => $recent['ad_type'],
                                               'search' => $recent['name']
                                           ])) }}'">
                                            {{ $recent['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            
                                @foreach ($recentSearches['community'] as $recent)
                                    <li>
                                        <a href="javascript:void(0);"
                                           onclick="window.location.href='{{ route('properties.index', array_merge(request()->except('page'), [
                                               'filter_type' => $recent['ad_type'],
                                               'search' => $recent['name']
                                           ])) }}'">
                                            {{ $recent['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            
                                @foreach ($recentSearches['property_title'] as $recent)
                                    <li>
                                        <a href="javascript:void(0);"
                                           onclick="window.location.href='{{ route('properties.index', array_merge(request()->except('page'), [
                                               'filter_type' => $recent['ad_type'],
                                               'search' => $recent['title']
                                           ])) }}'">
                                            {{ $recent['title'] }}
                                        </a>
                                    </li>
                                @endforeach
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




    .Swiper-emirate {
        position: relative;
        width: 92%;
    justify-self: flex-start;
    position: relative;
    margin: 0;
    overflow: hidden;
    }

    .swiper-slide-emirate {

 

   
        font-size: 14px;
        padding: 8px 12px;
        text-align: center;
        cursor: pointer;
        flex-shrink: 0;

        border: 1px solid #FFFFFF33;
        border-radius: 3px;

        font-family: "Manrope", sans-serif;
font-weight: 400;
font-size: 14px;
line-height: 24px;
letter-spacing: 0%;
vertical-align: middle;
color: #FFFFFF;

    }

    .swiper-button-prev-emirate,
    .swiper-button-next-emirate {

        position: absolute;
        color: white;
        z-index: 10;

        font-size: 16px; /* smaller font size */
    padding: 4px;     /* smaller clickable area */
    width: 25px;      /* smaller width */
    height: 25px;     /* smaller height */
    }

    .swiper-button-next-emirate:after,
.swiper-button-prev-emirate:after {
    font-size: 16px;
    padding: 4px;
    width: 25px;
    height: 25px;
}


    .swiper-button-next-emirate{
        right: 0;
        top: 0;
    bottom: 0;
    margin: auto;
    }

    .swiper-button-prev-emirate {
        left: 95%;
        top: 0;
    bottom: 0;
    margin: auto;
    }
.emirate-swiper-box{
    width: 80%;
    position: relative;
    margin: 0 0 20px 0;
}


.emirate-title{
    font-family: "Manrope", sans-serif;
font-weight: 600;
font-size: 14px;
line-height: 24px;
letter-spacing: 0%;
vertical-align: middle;
margin-bottom: 10px;
color: #FFFFFF80;

}

@media (max-width: 1194px) {
    .emirate-swiper-box{
        width: 100%;
    }
    .swiper-button-prev-emirate {
        left: 93%;
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


<script>
function scrollToSection(event) {
    event.preventDefault(); 
    document.getElementById("question-form-footer").scrollIntoView({ behavior: "smooth" });
}
</script>

@endsection
