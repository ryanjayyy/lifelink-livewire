<?php

namespace App\Livewire\Admin\Inventory;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BloodBag;
use App\Models\Hospital;
use App\Models\DispenseList;

class DispenseBlood extends Component
{
    public $bagId;
    public $bloodBag;
    public $searchUser;

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


    #[On('openModal')]
    public function dispenseModal($bag_id)
    {
        $this->bagId = $bag_id;
        $this->bloodBag = BloodBag::where('blood_bags.id', $bag_id)
            ->leftJoin('member_details', 'blood_bags.user_id', '=', 'member_details.user_id')
            ->leftJoin('blood_types', 'blood_types.id', '=', 'member_details.blood_type_id')
            ->select('blood_bags.*', 'member_details.donor_number','member_details.first_name', 'member_details.middle_name','member_details.last_name','blood_types.blood_type')
            ->first();

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

        BloodBag::where('blood_bags.id', $this->bagId)->update([
            'isUsed' => 1
        ]);

        DispenseList::create([
            'blood_bag_id' => $this->bagId,
            'first_name' => ucwords($this->first_name),
            'middle_name' => ucwords($this->middle_name),
            'last_name' => ucwords($this->last_name),
            'dob' => $this->dob,
            'sex_id' => $this->sex,
            'blood_type_id' => $this->blood_type,
            'diagnosis' => ucwords($this->diagnosis),
            'hospital_id' => $this->hospital
        ]);

        dd("saved");
    }
}
