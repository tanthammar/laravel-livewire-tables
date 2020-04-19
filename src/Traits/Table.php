<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

trait Table
{
    /**
     * Custom views
     */
    public $tbody = null;
    public $tbodyDesktop = null;
    public $tbodyMobile = null;
    public $headerColView = null;

    /**
     * Visibility for areas
     */
    public $tableHeaderEnabled = true;
    public $tableFooterEnabled = false;
    public $arrow = true;

    /**
     * Apply Classes
     */
    public $wrapperClass = null;
    public $tableClass = null;
    public $tableHeaderClass = null;
    public $tbodyClass = null;
    public $tableFooterClass = null;
    public $trClass = null;
    public $thClass = null;
    public $tdClass = null;
    

    /**
     * Layout
     */
    public $grouped = false;


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
    public function setThWireKey($attribute): ?string
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
    public function setTdWireKey($attribute, $value): ?string
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
            'wrapperClass',
            'tableClass',
            'tableHeaderClass',
            'tbodyClass',
            'tableFooterClass',
            'trClass',
            'thClass',
            'tdClass',
            'headerColView',
            'tableHeaderEnabled',
            'tableFooterEnabled',
            'grouped',
            'arrow',
        ] as $property) {
            $this->$property = $this->$property ?? config('laravel-livewire-tables.' . $property);
        }
    }
}
