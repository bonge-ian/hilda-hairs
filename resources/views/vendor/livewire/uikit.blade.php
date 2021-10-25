<div>
    @if ($paginator->hasPages())
        <nav class="uk-text-center">
            <ul class="uk-pagination uk-margin-remove-bottom uk-flex-center" uk-margin>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="uk-hidden" aria-hidden="true" aria-label="@lang('pagination.previous')"><a><span uk-pagination-previous></span></a></li>

                @else
                    <li>
                        <a wire:click="previousPage" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')"><span uk-pagination-previous></span>
                        </a></li>

                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="uk-disabled" aria-disabled="true"><span>{{ $element }}</span></li>

                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="uk-active" wire:key="paginator-page-{{ $page }}" aria-current="page"><span>{{ $page }}</span></li>
                            @else
                                <li wire:key="paginator-page-{{ $page }}">
                                    <a wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a wire:click="nextPage" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')"><span uk-pagination-next></span></a></li>

                @else
                    <li class="uk-hidden" aria-hidden="true" aria-label="@lang('pagination.next')"><a><span uk-pagination-next aria-hidden="true"></span></a></li>

                @endif
            </ul>
        </nav>
    @endif
</div>
