<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

/**
 * Trait Table.
 */
trait Table
{
    /**
     * Table.
     */

    /**
     * Set your own views for the component
     */
    public $tbody = null;
    public $tbodyDesktop = null;
    public $tbodyMobile = null;

    /**
     * Whether or not to display the table header.
     *
     * @var bool
     */
    public $tableHeaderEnabled;

    /**
     * Custom header column
     */
    public $headerColView;

    /**
     * Whether or not to display the table footer.
     *
     * @var bool
     */
    public $tableFooterEnabled;

    /**
     * The class to set on the table.
     *
     * @var string
     */
    public $tableClass;

    /**
     * The class to set on the thead of the table.
     *
     * @var string
     */
    public $tableHeaderClass;

    /**
     * The class to set on the tfoot of the table.
     *
     * @var string
     */
    public $tableFooterClass;

    /**
     * Table tbody class.
     *
     * @var string
     */
    public $tbodyClass;

    /**
     * Table tr class.
     *
     * @var string
     */
    public $trClass;

    /**
     * Table th class.
     *
     * @var string
     */
    public $thClass;

    /**
     * Table td class.
     *
     * @var string
     */
    public $tdClass;

    /**
     * false is off
     * string is the tables wrapping div class.
     *
     * @var bool
     */
    public $responsive;

    /**
     * @param $attribute
     *
     * @return string|null
     */
    public function setTableHeadClass($attribute): ?string
    {
        return null;
    }

    /**
     * @param $attribute
     *
     * @return string|null
     */
    public function setTableHeadId($attribute): ?string
    {
        return null;
    }

    /**
     * @param $attribute
     *
     * @return array|null
     */
    public function setTableHeadAttributes($attribute): array
    {
        return [];
    }

    /**
     * @param $model
     *
     * @return string|null
     */
    public function setTableRowClass($model): ?string
    {
        return null;
    }

    /**
     * @param $model
     *
     * @return string|null
     */
    public function setTableRowId($model): ?string
    {
        return null;
    }

    /**
     * @param $model
     *
     * @return array
     */
    public function setTableRowAttributes($model): array
    {
        return [];
    }

    /**
     * @param $attribute
     * @param $value
     *
     * @return string|null
     */
    public function setTableDataClass($attribute, $value): ?string
    {
        return null;
    }

    /**
     * @param $attribute
     * @param $value
     *
     * @return string|null
     */
    public function setTableDataId($attribute, $value): ?string
    {
        return null;
    }

    /**
     * @param $attribute
     * @param $value
     *
     * @return array
     */
    public function setTableDataAttributes($attribute, $value): array
    {
        return [];
    }

    public function setTableProperties()
    {
        foreach ([
            'tableHeaderEnabled',
            'headerColView',
            'tableFooterEnabled',
            'tableClass',
            'tableHeaderClass',
            'tableFooterClass',
            'responsive',
            'tbodyClass',
            'trClass',
            'thClass',
            'tdClass'
        ] as $property) {
            $this->$property = $this->$property ?? config('laravel-livewire-tables.' . $property);
        }
    }
}
