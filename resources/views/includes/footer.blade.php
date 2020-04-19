@if ($tableFooterEnabled)
    <tfoot class="{{ $tableFooterClass }}">
        @include('laravel-livewire-tables::includes.columns')
    </tfoot>
@endif
