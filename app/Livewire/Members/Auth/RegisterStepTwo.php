<?php

namespace App\Livewire\Members\Auth;

use Livewire\Component;
use App\Models\User;
use App\Models\MemberDetail;

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

        $email = session('email');
        $mobile = session('mobile');
        $password = session('password');

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


        $memberAccount = User::create([
            'email' => $email,
            'mobile' => $mobile,
            'password' => bcrypt($password),
        ]);

        $memberDetail = MemberDetail::create([
            'user_id' => $memberAccount->id,
            'first_name' => $validatedData['first_name'],
            'middle_name' => $validatedData['middle_name'],
            'last_name' => $validatedData['last_name'],
            'dob' => $validatedData['dob'],
            'sex' => $validatedData['sex'],
            'blood_type' => $validatedData['blood_type'],
            'region' => $validatedData['region'],
            'province' => $validatedData['province'],
            'municipality' => $validatedData['municipality'],
            'barangay' => $validatedData['barangay'],
            'street' => $validatedData['street'],
            'zip_code' => $validatedData['zip_code'],
        ]);

        session()->forget(['email', 'mobile', 'password']);
        return redirect()->route('members.signup-verify');
    }
}
