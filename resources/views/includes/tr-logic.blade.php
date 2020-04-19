@php
foreach($this->setTableRowAttributes($model) as $key => $value) {
    $trAttributes[] = $key . '="' . $value .'"';
}
$clickRoute = route("app.{$modelName}s.show", [$modelName => $model->{$model->getRouteKeyName()}]);
@endphp