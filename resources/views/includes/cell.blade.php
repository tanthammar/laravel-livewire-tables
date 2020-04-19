@if ($column->hasComponents())
    @include('laravel-livewire-tables::includes.component')
@elseif ($column->isView())
    @include($column->view)
@else
    @include('laravel-livewire-tables::includes.field')
@endif