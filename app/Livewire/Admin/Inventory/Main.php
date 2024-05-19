<?php

namespace App\Livewire\Admin\Inventory;

use App\Livewire\Table;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use App\Services\Table\Column;
use App\Enums\Livewire\Table\FilterTypeEnum;
use Carbon\Carbon;

use App\Models\BloodBag;
use App\Models\BloodType;

class Main extends Table
{
    public function render()
    {
        return view('admin.pages.inventory')->extends('layouts.admin');
    }

    public function uniqueRowId(): string
    {
        return 'user_id';
    }

    public function getDefaultSort(): array
    {
        return ['b' => 'user_id', 'd' => 'DESC'];
    }

    public function canExport(): bool
    {
        return false;
    }

    public function getQuery(): Builder
    {
        $sub = BloodBag::query()
            ->select([
                'blood_bags.id as user_id',
                'blood_bags.id as click_id',
                'blood_bags.serial_no as serial_no',
                'blood_bags.date_donated as date_donated',
                'blood_bags.expiration_date as expiration_date',
                'blood_bags.bled_by_id as bled_by_id',
                'member_details.donor_number as donor_number',
                'member_details.blood_type_id as blood_type_id',
                'blood_types.blood_type as blood_type',
                DB::raw('DATEDIFF(blood_bags.expiration_date, NOW()) as remaining_days'),
                DB::raw('
                    CASE
                        WHEN DATEDIFF(blood_bags.expiration_date, NOW()) <= 7 THEN "High Priority"
                        WHEN DATEDIFF(blood_bags.expiration_date, NOW()) <= 14 THEN "Medium Priority"
                        ELSE "Low Priority"
                    END as priority
                ')
            ])
            ->leftJoin('venues', 'venues.id', '=', 'blood_bags.venue_id')
            ->leftJoin('bled_by', 'bled_by.id', '=', 'blood_bags.bled_by_id')
            ->leftJoin('member_details', 'blood_bags.user_id', '=', 'member_details.user_id')
            ->leftJoin('blood_types', 'member_details.blood_type_id', '=', 'blood_types.id')
            ->where('blood_bags.isCollected', '=', 1)
            ->where('blood_bags.isStored', '=', 1)
            ->where('blood_bags.isUsed', '=', 0)
            ->where('blood_bags.isExpired', '=', 0)
            ->where('blood_bags.isDisposed', '=', 0)
            ->where('blood_bags.isUnsafe', '=', 0)
            ->limit(500);

        return DB::table(DB::raw('(' . $sub->toSql() . ') as customer_list'))
            ->mergeBindings($sub->getQuery())
            ->orderBy('remaining_days', 'asc')
            ->select('*');
    }

    #[Computed]
    public function columns(): array
    {
        $bloodType = [];
        foreach (BloodType::all() as $row) {
            $bloodType[$row->id] = [
                'id' => $row->id,
                'value' => $row->blood_type
            ];
        }

        return [
            Column::create(
                'donor_number',
                'donor_number',
                'Donor Number',
                FilterTypeEnum::STRING,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'serial_no',
                'serial_no',
                'Serial Number',
                FilterTypeEnum::STRING,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'blood_type_id',
                'blood_type_id',
                'Blood Type',
                FilterTypeEnum::SELECT,
                'blood_type',
                function ($value) use ($bloodType) {
                    return !empty($value) ? $bloodType[$value]['value'] : '';
                }
            )->setFilterSelection($bloodType),
            Column::create(
                'date_donated',
                'date_donated',
                'Date Donated',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'expiration_date',
                'expiration_date',
                'Expiration Date',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'remaining_days',
                'remaining_days',
                'Remaining Days',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value} days</a>";
                }
            ),
            Column::create(
                'priority',
                'priority',
                'Priority',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    $class = '';
                    if ($value == 'High Priority') {
                        $class = 'badge badge-danger';
                    } elseif ($value == 'Medium Priority') {
                        $class = 'badge badge-warning';
                    } else {
                        $class = 'badge badge-success';
                    }
                    return "<span class='{$class}'>{$value}</span>";
                }
            ),
            Column::create('click_id', 'click_id', '', FilterTypeEnum::NONE, null, function ($value) {
                $bag = BloodBag::where('id', $value)->first();

                return <<<HTML
                <div class="d-flex justify-content-center gap-4">

                    <a wire:click="dispatchId({$value})" class="btn btn-primary text-white px-2"
                        data-bs-toggle="modal"
                        data-bs-target="#undo-modal"
                        data-bs-placement="bottom"
                        title="Undo">
                        <i class="ki-duotone ki-eraser ms-1 fs-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        </i>
                    </a>

                    <a wire:click="dispatchId({$value})"
                        class="btn btn-primary text-white px-3"
                        data-bs-toggle="modal"
                        data-bs-target="#dispense-modal"
                        data-bs-placement="bottom"
                        title="Dispense">
                        <i class="ki-duotone ki-courier ms-1 fs-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        </i>
                    </a>
                </div>
            HTML;
            }),
        ];
    }

    public function dispatchId($user_id)
    {
        $this->dispatch('openModal', $user_id);
    }
}
