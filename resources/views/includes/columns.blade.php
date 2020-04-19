@if($checkbox && $checkboxLocation === 'left')
    @include('laravel-livewire-tables::includes.checkbox-all')
@endif

@include('laravel-livewire-tables::includes.th-logic')
@if($grouped)
    {{-- grouped cell --}}
    @foreach($groups as $group)
        <th class="{{ $thClass }}" wire:key="{{ $thWireKey }}" {{$thAttributes}} colspan="{{ $group->pluck('colspan')[0] ?? 1 }}">
            @foreach ($group as $column)
            @if (!$hideOnDesktop)
            <div class="w-full {{ $column->align }}">
                @include('laravel-livewire-tables::includes.th-link')
            </div> 
            @endif
            @endforeach
        </th>
    @endforeach
@else
    {{-- single cell --}}
    @foreach($columns as $column)
        <th class="{{ $thClass }}" wire:key="{{ $thWireKey }}" {{$thAttributes}} colspan="{{ $thColspan }}">
            @include('laravel-livewire-tables::includes.th-link')
        </th>
    @endforeach
@endif

@if($checkbox && $checkboxLocation === 'right')
    @include('laravel-livewire-tables::includes.checkbox-all')
@endif

@if($arrow)
<th></th>
@endif
