@if ($paginationEnabled)
    <div class="row">
        <div class="col">
            {{ $models->links($paginationView) }}
        </div>

        <div class="col text-right text-muted">
            {{ __('Showing :first to :last out of :total results', ['first' => $models->firstItem(), 'last' => $models->lastItem(), 'total' => $models->total()]) }}
        </div>

        @if($paginationColView)
        <div class="col-md-auto">
            @include($paginationColView)
        </div>
        @endif
    </div>
@endif
