<?php

namespace Rappasoft\LaravelLivewireTables\Views\Contracts;

/**
 * Interface Table.
 */
interface TableContract
{
    public $rowWireKey;
    public $title;
    public string $search;
    public int $perPage;
    public string $sortField;
    public bool $sortAsc;
    public $modelName;

    public function query();
    public function columns();
    public function models();
    public function render();
}
