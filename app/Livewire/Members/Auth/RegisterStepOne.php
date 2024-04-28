<?php

namespace App\Livewire\Members\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class RegisterStepOne extends Component
{
    public $email;
    public $mobile;
    public $password;
    public $password_confirmation;

    public function render()
    {
        return view('members.pages.auth.signup-1')->extends('layouts.guest');
    }

    public function mount()
    {
        if (session()->has('email') && session()->has('mobile') && session()->has('password')) {
            $this->email = session()->get('email');
            $this->mobile = session()->get('mobile');
        }
    }

    public function registerStepOne()
    {
        $validatedData = $this->validate([
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|unique:users,mobile',
            'password' => 'required|confirmed',
        ]);

        session([
            'email' => $validatedData['email'],
            'mobile' => $validatedData['mobile'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('members.signup-2');
    }
}
