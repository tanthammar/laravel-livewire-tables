@if($hasRowPanel)
<tr class="tr cursor-pointer" wire:key="{{ $model->uuid }}" wire:click.stop="selectModel('{{ $model->uuid }}')">
@else
<tr x-on:click.stop="window.location.href='{{route("app.{$modelName}s.show", [$modelName => $model->{$model->getRouteKeyName()}])}}'"
class="hidden sm:table-row cursor-pointer {{ $trClass }}" 
wire:key="{{ $model->{$model->getRouteKeyName()} }}">
@endif
    {{-- left checkbox --}}
    @if($checkbox && $checkboxLocation === 'left')
        @include('laravel-livewire-tables::includes.checkbox-row')
    @endif
    @if($grouped)
        {{-- grouped cell --}}
        @foreach($groups as $group)
        <td class="{{ $tdClass }}"  colspan="{{ $group->pluck('colspan')[0] ?? 1 }}">
            @foreach ($group as $column)
                @if(!$column->hideOnDesktop)
                    <span class="w-full {{ $column->colClass}}">@include('laravel-livewire-tables::includes.cell')</span>
                @endif
            @endforeach
        </td>
        @endforeach
    @else
        {{-- single cell --}}
        @foreach($columns as $column)
            @if(!$column->hideOnDesktop)
                <td class="{{ $tdClass }} {{ $column->colClass}}" colspan="{{ $column->tdColspan }}">
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
    @if($arrow && !$hasRowPanel)
        @include('laravel-livewire-tables::includes.right-arrow')
    @endif
    @if($arrow && $hasRowPanel)
        @if($selectedID == $model->uuid)
            @include('laravel-livewire-tables::includes.down-arrow')
        @else
            @include('laravel-livewire-tables::includes.right-arrow')
        @endif
    @endif
</tr>
@if($hasRowPanel && $selectedID == $model->uuid)
<tr>
    <td colspan="{{ collect($columns)->count() }}">
        @include($rowPanel)
    </td>
</tr>
@endif