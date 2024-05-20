<?php

namespace App\Livewire\Admin\DispenseList;

use Livewire\Component;
use Carbon\Carbon;

use App\Models\BloodBag;
use App\Models\DispenseList;
use App\Models\MemberDetail;
use App\Models\PatientDetail;


class BloodFinder extends Component
{
    public $searchSerial;
    public $serialNumberList;
    public $patientDetails;
    public $donorDetails;
    public $patientAge;

    public function mount()
    {
        $this->serialNumberList = BloodBag::where('isUsed', true)->select('serial_no')->get();
    }

    public function render()
    {
        return view('admin.pages.dispense.blood-finder')->extends('layouts.admin');
    }

    public function serialInput()
    {
        $this->findSerial($this->searchSerial);
        if ($this->searchSerial == '')
        {
            $this->patientDetails = null;
        }
    }

    public function findSerial($serialNo)
    {
        $this->searchSerial = $serialNo;
        $bloodBag = BloodBag::where('serial_no', $this->searchSerial)->where('isUsed', true)->first();
        if ($bloodBag) {
            $serial = $bloodBag ? $bloodBag->serial_no : null;
            $this->dispenseRecord($serial);
        }
        $this->serialNumberList = BloodBag::where('serial_no', 'like', '%' . $this->searchSerial . '%')->where('isUsed', true)->select('serial_no')->get();
    }


    public function dispenseRecord($serialNumber)
    {
        $bag = BloodBag::where('serial_no', $serialNumber)->where('isUsed', true)->first();
        $bagId = $bag->id ? $bag->id : 0;
        $userId = $bag->user_id;

        $this->donorDetails = MemberDetail::where('member_details.user_id', $userId)
            ->select([
                'member_details.first_name',
                'member_details.middle_name',
                'member_details.last_name',
                'blood_bags.serial_no',
                'blood_bags.date_donated',
                'blood_types.blood_type',
                'venues.name as venue',
                'bled_by.first_name as bled_by_first_name',
                'bled_by.middle_name as bled_by_middle_name',
                'bled_by.last_name as bled_by_last_name',
            ])
            ->leftJoin('blood_bags', 'blood_bags.user_id', 'member_details.user_id')
            ->leftJoin('venues', 'venues.id', 'blood_bags.venue_id')
            ->leftJoin('bled_by', 'bled_by.id', 'blood_bags.bled_by_id')
            ->leftJoin('blood_types', 'blood_types.id', 'member_details.blood_type_id')
            ->get();

        $patient = DispenseList::where('blood_bag_id', $bagId)->first();
        $patientId = $patient->patient_details_id;

        $this->patientDetails = PatientDetail::where('patient_details.id', $patientId)
            ->leftJoin('blood_types', 'blood_types.id', 'patient_details.blood_type_id')
            ->leftJoin('sexes', 'sexes.id', 'patient_details.sex_id')
            ->leftJoin('hospitals', 'hospitals.id', 'patient_details.hospital_id')
            ->first();

        // Calculate the age
        if ($this->patientDetails && $this->patientDetails->dob) {
            $this->patientAge = $this->calculateAge($this->patientDetails->dob);
        } else {
            $this->patientAge = null;
        }
    }

    public function calculateAge($dob)
    {
        return Carbon::parse($dob)->age;
    }
}
