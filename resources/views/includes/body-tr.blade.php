{{-- left checkbox --}}
@if($checkbox && $checkboxLocation === 'left')
    @include('laravel-livewire-tables::includes.checkbox-row')
@endif

@foreach($groups as $group)
    @if(count($groups) > 1)
        <div class="{{ $tdClass }}">  
            @foreach($group as $column)
                <div class="{{ $column->visibility }} md:hidden w-1/4 text-xs text-gray-400">{{ $column->text }}</div>
                <div class="flex-1 md:block py-2 {{ $column->align }} {{ $column->visibility }} {{ $column->colClass}}">@include('laravel-livewire-tables::includes.cell')</div>
            @endforeach
        </div>
    @else
        @foreach($group as $column)
            <div class="{{ $tdClass }} {{ $column->visibility }} {{ $column->colClass}}">
                <div class="md:hidden w-1/4 text-xs text-gray-400">{{ $column->text }}</div>
                <div class="flex-1 md:block py-2">@include('laravel-livewire-tables::includes.cell')</div>
            </div>
        @endforeach
    @endif
@endforeach

{{-- arrow or right checkbox --}}
@if($arrow || ($checkbox && $checkboxLocation === 'right'))
<div class="h-full absolute align-middle first:pl-4 lg:first:pl-6 md:last:pr-4 lg:last:pr-6 md:relative md:right-0 md:table-cell right-4 text-center top-0 whitespace-normal">
    <div class="h-full flex items-center md:block text-right">
        {{-- right checkbox --}}
        @if($checkbox && $checkboxLocation === 'right')
            @include('laravel-livewire-tables::includes.checkbox-row')
        @elseif($hasRowPanel)
            @if($selectedID == $model->uuid)
                @svg('light/chevron-down', 'ml-auto h-5 w-5 text-gray-400')
            @else
                @svg('light/chevron-right', 'ml-auto h-5 w-5 text-gray-400')
            @endif
        @else
            @svg('light/chevron-right', 'ml-auto h-5 w-5 text-gray-400')
        @endif
    </div>
</div>
@endif