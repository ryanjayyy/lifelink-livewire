<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Members\Auth\Login;
use App\Livewire\Members\Auth\RegisterStepOne;
use App\Livewire\Members\Auth\RegisterStepTwo;
use App\Livewire\Members\Auth\EmailVerification;


Route::name('members.')->group(function () {
    Route::get('/signin', Login::class)->name('signin');
    Route::get('/signup/step-1', RegisterStepOne::class)->name('signup-1');
    Route::get('/signup/step-2', RegisterStepTwo::class)->name('signup-2');
    Route::get('/email/verify', EmailVerification::class)->name('signup-verify');

});
