@if($column->iconBefore) @svg($column->iconBefore, 'td-icon'. $column->iconBeforeColor) @endif
@if($column->type=='emptyWarning' && empty($model->{$column->attribute}))
@svg('light/exclamation-triangle', 'td-icon'. $column->iconEmptyWarningColor)
@endif
@php
switch ($column->type) {
    case 'html':
        echo new \Illuminate\Support\HtmlString( $model->{$column->attribute} );
        break;

    case 'unescaped':
        echo $model->{$column->attribute};
        break;

    case 'blade':
        $php_html = Blade::compileString($column->bladeString);
        if(filled($php_html)) {
             echo eval(' ?>'.$php_html.'<?php '); 
        }
        break;

    case 'clickCall':
        echo '<a href="tel:' . ($column->callfield ?? $model->{$column->attribute}) . '">' . $model->{$column->attribute} . '</a>';
        break;

    case 'keyVal':
        echo \Arr::get($model->{$column->attribute}, $column->key, null);
        break;

    default:
        echo $model->{$column->attribute} ?? null;
        break;
}
@endphp
@if($column->iconAfter) @svg($column->iconAfter, 'td-icon'. $column->iconAfterColor) @endif