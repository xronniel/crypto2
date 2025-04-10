@if ($paginator->hasPages())
    <div class="pagination_wrap pb-50 pt-50">
        <ul id="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"></li>
            @else
                <li><a href="#" data-url="{{ $paginator->previousPageUrl() }}" class="prev-page"><i class="far fa-long-arrow-left"></i></a></li>
            @endif
            @php
                $current = $paginator->currentPage();
                $last = $paginator->lastPage();
                $pagesToShow = [];

                // Add previous page only if it's directly before current
                if ($current > 1) {
                    $pagesToShow[] = $current - 1;
                }

                // Always show current page
                $pagesToShow[] = $current;

                // Add next 3 pages if available
                for ($i = 1; $i <= 3; $i++) {
                    if ($current + $i <= $last) {
                        $pagesToShow[] = $current + $i;
                    }
                }
            @endphp

            {{-- Render Pages --}}
            @foreach ($pagesToShow as $page)
                <li class="{{ $page > $current + 1 ? 'hide-on-mobile' : '' }}">
                    @if ($page == $current)
                        <a href="#" class="current_page" data-page="{{ $page }}">{{ $page }}</a>
                    @else
                        <a href="#" data-url="{{ $paginator->url($page) }}" class="page-link" data-page="{{ $page }}">{{ $page }}</a>
                    @endif
                </li>
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="#" data-url="{{ $paginator->nextPageUrl() }}" class="next-page"><i class="far fa-long-arrow-right"></i></a></li>
            @else
                <li class="disabled"></li>
            @endif
        </ul>
    </div>

    <script>
        document.querySelectorAll('.page-link, .prev-page, .next-page').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const url = this.getAttribute('data-url');
                if (url) window.location.href = url;
            });
        });
    </script>
@endif


<style>
    .pagination_wrap ul li a {
    height: 70px;
    width: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    font-weight: 500;
    color: var(--color-white);
    border: 1px solid #282842;
    transition: all 0.3s ease-out;
    border-radius: 50%;
    overflow: hidden;
}

.pagination_wrap ul li a.current_page {
    background-color: #282842;
    color: #fff;
}

@media screen and (max-width: 768px) {
    .pagination_wrap ul li.hide-on-mobile {
        display: none !important;
    }

    .pagination_wrap ul li a {
        width: 40px;
        height: 40px;
        font-size: 15px;
    }
}

</style>