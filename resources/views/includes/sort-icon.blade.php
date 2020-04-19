<div class="mr-1">
    @if ($sortField !== $column->attribute)
    @svg('light/sort', 'w-3 h-3')
    @elseif ($sortDirection === 'asc')
    @svg('light/sort-up', 'w-3 h-3')
    @else
    @svg('light/sort-down', 'w-3 h-3')
    @endif
</div>