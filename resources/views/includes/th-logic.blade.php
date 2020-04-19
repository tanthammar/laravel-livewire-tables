<?php
$thClass .= $this->setTableHeadClass($column->attribute);
$thWireKey = $this->setThWireKey($column->attribute);
foreach ($this->setTableHeadAttributes($column->attribute) as $key => $value) {
    $thAttributes[] = $key . '="' . $value .'"';
}
?>