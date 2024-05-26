<?php

use App\Http\Controllers\Logout;
use App\Http\Middleware\isAuthenticated;
use App\Http\Middleware\IsUserAdminMiddleware;
use App\Http\Middleware\isUserMemberMiddleware;
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
use App\Livewire\Admin\Network\BloodRequest;
use App\Livewire\Admin\Network\CreatedPost;
use App\Livewire\Admin\AuditTrail\Log;
use App\Livewire\Members\Dashboard\Main as MemberMain;
use App\Livewire\Admin\Settings\Category;


//member
use App\Livewire\Members\Auth\Login;
use App\Livewire\Members\Auth\RegisterStepOne;
use App\Livewire\Members\Auth\RegisterStepTwo;
use App\Livewire\Members\Auth\EmailVerification;
use App\Livewire\Members\BloodNetwork\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::prefix('/admin')->name('admin.')->middleware([IsUserAdminMiddleware::class])->group(function () {
    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::get('/', Main::class)->name('dashboard');
    });
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

    Route::prefix('/network')->name('network.')->group(function () {
        Route::get('/blood-request', BloodRequest::class)->name('blood-request');
        Route::get('/create-post', CreatedPost::class)->name('posts');
    });

    Route::prefix('/activity-log')->name('activity-log.')->group(function () {
        Route::get('/list', Log::class)->name('list');
    });

    Route::prefix('/settings')->name('settings.')->group(function () {
        Route::get('/', Category::class)->name('categories');
    });
});




//public routes
Route::get('/logout', [Logout::class, 'logout'])->name('logout');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/signin');
})->middleware(['signed'])->name('verification.verify');


Route::prefix('/')->name('members.')->middleware(isAuthenticated::class)->group(function () {
    Route::get('/signin', Login::class)->name('signin');
    Route::get('/signup/step-1', RegisterStepOne::class)->name('signup-1');
    Route::get('/signup/step-2', RegisterStepTwo::class)->name('signup-2');
    Route::get('/email/verify', EmailVerification::class)->name('signup-verify');
});



Route::prefix('/members')->name('members.')->middleware('auth')->group(function () {
    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::get('/', MemberMain::class)->name('dashboard');
    });
    Route::prefix('/blood-network')->name('blood-network.')->group(function () {
        Route::get('/request', Request::class)->name('request');
    });
});
