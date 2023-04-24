<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/details/{job:slug}', [HomeController::class, 'detail'])->name('details');
Route::get('/companies/{company:slug}', [HomeController::class, 'company'])->name('companies');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');



// socialite routes
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');



Route::middleware('auth')->group(function () {
    // checkout routes
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/{job:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('/checkout/{job}', [CheckoutController::class, 'store'])->name('checkout.store');

    // user dashboard
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/dashboard/active-activity', [DashboardController::class, 'activeActivity'])->name('dashboard-activity');


    // Route Dari Breeze
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/dashboard/accepted', function () {
    return view('dashboard.accepted');
})->name('accepted');

Route::get('/dashboard/confirm', function () {
    return view('dashboard.confirm');
})->name('confirm');



Route::get('/dashboard/user-profile', function () {
    return view('dashboard.user-profile');
})->name('user-profile');

Route::get('/dashboard/success', function () {
    return view('dashboard.success');
})->name('success');