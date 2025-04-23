@extends('layouts.front-office.app')
@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb bg_img pos-rel" data-background="{{ asset('/assets/img/bg/breadcrumb.jpg') }}">
        <div class="container">
            <div class="breadcrumb__content desk-user">
                <h2 class="breadcrumb__title my-account">Account</h2>
                <h2 class="breadcrumb__title saved-properties"> Saved Properties</h2>
                <h2 class="breadcrumb__title contacted-properties"> Contacted Properties</h2>
            </div>
            <div style="        justify-content: center;" class="breadcrumb__content mobile-user-two">
                <h2 class="breadcrumb__title">Account.</h2>
            </div>
        </div>
        <div class="breadcrumb__icon">
            <div class="icon icon--1">
                <img class="leftToRight" src="{{ asset('/assets/img/icon/bi_01.png') }}" alt="">
            </div>
            <div class="icon icon--2">
                <img class="topToBottom" src="{{ asset('/assets/img/icon/bi_02.png') }}" alt="">
            </div>
            <div class="icon icon--3">
                <img class="topToBottom" src="{{ asset('/assets/img/icon/bi_03.png') }}" alt="">
            </div>
            <div class="icon icon--4">
                <img class="leftToRight" src="{{ asset('/assets/img/icon/bi_04.png') }}" alt="">
            </div>
        </div>

    </section>
    <!-- breadcrumb end -->

    <div class="container container-user">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2 class="sidebar-h2">My Account</h2>
            <button class="nav-button button-my-account desk-user">
                <img class="nav-button-img" style="width: 35px;" src="{{ asset('/assets/img/user/use-one.png') }}"
                    alt="">
                Account
            </button>
            <button class="nav-button button-my-account mobile-user">
                <img class="nav-button-img" style="width: 40px;" src="{{ asset('/assets/img/user/user-man-green.png') }}"
                    alt="">
                {{ $user->email }}
                <img class="nav-button-img" style="width: 20px;" src="{{ asset('/assets/img/user/chevron.png') }}"
                    alt="">

            </button>
            <button class="nav-button button-saved-properties">
                <img class="nav-button-img" src="{{ asset('/assets/img/user/user-two.png') }}" alt="">
                Saved Properties
            </button>

            <button class="nav-button button-contacted-properties">
                <img class="nav-button-img" src="{{ asset('/assets/img/user/user-three.png') }}" alt="">
                Contacted Properties
            </button>
        </div>






        <!-- Main Content -->
        <div class="main my-account">
            <div class="form-wrapper">
                <div class="go-backto-sidebar mobile-user-two">
                    <img class="go-backto-sidebar-img" src="{{ asset('/assets/img/user/arrow-left.png') }}" alt="">
                    <span class="go-backto-sidebar-span">Personal Information</span>
                    <div></div>
                </div>
                <h3 class="desk-user main-h3">Personal Information</h3>
                <form method="POST" action="{{ route('user.account.update') }}">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-input" name="email" value="{{ $user->email }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-input" name="first_name" value="{{ $user->first_name }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-input" name="last_name" value="{{ $user->last_name }}" required>
                    </div>
                    <div class="phone-div">
                        <div style="width: 91px" class="form-group phone-group">
                            <select name="country_code" class="flag-select">
                                @foreach ($phonecodes as $phonecode)
                                    <option value="{{ $phonecode->phonecode }}"
                                        {{ $user->country_code == $phonecode->phonecode ? 'selected' : '' }}>
                                        {{ $phonecode->phonecode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" class="form-input" name="mobile_number"
                                value="{{ $user->mobile_number }}" required>
                        </div>
                    </div>

                    <button type="submit" class="button">Update</button>

                </form>
                <form class="log-out-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="button">Log Out</button>
                </form>
            </div>

        </div>

        <div class="main saved-properties">
            <div class="go-backto-sidebar mobile-user-two">
                <img class="go-backto-sidebar-img" src="{{ asset('/assets/img/user/arrow-left.png') }}" alt="">
                <span class="go-backto-sidebar-span">Saved Properties</span>
                <div></div>
            </div>
            <div class="user-account-filter">
                <form action="{{ route('user.account') }}" method="GET">
                    <div class="page-line-filter-links-two">
                        <img class="filter-links-two-img" src="{{ asset('assets/img/home/arrow.png') }}" alt="arrow">
                        <label class="lable-agent" for="sort-options">Category :</label>
                        <select name="saved_category" id="sort-options-two" onchange="this.form.submit()">
                            <option value="" {{ request('saved_category') == '' ? 'selected' : '' }}>All</option>
                            <option value="buy" {{ request('saved_category') == 'buy' ? 'selected' : '' }}>Buy</option>
                            <option value="rent" {{ request('saved_category') == 'rent' ? 'selected' : '' }}>Rent
                            </option>
                            <option value="commercial" {{ request('saved_category') == 'commercial' ? 'selected' : '' }}>
                                Commercial</option>
                            <option value="new_projects"
                                {{ request('saved_category') == 'new_projects' ? 'selected' : '' }}>New Projects</option>
                        </select>
                    </div>
                </form>
            </div>
            @if ($savedProperties && $savedProperties->isNotEmpty())
                @foreach ($savedProperties as $savedProperty)
                    @php
                        $property = $savedProperty->propertyable;
                    @endphp

                    <div class="saved-property-card">
                        @if ($property instanceof \App\Models\Listing)
                            <article style="cursor: pointer;"
                                onclick="window.location.href='{{ route('properties.show', ['property' => $property->property_ref_no]) }}'"
                                class="blog__item mt-30 blog__item-property">
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
                                            <img class="Favorite-green"
                                                src="{{ asset('assets/img/property/fiv-icon.png') }}" alt="Favorite">

                                        </button>
                                    </form>

                                    <img class="location-green"
                                        src="{{ asset('assets/img/property/location-green.png') }}" alt="location">
                                    <!-- Image Slider Count -->
                                    <div class="img-slider-count">
                                        <img class="" src="{{ asset('assets/img/property/cam.png') }}"
                                            alt="location">
                                        <p>{{ $property->images->count() }}</p>
                                    </div>


                                    <div class="budge-three-div">
                                        <!-- If Verified -->
                                        @if ($property->verified == 1)
                                            <p>
                                                <img class=""
                                                    src="{{ asset('assets/img/property/Verified-img.png') }}"
                                                    alt="location">
                                                Verified
                                            </p>
                                        @endif

                                        <!-- If SuperAgent -->
                                        @if ($property->superagent == 1)
                                            <p>
                                                <img class=""
                                                    src="{{ asset('assets/img/property/SuperAgent-img.png') }}"
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
                                    <div class="blog__item-property-two-big-box">
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
                                            <img src="{{ asset('assets/img/property/green-location.png') }}"
                                                alt="location">
                                            <p>Hattan, Arabian Ranches, Dubai</p>
                                        </div>
                                        <div class="property-two-box-four">
                                            {{-- Rooms --}}
                                            @if (isset($property->no_of_rooms) && $property->no_of_rooms > 0)
                                                <img class="img-four"
                                                    src="{{ asset('assets/img/property/green-bed.png') }}"
                                                    alt="bed">
                                                <p>{{ $property->no_of_rooms }}</p>
                                                <img src="{{ asset('assets/img/property/pipeline.png') }}"
                                                    alt="pipeline">
                                            @endif

                                            {{-- Bathrooms --}}
                                            @if (isset($property->no_of_bathroom) && $property->no_of_bathroom > 0)
                                                <img class="img-four"
                                                    src="{{ asset('assets/img/property/green-bath.png') }}"
                                                    alt="bath">
                                                <p>{{ $property->no_of_bathroom }}</p>
                                                <img src="{{ asset('assets/img/property/pipeline.png') }}"
                                                    alt="pipeline">
                                            @endif

                                            {{-- Built-Up Area --}}
                                            @if (isset($property->unit_builtup_area) && $property->unit_builtup_area > 0)
                                                <img class="img-four"
                                                    src="{{ asset('assets/img/property/green-size.png') }}"
                                                    alt="size">
                                                <p>{{ $property->unit_builtup_area }} {{ $property->unit_measure }}</p>
                                            @endif
                                        </div>
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
                                                data-property-type="listing" @endauth>

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
                        @elseif ($property instanceof \App\Models\HolidayProperty)
                            <article style="cursor: pointer;"
                                onclick="window.location.href='{{ route('holiday-properties.show', ['holidayProperty' => $property->reference_number]) }}'"
                                class="blog__item mt-30 blog__item-property">
                                <div class="blog__item-property-one swiper">
                                    <form action="{{ url('saved-properties') }}" method="POST" class="favorite-form"
                                        style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="propertyable_id" value="{{ $property->id }}">
                                        <input type="hidden" name="propertyable_type" value="holiday">
                                        <input type="hidden" name="property_ref_no"
                                            value="{{ $property->reference_number }}">

                                        <button class="Favorite-green" type="submit"
                                            style="background: none; border: none; padding: 0; cursor: pointer;">
                                            <img class="Favorite-green"
                                                src="{{ asset('assets/img/property/green-Favorite.png') }}"
                                                alt="Favorite">
                                            <img class="Favorite-green"
                                                src="{{ asset('assets/img/property/fiv-icon.png') }}" alt="Favorite">
                                        </button>
                                    </form>


                                    <img class="location-green"
                                        src="{{ asset('assets/img/property/location-green.png') }}" alt="location">
                                    <!-- Image Slider Count -->
                                    <div class="img-slider-count">
                                        <img class="" src="{{ asset('assets/img/property/cam.png') }}"
                                            alt="location">
                                        @php
                                            $images = $property->holidayPhotos;
                                        @endphp

                                        <p>{{ is_array($images) || $images instanceof Countable ? count($images) : 0 }}</p>

                                    </div>


                                    <div class="budge-three-div">
                                        <!-- If Verified -->
                                        @if ($property->verified == 1)
                                            <p>
                                                <img class=""
                                                    src="{{ asset('assets/img/property/Verified-img.png') }}"
                                                    alt="location">
                                                Verified
                                            </p>
                                        @endif

                                        <!-- If SuperAgent -->
                                        @if ($property->superagent == 1)
                                            <p>
                                                <img class=""
                                                    src="{{ asset('assets/img/property/SuperAgent-img.png') }}"
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
                                        @foreach ($property->holidayPhotos as $photo)
                                            <div class="swiper-slide">
                                                <img class="blog__item-property-one-img-slide" src="{{ $photo->url }}"
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
                                    <div class="blog__item-property-two-big-box">
                                        <div class="blog__item-property-two-box">
                                            @php
                                                $offeringTypeMap = [
                                                    'AP' => ['Apartment', 'apartment.png'],
                                                    'VH' => ['Villa', 'villa.png'],
                                                    'OF' => ['Office', 'office.png'],
                                                    'ST' => ['Studio', 'studio.png'],
                                                    // Add more types as needed
                                                ];

                                                $typeCode = $property->property_type;
                                                $offeringType = $offeringTypeMap[$typeCode] ?? [
                                                    'Unknown',
                                                    'default.png',
                                                ];
                                            @endphp

                                            <h1 class="blog__item-property-two-title">
                                                {{ $offeringType[0] }}
                                            </h1>

                                            <p>Premium</p>
                                        </div>
                                        <div class="blog__item-property-two-box-two">
                                            <div class="blog__item-property-two-box-one">
                                                {{-- <p class="box-two-p-one">
                {{ $property->getConvertedPrice()['converted_price'] }}({{ $property->getConvertedPrice()['currency_code'] }})
            </p> --}}
                                                <p class="box-two-p-two">
                                                    {{ $property->price }} AED
                                                </p>
                                            </div>

                                            <div class="blog__item-property-two-img">
                                                <img src="assets/img/property/state-logo.jpeg" alt="logo">
                                            </div>

                                        </div>
                                        <div class="blog__item-property-two-box-three">
                                            <p>{{ $property->title_en }}</p>
                                        </div>
                                        <div class="location-property-two-box-three">
                                            <img src="{{ asset('assets/img/property/green-location.png') }}"
                                                alt="location">
                                            <p>Hattan, Arabian Ranches, Dubai</p>
                                        </div>
                                        <div class="property-two-box-four">
                                            {{-- Rooms --}}
                                            @if (isset($property->bathroom) && $property->bathroom > 0)
                                                <img class="img-four"
                                                    src="{{ asset('assets/img/property/green-bed.png') }}"
                                                    alt="bed">
                                                <p>{{ $property->bathroom }}</p>
                                                <img src="{{ asset('assets/img/property/pipeline.png') }}"
                                                    alt="pipeline">
                                            @endif

                                            {{-- Bathrooms --}}
                                            @if (isset($property->bedroom) && $property->bedroom > 0)
                                                <img class="img-four"
                                                    src="{{ asset('assets/img/property/green-bath.png') }}"
                                                    alt="bath">
                                                <p>{{ $property->bedroom }}</p>
                                                <img src="{{ asset('assets/img/property/pipeline.png') }}"
                                                    alt="pipeline">
                                            @endif

                                            {{-- Built-Up Area --}}
                                            @if (isset($property->size) && $property->size > 0)
                                                <img class="img-four"
                                                    src="{{ asset('assets/img/property/green-size.png') }}"
                                                    alt="size">
                                                <p>d{{ $property->size }} Sq.Ft.</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="property-two-box-five">

                                        <div class="property-two-box-five-one">

                                            <div class="property-two-box-five-one-img">
                                                <img src="{{ asset($property->agent_photo) }}" alt="person">
                                            </div>
                                            <div class="property-two-box-five-one-name">
                                                <p>{{ $property->agent_name }}</p>
                                                <h4>Real Estate Agent</h4>
                                            </div>
                                        </div>


                                        <div class="property-two-box-five-two"
                                            @auth
data-user-id="{{ auth()->user()->id }}"
                                            data-property-id="{{ $property->id }}"
                                            data-property-ref="{{ $property->reference_number }}"
                                            data-url="{{ url()->current() }}"  
                                            data-property-type="holiday" @endauth>

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
                        @endif
                    </div>
                @endforeach

                {{-- end card   --}}
                {{ $savedProperties->links() }}
            @else
                <img src="{{ asset('/assets/img/user/no-saved-property.png') }}" alt="">
                <p class="saved-properties-one">No Saved Properties</p>
                <p class="saved-properties-two">
                    ​To save a property to your favorites, click the <span>heart icon</span> on any listing.
                    All your saved properties will be conveniently accessible here for easy viewing and management.
                </p>
            @endif
        </div>

        <div class="main contacted-properties">

            <div class="go-backto-sidebar mobile-user-two">
                <img class="go-backto-sidebar-img" src="{{ asset('/assets/img/user/arrow-left.png') }}" alt="">
                <span class="go-backto-sidebar-span">Contacted Properties</span>
                <div></div>
            </div>


            <div class="user-account-filter">
                <form class="search-form" action="{{ route('user.account') }}" method="GET">
                    <div class="page-line-filter-links-two">
                        <label for="sort-options">Agent Name :</label>


                        <span class="agent-account-search">
                            <img class="Vector-img-two" src="{{ asset('/assets/img/home/search-gray.png') }}"
                                alt="">
                            <input type="text" placeholder="Type Location or Agent Name" value=""
                                name="agent_search">
                        </span>
                    </div>
                </form>
                <form action="{{ route('user.account') }}" method="GET">
                    <div class="page-line-filter-links-two">
                        <img class="filter-links-two-img" src="{{ asset('assets/img/home/arrow.png') }}"
                            alt="arrow">
                        <label class="lable-agent" for="sort-options">Category :</label>
                        <select name="contacted_category" id="sort-options-two" onchange="this.form.submit()">
                            <option value="" {{ request('contacted_category') == '' ? 'selected' : '' }}>All
                            </option>
                            <option value="buy" {{ request('contacted_category') == 'buy' ? 'selected' : '' }}>Buy
                            </option>
                            <option value="rent" {{ request('contacted_category') == 'rent' ? 'selected' : '' }}>Rent
                            </option>
                            <option value="commercial"
                                {{ request('contacted_category') == 'commercial' ? 'selected' : '' }}>Commercial</option>
                            <option value="new_projects"
                                {{ request('contacted_category') == 'new_projects' ? 'selected' : '' }}>New Projects
                            </option>
                        </select>
                    </div>
                </form>

            </div>

            @if ($contactedProperties && $contactedProperties->isNotEmpty())
                @foreach ($contactedProperties as $savedProperty)
                    @php
                        $property = $savedProperty->propertyable;
                    @endphp

                    <div class="saved-property-card">
                        @if ($property instanceof \App\Models\Listing)
                            <article style="cursor: pointer;"
                                onclick="window.location.href='{{ route('properties.show', ['property' => $property->property_ref_no]) }}'"
                                class="blog__item mt-30 blog__item-property">
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
                                            @if ($savedProperty->favorite)
                                                <img class="Favorite-green"
                                                src="{{ asset('assets/img/property/fiv-icon.png') }}" alt="Favorite">
                                            @else
                                                <img class="Favorite-green"
                                                src="{{ asset('assets/img/property/green-Favorite.png') }}" alt="Favorite">
                                            @endif
                                        </button>
                                    </form>

                                    <img class="location-green"
                                        src="{{ asset('assets/img/property/location-green.png') }}" alt="location">
                                    <!-- Image Slider Count -->
                                    <div class="img-slider-count">
                                        <img class="" src="{{ asset('assets/img/property/cam.png') }}"
                                            alt="location">
                                        <p>{{ $property->images->count() }}</p>
                                    </div>


                                    <div class="budge-three-div">
                                        <!-- If Verified -->
                                        @if ($property->verified == 1)
                                            <p>
                                                <img class=""
                                                    src="{{ asset('assets/img/property/Verified-img.png') }}"
                                                    alt="location">
                                                Verified
                                            </p>
                                        @endif

                                        <!-- If SuperAgent -->
                                        @if ($property->superagent == 1)
                                            <p>
                                                <img class=""
                                                    src="{{ asset('assets/img/property/SuperAgent-img.png') }}"
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
                                    <div class="blog__item-property-two-big-box">
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
                                            <img src="{{ asset('assets/img/property/green-location.png') }}"
                                                alt="location">
                                            <p>Hattan, Arabian Ranches, Dubai</p>
                                        </div>
                                        <div class="property-two-box-four">
                                            {{-- Rooms --}}
                                            @if (isset($property->no_of_rooms) && $property->no_of_rooms > 0)
                                                <img class="img-four"
                                                    src="{{ asset('assets/img/property/green-bed.png') }}"
                                                    alt="bed">
                                                <p>{{ $property->no_of_rooms }}</p>
                                                <img src="{{ asset('assets/img/property/pipeline.png') }}"
                                                    alt="pipeline">
                                            @endif

                                            {{-- Bathrooms --}}
                                            @if (isset($property->no_of_bathroom) && $property->no_of_bathroom > 0)
                                                <img class="img-four"
                                                    src="{{ asset('assets/img/property/green-bath.png') }}"
                                                    alt="bath">
                                                <p>{{ $property->no_of_bathroom }}</p>
                                                <img src="{{ asset('assets/img/property/pipeline.png') }}"
                                                    alt="pipeline">
                                            @endif

                                            {{-- Built-Up Area --}}
                                            @if (isset($property->unit_builtup_area) && $property->unit_builtup_area > 0)
                                                <img class="img-four"
                                                    src="{{ asset('assets/img/property/green-size.png') }}"
                                                    alt="size">
                                                <p>{{ $property->unit_builtup_area }} {{ $property->unit_measure }}</p>
                                            @endif
                                        </div>
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
                                            data-property-type="listing" @endauth>

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
                        @elseif ($property instanceof \App\Models\HolidayProperty)
                            <article style="cursor: pointer;"
                                onclick="window.location.href='{{ route('holiday-properties.show', ['holidayProperty' => $property->reference_number]) }}'"
                                class="blog__item mt-30 blog__item-property">
                                <div class="blog__item-property-one swiper">
                                    <form action="{{ url('saved-properties') }}" method="POST" class="favorite-form"
                                        style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="propertyable_id" value="{{ $property->id }}">
                                        <input type="hidden" name="propertyable_type" value="holiday">
                                        <input type="hidden" name="property_ref_no"
                                            value="{{ $property->reference_number }}">

                                            <button class="Favorite-green" type="submit"
                                                style="background: none; border: none; padding: 0; cursor: pointer;">
                                                @if ($savedProperty->favorite)
                                                    <img class="Favorite-green"
                                                    src="{{ asset('assets/img/property/fiv-icon.png') }}" alt="Favorite">
                                                @else
                                                    <img class="Favorite-green"
                                                    src="{{ asset('assets/img/property/green-Favorite.png') }}" alt="Favorite">
                                                @endif
                                            </button>
                                    </form>


                                    <img class="location-green"
                                        src="{{ asset('assets/img/property/location-green.png') }}" alt="location">
                                    <!-- Image Slider Count -->
                                    <div class="img-slider-count">
                                        <img class="" src="{{ asset('assets/img/property/cam.png') }}"
                                            alt="location">
                                        @php
                                            $images = $property->holidayPhotos;
                                        @endphp

                                        <p>{{ is_array($images) || $images instanceof Countable ? count($images) : 0 }}
                                        </p>

                                    </div>


                                    <div class="budge-three-div">
                                        <!-- If Verified -->
                                        @if ($property->verified == 1)
                                            <p>
                                                <img class=""
                                                    src="{{ asset('assets/img/property/Verified-img.png') }}"
                                                    alt="location">
                                                Verified
                                            </p>
                                        @endif

                                        <!-- If SuperAgent -->
                                        @if ($property->superagent == 1)
                                            <p>
                                                <img class=""
                                                    src="{{ asset('assets/img/property/SuperAgent-img.png') }}"
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
                                        @foreach ($property->holidayPhotos as $photo)
                                            <div class="swiper-slide">
                                                <img class="blog__item-property-one-img-slide" src="{{ $photo->url }}"
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
                                    <div class="blog__item-property-two-big-box">
                                        <div class="blog__item-property-two-box">
                                            @php
                                                $offeringTypeMap = [
                                                    'AP' => ['Apartment', 'apartment.png'],
                                                    'VH' => ['Villa', 'villa.png'],
                                                    'OF' => ['Office', 'office.png'],
                                                    'ST' => ['Studio', 'studio.png'],
                                                    // Add more types as needed
                                                ];

                                                $typeCode = $property->property_type;
                                                $offeringType = $offeringTypeMap[$typeCode] ?? [
                                                    'Unknown',
                                                    'default.png',
                                                ];
                                            @endphp

                                            <h1 class="blog__item-property-two-title">
                                                {{ $offeringType[0] }}
                                            </h1>

                                            <p>Premium</p>
                                        </div>
                                        <div class="blog__item-property-two-box-two">
                                            <div class="blog__item-property-two-box-one">
                                                {{-- <p class="box-two-p-one">
            {{ $property->getConvertedPrice()['converted_price'] }}({{ $property->getConvertedPrice()['currency_code'] }})
        </p> --}}
                                                <p class="box-two-p-two">
                                                    {{ $property->price }} AED
                                                </p>
                                            </div>

                                            <div class="blog__item-property-two-img">
                                                <img src="assets/img/property/state-logo.jpeg" alt="logo">
                                            </div>

                                        </div>
                                        <div class="blog__item-property-two-box-three">
                                            <p>{{ $property->title_en }}</p>
                                        </div>
                                        <div class="location-property-two-box-three">
                                            <img src="{{ asset('assets/img/property/green-location.png') }}"
                                                alt="location">
                                            <p>Hattan, Arabian Ranches, Dubai</p>
                                        </div>
                                        <div class="property-two-box-four">
                                            {{-- Rooms --}}
                                            @if (isset($property->bathroom) && $property->bathroom > 0)
                                                <img class="img-four"
                                                    src="{{ asset('assets/img/property/green-bed.png') }}"
                                                    alt="bed">
                                                <p>{{ $property->bathroom }}</p>
                                                <img src="{{ asset('assets/img/property/pipeline.png') }}"
                                                    alt="pipeline">
                                            @endif

                                            {{-- Bathrooms --}}
                                            @if (isset($property->bedroom) && $property->bedroom > 0)
                                                <img class="img-four"
                                                    src="{{ asset('assets/img/property/green-bath.png') }}"
                                                    alt="bath">
                                                <p>{{ $property->bedroom }}</p>
                                                <img src="{{ asset('assets/img/property/pipeline.png') }}"
                                                    alt="pipeline">
                                            @endif

                                            {{-- Built-Up Area --}}
                                            @if (isset($property->size) && $property->size > 0)
                                                <img class="img-four"
                                                    src="{{ asset('assets/img/property/green-size.png') }}"
                                                    alt="size">
                                                <p>d{{ $property->size }} Sq.Ft.</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="property-two-box-five">

                                        <div class="property-two-box-five-one">

                                            <div class="property-two-box-five-one-img">
                                                <img src="{{ asset($property->agent_photo) }}" alt="person">
                                            </div>
                                            <div class="property-two-box-five-one-name">
                                                <p>{{ $property->agent_name }}</p>
                                                <h4>Real Estate Agent</h4>
                                            </div>
                                        </div>


                                        <div class="property-two-box-five-two"
                                            @auth
data-user-id="{{ auth()->user()->id }}"
                                        data-property-id="{{ $property->id }}"
                                        data-property-ref="{{ $property->reference_number }}"
                                        data-url="{{ url()->current() }}"  
                                        data-property-type="holiday" @endauth>

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
                        @endif
                    </div>
                @endforeach

                {{-- end card   --}}
                {{ $savedProperties->links() }}
            @else
            <img src="{{ asset('/assets/img/user/contact-animated.png') }}" alt="">
            <p class="saved-properties-one">No Contacted Properties</p>
            <p class="saved-properties-two">You haven't reached out to any properties yet. To inquire about a property,
                click the <span>"Send Message"</span> button or any of the contact links like Whatsapp, Email, or
                Telephone
                on any listing. All your contacted properties will be conveniently accessible here for easy reference
                and
                follow-up.</p>
            @endif






        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const navButtons1 = document.querySelectorAll(".button-contacted-properties");
            const navButtons2 = document.querySelectorAll(".button-saved-properties");
            const navButtons3 = document.querySelectorAll(".button-my-account");

            const breadcrumb1 = document.querySelectorAll(".saved-properties");
            const breadcrumb2 = document.querySelectorAll(".my-account");
            const breadcrumb3 = document.querySelectorAll(".contacted-properties");

            const sidebar = document.querySelectorAll(".sidebar");
            const goBacktoSidebar = document.querySelectorAll(".go-backto-sidebar");

            function handleButtonClick(buttons, breadcrumbToShow, breadcrumbToHide1, breadcrumbToHide2, key) {
                buttons.forEach(btn => {
                    btn.addEventListener("click", function() {
                        // Save the key to sessionStorage
                        sessionStorage.setItem("lastClicked", key);

                        breadcrumbToShow.forEach(breadcrumb => {
                            breadcrumb.style.display = "flex";
                        });

                        breadcrumbToHide1.forEach(breadcrumb => {
                            breadcrumb.style.display = "none";
                        });
                        breadcrumbToHide2.forEach(breadcrumb => {
                            breadcrumb.style.display = "none";
                        });

                        if (window.innerWidth <= 900) {
                            sidebar.forEach(side => {
                                side.style.display = "none";
                            });
                        }
                    });
                });
            }

            // Initial state for small screens
            if (window.innerWidth <= 900) {
                breadcrumb1.forEach(breadcrumb => breadcrumb.style.display = "none");
                breadcrumb2.forEach(breadcrumb => breadcrumb.style.display = "none");
                breadcrumb3.forEach(breadcrumb => breadcrumb.style.display = "none");

                sidebar.forEach(side => side.style.display = "flex");

                goBacktoSidebar.forEach(goBackBtn => {
                    goBackBtn.addEventListener("click", function() {
                        sidebar.forEach(side => side.style.display = "flex");
                        breadcrumb1.forEach(breadcrumb => breadcrumb.style.display = "none");
                        breadcrumb2.forEach(breadcrumb => breadcrumb.style.display = "none");
                        breadcrumb3.forEach(breadcrumb => breadcrumb.style.display = "none");
                    });
                });
            }

            // Setup event listeners and store keys
            handleButtonClick(navButtons3, breadcrumb2, breadcrumb1, breadcrumb3, "my-account");
            handleButtonClick(navButtons2, breadcrumb1, breadcrumb2, breadcrumb3, "saved-properties");
            handleButtonClick(navButtons1, breadcrumb3, breadcrumb1, breadcrumb2, "contacted-properties");

            // Restore state after refresh
            const lastClicked = sessionStorage.getItem("lastClicked");
            if (lastClicked) {
                switch (lastClicked) {
                    case "my-account":
                        navButtons3[0]?.click();
                        break;
                    case "saved-properties":
                        navButtons2[0]?.click();
                        break;
                    case "contacted-properties":
                        navButtons1[0]?.click();
                        break;
                }
            } else {
                // Default display for large screens if no session storage
                if (window.innerWidth > 900) {
                    breadcrumb2.forEach(breadcrumb => breadcrumb.style.display = "flex");
                    breadcrumb1.forEach(breadcrumb => breadcrumb.style.display = "none");
                    breadcrumb3.forEach(breadcrumb => breadcrumb.style.display = "none");
                }
            }
        });
    </script>





    <style>
        .nav-button.active {
            background: #0D1226;
        }

        .breadcrumb__title {
            text-align: center;
            justify-content: center;
        }

        .phone-div {
            display: flex;
            gap: 5px;
        }

        .container-user {
            display: flex;
            flex-direction: row;
        }

        .sidebar {
            width: 30%;
            border-right: 1px solid #333;
            padding: 40px 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar .sidebar-h2 {

            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 18px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #FFFFFF;
            text-align: center;
            margin-bottom: 50px;
        }

        .nav-button {
            background-color: #0f172a;
            padding: 20px;
            border-radius: 6px;
            border: 1px solid transparent;
            width: 100%;
            margin-bottom: 20px;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            max-width: 300px;
            align-self: center;


            color: #FFFFFF;


            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 20px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;

        }

        .nav-button .nav-button-img {
            width: 40px;
        }


        .main {
            width: 70%;
            padding: 40px;
            box-sizing: border-box;

            display: flex;
            flex-direction: column;
            align-items: center;

            /*
                                            gap: 36px; */
            align-content: center;
            align-items: center;

        }


        .contacted-properties,
        .saved-properties {
            gap: 36px;
        }

        .main .main-h3 {



            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 18px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;
            color: #FFFFFF;

        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
            width: 100%;
        }

        .form-label {
            display: block;
            font-size: 12px;
            margin-bottom: 5px;
            color: #aaa;
            position: absolute;
            left: 20px;
            top: 10px;

            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 100%;
            letter-spacing: 0%;
            vertical-align: middle;

        }

        .saved-property-card {
            width: 100%;
        }

        .go-backto-sidebar {
            display: flex;
            align-content: center;
            align-items: center;
            justify-content: space-between;
            margin: 0 0 60px 0;
        }

        .go-backto-sidebar .go-backto-sidebar-span {

            font-family: "Manrope", sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;

        }

        .go-backto-sidebar .go-backto-sidebar-img {
            width: 50px !important;
        }

        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            height: 67px;
            padding: 22px 20px 5px 20px;
            border-radius: 6px;
            border: 1px solid #333;
            background-color: #0f172a;
            color: #fff;
            font-size: 18px;
            font-family: "Manrope", sans-serif;
            font-weight: 400;
            line-height: 100%;
            letter-spacing: 0%;
            vertical-align: middle;
            transition: border 0.3s ease;
        }

        .form-group input[type="text"]:hover,
        .form-group input[type="password"]:hover,
        .form-group input[type="email"]:hover,
        .form-group input[type="tel"]:hover,
        .form-group select:hover,
        .form-group textarea:hover,
        .form-group input[type="text"]:focus,
        .form-group input[type="password"]:focus,
        .form-group input[type="email"]:focus,
        .form-group input[type="tel"]:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border: 2px solid #2DD98F;
            outline: none;
        }

        .phone-group {
            display: flex;
            gap: 10px;
        }

        .flag-select {
            width: 100px;
            height: 67px;
            border-radius: 6px;
            border: 1px solid #333;
            background-color: #0f172a;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
        }

        .button {
            width: 100%;
            height: 67px;

            background: #080B18;
            border-radius: 6px;
            border: 1px solid #333;
            font-size: 16px;
            margin-bottom: 20px;
            cursor: pointer;

            color: #92939E;


            font-family: "Outfit", sans-serif;
            font-weight: 500;
            font-size: 14px;
            line-height: 28px;
            letter-spacing: 0%;
            vertical-align: middle;
            text-transform: capitalize;


        }

        .saved-properties .saved-properties-img {
            width: 150px;
        }

        .saved-properties-one {
            font-family: "Outfit", sans-serif;
            font-weight: 600;
            font-size: 40px;
            line-height: 18px;
            letter-spacing: 0%;
            text-align: center;
            vertical-align: middle;
            color: #FFFFFF;

        }

        .saved-properties-two {
            font-family: "Outfit", sans-serif;
            font-weight: 600;
            font-size: 18px;
            line-height: 100%;
            letter-spacing: 0%;
            text-align: center;
            vertical-align: middle;
            color: #FFFFFF;
            max-width: 639px;
            text-align: center;
            margin: 0 auto;
        }


        .saved-properties-two span {
            color: #2DD98F;

        }


        .user-account-filter {
            display: flex;
            width: 100%;
            justify-content: flex-end;
            align-items: center;
            gap: 20px;
        }

        .Vector-img-two {
            width: 21px;
        }

        .mobile-user {
            border: 1px solid #FFFFFF1A;
            background-color: black;
            justify-content: space-between;
            display: none;

        }

        .mobile-user-two {
            display: none;
        }


        /* crads  */
        .box-two-p-one {
            font-size: 18px;
        }

        .box-two-p-two {
            font-size: 17px;
        }

        .agent-account-search {
            border: 1px solid #41445C;
            padding: 4px 15px 4px 8px;
            background: none;
            border-radius: 3px;
            border-width: 1px;
            display: flex;

            align-items: center;
            gap: 13px;

        }



        .swiper-slide img {
            border-radius: 5px 0 0 5px;
        }

        .blog__item-property-two {
            padding: 20px 15px;
            display: flex;
            flex-direction: column;
            /* width: 100%; */
            justify-content: space-between;
        }

        .blog__item-property-two-big-box {
            display: flex;
            width: 100%;
            flex-direction: column;
        }

        @media (min-width: 1024px) {
            .container {
                max-width: 1500px;

            }
        }

        .property-two-box-five {
            margin: 30px 0 0 0;
            width: 100%;

        }

        .property-two-box-five-two a {
            font-size: 12px;
        }


        .blog__item-property-two-box-one {
            display: flex;
            align-items: center;
            gap: 5px;
            margin: 0;
        }

        .location-property-two-box-three {
            margin: 10px 0 0 0;
            display: flex;
            align-items: center;
            gap: 5px;
        }



        .agent-account-search input[type="text"] {
            background: #080b18;
            color: white;
        }


        @media (max-width: 986px) {
            .lable-agent {
                display: block !important;

            }


            .user-account-filter {

                justify-content: flex-start;
                display: flex;
                width: 100%;
                justify-content: flex-end;
                align-items: flex-start;
                gap: 20px;
                flex-direction: column;
            }
        }

        @media (max-width: 900px) {
            .mobile-user {
                display: flex;
            }


            .mobile-user-two {
                display: flex;
                width: 100%;

            }

            .search-form {
                width: 100%;
            }

            .container-user {
                flex-direction: column;
                min-height: fit-content;
            }

            .sidebar {
                width: 100%;
                padding: 20px;
                align-items: stretch;
            }

            .main {
                width: 100%;
                padding: 20px 0 0 0;
            }

            .go-backto-sidebar {
                margin: 0 0 10px 0;
            }

            .main form,
            .nav-button {
                max-width: 100%;
            }

            .nav-button {
                padding: 10px 20px;
            }

            .form-input,
            .button {
                width: 100%;
            }

            .phone-group {
                flex-direction: column;
            }

            .flag-select {
                width: 100%;
            }


            .sidebar {
                border-right: 0px;
            }

            .desk-user {
                display: none;
            }

            .agent-account-search {
                width: 100%;

            }

            .nav-button {
                font-weight: 400;
                font-size: 18px;
                line-height: 28px;
                letter-spacing: 0%;
                vertical-align: middle;

            }

            .contacted-properties, .saved-properties {
    gap: 17px;
}
            .saved-properties-one {
            line-height: 35px;
 

        }
        }
    </style>
@endsection
