@if ($paginationEnabled || $searchEnabled)
    <div class="row justify-content-between mb-4">
        @if ($paginationEnabled)
            <div class="col form-inline">
                {{ $perPageLabel }}: &nbsp;

                <select wire:model="perPage" class="form-control">
                    @if (is_array($perPageOptions))
                        @foreach ($perPageOptions as $option)
                            <option>{{ $option }}</option>
                        @endforeach
                    @else
                        <option>10</option>
                        <option>15</option>
                        <option>25</option>
                    @endif
                </select>
            </div>
        @endif

        @if ($searchEnabled)
            <div class="col">
                <input
                    @if (is_numeric($searchDebounce)) wire:model.debounce.{{ $searchDebounce }}ms="search" @endif
                @if ($disableSearchOnLoading) wire:loading.attr="disabled" @endif
                    class="form-control"
                    type="text"
                    placeholder="{{ $searchLabel }}"
                />
            </div>
        @endif
    </div>
@endif
