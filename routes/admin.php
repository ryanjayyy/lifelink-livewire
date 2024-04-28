<?php

use App\Http\Middleware\IsUserAdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\UsersList\Users;
use App\Livewire\Admin\Dashboard\Main;

Route::name('admin.')->group(function () {

    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::get('/', Main::class)->name('dashboard');
    });

    Route::prefix('/users/list')->name('users.')->group(function () {
        Route::get('/', Users::class)->name('list');
    });
});
