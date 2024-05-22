<?php

namespace App\Livewire\Admin\AuditTrail;

use App\Livewire\Table;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use App\Services\Table\Column;
use App\Enums\Livewire\Table\FilterTypeEnum;

use App\Models\AuditTrail;
use App\Models\ModuleCategory;

class Log extends Table
{
    public function render()
    {
        return view('admin.pages.audit-trail')->extends('layouts.admin');
    }

    public function uniqueRowId(): string
    {
        return 'audit_trail_id';
    }

    public function getDefaultSort(): array
    {
        return ['b' => 'audit_trail_id', 'd' => 'DESC'];
    }

    public function getQuery(): Builder
    {
        $sub = AuditTrail::query()
            ->select([
                'audit_trails.id as audit_trail_id',
                'audit_trails.id as click_id',
                'audit_trails.user_id as user_id',
                'audit_trails.module_category_id as module_category_id',
                'audit_trails.action as action',
                'audit_trails.status as status',
                'audit_trails.ip_address as ip_address',
                'audit_trails.region as region',
                'audit_trails.city as city',
                'audit_trails.postal as postal',
                'audit_trails.created_at as datetime',
            ])
            ->leftJoin('module_categories', 'module_categories.id', '=', 'audit_trails.module_category_id')
            ->limit(500);


        return DB::table(DB::raw('(' . $sub->toSql() . ') as customer_list'))
            ->mergeBindings($sub->getQuery())
            ->select('*');
    }

    public function canExport(): bool
    {
        return true;
    }

    #[Computed]
    public function columns(): array
    {
        $moduleCategory = [];
        foreach (ModuleCategory::all() as $row) {
            $moduleCategory[$row->id] = [
                'id' => $row->id,
                'value' => $row->name,
            ];
        }

        return [
            Column::create(
                'audit_trail_id',
                'audit_trail_id',
                'Log ID',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'user_id',
                'user_id',
                'User ID',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'module_category_id',
                'module_category_id',
                'Module Category',
                FilterTypeEnum::SELECT,
                'module_category',
                function ($value) use ($moduleCategory) {
                    return !empty($value) ? $moduleCategory[$value]['value'] : '';
                }
            )->setFilterSelection($moduleCategory),
            Column::create(
                'action',
                'action',
                'Action',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'status',
                'status',
                'Status',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'ip_address',
                'ip_address',
                'IP Address',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'region',
                'region',
                'Region',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'city',
                'city',
                'City',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'postal',
                'postal',
                'Postal',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'datetime',
                'datetime',
                'Datetime',
                FilterTypeEnum::DATE,
                null,
                function ($value) {
                    $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value);
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$date->format('F d, Y \\a\\t g:i A')}</a>";
                }
            ),
        ];
    }
}
