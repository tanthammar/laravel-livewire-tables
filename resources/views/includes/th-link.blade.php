@if($column->sortable)
<a class="inline-flex items-center" role="button"
    wire:click.prevent="sort('{{ $column->attribute }}')" href="#">
    @include('laravel-livewire-tables::includes.sort-icon')
    {{ $column->text }}
</a>
@else
{{ $column->text }}
@endif