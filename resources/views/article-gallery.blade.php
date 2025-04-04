@extends('layouts.front-office.app')

@section('content')

    <!-- main area start  -->
    <main>

        <!-- breadcrumb start -->
        <section class="breadcrumb bg_img pos-rel" data-background="assets/img/bg/breadcrumb.jpg">
            <div class="container">
                <div class="breadcrumb__content">
                    <h2 class="breadcrumb__title">Article Gallery</h2>
                    <ul class="bread-crumb clearfix ul_li_center blog-flex-column">
                        <li class="breadcrumb-item"><a href="index.html">Items Found</a></li>
                        <li class="breadcrumb-item">30 News Articles</li>
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
        <section class="blog pb-130 blog-content">
            <div class="blog-back-button pt-55 pb-50 container">
                <a href="#" class="blog-arrow-container">
                    <img src="/assets/img/blog/arrow-back.png" alt="Arrow Icon">
                </a>
                <h5>
                    Home / <span>NEWS ARTICLES</span>
                </h5>
            </div>
            <div class="container">
                <div class="row mt-none-30">
                    <div class="col-lg-8 mt-30">
                        <div class="blog-post-wrap mt-none-30">
                            <article class="blog__item mt-30">
                                <a class="thumb" href="{{ url('news-details') }}">
                                    <img src="assets/img/blog/post_01.jpg" alt="">
                                    <h4 class="blog-news-article-title">
                                        News Article
                                    </h4>
                                </a>
                                <div class="blog__inner">
                                    <ul class="blog__meta ul_li mb-20 blog-meta-data">
                                        <li><a href="#!"><i class="far fa-map-marker-alt"></i>New York, USA</a></li>
                                        <li><i class="far fa-clock"></i>Dec 28, 2022</li>
                                        <li><a href="#!"><i class="far fa-comment"></i>(04) Comments</a></li>
                                    </ul>
                                    <h2 class="title border_effect"><a href="{{ url('news-details') }}">Examining the Rise,
                                            Evolution, and Future of Token Sales in the Cryptocurrency </a></h2>
                                    <p>Our ICO presents a unique opportunity to embark on a journey into the crypto
                                        frontier, where groundbreaking ideas and technological advancements converge. </p>
                                    <button class="them-btn blog-find-out-more mt-30" onclick="window.location.href='{{ url('news-details') }}';">
                                        <span class="btn_label" data-text="FIND OUT MORE">FIND OUT MORE</span>
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
                            </article>
                            <article class="blog__item mt-30">
                                <a class="thumb" href="{{ url('news-details') }}">
                                    <img src="assets/img/blog/post_04.jpg" alt="">
                                    <h4 class="blog-news-article-title">
                                        News Article
                                    </h4>
                                </a>
                                <div class="blog__inner">
                                    <ul class="blog__meta ul_li mb-20 blog-meta-data">
                                        <li><a href="#!"><i class="far fa-map-marker-alt"></i>London, United Kingdom</a>
                                        </li>
                                        <li><i class="far fa-clock"></i>Dec 28, 2022</li>
                                        <li><a href="#!"><i class="far fa-comment"></i>(04) Comments</a></li>
                                    </ul>
                                    <h2 class="title border_effect"><a href="{{ url('news-details') }}">From Concept to Reality
                                            Discover the Journey of Our ICO Project</a></h2>
                                    <p>we stand on the threshold of a significant milestone: our ICO campaign. This phase
                                        represents the culmination of our efforts an opportunity for you to be part of the
                                        journey.</p>
                                    <button class="them-btn blog-find-out-more mt-30" onclick="window.location.href='{{ url('news-details') }}';">
                                        <span class="btn_label" data-text="FIND OUT MORE">FIND OUT MORE</span>
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
                            </article>
                            <article class="blog__item mt-30">
                                <a class="thumb" href="{{ url('news-details') }}">
                                    <img src="assets/img/blog/post_03.jpg" alt="">
                                    <h4 class="blog-news-article-title">
                                        News Article
                                    </h4>
                                </a>
                                <div class="blog__inner">
                                    <ul class="blog__meta ul_li mb-20 blog-meta-data">
                                        <li><a href="#!"><i class="far fa-map-marker-alt"></i>Berlin, Germany</a></li>
                                        <li><i class="far fa-clock"></i>Dec 28, 2022</li>
                                        <li><a href="#!"><i class="far fa-comment"></i>(04) Comments</a></li>
                                    </ul>
                                    <h2 class="title border_effect"><a href="{{ url('news-details') }}">ICO Launchpad Your Gateway to
                                            Exciting Investment Opportunities</a></h2>
                                    <p>The world of blockchain and cryptocurrency is dynamic and ever-evolving. As
                                        traditional <br> boundaries shift, new avenues for growth emerge. Our ICO Launchpad
                                        is your.</p>
                                    <button class="them-btn blog-find-out-more mt-30" onclick="window.location.href='{{ url('news-details') }}';">
                                        <span class="btn_label" data-text="FIND OUT MORE">FIND OUT MORE</span>
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
                            </article>
                        </div>
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
                    <div class="col-lg-4 mt-30">
                        @include('partials.front-office.blog-sidebar')
                    </div>
                </div>
            </div>
        </section>
        <!-- blog end -->

    </main>
    <!-- main area end  -->
@endsection