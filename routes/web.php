<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckout;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\JobController;

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
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success')->middleware('ensureUserRole:user');
    Route::get('/checkout/{job:slug}', [CheckoutController::class, 'create'])->name('checkout.create')->middleware('ensureUserRole:user');
    Route::post('/checkout/{job}', [CheckoutController::class, 'store'])->name('checkout.store')->middleware('ensureUserRole:user');

    // dashboard
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // user dashboard
    Route::prefix('user/dashboard')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function(){
        Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');

        Route::get('/dashboard/active-activity', [UserDashboard::class, 'activeActivity'])->name('dashboard-activity');
        Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile');
    });


    // admin dashboard
    Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function(){
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::get('/settings', [AdminDashboard::class, 'settings'])->name('settings');
        Route::post('/update-profile', [AdminDashboard::class, 'updateProfile'])->name('update-profile');
        Route::get('/users', [AdminDashboard::class, 'users'])->name('users.index');

        // Admin Checkout
        Route::post('/checkout/{checkout}', [AdminCheckout::class, 'update'])->name('checkout.update');
        Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
        Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
        Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');
        Route::get('/company/show/{company}', [CompanyController::class, 'show'])->name('company.show');
        Route::get('/company/edit/{company}', [CompanyController::class, 'edit'])->name('company.edit');
        Route::post('/company/update/{company}', [CompanyController::class, 'update'])->name('company.update');
        
        Route::get('/job', [JobController::class, 'index'])->name('job.index');
        // Route::resource('/company', CompanyController::class);
    });

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

Route::get('/dashboard/success', function () {
    return view('dashboard.success');
})->name('success');