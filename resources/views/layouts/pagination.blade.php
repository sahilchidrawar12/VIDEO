@if ($paginator->hasPages())
    <div class="datatable-footer" style="border-top: none;padding:1.25rem">
        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
            Showing <strong>{{ ((($paginator->currentPage() -1) * $paginator->perPage()) + 1) }}</strong> to <strong>{{ ((($paginator->currentPage() -1) * $paginator->perPage()) + $paginator->count()) }}</strong> of <strong>{{ $paginator->total() }}</strong> entries. page <strong>{{ $paginator->currentPage() }}</strong> /<strong>{{ $paginator->lastPage() }}</strong>
        </div>
        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
            <a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" id="DataTables_Table_0_previous">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    ←
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev">← </a>
                @endif
            </a>
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span>{{ $element }}</span>
                    @endif
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <a class="paginate_button current">{{ $page }}</a>
                            @else
                                <a class="paginate_button" href="{{ $url}}">{{ $page }}</a>
                                <!-- <a href="{{ $url}}">{{ $page }}</a> -->
                            @endif
                        @endforeach
                    @endif
            @endforeach
            <a class="paginate_button next disabled" aria-controls="DataTables_Table_0" id="DataTables_Table_0_next">
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next">→</a>
                @else
                    →
                @endif
            </a>
        </div>
    </div>
@endif