<td class="{{ $tdClass }} {{ $this->setTableDataClass($column->attribute, $model->{$column->attribute}) }}"
id="{{ $this->setTableDataId($column->attribute, $model->{$column->attribute}) }}"
@foreach ($this-> setTableDataAttributes($column->attribute, $model->{$column->attribute}) as $key => $value)
    {{ $key }}="{{ $value }}"
@endforeach>