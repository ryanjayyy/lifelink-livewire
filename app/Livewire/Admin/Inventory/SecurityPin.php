<?php

namespace App\Livewire\Admin\Inventory;

use Livewire\Component;
use Illuminate\Support\Facades\Request;

class SecurityPin extends Component
{
    public $securityPin;
    public $lastSegment;

    public function mount()
    {
        Request::segment(3) ? $this->lastSegment = Request::segment(4) : $this->lastSegment = 'reactive';
    }
    public function render()
    {
        return view('admin.partials.inventory.securtiy-pin')->extends('layouts.admin');
    }

    public function messages(): array
    {
        return [
            'securityPin.required' => 'Please enter your security pin.',
            'securityPin.digits' => 'Security pin must be 6 digits.',
            'securityPin.numeric' => 'Security pin must be a number.',
        ];
    }
    public function checkSecurityPin()
    {
        $pin = 123456;

        $this->validate(['securityPin' => 'required|numeric|digits:6']);
        if ($this->securityPin == $pin) {
            if ($this->lastSegment == 'reactive') {
                return redirect()->route('admin.inventory.secure.reactive');
            } else {
                return redirect()->route('admin.inventory.secure.spoiled');
            }
        } else {
            session()->flash('error', 'Security pin is incorrect.');
        }
    }
}
