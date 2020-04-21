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
        <td class="{{ $tdClass }}{{ $column->align }}"  colspan="{{ $group->pluck('colspan')[0] ?? 1 }}">
            @foreach ($group as $column)
                <span class="w-full {{ $column->colClass }} {{ $column->visibility }}">@include('laravel-livewire-tables::includes.cell')</span>
            @endforeach
        </td>
        @endforeach
    @else
        {{-- single cell --}}
        @foreach($groups as $group)
        @foreach ($group as $column)
            <td class="{{ $tdClass }} {{ $column->visibility }} {{ $column->colClass}} {{ $column->align }}" colspan="{{ $column->tdColspan }}">
                @include('laravel-livewire-tables::includes.cell')
            </td>
        @endforeach
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
    <td colspan="{{ count(array_dot($groups), COUNT_RECURSIVE) }}">
        @include($rowPanel)
    </td>
</tr>
@endif