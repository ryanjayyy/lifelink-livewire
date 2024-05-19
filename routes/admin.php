<?php

use App\Http\Middleware\IsUserAdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\UsersList\Users;
use App\Livewire\Admin\DonorList\Donors;
use App\Livewire\Admin\Dashboard\Main;
use App\Livewire\Admin\BloodBagList\BloodBags;


Route::name('admin.')->group(function () {

    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::get('/', Main::class)->name('dashboard');
    });

    Route::prefix('/users')->name('users.')->group(function () {
        Route::get('/list', Users::class)->name('list');
    });

    Route::prefix('/donors')->name('donors.')->group(function () {
        Route::get('/list', Donors::class)->name('list');
    });

    Route::prefix('/blood-bag')->name('blood-bag.')->group(function () {
        Route::get('/list', BloodBags::class)->name('list');
    });
});
