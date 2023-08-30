<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TvController;
use App\Http\Controllers\WatchlistController;

Route::get('/', [LoginController::class, 'loginForm'])->name('auth.login');
Route::get('/login', [LoginController::class, 'loginForm'])->name('auth.login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', function () {
    return view('auth.register');
})->name('auth.register');

Route::post('/register', [RegisterController::class, 'register']);

Route::post('layout/nav', [AdminController::class, 'adminLogin']);

Route::get('/logout', [LogoutController::class, 'logout'])->name('auth.logout');

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.show');

Route::get('/actors', [ActorsController::class, 'index'])->name('actors.index');
Route::get('/actors/page/{page?}', [ActorsController::class, 'index']);
Route::get('/actors/{id}', [ActorsController::class, 'show'])->name('actors.show');


Route::get('/tv', [TvController::class, 'index'])->name('tv.index');
Route::get('/tv/{id}', [TvController::class, 'show'])->name('tv.show');

Route::get('/watchlist/add/{id}', [WatchlistController::class, 'addList'])->name('watchlist.add');
Route::get('/watchlist/remove/{id}', [WatchlistController::class, 'remove'])->name('watchlist.remove');

// Route::get('/{id}/stream', [::class, 'remove'])->name('stream');


Route::get('/member', function () {
    return view('member.member');
});

// Route::get('/dashboard', [DashboardController::class, 'dashboardShow'])->name('dashboard');

Route::get('/pro', [StripeController::class, 'viewPlans'])->name('pro');
Route::post('/pro', [StripeController::class, 'session']);

Route::get('/checkout', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');


Route::get('/admin/login', [AdminController::class, 'adminLoginView'])->name('admin.loginView');
Route::post('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/suspend/{userId}', [AdminController::class, 'suspend'])->name('admin.suspend');
Route::get('/admin/changerole/{userId}', [AdminController::class, 'changerole'])->name('admin.changerole');
Route::get('/admin/createadmin', [AdminController::class, 'createadminform'])->name('admin.createadmin');
Route::post('/admin/createadmin', [AdminController::class, 'createadmin']);
Route::get('/admin/user', [AdminController::class, 'adminuser'])->name('admin.user');
Route::get('/admin/user/{id}/details', [AdminController::class, 'showuserdetails'])->name('admin.user.detail');
