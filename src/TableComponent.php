<?php

namespace Rappasoft\LaravelLivewireTables;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\WithPagination;
use Rappasoft\LaravelLivewireTables\Traits\Checkboxes;
use Rappasoft\LaravelLivewireTables\Traits\Loading;
use Rappasoft\LaravelLivewireTables\Traits\Offline;
use Rappasoft\LaravelLivewireTables\Traits\Pagination;
use Rappasoft\LaravelLivewireTables\Traits\Search;
use Rappasoft\LaravelLivewireTables\Traits\Sorting;
use Rappasoft\LaravelLivewireTables\Traits\Table;
use Rappasoft\LaravelLivewireTables\Traits\Yajra;

/**
 * Class TableComponent.
 */
trait TableComponent
{
    use Checkboxes,
        Loading,
        Offline,
        Pagination,
        Search,
        Sorting,
        Table,
        WithPagination,
        Yajra;


    /**
     * Whether or not to refresh the table at a certain interval
     * false is off
     * If it's an integer it will be treated as milliseconds (2000 = refresh every 2 seconds)
     * If it's a string it will call that function every 5 seconds.
     *
     * @var bool|string
     */
    public $refresh = false;

    /**
     * Constructor.
     */
    public function setupTable()
    {
        $this->setTranslationStrings();
        $this->setTableProperties();
        $this->setPaginationProperties();
        //$this->groups = $this->groupColumns();
    }

    /**
     * Sets the initial translations of these items.
     */
    public function setTranslationStrings()
    {
        $this->loadingMessage = __('Loading...');
        $this->offlineMessage = __('You are not currently connected to the internet.');
        $this->noResultsMessage = trans('messages.not_found');
        $this->perPageLabel = trans('pagination.per_page');
        $this->searchLabel = __('Search...');
    }

    public $selectedID = null;
    public function selectModel($uuid)
    {
        //if we click again on the same uuid, close panel
        $this->selectedID = $this->selectedID == $uuid ? '' : $uuid;
    }

    /**
     * @return mixed
     */
    abstract public function query(): Builder;

    /**
     * @return mixed
     */
    abstract public function columns(): array;


    public function groups()
    {
        foreach ($this->columns() as $column) {
            $groups[$column->group][] = $column;
        }
        return \Arr::sortRecursive($groups);
    }

    public function searchTooltip()
    {
        $tooltip = $this->searchLabel . ' ';

        foreach ($this->columns() as $column) {
            if ($column->isSearchable()) {
                $tooltip .= $column->text . '. ';
            }
        }
        return $tooltip;
    }

    /**
     * @return string
     */
    public function view(): string
    {
        return 'laravel-livewire-tables::table-component';
    }

    public function render()
    {
        return $this->tableView();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tableView(): View
    {
        return view($this->view(), [
            'groups' => $this->groups(),
            'models' => $this->paginationEnabled ? $this->models()->paginate($this->perPage) : $this->models()->get(),
        ]);
    }

    /**
     * @return Builder
     */
    public function models(): Builder
    {
        $models = $this->query();

        if ($this->searchEnabled && trim($this->search) !== '') {
            $models->where(function (Builder $query) {
                foreach ($this->columns() as $column) {
                    if ($column->searchable) {
                        if (is_callable($column->searchCallback)) {
                            $query = app()->call($column->searchCallback, ['builder' => $query, 'term' => $this->search]);
                        } elseif (Str::contains($column->attribute, '.')) {
                            $relationship = $this->relationship($column->attribute);

                            $query->orWhereHas($relationship->name, function (Builder $query) use ($relationship) {
                                $query->where($relationship->attribute, 'like', '%' . $this->search . '%');
                            });
                        } else {
                            $query->orWhere($query->getModel()->getTable() . '.' . $column->attribute, 'like', '%' . $this->search . '%');
                        }
                    }
                }
            });
        }

        if (Str::contains($this->sortField, '.')) {
            $relationship = $this->relationship($this->sortField);
            $sortField = $this->attribute($models, $relationship->name, $relationship->attribute);
        } else {
            $sortField = $this->sortField;
        }

        if (($column = $this->getColumnByAttribute($this->sortField)) !== null && is_callable($column->sortCallback)) {
            return app()->call($column->sortCallback, ['models' => $models, 'sortField' => $sortField, 'sortDirection' => $this->sortDirection]);
        }

        return $models->orderBy($sortField, $this->sortDirection);
    }
}
