<?php

namespace App\Livewire\Admin\Network;

use Livewire\Component;

class BloodRequest extends Component
{
    public function render()
    {
        return view('admin.pages.network.blood-request')->extends('layouts.admin');
    }
}
