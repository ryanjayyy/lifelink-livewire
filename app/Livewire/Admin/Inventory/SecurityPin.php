<?php

namespace App\Livewire\Admin\Inventory;

use Livewire\Component;
use Illuminate\Support\Facades\Request;

use App\Models\AuditTrail;
class SecurityPin extends Component
{
    public $securityPin;
    public $lastSegment;

    public function mount()
    {
        $this->lastSegment = collect(Request::segments())->last();
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
        $ip = file_get_contents('https://api.ipify.org');
        $ch = curl_init('http://ipwho.is/' . $ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $ipwhois = json_decode(curl_exec($ch), true);
        curl_close($ch);

        $authUser = auth()->user();

        $pin = 123456;

        $this->validate(['securityPin' => 'required|numeric|digits:6']);
        if ($this->securityPin == $pin) {
            AuditTrail::create([
                'user_id' => $authUser->id,
                'module_category_id' => 11,
                'action' => 'unlocking security_pin of ' . $this->lastSegment,
                'status' => 'Success',
                'ip_address' => $ipwhois['ip'],
                'region'     => $ipwhois['region'],
                'city'       => $ipwhois['city'],
                'postal'     => $ipwhois['postal'],
                'latitude'   => $ipwhois['latitude'],
                'longitude'  => $ipwhois['longitude'],
            ]);
            if ($this->lastSegment == 'reactive') {
                return redirect()->route('admin.inventory.secure.reactive');
            } elseif ($this->lastSegment == 'spoiled') {
                return redirect()->route('admin.inventory.secure.spoiled');
            }elseif ($this->lastSegment == 'temporary') {
                return redirect()->route('admin.deferral.secure.temporary');
            }elseif ($this->lastSegment == 'permanent') {
                return redirect()->route('admin.deferral.secure.permanent');
            }
        } else {
            session()->flash('error', 'Security pin is incorrect.');

            AuditTrail::create([
                'user_id' => $authUser->id,
                'module_category_id' => 11,
                'action' => 'unlocking security_pin of ' . $this->lastSegment,
                'status' => 'Failed',
                'ip_address' => $ipwhois['ip'],
                'region'     => $ipwhois['region'],
                'city'       => $ipwhois['city'],
                'postal'     => $ipwhois['postal'],
                'latitude'   => $ipwhois['latitude'],
                'longitude'  => $ipwhois['longitude'],
            ]);
        }
    }
}
