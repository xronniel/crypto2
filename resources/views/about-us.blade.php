@extends('layouts.front-office.app')


@section('content')
<style>
    .swiper-section {
  width: 100%;
  padding: 20px;
}

.swiper {
  width: 100%;
  height: auto;
}

.swiper-slide img {
  width: 100%;
  height: auto;
  display: block;
  border-radius: 16px;
  object-fit: cover;
}
</style>

<div class="container">
    <h1>About Us Page</h1>

    {{-- About Us Data --}}
    {{-- @foreach($aboutUs as $about)
        <section>
            <h2>{{ $about->hero_title }}</h2>
            <p>{{ $about->hero_text }}</p>
            @if($about->image)
                <img src="{{ asset('storage/' . $about->image) }}" alt="About Us Image" width="300">
            @endif
        </section>
    @endforeach --}}

    {{-- Our Team Data --}}
    {{-- @if($ourTeam->count() > 0)
        <section>
            <h2>Our Team</h2>
            <div class="row">
                @foreach($ourTeam as $teamMember)
                    <div class="col-md-4">
                        <div>
                            @if($teamMember->image)
                                <img src="{{ asset('storage/' . $teamMember->image) }}" class="card-img-top" alt="{{ $teamMember->name }}">
                            @endif
                            <div>
                                <h5 class="card-title">{{ $teamMember->name }}</h5>
                                <p class="card-text">{{ $teamMember->role }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif --}}

    {{-- Our Commitment Data --}}
    {{-- @if($ourCommitment->count() > 0)
        <section>
            <h2>Our Commitment</h2>
            @foreach($ourCommitment as $commitment)
                <p><strong>{{ $commitment->title }}</strong></p>
                <p>{{ $commitment->text }}</p>
                @if($commitment->icon)
                    <img src="{{ asset('storage/' . $commitment->icon) }}" alt="Commitment Icon" width="50">
                @endif
            @endforeach
        </section>
    @endif --}}

    {{-- Crypto Home In Figures --}}
    {{-- @if($cryptoHomeInFigures->count() > 0)
        <section>
            <h2>Crypto Home In Figures</h2>
            <ul>
                @foreach($cryptoHomeInFigures as $figure)
                    <li>
                        <strong>{{ $figure->title }}:</strong> {{ $figure->text }} 
                        @if($figure->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </section>
    @endif --}}


<section class="partners z-3">
    <div class="patners-title text-center">
        <span>
            <img src="assets/img/partner/partner_07.png" alt="">
            our top partners
            <img src="assets/img/partner/partner_08.png" alt="">
        </span>
    </div>

    <div class="partner-active partner-slider ul_li">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="xb-item--brand">
                    <div class="xb-item--brand_logo">
                        <img src="assets/img/about/content-about-img1.jpg" alt="">
                    </div>
                    <span>Partner One</span>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="xb-item--brand">
                    <div class="xb-item--brand_logo">
                        <img src="assets/img/about/content-about-img1.jpg" alt="">
                    </div>
                    <span>Partner Two</span>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="xb-item--brand">
                    <div class="xb-item--brand_logo">
                        <img src="assets/img/about/content-about-img1.jpg" alt="">
                    </div>
                    <span>Partner Three</span>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="xb-item--brand">
                    <div class="xb-item--brand_logo">
                        <img src="assets/img/about/content-about-img1.jpg" alt="">
                    </div>
                    <span>Partner Four</span>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="xb-item--brand">
                    <div class="xb-item--brand_logo">
                        <img src="assets/img/about/content-about-img1.jpg" alt="">
                    </div>
                    <span>Partner Five</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="custom-swiper-section z-3">
  <div class="custom-swiper myCustomSwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="assets/img/about/content-about-img1.jpg" alt="Slide 1" />
      </div>
      <div class="swiper-slide">
        <img src="/assets/img/about/about-icon1.png" alt="Slide " />
      </div>
      <div class="swiper-slide">
        <img src="/assets/img/about/about-icon1.png" alt="Slide 3" />
      </div>
      <div class="swiper-slide">
        <img src="/assets/img/about/about-icon1.png" alt="Slide 4" />
      </div>
      <div class="swiper-slide">
        <img src="assets/img/about/content-about-img1.jpg" alt="Slide 5" />
      </div>
    </div>

    <!-- Optional navigation buttons -->
    <div class="swiper-button-next custom-swiper-next"></div>
    <div class="swiper-button-prev custom-swiper-prev"></div>

    <!-- Optional pagination -->
    <div class="swiper-pagination custom-swiper-pagination"></div>
  </div>
</section>

</div>

<style>
  .custom-swiper-section {
    padding: 10px 50px;
    background-color: white;
    overflow: hidden;
  }
  .myCustomSwiper {
  width: 90%;
  margin: auto;
  position: relative;
  overflow: hidden; /* 👈 This hides the overflow from other slides */
}

.myCustomSwiper .swiper-slide {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 300px; /* 👈 Set a fixed height for consistent vertical alignment */
}

.myCustomSwiper .swiper-slide img {
  max-height: 100%; /* 👈 Restrict the image's height to container */
  width: auto;       /* Maintain aspect ratio */
  object-fit: contain; /* Prevent cropping */
  border-radius: 12px;
}

  .custom-swiper-prev,
  .custom-swiper-next {
    color: #000;
  }
</style>
    

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper(".myCustomSwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".custom-swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".custom-swiper-next",
        prevEl: ".custom-swiper-prev",
      },
      breakpoints: {
        320: {
          slidesPerView: 1.2,
          spaceBetween: 10,
        },
        640: {
          slidesPerView: 2.2,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 3.5,
          spaceBetween: 30,
        },
      },
    });
  });
</script>

@endsection
