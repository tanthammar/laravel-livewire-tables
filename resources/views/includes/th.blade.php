<div class="{{ $theadTrClass }}" dusk="th-tr">
@if(isset($customHead))
    {{-- custom thead replaces fields loop --}}
    @include($customHead)
@else
    {{-- left checkbox --}}
    @if($checkbox && $checkboxLocation === 'left')
        @include('laravel-livewire-tables::includes.checkbox-all')
    @endif
    {{-- loop --}}
    @if(count($groups) > 1)
        @foreach ($groups as $group)
        <div dusk="th" class="{{ $thClass }}">
                @foreach ($group as $column)
                    <div class="w-full {{ $column->align }} {{ $column->visibility }}">
                        @include('laravel-livewire-tables::includes.th-link')
                    </div> 
                @endforeach
            </div>
        @endforeach
    @else
        @foreach($groups as $group)
            @foreach ($group as $column)
                <div dusk="th" class="{{ $thClass }} {{ $column->visibility }} {{ $column->align }}">
                    @include('laravel-livewire-tables::includes.th-link')
                </div>
            @endforeach
        @endforeach
    @endif
    {{-- extra slot for additional th after loop --}}
    @if(isset($theadSlot))
     @include($theadSlot)
    @endif
    {{-- right checkbox --}}
    @if($checkbox && $checkboxLocation === 'right')
        @include('laravel-livewire-tables::includes.checkbox-all')
    @endif
    {{-- empty div for arrow --}}
    @if($arrow)
        <div class="{{ $thClass }}"></div>
    @endif
@endif
</div>
