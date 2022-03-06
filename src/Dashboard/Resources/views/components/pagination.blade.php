<div class="d-flex align-items-center">
    <p class="m-0 text-muted">
        Showing <span>{{ ($paginator->currentPage() - 1) * $paginator->perPage() + 1 }}</span>
        to <span>{{ $paginator->currentPage() * $paginator->perPage() }}</span>
        of <span>{{ $paginator->total() }}</span> entries
    </p>
    @if ($paginator->hasPages())
        <ul class="pagination m-0 ms-auto">
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1" aria-disabled="true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="15 6 9 12 15 18"></polyline></svg>
                </a>
            </li>
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                @endif
            @endforeach
            <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="9 6 15 12 9 18"></polyline></svg>
                </a>
            </li>
        </ul>
    @endif
</div>
