@if ($column->isHtml())
{{ new \Illuminate\Support\HtmlString($model->{$column->attribute}) }}
@elseif ($column->isUnescaped())
{!! $model->{$column->attribute} !!}
@elseif ($column->isJsonKeyVal())
{{ \Arr::get($model->{$column->attribute}, [$column->key], null)}}
@else
{{ $model->{$column->attribute} }}
@endif