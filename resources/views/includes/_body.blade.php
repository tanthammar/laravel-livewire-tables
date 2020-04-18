<tbody class="min-w-full">
    @if($models->isEmpty())
        <tr class="tr">
            <td class="td" colspan="{{ collect($columns)->count() }}">{{ $noResultsMessage }}</td>
        </tr>
    @else
        @foreach($models as $model)
            <tr class="tr {{ $this->setTableRowClass($model) }}" id="{{ $this->setTableRowId($model) }}" 
                @foreach ($this->setTableRowAttributes($model) as $key => $value)
                    {{ $key }}="{{ $value }}"
                @endforeach
                >
                @if($checkbox && $checkboxLocation === 'left')
                    @include('laravel-livewire-tables::includes._checkbox-row')
                @endif

                @foreach($columns as $column)
                    <td class="td {{ $this->setTableDataClass($column->attribute, $model->{$column->attribute}) }}"
                        id="{{ $this->setTableDataId($column->attribute, $model->{$column->attribute}) }}" 
                        @foreach ($this->setTableDataAttributes($column->attribute, $model->{$column->attribute}) as $key => $value)
                            {{ $key }}="{{ $value }}"
                        @endforeach
                    >
                        @if ($column->hasComponents())
                            @if ($column->componentsAreHiddenForModel($model))
                                @if ($message = $column->componentsHiddenMessageForModel($model))
                                    {{ $message }}
                                @else
                                    <span>&nbsp;</span>
                                @endif
                            @else
                                @foreach($column->getComponents() as $component)
                                    @if (!$component->isHidden())
                                        @include($component->view(), ['model' => $model, 'attributes' => $component->getAttributes(), 'options' => $component->getOptions()])
                                    @endif
                                @endforeach
                            @endif
                        @elseif ($column->isView())
                            @include($column->view)
                        @else
                            @if ($column->isHtml())
                                {{ new \Illuminate\Support\HtmlString($model->{$column->attribute}) }}
                            @elseif ($column->isUnescaped())
                                {!! $model->{$column->attribute} !!}
                            @elseif ($column->isJsonKeyVal())
                                {{ \Arr::get($model->{$column->attribute}, [$column->key], null)}}
                            @else
                                {{ $model->{$column->attribute} }}
                            @endif
                        @endif
                    </td>
                @endforeach
                @if($checkbox && $checkboxLocation === 'right')
                    @include('laravel-livewire-tables::includes._checkbox-row')
                @endif
            </tr>
        @endforeach
    @endif
</tbody>