<?php

namespace App\Services\Table;

use App\Enums\Livewire\Table\FilterTypeEnum;
use DB;
use Illuminate\Database\Query\Builder;

class TableService
{
    public static function query($query, $sorting, $filters): Builder
    {
        if (! empty($filters)) {
            foreach ($filters as $filter) {
                $column = $filter['c'] ?? null;
                $value = $filter['v'] ?? null;
                $type = $filter['t'] ?? null;

                if (in_array(null, [$column, $value, $type], true)) {
                    continue;
                }

                switch ($type) {
                    case FilterTypeEnum::RANGE->value:
                    case FilterTypeEnum::DATE->value:
                        if (isset($value[0]) && isset($value[1])) {
                            $query->whereBetween($column, [$value[0], $value[1]]);
                        }
                        break;
                    case FilterTypeEnum::SELECT->value:
                        $query->where($column, '=', $value);
                        break;
                    default:
                        $filter['c'] = str_replace('`', '\'', $filter['c']);

                        $query->where(DB::raw("UPPER({$filter['c']})"), 'LIKE', '%'.strtoupper($filter['v']).'%');

                        break;
                }
            }
        }

        if (! empty($sorting['b'])) {
            $query->orderBy($sorting['b'], $sorting['d']);
        }

        return $query;
    }
}
