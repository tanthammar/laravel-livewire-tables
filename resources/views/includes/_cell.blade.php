@if ($column->hasComponents())
    @include('laravel-livewire-tables::includes._component')
@elseif ($column->isView())
    @include($column->view)
@else
    @include('laravel-livewire-tables::includes._field')
@endif