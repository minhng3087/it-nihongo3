@if ($paginator->hasPages())
    <ul class="list-inline text-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled list-inline-item"><i class="fa fa-angle-left"></i></li>
        @else
            <li class="list-inline-item"><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>	
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled list-inline-item"><a href=""><i class="fa fa-angle-left"></i>{{ $element}}</a></li>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active list-inline-item"><a class="active">{{ $page }}</a></li>
                    @else
                        <li class="list-inline-item"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="list-inline-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-right"></i></a></li>
        @else
            <li class="disabled list-inline-item"><i class="fa fa-angle-right"></i></li>
        @endif
    </ul>
@endif
