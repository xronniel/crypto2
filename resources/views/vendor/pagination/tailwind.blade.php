@if ($paginator->hasPages())
<div class="pagination_wrap pt-50">
    <ul>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}"><i class="far fa-long-arrow-left"></i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><span><i class="fal fa-ellipsis-h"></i></span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if (
                        $page == $paginator->currentPage() || 
                        $page >= $paginator->currentPage() - 3 && $page <= $paginator->currentPage() + 3
                    )
                        @if ($page == $paginator->currentPage())
                            <li><a href="#" class="current_page">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @elseif ($page == 1 || $page == $paginator->lastPage())
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @else
                        {{-- Skip intermediate pages if too far away --}}
                        @if ($loop->last || $loop->first)
                            <li><span><i class="fal fa-ellipsis-h"></i></span></li>
                        @endif
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}"><i class="far fa-long-arrow-right"></i></a></li>
        @else
            <li class="disabled"></li>
        @endif
    </ul>
</div>
@endif