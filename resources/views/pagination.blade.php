<div class="dataTable-bottom">
    @if ($paginator->hasPages())
        <div class="dataTable-info">Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} entries</div>

        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-sm mb-0">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl()}}" data-page="{{ $paginator->currentPage() - 1}}" disabled="disabled">Previous</a>
                    </li>
                @endif

                @foreach ($elements as $key => $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item">
                                <a class="page-link">...</a>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item {{$page == $paginator->currentPage() ? 'active': ''}}">
                                        <a class="page-link">{{$page}}</a>
                                    </li>
                                @else
                                    <li class="page-item {{$page == $paginator->currentPage() ? 'active': ''}}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl()}}">Next</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link">Next</a>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>