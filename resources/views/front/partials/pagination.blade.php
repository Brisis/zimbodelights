@if ($paginator->hasPages())
<nav class="mt-4" aria-label="Page navigation example">
    <ul class="pagination justify-content-center">

        @if ($paginator->onFirstPage())
          <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
              </a>
          </li>
        @else
          <li class="page-item">
              <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
              </a>
          </li>
        @endif

        @foreach ($elements as $element)

            @if (is_string($element))
              <li class="page-item active"><a class="page-link">{{ $element }}</a></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                    @else
                    <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
          <li class="page-item">
              <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
              </a>
          </li>
        @else
        <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        @endif

    </ul>
</nav>
@endif
