<?php

namespace App\Livewire\Admin\Inventory;

use App\Livewire\Table;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use App\Services\Table\Column;
use App\Enums\Livewire\Table\FilterTypeEnum;

use App\Models\BloodType;
use App\Models\UnsafeBloodBags;

class ReactiveBloodBag extends Table
{

    public $reactiveCount;
    public function mount()
    {
        $this->reactiveCount = UnsafeBloodBags::where('reason_id', 1)->count();
    }
    public function render()
    {
        return view('admin.pages.inventory.reactive')->extends('layouts.admin');
    }
    public function uniqueRowId(): string
    {
        return 'blood_bag_id';
    }
    public function getDefaultSort(): array
    {
        return ['b' => 'blood_bag_id', 'd' => 'DESC'];
    }
    public function canExport(): bool
    {
        return false;
    }
    public function getQuery(): Builder
    {
        $sub = UnsafeBloodBags::query()
            ->select([
                'blood_bags.id as blood_bag_id',
                'blood_bags.id as click_id',
                'blood_bags.serial_no as serial_no',
                'blood_bags.date_donated as date_donated',
                'blood_bags.expiration_date as expiration_date',
                'blood_bags.bled_by_id as bled_by_id',
                'member_details.donor_number as donor_number',
                'member_details.blood_type_id as blood_type_id',
                'blood_types.blood_type as blood_type',
                'unsafe_blood_bags.remarks as remarks',
                'unsafe_reasons.reason as reason',
            ])
            ->leftJoin('blood_bags', 'blood_bags.id', '=', 'unsafe_blood_bags.blood_bag_id')
            ->leftJoin('member_details', 'blood_bags.user_id', '=', 'member_details.user_id')
            ->leftJoin('blood_types', 'member_details.blood_type_id', '=', 'blood_types.id')
            ->leftJoin('unsafe_reasons', 'unsafe_blood_bags.reason_id', '=', 'unsafe_reasons.id')
            ->where('blood_bags.isDisposed', false)
            ->where('blood_bags.isUnsafe', true)
            ->where('unsafe_blood_bags.reason_id', 1)
            ->limit(500);

        return DB::table(DB::raw('(' . $sub->toSql() . ') as customer_list'))
            ->mergeBindings($sub->getQuery())
            ->orderBy('expiration_date', 'asc')
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
                'reason',
                'reason',
                'Reason',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'remarks',
                'remarks',
                'Remarks',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create('click_id', 'click_id', '', FilterTypeEnum::NONE, null, function ($value) {

                return <<<HTML
                <div class="d-flex justify-content-center gap-4">

                    <a wire:click="dispatchId({$value})" class="btn btn-danger text-white px-2"
                        data-bs-toggle="modal"
                        data-bs-target="#disposed-modal"
                        data-bs-placement="bottom"
                        title="Dispose">
                        <i class="ki-duotone ki-trash ms-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
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
