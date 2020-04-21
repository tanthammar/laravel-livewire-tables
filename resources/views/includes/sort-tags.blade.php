{{-- Sort tags for small screens --}}
{{-- kept styling for larger screens if we want to bring it back --}}
<div class="mt-4 sm:hidden sm:mt-0 sm:ml-auto">
    <span class="text-xs pr-2">@lang('fields.sort')</span>
    @foreach($groups as $group)
    @foreach ($group as $column)
        @if ($column->sortable())
            <a href="#" role="button" wire:click.prevent="sortBy('{{ $column->orderBy ?? $column->attribute }}')"
               class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium leading-4 bg-indigo-100 text-indigo-800">
                <x-sort-icon :field="$column->attribute" :sortField="$sortField" :sortAsc="$sortAsc"/>
                {{ $column->text }}
            </a>
        @endif
    @endforeach
    @endforeach
</div>