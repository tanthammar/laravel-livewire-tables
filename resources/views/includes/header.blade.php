@if ($tableHeaderEnabled)
    <thead class="hidden sm:table-header-group {{ $tableHeaderClass }}">
        @include('laravel-livewire-tables::includes.columns')
    </thead>
@endif
