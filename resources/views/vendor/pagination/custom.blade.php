{{-- resources/views/vendor/pagination/custom.blade.php --}}
<ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="page-item disabled text-center fs-6 pe-2">
            <a class="page-link size-48" href="javascript:;" aria-label="Previous">
                <i data-feather="arrow-left" class="size-12"></i>
            </a>
        </li>
    @else
        <li class="page-item text-center fs-6 pe-2">
            <a class="page-link size-48" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                <i data-feather="arrow-left" class="size-12"></i>
            </a>
        </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="page-item text-center fs-6 pe-2 disabled">
                <span class="page-link size-48">{{ $element }}</span>
            </li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item text-center fs-6 pe-2 active">
                        <span class="page-link size-48">{{ $page }}</span>
                    </li>
                @else
                    <li class="page-item text-center fs-6 pe-2">
                        <a class="page-link size-48" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li class="page-item text-center fs-6 pe-2">
            <a class="page-link size-48" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                <i data-feather="arrow-right" class="size-12"></i>
            </a>
        </li>
    @else
        <li class="page-item disabled text-center fs-6 pe-2">
            <a class="page-link size-48" href="javascript:;" aria-label="Next">
                <i data-feather="arrow-right" class="size-12"></i>
            </a>
        </li>
    @endif
</ul>
