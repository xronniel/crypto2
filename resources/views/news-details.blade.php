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
                                        <li><a href="https://www.google.com/maps?q={{ urlencode($news->state . ' ' . $news->country) }}"
                                                target="_blank"><i class="far fa-map-marker-alt"></i>{{ $news->state }},
                                                {{ $news->country }}</a></li>
                                        <li><i
                                                class="far fa-clock"></i>{{ \Carbon\Carbon::parse($news->date)->format('M d, Y') }}
                                        </li>
                                        <li><a><i class="far fa-comment"></i>({{ $news -> comments_count }}) Comments</a></li>
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
                                                    <li class="mb-15 blog-list-inside">Identifying promising Crypto Currency.
                                                    </li>
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
                                        </p> -->
                                    <div
                                        class="d-flex flex-column flex-lg-row justify-content-lg-between mt-50 mb-40 row-gap-3">
                                        <div class="d-flex align-items-center">
                                            <h5 class="blog-details-tags-share">
                                                Tags:
                                            </h5>
                                            <div class="tagcloud">
                                                @forelse ($news->tags as $tag)
                                                    <a
                                                        href="{{ url('news') . '?tags=' . urlencode($tag->id) }}">{{ $tag->name }}</a>
                                                @empty
                                                    <a>No available tag</a>
                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h5 class="blog-details-tags-share">
                                                Share:
                                            </h5>
                                            <ul class="widget__social ul_li blog-details-share-icon">
                                                <li><a href="#" class="fb-share" target="_blank"><i
                                                            class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="#!" class="x-share" target="_blank"><i
                                                            class="fab fa-twitter"></i></a></li>
                                                <li><a href="#!" class="in-share" target="_blank"><i
                                                            class="fab fa-linkedin-in"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-details-comment-section">
                                        <h4 class="blog-details-comment-title">
                                            {{ $news->comments_count }} Comments
                                        </h4>
                                        @foreach ($news->comments as $comment)
                                            <div class="blog-details-comment">
                                                <img src="{{ asset('/assets/img/blog/post_m.jpg') }}" alt="Author Image">
                                                <div class="blog-details-comment-container">
                                                    <div class="blog-details-comment-details">
                                                        <div>
                                                            <h3>
                                                                {{ $comment->name }}
                                                            </h3>
                                                            <h5>
                                                                {{ $comment->created_at->format('d M Y') }}
                                                            </h5>
                                                        </div>
                                                        <button class="blog-reply-button">
                                                            Reply
                                                        </button>
                                                    </div>
                                                    <p>
                                                        {{ $comment->content }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="blog-details-post-comment blog-reply-comment">
                                                <h3>
                                                    Reply on this comment
                                                </h3>
                                                <p>
                                                    Your email address will not be published. Required fields are marked *
                                                </p>
                                                <form method="POST" class="comment-form blog-details-form">
                                                    @csrf

                                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                    <input type="hidden" name="commentable_id" value="{{ $news->id }}">
                                                    <input type="hidden" name="commentable_type" value="App\Models\News">

                                                    <div>
                                                        <div class="blog-detatils-textarea-container mb-20">
                                                            <img src="{{ asset('/assets/img/blog/user.png') }}"
                                                                alt="Person Icon">
                                                            <input name="name" type="text" placeholder="Enter your Name">
                                                        </div>
                                                        <div class="blog-detatils-textarea-container">
                                                            <img src="{{ asset('/assets/img/blog/message.png') }}"
                                                                alt="Message Icon">
                                                            <textarea name="content"
                                                                placeholder="Write your Comment"></textarea>
                                                        </div>
                                                        <div class="blog-form-checkbox-container">
                                                            <input type="checkbox" id="{{ $comment -> id }}" name="save">
                                                            <label for="{{ $comment -> id }}">Save my name, email, and website in this
                                                                browser
                                                                for
                                                                the next time I comment.</label>
                                                        </div>
                                                    </div>
                                                    <button class="them-btn blog-form-button" type="submit">
                                                        <span class="btn_label" data-text="Post Reply">Post Reply</span>
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
                                            </div>
                                            @foreach ($comment->replies as $reply)
                                                <div class="blog-details-comment sub-comment">
                                                    <img src="{{ asset('/assets/img/blog/post_m.jpg') }}" alt="Author Image">
                                                    <div class="blog-details-comment-container">
                                                        <div class="blog-details-comment-details">
                                                            <div>
                                                                <h3>
                                                                    {{ $reply->name }}
                                                                </h3>
                                                                <h5>
                                                                    {{ $reply->created_at->format('d M Y') }}
                                                                </h5>
                                                            </div>
                                                            <button class="blog-reply-button">
                                                                Reply
                                                            </button>
                                                        </div>
                                                        <p>
                                                            {{ $reply->content }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="blog-details-post-comment blog-reply-comment blog-sub-reply">
                                                    <h3>
                                                        Reply on this comment
                                                    </h3>
                                                    <p>
                                                        Your email address will not be published. Required fields are marked *
                                                    </p>
                                                    <form method="POST" class="comment-form blog-details-form">
                                                        @csrf

                                                        <input type="hidden" name="parent_id" value="{{ $reply->id }}">
                                                        <input type="hidden" name="commentable_id" value="{{ $news->id }}">
                                                        <input type="hidden" name="commentable_type" value="App\Models\News">

                                                        <div>
                                                            <div class="blog-detatils-textarea-container mb-20">
                                                                <img src="{{ asset('/assets/img/blog/user.png') }}"
                                                                    alt="Person Icon">
                                                                <input name="name" type="text" placeholder="Enter your Name">
                                                            </div>
                                                            <div class="blog-detatils-textarea-container">
                                                                <img src="{{ asset('/assets/img/blog/message.png') }}"
                                                                    alt="Message Icon">
                                                                <textarea name="content"
                                                                    placeholder="Write your Comment"></textarea>
                                                            </div>
                                                            <div class="blog-form-checkbox-container">
                                                                <input type="checkbox" id="{{ $reply -> id }}" name="save">
                                                                <label for="{{ $reply -> id }}">Save my name, email, and website
                                                                    in this
                                                                    browser
                                                                    for
                                                                    the next time I comment.</label>
                                                            </div>
                                                        </div>
                                                        <button class="them-btn blog-form-button" type="submit">
                                                            <span class="btn_label" data-text="Post Reply">Post Reply</span>
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
                                                </div>
                                                @foreach ($reply->children as $childReply)
                                                    <div class="blog-details-comment sub-comment-inner">
                                                        <img src="{{ asset('/assets/img/blog/post_m.jpg') }}" alt="Author Image">
                                                        <div class="blog-details-comment-container">
                                                            <div class="blog-details-comment-details">
                                                                <div>
                                                                    <h3>
                                                                        {{ $childReply->name }}
                                                                    </h3>
                                                                    <h5>
                                                                        {{ $childReply->created_at->format('d M Y') }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                {{ $childReply->content }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </div>
                                    <div class="blog-details-post-comment">
                                        <h3 class="blog-details-comment-title">
                                            Post your comment
                                        </h3>
                                        <p>
                                            Your email address will not be published. Required fields are marked *
                                        </p>
                                        <form method="POST" class="comment-form blog-details-form">
                                            @csrf

                                            <input type="hidden" name="commentable_id" value="{{ $news->id }}">
                                            <input type="hidden" name="commentable_type" value="App\Models\News">

                                            <div>
                                                <div class="blog-detatils-textarea-container mb-20">
                                                    <img src="{{ asset('/assets/img/blog/user.png') }}" alt="Person Icon">
                                                    <input name="name" type="text" placeholder="Enter your Name">
                                                </div>
                                                <div class="blog-detatils-textarea-container">
                                                    <img src="{{ asset('/assets/img/blog/message.png') }}"
                                                        alt="Message Icon">
                                                    <textarea name="content" placeholder="Write your Comment"></textarea>
                                                </div>
                                                <div class="blog-form-checkbox-container">
                                                    <input type="checkbox" id="save" name="save">
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

        <div id="toast" class="toast hidden">
            <span>✅ Comment posted successfully!</span>
        </div>

    </main>
    <!-- main area end  -->

    <script>

        // This script sets the share links for Facebook, Twitter, and LinkedIn
        const currentUrl = encodeURIComponent(window.location.href);

        const fbShare = document.querySelector('.fb-share');
        if (fbShare) fbShare.href = `https://www.facebook.com/sharer/sharer.php?u=${currentUrl}`;

        const xShare = document.querySelector('.x-share');
        if (xShare) xShare.href = `https://twitter.com/intent/tweet?url=${currentUrl}`;

        const inShare = document.querySelector('.in-share');
        if (inShare) inShare.href = `https://www.linkedin.com/sharing/share-offsite/?url=${currentUrl}`;

        // This script handles the form submission for posting comments
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('.comment-form');

            forms.forEach(form => {
                form.addEventListener('submit', async function (e) {
                    e.preventDefault();

                    const formData = new FormData(form);

                    try {
                        const response = await fetch('/api/comments', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
                                'Accept': 'application/json'
                            },
                            body: formData
                        });

                        if (!response.ok) {
                            const errorData = await response.json();
                            console.error('Error response:', errorData);

                            if (errorData.errors) {
                                alert('Failed to submit comment:\n' + JSON.stringify(errorData.errors, null, 2));
                            } else {
                                alert('Failed to submit comment. Unexpected error occurred.');
                            }
                            return;
                        }

                        const data = await response.json();
                        showToastAndReload();
                    } catch (error) {
                        console.error('Request error:', error);
                        alert('Something went wrong. Please try again.');
                    }
                });
            });
        });

        // This script handles the reply button functionality
        document.addEventListener('DOMContentLoaded', function () {
            const replyButtons = document.querySelectorAll('.blog-reply-button');

            replyButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Find the closest .blog-details-comment div
                    const commentContainer = button.closest('.blog-details-comment');

                    // Get the next sibling, which is the reply form
                    const replyForm = commentContainer.nextElementSibling;

                    if (replyForm && replyForm.classList.contains('blog-reply-comment')) {
                        replyForm.classList.toggle('active');
                    }
                });
            });
        });

        function showToastAndReload() {
        const toast = document.getElementById('toast');
        toast.classList.remove('hidden');
        toast.classList.add('show');

        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => {
            toast.classList.add('hidden');
            location.reload(); // reload after toast disappears
            }, 300);
        }, 2000); // toast visible for 2 seconds
        }

    </script>
@endsection