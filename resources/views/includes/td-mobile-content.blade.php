{{-- label --}}
<div class="w-1/4 italic text-gray-500 text-xs">
    {{ $column->text }}
</div>
{{-- field --}}
<div class="flex-1">
    @include('laravel-livewire-tables::includes.cell')
</div>