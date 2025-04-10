@extends('layouts.front-office.app')
@section('content')
    {{-- {{$agent}} --}}
    <div class="agent-bid-box">
        <div class="container ">
            <div onclick="window.location.href='/'" class="page-path-line">
                <img src="{{ asset('assets/img/propertydetails/arrow-left.png') }}" alt="home">
                <p>Home</p>
                <p onclick="window.location.href='/agents'">/ Find Agent</p>
                <p class="active-path-line">/ {{ $agent->name ?? 'Agent' }}</p>
            </div>

            <div class="grid-img-container">
                <div class="main-image">
                    <img src="{{ Str::startsWith($agent->photo, 'http') ? $agent->photo : asset('storage/' . $agent->photo) }}"
                        onerror="this.onerror=null;this.src='{{ asset('assets/img/agent/agent-1.jpeg') }}';"
                        alt="{{ $agent->name ?? 'Agent' }}">
                </div>

                <div class="grid-left-side">
                    <div class="grid-left-side-one">
                        @if ($agent->superagent == 1)
                            <p class="  SuperAgent-div">
                                <img class="" src="{{ asset('assets/img/property/SuperAgent-img.png') }}"
                                    alt="location">
                                SuperAgent
                            </p>
                        @endif
                        <div class="agent-flex-one">



                            <div class="agent-flex">
                                <span>{{ $agent->saleListings->count() ?? '0' }}</span>
                                <p>Properties for Sale</p>
                            </div>
                            <div class="agent-flex">
                                <span>{{ $agent->rentListings->count() ?? '0' }}</span>
                                <p>Properties for Rent</p>
                            </div>
                        </div>

                        <h2 class="grid-left-side-title">{{ $agent->name }}</h2>
                        <p class="grid-left-side-title-p">{{ $agent->position ?? 'Associate Director' }}</p>
                    </div>

                    <div class="agent-flex-links">
                        @if ($agent->phone)
                            <a href="tel:{{ $agent->phone }}">
                                <img src="{{ asset('assets/img/agent/Call.png') }}" alt="Call Icon">
                                +971 {{ $agent->phone }}
                            </a>
                        @endif

                        @if ($agent->email)
                            <a href="mailto:{{ $agent->email }}">
                                <img src="{{ asset('assets/img/agent/Email.png') }}" alt="Email Icon">
                                {{ $agent->email }}
                            </a>
                        @endif

                        @if ($agent->address)
                            <a href="#">
                                <img src="{{ asset('assets/img/agent/Location.png') }}" alt="Location Icon">
                                {{ $agent->address }}
                            </a>
                        @endif
                    </div>

                    <a class="agent-flex-link-two" href="mailto:{{ $agent->email ?? '#' }}">
                        Send Message
                        <img src="{{ asset('assets/img/agent/arrow.png') }}" alt="arrow">
                    </a>
                </div>

                <div class="agent-logo-container  agent-logo-container-hide">
                    <h4>Brokerage</h4>
                    {{-- <img src="{{ asset($agent->company->icon) }}" alt="Logo"> --}}
                    <img src="{{ asset('assets/img/agent/agent-logo.jpeg') }}" alt="Logo">
                    <p>Espace Real Estate</p>
                </div>
            </div>


            <div class="property-details-Description mobile-show">
                <span class="active-filter-link active-one-box ">Profile</span>
                <span class="active-filter-link">Property Listings</span>
            </div>



            <div class="agent-logo-container  agent-logo-container-show">
                <h4>Brokerage</h4>
                {{-- <img src="{{ asset($agent->company->icon) }}" alt="Logo"> --}}
                <img src="{{ asset('assets/img/agent/agent-logo.jpeg') }}" alt="Logo">
                <p>Espace Real Estate</p>
            </div>


            <div class="mobile-show-one row mt-none-30">
                <div class=" mt-30">

                    <div class="agent-count-properties">
                        <p><span>{{ $agentListings->total() }}</span> properties available</p>


                        <div style="display: flex; 
                            justify-content: space-between;
                        gap: 25px;">
                            <form action="{{ route('agents.show', ['agent' => $agent]) }}" method="GET">
                                <div class="page-line-filter-links-two">
                                    <img class="filter-links-two-img" src="{{ asset('assets/img/home/arrow.png') }}"
                                        alt="arrow">
                                    <select name="ad_type" id="sort-options" onchange="this.form.submit()">
                                       
                                        <option value="rent" {{ request('ad_type') == 'rent' ? 'selected' : '' }}>Rent
                                        </option>
                                        <option value="sale" {{ request('ad_type') == 'sale' ? 'selected' : '' }}>Buy
                                        </option>
                                    </select>
                                </div>
                                <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                <input type="hidden" name="page" value="{{ request('page') }}">
                            </form>

                            <form action="{{ route('agents.show', ['agent' => $agent]) }}" method="GET">
                                <div class="page-line-filter-links-two">
                                    <img class="filter-links-two-img" src="{{ asset('assets/img/home/arrow.png') }}"
                                        alt="arrow">
                                    <select name="sort_by" id="sort-options-two" onchange="this.form.submit()">
                                     
                                        <option value="featured" {{ request('sort_by') == 'featured' ? 'selected' : '' }}>
                                            Featured</option>
                                        <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>
                                            Newest</option>
                                        <option value="from_lowest_price"
                                            {{ request('sort_by') == 'from_lowest_price' ? 'selected' : '' }}>From Lowest
                                            Price</option>
                                        <option value="from_highest_price"
                                            {{ request('sort_by') == 'from_highest_price' ? 'selected' : '' }}>From Highest
                                            Price</option>
                                    </select>
                                </div>
                                <input type="hidden" name="ad_type" value="{{ request('ad_type') }}">
                                <input type="hidden" name="page" value="{{ request('page') }}">
                            </form>
                        </div>

                    </div>

                    @foreach ($agentListings as $property)
                        <div onclick="window.location.href='{{ route('properties.show', ['property' => $property->property_ref_no]) }}'"
                            style="margin-bottom: 50px; cursor: pointer;" class="blog-post-wrap">
                            <article class="blog__item mt-30 blog__item-property">
                                <div class="blog__item-property-one swiper">
                                    <img class="Favorite-green"
                                        src="{{ asset('assets/img/property/green-Favorite.png') }}" alt="Favorite">
                                    <img class="location-green"
                                        src="{{ asset('assets/img/property/location-green.png') }}" alt="location">

                                    <div class="img-slider-count">
                                        <img src="{{ asset('assets/img/property/cam.png') }}" alt="cam">
                                        <p>{{ $property->images->count() ?? 0 }}</p>
                                    </div>

                                    <div class="budge-three-div">
                                        @if ($property->verified == 1)
                                            <p>
                                                <img src="{{ asset('assets/img/property/Verified-img.png') }}"
                                                    alt="Verified">
                                                Verified
                                            </p>
                                        @endif

                                        @if ($property->superagent == 1)
                                            <p>
                                                <img src="{{ asset('assets/img/property/SuperAgent-img.png') }}"
                                                    alt="SuperAgent">
                                                SuperAgent
                                            </p>
                                        @endif

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

                                    <div class="swiper-pagination"></div>
                                </div>

                                <div style="background-image: url({{ asset('assets/img/bg/tm_bg.png') }}); background-size: cover;"
                                    class="blog__item-property-two">
                                    <div class="blog__item-property-two-box">
                                        <h1 class="blog__item-property-two-title">{{ $property->unit_type }}</h1>
                                        <p>Premium</p>
                                    </div>

                                    <div class="blog__item-property-two-box-two">
                                        <div class="blog__item-property-two-box-one">
                                            <p class="box-two-p-one">
                                                {{ $property->getConvertedPrice()['converted_price'] ?? '' }}
                                                ({{ $property->getConvertedPrice()['currency_code'] ?? '' }})
                                            </p>
                                            <p class="box-two-p-two">
                                                {{ $property->price }} AED
                                            </p>
                                        </div>
                                        <div class="blog__item-property-two-img">
                                            <img src="{{ asset('assets/img/property/state-logo.jpeg') }}" alt="logo">
                                        </div>
                                    </div>

                                    <div class="blog__item-property-two-box-three">
                                        <p>{{ $property->property_title }}</p>
                                    </div>

                                    <div class="location-property-two-box-three">
                                        <img src="{{ asset('assets/img/property/green-location.png') }}" alt="location">
                                        <p>{{ $property->community ?? 'Dubai' }}</p>
                                    </div>

                                    <div class="property-two-box-four">
                                        @if (!empty($property->no_of_rooms))
                                            <img class="img-four" src="{{ asset('assets/img/property/green-bed.png') }}"
                                                alt="bed">
                                            <p>{{ $property->no_of_rooms }}</p>
                                            <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                        @endif

                                        @if (!empty($property->no_of_bathroom))
                                            <img class="img-four" src="{{ asset('assets/img/property/green-bath.png') }}"
                                                alt="bath">
                                            <p>{{ $property->no_of_bathroom }}</p>
                                            <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                        @endif

                                        @if (!empty($property->unit_builtup_area))
                                            <img class="img-four" src="{{ asset('assets/img/property/green-size.png') }}"
                                                alt="size">
                                            <p>{{ $property->unit_builtup_area }} {{ $property->unit_measure }}</p>
                                        @endif
                                    </div>

                                    <div class="property-two-box-five">
                                        <div class="property-two-box-five-one">
                                            <div class="property-two-box-five-one-img">
                                                <img src="{{ $property->listing_agent_photo }}" alt="person">
                                            </div>
                                            <div class="property-two-box-five-one-name">
                                                <p>{{ $property->listing_agent }}</p>
                                                <h4>Real Estate Agent</h4>
                                            </div>
                                        </div>

                                        <div class="property-two-box-five-two">
                                            <a href="tel:{{ $property->listing_agent_phone }}">
                                                <img src="{{ asset('assets/img/property/dark-call.png') }}"
                                                    alt="Call">
                                                <span>Call</span>
                                            </a>
                                            <a href="mailto:{{ $property->listing_agent_email }}">
                                                <img src="{{ asset('assets/img/property/dark-mail.png') }}"
                                                    alt="Email">
                                                <span>Email</span>
                                            </a>
                                            @if ($property->listing_agent_whatsapp)
                                                <a href="https://wa.me/{{ $property->listing_agent_whatsapp }}"
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

                    {{ $agentListings->appends(request()->query())->links() }}
                </div>
            </div>



            <div class="Description-big-box">
                <div class="property-details-Description">
                    <span class="active-filter-link">Personal Information</span>
                </div>

                <div class="Description-second-box">
                    {{-- Agent Info --}}
                    <div class="Description-second-box-one">
                        <div class="agent-info-right-box">
                            <h4 class="agent-right-box-card-left-p">
                                Nationality: <span>{{ $agent->nationality ?? 'N/A' }}</span>
                            </h4>
                            <h4 class="agent-right-box-card-left-p">
                                Language: <span>{{ $agent->language ?? 'N/A' }}</span>
                            </h4>
                            <h4 class="agent-right-box-card-left-p">
                                Experience: <span>{{ $agent->experience ?? 'N/A' }}</span>
                            </h4>
                            <h4 class="agent-right-box-card-left-p">
                                Dubai Broker License (BRN): <span>{{ $agent->BRN ?? 'N/A' }}</span>
                            </h4>
                        </div>
                    </div>

                    <div class="Description-second-box-two">
                        <h4>About Me</h4>
                        <p class="about-text">
                            {{ $agent->about ?? 'No biography available for this agent at the moment.' }}
                        </p>
                        <a href="javascript:void(0);" class="about-us-bottom" href="#">
                            READ MORE
                            <img alt="arrow" src="{{ asset('assets/img/home/arrow.png') }}"/>
                        </a>
                    </div>
                    
                </div>
            </div>




            <div class="mobile-hide row mt-none-30">
                <div class=" mt-30">
                    <div style="margin: 0 0 40px 0" class=" property-details-Description">
                        <span class="active-filter-link">My Properties</span>
                    </div>

                    <div class="agent-count-properties">
                        <p><span>{{ $agentListings->total() }}</span> properties available</p>


                        <div style="display: flex; gap: 10px;">
                            <form action="{{ route('agents.show', ['agent' => $agent]) }}" method="GET">
                                <div class="page-line-filter-links-two">
                                    <img class="filter-links-two-img" src="{{ asset('assets/img/home/arrow.png') }}"
                                        alt="arrow">
                                    <select name="ad_type" id="sort-options" onchange="this.form.submit()">
                                        <option value="">Select an option</option>
                                        <option value="rent" {{ request('ad_type') == 'rent' ? 'selected' : '' }}>Rent
                                        </option>
                                        <option value="sale" {{ request('ad_type') == 'sale' ? 'selected' : '' }}>Buy
                                        </option>
                                    </select>
                                </div>
                                <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                <input type="hidden" name="page" value="{{ request('page') }}">
                            </form>

                            <form action="{{ route('agents.show', ['agent' => $agent]) }}" method="GET">
                                <div class="page-line-filter-links-two">
                                    <img class="filter-links-two-img" src="{{ asset('assets/img/home/arrow.png') }}"
                                        alt="arrow">
                                    <select name="sort_by" id="sort-options-two" onchange="this.form.submit()">
                                        <option value="">Select an option</option>
                                        <option value="featured" {{ request('sort_by') == 'featured' ? 'selected' : '' }}>
                                            Featured</option>
                                        <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>
                                            Newest</option>
                                        <option value="from_lowest_price"
                                            {{ request('sort_by') == 'from_lowest_price' ? 'selected' : '' }}>From Lowest
                                            Price</option>
                                        <option value="from_highest_price"
                                            {{ request('sort_by') == 'from_highest_price' ? 'selected' : '' }}>From Highest
                                            Price</option>
                                    </select>
                                </div>
                                <input type="hidden" name="ad_type" value="{{ request('ad_type') }}">
                                <input type="hidden" name="page" value="{{ request('page') }}">
                            </form>
                        </div>

                    </div>

                    @foreach ($agentListings as $property)
                        <div onclick="window.location.href='{{ route('properties.show', ['property' => $property->property_ref_no]) }}'"
                            style="margin-bottom: 50px; cursor: pointer;" class="blog-post-wrap">
                            <article class="blog__item mt-30 blog__item-property">
                                <div class="blog__item-property-one swiper">
                                    <img class="Favorite-green"
                                        src="{{ asset('assets/img/property/green-Favorite.png') }}" alt="Favorite">
                                    <img class="location-green"
                                        src="{{ asset('assets/img/property/location-green.png') }}" alt="location">

                                    <div class="img-slider-count">
                                        <img src="{{ asset('assets/img/property/cam.png') }}" alt="cam">
                                        <p>{{ $property->images->count() ?? 0 }}</p>
                                    </div>

                                    <div class="budge-three-div">
                                        @if ($property->verified == 1)
                                            <p>
                                                <img src="{{ asset('assets/img/property/Verified-img.png') }}"
                                                    alt="Verified">
                                                Verified
                                            </p>
                                        @endif

                                        @if ($property->superagent == 1)
                                            <p>
                                                <img src="{{ asset('assets/img/property/SuperAgent-img.png') }}"
                                                    alt="SuperAgent">
                                                SuperAgent
                                            </p>
                                        @endif

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

                                    <div class="swiper-pagination"></div>
                                </div>

                                <div style="background-image: url({{ asset('assets/img/bg/tm_bg.png') }}); background-size: cover;"
                                    class="blog__item-property-two">
                                    <div class="blog__item-property-two-box">
                                        <h1 class="blog__item-property-two-title">{{ $property->unit_type }}</h1>
                                        <p>Premium</p>
                                    </div>

                                    <div class="blog__item-property-two-box-two">
                                        <div class="blog__item-property-two-box-one">
                                            <p class="box-two-p-one">
                                                {{ $property->getConvertedPrice()['converted_price'] ?? '' }}
                                                ({{ $property->getConvertedPrice()['currency_code'] ?? '' }})
                                            </p>
                                            <p class="box-two-p-two">
                                                {{ $property->price }} AED
                                            </p>
                                        </div>
                                        <div class="blog__item-property-two-img">
                                            <img src="{{ asset('assets/img/property/state-logo.jpeg') }}" alt="logo">
                                        </div>
                                    </div>

                                    <div class="blog__item-property-two-box-three">
                                        <p>{{ $property->property_title }}</p>
                                    </div>

                                    <div class="location-property-two-box-three">
                                        <img src="{{ asset('assets/img/property/green-location.png') }}" alt="location">
                                        <p>{{ $property->community ?? 'Dubai' }}</p>
                                    </div>

                                    <div class="property-two-box-four">
                                        @if (!empty($property->no_of_rooms))
                                            <img class="img-four" src="{{ asset('assets/img/property/green-bed.png') }}"
                                                alt="bed">
                                            <p>{{ $property->no_of_rooms }}</p>
                                            <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                        @endif

                                        @if (!empty($property->no_of_bathroom))
                                            <img class="img-four" src="{{ asset('assets/img/property/green-bath.png') }}"
                                                alt="bath">
                                            <p>{{ $property->no_of_bathroom }}</p>
                                            <img src="{{ asset('assets/img/property/pipeline.png') }}" alt="pipeline">
                                        @endif

                                        @if (!empty($property->unit_builtup_area))
                                            <img class="img-four" src="{{ asset('assets/img/property/green-size.png') }}"
                                                alt="size">
                                            <p>{{ $property->unit_builtup_area }} {{ $property->unit_measure }}</p>
                                        @endif
                                    </div>

                                    <div class="property-two-box-five">
                                        <div class="property-two-box-five-one">
                                            <div class="property-two-box-five-one-img">
                                                <img src="{{ $property->listing_agent_photo }}" alt="person">
                                            </div>
                                            <div class="property-two-box-five-one-name">
                                                <p>{{ $property->listing_agent }}</p>
                                                <h4>Real Estate Agent</h4>
                                            </div>
                                        </div>

                                        <div class="property-two-box-five-two">
                                            <a href="tel:{{ $property->listing_agent_phone }}">
                                                <img src="{{ asset('assets/img/property/dark-call.png') }}"
                                                    alt="Call">
                                                <span>Call</span>
                                            </a>
                                            <a href="mailto:{{ $property->listing_agent_email }}">
                                                <img src="{{ asset('assets/img/property/dark-mail.png') }}"
                                                    alt="Email">
                                                <span>Email</span>
                                            </a>
                                            @if ($property->listing_agent_whatsapp)
                                                <a href="https://wa.me/{{ $property->listing_agent_whatsapp }}"
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

                    {{ $agentListings->appends(request()->query())->links() }}
                </div>
            </div>



        </div>
    </div>



















    <div style="background: #0B0F28;
    padding: 1px 0;
        background-position: center;
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


    <style>
        .agent-flex-one {
            display: flex;
            gap: 20px;
        }

        .agent-flex {
            display: flex;
            gap: 5px;
            align-items: center;

        }

        .agent-flex-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }


        .agent-flex span {
            font-family: "Manrope", sans-serif;
            font-weight: 700;
            font-size: 30px;
            line-height: 32px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #2DD98F;

        }

        .agent-flex p {
            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 24px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #4F4F4F;


        }


        .grid-left-side-title {
            font-family: "Outfit", sans-serif;
            font-weight: 700;
            font-size: 60px;
            line-height: 100%;
            letter-spacing: -0.03px;
            vertical-align: middle;
            text-transform: capitalize;
            color: #FFFFFF;

        }

        .grid-left-side-title-p {
            font-family: "Outfit", sans-serif;
            font-weight: 300;
            font-size: 24px;
            line-height: 100%;
            letter-spacing: -0.03px;
            vertical-align: middle;
            text-transform: capitalize;
            color: #767676;

        }
        .active-filter-link {
    text-decoration: none;
}

        .active-one-box {
            text-decoration: underline;
            text-underline-offset: 13px;
        }



        .agent-flex-links a {
            font-family: "Outfit", sans-serif;
            font-weight: 400;
            font-size: 18px;
            line-height: 100%;
            letter-spacing: -0.03px;
            vertical-align: middle;
            text-transform: capitalize;
            color: #767676;
        }



        .agent-flex-link-two {
            background: #FFFFFF;

            border-radius: 3px;
            padding: 10px 40px;
            font-family: "Outfit", sans-serif;
            font-weight: 300;
            font-size: 14px;
            line-height: 100%;
            letter-spacing: -0.03px;
            vertical-align: middle;
            text-transform: capitalize;
            color: #000000;

        }


        .grid-left-side-one {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }



        .main-image {
            position: relative;
            width: 440.296875px;
            height: 474.8800048828125px;

            border-radius: 5px;
            overflow: hidden;
        }


        .main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 20%;
        }







        .grid-left-side {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-start;
        }

        .grid-container-one {
            display: grid;
            width: 40%;
            height: 100%;
        }


        .agent-logo-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
            border: 1px solid #737373;
            border-radius: 20px;
            padding: 15px;






            width: 248px;
            height: 182px;

        }





        .agent-bid-box {
            background: #0B0F28;
            padding: 100px 0 0 0;
            display: flex;
        }




        .agent-logo-container img {
            width: 80px;
        }


        .agent-logo-container h4 {
            font-family: "Manrope", sans-serif;
            font-weight: 600;
            font-size: 16px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #FFFFFF;

        }


        .agent-logo-container p {
            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 24px;
            letter-spacing: 0%;
            vertical-align: middle;


        }





        .agent-right-box-card-left-p {
            font-family: "Manrope", sans-serif;
            color: #767676;

            font-weight: 400;
            font-size: 20px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;


        }

        .agent-right-box-card-left-p span {
            font-family: "Manrope", sans-serif;

            margin: 7px 0 0 0;

            font-weight: 400;
            font-size: 20px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #FFFFFF;

        }

        .Description-second-box-two h4 {
            font-family: "Manrope", sans-serif;
            font-weight: 600;
            font-size: 20px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #2DD98F;
            margin: 0 0 10px 0;
        }

        .Description-second-box-two p {
            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 20px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #FFFFFF;

        }

        .page-line-filter-links-two select {
            font-family: "Open Sans";
            font-weight: 600;
            font-size: 14px;
            line-height: 24px;
            /* flex: 1; */
            width: fit-content;
            height: 32px;
            border: 1px solid #41445c;
            padding: 0 30px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            background: none;
        }

        .agent-info-right-box {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .SuperAgent-div {
            background: #3A307F;
            font-family: "Open Sans";
            font-weight: 600;
            font-size: 12px;
            line-height: 20px;
            letter-spacing: 0%;
            vertical-align: middle;
            text-transform: uppercase;
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px;
            border-radius: 5px;
            width: fit-content;
        }

        .agent-count-properties {
            font-family: "Open Sans";
            font-weight: 400;
            font-size: 16px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #767676;
            display: flex;
            margin: 0 0 20px 0;
            justify-content: space-between;
        }


.about-us-bottom {
    display: flex
;
    align-items: center;
    width: 100%;
    align-self: center;
    font-family: "Manrope", sans-serif;
    font-weight: 400;
    font-size: 16px;
    line-height: 28px;
    letter-spacing: 0%;
    text-align: center;
    vertical-align: middle;
    color: #FFFFFF;
    text-align: center;
    gap: 5px;
    justify-content: center;
    margin: 30px 0 0 0;
    cursor: pointer;

}
.about-us-bottom img {
    width: 25px;
    filter: brightness(0) invert(1);
}
        .agent-logo-container-show,
        .mobile-show,
        .mobile-show-one {
            display: none;
        }



        @media (max-width: 950px) {
            .agent-bid-box {
                align-items: center;
                padding: 50px 0 0 0;

            }

            .grid-img-container {

                border: 1px solid #FFFFFF1A;
                background: #080B18;
                padding: 40px 20px;
                border-radius: 10px;

                align-items: center;


            }



            .grid-left-side-one {

                align-items: center;
            }


            .main-image {
                width: 270px;
                height: 270px;
                border: 3px solid #2DD98F;
                border-radius: 50%;

            }


            .agent-flex p{

font-size: 12px;

            }


            .agent-flex span {

    font-size: 23px;
            }



            .grid-left-side-title{
        
font-weight: 700;
font-size: 40px;
line-height: 100%;
letter-spacing: -0.03px;


            }


            .grid-left-side-title-p{
    
font-weight: 300;
font-size: 20px;
line-height: 100%;
letter-spacing: -0.03px;

            }





            .grid-left-side {
    gap: 20px;
}





.agent-flex-link-two {
    align-self: center;
}

    .agent-logo-container-hide {
    display: none
    }



    .agent-logo-container-show {
    display: flex
;
    flex-direction: column;
    gap: 10px;
    align-items: center;
    justify-content: center;
    padding: 20px 0;
    border: 1px solid #737373;
    border-radius: 3px;
    padding: 15px;
    width: 100%;
    height: 182px;
    margin: 20px 0 0 0;
}


.mobile-show{
    display: flex;
    margin: 40px 0 0 0;
}



.property-details-Description {
font-weight: 700;
font-size: 20px;
line-height: 24px;
letter-spacing: -0.5px;

}




.property-details-Description {
    border-bottom: 1px solid #ffffff;
    padding: 0 0 10px 0;
}





.mobile-hide {
    display: none;
}



.agent-right-box-card-left-p{
  
font-weight: 400;
font-size: 16px;
line-height: 28px;
letter-spacing: 0%;
vertical-align: middle;

}

.agent-right-box-card-left-p span{

font-weight: 400;
font-size: 16px;
line-height: 28px;
letter-spacing: 0%;
vertical-align: middle;

}

.agent-info-right-box {
    gap: 5px;
}




.Description-second-box-two p{
font-weight: 400;
font-size: 16px;
line-height: 28px;
letter-spacing: 0%;
vertical-align: middle;

}

.Description-second-box-two h4{

font-weight: 600;
font-size: 18px;
line-height: 28px;
letter-spacing: 0%;


}


.agent-count-properties {

    flex-direction: column-reverse;
    margin: 70px 0 0 0;
    gap: 10px;
}

.mobile-show {

font-weight: 600;
font-size: 14px;
line-height: 28px;
letter-spacing: 0%;

    }


    .Description-big-box {
    margin: 40px 0;
}






/* card  */
.property-two-box-five {
    margin: 33px 0 0 0;
}

.location-property-two-box-three {
    margin: 10px 0 0 0;
}


/* card  */







        }


        @media (min-width: 951px) {
    .property-details-Description.mobile-show,
    .mobile-show-one,
    .agent-logo-container-show,
    .property-two-box-five-box
     {
        display: none !important;
    }
}

    </style>








<script>
    document.addEventListener("DOMContentLoaded", function () {
        const profileTab = document.querySelectorAll('.property-details-Description.mobile-show .active-filter-link')[0];
        const listingsTab = document.querySelectorAll('.property-details-Description.mobile-show .active-filter-link')[1];
        const agentLogoContainer = document.querySelector(".agent-logo-container-show");
        const mobileShowOne = document.querySelector(".mobile-show-one");
    
        function setActiveTab(tabName) {
            if (tabName === 'profile') {
                profileTab.classList.add("active-one-box");
                listingsTab.classList.remove("active-one-box");
                agentLogoContainer.style.display = "flex";
                mobileShowOne.style.display = "none";
            } else if (tabName === 'listings') {
                profileTab.classList.remove("active-one-box");
                listingsTab.classList.add("active-one-box");
                agentLogoContainer.style.display = "none";
                mobileShowOne.style.display = "flex";
            }
            sessionStorage.setItem("activeTab", tabName);
        }
    
        profileTab.addEventListener("click", function () {
            setActiveTab("profile");
        });
    
        listingsTab.addEventListener("click", function () {
            setActiveTab("listings");
        });
    
        // Only apply on screens smaller than 950px
        if (window.innerWidth <= 950) {
            const savedTab = sessionStorage.getItem("activeTab") || "profile";
            setActiveTab(savedTab);
        }
    });



            document.addEventListener("DOMContentLoaded", function () {
                const aboutText = document.querySelector('.about-text');
                const readMoreLink = document.querySelector('.about-us-bottom');
            
                if (!aboutText || !readMoreLink) return;
            
                const fullText = aboutText.innerText.trim();
                const charLimit = 700;
            
                if (fullText.length <= charLimit) {
                    readMoreLink.style.display = 'none';
                    return;
                }
            
                const shortText = fullText.slice(0, charLimit) + '...';
                let isExpanded = false;
            
                aboutText.innerText = shortText;
                aboutText.classList.add('collapsed');
            
                readMoreLink.addEventListener('click', function (e) {
                    e.preventDefault();
                    isExpanded = !isExpanded;
            
                    aboutText.classList.remove('fade-in', 'fade-out');
                    void aboutText.offsetWidth; // trigger reflow to restart animation
            
                    if (isExpanded) {
                        aboutText.classList.add('fade-in');
                        aboutText.innerText = fullText;
                        readMoreLink.innerHTML = 'SHOW LESS <img alt="arrow" src="{{ asset('assets/img/home/arrow.png') }}"/>';
                    } else {
                        aboutText.classList.add('fade-out');
                        aboutText.innerText = shortText;
                        readMoreLink.innerHTML = 'READ MORE <img alt="arrow" src="{{ asset('assets/img/home/arrow.png') }}"/>';
                    }
                });
            });
            </script>
            
@endsection
