<?php

namespace App\Livewire\Members\BloodNetwork;

use Livewire\Component;

use App\Models\BloodRequest;
use App\Models\BloodComponent;

class Request extends Component
{
    public $userId;
    public $bloodUnit;
    public $bloodComponent;
    public $diagnosis;
    public $hospital;
    public $transfusionDate;

    public $bloodComponentList;
    public $latestRequest;

    public function mount()
    {
        $user = auth()->user();
        $this->userId = $user->id;
        $this->bloodComponentList = BloodComponent::all();
        $this->latestRequest = $this->getLatestRequest($user->id);
        //dd($this->latestRequest);
    }

    public function render()
    {
        return view('members.pages.network.request')->extends('layouts.members');
    }

    public function messages(): array
    {
        return [
            'bloodUnit.numeric' => 'Blood unit must be a number.',
            'bloodUnit.max' => 'Blood unit must not accepting 3 digits',
            'transfusionDate.required' => 'Please select date.',
            'transfusionDate.after_or_equal' => 'Please select valid date.',
            'bloodComponent.required' => 'Please select blood component.',
            'diagnosis.required' => 'Diagnosis is required.',
            'hospital.required' => 'Hospital is  required.',
        ];
    }

    public function makeRequest()
    {
        $this->validate([
            'bloodUnit' => ['required', 'numeric', 'max:99'],
            'bloodComponent' => 'required',
            'diagnosis' => 'required',
            'hospital' => 'required',
            'transfusionDate' => ['required', 'after_or_equal:today'],
        ]);

        $requestNo = $this->generateUniqueRequestNo();


        BloodRequest::create([
            'user_id' => $this->userId,
            'request_no' => $requestNo,
            'blood_units' => $this->bloodUnit,
            'blood_component_id' => $this->bloodComponent,
            'diagnosis' => $this->diagnosis,
            'hospital' => $this->hospital,
            'transfusion_date' => $this->transfusionDate,
            'request_status_id' => 1,
        ]);

        dd('saved');
    }

    private function generateUniqueRequestNo()
    {
        do {
            $requestNo = mt_rand(10000000, 99999999); //8 digit number
        } while (BloodRequest::where('request_no', $requestNo)->exists());

        return $requestNo;
    }

    public function getLatestRequest($user_id)
    {
        return BloodRequest::where('blood_requests.user_id', $user_id)
            ->select('blood_requests.created_at', 'blood_requests.blood_units', 'blood_components.name', 'blood_requests.diagnosis', 'blood_requests.hospital', 'blood_requests.transfusion_date', 'blood_requests.request_status_id', 'request_statuses.name as status')
            ->leftJoin('blood_components', 'blood_requests.blood_component_id', '=', 'blood_components.id')
            ->leftJoin('request_statuses', 'blood_requests.request_status_id', '=', 'request_statuses.id')
            ->latest()
            ->first();
    }
}
