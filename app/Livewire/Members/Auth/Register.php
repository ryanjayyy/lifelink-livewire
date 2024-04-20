<?php

namespace App\Livewire\Members\Auth;

use Livewire\Component;

class Register extends Component
{
    public $email;
    public $mobile;
    public $password;
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
    public $password_confirmation;


    public function register()
    {
        $this->validate([
            'email' => 'required|email',
            'mobile' => 'required',
            'password' => 'required|confirmed',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'occupation' => 'required',
            'dob' => 'required',
            'sex' => 'required',
            'blood_type' => 'required',
            'region' => 'required',
            'province' => 'required',
            'municipality' => 'required',
            'barangay' => 'required',
            'street' => 'required',
            'zip_code' => 'required',
        ]);

    }

    public function render()
    {
        return view('members.pages.auth.signup')->extends('layouts.guest');
    }
}
