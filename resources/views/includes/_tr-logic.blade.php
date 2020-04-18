<tr class="{{ $visibility }} {{ $trClass }} {{ $this->setTableRowClass($model) }}" wire:key="{{ $model->{$wireKey} }}" dusk-name="{{ $this->setTableRowId($model) }}"
@foreach ($this->setTableRowAttributes($model) as $key => $value)
    {{ $key }}="{{ $value }}"
@endforeach>