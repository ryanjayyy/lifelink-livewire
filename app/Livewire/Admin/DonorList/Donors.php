<?php

namespace App\Livewire\Admin\DonorList;

use App\Livewire\Table;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use App\Services\Table\Column;
use App\Enums\Livewire\Table\FilterTypeEnum;

use App\Models\User;
use App\Models\Sex;
use App\Models\BloodType;
use App\Models\DonorList;
use App\Models\BadgeType;
use App\Models\DonorType;

class Donors extends Table
{
    public $donorsCount;

    public function mount()
    {
        $this->donorsCount = User::where('isDonor', true)->count();
    }

    public function render()
    {
        return view('admin.pages.donors-list')->extends('layouts.admin');
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
        $sub = DonorList::query()
            ->select([
                'donor_lists.user_id as user_id',
                'donor_lists.user_id as click_id',
                'users.email as email',
                'users.mobile as mobile',
                'member_details.donor_number as donor_number',
                DB::raw("CONCAT(member_details.first_name, ' ', member_details.middle_name, ' ', member_details.last_name) as full_name"),
                'blood_types.blood_type as blood_type',
                'blood_types.id as blood_type_id',
                'donor_lists.donate_qty as donate_qty',
                'badge_types.type as badge_type',
                'badge_types.id as badge_type_id',
                'donor_types.type as donor_type',
                'donor_types.id as donor_type_id',
                'sexes.sex as sex',
                'sexes.id as sex_id',
            ])
            ->leftJoin('users', 'users.id', '=', 'donor_lists.user_id')
            ->leftJoin('member_details', 'users.id', '=', 'member_details.user_id')
            ->leftJoin('blood_types', 'blood_types.id', '=', 'member_details.blood_type_id')
            ->leftJoin('badge_types', 'badge_types.id', '=', 'donor_lists.badge_type_id')
            ->leftJoin('donor_types', 'donor_types.id', '=', 'donor_lists.donor_type_id')
            ->join('sexes', 'sexes.id', '=', 'member_details.sex_id')
            ->where('users.isDonor', true)
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

        $badgeType = [];
        foreach( BadgeType::all() as $row) {
            $badgeType[$row->id] = [
                'id' => $row->id,
                'value' => $row->type
            ];
        }

        $donorType = [];
        foreach( DonorType::all() as $row) {
            $donorType[$row->id] = [
                'id' => $row->id,
                'value' => $row->type
            ];
        }

        $sex = [];
        foreach (Sex::all() as $row) {
            $sex[$row->id] = [
                'id' => $row->id,
                'value' => $row->sex
            ];
        }
        return [
            Column::create(
                'donor_number',
                'Donor Number',
                'Donor Number',
                FilterTypeEnum::STRING,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),

            Column::create(
                'full_name',
                'Full Name',
                'Name',
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
                'email',
                'Email',
                'Email',
                FilterTypeEnum::STRING,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),

            Column::create(
                'mobile',
                'Mobile',
                'Mobile',
                FilterTypeEnum::STRING,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),

            Column::create(
                'donate_qty',
                'donate_qty',
                'Donate Quantity',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),

            Column::create(
                'badge_type_id',
                'badge_type_id',
                'Badge Type',
                FilterTypeEnum::SELECT,
                'badge_type',
                function ($value) use ($badgeType) {
                    return !empty($value) ? $badgeType[$value]['value'] : '';
                }
            )->setFilterSelection($badgeType),

            Column::create(
                'donor_type_id',
                'donor_type_id',
                'Donor Type',
                FilterTypeEnum::SELECT,
                'donor_type',
                function ($value) use ($donorType) {
                    return !empty($value) ? $donorType[$value]['value'] : '';
                }
            )->setFilterSelection($donorType),

            Column::create('click_id', 'click_id', '', FilterTypeEnum::NONE, null, function ($value) {
                $user = User::where('id', $value)->first();
                $isDeferred = $user->isDeferred;
                $disabledClass = $isDeferred ? ' disabled btn-danger' : ' btn-primary';
                $iconClass = $isDeferred ? 'fa fa-ban ms-1' : 'fa fa-add ms-1';
                $disabledAttr = $isDeferred ? ' aria-disabled="true" tabindex="-1"' : '';

                return <<<HTML
                    <div class="d-flex justify-content-center gap-4">
                        <a wire:click="dispatchId({$value})" class="btn btn-primary text-white px-2"
                            data-bs-toggle="modal"
                            data-bs-target="#view-donor-modal"
                            data-bs-placement="bottom"
                            title="View">
                            <i class="fa fa-eye ms-1"></i>
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
