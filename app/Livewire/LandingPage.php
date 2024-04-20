<?php

namespace App\Livewire;

use Livewire\Component;

class LandingPage extends Component
{
    public function render()
    {
        return view('members.pages.landing-page')->extends('layouts.guest');
    }
}
