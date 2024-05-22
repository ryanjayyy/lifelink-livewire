<?php

namespace App\Livewire\Admin\BloodBagList;

use App\Livewire\Table;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use App\Services\Table\Column;
use App\Enums\Livewire\Table\FilterTypeEnum;

use App\Models\BledBy;
use App\Models\BloodBag;
use App\Models\BloodType;
use App\Models\Venue;

class BloodBags extends Table
{
    public $selectedIds = [];
    public $showButton = false;

    public function render()
    {
        return view('admin.pages.blood-bag-list')->extends('layouts.admin');
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
                'blood_bags.venue_id as venue_id',
                'blood_bags.isTested as isTested',
                'venues.name as venue',
                'blood_bags.bled_by_id as bled_by_id',
                DB::raw("CONCAT(bled_by.first_name, ' ', bled_by.middle_name, ' ', bled_by.last_name) as bled_by"),
                'member_details.donor_number as donor_number',
                DB::raw("CONCAT(member_details.first_name, ' ', member_details.middle_name, ' ', member_details.last_name) as full_name"),
                'member_details.blood_type_id as blood_type_id',
                'blood_types.blood_type as blood_type',
            ])
            ->leftJoin('venues', 'venues.id', '=', 'blood_bags.venue_id')
            ->leftJoin('bled_by', 'bled_by.id', '=', 'blood_bags.bled_by_id')
            ->leftJoin('member_details', 'blood_bags.user_id', '=', 'member_details.user_id',)
            ->leftJoin('blood_types', 'member_details.blood_type_id', '=', 'blood_types.id')
            ->where('blood_bags.isCollected', '=', 1)
            ->where('blood_bags.isStored', '=', 0)
            ->where('blood_bags.isExpired', '=', 0)
            ->where('blood_bags.isDisposed', '=', 0)
            ->where('blood_bags.isUnsafe', '=', 0)
            ->limit(500);


        return DB::table(DB::raw('(' . $sub->toSql() . ') as customer_list'))
            ->mergeBindings($sub->getQuery())
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

        $venue = [];
        foreach (Venue::all() as $row) {
            $venue[$row->id] = [
                'id' => $row->id,
                'value' => $row->name
            ];
        }

        $bledby = [];
        foreach (BledBy::all() as $row) {
            $bledby[$row->id] = [
                'id' => $row->id,
                'value' => $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name
            ];
        }
        return [
            Column::create(
                'click_id',
                'click_id',
                '',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    $bag = BloodBag::where('id', $value)->first();
                    $isTested = $bag->isTested;
                    $disabledToStock = $isTested ? '' : ' disabled';

                    return '<div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="' . $value . '" wire:click="toggleSelectedId(' . $value . ')" ' . $disabledToStock . '>
                            </div>';
                }
            ),

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
                'venue_id',
                'venue_id',
                'Venue',
                FilterTypeEnum::SELECT,
                'venue',
                function ($value) use ($venue) {
                    return !empty($value) ? $venue[$value]['value'] : '';
                }
            )->setFilterSelection($venue),

            Column::create(
                'bled_by_id',
                'bled_by_id',
                'Bled By',
                FilterTypeEnum::SELECT,
                'bled_by',
                function ($value) use ($bledby) {
                    return !empty($value) ? $bledby[$value]['value'] : '';
                }
            )->setFilterSelection($bledby),

            Column::create(
                'isTested',
                'isTested',
                'Is Tested',
                FilterTypeEnum::NONE,
                null,
                function ($value) {
                    return $value == 0 ? '<span class="text-gray-800 text-hover-primary fw-bold">No</span>' : '<span class="text-gray-800 text-hover-primary fw-bold">Yes</span>';
                }
            ),

            Column::create('click_id', 'click_id', '', FilterTypeEnum::NONE, null, function ($value) {
                $bag = BloodBag::where('id', $value)->first();
                $isTested = $bag->isTested;
                $disabledClass = $isTested ? ' disabled btn-danger' : ' btn-primary';
                $disabledToStock = $isTested ? ' btn-primary' : ' disabled btn-danger';
                $disabledUnsafe = $isTested ? ' btn-danger' : ' disabled btn-danger';

                return <<<HTML
                    <div class="d-flex justify-content-center gap-4">
                        <a wire:click="dispatchId({$value})" class="btn btn-primary text-white px-2"
                            data-bs-placement="bottom"
                            data-bs-toggle="modal"
                            data-bs-target="#blood-bag-edit-modal"
                            title="Edit">
                            <i class="fa fa-edit ms-1 fs-4"></i>
                        </a>
                        <a wire:click="dispatchId({$value})" class="btn btn-primary text-white px-2{$disabledClass}"
                            data-bs-toggle="modal"
                            data-bs-target="#blood-bag-remove-modal"
                            data-bs-placement="bottom"
                            title="Undo">
                            <i class="ki-duotone ki-eraser ms-1 fs-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            </i>
                        </a>
                        <a wire:click="dispatchId({$value})" class="btn btn-primary text-white px-2{$disabledClass}"
                            data-bs-toggle="modal"
                            data-bs-target="#blood-bag-laboratory-modal"
                            data-bs-placement="bottom"
                            title="Refer to Laboratory">
                            <i class="ki-duotone ki-flask ms-1 fs-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            </i>
                        </a>
                        <!-- <a wire:click="dispatchId({$value})"
                            class="btn btn-primary text-white px-3{$disabledToStock}"
                            data-bs-toggle="modal"
                            data-bs-target="#blood-bag-move-to-stock-modal"
                            data-bs-placement="bottom"
                            title="Move to sotck">
                            <i class="ki-duotone ki-courier ms-1 fs-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            </i>
                        </a> -->
                        <a wire:click="dispatchId({$value})"
                            class="btn btn-danger text-white px-3{$disabledUnsafe}"
                            data-bs-toggle="modal"
                            data-bs-target="#blood-bag-mark-unsafe-modal"
                            data-bs-placement="bottom"
                            title="Mark unsafe">
                            <i class="ki-duotone ki-cross-circle ms-1 fs-4">
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

    public function toggleSelectedId($id)
    {

        // Check if the ID exists in the array
        $index = array_search($id, $this->selectedIds);

        if ($index !== false) {
            // If ID exists, remove it from the array
            unset($this->selectedIds[$index]);
            $this->selectedIds = array_values($this->selectedIds);
        } else {
            // If ID doesn't exist, add it to the array
            $this->selectedIds[] = $id;
        }

    }

    public function bulkMove()
    {
        $this->dispatch('moveSelectedBloodBags', $this->selectedIds);
    }

}
