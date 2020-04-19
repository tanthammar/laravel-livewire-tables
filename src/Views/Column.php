<?php

namespace Rappasoft\LaravelLivewireTables\Views;

use Illuminate\Support\Str;
use Rappasoft\LaravelLivewireTables\Traits\HasComponents;

/**
 * Class Column.
 */
class Column
{
    use HasComponents;

    protected $type = 'default';
    protected $text;
    protected $attribute;
    protected $key;

    protected $group = null;
    protected $thColspan = 1;
    protected $tdColspan = 1;
    protected $colClass = null;

    protected $align = 'text-left';
    protected $hideOnMobile = false;
    protected $hideOnDesktop = false;


    protected $iconBefore = false;
    protected $iconBeforeColor = null;
    protected $iconAfter = false;
    protected $iconAfterColor = null;
    protected $iconEmptyWarningColor = null;

    protected $orderBy = null;

    protected $searchable = false;
    protected $searchCallback = null;

    protected $sortable = false;
    protected $sortCallback;

    protected $callField = null;
    protected $bladeString = null;

    /**
     * @var
     */
    protected $view;

    /**
     * Column constructor.
     *
     * @param $text
     * @param $attribute
     */
    public function __construct($text, $attribute = false)
    {
        $this->text = $text;
        $this->attribute = $attribute ?? Str::snake(Str::lower($text));
    }

    /**
     * @param $property
     *
     * @return mixed
     */
    public function __get($property)
    {
        return $this->$property;
    }

    /**
     * @param  string  $text
     * @param  string  $attribute
     * @param  string  $key
     *
     * @return static
     */
    public static function make($text = null, $attribute = null)
    {
        return new static($text, $attribute);
    }

    /**
     * @param  callable|null  $callable
     *
     * @return $this
     */
    public function searchable(callable $callable = null): self
    {
        if ($this->hasComponents()) {
            return $this;
        }
        $this->searchCallback = $callable;
        $this->searchable = true;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSearchable(): bool
    {
        return $this->searchable;
    }

    /**
     * @param  callable|null  $callable
     *
     * @return $this
     */
    public function sortable(callable $callable = null): self
    {
        if ($this->hasComponents()) {
            return $this;
        }
        $this->sortCallback = $callable;
        $this->sortable = true;
        return $this;
    }

    public function orderBy($field): self
    {
        $this->orderBy = $field;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSortable(): bool
    {
        return $this->sortable;
    }

    /**
     * @return $this
     */
    public function class($class): self
    {
        $this->colClass = $class;
        return $this;
    }

    /**
     * @return $this
     */
    public function unescaped(): self
    {
        if ($this->hasComponents()) {
            return $this;
        }
        $this->type = 'unescaped';
        return $this;
    }

    /**
     * make a click to call href, optional field
     */
    public function clickCall($field = null): self
    {
        $this->type = 'clickCall';
        $this->callfield = $field ?? null;
        return $this;
    }

    /**
     * Parse blade string
     */
    public function blade($string): self
    {
        $this->type = 'blade';
        $this->bladeString = $string;
        return $this;
    }

    /**
     * Create column group
     */
    public function group($num): self
    {
        $this->group = $num;
        return $this;
    }

    public function hideOnMobile(): self
    {
        $this->hideOnMobile = true;
        return $this;
    }

    public function hideOnDesktop(): self
    {
        $this->hideOnDesktop = true;
        return $this;
    }

    /**
     * Cell alignment
     */
    public function align($class): self
    {
        $this->align = $class ?? 'text-left';
        return $this;
    }

    /**
     * Header colspan
     */
    public function thColspan($num): self
    {
        $this->thColspan = $num ?? 1;
        return $this;
    }

    /**
     * Body colspan
     */
    public function tdColspan($num): self
    {
        $this->tdColspan = $num ?? 1;
        return $this;
    }

    /**
     * @return $this
     */
    public function html(): self
    {
        if ($this->hasComponents()) {
            return $this;
        }
        $this->type = 'html';
        return $this;
    }

    /**
     * @param string $key
     * @return $this
     */
    public function keyVal($key): self
    {
        $this->key = $key;
        $this->type = 'keyVal';
        return $this;
    }


    public function emptyWarning($color = null): self
    {
        $this->type = 'emptyWarning';
        $this->iconEmptyWarningColor = $color ?? null;
        return $this;
    }

    /**
     * @param string $icon
     * @param string $color
     */
    public function iconBefore($icon, $color = null): self
    {
        $this->iconBefore = $icon;
        $this->iconBeforeColor = $color ?? null;
        return $this;
    }

    /**
     * @param string $icon
     * @param string $color
     */
    public function iconAfter($icon, $color = null): self
    {
        $this->iconAfter = $icon;
        $this->iconAfterColor = $color ?? null;
        return $this;
    }


    /**
     * @param $view
     * @return $this
     */
    public function view($view): self
    {
        if ($this->hasComponents()) {
            return $this;
        }
        $this->view = $view;
        return $this;
    }

    /**
     * @return bool
     */
    public function isView(): bool
    {
        return view()->exists($this->view);
    }
}
