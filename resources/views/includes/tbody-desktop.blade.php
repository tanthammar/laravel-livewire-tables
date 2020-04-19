<tr x-on:click="window.location.href='{{route("app.{$modelName}s.show", [$modelName => $model->{$model->getRouteKeyName()}])}}'"
class="hidden sm:table-row cursor-pointer {{ $trClass }}" 
wire:key="{{ $model->{$rowWireKey} }}">
    {{-- left checkbox --}}
    @if($checkbox && $checkboxLocation === 'left')
        @include('laravel-livewire-tables::includes.checkbox-row')
    @endif
    @if($grouped)
        {{-- grouped cell --}}
        @foreach($groups as $group)
        <td class="{{ $tdClass }}"  colspan="{{ $column->tdColspan }}">
            @foreach ($group as $column)
                @if(!$column->hideOnDesktop)
                    @include('laravel-livewire-tables::includes.cell')
                @endif
            @endforeach
        </td>
        @endforeach
    @else
        {{-- single cell --}}
        @foreach($columns as $column)
            @if(!$column->hideOnDesktop)
                <td class="{{ $tdClass }}" colspan="{{ $column->tdColspan }}">
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