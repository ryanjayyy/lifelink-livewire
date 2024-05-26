<?php

namespace App\Livewire\Members\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\AuditTrail;
use App\Models\User;

class Login extends Component
{
    public $email;
    public $password;

    public function mount()
    {
        session()->forget(['user_id', 'email', 'mobile', 'password', 'unhash_password']);
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $this->email)->first();

        if (!$user) {
            return $this->addError('login-status', 'Invalid email or password. Please try again.');
        }

        if (!$user->email_verified_at) {
            $user->sendEmailVerificationNotification();
            return $this->addError('login-status', 'Your email has not been verified yet. A verification email has been sent to you.');
        }

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->recordLogin($user, 'success');
            return $user->role_id == 1 ? redirect()->route('admin.dashboard.dashboard') : redirect()->route('members.dashboard.dashboard');
        } else {
            $this->recordLogin($user, 'failed');
            return $this->addError('login-status', 'Invalid email or password. Please try again.');
        }
    }

    protected function recordLogin($user, $status)
    {
        $ip = file_get_contents('https://api.ipify.org');
        $ch = curl_init('http://ipwho.is/' . $ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $ipwhois = json_decode(curl_exec($ch), true);
        curl_close($ch);

        AuditTrail::create([
            'user_id' => $user->id,
            'module_category_id' => 9,
            'action' => 'Logging in to the system',
            'status' => $status,
            'ip_address' => $ipwhois['ip'],
            'region' => $ipwhois['region'],
            'city' => $ipwhois['city'],
            'postal' => $ipwhois['postal'],
            'latitude' => $ipwhois['latitude'],
            'longitude' => $ipwhois['longitude'],
        ]);
    }

    public function render()
    {
        return view('members.pages.auth.signin')->extends('layouts.guest');
    }
}
