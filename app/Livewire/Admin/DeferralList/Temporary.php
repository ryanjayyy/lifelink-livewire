<?php

namespace App\Livewire\Admin\DeferralList;

use App\Livewire\Table;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use App\Services\Table\Column;
use App\Enums\Livewire\Table\FilterTypeEnum;

use App\Models\DeferralList;
use App\Models\Sex;
use App\Models\BloodType;
use App\Models\DeferralCategory;

class Temporary extends Table
{
    public $deferralCount;

    public function mount()
    {
        $this->deferralCount = DeferralList::where('deferral_type_id', 1)->where('status', true)->count();
    }

    public function render()
    {
        return view('admin.pages.deferrals.temporary')->extends('layouts.admin');
    }

    public function uniqueRowId(): string
    {
        return 'deferral_id';
    }

    public function getDefaultSort(): array
    {
        return ['b' => 'deferral_id', 'd' => 'DESC'];
    }

    public function getQuery(): Builder
    {
        $sub = DeferralList::query()
            ->select([
                'deferral_lists.id as deferral_id',
                'deferral_lists.id as click_id',
                'users.email as email',
                'users.mobile as mobile',
                'member_details.donor_number as donor_number',
                DB::raw("CONCAT(member_details.first_name, ' ', member_details.middle_name, ' ', member_details.last_name) as full_name"),
                'blood_types.blood_type as blood_type',
                'blood_types.id as blood_type_id',
                'sexes.sex as sex',
                'sexes.id as sex_id',
                'deferral_lists.date_deffered as date_deffered',
                'deferral_lists.deferral_duration as deferral_duration',
                'deferral_lists.end_date as end_date',
                'deferral_lists.deferral_category_id as deferral_category_id',
                'deferral_lists.other_reason as other_reason',
                'deferral_categories.category as deferral_category',
            ])
            ->leftJoin('deferral_categories', 'deferral_categories.id', '=', 'deferral_lists.deferral_category_id')
            ->leftJoin('users', 'users.id', '=', 'deferral_lists.user_id')
            ->leftJoin('member_details', 'users.id', '=', 'member_details.user_id')
            ->leftJoin('blood_types', 'blood_types.id', '=', 'member_details.blood_type_id')
            ->join('sexes', 'sexes.id', '=', 'member_details.sex_id')
            ->where('deferral_lists.status', true)
            ->where('deferral_lists.deferral_type_id', 1)

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

        $sex = [];
        foreach (Sex::all() as $row) {
            $sex[$row->id] = [
                'id' => $row->id,
                'value' => $row->sex
            ];
        }

        $deferralCategory = [];
        foreach (DeferralCategory::where('deferral_type_id',1)->get() as $row) {
            $deferralCategory[$row->id] = [
                'id' => $row->id,
                'value' => $row->category
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
                'Full Name',
                FilterTypeEnum::STRING,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),

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
                'deferral_category_id',
                'deferral_category_id',
                'Deferral Category',
                FilterTypeEnum::SELECT,
                'deferral_category',
                function ($value) use ($deferralCategory) {
                    return !empty($value) ? $deferralCategory[$value]['value'] : '';
                }
            )->setFilterSelection($deferralCategory),

            Column::create(
                'other_reason',
                'other_reason',
                'Other Reason',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return !is_null($value) ? "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>" : 'N/A';
                }
            ),

            Column::create(
                'date_deffered',
                'Date Deffered',
                'Date Deffered',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),

            Column::create(
                'deferral_duration',
                'Deferral Duration',
                'Deferral Duration',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),

            Column::create(
                'end_date',
                'End Date',
                'End Date',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return "<a class='text-gray-800 text-hover-primary fw-bold'>{$value}</a>";
                }
            ),
        ];
    }
}
