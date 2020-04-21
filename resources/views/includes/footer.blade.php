@if ($tableFooterEnabled)
    <div class="{{ $tableFooterClass }}">
        @include('laravel-livewire-tables::includes.th')
    </div>
@endif