@php
    use Illuminate\Support\Str;
    $currentUrl = request()->path(); 
@endphp

<div class="sidebar-area mt-none-30">
    <div class="widget mt-30 blog-sidebar-widget blog-sidebar-widget-search">
        <h3 class="widget__title blog-sidebar-title">Search</h3>
        <form class="widget__search blog-sidebar-search" action="#!">
            <input type="text" placeholder="Search your keyword">
            <button><i class="far fa-search"></i></button>
        </form>
    </div>
    @if(Str::contains($currentUrl, 'news'))
        <div class="widget mt-30 blog-sidebar-widget blog-sidebar-widget-categories">
            <h3 class="widget__title blog-sidebar-title">Categories</h3>
            <ul class="widget__category">
                @forelse($categories as $category)
                    <li class="blog-sidebar-categories-content {{ !$loop->last ? 'pb-15' : '' }}">
                        <a href="{{ url('news') . '?category=' . urlencode($category->id) }}">
                            {{ $category->name }} <span>{{ $category->news_count }}</span>
                        </a>
                    </li>
                @empty
                    <p>No category available.</p>
                @endforelse
            </ul>
        </div>
        <div class="widget mt-30 blog-sidebar-widget blog-sidebar-widget-recent">
            <h3 class="widget__title blog-sidebar-title">Recent News</h3>
            <div class="widget__post">
                @forelse($latestNews as $latestnews)
                    <div class="widget__post-item ul_li blog-widget-post-item">
                        <div class="post-thumb blog-desktop-thumb">
                            <a href="{{ url('news/' . $latestnews->id) }}">
                                <img src="{{ asset('storage/' . $latestnews->thumbnail) }}" alt="News Image" class="desktop">
                                <img src="{{ asset('storage/' . $latestnews->mobile_thumbnail) }}" alt="News Image"
                                    class="mobile">
                            </a>
                        </div>
                        <div class="post-content">
                            <span class="post-date">{{ \Carbon\Carbon::parse($latestnews->date)->format('M d, Y') }}</s>
                                <h4 class="post-title border-effect-2"><a
                                        href="{{ url('news/' . $latestnews->id) }}">{{ $latestnews->title }}</a></h4>
                        </div>
                    </div>
                @empty
                    <p>No news availabe.</p>
                @endforelse
            </div>
        </div>
    @elseif(Str::contains($currentUrl, 'articles'))
        <div class="widget mt-30 blog-sidebar-widget blog-sidebar-widget-categories">
            <h3 class="widget__title blog-sidebar-title">Categories</h3>
            <ul class="widget__category">
                @forelse($categories as $category)
                    <li class="blog-sidebar-categories-content {{ !$loop->last ? 'pb-15' : '' }}">
                        <a href="{{ url('articles') . '?category=' . urlencode($category->id) }}">
                            {{ $category->name }} <span>{{ $category->articles_count }}</span>
                    </li>
                @empty
                    <p>No category available.</p>
                @endforelse
            </ul>
        </div>
        <div class="widget mt-30 blog-sidebar-widget blog-sidebar-widget-recent">
            <h3 class="widget__title blog-sidebar-title">Recent Articles</h3>
            <div class="widget__post">
                @forelse($latestArticles as $latestarticles)
                    <div class="widget__post-item ul_li blog-widget-post-item">
                        <div class="post-thumb blog-desktop-thumb">
                            <a href="{{ url('articles/' . $latestarticles->id) }}">
                                <img src="{{ asset('storage/' . $latestarticles->thumbnail) }}" alt="News Image"
                                    class="desktop">
                                <img src="{{ asset('storage/' . $latestarticles->mobile_thumbnail) }}" alt="News Image"
                                    class="mobile">
                            </a>
                        </div>
                        <div class="post-content">
                            <span class="post-date">{{ \Carbon\Carbon::parse($latestarticles->date)->format('M d, Y') }}</s>
                                <h4 class="post-title border-effect-2"><a
                                        href="{{ url('articles/' . $latestarticles->id) }}">{{ $latestarticles->title }}</a>
                                </h4>
                        </div>
                    </div>
                @empty
                    <p>No articles availabe.</p>
                @endforelse
            </div>
        </div>
    @endif
    <div class="widget mt-30 blog-sidebar-widget blog-sidebar-widget-recent">
        <h3 class="widget__title blog-sidebar-title">Follow Us</h3>
        <ul class="widget__social ul_li blog-widget-social">
            <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://x.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a></li>
            <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
        </ul>
    </div>
    @if(Str::contains($currentUrl, 'news'))
        <div class="widget mt-30 blog-sidebar-widget-tags">
            <h3 class="widget__title blog-sidebar-title blog-sidebar-title-tags">Tags</h3>
            <div class="tagcloud">
                @forelse($tags as $tag)
                    <a href="#!">{{ $tag->name }}</a>
                @empty
                    <p>No tags availabe.</p>
                @endforelse
            </div>
        </div>
    @elseif(Str::contains($currentUrl, 'articles'))
        <div class="widget mt-30 blog-sidebar-widget-tags">
            <h3 class="widget__title blog-sidebar-title blog-sidebar-title-tags">Tags</h3>
            <div class="tagcloud">
                @forelse($tags as $tag)
                    <a href="#!">{{ $tag->name }}</a>
                @empty
                    <p>No tags availabe.</p>
                @endforelse
            </div>
        </div>
    @endif