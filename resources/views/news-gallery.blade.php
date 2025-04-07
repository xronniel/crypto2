@extends('layouts.front-office.app')

@section('content')

    <!-- main area start  -->
    <main>

        <!-- breadcrumb start -->
        <section class="breadcrumb bg_img pos-rel" data-background="assets/img/bg/breadcrumb.jpg">
            <div class="container">
                <div class="breadcrumb__content">
                    <h2 class="breadcrumb__title">News Gallery</h2>
                    <ul class="bread-crumb clearfix ul_li_center blog-flex-column">
                        <li class="breadcrumb-item">Items Found</li>
                        <li class="breadcrumb-item">{{ $newsList->total() ?: 0 }} News Articles</li>
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
                <a href="{{ url('/') }}" class="blog-arrow-container">
                    <img src="/assets/img/blog/arrow-back.png" alt="Arrow Icon">
                </a>
                <h5>
                    Home / <span>NEWS GALLERY</span>
                </h5>
            </div>
            <div class="container">
                <div class="row mt-none-30">
                    <div class="col-lg-8 mt-30">
                        <div class="blog-post-wrap mt-none-30">
                            @forelse($newsList as $newslist)
                                <article class="blog__item mt-30">
                                    <a class="thumb blog-desktop-thumb" href="{{ url('news/' . $newslist -> id) }}">
                                        <img src="{{ asset('storage/' . $newslist->thumbnail) }}" alt="News Image" class="desktop">
                                        <img src="{{ asset('storage/' . $newslist->mobile_thumbnail) }}" alt="News Image" class="mobile">
                                        <h4 class="blog-news-article-title">
                                            News Article
                                        </h4>
                                    </a>
                                    <div class="blog__inner">
                                        <ul class="blog__meta ul_li mb-20 blog-meta-data">
                                            <li><a href="#!"><i class="far fa-map-marker-alt"></i>{{ $newslist -> state }}, {{ $newslist -> country }}</a></li>
                                            <li><i class="far fa-clock"></i>{{ \Carbon\Carbon::parse($newslist->date)->format('M d, Y') }}</li>
                                            <li><a href="#!"><i class="far fa-comment"></i>(04) Comments</a></li>
                                        </ul>
                                        <h2 class="title border_effect"><a href="{{ url('news/' . $newslist -> id) }}">{{ $newslist -> title }}</a></h2>
                                        <p>{{ $newslist -> content }}</p>
                                        <button class="them-btn blog-find-out-more mt-30"
                                            onclick="window.location.href='{{ url('news/' . $newslist -> id) }}';">
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
                            @empty
                                <h2>No news availabe.</h2>
                            @endforelse
                        </div>
                        <div class="pagination_wrap pt-50 blog-pagination-less">
                            <ul>
                                @if($newsList->currentPage() > 1)
                                    <li><a href="{{ $newsList->previousPageUrl() }}"><i class="far fa-long-arrow-left"></i></a></li>
                                @else
                                    <li><a><i class="far fa-long-arrow-left"></i></a></li>
                                @endif
                                
                                @for($i = 1; $i <= $newsList->lastPage(); $i++)
                                    @if($i <= 2 || $i == $newsList->lastPage()) <!-- Show first 3 pages and last page -->
                                        <li>
                                            @if($i == $newsList->currentPage())
                                                <a href="{{ $newsList->url($i) }}" class="current_page">{{ $i }}</a>
                                            @else
                                                <a href="{{ $newsList->url($i) }}">{{ $i }}</a>
                                            @endif
                                        </li>
                                    @elseif($i == 3 && $newsList->lastPage() > 3)
                                        <li><a href="javascript:void(0);" class="ellipsis" id="show-more-pagination"><i class="fal fa-ellipsis-h"></i></a></li>
                                    @endif
                                @endfor

                                @if($newsList->hasMorePages())
                                    <li><a href="{{ $newsList->nextPageUrl() }}"><i class="far fa-long-arrow-right"></i></a></li>
                                @else
                                    <li><a><i class="far fa-long-arrow-right"></i></a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="pagination_wrap pt-50 blog-pagination-more  ">
                            <ul>
                                @if($newsList->currentPage() > 1)
                                    <li><a href="{{ $newsList->previousPageUrl() }}"><i class="far fa-long-arrow-left"></i></a></li>
                                @else
                                    <li><a><i class="far fa-long-arrow-left"></i></a></li>
                                @endif
                                
                                @for($i = 1; $i <= $newsList->lastPage(); $i++)
                                    <li>
                                        @if($i == $newsList->currentPage())
                                            <a href="{{ $newsList->url($i) }}" class="current_page">{{ $i }}</a>
                                        @else
                                            <a href="{{ $newsList->url($i) }}">{{ $i }}</a>
                                        @endif
                                    </li>
                                @endfor
                                
                                @if($newsList->hasMorePages())
                                    <li><a href="{{ $newsList->nextPageUrl() }}"><i class="far fa-long-arrow-right"></i></a></li>
                                @else
                                    <li><a><i class="far fa-long-arrow-right"></i></a></li>
                                @endif
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#show-more-pagination').on('click', function() {
                $('.blog-pagination-less').css('display', 'none');
                $('.blog-pagination-more').css('display', 'block');
            });
        });
    </script>
@endsection