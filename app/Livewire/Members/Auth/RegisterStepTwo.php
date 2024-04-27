<?php

namespace App\Livewire\Members\Auth;

use Livewire\Component;

class RegisterStepTwo extends Component
{
    public $first_name;
    public $middle_name;
    public $last_name;
    public $occupation;
    public $dob;
    public $sex;
    public $blood_type;
    public $region;
    public $province;
    public $municipality;
    public $barangay;
    public $street;
    public $zip_code;

    public function render()
    {
        return view('members.pages.auth.signup-2')->extends('layouts.guest');
    }

    public function messages(): array
    {
        return [
            'dob.before' => 'You must be at least 17 years old.',
        ];
    }


    public function registerStepTwo()
    {
        $validatedData = $this->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'dob' => ['required', 'date', 'before:-17 years'],
            'sex' => 'required',
            'blood_type' => 'required',
            'region' => 'required',
            'province' => 'required',
            'municipality' => 'required',
            'barangay' => 'required',
            'street' => 'required',
            'zip_code' => 'required',
        ]);

        //save to database

        return redirect()->route('members.signup-verify');
    }
}
