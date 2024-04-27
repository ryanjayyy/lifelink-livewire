<?php

namespace App\Livewire\Members\Auth;

use Livewire\Component;

class EmailVerification extends Component
{
    public function render()
    {
        return view('members.pages.auth.email-verification')->extends('layouts.guest');
    }
}
