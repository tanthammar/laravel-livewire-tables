@if ($tableHeaderEnabled)
    <div class="{{ $tableHeaderClass }}" dusk="thead">
        @include('laravel-livewire-tables::includes.th')
    </div>
@endif