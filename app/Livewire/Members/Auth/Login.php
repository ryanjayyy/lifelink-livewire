<?php

namespace App\Livewire\Members\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {

        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    public function render()
    {
        return view('members.pages.auth.signin')->extends('layouts.guest');
    }
}
