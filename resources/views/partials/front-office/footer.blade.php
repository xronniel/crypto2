<footer class="footer z-1 second-footer pos-rel">


    <div class="bg_img top-center pos-rel pb-5" data-background="{{ asset('assets/img/bg/team-bg.png') }}">

        <div class="container pt-110">
            <div class="xb-contact">
                <div class="row g-0 mt-none-30">
                    <div class="col-lg-7 mt-30">
                        <div class="xb-inner bg_img" data-background="{{ asset('assets/img/bg/form_bg.png') }}">
                            <h2 class="xb-item--title">if you have question, feel free to contact us</h2>
                            <form class="xb-item--form" id="propertyLeadForm">
                                @csrf
                                <input type="hidden" name="url" value="{{ url()->current() }}"> <!-- Hidden input to pass current page URL -->
                            
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="xb-item--field">
                                            <span><img src="{{ asset('assets/img/footer/contact-user.svg') }}" alt="User Icon"></span>
                                            <input type="text" name="full_name" placeholder="Full Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="xb-item--field">
                                            <span><img src="{{ asset('assets/img/footer/contact-email.svg') }}" alt="Email Icon"></span>
                                            <input type="email" name="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="xb-item--field">
                                            <span><img src="{{ asset('assets/img/footer/contact-massage.svg') }}" alt="Message Icon"></span>
                                            <input type="text" name="message" placeholder="Type Your Message" required>
                                        </div>
                                    </div>
                            
                                    <div class="col-lg-12 form-check xb-item--checkbox">
                                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            By sending this form I confirm that I have read and accept the <br><a href="#!">privacy policy</a>
                                        </label>
                                    </div>
                            
                                    <div class="col-lg-12 xb-item--contact-btn">
                                        <button class="them-btn" type="submit">
                                            <span class="btn_label" data-text="Send Message">Send Message</span>
                                            <span class="btn_icon">
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-30">
                        <div class="testimonial-wrap bg_img" data-background="{{ asset('assets/img/bg/tm_bg.png') }}">
                            <div class="testimonial-slider swiper-container">
                                <div class="swiper-wrapper">



                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
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
                            <li><a href="#!">About Us</a></li>
                            <li><a href="#!">Careers</a></li>
                            <li><a href="#!">Contact Us</a></li>
                            <li><a href="#!">Explore</a></li>
                            <li><a href="#!">Terms</a> </li>
                        </ul>
                    </div>
                    <div class="xb-item--footer_widget mb-30">
                        <span>Real Estate Professionals</span>
                        <ul class="xb-item--footer_widget-list">
                            <li><a href="#!">Partner Hub</a></li>
                            <li><a href="#!">PF Expert</a></li>
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
                        <a href="#!">
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
    document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("propertyLeadForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent traditional form submission

        let formData = new FormData(this);

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
                this.reset(); // Clear form fields on success
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
<style>
    .xb-item--avater {
        display: flex;
        flex-direction: row;
    }

    .review-img-two {
        width: 80px !important;
    }

    .xb-item--nationality {
        display: flex
;
    flex-direction: row;
    }
    .review-img-div {
        width: 200px !important;

    }
    .review-img-div img{
        width: 100%;
    height: 100%;
    object-fit: cover;
    }
</style>
