<?php

namespace App\Livewire\Admin\Inventory;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BloodBag;
use App\Models\Hospital;
use App\Models\DispenseList;
use App\Models\MemberDetail;
use App\Models\PatientDetail;

class DispenseBlood extends Component
{
    public $selectedIds;
    public $bagId;
    public $bloodBags = [];
    public $searchUserName;
    public $userList;
    public $fastFill;

    public $first_name;
    public $middle_name;
    public $last_name;
    public $dob;
    public $sex;
    public $blood_type;
    public $diagnosis;
    public $hospital;

    public $hospitalList;

    public function mount()
    {
        $this->hospitalList = Hospital::all();
    }
    public function render()
    {
        return view('admin.partials.inventory.dispense-blood-modal');
    }


    // #[On('openModal')]
    // public function dispenseModal($bag_id)
    // {
    //     $this->bagId = $bag_id;
    //     $this->bloodBag = BloodBag::where('blood_bags.id', $bag_id)
    //         ->leftJoin('member_details', 'blood_bags.user_id', '=', 'member_details.user_id')
    //         ->leftJoin('blood_types', 'blood_types.id', '=', 'member_details.blood_type_id')
    //         ->select('blood_bags.*', 'member_details.donor_number','member_details.first_name', 'member_details.middle_name','member_details.last_name','blood_types.blood_type')
    //         ->first();

    // }

    #[On('dispenseBloodBags')]
    public function setSelectedIds($ids)
    {
        $this->selectedIds = $ids;
        foreach ($ids as $id) {
            $this->bloodBags[] = BloodBag::where('blood_bags.id', $id)
                ->leftJoin('member_details', 'blood_bags.user_id', '=', 'member_details.user_id')
                ->leftJoin('blood_types', 'blood_types.id', '=', 'member_details.blood_type_id')
                ->select('blood_bags.*', 'member_details.donor_number', 'member_details.first_name', 'member_details.middle_name', 'member_details.last_name', 'blood_types.blood_type')
                ->first();
        }
    }


    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required',
            'middle_name.required' => 'Middle name is required',
            'last_name.required' => 'Last name is required',
            'dob.required' => 'Date of birth is required',
            'sex.required' => 'Sex is required',
            'blood_type.required' => 'Blood type is required',
            'diagnosis.required' => 'Diagnosis is required',
            'hospital.required' => 'Hospital is required',

        ];
    }


    public function dispense()
    {
        $this->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'sex' => 'required',
            'blood_type' => 'required',
            'diagnosis' => 'required',
            'hospital' => 'required',
        ]);

        $patient = PatientDetail::create([
            'first_name' => ucwords($this->first_name),
            'middle_name' => ucwords($this->middle_name),
            'last_name' => ucwords($this->last_name),
            'dob' => $this->dob,
            'sex_id' => $this->sex,
            'blood_type_id' => $this->blood_type,
            'diagnosis' => ucwords($this->diagnosis),
            'hospital_id' => $this->hospital
        ]);

        foreach ($this->selectedIds as $id) {
            BloodBag::where('blood_bags.id', $id)->update([
                'isUsed' => 1
            ]);

            DispenseList::create([
                'blood_bag_id' => $id,
                'patient_details_id' => $patient->id
            ]);
        }

        $this->reset('first_name', 'middle_name', 'last_name', 'dob', 'sex', 'blood_type', 'diagnosis', 'hospital');
        dd("saved");
    }

    public function searchInput()
    {

        $this->userList = MemberDetail::where('first_name', 'like', '%' . $this->searchUserName . '%')
            ->orWhere('last_name', 'like', '%' . $this->searchUserName . '%')
            ->get();
    }

    public function selectUser($user_id)
    {
        // $this->searchUserName = $id;
        $this->fastFill = MemberDetail::where('user_id', $user_id)->first();

        $this->first_name = $this->fastFill->first_name;
        $this->middle_name = $this->fastFill->middle_name;
        $this->last_name = $this->fastFill->last_name;
        $this->dob = $this->fastFill->dob;
        $this->sex = $this->fastFill->sex_id;
        $this->blood_type = $this->fastFill->blood_type_id;
    }
}
