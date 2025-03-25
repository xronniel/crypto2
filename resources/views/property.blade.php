@extends('layouts.front-office.app')

@section('content')
    <section class="blog pt-50 pb-50">
        <div class="container">

            <div class="property-filter-box">
                <div class="property-filter">
                    <img src="assets/img/property/search.png" alt="search">
                    <input placeholder="City, community or building" type="text">
                </div>

                <div class="property-filter-two">
                    <div class="property-filter-select">
                        <img class="property-filter-img" src="assets/img/home/arrow.png" alt="">
                        <p class="filter-badge">NEW</p>
                        <select name="cars" id="cars">
                            <option value="Buy">Buy</option>
                        </select>
                    </div>
                    <div class="property-filter-select">
                        <img class="property-filter-img" src="assets/img/home/arrow.png" alt="">
                        <select name="cars" id="cars">
                            <option value="Buy">Property type</option>
                        </select>
                    </div>
                    <div class="property-filter-select">
                        <img class="property-filter-img" src="assets/img/home/arrow.png" alt="">
                        <select name="cars" id="cars">
                            <option value="Buy">Beds & Baths</option>
                        </select>
                    </div>
                    <div class="property-filter-select">
                        <img class="property-filter-img" src="assets/img/home/arrow.png" alt="">
                        <select name="cars" id="cars">
                            <option value="Buy">Price</option>
                        </select>
                    </div>
                    <div class="property-filter-select">
                        <img class="property-filter-img" src="assets/img/home/arrow.png" alt="">
                        <select name="cars" id="cars">
                            <option value="Buy">More Filters</option>
                        </select>
                    </div>
                    <button class="property-filter-button">
                        Find
                    </button>

                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start -->
    <section class="breadcrumb bg_img pos-rel" data-background="assets/img/bg/breadcrumb.jpg">
        <div class="container">
            <div class="breadcrumb__content">
                <h2 class="breadcrumb__title">Properties for Sale in UAE</h2>
                <ul style="    flex-direction: column;" class="bread-crumb clearfix ul_li_center">
                    <li class="breadcrumb-item"><a href="index.html">Items Found</a></li>
                    <li class="breadcrumb-item"> 218,954 properties</li>
                </ul>
            </div>
        </div>
        <div class="breadcrumb__icon">
            <div class="icon icon--1">
                <img class="leftToRight" src="assets/img/icon/bi_01.png" alt="">
            </div>
            <div class="icon icon--2">
                <img class="topToBottom" src="assets/img/icon/bi_02.png" alt="">
            </div>
            <div class="icon icon--3">
                <img class="topToBottom" src="assets/img/icon/bi_03.png" alt="">
            </div>
            <div class="icon icon--4">
                <img class="leftToRight" src="assets/img/icon/bi_04.png" alt="">
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- blog start -->
    <section class="blog pt-130 pb-130">
        <div class="container">

            <div class="page-line-path">
                <img src="assets/img/property/home.png" alt="home">
                <img src="assets/img/property/right-arrow.png" alt="home">
                <p>Properties for sale in UAE</p>
            </div>

            <h2 class="page-line-title">
                Buy Properties in Dubai
            </h2>


            <div class="page-line-filter">

                <div class="page-line-filter-h3">
                    <p>218,954</p>
                    <span>properties available</span>
                </div>

                <div class="page-line-filter-links">
                    <a class="page-line-filter-links-ctive" href="#">Any</a>
                    <a href="#">Off-plan</a>
                    <a href="#">Ready</a>
                </div>

            </div>


            <div class="page-line-filter">

                <div class="page-line-filter-links-two">
                    <a href="#">
                        <img style="    width: 22px;" class="page-line-filter-links-two-img"
                            src="assets/img/property/location.png" alt="home">
                        Map view</a>
                    <a href="#">
                        <img style="    width: 19px;" class="page-line-filter-links-two-img"
                            src="assets/img/property/alert.png" alt="home">
                        Create alert</a>
                </div>

                <div class="page-line-filter-links-two">
                    <img class="filter-links-two-img" src="assets/img/home/arrow.png" alt="">
                    <label for="cars">Sort by:</label>

                    <select name="cars" id="cars">
                        <option value="volvo">1</option>
                    </select>
                </div>

            </div>


            <div class="row mt-none-30">
                <div class="col-lg-9 mt-30">
{{-- card   --}}
                    <div 
                    style="margin-bottom: 50px;"
                    class="blog-post-wrap mt-none-30">
                        <article class="blog__item mt-30 blog__item-property">
                            <div class="blog__item-property-one swiper">
                                <img class="Favorite-green" src="assets/img/property/green-Favorite.png" alt="Favorite">
                                <img class="location-green" src="assets/img/property/location-green.png" alt="location">

                                <div class="img-slider-count">
                                    <img class="" src="assets/img/property/cam.png" alt="location">
                                    <p></p>
                                </div>


                                <div class="budge-three-div">
                                    <p>
                                        <img class="" src="assets/img/property/Verified-img.png" alt="location">
                                        Verified</p>
                                        <p>
                                        <img class="" src="assets/img/property/SuperAgent-img.png" alt="location">
                                        SuperAgent</p>
                                    <p>New</p>

                                </div>


                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><img class="blog__item-property-one-img-slide"
                                            src="assets/img/property/bulding-1.jpeg" alt="amar"></div>
                                    <div class="swiper-slide"><img class="blog__item-property-one-img-slide"
                                            src="assets/img/property/bulding-1.jpeg" alt="amar"></div>
                                    <div class="swiper-slide"><img class="blog__item-property-one-img-slide"
                                            src="assets/img/property/bulding-1.jpeg" alt="amar"></div>
                                    <div class="swiper-slide"><img class="blog__item-property-one-img-slide"
                                            src="assets/img/property/bulding-1.jpeg" alt="amar"></div>
                                </div>
                                <!-- Pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                            <div style="background-image: url(assets/img/bg/tm_bg.png);
                                background-size: cover;
                            " class="blog__item-property-two">

                                <div class="blog__item-property-two-box">
                                    <h1 class="blog__item-property-two-title">Villa</h1>
                                    <p>Premium</p>
                                </div>
                                <div class="blog__item-property-two-box-two">
                                    <div class="blog__item-property-two-box-one">
                                        <p class="box-two-p-one">
                                            53.64 (BTC)
                                        </p>
                                        <p class="box-two-p-two">
                                            16,500,000 AED
                                        </p>
                                    </div>

                                    <div class="blog__item-property-two-img">
                                        <img src="assets/img/property/state-logo.jpeg" alt="logo">
                                    </div>

                                </div>
                                <div class="blog__item-property-two-box-three">
                                    <p>Bespoke Upgrades | Extended | Vacant</p>
                                </div>
                                <div class="location-property-two-box-three">
                                    <img src="assets/img/property/green-location.png" alt="location">
                                    <p>Hattan, Arabian Ranches, Dubai</p>
                                </div>
                                <div class="property-two-box-four">
                                    <img class="img-four" src="assets/img/property/green-bed.png" alt="bed">
                                    <p>5</p>
                                    <img src="assets/img/property/pipeline.png" alt="pipeline">
                                    <img class="img-four" src="assets/img/property/green-bath.png" alt="bath">
                                    <p>5</p>
                                    <img src="assets/img/property/pipeline.png" alt="pipeline">
                                    <img class="img-four" src="assets/img/property/green-size.png" alt="size">
                                    <p>5</p>
                                </div>

                                <div class="property-two-box-five">

                                    <div class="property-two-box-five-one">

                                        <div class="property-two-box-five-one-img">
                                            <img src="assets/img/property/person.jpeg" alt="person">
                                        </div>
                                        <div class="property-two-box-five-one-name">
                                            <p>John Doe</p>
                                            <h4>Real Estate Agent</h4>
                                        </div>
                                    </div>


                                    <div class="property-two-box-five-two">
                                        <a href="#">
                                            <img src="assets/img/property/dark-call.png" alt="size">
                                            Call</a>
                                        <a href="#">
                                            <img src="assets/img/property/dark-mail.png" alt="size">
                                            Email</a>
                                        <a href="#">
                                            <img src="assets/img/property/dark-WhatsApp.png" alt="size">

                                            WhatsApp</a>
                                    </div>
                                </div>





                            </div>
                        </article>
                    </div>
{{-- end card   --}}
{{-- card   --}}
                    <div 
                    style="margin-bottom: 50px;"
                    class="blog-post-wrap mt-none-30">
                        <article class="blog__item mt-30 blog__item-property">
                            <div class="blog__item-property-one swiper">
                                <img class="Favorite-green" src="assets/img/property/green-Favorite.png" alt="Favorite">
                                <img class="location-green" src="assets/img/property/location-green.png" alt="location">

                                <div class="img-slider-count">
                                    <img class="" src="assets/img/property/cam.png" alt="location">
                                    <p></p>
                                </div>


                                <div class="budge-three-div">
                                    <p>Verified</p>
                                    <p>SuperAgent</p>
                                    <p>New</p>

                                </div>


                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><img class="blog__item-property-one-img-slide"
                                            src="assets/img/property/bulding-1.jpeg" alt="amar"></div>
                                    <div class="swiper-slide"><img class="blog__item-property-one-img-slide"
                                            src="assets/img/property/bulding-1.jpeg" alt="amar"></div>
                                    <div class="swiper-slide"><img class="blog__item-property-one-img-slide"
                                            src="assets/img/property/bulding-1.jpeg" alt="amar"></div>
                                    <div class="swiper-slide"><img class="blog__item-property-one-img-slide"
                                            src="assets/img/property/bulding-1.jpeg" alt="amar"></div>
                                </div>
                                <!-- Pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                            <div style="background-image: url(assets/img/bg/tm_bg.png);" class="blog__item-property-two">

                                <div class="blog__item-property-two-box">
                                    <h1 class="blog__item-property-two-title">Villa</h1>
                                    <p>Premium</p>
                                </div>
                                <div class="blog__item-property-two-box-two">
                                    <div class="blog__item-property-two-box-one">
                                        <p class="box-two-p-one">
                                            53.64 (BTC)
                                        </p>
                                        <p class="box-two-p-two">
                                            16,500,000 AED
                                        </p>
                                    </div>

                                    <div class="blog__item-property-two-img">
                                        <img src="assets/img/property/state-logo.jpeg" alt="logo">
                                    </div>

                                </div>
                                <div class="blog__item-property-two-box-three">
                                    <p>Bespoke Upgrades | Extended | Vacant</p>
                                </div>
                                <div class="location-property-two-box-three">
                                    <img src="assets/img/property/green-location.png" alt="location">
                                    <p>Hattan, Arabian Ranches, Dubai</p>
                                </div>
                                <div class="property-two-box-four">
                                    <img class="img-four" src="assets/img/property/green-bed.png" alt="bed">
                                    <p>5</p>
                                    <img src="assets/img/property/pipeline.png" alt="pipeline">
                                    <img class="img-four" src="assets/img/property/green-bath.png" alt="bath">
                                    <p>5</p>
                                    <img src="assets/img/property/pipeline.png" alt="pipeline">
                                    <img class="img-four" src="assets/img/property/green-size.png" alt="size">
                                    <p>5</p>
                                </div>

                                <div class="property-two-box-five">

                                    <div class="property-two-box-five-one">

                                        <div class="property-two-box-five-one-img">
                                            <img src="assets/img/property/person.jpeg" alt="person">
                                        </div>
                                        <div class="property-two-box-five-one-name">
                                            <p>John Doe</p>
                                            <h4>Real Estate Agent</h4>
                                        </div>
                                    </div>


                                    <div class="property-two-box-five-two">
                                        <a href="#">
                                            <img src="assets/img/property/dark-call.png" alt="size">
                                            Call</a>
                                        <a href="#">
                                            <img src="assets/img/property/dark-mail.png" alt="size">
                                            Email</a>
                                        <a href="#">
                                            <img src="assets/img/property/dark-WhatsApp.png" alt="size">

                                            WhatsApp</a>
                                    </div>
                                </div>





                            </div>
                        </article>
                    </div>
{{-- end card   --}}
{{-- card   --}}
                    <div 
                    style="margin-bottom: 50px;"
                    class="blog-post-wrap mt-none-30">
                        <article class="blog__item mt-30 blog__item-property">
                            <div class="blog__item-property-one swiper">
                                <img class="Favorite-green" src="assets/img/property/green-Favorite.png" alt="Favorite">
                                <img class="location-green" src="assets/img/property/location-green.png" alt="location">

                                <div class="img-slider-count">
                                    <img class="" src="assets/img/property/cam.png" alt="location">
                                    <p></p>
                                </div>


                                <div class="budge-three-div">
                                    <p>Verified</p>
                                    <p>SuperAgent</p>
                                    <p>New</p>

                                </div>


                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><img class="blog__item-property-one-img-slide"
                                            src="assets/img/property/bulding-1.jpeg" alt="amar"></div>
                                    <div class="swiper-slide"><img class="blog__item-property-one-img-slide"
                                            src="assets/img/property/bulding-1.jpeg" alt="amar"></div>
                                    <div class="swiper-slide"><img class="blog__item-property-one-img-slide"
                                            src="assets/img/property/bulding-1.jpeg" alt="amar"></div>
                                    <div class="swiper-slide"><img class="blog__item-property-one-img-slide"
                                            src="assets/img/property/bulding-1.jpeg" alt="amar"></div>
                                </div>
                                <!-- Pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                            <div style="background-image: url(assets/img/bg/tm_bg.png);" class="blog__item-property-two">

                                <div class="blog__item-property-two-box">
                                    <h1 class="blog__item-property-two-title">Villa</h1>
                                    <p>Premium</p>
                                </div>
                                <div class="blog__item-property-two-box-two">
                                    <div class="blog__item-property-two-box-one">
                                        <p class="box-two-p-one">
                                            53.64 (BTC)
                                        </p>
                                        <p class="box-two-p-two">
                                            16,500,000 AED
                                        </p>
                                    </div>

                                    <div class="blog__item-property-two-img">
                                        <img src="assets/img/property/state-logo.jpeg" alt="logo">
                                    </div>

                                </div>
                                <div class="blog__item-property-two-box-three">
                                    <p>Bespoke Upgrades | Extended | Vacant</p>
                                </div>
                                <div class="location-property-two-box-three">
                                    <img src="assets/img/property/green-location.png" alt="location">
                                    <p>Hattan, Arabian Ranches, Dubai</p>
                                </div>
                                <div class="property-two-box-four">
                                    <img class="img-four" src="assets/img/property/green-bed.png" alt="bed">
                                    <p>5</p>
                                    <img src="assets/img/property/pipeline.png" alt="pipeline">
                                    <img class="img-four" src="assets/img/property/green-bath.png" alt="bath">
                                    <p>5</p>
                                    <img src="assets/img/property/pipeline.png" alt="pipeline">
                                    <img class="img-four" src="assets/img/property/green-size.png" alt="size">
                                    <p>5</p>
                                </div>

                                <div class="property-two-box-five">

                                    <div class="property-two-box-five-one">

                                        <div class="property-two-box-five-one-img">
                                            <img src="assets/img/property/person.jpeg" alt="person">
                                        </div>
                                        <div class="property-two-box-five-one-name">
                                            <p>John Doe</p>
                                            <h4>Real Estate Agent</h4>
                                        </div>
                                    </div>


                                    <div class="property-two-box-five-two">
                                        <a href="#">
                                            <img src="assets/img/property/dark-call.png" alt="size">
                                            Call</a>
                                        <a href="#">
                                            <img src="assets/img/property/dark-mail.png" alt="size">
                                            Email</a>
                                        <a href="#">
                                            <img src="assets/img/property/dark-WhatsApp.png" alt="size">

                                            WhatsApp</a>
                                    </div>
                                </div>





                            </div>
                        </article>
                    </div>
{{-- end card   --}}
                    <div class="pagination_wrap pt-50">
                        <ul>
                            <li><a href="#"><i class="far fa-long-arrow-left"></i></a></li>
                            <li><a href="#" class="current_page">01</a></li>
                            <li><a href="#">02</a></li>
                            <li><a href="#"><i class="fal fa-ellipsis-h"></i></a></li>
                            <li><a href="#">08</a></li>
                            <li><a href="#"><i class="far fa-long-arrow-right"></i></a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 mt-30">
                    <div class="sidebar-area mt-none-30">

                        <div class="widget  widget-one mt-30">
                            <h3 class="widget__title">Nearby Areas</h3>
                            <ul class="widget__category list-unstyled">
                                <li><a href="#!">Properties for sale in Dubai</a></li>
                                <li><a href="#!">Properties for sale in Abu Dhabi</a></li>
                                <li><a href="#!">Properties for sale in Ajman</a></li>
                                <li><a href="#!">Properties for sale in Sharjah</a></li>
                            </ul>
                            <h3 class="widget__title">Popular Searches</h3>
                            <ul class="widget__category list-unstyled">
                                <li><a href="#!">Properties for sale in Dubai</a></li>
                                <li><a href="#!">Properties for sale in Abu Dhabi</a></li>
                                <li><a href="#!">Properties for sale in Ajman</a></li>
                                <li><a href="#!">Properties for sale in Sharjah</a></li>
                                <li><a href="#!">Properties for sale in Dubai</a></li>
                                <li><a href="#!">Properties for sale in Abu Dhabi</a></li>
                                <li><a href="#!">Properties for sale in Ajman</a></li>
                                <li><a href="#!">Properties for sale in Sharjah</a></li>
                                <li><a href="#!">Properties for sale in Dubai</a></li>
                                <li><a href="#!">Properties for sale in Abu Dhabi</a></li>
                                <li><a href="#!">Properties for sale in Ajman</a></li>
                                <li><a href="#!">Properties for sale in Sharjah</a></li>
                            </ul>
                        </div>



                        <div class="widget widget-two mt-30">

                            <div class="widget-two-one">
                                <img src="assets/img/property/amar.png" alt="amar">
                            </div>
                            <div class="widget-two-two">
                                <img src="assets/img/property/amar-1.png" alt="amar">
                                <img src="assets/img/property/amar-2.png" alt="amar">
                                <img src="assets/img/property/amar-link.png" alt="amar">
                                <img src="assets/img/property/amar-3.png" alt="amar">
                            </div>
                        </div>



                        <div class="widget widget-three mt-30">
                            <img src="assets/img/property/marta.gif" alt="amar">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog end -->





    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const sliderWrapper = document.querySelector(".swiper-wrapper");

            const slideCount = sliderWrapper.querySelectorAll(".swiper-slide").length;

            const countElement = document.querySelector(".img-slider-count p");
            countElement.textContent = `${slideCount}`;
        });
    </script>
@endsection
