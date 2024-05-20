<?php

namespace App\Livewire\Admin\DispenseList;

use App\Models\BloodBag;
use Livewire\Component;
use Livewire\Attributes\On;
use Carbon\Carbon;

use App\Models\PatientDetail;
use App\Models\DispenseList;


class ViewPatient extends Component
{
    public $patient;
    public $age;
    public $bloodBag;
    public $dispenseDate;

    public function render()
    {
        return view('admin.partials.dispense.view-modal');
    }

    #[On('openModal')]
    public function viewPatient($patient_details_id)
    {
        $this->patient = PatientDetail::where('patient_details.id', $patient_details_id)
        ->leftJoin('blood_types', 'blood_types.id', 'patient_details.blood_type_id')
        ->leftJoin('sexes', 'sexes.id', 'patient_details.sex_id')
        ->leftJoin('hospitals', 'hospitals.id', 'patient_details.hospital_id')
        ->first();

        // Calculate the age
        if ($this->patient && $this->patient->dob) {
            $this->age = $this->calculateAge($this->patient->dob);
        } else {
            $this->age = null;
        }

        $bloodbag = DispenseList::where('patient_details_id', $patient_details_id)->first(); //change get if multiple
        $bagId = $bloodbag->blood_bag_id;
        $this->dispenseDate = $bloodbag->created_at;
        $this->bloodBag = BloodBag::where('id', $bagId)->first();
    }

    public function calculateAge($dob)
    {
        return Carbon::parse($dob)->age;
    }
}

