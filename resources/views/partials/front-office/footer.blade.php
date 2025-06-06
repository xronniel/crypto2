<footer class="footer z-1 second-footer pos-rel">


    <div class="bg_img top-center pos-rel pt-5 pb-5" data-background="{{ asset('assets/img/bg/team-bg.png') }}">

        <div class="container pt-110">
            <div id="question-form-footer" class="xb-contact">
                <div
                    class="row g-0 mt-none-30 {{ request()->is('/') || request()->is('news*') || request()->is('articles*') ? '' : 'column-reverse-one' }}">
                    <div class="col-lg-7">
                        <div @auth
@php
                                $path = request()->path(); // e.g. "holiday-properties/elt-5586719"
                                $segments = explode('/', $path);
                                $propertyRef = '';

                                // Check only for the desired prefixes
                                if (Str::startsWith($path, 'holiday-properties/') || Str::startsWith($path, 'properties/')) {
                                    $propertyRef = end($segments); // Get the last segment
                                }
                            @endphp

                            @if ($propertyRef)
                                data-user-id="{{ auth()->user()->id }}"
                                data-property-ref="{{ $propertyRef }}"
                                data-url="{{ url()->current() }}"
                            @endif @endauth
                            class="xb-inner bg_img
                                    {{ request()->is('/') || request()->is('news*') || request()->is('articles*') ? '' : 'border-one' }}
                            "
                            style="
                            background-position: 85% 0; 
                            background-repeat: no-repeat; 
                            background-size: cover; 
                    
                        "
                            data-background="{{ asset('assets/img/bg/form_bg.png') }}">
                            <h2 class="xb-item--title">
                                <h2 class="xb-item--title">
                                    @if (request()->is('/') || request()->is('news*') || request()->is('articles*'))
                                        Register for Callback
                                    @elseif (request()->is('properties') || request()->is('holiday-properties'))
                                        Looking to advertise a property?
                                        <span class="span-img-one">We
                                            can help.</span>
                                    @elseif (request()->is('properties*') || request()->is('holiday-properties*') || request()->is('user*'))
                                        Contact Us to See Your Next
                                        <span class="span-img-one">Home!</span>
                                    @elseif (request()->is('agents') || request()->is('agents') || request()->is('mortgage-calculator'))
                                        Still have questions? We can help.
                                    @elseif (request()->is('agents*'))
                                        Let's get in touch!
                                    @else
                                        If you have a question, feel free to contact us.
                                    @endif
                                </h2>
                            </h2>
                            <form class="xb-item--form" id="propertyLeadForm">
                                @csrf
                                <input type="hidden" name="url" value="{{ url()->current() }}">
                                <!-- Hidden input to pass current page URL -->

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="xb-item--field">
                                            <span><img src="{{ asset('assets/img/footer/contact-user.svg') }}"
                                                    alt="User Icon"></span>
                                            <input type="text" name="full_name" placeholder="Full Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="xb-item--field">
                                            <span><img src="{{ asset('assets/img/footer/contact-email.svg') }}"
                                                    alt="Email Icon"></span>
                                            <input type="email" name="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="xb-item--field">
                                            <span><img src="{{ asset('assets/img/footer/contact-massage.svg') }}"
                                                    alt="Message Icon"></span>
                                            <input type="text" name="message" placeholder="Type Your Message"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 form-check xb-item--checkbox">
                                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            By sending this form I confirm that I have read and accept the <br><a
                                                href="#!">privacy policy</a>
                                        </label>
                                    </div>

                                    <div class="col-lg-12 xb-item--contact-btn">
                                        <button class="them-btn" type="submit">
                                            <span class="btn_label" data-text="Send Message">Send Message</span>
                                            <span class="btn_icon">
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z"
                                                        fill="white"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div
                        class="col-lg-5 {{ request()->is('/') || request()->is('news*') || request()->is('articles*') ? 'margin-top-mobile' : '' }}">


                        @if (request()->is('/') || request()->is('news*') || request()->is('articles*'))
                            {{-- <div class="testimonial-wrap bg_img"
                                data-background="{{ asset('assets/img/bg/tm_bg.png') }}">
                                <div class="testimonial-slider swiper-container">
                                    <div class="swiper-wrapper">
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div> --}}
                            <div class="testimonial-wrap bg_img bg-one"
                            style="
                            background-position: 85% 0; 
                            background-repeat: no-repeat; 
                            background-size: cover; 
                        "
                            data-background="{{ asset('assets/img/footer/footer-img-one.jpeg') }}">
                        </div>
                        @elseif (request()->is('properties') || request()->is('holiday-properties'))
                            <div class="testimonial-wrap bg_img bg-one"
                                style="
                                background-position: 85% 0; 
                                background-repeat: no-repeat; 
                                background-size: cover; 
                            "
                                data-background="{{ asset('assets/img/footer/footer-img-one.jpeg') }}">
                            </div>
                        @elseif (request()->is('properties*') ||
                                request()->is('holiday-properties*') ||
                                request()->is('user*') ||
                                request()->is('agents*'))
                            <div class="testimonial-wrap bg_img bg-one"
                                style="
                                background-position: 30% 0; 
                                background-repeat: no-repeat; 
                                background-size: cover; 
                            "
                                data-background="{{ asset('assets/img/footer/footer-img-two.jpeg') }}">
                            </div>
                        @elseif (request()->is('agents') || request()->is('agents*') || request()->is('mortgage-calculator'))
                            <div class="testimonial-wrap bg_img bg-one"
                                style="
                                    background-position: 50% 0; 
                                    background-repeat: no-repeat; 
                                    background-size: cover; 
                                "
                                data-background="{{ asset('assets/img/footer/footer-img-three.jpeg') }}">
                            </div>
                        @else
                            {{-- <div class="testimonial-wrap bg_img bg-one"
                                data-background="{{ asset('assets/img/bg/tm_bg.png') }}">
                                <div class="testimonial-slider swiper-container">
                                    <div class="swiper-wrapper">
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div> --}}
                            <div class="testimonial-wrap bg_img bg-one"
                            style="
                            background-position: 85% 0; 
                            background-repeat: no-repeat; 
                            background-size: cover; 
                        "
                            data-background="{{ asset('assets/img/footer/footer-img-one.jpeg') }}">
                        </div>
                        @endif



                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="xb-footer-bottom">
                <div class="xb-footer-wrap ul_li_between">
                    <div class="xb-item--footer_widget mb-30">
                        <span>Crypto Home</span>
                        <ul class="xb-item--footer_widget-list">
                            <li><a href="/about-us">About Us</a></li>
                            <li><a href="{{ route('agents.index') }}">Find Agent</a></li>
                            <li><a href="/contact-us">Contact Us</a></li>
                            <li><a href="/TermsConditions">Terms</a> </li>
                        </ul>
                    </div>
                    <div class="xb-item--footer_widget mb-30">
                        <span>Our Services</span>
                        <ul class="xb-item--footer_widget-list">
                            <li><a      href="{{ route('properties.index', ['filter_type' => 'buy']) }}"></a>Buy</li>
                            <li><a    href="{{ route('properties.index', ['filter_type' => 'rent']) }}"></a>Rent</li>
                            <li><a  href="{{ route('properties.index', ['type' => 'commercial']) }}">Commercial</a></li>
                            <li><a href="{{ route('holiday-properties.index') }}">Vacations</a></li>
                        </ul>
                    </div>
                    <div class="xb-item--footer_widget mb-30">
                        <span>Need Help?</span>
                        <ul class="xb-item--footer_widget-list">
                            <li><a href="tel:1236567866">+(1) 123 656 7866</a></li>
                            <li class="underline"><a href="mailto:crycoinfotive@.com">crycoinfotive@.com</a></li>
                            <li class="underline"><a href="mailto:webcryco.com">webcryco.com</a></li>
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
                        <a href="#!" onclick="scrollToSection(event)">
                            Inquire now
                        </a>
                    </div>
                </div>
                <div class="footer-copyright text-center">
                    Copyright © 2024 Cryco crypto theme. All rights reserved.
                </div>
            </div>
        </div>
        <div class="footer-shape">
            <div class="shape shape--1">
                <img class="leftToRight" src="{{ asset('assets/img/shape/team-sp_01.svg') }}" alt="">
            </div>
            <div class="shape shape--2">
                <img class="topToBottom" src="{{ asset('assets/img/shape/team-sp_02.svg') }}" alt="">
            </div>
        </div>

    </div>
</footer>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("propertyLeadForm");

        form.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent traditional form submission

            let formData = new FormData(form);

            // 1️⃣ Send the main form data
            fetch("{{ route('property.leads.store') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert("Thank you! Your message has been sent.");
                        form.reset(); // Clear form fields

                        // 2️⃣ After success, send the second AJAX call
                        const container = form.closest('.bg_img');

                        const user_id = container.dataset.userId;
                        const property_ref_no = container.dataset.propertyRef;
                        const url = container.dataset.url;


                        $.ajax({
                            url: '/api/user-contacted-properties',
                            type: 'POST',
                            data: {
                                user_id: user_id,
                                property_ref_no: property_ref_no,
                                contacted_through: 'Lead Email',
                                url: url,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                console.log('Form contact recorded successfully:',
                                    response);
                            },
                            error: function(xhr) {
                                console.error('Error logging form contact:', xhr
                                    .responseText);
                            }
                        });

                    } else {
                        alert("There was an error. Please try again.");
                    }
                })
                .catch(error => console.error("Error:", error));
        });
    });







    document.addEventListener("DOMContentLoaded", function() {
        fetch("/api/reviews")
            .then(response => response.json())
            .then(response => {
                // console.log("Response Data:", response);

                const container = document.querySelector(".testimonial-slider .swiper-wrapper");
                const reviews = response.data || [];

                if (!Array.isArray(reviews)) {
                    console.error("Expected an array but got:", reviews);
                    return;
                }

                reviews.forEach(review => {
                    const slide = document.createElement("div");
                    slide.classList.add("swiper-slide", "swiper-slide-review");
                    slide.innerHTML = `
                        <div class="xb-testimonial">
                            <div class="xb-item--avater ul_li">
                                <div class="xb-item--img review-img-div">
                                    <img src="/storage/${review.image}" alt="Testimonial Image">
                                </div>
                                <div class="xb-item--holder">
                                    <div class="xb-item--nationality ul_li">
                                        <img class='review-img-two' src="/storage/${review.country_image}" alt="Flag Image">
                                        <span>${review.country_name}</span>
                                    </div>
                                    <h2 class="xb-item--title">${review.reviewer_name}</h2>
                                    <span class="xb-item--sub-title">${review.reviewer_details}</span>
                                </div>
                            </div>
                            <p class="xb-item--comment">"${review.review}"</p>
                        </div>
                    `;
                    container.appendChild(slide);
                });

                // Force Swiper to re-initialize or update
                if (window.swiperInstance) {
                    window.swiperInstance.update();
                }
            })
            .catch(error => console.error("Error fetching reviews:", error));
    });
</script>
<script>
    function scrollToSection(event) {
        event.preventDefault(); 
        document.getElementById("question-form-footer").scrollIntoView({ behavior: "smooth" });
    }
    </script>
<style>
    .xb-item--avater {
        display: flex;
        flex-direction: row;
    }

    .review-img-two {
        width: 32px !important;
        border-radius: 1px !important;
    }

    .xb-item--nationality {
        display: flex;
        flex-direction: row;
    }

    .review-img-div {
        width: 100px !important;

    }

    .review-img-div img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .span-img-one {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .xb-footer-wrap .xb-item--footer_widget span{
        font-family: 'Outfit';
font-weight: 500;
font-size: 16px;
line-height: 30px;
letter-spacing: 0%;
vertical-align: middle;
color: #707070;

    }
    @media (max-width: 1000px) {
        .bg-one {
            height: 300px;
            border-radius: 30px 30px 0 0;
        }

        .margin-top-mobile {
            margin: 50px 0 0 0
        }

        .span-img-one {
            justify-content: start;
        }

        .border-one {
            border-radius: 0 0 30px 30px;
        }

        .column-reverse-one {
            flex-direction: column-reverse;
        }

        .sidebar-area {
            display: none;
        }




    }
</style>
<script></script>
