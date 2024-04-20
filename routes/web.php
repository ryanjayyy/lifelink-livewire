<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Members\Auth\Login;
use App\Livewire\Members\Auth\Register;
use App\Livewire\LandingPage;
use App\Utils\UrlUtils;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', LandingPage::class)->name('guest.index');
// Route::get('/signin', Login::class)->name('guest.signin');
// Route::get('/signup', Register::class)->name('guest.signup');

Route::domain(sprintf('admin.%s', config('app.domain')))->group(function () {
    require base_path('routes/admin.php');
});

Route::domain(sprintf('members.%s', config('app.domain')))->group(function () {
    require base_path('routes/members.php');
});

Route::get(
    '/{any}',
    fn () => auth()->check() ? abort(404) : redirect()->route(sprintf('%s.signin', UrlUtils::getSubdomain()))
);

Route::get('/', fn () => redirect()->route(
    auth()->check()
        ? sprintf('%s.home', UrlUtils::getSubdomain())
        : sprintf('%s.signin', UrlUtils::getSubdomain())
))->name('/');
