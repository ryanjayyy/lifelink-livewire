<?php

namespace App\Livewire\Members\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class EmailVerification extends Component
{
    public function mount()
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->route('members.signin');
        }
    }

    public function render()
    {
        return view('members.pages.auth.email-verification')->extends('layouts.guest');
    }

    public function resend()
    {
        $userId = session('user_id');
        $user = User::find($userId);

        if (!$user) {
            $this->addError('email-status', 'User not found');
            return;
        }

        if (!$user->email) {
            $this->addError('email-status', 'Email not found');
            return;
        }

        if ($user->email_verified_at !== null) {
            $this->addError('email-status', 'Email already verified.');
            return;
        }

        $user->sendEmailVerificationNotification();
        session()->flash('message', 'Verification email has been sent!');
    }
}
