@if (is_numeric($refresh))
    <div class="{{ $wrapperClass }}" wire:poll.{{ $refresh }}.ms>
@elseif (is_string($refresh))
    <div class="{{ $wrapperClass }}" wire:poll="{{ $refresh }}">
@else
    <div class="{{ $wrapperClass }}">
@endif
    @include('laravel-livewire-tables::includes.offline')
    @include('laravel-livewire-tables::includes.options')
    @include('laravel-livewire-tables::includes.loading')

    {{-- setup groups --}}
    @php
        if ($grouped) {
            $groups = collect($columns)->groupBy('group');
        }
    @endphp
        <table class="{{ $tableClass }} min-w-full">
            @include('laravel-livewire-tables::includes.header')
            @include('laravel-livewire-tables::includes.body')
            @include('laravel-livewire-tables::includes.footer')
        </table>


    @include('laravel-livewire-tables::includes.pagination')
</div>
