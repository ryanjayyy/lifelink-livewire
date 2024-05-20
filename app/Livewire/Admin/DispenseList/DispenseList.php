<?php

namespace App\Livewire\Admin\DispenseList;

use App\Livewire\Table;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use App\Services\Table\Column;
use App\Enums\Livewire\Table\FilterTypeEnum;

use App\Models\BloodType;
use App\Models\Hospital;
use App\Models\PatientDetail;
use App\Models\Sex;

class DispenseList extends Table
{
    public function render()
    {
        return view('admin.pages.dispense.list')->extends('layouts.admin');
    }

    public function uniqueRowId(): string
    {
        return 'patient_detail_id';
    }
    public function getDefaultSort(): array
    {
        return ['b' => 'patient_detail_id', 'd' => 'DESC'];
    }
    public function getQuery(): Builder
    {
        $sub = PatientDetail::query()
            ->select([
                'patient_details.id as patient_detail_id',
                'patient_details.id as click_id',
                DB::raw("CONCAT(patient_details.first_name, ' ', patient_details.middle_name, ' ', patient_details.last_name) as full_name"),
                'patient_details.blood_type_id as blood_type_id',
                'patient_details.sex_id as sex_id',
                'sexes.sex as sex',
                'blood_types.blood_type as blood_type',
                'patient_details.diagnosis as diagnosis',
                'patient_details.hospital_id as hospital_id',
                'hospitals.name as hospital',
                'patient_details.created_at as created_at',
            ])
            ->leftJoin('hospitals', 'hospitals.id', '=', 'patient_details.hospital_id')
            ->leftJoin('blood_types', 'blood_types.id', '=', 'patient_details.blood_type_id')
            ->leftJoin('sexes', 'sexes.id', '=', 'patient_details.sex_id')
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

        $hospital = [];
        foreach (Hospital::all() as $row) {
            $hospital[$row->id] = [
                'id' => $row->id,
                'value' => $row->name
            ];
        }

        return [

            Column::create(
                'created_at',
                'created_at',
                'Dispense Date and Time',
                FilterTypeEnum::DATE,
                null,
                function ($value) {
                    return date('F j, Y g:i A', strtotime($value));
                }
            ),

            Column::create(
                'full_name',
                'full_name',
                'Patient Name',
                FilterTypeEnum::NONE,
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
                'hospital_id',
                'hospital_id',
                'Hospital',
                FilterTypeEnum::SELECT,
                'hospital',
                function ($value) use ($hospital) {
                    return !empty($value) ? $hospital[$value]['value'] : '';
                }
            )->setFilterSelection($hospital),

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

            Column::create('click_id', 'click_id', '', FilterTypeEnum::NONE, null, function ($value) {
                return <<<HTML
                    <div class="d-flex justify-content-center gap-4">
                        <a wire:click="dispatchId({$value})" class="btn btn-primary text-white px-2"
                            data-bs-toggle="modal"
                            data-bs-target="#view-patient-modal"
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
