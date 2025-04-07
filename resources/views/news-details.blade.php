@extends('layouts.front-office.app')

@section('content')

    <!-- main area start  -->
    <main>

        <!-- breadcrumb start -->
        <section class="breadcrumb bg_img pos-rel" data-background="{{ asset('assets/img/bg/breadcrumb.jpg') }}">
            <div class="container">
                <div class="breadcrumb__content">
                    <h2 class="breadcrumb__title">News Details</h2>
                    <ul class="bread-crumb clearfix ul_li_center blog-flex-column">
                        <li class="breadcrumb-item">News Article Title</li>
                        <li class="breadcrumb-item blog-title-description">{{ $news->title }}</li>
                    </ul>
                </div>
            </div>
            <div class="breadcrumb__icon">
                <div class="icon icon--1">
                    <img class="leftToRight" src="{{ asset('assets/img/icon/bi_01.png') }}" alt="">
                </div>
                <div class="icon icon--2">
                    <img class="topToBottom" src="{{ asset('assets/img/icon/bi_02.png') }}" alt="">
                </div>
                <div class="icon icon--3">
                    <img class="topToBottom" src="{{ asset('assets/img/icon/bi_03.png') }}" alt="">
                </div>
                <div class="icon icon--4">
                    <img class="leftToRight" src="{{ asset('assets/img/icon/bi_04.png') }}" alt="">
                </div>
            </div>
        </section>
        <!-- breadcrumb end -->

        <!-- blog start -->
        <section class="blog pb-130 blog-content">
            <div class="blog-back-button pt-55 pb-50 container">
                <a href="{{ url('/news  ') }}" class="blog-arrow-container">
                    <img src="{{ asset('/assets/img/blog/arrow-back.png') }}" alt="Arrow Icon">
                </a>
                <h5>
                    Home / NEWS GALLERY / <span>{{ \Illuminate\Support\Str::limit($news->title, 16) }}</span>
                </h5>
            </div>
            <div class="container">
                <div class="row mt-none-30">
                    <div class="col-lg-8 mt-30">
                        <div class="blog-post-wrap mt-none-30">
                            <article class="blog__item blog-details-desciption mt-30">
                                <a class="thumb blog-desktop-thumb">
                                    <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="News Image" class="desktop">
                                    <img src="{{ asset('storage/' . $news->mobile_thumbnail) }}" alt="News Image"
                                        class="mobile">
                                    <h4 class="blog-news-article-title">
                                        News Article
                                    </h4>
                                </a>
                                <div class="blog__inner blog-details-inner">
                                    <ul class="blog__meta ul_li mb-30 blog-meta-data">
                                        <li><a href="#!"><i class="far fa-map-marker-alt"></i>{{ $news->state }},
                                                {{ $news->country }}</a></li>
                                        <li><i
                                                class="far fa-clock"></i>{{ \Carbon\Carbon::parse($news->date)->format('M d, Y') }}
                                        </li>
                                        <li><a href="#!"><i class="far fa-comment"></i>(04) Comments</a></li>
                                    </ul>
                                    <h2 class="title border_effect"><a href="blog-single.html">{{ $news->title }}</a></h2>
                                    <p>
                                        {{ $news->content }}
                                    </p>
                                    <div class="blog-gallery-container mt-20">
                                        @foreach ($news->galleries as $newsGalleries)
                                            <img src="{{ asset('storage/' . $newsGalleries->image_path) }}" alt="News Gallery">
                                        @endforeach
                                    </div>
                                    <!-- <div class="blog-details-quote-container">
                                                <div class="blog-details-quote">
                                                    <img src="{{ asset('/assets/img/blog/quote.png') }}" alt="Quote Icon">
                                                </div>
                                                <h3>
                                                    "Creativity is allowing yourself to make mistakes. You only have to do a few
                                                    things right in your life so long as you don't do too many things."
                                                </h3>
                                                <h4>
                                                    Cameron Williamson
                                                </h4>
                                            </div>
                                            <p>
                                                With expert guidance and practical tips, you'll develop the skills and knowledge
                                                necessary to navigate the
                                                ever-evolving landscape of CryptoHome investing. From deciphering white papers to
                                                evaluating community engagement, each aspect of the CryptoHome evaluation process is
                                                dissected to empower you with the tools needed to make informed investment
                                                decisions.Join us on this transformative journey as we unveil the secrets to finding
                                                promising CryptoHome projects.
                                                <br><br>
                                                Visa consultants provide continuous support, helping you navigate any additional
                                                requests from
                                                immigration authorities and addressing any concerns that may arise during the
                                                processing period.
                                            </p>
                                            <div class="row mb-30">
                                                <div class="col-lg-6 mt-30">
                                                    <img src="{{ asset('/assets/img/blog/post_m.jpg') }}" alt="Blog Content Image">
                                                </div>
                                                <div class="col-lg-6 mt-30">
                                                    <ul>
                                                        <li class="mb-15 blog-list-inside">Identifying promising Crypto Currency.</li>
                                                        <li class="mb-15 blog-list-inside">Research and due diligence.</li>
                                                        <li class="mb-15 blog-list-inside">Evaluating team, tokenomics.</li>
                                                        <li class="mb-15 blog-list-inside">Understanding market trends.</li>
                                                        <li class="mb-15 blog-list-inside">Confidently navigating CryptoHome.</li>
                                                        <li class="mb-15 blog-list-inside">Empowering informed decisions.</li>
                                                        <li class="blog-list-inside">Achieving Success</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h3 class="mb-20 blog-details-sub-title">
                                                3 Reasons to investing at this moment
                                            </h3>
                                            <p>
                                                This comprehensive guide equips both novice and seasoned investors with the tools
                                                needed to navigate the
                                                dynamic CryptoHome landscape. From conducting meticulous research and due diligence
                                                to deciphering the
                                                intricacies of tokenomics and evaluating the project's team, technology, and market
                                                potential, you'll gain
                                                valuable identifying hidden gems poised for success.
                                            </p>
                                            <div class="blog-details-comment-section">
                                                <h4 class="blog-details-comment-title">
                                                    03 Comments
                                                </h4>
                                                <div class="blog-details-comment">
                                                    <img src="{{ asset('/assets/img/blog/post_m.jpg') }}" alt="Author Image">
                                                    <div class="blog-details-comment-container">
                                                        <div class="blog-details-comment-details">
                                                            <div>
                                                                <h3>
                                                                    Matt Gartner
                                                                </h3>
                                                                <h5>
                                                                    19th May 2023
                                                                </h5>
                                                            </div>
                                                            <button>
                                                                Reply
                                                            </button>
                                                        </div>
                                                        <p>
                                                            I recently purchased a property through Crypto Homes, and the process
                                                            was seamless. Being able to use cryptocurrency for real estate
                                                            transactions made everything faster and more efficient. Highly recommend
                                                            their services!
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="blog-details-comment">
                                                    <img src="{{ asset('/assets/img/blog/post_m.jpg') }}" alt="Author Image">
                                                    <div class="blog-details-comment-container">
                                                        <div class="blog-details-comment-details">
                                                            <div>
                                                                <h3>
                                                                    Matt Gartner
                                                                </h3>
                                                                <h5>
                                                                    19th May 2023
                                                                </h5>
                                                            </div>
                                                            <button>
                                                                Reply
                                                            </button>
                                                        </div>
                                                        <p>
                                                            I recently purchased a property through Crypto Homes, and the process
                                                            was seamless. Being able to use cryptocurrency for real estate
                                                            transactions made everything faster and more efficient. Highly recommend
                                                            their services!
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="blog-details-comment sub-comment">
                                                    <img src="{{ asset('/assets/img/blog/post_m.jpg') }}" alt="Author Image">
                                                    <div class="blog-details-comment-container">
                                                        <div class="blog-details-comment-details">
                                                            <div>
                                                                <h3>
                                                                    Dan Whiting
                                                                </h3>
                                                                <h5>
                                                                    19th May 2023
                                                                </h5>
                                                            </div>
                                                            <button>
                                                                Reply
                                                            </button>
                                                        </div>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                            tempor incididunt
                                                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                            exercitation.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="blog-details-comment">
                                                    <img src="{{ asset('/assets/img/blog/post_m.jpg') }}" alt="Author Image">
                                                    <div class="blog-details-comment-container">
                                                        <div class="blog-details-comment-details">
                                                            <div>
                                                                <h3>
                                                                    Matt Gartner
                                                                </h3>
                                                                <h5>
                                                                    19th May 2023
                                                                </h5>
                                                            </div>
                                                            <button>
                                                                Reply
                                                            </button>
                                                        </div>
                                                        <p>
                                                            I recently purchased a property through Crypto Homes, and the process
                                                            was seamless. Being able to use cryptocurrency for real estate
                                                            transactions made everything faster and more efficient. Highly recommend
                                                            their services!
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="blog-details-post-comment">
                                                <h3 class="blog-details-comment-title">
                                                    Post your comment
                                                </h3>
                                                <p>
                                                    Your email address will not be published. Required fields are marked *
                                                </p>
                                                <form action="/" class="blog-details-form">
                                                    <div>
                                                        <div class="blog-detatils-textarea-container">
                                                            <img src="{{ asset('/assets/img/blog/message.png') }}" alt="Message Icon">
                                                            <textarea name="comment" placeholder="Write your Comment"></textarea>
                                                        </div>
                                                        <div class="blog-form-checkbox-container">
                                                            <input type="checkbox" id="save" name="save" value="Boat">
                                                            <label for="save">Save my name, email, and website in this browser for
                                                                the next time I comment.</label>
                                                        </div>
                                                    </div>
                                                    <button class="them-btn blog-form-button" type="submit">
                                                        <span class="btn_label" data-text="Post Comment">Post Comment</span>
                                                        <span class="btn_icon">
                                                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z"
                                                                    fill="white"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </form>
                                            </div> -->
                                    <div
                                        class="d-flex flex-column flex-lg-row justify-content-lg-between mt-50 mb-40 row-gap-3">
                                        <div class="d-flex align-items-center">
                                            <h5 class="blog-details-tags-share">
                                                Tags:
                                            </h5>
                                            <div class="tagcloud">
                                                <a href="#!">ICO</a>
                                                <a href="#!">Blockchain</a>
                                                <a href="#!">Investment</a>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h5 class="blog-details-tags-share">
                                                Share:
                                            </h5>
                                            <ul class="widget__social ul_li blog-details-share-icon">
                                                <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                                                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </article>
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