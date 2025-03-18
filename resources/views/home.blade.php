@extends('layouts.front-office.app')

@section('content')

    <section class="hero bg_img pos-rel pt-120" data-background="assets/img/bg/hero-bg1.svg">
        <div class="hero-shape">
            <div class="shape--1">
                <img class="leftToRight" src="assets/img/shape/hero-sp_01.svg" alt="">
            </div>
            <div class="shape--2">
                <img class="topToBottom" src="assets/img/shape/hero-sp_02.svg" alt="">
            </div>
            <div class="shape--3">
                <img class="leftToRight" src="assets/img/shape/hero-sp_04.svg" alt="">
            </div>
            <div class="shape--4">
                <img class="topToBottom" src="assets/img/shape/hero-sp_03.svg" alt="">
            </div>
            <div class="shape--5">
                <img class="topToBottom" src="assets/img/shape/hero-sp_05.svg" alt="">
            </div>
            <div class="shape--6">
                <img class="leftToRight" src="assets/img/shape/hero-sp_06.svg" alt="">
            </div>
        </div>
        <div class="container">
            <div class="hero__content-wrap">
                <div class="section-title hero--sec-titlt wow fadeInUp" data-wow-duration=".7s">
                    <h1 class="title">Crypto Token Sale is On</h1>
                </div>
                <div class="countdown ul_li_center wow fadeInUp mt-60" data-wow-duration=".7s" data-wow-delay="200ms" data-countdown="2024/08/28"></div>
                <div class="hero__btn btns pt-50 wow fadeInUp" data-wow-duration=".7s" data-wow-delay="350ms">
                      <a class="them-btn" href="contact.html">
                        <span class="btn_label" data-text="Get Started">Get Started</span>
                        <span class="btn_icon">
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"></path>
                              </svg>
                        </span>
                      </a>
                    <a href="contact.html" class="them-btn btn-transparent">
                        <span class="btn_label" data-text="Read Whitepaper">Read Whitepaper</span>
                        <span class="btn_icon">
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"></path>
                              </svg>
                        </span>
                    </a>
                </div>
            </div>
            <div class="token-structure mt-145 wow fadeInUp" data-wow-duration=".7s" data-wow-delay="450ms">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="hero-token">
                            <h3 class="xb-item--title">Token Structure</h3>
                            <p class="xb-item--content">
                                Our token structure ensures transparency, fairness, and value. Join us in revolutionizing the digital economy.
                            </p>
                            <div class="xb-item--accept">
                                <h5 class="xb-item--acc-title">We accept :</h5>
                                <ul class="xb-item--list ul_li">
                                    <li><img src="assets/img/icon/hero-icon01.svg" alt="">Bitcoin</li>
                                    <li><img src="assets/img/icon/hero-icon02.svg" alt="">Ethereum</li>
                                    <li><img src="assets/img/icon/hero-icon03.svg" alt="">Litecoin</li>
                                    <li><img src="assets/img/icon/hero-icon04.svg" alt="">Ripple</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                    <div class="hero-sale">
                        <div class="xb-item--sale_service ul_li_between">
                            <span>pre-sale</span>
                            <span>soft caf</span>
                            <span>bonus</span>
                        </div>
                        <div class="xb-item--line ul_li_between">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="xb-item--progress">
                            <div class="xb-item--pro-color"><span class="shape"></span></div>
                        </div>
                        <div class="xb-item--target ul_li_between">
                            <span>70 target raised</span>
                            <span>1 ETH = $1000= 3177.38 CIC</span>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="hero-scroll pt-105">
                <span>scroll to down</span>
                <div class="scroll-down text-center">
                    <div class="chevron"></div>
                    <div class="chevron"></div>
                    <div class="chevron"></div>
                  </div>
            </div>
        </div>
    </section>
    <!-- hero section end  -->

    <!-- partners section start  -->
    <section class="partners z-3 pt-135">
        <div class="patners-title text-center">
            <span><img src="assets/img/partner/partner_07.png" alt=""> our top partners <img src="assets/img/partner/partner_08.png" alt=""></span>
        </div>
        <div class="partner-active partner-slider ul_li"> 
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="xb-item--brand">
                        <div class="xb-item--brand_logo">
                            <img src="assets/img/partner/partner_01.png" alt="">
                        </div>
                        <span>aptos</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="xb-item--brand">
                        <div class="xb-item--brand_logo">
                            <img src="assets/img/partner/partner_02.png" alt="">
                        </div>
                        <span>algorand</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="xb-item--brand">
                        <div class="xb-item--brand_logo">
                            <img src="assets/img/partner/partner_03.png" alt="">
                        </div>
                        <span>binance</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="xb-item--brand">
                        <div class="xb-item--brand_logo">
                            <img src="assets/img/partner/partner_04.png" alt="">
                        </div>
                        <span>cardano</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="xb-item--brand">
                        <div class="xb-item--brand_logo">
                            <img src="assets/img/partner/partner_05.png" alt="">
                        </div>
                        <span>ethereum</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="xb-item--brand">
                        <div class="xb-item--brand_logo">
                            <img src="assets/img/partner/partner_06.png" alt="">
                        </div>
                        <span>Arbitrum</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="xb-item--brand">
                        <div class="xb-item--brand_logo">
                            <img src="assets/img/partner/partner_01.png" alt="">
                        </div>
                        <span>aptos</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- partners section end  -->

    <!-- about section start-->
    <section class="about pos-rel">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-wrap pt-140 wow fadeInLeft" data-wow-duration=".7s">
                        <h2 class="xb-item--title">what is token iCO?</h2>
                        <p class="xb-item--content">
                            An ICO, or Initial Coin Offering, is a fundraising method used by cryptocurrency startups to raise capital for their projects. During an ICO, the company  a new token.
                        </p>
                        <h3 class="xb-item--title xb-item--title1">Why it’s need?</h3>
                        <p class="xb-item--content xb-item--content1">
                            ICOs serve several purposes, both for cryptocurrency startups and investors. Here are some reasons why ICOs are utilized:
                        </p>
                        <div class="xb-item--list">
                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z" fill="white" />
                                <path d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z" fill="#080B18" />
                              </svg> Token Distribution</span>

                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z" fill="white" />
                            <path d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z" fill="#080B18" />
                            </svg> Community Building</span>

                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z" fill="white" />
                            <path d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z" fill="#080B18" />
                            </svg> Market Validation</span>

                            <span><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z" fill="white" />
                            <path d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z" fill="#080B18" />
                            </svg> Decentralization</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-img bg_img" >
            <img class="wow fadeInRight" data-wow-duration=".7s" data-wow-delay="200ms" src="assets/img/about/about-img.png" alt="">
        </div>
    </section>
    <!-- about section end-->

    <!-- process start -->
    <section class="process z-3 pb-150 pt-35">
        <div class="container pt-100">
            <div class="row justify-content-center mt-none-130">
                <div class="col-xl-4 col-lg-6 process-col mt-130">
                    <div class="xb-process pos-rel">
                        <div class="xb-item--icon">
                            <img src="assets/img/icon/process_icon1.svg" alt="">
                        </div>
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title">register account</h2>
                            <p class="xb-item--content">To register, visit our website, fill out your name, email, and password.</p>
                        </div>
                        <div class="xb-item--shape">
                            <span>
                                <svg width="410" height="274" viewBox="0 0 410 274" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                    <path d="M302.5 0C220.1 55.6 135.5 23.1667 103.5 0L0 274H410L302.5 0Z" fill="url(#p_shape1)" />
                                    <defs>
                                        <radialGradient id="p_shape1" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(205 12) rotate(90) scale(611.5 749.061)">
                                            <stop offset="0" stop-color="#EBF7FD" />
                                            <stop offset="0.09" stop-color="#9162FF" />
                                            <stop offset="0.26792" stop-color="#1C30A8" />
                                            <stop offset="0.474094" stop-color="#080B18" />
                                        </radialGradient>
                                    </defs>
                                </svg>                                    
                            </span>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 process-col mt-130">
                    <div class="xb-process pos-rel">
                        <div class="xb-item--icon">
                            <img src="assets/img/icon/process_icon2.svg" alt="">
                        </div>
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title">deposit amount</h2>
                            <p class="xb-item--content">To deposit funds, log in to your account and navigate to the deposit section. </p>
                        </div>
                        <div class="xb-item--shape">
                            <span>
                                <svg width="410" height="274" viewBox="0 0 410 274" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                    <path d="M302.5 0C220.1 55.6 135.5 23.1667 103.5 0L0 274H410L302.5 0Z" fill="url(#p_shape2)" />
                                    <defs>
                                        <radialGradient id="p_shape2" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(205 12) rotate(90) scale(611.5 749.061)">
                                            <stop offset="0" stop-color="#EBF7FD" />
                                            <stop offset="0.09" stop-color="#9162FF" />
                                            <stop offset="0.26792" stop-color="#1C30A8" />
                                            <stop offset="0.474094" stop-color="#080B18" />
                                        </radialGradient>
                                    </defs>
                                </svg>                                    
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 process-col mt-130">
                    <div class="xb-process pos-rel">
                        <div class="xb-item--icon">
                            <img src="assets/img/icon/process_icon3.svg" alt="">
                        </div>
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title">buy crypto!</h2>
                            <p class="xb-item--content">To purchase cryptocurrency, simply log in your account and navigate
                                to the "Buy/Sell"</p>
                        </div>
                        <div class="xb-item--shape">
                            <span>
                                <svg width="410" height="274" viewBox="0 0 410 274" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                    <path d="M302.5 0C220.1 55.6 135.5 23.1667 103.5 0L0 274H410L302.5 0Z" fill="url(#p_shape3)" />
                                    <defs>
                                        <radialGradient id="p_shape3" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(205 12) rotate(90) scale(611.5 749.061)">
                                            <stop offset="0" stop-color="#EBF7FD" />
                                            <stop offset="0.09" stop-color="#9162FF" />
                                            <stop offset="0.26792" stop-color="#1C30A8" />
                                            <stop offset="0.474094" stop-color="#080B18" />
                                        </radialGradient>
                                    </defs>
                                </svg>                                    
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- process end -->

    <!-- token section start  -->
    <section id="chart" class="token z-1 mt-70 pt-150 pb-150 bg_img pos-rel" data-background="assets/img/bg/token-bg.png">
        <div class="container">
            <div class="section-title pb-55">
                <h1 class="title">introduction to the cryco <br> tokenism </h1>
            </div>
            <div class="token-wrap">
                <div class="row mt-none-30">
                    <div class="col-xl-5 col-lg-6 mt-30">
                        <div class="token-distribut">
                            <h2 class="xb-item--title">cryco distribution</h2>
                            <ul class="xb-item--list">
                                <li>ICO</li>
                                <li>Reward</li>
                                <li>marketing</li>
                                <li>team</li>
                                <li>market liquidity reserve</li>
                                <li>advisors</li>
                                <li>risk - management</li>
                            </ul>
                            <div class="xb-item--list-circle pos-rel">
                                <div class="xb-item--circle"><span>70%</span></div>
                                <div class="xb-item--circle"><span>10%</span></div>
                                <div class="xb-item--circle"><span>6%</span></div>
                                <div class="xb-item--circle"><span>5%</span></div>
                                <div class="xb-item--circle"><span>4%</span></div>
                                <div class="xb-item--circle"><span>3%</span></div>
                                <div class="xb-item--circle"><span>2%</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 mt-30">
                        <div class="token-sale">
                            <h2 class="xb-item--title">allocation of resources from the token - sale</h2>
                            <div class="xb-item--progress_bar">
                                <div class="xb-item--parcenteg ul_li">
                                    <span>56%</span>
                                    <span>24%</span>
                                    <span>12%</span>
                                    <span>8%</span>
                                </div>
                                <div class="xb-item--token_progress ul_li">
                                    <span class="color1"></span>
                                    <span class="color2"></span>
                                    <span class="color3"></span>
                                    <span class="color4"></span>
                                </div>
                            </div>
                            <ul class="xb-item--pro_list ul_li">
                                <li>Investment in projects</li>
                                <li>Platform development</li>
                                <li>Infrastructure</li>
                                <li>Marketing</li>
                            </ul>
                        </div>
                        <div class="token-sale model">
                            <h2 class="xb-item--title">cryco governance <br> model</h2>
                            <div class="xb-item--progress_bar">
                                <div class="xb-item--parcenteg ul_li">
                                    <span>35%</span>
                                    <span>25%</span>
                                    <span>25%</span>
                                    <span>10%</span>
                                    <span>5%</span>
                                </div>
                                <div class="xb-item--token_progress ul_li">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                            <ul class="xb-item--pro_list ul_li">
                                <li>cryco holders</li>
                                <li>Members</li>
                                <li>Leaders</li>
                                <li>Founders</li>
                                <li>Co-creators</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="toke-shape">
            <div class="shape--one">
                <img class="leftToRight" src="assets/img/shape/token.svg" alt="">
            </div>
            <div class="shape--two">
                <img class="topToBottom" src="assets/img/shape/token1.svg" alt="">
            </div>
        </div>
    </section>
    <!-- token section end -->
    
    <!-- roadmap section start -->
    <section id="roadmap" class="roadmap pt-135">
        <div class="section-title pb-50">
            <h1 class="title">Our Road map</h1>
        </div>
        <div class="roadmap-wrap">
            <div class="roadmap--top">
                <div class="roadmap--item roadmap--first_item">
                    <h2 class="roadmap--head ">Research</h2>
                    <ul class="roadmap--info">
                        <li>Objective Definition</li>
                        <li>Data Collection</li>
                        <li>Analysis</li>
                        <li>Reporting</li>
                    </ul>
                    <div class="roadmap--year">
                        <div class="roadmap--circle"><span></span></div>
                        <span>Mid of Q4 2024</span>
                    </div>
                </div>
                <div class="roadmap--item">
                    <h2 class="roadmap--head ">Token Test</h2>
                    <ul class="roadmap--info">
                        <li>Test Objectives</li>
                        <li>Testing Environment Setup</li>
                        <li>Test Cases Development</li>
                        <li>Execution and Analysis:</li>
                    </ul>
                    <div class="roadmap--year">
                        <div class="roadmap--circle"><span></span></div>
                        <span>End of Q4 2024</span>
                    </div>
                </div>
            </div>
            <div class="roadmap--line"></div>
            <div class="roadmap--bottom">
                <div class="roadmap--item bottom-item">
                    <div class="roadmap--year">
                        <span>Mid of Q4 2024</span>
                        <div class="roadmap--circle"><span></span></div>
                    </div>
                    <h2 class="roadmap--head">Concept</h2>
                    <ul class="roadmap--info">
                        <li>Value Proposition</li> 
                        <li>Token Sale Details</li>
                        <li>Team and Roadmap</li>
                        <li>Transparency and Trust</li>
                    </ul>
                </div>
                <div class="roadmap--item bottom-item">
                    <div class="roadmap--year">
                        <span>Mid of Q4 2024</span>
                        <div class="roadmap--circle"><span></span></div>
                    </div>
                    <h2 class="roadmap--head">App Beta Test</h2>
                    <ul class="roadmap--info">
                        <li>Selection Criteria</li>
                        <li>Testing Environment Setup</li>
                        <li>Feedback Collection</li>
                        <li>Iterative Improvement</li>
                    </ul>
                </div>
                <div class="roadmap--item bottom-item">
                    <div class="roadmap--year">
                        <span>End of Q4 2024</span>
                        <div class="roadmap--circle"><span></span></div>
                    </div>
                    <h2 class="roadmap--head">Alpha Test</h2>
                    <ul class="roadmap--info">
                        <li>Alpha Test Objectives</li>
                        <li>Alpha Test Group Selection</li>
                        <li>Test Environment Setup</li>
                        <li>Feedback Collection and Iteration</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- roadmap section end -->

    <!-- feature section start -->
    <section id="features" class="feature pos-rel pt-125 mb-170">
        <div class="container">
            <div class="section-title pb-65">
                <h1 class="title">our great features</h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="feature-wrap ul_li">
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title">Mobile Payment Make Easy</h2>
                            <p class="xb-item--content">Mobile payment has revolutionized the way we transact, offering convenience and efficiency.</p>
                        </div>
                        <div class="xb-item--feature-icon">
                            <img src="assets/img/feature/fea-01.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature-wrap ul_li">
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title">Security & Control Over Money</h2>
                            <p class="xb-item--content">Security and control over your money are paramount, and with our platform.</p>
                        </div>
                        <div class="xb-item--feature-icon">
                            <img src="assets/img/feature/fea-02.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature-wrap ul_li">
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title">Lifetime Free Transaction</h2>
                            <p class="xb-item--content">Experience the freedom of lifetime free transactions with our platform.</p>
                        </div>
                        <div class="xb-item--feature-icon">
                            <img src="assets/img/feature/fea-03.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature-wrap ul_li">
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title">Protect the Identity</h2>
                            <p class="xb-item--content">Safeguarding your identity is our top priority. With our platform, we employ state-of-the-art.</p>
                        </div>
                        <div class="xb-item--feature-icon">
                            <img src="assets/img/feature/fea-04.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature-crypto bg_img" data-background="assets/img/bg/feature-bg.png">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="mobile-crypto" >
                            <div class="xb-item--sub-title">
                                <span><svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.6448 8.99798C14.223 8.02696 13.6099 7.15543 12.8438 6.43787L12.2116 5.84453C12.1901 5.82499 12.1643 5.81106 12.1363 5.80409C12.1084 5.79704 12.0792 5.79721 12.0513 5.80443C12.0234 5.81165 11.9978 5.82584 11.9764 5.84555C11.9551 5.86535 11.9389 5.89016 11.9292 5.91786L11.6468 6.74682C11.4708 7.26683 11.1471 7.79797 10.6886 8.32018C10.6582 8.35349 10.6235 8.36241 10.5996 8.36462C10.5757 8.36683 10.5388 8.36241 10.5062 8.33132C10.4758 8.30464 10.4606 8.26462 10.4627 8.22459C10.5431 6.88685 10.1521 5.37789 9.29609 3.73562C8.58788 2.37114 7.60377 1.30668 6.3741 0.564432L5.47683 0.0244217C5.35957 -0.0466972 5.2096 0.0466409 5.21615 0.186644L5.26398 1.25334C5.29653 1.98225 5.21402 2.62671 5.01842 3.16227C4.77949 3.81784 4.43622 4.42675 3.99735 4.97343C3.69198 5.35333 3.34581 5.69703 2.96549 5.9979C2.04933 6.71827 1.3044 7.64137 0.786445 8.69796C0.269767 9.7638 0.000628769 10.9373 0 12.127C0 13.1759 0.202039 14.1914 0.601783 15.1492C0.987762 16.0714 1.54477 16.9083 2.24201 17.6137C2.94587 18.3248 3.76276 18.8849 4.67303 19.2738C5.61592 19.6782 6.61524 19.8826 7.64719 19.8826C8.67913 19.8826 9.67845 19.6782 10.6213 19.276C11.5293 18.8894 12.3551 18.3255 13.0523 17.6159C13.7563 16.9048 14.3081 16.0737 14.6925 15.1514C15.0917 14.1963 15.2965 13.1679 15.2944 12.1292C15.2944 11.0447 15.0771 9.99135 14.6448 8.99798Z" fill="#FF0000" />
                                  </svg>Mobile App 2.0 <span class="new-btn">new</span>
                                </span>
                            </div>
                            <h2 class="xb-item--title">mobile cryptobank</h2>
                            <p class="xb-item--content">
                                Everything you need in your smartphone: payments, transfers, currency exchange, instant loans. Our goal-replace your bank
                            </p>
                            <ul class="xb-item--crypto-list">
                                <li><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z" fill="white"></path>
                                    <path d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z" fill="#080B18"></path>
                                    </svg> No limits on transaction volume.</li>
                                <li><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z" fill="white"></path>
                                    <path d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z" fill="#080B18"></path>
                                    </svg> ApplePay, Samsung Pay, AndroidPay, QR code</li>
                                <li><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z" fill="white"></path>
                                    <path d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z" fill="#080B18"></path>
                                    </svg> Contactless payments options</li>
                                <li><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 9C18 9.768 17.0565 10.401 16.8675 11.109C16.6725 11.841 17.166 12.861 16.7955 13.5015C16.419 14.1525 15.2865 14.2305 14.7585 14.7585C14.2305 15.2865 14.1525 16.419 13.5015 16.7955C12.861 17.166 11.841 16.6725 11.109 16.8675C10.401 17.0565 9.768 18 9 18C8.232 18 7.599 17.0565 6.891 16.8675C6.159 16.6725 5.139 17.166 4.4985 16.7955C3.8475 16.419 3.7695 15.2865 3.2415 14.7585C2.7135 14.2305 1.581 14.1525 1.2045 13.5015C0.834 12.861 1.3275 11.841 1.1325 11.109C0.9435 10.401 0 9.768 0 9C0 8.232 0.9435 7.599 1.1325 6.891C1.3275 6.159 0.834 5.139 1.2045 4.4985C1.581 3.8475 2.7135 3.7695 3.2415 3.2415C3.7695 2.7135 3.8475 1.581 4.4985 1.2045C5.139 0.834 6.159 1.3275 6.891 1.1325C7.599 0.9435 8.232 0 9 0C9.768 0 10.401 0.9435 11.109 1.1325C11.841 1.3275 12.861 0.834 13.5015 1.2045C14.1525 1.581 14.2305 2.7135 14.7585 3.2415C15.2865 3.7695 16.419 3.8475 16.7955 4.4985C17.166 5.139 16.6725 6.159 16.8675 6.891C17.0565 7.599 18 8.232 18 9Z" fill="white"></path>
                                    <path d="M11.6674 6.85539L8.54986 9.88334L6.93376 8.31501C6.58297 7.9743 6.01379 7.9743 5.663 8.31501C5.3122 8.65572 5.3122 9.20854 5.663 9.54926L7.93018 11.7513C8.27141 12.0827 8.82558 12.0827 9.16682 11.7513L12.9368 8.08963C13.2876 7.74892 13.2876 7.1961 12.9368 6.85539C12.586 6.51468 12.0182 6.51468 11.6674 6.85539Z" fill="#080B18"></path>
                                    </svg> Integration with third-party payment wallets or services</li>
                            </ul>
                            <div class="xb-item--crypto-btn">
                                <a class="them-btn crp-btn" href="#!">
                                    <span class="btn_icon">
                                        <i class="fab fa-apple"></i>
                                    </span>
                                    <span class="btn_label" data-text="Apple iOS">Apple iOS</span>
                                  </a>
                                <a class="them-btn crp-btn" href="#!">
                                    <span class="btn_icon"><svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.398804 12.1266C0.537847 10.5267 1.04394 9.05395 1.91712 7.70827C2.78967 6.3626 3.95204 5.29345 5.40423 4.50098L3.68942 1.63014C3.59672 1.49556 3.57354 1.35352 3.61989 1.204C3.66624 1.05447 3.76666 0.942338 3.92114 0.867577C4.04473 0.792815 4.18378 0.777861 4.33826 0.822713C4.49276 0.867577 4.61635 0.957281 4.70904 1.09186L6.42386 3.96269C7.75246 3.42441 9.14288 3.15528 10.5951 3.15528C12.0472 3.15528 13.4377 3.42441 14.7662 3.96269L16.4811 1.09186C16.5738 0.957281 16.6974 0.867577 16.8518 0.822713C17.0063 0.777861 17.1454 0.792815 17.269 0.867577C17.4235 0.942338 17.5239 1.05447 17.5702 1.204C17.6165 1.35352 17.5934 1.49556 17.5007 1.63014L15.7859 4.50098C17.238 5.29345 18.4007 6.3626 19.2739 7.70827C20.1464 9.05395 20.6523 10.5267 20.7913 12.1266V13.826H0.398804V12.1266ZM6.78336 9.3339C6.55904 9.55096 6.28467 9.6595 5.96025 9.6595C5.63581 9.6595 5.36175 9.55096 5.13805 9.3339C4.91374 9.1174 4.80158 8.85207 4.80158 8.53814C4.80158 8.22409 4.91374 7.95888 5.13805 7.74238C5.36175 7.5252 5.63581 7.41666 5.96025 7.41666C6.28467 7.41666 6.55904 7.5252 6.78336 7.74238C7.00706 7.95888 7.11891 8.22409 7.11891 8.53814C7.11891 8.85207 7.00706 9.1174 6.78336 9.3339ZM16.0527 9.3339C15.8283 9.55096 15.5539 9.6595 15.2296 9.6595C14.9051 9.6595 14.6311 9.55096 14.4074 9.3339C14.1831 9.1174 14.071 8.85207 14.071 8.53814C14.071 8.22409 14.1831 7.95888 14.4074 7.74238C14.6311 7.5252 14.9051 7.41666 15.2296 7.41666C15.5539 7.41666 15.8283 7.5252 16.0527 7.74238C16.2764 7.95888 16.3882 8.22409 16.3882 8.53814C16.3882 8.85207 16.2764 9.1174 16.0527 9.3339Z" fill="#080B18" />
                                      </svg></span>
                                    <span class="btn_label" data-text="Android">Android</span>
                                  </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="cry-mobile-img">
                            <img src="assets/img/feature/fea-mobile.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="feature-shape align-items-center">
            <img src="assets/img/feature/fea-color-sp.png" alt="">
        </div>
    </section>
    <!-- feature section end -->

    <!-- team & faq section start -->
    <div class="bg_img top-center pos-rel pb-145" data-background="assets/img/bg/team-bg.png">
         <!-- team section start -->
        <section class="team pt-140">
            <div class="container">
                <div class="section-title pb-35">
                    <h1 class="title">Meet our team member</h1>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="xb-team xb-team1 text-center">
                            <div class="xb-item--img pos-rel">
                                <img src="assets/img/team/member01.png" alt="">
                            </div>
                            <div class="xb-item--holder">
                                <a href="#!" class="xb-item--link"><i class="fab fa-linkedin-in"></i></a>
                                <h2 class="xb-item--title">Christopher Anthony</h2>
                                <span class="xb-item--sub-title">Founder & CEO</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 ">
                        <div class="row xb-team-right">
                            <div class="col-lg-4 col-md-6">
                                <div class="xb-team text-center">
                                    <div class="xb-item--img pos-rel">
                                        <img src="assets/img/team/member02.png" alt="">
                                    </div>
                                    <div class="xb-item--holder">
                                        <a class="xb-item--link" href="#!"><i class="fab fa-linkedin-in"></i></a>
                                        <h2 class="xb-item--title">Joseph Richard</h2>
                                        <span class="xb-item--sub-title">Blockchain Developer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="xb-team text-center">
                                    <div class="xb-item--img pos-rel">
                                        <img src="assets/img/team/member03.png" alt="">
                                    </div>
                                    <div class="xb-item--holder">
                                        <a class="xb-item--link" href="#!"><i class="fab fa-linkedin-in"></i></a>
                                        <h2 class="xb-item--title">James William</h2>
                                        <span class="xb-item--sub-title">Data Analyst</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="xb-team text-center">
                                    <div class="xb-item--img pos-rel">
                                        <img src="assets/img/team/member04.png" alt="">
                                    </div>
                                    <div class="xb-item--holder">
                                        <a class="xb-item--link" href="#!"><i class="fab fa-linkedin-in"></i></a>
                                        <h2 class="xb-item--title">Robert David</h2>
                                        <span class="xb-item--sub-title">Visual Designer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="xb-team text-center">
                                    <div class="xb-item--img pos-rel">
                                        <img src="assets/img/team/member05.png" alt="">
                                    </div>
                                    <div class="xb-item--holder">
                                        <a class="xb-item--link" href="#!"><i class="fab fa-linkedin-in"></i></a>
                                        <h2 class="xb-item--title">John Michael</h2>
                                        <span class="xb-item--sub-title">Legal & DPO</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="xb-team text-center">
                                    <div class="xb-item--img pos-rel">
                                        <img src="assets/img/team/member06.png" alt="">
                                    </div>
                                    <div class="xb-item--holder">
                                        <a class="xb-item--link" href="#!"><i class="fab fa-linkedin-in"></i></a>
                                        <h2 class="xb-item--title">Charles Thomas</h2>
                                        <span class="xb-item--sub-title">Content Writer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="xb-team text-center">
                                    <div class="xb-item--img pos-rel">
                                        <img src="assets/img/team/member07.png" alt="">
                                    </div>
                                    <div class="xb-item--holder">
                                        <a class="xb-item--link" href="#!"><i class="fab fa-linkedin-in"></i></a>
                                        <h2 class="xb-item--title">Daniel Matthew</h2>
                                        <span class="xb-item--sub-title">Project Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- team section end -->
        
        <!-- faq start -->
        <section class="faq pt-130">
            <div class="container">
                <div class="section-title pb-55 wow fadeInUp"  data-wow-duration=".7s">
                    <h1 class="title">Have Any Questions?</h1>
                </div>
                <div class="faq__blockchain wow fadeInUp" data-wow-duration=".7s" data-wow-delay="200ms">
                    <ul class="accordion_box clearfix">
                        <li class="accordion block">
                            <div class="acc-btn">
                                How do I participate in the ICO?
                                <span class="arrow"><span></span></span>
                            </div>
                            <div class="acc_body">
                                <div class="content">
                                    An ICO, or Initial Coin Offering, is a fundraising method used by cryptocurrency and blockchain projects to raise capital by issuing tokens to investors. In an ICO, investors purchase these tokens with cryptocurrencies or fiat currencies in exchange for a stake to its products or services.
                                </div>
                            </div>
                        </li>
                        <li class="accordion block active-block">
                            <div class="acc-btn">
                                What is an ICO?
                                <span class="arrow"><span></span></span>
                            </div>
                            <div class="acc_body current">
                                <div class="content">
                                    An ICO, or Initial Coin Offering, is a fundraising method used by cryptocurrency and blockchain projects to raise capital by issuing tokens to investors. In an ICO, investors purchase these tokens with cryptocurrencies or fiat currencies in exchange for a stake to its products or services. 
                                </div>
                            </div>
                        </li>
                        <li class="accordion block">
                            <div class="acc-btn">
                                What is the purpose of your project?
                                <span class="arrow"><span></span></span>
                            </div>
                            <div class="acc_body">
                                <div class="content">
                                    An ICO, or Initial Coin Offering, is a fundraising method used by cryptocurrency and blockchain projects to raise capital by issuing tokens to investors. In an ICO, investors purchase these tokens with cryptocurrencies or fiat currencies in exchange for a stake to its products or services.
                                </div>
                            </div>
                        </li>
                        <li class="accordion block">
                            <div class="acc-btn">
                                What are the benefits of holding your token?
                                <span class="arrow"><span></span></span>
                            </div>
                            <div class="acc_body">
                                <div class="content">
                                    An ICO, or Initial Coin Offering, is a fundraising method used by cryptocurrency and blockchain projects to raise capital by issuing tokens to investors. In an ICO, investors purchase these tokens with cryptocurrencies or fiat currencies in exchange for a stake to its products or services.
                                </div>
                            </div>
                        </li>
                        <li class="accordion block">
                            <div class="acc-btn">
                                How is the token distributed?
                                <span class="arrow"><span></span></span>
                            </div>
                            <div class="acc_body">
                                <div class="content">
                                    An ICO, or Initial Coin Offering, is a fundraising method used by cryptocurrency and blockchain projects to raise capital by issuing tokens to investors. In an ICO, investors purchase these tokens with cryptocurrencies or fiat currencies in exchange for a stake to its products or services.
                                </div>
                            </div>
                        </li>
                        <li class="accordion block">
                            <div class="acc-btn">
                                Is there a minimum investment requirement?
                                <span class="arrow"><span></span></span>
                            </div>
                            <div class="acc_body">
                                <div class="content">
                                    An ICO, or Initial Coin Offering, is a fundraising method used by cryptocurrency and blockchain projects to raise capital by issuing tokens to investors. In an ICO, investors purchase these tokens with cryptocurrencies or fiat currencies in exchange for a stake to its products or services.
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- faq end -->
        <div class="team-shape">
            <div class="shape shape--1">
                <img class="leftToRight" src="assets/img/shape/team-sp_01.svg" alt="">
            </div>
            <div class="shape shape--2">
                <img class="topToBottom" src="assets/img/shape/team-sp_02.svg" alt="">
            </div>
            <div class="shape shape--3">
                <img class="leftToRight" src="assets/img/shape/team-sp_03.svg" alt="">
            </div>
            <div class="shape shape--4">
                <img class="topToBottom" src="assets/img/shape/team-sp_04.svg" alt="">
            </div>
        </div>
    </div>
    <!-- team & faq section end -->

    <!-- event section start -->
    <section class="event pt-140 pb-150">
        <div class="container">
            <div class="section-title pb-55">
                <h1 class="title">upcoming ico events</h1>
            </div>
            <div class="row mt-none-30 justify-content-center">
                <div class="col-lg-4 col-md-6 mt-30">
                    <div class="xb-event">
                        <div class="xb-item--img">
                            <img src="assets/img/event/event-img01.jpg" alt="">
                        </div>
                        <div class="xb-item--holder">
                            <div class="xb-item--location"><i class="fal fa-map-marker-alt"></i><span>New York, USA</span></div>
                            <h2 class="xb-item--title border_effect"><a href="#!">Token Launch 202X Unveiling the Future of Finance..</a></h2>
                            <div class="xb-item--date-time ul_li_between">
                                <div class="xb-item--date xb-item--date-time1">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.66663 1.66675V4.16675" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13.3334 1.66675V4.16675" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.83337 10.8333H12.5" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.83337 14.1667H10" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13.3333 2.91675C16.1083 3.06675 17.5 4.12508 17.5 8.04175V13.1917C17.5 16.6251 16.6667 18.3417 12.5 18.3417H7.5C3.33333 18.3417 2.5 16.6251 2.5 13.1917V8.04175C2.5 4.12508 3.89167 3.07508 6.66667 2.91675H13.3333Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                      </svg><span>24 / 08 / 2024</span>
                                </div>
                                <div class="xb-item--time xb-item--date-time1">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.2917 11.0417C17.2917 15.0667 14.025 18.3333 10 18.3333C5.97504 18.3333 2.70837 15.0667 2.70837 11.0417C2.70837 7.01667 5.97504 3.75 10 3.75C14.025 3.75 17.2917 7.01667 17.2917 11.0417Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M10 6.66675V10.8334" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.5 1.66675H12.5" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                      </svg><span>09:00AM - 12:00AM</span>
                                </div>
                            </div>
                            <div class="xb-item--event-btn">
                                <a class="them-btn" href="#!">
                                    <span class="btn_label" data-text="Find out more">Find out more</span>
                                    <span class="btn_icon">
                                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"></path>
                                          </svg>
                                    </span>
                                  </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-30">
                    <div class="xb-event">
                        <div class="xb-item--img">
                            <img src="assets/img/event/event-img02.jpg" alt="">
                        </div>
                        <div class="xb-item--holder">
                            <div class="xb-item--location"><i class="fal fa-map-marker-alt"></i><span>London, United Kingdom</span></div>
                            <h2 class="xb-item--title border_effect"><a href="#!">Crypto Summit Unlocking Riding Opportunities in Blockchain..</a></h2>
                            <div class="xb-item--date-time ul_li_between">
                                <div class="xb-item--date xb-item--date-time1">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.66663 1.66675V4.16675" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13.3334 1.66675V4.16675" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.83337 10.8333H12.5" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.83337 14.1667H10" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13.3333 2.91675C16.1083 3.06675 17.5 4.12508 17.5 8.04175V13.1917C17.5 16.6251 16.6667 18.3417 12.5 18.3417H7.5C3.33333 18.3417 2.5 16.6251 2.5 13.1917V8.04175C2.5 4.12508 3.89167 3.07508 6.66667 2.91675H13.3333Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                      </svg><span>24 / 09 / 2024</span>
                                </div>
                                <div class="xb-item--time xb-item--date-time1">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.2917 11.0417C17.2917 15.0667 14.025 18.3333 10 18.3333C5.97504 18.3333 2.70837 15.0667 2.70837 11.0417C2.70837 7.01667 5.97504 3.75 10 3.75C14.025 3.75 17.2917 7.01667 17.2917 11.0417Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M10 6.66675V10.8334" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.5 1.66675H12.5" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                      </svg><span>09:00AM - 12:00AM</span>
                                </div>
                            </div>
                            <div class="xb-item--event-btn">
                                <a class="them-btn" href="#!">
                                    <span class="btn_label" data-text="Find out more">Find out more</span>
                                    <span class="btn_icon">
                                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"></path>
                                          </svg>
                                    </span>
                                  </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-30">
                    <div class="xb-event">
                        <div class="xb-item--img">
                            <img src="assets/img/event/event-img03.jpg" alt="">
                        </div>
                        <div class="xb-item--holder">
                            <div class="xb-item--location"><i class="fal fa-map-marker-alt"></i><span>Berlin, Germany</span></div>
                            <h2 class="xb-item--title border_effect"><a href="#!">Crypto Xchange  Connecting Investors and Innovators..</a></h2>
                            <div class="xb-item--date-time ul_li_between">
                                <div class="xb-item--date xb-item--date-time1">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.66663 1.66675V4.16675" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13.3334 1.66675V4.16675" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.83337 10.8333H12.5" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.83337 14.1667H10" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13.3333 2.91675C16.1083 3.06675 17.5 4.12508 17.5 8.04175V13.1917C17.5 16.6251 16.6667 18.3417 12.5 18.3417H7.5C3.33333 18.3417 2.5 16.6251 2.5 13.1917V8.04175C2.5 4.12508 3.89167 3.07508 6.66667 2.91675H13.3333Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                      </svg><span>24 / 10 / 2024</span>
                                </div>
                                <div class="xb-item--time xb-item--date-time1">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.2917 11.0417C17.2917 15.0667 14.025 18.3333 10 18.3333C5.97504 18.3333 2.70837 15.0667 2.70837 11.0417C2.70837 7.01667 5.97504 3.75 10 3.75C14.025 3.75 17.2917 7.01667 17.2917 11.0417Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M10 6.66675V10.8334" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.5 1.66675H12.5" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                      </svg><span>09:00AM - 12:00AM</span>
                                </div>
                            </div>
                            <div class="xb-item--event-btn">
                                <a class="them-btn" href="#!">
                                    <span class="btn_label" data-text="Find out more">Find out more</span>
                                    <span class="btn_icon">
                                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"></path>
                                          </svg>
                                    </span>
                                  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection