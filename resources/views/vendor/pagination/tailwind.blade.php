@if ($paginator->hasPages())
<div class="pagination_wrap pt-50">
    <ul id="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"></li>
        @else
            <li><a href="#" data-url="{{ $paginator->previousPageUrl() }}" class="prev-page"><i class="far fa-long-arrow-left"></i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @php
            $previousPage = null; // Track last displayed page
            $dotsAdded = false; // Ensure dots appear only once
        @endphp
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element) && !$dotsAdded)
                <li><span><i class="fal fa-ellipsis-h"></i></span></li>
                @php $dotsAdded = true; @endphp
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if (
                        $page == $paginator->currentPage() || 
                        $page >= $paginator->currentPage() - 3 && $page <= $paginator->currentPage() + 3
                    )
                        {{-- Reset dots flag when inside visible range --}}
                        @php $dotsAdded = false; @endphp
                        
                        {{-- Display Page Numbers --}}
                        @if ($page == $paginator->currentPage())
                            <li><a href="#" class="current_page" data-page="{{ $page }}">{{ $page }}</a></li>
                        @else
                            <li><a href="#" data-url="{{ $url }}" class="page-link" data-page="{{ $page }}">{{ $page }}</a></li>
                        @endif
                        @php $previousPage = $page; @endphp

                    @elseif ($page == 1 || $page == $paginator->lastPage())
                        {{-- Always Show First & Last Page --}}
                        @if ($previousPage && $page > $previousPage + 1 && !$dotsAdded)
                            <li><span><i class="fal fa-ellipsis-h"></i></span></li>
                            @php $dotsAdded = true; @endphp
                        @endif
                        <li><a href="#" data-url="{{ $url }}" class="page-link" data-page="{{ $page }}">{{ $page }}</a></li>
                        @php $previousPage = $page; @endphp
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="#" data-url="{{ $paginator->nextPageUrl() }}" class="next-page"><i class="far fa-long-arrow-right"></i></a></li>
        @else
            <li class="disabled"></li>
        @endif
    </ul>
</div>
@endif

<script>
    // JavaScript to handle page link clicks
    document.querySelectorAll('.page-link').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const url = this.getAttribute('data-url');
            window.location.href = url; // Navigate to the page
        });
    });

    // JavaScript to handle previous and next page clicks
    document.querySelectorAll('.prev-page, .next-page').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const url = this.getAttribute('data-url');
            window.location.href = url; // Navigate to the page
        });
    });
</script>

