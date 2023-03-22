<?php

use Illuminate\Support\Facades\Route;

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
})->name('home');

Route::get('/details', function () {
    return view('details');
})->name('details');

Route::get('/checkout', function () {
    return view('checkout');
})->name('details');

Route::get('/success', function () {
    return view('success');
})->name('success');

Route::get('/companies', function () {
    return view('companies');
})->name('companies');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');