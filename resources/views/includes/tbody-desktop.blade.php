@include('laravel-livewire-tables::includes.tr-logic')
<tr x-on:click="window.location.href='{{$clickRoute}}'"
class="hidden sm:table-row cursor-pointer {{ $trClass }}" 
wire:key="{{ $model->{$rowWireKey} }} {{ $trAttributes }}">
    {{-- left checkbox --}}
    @if($checkbox && $checkboxLocation === 'left')
        @include('laravel-livewire-tables::includes.checkbox-row')
    @endif
    @include('laravel-livewire-tables::includes.td-logic')
    @if($grouped)
        {{-- grouped cell --}}
        @foreach($groups as $group)
        <td class="{{ $tdClass }} {{ $tdDataClass }}" wire:key="'{{ $tdWireKey }}'" {{ $tdAttributes }} colspan="{{ $tdColspan }}">
            @foreach ($group as $column)
                @if(!$hideOnDesktop)
                    @include('laravel-livewire-tables::includes.cell')
                @endif
            @endforeach
        </td>
        @endforeach
    @else
        {{-- single cell --}}
        @foreach($columns as $column)
            @if(!$hideOnDesktop)
                <td class="{{ $tdClass }} {{ $tdDataClass }}" wire:key="'{{ $tdWireKey }}'" {{ $tdAttributes }} colspan="{{ $tdColspan }}">
                    @include('laravel-livewire-tables::includes.cell')
                </td>
            @endif
        @endforeach
    @endif
    {{-- right checkbox --}}
    @if($checkbox && $checkboxLocation === 'right')
        @include('laravel-livewire-tables::includes.checkbox-row')
    @endif
    {{-- arrow --}}
    @if($arrow)
        @include('laravel-livewire-tables::includes.right-arrow')
    @endif
</tr>