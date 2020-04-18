{{-- start tr --}}
@include('laravel-livewire-tables::includes._tr-logic', ['visibility' => 'hidden sm:table-row'])
    {{-- left checkbox --}}
    @if($checkbox && $checkboxLocation === 'left')
        @include('laravel-livewire-tables::includes._checkbox-row')
    @endif

    @foreach($columns as $column)
        {{-- start td --}}
      <td class="{{ $tdClass }} {{ $this->setTableDataClass($column->attribute, $model->{$column->attribute}) }}"
        dusk-td-name="{{ $this->setTableDataId($column->attribute, $model->{$column->attribute}) }}"
        @foreach ($this-> setTableDataAttributes($column->attribute, $model->{$column->attribute}) as $key => $value)
            {{ $key }}="{{ $value }}"
        @endforeach >
        {{-- field --}}
            @include('laravel-livewire-tables::includes._cell')
        </td>
    @endforeach

    {{-- right checkbox --}}
    @if($checkbox && $checkboxLocation === 'right')
        @include('laravel-livewire-tables::includes._checkbox-row')
    @endif
</tr>