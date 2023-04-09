<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/details', function () {
    return view('details');
})->name('details');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/success', function () {
    return view('success');
})->name('success');

Route::get('/companies', function () {
    return view('companies');
})->name('companies');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// socialite routes
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/dashboard/accepted', function () {
    return view('dashboard.accepted');
})->name('accepted');

Route::get('/dashboard/confirm', function () {
    return view('dashboard.confirm');
})->name('confirm');

Route::get('/dashboard/activity', function () {
    return view('dashboard.active-activity');
})->name('dashboard-activity');

Route::get('/dashboard/user-profile', function () {
    return view('dashboard.user-profile');
})->name('user-profile');

Route::get('/dashboard/success', function () {
    return view('dashboard.success');
})->name('success');