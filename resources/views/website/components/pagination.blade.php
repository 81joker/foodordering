@if ($paginator->hasPages())
    <div class="pagination-wrapper text-center">
        <ul class="pagination justify-content-center">

            {{-- PREVIOUS --}}
            @if ($paginator->onFirstPage())
                <li class="page-item prev disabled">
                    <span class="page-link brd-rd2">PREVIOUS</span>
                </li>
            @else
                <li class="page-item prev">
                    <a class="page-link brd-rd2" href="{{ $paginator->previousPageUrl() }}">PREVIOUS</a>
                </li>
            @endif


            {{-- NUMBERS --}}
            @foreach ($elements as $element)

                {{-- "..." --}}
                @if (is_string($element))
                    <li class="page-item disabled">
                        <span class="page-link brd-rd2">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array of links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)

                        {{-- ACTIVE PAGE --}}
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <span class="page-link brd-rd2">{{ $page }}</span>
                            </li>

                        {{-- NORMAL PAGE --}}
                        @else
                            <li class="page-item">
                                <a class="page-link brd-rd2" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif

                    @endforeach
                @endif

            @endforeach


            {{-- NEXT --}}
            @if ($paginator->hasMorePages())
                <li class="page-item next">
                    <a class="page-link brd-rd2" href="{{ $paginator->nextPageUrl() }}">NEXT</a>
                </li>
            @else
                <li class="page-item next disabled">
                    <span class="page-link brd-rd2">NEXT</span>
                </li>
            @endif

        </ul>
    </div>
@endif
