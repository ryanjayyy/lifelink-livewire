<?php

namespace App\Livewire\Admin\DisposeBloodBags;

use App\Livewire\Table;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use App\Services\Table\Column;
use App\Enums\Livewire\Table\FilterTypeEnum;

use App\Models\DisposedBloodBag;
use App\Models\BloodType;
use App\Models\DisposeClassification;

class BagList extends Table
{
    public $disposeCount;

    public function mount()
    {
        $this->disposeCount = DisposedBloodBag::where('status', true)->count();
    }

    public function render()
    {
        return view('admin.pages.dispose-blood-bag')->extends('layouts.admin');
    }

    public function uniqueRowId(): string
    {
        return 'dispose_blood_bag_id';
    }

    public function getDefaultSort(): array
    {
        return ['b' => 'dispose_blood_bag_id', 'd' => 'DESC'];
    }

    public function getQuery(): Builder
    {
        $sub = DisposedBloodBag::query()
            ->select([
                'disposed_blood_bags.id as dispose_blood_bag_id',
                'disposed_blood_bags.id as click_id',
                'blood_bags.serial_no as serial_no',
                'member_details.donor_number as donor_number',
                'member_details.blood_type_id as blood_type_id',
                'blood_types.blood_type as blood_type',
                'blood_bags.date_donated as date_donated',
                'blood_bags.expiration_date as expiration_date',
                'disposed_blood_bags.disposed_date as disposed_date',
                'disposed_blood_bags.dispose_classification_id as dispose_classification_id',
                'dispose_classifications.name as dispose_classification'
            ])
            ->leftJoin('blood_bags', 'blood_bags.id', '=', 'disposed_blood_bags.blood_bag_id')
            ->leftJoin('member_details', 'member_details.user_id', '=', 'blood_bags.user_id')
            ->leftJoin('blood_types', 'blood_types.id', '=', 'member_details.blood_type_id')
            ->leftJoin('dispose_classifications','dispose_classifications.id', '=', 'disposed_blood_bags.dispose_classification_id')
            ->where('disposed_blood_bags.status', true)
            ->limit(500);



        return DB::table(DB::raw('(' . $sub->toSql() . ') as customer_list'))
            ->mergeBindings($sub->getQuery())
            ->select('*');
    }
    public function canExport(): bool
    {
        return false;
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
        $disposeClassification = [];
        foreach (DisposeClassification::all() as $row){
            $disposeClassification[$row->id] = [
                'id' => $row->id,
                'value' => $row->name
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
                FilterTypeEnum::DATE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'expiration_date',
                'expiration_date',
                'Expiration Date',
                FilterTypeEnum::DATE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),

            Column::create(
                'disposed_date',
                'disposed_date',
                'Disposed Date',
                FilterTypeEnum::DATE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),

            Column::create(
                'dispose_classification_id',
                'dispose_classification_id',
                'Dispose Classification',
                FilterTypeEnum::SELECT,
                'dispose_classification',
                function ($value) use ($disposeClassification) {
                    return !empty($value) ? $disposeClassification[$value]['value'] : '';
                }
            )->setFilterSelection($disposeClassification),

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
