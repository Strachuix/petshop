@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
            </li>
        @endif

        <!-- Current Page Info & Input -->
        <span class="page-item d-flex flex-row" style="width:200px">
            <span class="page-link" style="width: 100%; display: flex; flex-direction:row;">
                <input type="number" value="{{ $paginator->currentPage() }}" min="1" max="{{ $paginator->lastPage() }}" onchange="this.value>0 && window.location.href='{{ url()->current() }}?page='+this.value" class="page-input form-control" style="width:80%">
                / {{ $paginator->lastPage() }}
            </span>
        </span>

        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">Next</span>
            </li>
        @endif
    </ul>
@endif
