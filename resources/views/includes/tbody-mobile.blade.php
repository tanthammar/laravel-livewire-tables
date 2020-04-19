@include('laravel-livewire-tables::includes.tr-logic')
<tr x-on:click="window.location.href='{{$clickRoute}}'"
class="sm:hidden cursor-pointer {{ $trClass }}" 
wire:key="{{ $model->{$rowWireKey} }} {{ $trAttributes }}">
    {{-- left checkbox --}}
    @if($checkbox && $checkboxLocation === 'left')
        @include('laravel-livewire-tables::includes.checkbox-row')
    @endif
    
    {{-- start td --}}
    @include('laravel-livewire-tables::includes.td-logic')
    <td class="{{$tdClass}}>
        @if($grouped)
            {{-- grouped cell --}}
            <table class="w-full">
                @foreach($groups as $group)
                <tr class="tr">
                    @foreach ($group as $column)
                        @if(!$hideOnMobile)
                            <td class="{{ $tdDataClass }}" wire:key="'{{ $tdWireKey }}'" {{ $tdAttributes }}>
                                @include('laravel-livewire-tables::includes.td-mobile-content')
                            </td>
                        @endif
                    @endforeach
                </tr>
                @endforeach
            </table>
        @else
            {{-- single cell --}}
            @foreach($columns as $column)
                @if(!$hideOnMobile)
                    <div class="w-full {{ $tdDataClass }}" wire:key="'{{ $tdWireKey }}'" {{ $tdAttributes }}>
                        @include('laravel-livewire-tables::includes.td-mobile-content')
                    </div>
                @endif
            @endforeach
        @endif
    </td>

    {{-- right checkbox --}}
    @if($checkbox && $checkboxLocation === 'right')
        @include('laravel-livewire-tables::includes.checkbox-row')
    @endif

    {{-- arrow --}}
    @if($arrow)
        @include('laravel-livewire-tables::includes.right-arrow')
    @endif
</tr>