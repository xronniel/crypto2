@extends('layouts.front-office.app')

@section('content')

      <!-- main area start  -->
      <main>
        
        <!-- breadcrumb start -->
        <section class="breadcrumb bg_img pos-rel" data-background="assets/img/bg/breadcrumb.jpg">
            <div class="container">
                <div class="breadcrumb__content">
                    <h2 class="breadcrumb__title">Blog & Article</h2>
                    <ul class="bread-crumb clearfix ul_li_center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Blog & Article</li>
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
                <div class="row mt-none-30">
                    <div class="col-lg-8 mt-30">
                        <div class="blog-post-wrap mt-none-30">
                            <article class="blog__item mt-30">
                                <a class="thumb" href="blog-single.html"><img src="assets/img/blog/post_01.jpg" alt=""></a>
                                <div class="blog__inner">
                                    <ul class="blog__meta ul_li mb-30">
                                        <li><a href="#!"><i class="far fa-user"></i>Colin Scotland</a></li>
                                        <li><i class="far fa-clock"></i>Dec 28, 2022</li>
                                        <li><a href="#!"><i class="far fa-comment"></i>(04) Comments</a></li>
                                    </ul>
                                    <h2 class="title border_effect"><a href="blog-single.html">Examining the Rise, Evolution, and Future of Token Sales in the Cryptocurrency </a></h2>
                                    <p>Our ICO presents a unique opportunity to embark on a journey into the crypto frontier, where groundbreaking ideas and technological advancements converge. </p>
                                    <a class="blog-btn" href="blog-single.html">Read MOre</a>
                                </div>
                            </article>
                            <article class="blog__item mt-30">
                                <a class="thumb" href="blog-single.html"><img src="assets/img/blog/post_04.jpg" alt=""></a>
                                <div class="blog__inner">
                                    <ul class="blog__meta ul_li mb-20">
                                        <li><a href="#!"><i class="far fa-user"></i>Chris Matts</a></li>
                                        <li><i class="far fa-clock"></i>Dec 28, 2022</li>
                                        <li><a href="#!"><i class="far fa-comment"></i>(04) Comments</a></li>
                                    </ul>
                                    <h2 class="title border_effect"><a href="blog-single.html">From Concept to Reality Discover the Journey of Our ICO Project</a></h2>
                                    <p>we stand on the threshold of a significant milestone: our ICO campaign. This phase represents the culmination of our efforts an opportunity for you to be part of the journey.</p>
                                    <a class="blog-btn" href="blog-single.html">Read MOre</a>
                                </div>
                            </article>
                            <article class="blog__item mt-30">
                                <a class="thumb" href="blog-single.html"><img src="assets/img/blog/post_03.jpg" alt=""></a>
                                <div class="blog__inner">
                                    <ul class="blog__meta ul_li mb-30">
                                        <li><a href="#!"><i class="far fa-user"></i>Dan Kurtz</a></li>
                                        <li><i class="far fa-clock"></i>Dec 28, 2022</li>
                                        <li><a href="#!"><i class="far fa-comment"></i>(04) Comments</a></li>
                                    </ul>
                                    <h2 class="title border_effect"><a href="blog-single.html">ICO Launchpad Your Gateway to Exciting Investment Opportunities</a></h2>
                                    <p>The world of blockchain and cryptocurrency is dynamic and ever-evolving. As traditional <br> boundaries shift, new avenues for growth emerge. Our ICO Launchpad is your.</p>
                                    <a class="blog-btn" href="blog-single.html">Read MOre</a>
                                </div>
                            </article>
                            <article class="blog__item mt-30">
                                <a class="thumb" href="blog-single.html"><img src="assets/img/blog/post_02.jpg" alt=""></a>
                                <div class="blog__inner">
                                    <ul class="blog__meta ul_li mb-30">
                                        <li><a href="#!"><i class="far fa-user"></i>Derek Gehl</a></li>
                                        <li><i class="far fa-clock"></i>Dec 28, 2022</li>
                                        <li><a href="#!"><i class="far fa-comment"></i>(04) Comments</a></li>
                                    </ul>
                                    <h2 class="title border_effect"><a href="blog-single.html">ICO Revolution Investing in Blockchain  Solutions for a Decentralized World</a></h2>
                                    <p>Welcome to the ICO Revolution, where your investments have the power to reshape <br> industries and drive the transformation towards a decentralized future.</p>
                                    <a class="blog-btn" href="blog-single.html">Read MOre</a>
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
                        <div class="sidebar-area mt-none-30">
                            <div class="widget mt-30">
                                <h3 class="widget__title">Search</h3>
                                <form class="widget__search" action="#!">
                                    <input type="text" placeholder="Search your keyword">
                                    <button><i class="far fa-search"></i></button>
                                </form>
                            </div>
                            <div class="widget mt-30">
                                <h3 class="widget__title">Categories</h3>
                                <ul class="widget__category list-unstyled">
                                    <li><a href="#!">Blockchain <span>05</span></a></li>
                                    <li><a href="#!">Web Development <span>03</span></a></li>
                                    <li><a href="#!">Cryptocurrency <span>06</span></a></li>
                                    <li><a href="#!">Branding Design <span>05</span></a></li>
                                    <li><a href="#!">Uncategorized <span>02</span></a></li>
                                    <li><a href="#!">UI/UX Design <span>04</span></a></li>
                                    <li><a href="#!">Email Marketing <span>05</span></a></li>
                                </ul>
                            </div>
                            <div class="widget mt-30">
                                <h3 class="widget__title">Recent Posts</h3>
                                <div class="widget__post">
                                    <div class="widget__post-item ul_li">
                                        <div class="post-thumb">
                                            <a href="blog-single.html"><img src="assets/img/blog/post_01.jpg" alt=""></a>
                                        </div>
                                        <div class="post-content">
                                            <span class="post-date">July 25,2023</span>
                                            <h4 class="post-title border-effect-2"><a href="blog-single.html">We Advocate Swapping Screen Time</a></h4>
                                        </div>
                                    </div>
                                    <div class="widget__post-item ul_li">
                                        <div class="post-thumb">
                                            <a href="blog-single.html"><img src="assets/img/blog/w_02.jpg" alt=""></a>
                                        </div>
                                        <div class="post-content">
                                            <span class="post-date">March 20,2023</span>
                                            <h4 class="post-title border-effect-2"><a href="blog-single.html">Utilizing mobile technology in the field</a></h4>
                                        </div>
                                    </div>
                                    <div class="widget__post-item ul_li">
                                        <div class="post-thumb">
                                            <a href="blog-single.html"><img src="assets/img/blog/w_03.jpg" alt=""></a>
                                        </div>
                                        <div class="post-content">
                                            <span class="post-date">July 18,2023</span>
                                            <h4 class="post-title border-effect-2"><a href="blog-single.html">Building intelligent transportation systems</a></h4>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="widget mt-30">
                                <h3 class="widget__title">Follow Us</h3>
                                <ul class="widget__social ul_li">
                                    <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                                <div class="widget__divider mt-40 mb-40"></div>
                                <a class="blog-btn" href="#!">PURCHASE TOKEN</a>
                            </div>
                            <div class="widget mt-30">
                                <h3 class="widget__title">Tags</h3>
                                <div class="tagcloud">
                                    <a href="#!">ICO</a>
                                    <a href="#!">blockchain</a>
                                    <a href="#!">investments</a>
                                    <a href="#!">currency</a>
                                    <a href="#!">crypto trading</a>
                                    <a href="#!">crypto</a>
                                    <a href="#!">ico blockchain</a>
                                    <a href="#!">advisor</a>
                                    <a href="#!">web</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog end -->
        
    </main>
    <!-- main area end  -->
@endsection