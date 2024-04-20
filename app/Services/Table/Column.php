<?php

namespace App\Services\Table;

use App\Enums\Livewire\Table\FilterTypeEnum;
use Closure;

class Column
{
    public string $key;

    public string $label;

    public string $searchColumn;

    public FilterTypeEnum $filter;

    public string $sortColumn;

    public ?Closure $callback;

    public array $filterSelection;

    public array $minAndMax;

    public function __construct(
        string $key,
        string $searchColumn,
        string $label,
        FilterTypeEnum $filter,
        ?string $sortColumn = null,
        ?Closure $callback = null
    ) {
        $this->key = $key;
        $this->searchColumn = $searchColumn;
        $this->label = $label;
        $this->filter = $filter;
        $this->sortColumn = $sortColumn ?? $key;
        $this->callback = $callback;
    }

    public static function create(
        string $key,
        string $searchColumn,
        string $label,
        FilterTypeEnum $filter,
        ?string $sortColumn = null,
        ?Closure $callback = null,
    ): static {
        return new static($key, $searchColumn, $label, $filter, $sortColumn, $callback);
    }

    public function setFilterSelection($selection): Column
    {
        $this->filterSelection = $selection;

        return $this;
    }

    public function setRange($min, $max): Column
    {
        $this->minAndMax = [$min, $max];

        return $this;
    }

    public function callback($value)
    {
        $func = $this->callback;

        return $func($value);
    }
}
