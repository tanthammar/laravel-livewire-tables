{{-- start tr --}}
@include('laravel-livewire-tables::includes._tr-logic', ['visibility' => 'sm:hidden'])

    {{-- left checkbox --}}
    @if($checkbox && $checkboxLocation === 'left')
        @include('laravel-livewire-tables::includes._checkbox-row')
    @endif
    
    {{-- start td --}}
    <td class="{{ $tdClass }}>
        @foreach($columns as $column)
        <div class="w-full">

            {{-- label --}}
            <div class="italic text-gray-500 text-xs">
                {{ $column->text }}
            </div>

            {{-- field --}}
            <div class="{{ $this->setTableDataClass($column->attribute, $model->{$column->attribute}) }}"
                dusk-div-name="{{ $this->setTableDataId($column->attribute, $model->{$column->attribute}) }}"
                    @foreach ($this-> setTableDataAttributes($column->attribute, $model->{$column->attribute}) as $key => $value)
                        {{ $key }}="{{ $value }}"
                    @endforeach >
                @include('laravel-livewire-tables::includes._cell')
            </div>
        </div>
        @endforeach
    </td>

    {{-- right checkbox --}}
    @if($checkbox && $checkboxLocation === 'right')
        @include('laravel-livewire-tables::includes._checkbox-row')
    @endif
</tr>