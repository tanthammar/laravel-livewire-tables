@if ($paginationEnabled)
{{-- Per page select, hidden on small screens --}}
<div class="hidden ml-2 sm:flex sm:ml-auto items-center">
    <span class="text-xs pr-2">{{ $perPageLabel }}:</span>
    <select dusk="per-page-select" wire:model="perPage" class="form-control">
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
