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
                        <li class="breadcrumb-item">Items Found</li>
                        <li class="breadcrumb-item">{{ $articlesList->total() ?: 0 }} Article Gallery</li>
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
                    Home / <span>ARTICLE GALLERY</span>
                </h5>
            </div>
            <div class="container">
                <div class="row mt-none-30">
                    <div class="col-lg-8 mt-30">
                        @if(request()->has('category_id'))

                            @php
                                $hasNews = false;
                            @endphp
                            <div class="blog-post-wrap mt-none-30">
                                @foreach($articlesList as $articleslist)

                                        @php
                                            $hasNews = true;
                                        @endphp
                                        <article class="blog__item mt-30">
                                                <a class="thumb blog-desktop-thumb" href="{{ url('articles/' . $articleslist -> id) }}">
                                                    <img src="{{ asset('storage/' . $articleslist->thumbnail) }}" alt="Articles Image" class="desktop">
                                                    <img src="{{ asset('storage/' . $articleslist->mobile_thumbnail) }}" alt="Articles Image" class="mobile">
                                                    <h4 class="blog-news-article-title">
                                                        News Article
                                                    </h4>
                                                </a>
                                                <div class="blog__inner">
                                                    <ul class="blog__meta ul_li mb-20 blog-meta-data">
                                                        <li><a href="https://www.google.com/maps?q={{ urlencode($articleslist->state . ' ' . $articleslist->country) }}"
                                                        target="_blank"><i class="far fa-map-marker-alt"></i>{{ $articleslist -> state }}, {{ $articleslist -> country }}</a></li>
                                                        <li><i class="far fa-clock"></i>{{ \Carbon\Carbon::parse($articleslist->date)->format('M d, Y') }}</li>
                                                        <li><a><i class="far fa-comment"></i>({{ $articleslist -> comments_count }}) Comments</a></li>
                                                    </ul>
                                                    <h2 class="title border_effect"><a href="{{ url('articles/' . $articleslist -> id) }}">{{ $articleslist -> title }}</a></h2>
                                                    <p>{{ $articleslist -> content }}</p>
                                                    <button class="them-btn blog-find-out-more mt-30"
                                                        onclick="window.location.href='{{ url('articles/' . $articleslist -> id) }}';">
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

                                @endforeach
                            </div>
                            @if(!$hasNews)
                                <h2>No articles available in this category.</h2>
                            @else

                            <div class="pagination_wrap pt-50 blog-pagination-less">
                                <ul>
                                    @if($articlesList->currentPage() > 1)
                                        <li>
                                            <a href="{{ $articlesList->previousPageUrl() . (parse_url($articlesList->previousPageUrl(), PHP_URL_QUERY) ? '&' : '?') . 'category_id=' . request()->get('category_id') }}">
                                                <i class="far fa-long-arrow-left"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li><a><i class="far fa-long-arrow-left"></i></a></li>
                                    @endif

                                    @for($i = 1; $i <= $articlesList->lastPage(); $i++)
                                        @if($i <= 2 || $i == $articlesList->lastPage()) <!-- Show first 3 pages and last page -->
                                            <li>
                                                @if($i == $articlesList->currentPage())
                                                    <a href="{{ $articlesList->url($i) . (parse_url($articlesList->url($i), PHP_URL_QUERY) ? '&' : '?') . 'category_id=' . request()->get('category_id') }}" class="current_page">
                                                        {{ $i }}
                                                    </a>
                                                @else
                                                    <a href="{{ $articlesList->url($i) . (parse_url($articlesList->url($i), PHP_URL_QUERY) ? '&' : '?') . 'category_id=' . request()->get('category_id') }}">
                                                        {{ $i }}
                                                    </a>
                                                @endif
                                            </li>
                                        @elseif($i == 3 && $articlesList->lastPage() > 3)
                                            <li><a class="ellipsis" id="show-more-pagination"><i class="fal fa-ellipsis-h"></i></a></li>
                                        @endif
                                    @endfor

                                    @if($articlesList->hasMorePages())
                                        <li>
                                            <a href="{{ $articlesList->nextPageUrl() . (parse_url($articlesList->nextPageUrl(), PHP_URL_QUERY) ? '&' : '?') . 'category_id=' . request()->get('category_id') }}">
                                                <i class="far fa-long-arrow-right"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li><a><i class="far fa-long-arrow-right"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="pagination_wrap pt-50 blog-pagination-more">
                                <ul>
                                    @if($articlesList->currentPage() > 1)
                                        <li>
                                            <a href="{{ $articlesList->previousPageUrl() . (parse_url($articlesList->previousPageUrl(), PHP_URL_QUERY) ? '&' : '?') . 'category_id=' . request()->get('category_id') }}">
                                                <i class="far fa-long-arrow-left"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li><a><i class="far fa-long-arrow-left"></i></a></li>
                                    @endif

                                    @for($i = 1; $i <= $articlesList->lastPage(); $i++)
                                        <li>
                                            @if($i == $articlesList->currentPage())
                                                <a href="{{ $articlesList->url($i) . (parse_url($articlesList->url($i), PHP_URL_QUERY) ? '&' : '?') . 'category_id=' . request()->get('category_id') }}" class="current_page">
                                                    {{ $i }}
                                                </a>
                                            @else
                                                <a href="{{ $articlesList->url($i) . (parse_url($articlesList->url($i), PHP_URL_QUERY) ? '&' : '?') . 'category_id=' . request()->get('category_id') }}">
                                                    {{ $i }}
                                                </a>
                                            @endif
                                        </li>
                                    @endfor

                                    @if($articlesList->hasMorePages())
                                        <li>
                                            <a href="{{ $articlesList->nextPageUrl() . (parse_url($articlesList->nextPageUrl(), PHP_URL_QUERY) ? '&' : '?') . 'category_id=' . request()->get('category_id') }}">
                                                <i class="far fa-long-arrow-right"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li><a><i class="far fa-long-arrow-right"></i></a></li>
                                    @endif
                                </ul>
                            </div>

                            @endif

                        @elseif(request()->has(key: 'tag_id'))

                            <div class="blog-post-wrap mt-none-30">
                                @php
                                    $hasTags = false;
                                    $requestedTags = request()->query('tags'); // can be array or comma-separated string
                                    if (is_string($requestedTags)) {
                                        $requestedTags = explode(',', $requestedTags);
                                    }
                                @endphp

                                @foreach($articlesList as $articleslist)
                                    
                                        @php
                                            $hasTags = true;
                                        @endphp
                                        <article class="blog__item mt-30">
                                            <a class="thumb blog-desktop-thumb" href="{{ url('articles/' . $articleslist->id) }}">
                                                <img src="{{ asset('storage/' . $articleslist->thumbnail) }}" alt="News Image" class="desktop">
                                                <img src="{{ asset('storage/' . $articleslist->mobile_thumbnail) }}" alt="News Image" class="mobile">
                                                <h4 class="blog-news-article-title">News Article</h4>
                                            </a>
                                            <div class="blog__inner">
                                                <ul class="blog__meta ul_li mb-20 blog-meta-data">
                                                    <li><a href="https://www.google.com/maps?q={{ urlencode($articleslist->state . ' ' . $articleslist->country) }}"
                                                    target="_blank"><i class="far fa-map-marker-alt"></i>{{ $articleslist->state }}, {{ $articleslist->country }}</a></li>
                                                    <li><i class="far fa-clock"></i>{{ \Carbon\Carbon::parse($articleslist->date)->format('M d, Y') }}</li>
                                                    <li><a><i class="far fa-comment"></i>({{ $articleslist -> comments_count }}) Comments</a></li>
                                                </ul>
                                                <h2 class="title border_effect">
                                                    <a href="{{ url('articles/' . $articleslist->id) }}">{{ $articleslist->title }}</a>
                                                </h2>
                                                <p>{{ \Illuminate\Support\Str::limit($articleslist->content, 210, '...') }}</p>
                                                <button class="them-btn blog-find-out-more mt-30" onclick="window.location.href='{{ url('articles/' . $articleslist->id) }}';">
                                                    <span class="btn_label" data-text="FIND OUT MORE">FIND OUT MORE</span>
                                                    <span class="btn_icon">
                                                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"/>
                                                        </svg>
                                                    </span>
                                                </button>
                                            </div>
                                        </article>
                                    
                                @endforeach
                            </div>
                            @if(!$hasTags)
                                <h2>No articles available in this tag.</h2>
                            @else

                            <div class="pagination_wrap pt-50 blog-pagination-less">
                                <ul>
                                    @if($articlesList->currentPage() > 1)
                                        <li>
                                            <a href="{{ $articlesList->previousPageUrl() . (parse_url($articlesList->previousPageUrl(), PHP_URL_QUERY) ? '&' : '?') . 'tag_id=' . request()->get('tag_id') }}">
                                                <i class="far fa-long-arrow-left"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li><a><i class="far fa-long-arrow-left"></i></a></li>
                                    @endif

                                    @for($i = 1; $i <= $articlesList->lastPage(); $i++)
                                        @if($i <= 2 || $i == $articlesList->lastPage()) <!-- Show first 3 pages and last page -->
                                            <li>
                                                @if($i == $articlesList->currentPage())
                                                    <a href="{{ $articlesList->url($i) . (parse_url($articlesList->url($i), PHP_URL_QUERY) ? '&' : '?') . 'tag_id=' . request()->get('tag_id') }}" class="current_page">
                                                        {{ $i }}
                                                    </a>
                                                @else
                                                    <a href="{{ $articlesList->url($i) . (parse_url($articlesList->url($i), PHP_URL_QUERY) ? '&' : '?') . 'tag_id=' . request()->get('tag_id') }}">
                                                        {{ $i }}
                                                    </a>
                                                @endif
                                            </li>
                                        @elseif($i == 3 && $articlesList->lastPage() > 3)
                                            <li><a class="ellipsis" id="show-more-pagination"><i class="fal fa-ellipsis-h"></i></a></li>
                                        @endif
                                    @endfor

                                    @if($articlesList->hasMorePages())
                                        <li>
                                            <a href="{{ $articlesList->nextPageUrl() . (parse_url($articlesList->nextPageUrl(), PHP_URL_QUERY) ? '&' : '?') . 'tag_id=' . request()->get('tag_id') }}">
                                                <i class="far fa-long-arrow-right"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li><a><i class="far fa-long-arrow-right"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="pagination_wrap pt-50 blog-pagination-more">
                                <ul>
                                    @if($articlesList->currentPage() > 1)
                                        <li>
                                            <a href="{{ $articlesList->previousPageUrl() . (parse_url($articlesList->previousPageUrl(), PHP_URL_QUERY) ? '&' : '?') . 'tag_id=' . request()->get('tag_id') }}">
                                                <i class="far fa-long-arrow-left"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li><a><i class="far fa-long-arrow-left"></i></a></li>
                                    @endif

                                    @for($i = 1; $i <= $articlesList->lastPage(); $i++)
                                        <li>
                                            @if($i == $articlesList->currentPage())
                                                <a href="{{ $articlesList->url($i) . (parse_url($articlesList->url($i), PHP_URL_QUERY) ? '&' : '?') . 'tag_id=' . request()->get('tag_id') }}" class="current_page">
                                                    {{ $i }}
                                                </a>
                                            @else
                                                <a href="{{ $articlesList->url($i) . (parse_url($articlesList->url($i), PHP_URL_QUERY) ? '&' : '?') . 'tag_id=' . request()->get('tag_id') }}">
                                                    {{ $i }}
                                                </a>
                                            @endif
                                        </li>
                                    @endfor

                                    @if($articlesList->hasMorePages())
                                        <li>
                                            <a href="{{ $articlesList->nextPageUrl() . (parse_url($articlesList->nextPageUrl(), PHP_URL_QUERY) ? '&' : '?') . 'tag_id=' . request()->get('tag_id') }}">
                                                <i class="far fa-long-arrow-right"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li><a><i class="far fa-long-arrow-right"></i></a></li>
                                    @endif
                                </ul>
                            </div>

                            @endif

                        @elseif(request()->is('articles'))
                        
                            @php
                                $hasArticles = true;
                            @endphp 
                            <div class="blog-post-wrap mt-none-30">
                                @forelse($articlesList as $articleslist)
                                    <article class="blog__item mt-30">
                                        <a class="thumb blog-desktop-thumb" href="{{ url('articles/' . $articleslist -> id) }}">
                                            <img src="{{ asset('storage/' . $articleslist->thumbnail) }}" alt="Articles Image" class="desktop">
                                            <img src="{{ asset('storage/' . $articleslist->mobile_thumbnail) }}" alt="Articles Image" class="mobile">
                                            <h4 class="blog-news-article-title">
                                                News Article
                                            </h4>
                                        </a>
                                        <div class="blog__inner">
                                            <ul class="blog__meta ul_li mb-20 blog-meta-data">
                                                <li><a href="https://www.google.com/maps?q={{ urlencode($articleslist->state . ' ' . $articleslist->country) }}"
                                                target="_blank"><i class="far fa-map-marker-alt"></i>{{ $articleslist -> state }}, {{ $articleslist -> country }}</a></li>
                                                <li><i class="far fa-clock"></i>{{ \Carbon\Carbon::parse($articleslist->date)->format('M d, Y') }}</li>
                                                <li><a><i class="far fa-comment"></i>({{ $articleslist -> comments_count }}) Comments</a></li>
                                            </ul>
                                            <h2 class="title border_effect"><a href="{{ url('articles/' . $articleslist -> id) }}">{{ $articleslist -> title }}</a></h2>
                                            <p>{{ $articleslist -> content }}</p>
                                            <button class="them-btn blog-find-out-more mt-30"
                                                onclick="window.location.href='{{ url('articles/' . $articleslist -> id) }}';">
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
                                    @php
                                        $hasArticles = false;
                                    @endphp 
                                    <h2>No Article availabe.</h2>
                                @endforelse
                            </div>
                            @if($hasArticles)
                            <div class="pagination_wrap pt-50 blog-pagination-less">
                                <ul>
                                    @if($articlesList->currentPage() > 1)
                                        <li>
                                            <a href="{{ $articlesList->previousPageUrl() . (parse_url($articlesList->previousPageUrl(), PHP_URL_QUERY) ? '&' : '?') . 'q=' . request()->get('q') }}">
                                                <i class="far fa-long-arrow-left"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li><a><i class="far fa-long-arrow-left"></i></a></li>
                                    @endif

                                    @for($i = 1; $i <= $articlesList->lastPage(); $i++)
                                        @if($i <= 2 || $i == $articlesList->lastPage()) <!-- Show first 3 pages and last page -->
                                            <li>
                                                @if($i == $articlesList->currentPage())
                                                    <a href="{{ $articlesList->url($i) . (parse_url($articlesList->url($i), PHP_URL_QUERY) ? '&' : '?') . 'q=' . request()->get('q') }}" class="current_page">
                                                        {{ $i }}
                                                    </a>
                                                @else
                                                    <a href="{{ $articlesList->url($i) . (parse_url($articlesList->url($i), PHP_URL_QUERY) ? '&' : '?') . 'q=' . request()->get('q') }}">
                                                        {{ $i }}
                                                    </a>
                                                @endif
                                            </li>
                                        @elseif($i == 3 && $articlesList->lastPage() > 3)
                                            <li><a class="ellipsis" id="show-more-pagination"><i class="fal fa-ellipsis-h"></i></a></li>
                                        @endif
                                    @endfor

                                    @if($articlesList->hasMorePages())
                                        <li>
                                            <a href="{{ $articlesList->nextPageUrl() . (parse_url($articlesList->nextPageUrl(), PHP_URL_QUERY) ? '&' : '?') . 'q=' . request()->get('q') }}">
                                                <i class="far fa-long-arrow-right"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li><a><i class="far fa-long-arrow-right"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="pagination_wrap pt-50 blog-pagination-more">
                                <ul>
                                    @if($articlesList->currentPage() > 1)
                                        <li>
                                            <a href="{{ $articlesList->previousPageUrl() . (parse_url($articlesList->previousPageUrl(), PHP_URL_QUERY) ? '&' : '?') . 'q=' . request()->get('q') }}">
                                                <i class="far fa-long-arrow-left"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li><a><i class="far fa-long-arrow-left"></i></a></li>
                                    @endif

                                    @for($i = 1; $i <= $articlesList->lastPage(); $i++)
                                        <li>
                                            @if($i == $articlesList->currentPage())
                                                <a href="{{ $articlesList->url($i) . (parse_url($articlesList->url($i), PHP_URL_QUERY) ? '&' : '?') . 'q=' . request()->get('q') }}" class="current_page">
                                                    {{ $i }}
                                                </a>
                                            @else
                                                <a href="{{ $articlesList->url($i) . (parse_url($articlesList->url($i), PHP_URL_QUERY) ? '&' : '?') . 'q=' . request()->get('q') }}">
                                                    {{ $i }}
                                                </a>
                                            @endif
                                        </li>
                                    @endfor

                                    @if($articlesList->hasMorePages())
                                        <li>
                                            <a href="{{ $articlesList->nextPageUrl() . (parse_url($articlesList->nextPageUrl(), PHP_URL_QUERY) ? '&' : '?') . 'q=' . request()->get('q') }}">
                                                <i class="far fa-long-arrow-right"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li><a><i class="far fa-long-arrow-right"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                            @endif

                        @endif
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