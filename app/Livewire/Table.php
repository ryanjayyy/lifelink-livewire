<?php

namespace App\Livewire;

use App\Services\Table\TableService;
use App\Utils\UrlUtils;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

abstract class Table extends Component
{
    use WithPagination;

    #[Url]
    public int $page = 1;

    #[Url]
    public int $perPage = 50;

    #[Url]
    public array $filters = [];

    #[Url]
    public array $sorting = [];

    public array $perPageOptions = [5, 10, 50, 100, 200];

    public string $headerComponent = 'table.header';

    public string $columnComponent = 'table.body';

    abstract public function getQuery(): Builder;

    #[Computed]
    abstract public function columns(): array;

    abstract public function uniqueRowId(): string;

    abstract public function getDefaultSort(): array;

    abstract public function canExport(): bool;

    public function getCurrentFilter(string $column): mixed
    {
        return optional(
            Arr::first($this->filters, fn ($filter) => $filter['c'] === $column)
        )['v'] ?? '';
    }

    public function getData(): LengthAwarePaginator
    {
        $query = TableService::query(
            $this->getQuery(),
            $this->sorting,
            $this->filters,
        );

        if (empty($this->sorting['b'] ?? null)) {
            $default = $this->getDefaultSort();

            $query->orderBy($default['b'], $default['d']);
        }

        return $query->paginate($this->perPage)->onEachSide(2);
    }

    public function sort($key): void
    {
        if (($this->sorting['b'] ?? null) === $key) {
            $this->sorting['d'] = $this->sorting['d'] === 'asc' ? 'desc' : 'asc';

            return;
        }

        $this->sorting['b'] = $key;
        $this->sorting['d'] = 'asc';
    }

    public function filter(string $column, string $type, mixed $value): void
    {
        foreach ($this->filters as $key => $filter) {
            if ($filter['c'] == $column) {
                unset($this->filters[$key]);

                $this->filters = array_values($this->filters);
            }
        }

        if (is_array($value) ? count(array_filter($value)) : ! is_null($value) && $value !== '') {
            $this->filters[] = [
                'c' => $column,
                't' => $type,
                'v' => $value,
            ];
        }

        $this->gotoPage(1);
    }

    public function resetAll(): void
    {
        $this->filters = [];
        $this->perPage = 50;
        $this->sorting = [];

        $this->dispatch('resetTableFilters');

        $this->gotoPage(1);
    }

    public function exportCsv(): StreamedResponse
    {
        $fileName = str_replace('/', '_', parse_url(url()->previous(), PHP_URL_PATH))
            .now()->format('_d-m-Y_H-i-s');

        $query = TableService::query(
            $this->getQuery(),
            $this->sorting,
            $this->filters,
        );

        if (empty($this->sorting['b'] ?? null)) {
            $default = $this->getDefaultSort();

            $query->orderBy($default['b'], $default['d']);
        }

        $dataArr = $query->get()->toArray();

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=penny'.$fileName.'.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $columns = array_column($this->columns(), 'label');
        $columnKeys = array_column($this->columns(), 'key');

        $callback = function () use ($dataArr, $columns, $columnKeys) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($dataArr as $data) {
                $csvData = [];
                foreach ($columnKeys as $columnKeysData) {
                    $csvData[] = $data->{$columnKeysData};
                }

                fputcsv($file, $csvData);
            }

            fclose($file);
        };


        return Response::stream($callback, 200, $headers);
    }

    public function render()
    {
        return view('livewire.table')->extends('layouts.guest');
    }
}
