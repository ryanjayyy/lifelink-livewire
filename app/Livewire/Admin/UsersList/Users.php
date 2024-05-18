<?php

namespace App\Livewire\Admin\UsersList;

use App\Livewire\Table;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use App\Services\Table\Column;
use App\Enums\Livewire\Table\FilterTypeEnum;

use App\Models\User;
use App\Models\Sex;
use App\Models\BloodType;

class Users extends Table
{
    public $userCount;

    public function mount()
    {
        $this->userCount = User::count();
    }

    public function render()
    {
        return view('admin.pages.users-list')->extends('layouts.admin');
    }

    public function uniqueRowId(): string
    {
        return 'user_id';
    }

    public function getDefaultSort(): array
    {
        return ['b' => 'user_id', 'd' => 'DESC'];
    }

    public function getQuery(): Builder
    {
        $sub = User::query()
            ->select([
                'users.id as user_id',
                'users.id as click_id',
                'users.email as email',
                'users.mobile as mobile',
                'users.isDeferred as isDeferred',
                'sexes.sex as sex',
                'sexes.id as sex_id',
                DB::raw("CONCAT(member_details.first_name, ' ', member_details.middle_name, ' ', member_details.last_name) as full_name"),
                'member_details.dob as dob',
                'member_details.blood_type_id as blood_type_id',
                'blood_types.blood_type as blood_type',
                'member_details.donor_number as donor_number',
            ])
            ->leftJoin('member_details', 'users.id', '=', 'member_details.user_id')
            ->leftJoin('sexes', 'member_details.sex_id', '=', 'sexes.id')
            ->leftJoin('blood_types', 'member_details.blood_type_id', '=', 'blood_types.id')
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
        $sex = [];
        foreach (Sex::all() as $row) {
            $sex[$row->id] = [
                'id' => $row->id,
                'value' => $row->sex
            ];
        }

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
                'full_name',
                'full_name',
                'Name',
                FilterTypeEnum::STRING,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'email',
                'email',
                'Email',
                FilterTypeEnum::STRING,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
            Column::create(
                'mobile',
                'mobile',
                'Mobile',
                FilterTypeEnum::STRING,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),

            Column::create(
                'sex_id',
                'sex_id',
                'Sex',
                FilterTypeEnum::SELECT,
                'sex',
                function ($value) use ($sex) {
                    return !empty($value) ? $sex[$value]['value'] : '';
                }
            )->setFilterSelection($sex),

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

            Column::create('click_id', 'click_id', '', FilterTypeEnum::NONE, null, function ($value) {
                $user = User::where('id', $value)->first();
                $isDeferred = $user->isDeferred;
                $disabledClass = $isDeferred ? ' disabled btn-danger' : ' btn-primary';
                $iconClass = $isDeferred ? 'fa fa-ban ms-1' : 'fa fa-add ms-1';
                $disabledAttr = $isDeferred ? ' aria-disabled="true" tabindex="-1"' : '';

                return <<<HTML
                    <div class="d-flex justify-content-center gap-4">
                        <a wire:click="dispatchId({$value})" class="btn btn-primary text-white px-2"
                            data-bs-placement="bottom"
                            data-bs-toggle="modal"
                            data-bs-target="#user-edit-modal"
                            title="Edit">
                            <i class="fa fa-edit ms-1"></i>
                        </a>
                        <a wire:click="dispatchId({$value})" class="btn btn-primary text-white px-2"
                            data-bs-toggle="modal"
                            data-bs-target="#view-edit-modal"
                            data-bs-placement="bottom"
                            title="View">
                            <i class="fa fa-eye ms-1"></i>
                        </a>
                        <a wire:click="dispatchId({$value})" class="btn text-white px-2{$disabledClass}"
                            data-bs-toggle="modal"
                            data-bs-target="#add-blood-bag"
                            data-bs-placement="bottom"
                            title="Add Blood Bag"{$disabledAttr}>
                            <i class="{$iconClass}"></i>
                        </a>
                        <a wire:click="dispatchId({$value})"
                            class="btn btn-danger text-white px-3"
                            data-bs-toggle="modal"
                            data-bs-target="#move-to-deferral"
                            data-bs-placement="bottom"
                            title="Move to deferral">
                            <i class="ki-duotone ki-arrow-right-left">
                                <span class="path1"></span>
                                <span class="path2"></span>
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
