@if ($column->componentsAreHiddenForModel($model))
    @if ($message = $column->componentsHiddenMessageForModel($model))
        {{ $message }}
    @else
        <span>&nbsp;</span>
    @endif
@else
    @foreach($column->getComponents() as $component)
        @if (!$component->isHidden())
            @include($component->view(), ['model' => $model, 'attributes' => $component->getAttributes(), 'options' =>
$component->getOptions()])
        @endif
    @endforeach
@endif