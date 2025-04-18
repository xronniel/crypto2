@extends('layouts.front-office.app')

@section('content')
<div class="about-mainContainer">
<section class="hero-section-about-us hero-about">
    <div class="hero-img" data-background="assets/img/bg/hero-bg2.png"></div>
    @if($aboutUs->count() > 0)
  @foreach($aboutUs as $about)  
    <div class="container hero-two title-bg">
    
      <h1 class="aboutUs_title">
        {{ $about->hero_title }}
      </h1>
      <p class="landing-text">
        {{$about->hero_text}}
      </p>
  @endforeach
@endif
      {{-- header buttons --}}
      <div class="hero__btn btns pt-50 wow fadeInUp" data-wow-duration=".7s" data-wow-delay="350ms">
        <a class="them-btn">
          <span class="btn_label" data-text="Explore Properties">Explore Properties</span>
          <span class="btn_icon">
              <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"></path>
                </svg>
          </span>
        </a>
      <a href="contact.html" class="them-btn btn-transparent">
          <span class="btn_label" data-text="Discover New Projects">Discover New Projects</span>
          <span class="btn_icon">
              <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"></path>
                </svg>
          </span>
      </a>
     </div>
    </div>
    <img src="/assets/img/about/about-icon1.png" alt="about icon" class="about-icon" />
    <img src="/assets/img/about/about-icon2.png" alt="about icon" class="about-icon2" />
  </section>

  {{-- about us content section --}}
  <section class="about-glass-section">
    <div class="glass-img-wrapper">
      <img src="/assets/img/about/content-about-img1.jpg" alt="About Image" />
    </div>
    <img src="/assets/img/about/icons/icon1.png" class="icons1" alt="About Image" />
    <img src="/assets/img/about/icons/icon2.png" class="icons2" alt="About Image" />
    <img src="/assets/img/about/icons/icon3.png" class="icons3" alt="About Image" />
    <img src="/assets/img/about/icons/icon4.png" class="icons4" alt="About Image" />
  </section>

  {{-- commitment section --}}
  <section class="commitment-section">
    <div class="container">
      <h2 class="commitment-title">Our Commitment</h2>
      <div class="commitment-cards">
        <!-- Card 1 -->
        @if($ourCommitment->count() > 0)
        <div class="card-wrapper-about">
          @foreach($ourCommitment as $commitment)
            <div class="commitment-card">
              @if($commitment->icon)
                <div class="icon-placeholder">
                  <img src="{{ asset('storage/' . $commitment->icon) }}" alt="about icon" class="commitment1" />
                </div>
              @endif    
              <h3 class="commit-title">{{ $commitment->title }}</h3>
              <p>{{ $commitment->text }}</p>
            </div>
          @endforeach
        </div>
      @endif
        <!-- Card 2 -->
        {{-- <div class="card-wrapper-about">
        <div class="commitment-card">
          <div class="icon-placeholder"><img src="/assets/img/about/about-commitment2.png" alt="about icon" class="commitment1" /></div>
          <h3 class="commit-title">Investment Opportunities</h3>
          <p>
            Offering access to a diverse listing of residential and commercial properties, including new developments and holiday homes, all accessible through cryptocurrency.
          </p>
        </div>
        </div> --}}
        <!-- Card 3 -->
        {{-- <div class="card-wrapper-about">
        <div class="commitment-card">
          <div class="icon-placeholder"><img src="/assets/img/about/about-commitment3.png" alt="about icon" class="commitment1" /></div>
          <h3 class="commit-title">Trusted Expertise</h3>
          <p>
            Providing guidance from seasoned real estate agents who understand both the real estate market and the nuances of cryptocurrency, ensuring informed decision-making.
          </p>
        </div>
        </div> --}}
        <!-- Card 4 -->
        {{-- <div class="card-wrapper-about">
        <div class="commitment-card">
          <div class="icon-placeholder"><img src="/assets/img/about/about-commitment1.png" alt="about icon" class="commitment1" /></div>
          <h3 class="commit-title">Transparent and Secure Processes</h3>
          <p>
            Our platform ensures that all property dealings are conducted with ethical integrity, providing clients with a trustworthy environment for their real estate investments.
          </p>
        </div>
        </div> --}}
      </div>
    </div>
    <img src="/assets/img/about/icons/icon3.png" class="icons5" alt="About Image" />
  </section>


 <!-- what we offer section -->
<section class="what-we-offer-section">
    <div class="offer-container container">
      <h2 class="offer-title">What We Offer</h2>

      <div class="offer-main-flex">
        <!-- Left Side -->
        <div class="offer-left">
          <!-- Top Row: 2 Cards -->
          @if($aboutUs->count() > 0)
          @foreach($aboutUs as $about)
            <div class="offer-row position-relative">
              <div class="offer-card">
                <h4>{{ $about->wwo_section1_title1 }}</h4>
                <p>{{ $about->wwo_section1_text1 }}</p>
              </div>
              <div class="offer-card">
                <h4>{{ $about->wwo_section1_title2 }}</h4>
                <p>{{ $about->wwo_section1_text2 }}</p>
              </div>
              <img src="/assets/img/about/wwo-img1.png" alt="about icon" class="wwo1" />
            </div>
          @endforeach
        @endif
  
            <!-- Bottom Row: 3 Cards -->
            @if($aboutUs->count() > 0)
            @foreach($aboutUs as $about)
                
                <div class="offer-row2">
                <div class="offer-card">
                    <h4>{{ $about->wwo_section2_title1 }}</h4>
                    <p>{{ $about->wwo_section2_text1 }}</p>
                </div>
                <div class="offer-card">
                    <h4>{{ $about->wwo_section2_title2 }}</h4>
                    <p>{{ $about->wwo_section2_text2 }}</p>
                </div>
                <div class="offer-card">
                    <h4>{{ $about->wwo_section2_title3 }}</h4>
                    <p>{{ $about->wwo_section2_text3 }}</p>
                </div>
                </div>
            @endforeach
            @endif
         
        </div>
  
        <!-- Right Side: Single Card -->
        <div class="offer-right">
     @if($aboutUs->count() > 0)
     @foreach($aboutUs as $about)
          <div class="offer-card2 full-height">
            <img src="{{ asset('storage/' . $about->wwo_section3_icon) }}" class="wwo2">
            {{-- <img src="/assets/img/about/wwo-img2.png" alt="about icon" class="wwo2" /> --}}
            <div>
            <h4 class="mt-4">{{ $about->wwo_section3_title1 }}</h4>
            <p>{{ $about->wwo_section3_text1 }}</p>
             </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>

      {{--  cryptohomes in figures --}}
      <div class="mt-5">
        <h2 class="offer-title">CryptoHomes In Figures</h2>
        
        <div class="figures-grid">
          <!-- Card 1 -->
          @if($cryptoHomeInFigures->count() > 0)
  @foreach($cryptoHomeInFigures as $figure)
    <div class="figure-card">
      <img src="/assets/img/about/ww0-img3.png" alt="card bg" class="card-bg">
      <div class="card-content">
        <h3>{{ $figure->title }}</h3>
        <p>{{ $figure->text }}</p>
      </div>
    </div>
    <img src="/assets/img/about/divider.png" alt="divider" class="figure-divider">
  @endforeach
@endif
          
          <!-- Card 2 -->
          {{-- <div class="figure-card">
            <img src="/assets/img/about/ww0-img3.png" alt="card bg" class="card-bg">
            <div class="card-content">
              <h3>150</h3>
              <p>Verified Agents</p>
            </div>
          </div>
          <img src="/assets/img/about/divider.png" alt="divider" class="figure-divider"> --}}
          
          <!-- Card 3 -->
          {{-- <div class="figure-card">
            <img src="/assets/img/about/ww0-img3.png" alt="card bg" class="card-bg">
            <div class="card-content">
              <h3>05K+</h3>
              <p>Successful Property Transactions</p>
            </div>
          </div>
          <img src="/assets/img/about/divider.png" alt="divider" class="figure-divider"> --}}
          
          <!-- Card 4 -->
          {{-- <div class="figure-card">
            <img src="/assets/img/about/ww0-img3.png" alt="card bg" class="card-bg">
            <div class="card-content">
              <h3>555%</h3>
              <p>Responsive Agents</p>
            </div>
          </div> --}}
        </div>
      </div>


      {{-- last --}}
    </div>
    <img src="/assets/img/about/icons/icon5.png" class="icons6" alt="About Image" />
    <img src="/assets/img/about/icons/icon5.png" class="icons7" alt="About Image" />
  </section>


  {{-- our team section --}}
  <section class="team pt-140 pb-140">
    <div class="container">
        <div class="section-title pb-35">
            <h1 class="team-title">Our Team</h1>
        </div>
        <div class="row">
            <div class="col-lg-4">
                @php
                  $firstMember = $ourTeam[0];
                @endphp
                <div onclick="showModal('{{$firstMember->name }}', '{{ $firstMember->role }}', '{{ $firstMember->email }}', '{{ asset('storage/' . $firstMember->image) }}', {{ $firstMember->mobile }})" class="xb-team xb-team1 text-center">
                    <div class="xb-item--img pos-rel">
                        <img src="{{ asset('storage/' . $firstMember['image']) }}" alt="{{ $firstMember['name'] }}">
                    </div>
                    <div class="xb-item--holder">
                        <h2 class="xb-item--title">{{ $firstMember['name'] }}</h2>
                        <span class="xb-item--sub-title">{{ $firstMember['role'] }}</span>
                    </div>
                </div>
            </div>
            {{-- childs --}}
            <div class="col-lg-8 ">
                <div class="row xb-team-right">
                    @foreach($ourTeam->slice(1)->values() as $member)
                    <div class="col-lg-4 col-md-6">
                        
                        <div class="xb-team text-center">
                          <div onclick="showModal('{{ $member->name }}', '{{ $member->role }}', '{{ $member->email }}', '{{ asset('storage/' . $member->image) }}', '{{ $member->mobile }}')" class="xb-item--img">
                            <img src="{{ asset('storage/' . $member['image']) }}" alt="{{ $member['name'] }}">
                          </div>
                          <div class="xb-item--holder">
                            <h2 class="xb-item--title">{{ $member['name'] }}</h2>
                            <span class="xb-item--sub-title">{{ $member['role'] }}</span>
                          </div>
                        </div>
                     
                      </div>
                      @endforeach
                    {{-- <div class="col-lg-4 col-md-6">
                        <div onclick="showModal()" class="xb-team text-center">
                            <div class="xb-item--img pos-rel">
                                <img src="assets/img/team/member03.png" alt="">
                            </div>
                            <div class="xb-item--holder">
                                <h2 class="xb-item--title">James William</h2>
                                <span class="xb-item--sub-title">Data Analyst</span>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-lg-4 col-md-6">
                        <div onclick="showModal()" class="xb-team text-center">
                            <div class="xb-item--img pos-rel">
                                <img src="assets/img/team/member04.png" alt="">
                            </div>
                            <div class="xb-item--holder">
                                <h2 class="xb-item--title">Robert David</h2>
                                <span class="xb-item--sub-title">Visual Designer</span>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div onclick="showModal()" class="col-lg-4 col-md-6">
                        <div class="xb-team text-center">
                            <div class="xb-item--img pos-rel">
                                <img src="assets/img/team/member05.png" alt="">
                            </div>
                            <div class="xb-item--holder">
                                <h2 class="xb-item--title">John Michael</h2>
                                <span class="xb-item--sub-title">Legal & DPO</span>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div onclick="showModal()" class="col-lg-4 col-md-6">
                        <div class="xb-team text-center">
                            <div class="xb-item--img pos-rel">
                                <img src="assets/img/team/member06.png" alt="">
                            </div>
                            <div class="xb-item--holder">
                                
                                <h2 class="xb-item--title">Charles Thomas</h2>
                                <span class="xb-item--sub-title">Content Writer</span>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div onclick="showModal()" class="col-lg-4 col-md-6">
                        <div class="xb-team text-center">
                            <div class="xb-item--img pos-rel">
                                <img src="assets/img/team/member07.png" alt="">
                            </div>
                            <div class="xb-item--holder">
                                
                                <h2 class="xb-item--title">Daniel Matthew</h2>
                                <span class="xb-item--sub-title">Project Manager</span>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>


{{-- modal section --}}
<!-- Modal Section -->
<section>
    <div class="custom-modal-about" id="personModal">
      <div class="modal-content-about">
        <!-- Left Side: Person Data -->
        <div class="modal-left">
          <h2 class="modalName2" id="modalName">John Doe</h2>
          <p class="modalrole2" id="modalRole">Position: Senior Developer</p><br>
          <p id="modalEmail">Email: john@example.com</p>
          <p id="modalMobile">Mobile: john@example.com</p>
        </div>
  
        <!-- Right Side: Image -->
        <div class="modal-right">
          <img id="modalImage" src="assets/img/team/member07.png" class="modal-person" alt="Team Member">
        </div>
  
        <!-- Close Button -->
        <button class="close-btn" onclick="document.getElementById('personModal').style.display='none'">✕</button>
      </div>
    </div>
  </section>


  {{-- script to modal --}}
  <script>
    function showModal(name, role, email, imageUrl, mobile) {
      document.getElementById('modalName').textContent = name;
      document.getElementById('modalRole').textContent = role;
      document.getElementById('modalEmail').textContent = 'Email: ' + email;
      document.getElementById('modalImage').src = imageUrl;
      document.getElementById('modalMobile').textContent = 'Mobile: ' + mobile;
      
      // Show modal
      document.getElementById('personModal').style.display = 'flex';
    }
  
    // Optional: Hide modal on initial load
    window.addEventListener('DOMContentLoaded', () => {
      document.getElementById('personModal').style.display = 'none';
    });
  </script>

  <!-- hero section start  -->
  {{-- <section class="hero hero-two pos-rel pt-120 mb-160">
    <div class="hero-img" data-background="assets/img/bg/hero-bg2.png"></div>
    <div class="hero-shape-two">
        <div class="shape--1">
            <img class="topToBottom" src="assets/img/shape/hero-sp_07.svg" alt="">
        </div>
        <div class="shape--2">
            <img class="leftToRight" src="assets/img/shape/hero-sp_08.svg" alt="">
        </div>
    </div>
    <div class="xb-hero-shape">
        <div class="shape shape--1">
            <img class="rotateme2" src="assets/img/shape/h_shape1.png" alt="">
        </div>
        <div class="shape shape--2">
            <img class="rotateme" src="assets/img/shape/h_shape2.png" alt="">
        </div>
        <div class="shape shape--3">
            <img src="assets/img/shape/h_shape3.png" alt="">
        </div>
        <div class="shape shape--4"></div>
    </div>
    <div class="container pos-rel">
        <div class="hero__content-wrap hero-style-two text-center">
            <div class="section-title hero--sec-titlt-two wow fadeInUp" data-wow-duration=".7s">
                <h1 class="title">Trusted Secure Cryco <br> <span>Crypto</span> Exchange</h1>
            </div>
            <p class="xb-item--content wow fadeInUp" data-wow-duration=".7s" data-wow-delay="150ms">Welcome to our trusted Cryco crypto exchange. Security is paramount. Trade with confidence.</p>
            <div class="hero__btn btns pt-60 wow fadeInUp" data-wow-duration=".7s" data-wow-delay="250ms">
                  <a class="them-btn" href="contact.html">
                    <span class="btn_label" data-text="Get Started">Get Started</span>
                    <span class="btn_icon">
                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"></path>
                          </svg>
                    </span>
                  </a>
                <a href="contact.html" class="them-btn btn-transparent">
                    <span class="btn_label" data-text="Explore More">Explore More</span>
                    <span class="btn_icon">
                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"></path>
                          </svg>
                    </span>
                </a>
            </div>
            <div class="hero-dashbord wow fadeInUp" data-wow-duration=".7s" data-wow-delay="350ms">
                <img src="assets/img/hero/Dashbord.png" alt="">
                <div class="dashbord-shape">
                    <div class="shape shape--1">
                        <img class="topToBottom" src="assets/img/shape/hero-sp_09.svg" alt="">
                    </div>
                    <div class="shape shape--2">
                        <img class="topToBottom2" src="assets/img/shape/hero-sp_10.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-overlay-shape">
        <div class="shape shape--1">
            <img src="assets/img/hero/shape-color1.png" alt="">
        </div>
        <div class="shape shape--2">
            <img src="assets/img/hero/shape-color2.png" alt="">
        </div>
    </div>
</section>
         --}}
        </div>
@endsection