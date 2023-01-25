@if ($paginator->hasPages())
    <div class="page-tracker">
        <p class="page-tracker_text">
            {!! __('Showing') !!}
            <span class="page-tracker_text_val">
                {{ $paginator->firstItem() }}
            </span>
            {!! __('to') !!}
            <span class="page-tracker_text_val">
                {{ $paginator->lastItem() }}
            </span>
            {!! __('of')!!}
            <span class="page-tracker_text_val">
                {{ $paginator->total() }}
            </span>
            {!! __('results') !!}
        </p>
    </div>
    <ul class="pagination">
        @if($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">
                    &lsaquo;
                </span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPAgeUrl() }}" rel="prev" >
                    &lsaquo;
                </a>
            </li>
        @endif

        @foreach($elements as $element)
            @if(is_string($element)) 
                <li class="page-item disabled">
                    <span class="page-link">
                        {{ $element }}
                    </span>
                </li>
            @endif

            @if(is_array($element))
                @foreach($element as $page => $url)
                    @if($page == $paginator->currentPage())
                        <li class="page-item active">
                            <span class="page-link">
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" >
                    &rsaquo;
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">
                    &rsaquo;
                </span>
            </li>
        @endif
    </ul>
@endif