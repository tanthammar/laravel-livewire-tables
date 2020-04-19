<?php
$tdDataClass = $this->setTableDataClass($column->attribute, $model->{$column->attribute});
$tdWireKey = $this->setTdWireKey($column->attribute, $model->{$column->attribute});
foreach ($this-> setTableDataAttributes($column->attribute, $model->{$column->attribute}) as $key => $value) {
    $tdAttributes[] = $key . '="' . $value .'"';
}
?>