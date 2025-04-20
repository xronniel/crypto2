@extends('layouts.front-office.customFooter')

@section('content')
    <div class="about-mainContainer">
        <section class="hero-section-about-us hero-about">
            <div class="hero-img" data-background="assets/img/bg/hero-bg2.png"></div>
            @if ($aboutUs->count() > 0)
                @foreach ($aboutUs as $about)
                    <div class="container hero-two title-bg">
                        {{-- img for mobile --}}
                        <div class="glass-img-wrapper2">
                            <img src="/assets/img/about/content-about-img1.jpg" alt="About Image" />
                        </div>

                        <h1 class="aboutUs_title" id="hero-title">
                            {{ $about->hero_title }}
                        </h1>
                        <p class="landing-text">
                            {{ $about->hero_text }}
                        </p>
                @endforeach
            @endif
            {{-- header buttons --}}
            <div class="hero__btn btns pt-50 wow fadeInUp" data-wow-duration=".7s" data-wow-delay="350ms">
                <a class="them2-btn">
                    <span class="btn_label" data-text="Explore Properties">Explore Properties</span>
                    <span class="btn_icon">
                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z"
                                fill="white"></path>
                        </svg>
                    </span>
                </a>
                <a href="contact.html" class="them2-btn btn-transparent">
                    <span class="btn_label" data-text="Discover New Projects">Discover New Projects</span>
                    <span class="btn_icon">
                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z"
                                fill="white"></path>
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
                @if ($ourCommitment->count() > 0)
                    {{-- Section 1: Original Grid Layout (Unchanged) --}}
                    @foreach ($ourCommitment as $commitment)
                        <div class="card-wrapper-about">
                            <div class="commitment-card">
                                @if ($commitment->icon)
                                    <div class="icon-placeholder">
                                        <img src="{{ asset('storage/' . $commitment->icon) }}" alt="about icon"
                                            class="commitment1" />
                                    </div>
                                @endif
                                <h3 class="commit-title">{{ $commitment->title }}</h3>
                                <p>{{ $commitment->text }}</p>
                            </div>
                        </div>
                    @endforeach

                    
                    {{-- Section 2: Plain CSS Mobile Slider --}}
                    <div class="commitment-slider-wrapper-alt">
                        <div class="commitment-slider-scroll">
                            @foreach ($ourCommitment as $commitment)
                                <div class="commitment-card-scroll">
                                    @if ($commitment->icon)
                                        <div class="icon-placeholder-scroll">
                                            <img src="{{ asset('storage/' . $commitment->icon) }}" alt="about icon"
                                                class="commitment1" />
                                        </div>
                                    @endif
                                    <h3 class="commit-title-scroll">{{ $commitment->title }}</h3>
                                    <p class="commit-text-scroll">{{ $commitment->text }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
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
                    @if ($aboutUs->count() > 0)
                        @foreach ($aboutUs as $about)
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
                    @if ($aboutUs->count() > 0)
                        @foreach ($aboutUs as $about)
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
                    @if ($aboutUs->count() > 0)
                        @foreach ($aboutUs as $about)
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
                    @if ($cryptoHomeInFigures->count() > 0)
                        @foreach ($cryptoHomeInFigures as $figure)
                            <div class="figure-card">
                                <img src="/assets/img/about/ww0-img3.png" alt="card bg" class="card-bg">
                                <div class="card-content">
                                    <h3>{{ $figure->title }}</h3>
                                    <p>{{ $figure->text }}</p>
                                </div>
                                <img src="/assets/img/about/divider.png" alt="divider" class="figure-divider">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>


            {{-- last --}}
        </div>
        <img src="/assets/img/about/icons/icon5.png" class="icons6" alt="About Image" />
        <img src="/assets/img/about/icons/icon5.png" class="icons7" alt="About Image" />
    </section>


    {{-- our team section --}}
    <section class="team hero-section-about-team hero-about pt-140 pb-100 z-2">
        <div class="hero-img3" data-background="assets/img/about/footer-bg.png"></div>
        <div class="container custom-team">
            <div class="section-title pb-35">
                <h1 class="team-title"> Meet Our Team</h1>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    @php
                        $firstMember = $ourTeam[0];
                    @endphp
                    <div onclick="showModal('{{ $firstMember->name }}', '{{ $firstMember->role }}', '{{ $firstMember->email }}', '{{ asset('storage/' . $firstMember->image) }}', {{ $firstMember->mobile }})"
                        class="xb-team xb-team1 text-center">
                        <div class="xb-item--img2 pos-rel">
                            <img src="{{ asset('storage/' . $firstMember['image']) }}" alt="{{ $firstMember['name'] }}">
                            <div class="overlay">
                                <span class="overlay-text">Read More</span>
                            </div>
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
                        @foreach ($ourTeam->slice(1)->values() as $member)
                            <div class="col-lg-4 col-md-6">

                                <div class="xb-team text-center">
                                    <div onclick="showModal('{{ $member->name }}', '{{ $member->role }}', '{{ $member->email }}', '{{ asset('storage/' . $member->image) }}', '{{ $member->mobile }}')"
                                        class="xb-item--img2">
                                        <img src="{{ asset('storage/' . $member['image']) }}"
                                            alt="{{ $member['name'] }}">
                                        <div class="overlay">
                                            <span class="overlay-text">Read More</span>
                                        </div>
                                    </div>
                                    <div class="xb-item--holder">
                                        <h2 class="xb-item--title">{{ $member['name'] }}</h2>
                                        <span class="xb-item--sub-title">{{ $member['role'] }}</span>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <img src="/assets/img/about/icons/icon3.png" class="icons-custom1" alt="About Image" />
            <img src="/assets/img/about/icons/icon3.png" class="icons3" alt="About Image" />
        </div>
    </section>

    {{-- footer --}}
    <section class="hero-section-about-us2 hero-about">
        {{-- <img src="assets/img/about/footer-bg.png" alt="Footer Background" class="hero-img2"> --}}
        <div class="hero-img2" data-background="assets/img/about/footer-bg.png"></div>
        <!-- footer content goes here -->
        <img src="/assets/img/about/footer/footer-1.png" alt="Footer Icon" class="footer-icon1" />

        {{-- first section --}}
        <div class="glass-img-wrapper3 container">
            <!-- Left: Form Section -->
            <div class="glass-form xb-inner">
                <img src="/assets/img/about/footer/footer-2.png" alt="Footer Icon" class="footer-icon2" />
              <h3 class=" mt-3">Start Your Crypto Property Journey Today.</h3>
              <form class="row g-3"> <!-- g-3 for spacing -->
                <div class="col-md-6">
                    <div class="xb-item--field-about">
                        <span><img src="{{ asset('assets/img/footer/contact-user.svg') }}" alt="User Icon"></span>
                        <input type="text" name="message" placeholder="Full Name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="xb-item--field-about">
                        <span><img src="{{ asset('assets/img/footer/contact-email.svg') }}" alt="Email Icon"></span>
                        <input type="text" name="message" placeholder="Email" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="xb-item--field-about">
                        <span><img src="{{ asset('assets/img/footer/contact-call.svg') }}" alt="Email Icon"></span>
                        <input type="text" name="message" placeholder="Phone" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="xb-item--field-about-tx">
                        <span><img src="{{ asset('assets/img/footer/contact-massage.svg') }}" alt="Message Icon"></span>
                        <textarea class="form-control" placeholder="Your Message" rows="4"></textarea>
                    </div>
                </div>
                <div class="col-12 aboutUs-footer-button1 mt-4">
                    <a class="them3-btn">
                        <span class="btn_label" data-text="Send Message">Send Message</span>
                        <span class="btn_icon">
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z"
                                    fill="white"></path>
                            </svg>
                        </span>
                    </a>
                </div>
              </form>
            </div>
          
            <!-- Right: Image Section -->
            <div class="glass-img-side">
              <img src="/assets/img/about/footer/footer-3.png" alt="About Image" />
            </div>
          </div><br><br><br><br><br><br>

          {{-- 2nd sectioin --}}
            
                {{-- <div class="container custom-footerabout"> --}}
                    <div class="xb-footer-bottom-about custom-footerabout container">
                        <div class="xb-footer-wrap ul_li_between">
                            <div class="xb-item--footer_widget mb-30">
                                <span class="xb-item--footer_widget-about-span">Crypto Home</span>
                                <ul class="xb-item--footer_widget-list">
                                    <li><a href="#!">About Us</a></li>
                                    <li><a href="#!">Find Agents</a></li>
                                    <li><a href="/contact-us">Contact Us</a></li>
                                    <li><a href="#!">Terms</a></li>
                                    <li><a href="#!">Explore</a> </li>
                                </ul>
                            </div>
                            <div class="xb-item--footer_widget mb-30">
                                <span class="xb-item--footer_widget-about-span">Our Services</span>
                                <ul class="xb-item--footer_widget-list">
                                    <li><a href="#!">Buy</a></li>
                                    <li><a href="#!">Rent</a></li>
                                    <li><a href="#!">Commercial</a></li>
                                    <li><a href="#!">Vacations</a></li>
                                    <li><a href="#!">New Projects</a></li>
                                    <li><a href="#!">Mortages</a></li>
                                </ul>
                            </div>
                            <div class="xb-item--footer_widget mb-30">
                                <span class="xb-item--footer_widget-about-span">Need Help?</span>
                                <ul class="xb-item--footer_widget-list">
                                    <li><a href="tel:1236567866">+(1) 123 656 7866</a></li>
                                    <li class="underline"><a href="mailto:crycoinfotive@.com">supprt.cryptohome@.com</a></li>
                                    <li class="underline"><a href="mailto:webcryco.com">cryptohome.com</a></li>
                                </ul>
                                <ul class="ul_li xb-item--social-link">
                                    <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-telegram-plane"></i></a></li>
                                </ul>
                            </div>
                            <div class="xb-item--footer_widget-community mb-30">
                                <h3>Looking To Buy A New House Or Sell One For Crypto?</h3>
                                <a href="#!">
                                    Inquire now
                                </a>
                            </div>
                        </div>
                        <div class="xb-item--footer_widget-about-span2 text-center mt-1">
                            Copyright © 2024 Cryco crypto theme. All rights reserved.
                        </div>
                    </div>
  

    </section>


    {{-- modal section --}}

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

    {{-- split title last word --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const heroTitle = document.getElementById("hero-title");
            const words = heroTitle.innerText.split(" "); // Split title into words
            const lastWord = words.pop(); // Get the last word
            heroTitle.innerHTML = words.join(" ") + " <h1 class='highlight-word'>" + lastWord +
            "</h1>"; 
        });
    </script>
    </div>
@endsection
