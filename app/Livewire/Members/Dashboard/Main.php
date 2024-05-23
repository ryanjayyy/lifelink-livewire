<?php

namespace App\Livewire\Members\Dashboard;

use Livewire\Component;

class Main extends Component
{
    public function render()
    {
        return view('members.pages.dashboard.dashboard')->extends('layouts.members');
    }
}
