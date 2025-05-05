
@foreach ($properties as $property)
<div
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
                {{-- <p>{{ $property->images->count() }}</p> --}}
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
                @foreach ($property->photos as $photo)
                    <div class="swiper-slide">
                        <img class="blog__item-property-one-img-slide"
                            {{-- src="{{ $property->xml ? $photo->url : asset('storage/' . $photo->url) }}" --}}
                            src="{{ $photo->url  }}"
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
                        {{-- {{ $property->getConvertedPrice()['converted_price'] }}({{ $property->getConvertedPrice()['currency_code'] }}) --}}
                        {{ $property->price }}  AED
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

{{-- crads  --}}