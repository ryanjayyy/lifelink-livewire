<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Members\Auth\Login;
use App\Livewire\Members\Auth\Register;

Route::name('members.')->group(function () {
    Route::get('/signin', Login::class)->name('signin');
    Route::get('/signup', Register::class)->name('signup');
});
