<?php

namespace App\Livewire\Members\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\AuditTrail;

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

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            //passed
            $user = Auth::user();

            $ip = file_get_contents('https://api.ipify.org');
            $ch = curl_init('http://ipwho.is/' . $ip);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $ipwhois = json_decode(curl_exec($ch), true);
            curl_close($ch);

            if ($user->role_id == 2) {

                AuditTrail::create([
                    'user_id'    => $user->id,
                    'module'     => 'Authentication',
                    'action'     => 'Logging in to the system',
                    'status'     => 'success',
                    'ip_address' => $ipwhois['ip'],
                    'region'     => $ipwhois['region'],
                    'city'       => $ipwhois['city'],
                    'postal'     => $ipwhois['postal'],
                    'latitude'   => $ipwhois['latitude'],
                    'longitude'  => $ipwhois['longitude'],
                ]);

                return redirect()->route('admin.dashboard');
            } else {
                AuditTrail::create([
                    'user_id'    => $user->id,
                    'module'     => 'Authentication',
                    'action'     => 'Logging in to the system',
                    'status'     => 'failed',
                    'ip_address' => $ipwhois['ip'],
                    'region'     => $ipwhois['region'],
                    'city'       => $ipwhois['city'],
                    'postal'     => $ipwhois['postal'],
                    'latitude'   => $ipwhois['latitude'],
                    'longitude'  => $ipwhois['longitude'],
                ]);
                return redirect()->route('members.dashboard');
            }
        } else {
            //failed
            $this->addError('login-status', 'Invalid email or password. Please try again.');
        }
    }

    public function render()
    {
        return view('members.pages.auth.signin')->extends('layouts.guest');
    }
}
