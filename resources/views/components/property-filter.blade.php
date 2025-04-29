<div class="container">
    <form action="{{ route('properties.index') }}" method="GET">
        @csrf


    {{-- Insert hidden fields for current request, excluding 'page' and fields already present manually --}}
    @php
    $excluded = [
        'page', 
        'search', 
        'filter_type', 
        'property_type', 
        'min_price', 
        'max_price', 
        'min_area', 
        'max_area', 
        'search-filters', 
        'furnishing', 
        'completion', 
        'amenities'
    ];
@endphp

@foreach(request()->except($excluded) as $key => $value)
    @if(is_array($value))
        @foreach($value as $item)
            <input type="hidden" name="{{ $key }}[]" value="{{ $item }}">
        @endforeach
    @else
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endif
@endforeach

        <div class="property-filter-box">

            <div class="property-filter property-filter-header">
                <button type="submit" class="search-button-property">
                    <img src="{{ asset('assets/img/property/search.png') }}" alt="search">
                </button>
                <input type="text" placeholder="City, community or building" value="" name="search">
            </div>

            <div class="property-filter-two">
                <div class="back-filter-box" onclick="window.location.href='/'">
                    <img class="back-filter-img" src="{{ asset('assets/img/home/return-icon.svg') }}" alt="arrow">

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
                    <button type="button" class="done-btn" onclick="closeDropdownArea('areaDropdown')">Done</button>
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

                    <button type="button" class="done-btn" onclick="closeDropdowntwo('priceDropdown')">Done</button>
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

                        <div class="property-filter property-filter-model">
                            <img style="
                            position: absolute;
                            top: 0;
                            bottom: 0;
                            margin: auto;
                            left: 2%;
                            filter: brightness(0) invert(0);
                            "
                                src="{{ asset('assets/img/property/search.png') }}" alt="search">
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
                            <button type="button" class="furnished" data-value="unfurnished">Unfurnished</button>
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
