<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;

class Main extends Component
{
    public function render()
    {
        return view('admin.pages.dashboard')->extends('layouts.admin');
    }
}
