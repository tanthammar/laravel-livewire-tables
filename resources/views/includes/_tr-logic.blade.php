<tr class="{{ $visibility }} {{ $trClass }} {{ $this->setTableRowClass($model) }}" id="{{ $this->setTableRowId($model) }}"
@foreach ($this->setTableRowAttributes($model) as $key => $value)
    {{ $key }}="{{ $value }}"
@endforeach>