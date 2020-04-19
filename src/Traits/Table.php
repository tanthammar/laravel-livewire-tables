<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

trait Table
{
    /**
     * Custom views
     */
    public $tbody = null; // in <tbody> before loop, has $models
    public $tbodyDesktop = null; // in <tbody> in loop, has $model, add tr
    public $tbodyMobile = null; // in <tbode> in loop, has $model, add tr
    public $afterTitle = null; // help article position
    public $noTable = null; //replaces <tbody>, has $models
    public $modal = null; // after main section
    public $customHead = null; //in <thead><tr> before loop, has $groups, add th
    public $ths = null; //add extra th cells, outside of loop
    public $hasRowPanel = false; //click to show panel on each row
    public $rowPanel = null; // in w-full td, colspan-all, has $model + $columns
  
    /**
     * Visibility for areas
     */
    public $tableHeaderEnabled = true;
    public $tableFooterEnabled = false;
    public $arrow = true;
    public $grouped = false;

    /**
     * Apply Classes
     */
    public $tableClass = null;
    public $tableHeaderClass = null;
    public $tbodyClass = null;
    public $tableFooterClass = null;
    public $trClass = null;
    public $thClass = null;
    public $tdClass = null;
    

    /**
     * Methods
     */
    public $title = '';
    public $modelName = '';
    


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
            'tableClass',
            'tableHeaderClass',
            'tbodyClass',
            'tableFooterClass',
            'trClass',
            'thClass',
            'tdClass',
            'tableHeaderEnabled',
            'tableFooterEnabled',
            'grouped',
            'arrow',
        ] as $property) {
            $this->$property = $this->$property ?? config('laravel-livewire-tables.' . $property);
        }
    }
}
