<?php

use App\Http\Middleware\IsUserAdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\UsersList\Users;
use App\Livewire\Admin\DonorList\Donors;
use App\Livewire\Admin\Dashboard\Main;
use App\Livewire\Admin\BloodBagList\BloodBags;
use App\Livewire\Admin\Inventory\Main as Inventory;
use App\Livewire\Admin\Inventory\ExpiredBloodBags;
use App\Livewire\Admin\Inventory\ReactiveBloodBag;
use App\Livewire\Admin\Inventory\SpoiledBloodBag;
use App\Livewire\Admin\Inventory\SecurityPin;
use App\Livewire\Admin\DeferralList\Temporary;
use App\Livewire\Admin\DeferralList\Permanent;
use App\Livewire\Admin\DispenseList\BloodFinder;
use App\Livewire\Admin\DispenseList\DispenseList;
use App\Livewire\Admin\DisposeBloodBags\BagList;



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

    Route::prefix('/inventory')->name('inventory.')->group(function () {
        Route::get('/list', Inventory::class)->name('list');
        Route::get('/expired', ExpiredBloodBags::class)->name('expired');

        Route::prefix('/secure')->name('secure.')->group(function () {
            Route::get('/pin/{module?}', SecurityPin::class)->name('pin');
            Route::get('/reactive', ReactiveBloodBag::class)->name('reactive');
            Route::get('/spoiled', SpoiledBloodBag::class)->name('spoiled');
        });
    });

    Route::prefix('/deferral')->name('deferral.')->group(function () {

        Route::prefix('/secure')->name('secure.')->group(function () {
            Route::get('/pin/{module?}', SecurityPin::class)->name('pin');
            Route::get('/temporary', Temporary::class)->name('temporary');
            Route::get('/permanent', Permanent::class)->name('permanent');
        });
    });

    Route::prefix('/dispense')->name('dispense.')->group(function () {
        Route::get('/blood-finder', BloodFinder::class)->name('blood-finder');
        Route::get('/list', DispenseList::class)->name('list');
    });

    Route::prefix('/dispose')->name('dispose.')->group(function () {
        Route::get('/blood-bag', BagList::class)->name('blood-bag');
    });
});


