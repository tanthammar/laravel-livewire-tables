<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

/**
 * Trait Pagination.
 */
trait Pagination
{
    /**
     * Pagination.
     */

    /**
     * Displays per page and pagination links.
     *
     * @var bool
     */
    public $paginationEnabled = true;

    /**
     * The options to limit the amount of results per page.
     *
     * @var array
     */
    public $perPageOptions = [10, 15, 25];

    /**
     * Amount of items to show per page.
     *
     * @var int
     */
    public $perPage = 15;

    /**
     * The label for the per page filter.
     *
     * @var string
     */
    public $perPageLabel;


    /**
     * Custom pagination view
     * 
     */
    public $paginationView;

    public function setPaginationProperties()
    {
        foreach ([
            'paginationView'
        ] as $property) {
            $this->$property = $this->$property ?? config('laravel-livewire-tables.' . $property);
        }
    }
}
