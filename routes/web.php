<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Members\Auth\Login;
use App\Livewire\Members\Auth\Register;
use App\Livewire\LandingPage;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', LandingPage::class)->name('guest.index');
Route::get('/signin', Login::class)->name('guest.signin');
Route::get('/signup', Register::class)->name('guest.signup');
