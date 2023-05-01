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
use App\Http\Controllers\Admin\FinalReportController;
use App\Http\Controllers\user\ActivityController;

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

        // User Confirm
        Route::get('/success', [UserDashboard::class, 'success'])->name('success');
        Route::get('/confirm', [UserDashboard::class, 'confirm'])->name('confirm');

        // User Activty
        Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
        Route::post('/review/{user_riviews}', [ActivityController::class, 'review'])->name('activity.review');
        
        // User Profile
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    });


    // admin dashboard
    Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function(){
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
        

        // Admin Checkout
        Route::post('/checkout/{checkout}', [AdminCheckout::class, 'update'])->name('checkout.update');

        // Admin Company
        Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
        Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
        Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');
        Route::get('/company/show/{company}', [CompanyController::class, 'show'])->name('company.show');
        Route::get('/company/edit/{company}', [CompanyController::class, 'edit'])->name('company.edit');
        Route::post('/company/update/{company}', [CompanyController::class, 'update'])->name('company.update');
        
        // Admin Gallery Company
        Route::post('/company/gallery/upload', [CompanyController::class, 'uploadGallery'])->name('company.gallery-upload');
        Route::get('/company/gallery/delete/{id}', [CompanyController::class, 'deleteGallery'])->name('company.gallery-delete');


        // Admin Job
        Route::get('/job', [JobController::class, 'index'])->name('job.index');
        Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
        Route::post('/job/store', [JobController::class, 'store'])->name('job.store');
        Route::get('/job/show/{company}', [JobController::class, 'show'])->name('job.show');
        Route::get('/job/edit/{company}', [JobController::class, 'edit'])->name('job.edit');
        Route::post('/job/update/{company}', [JobController::class, 'update'])->name('job.update');

        // Admin FinalReport
        Route::get('/final-report', [FinalReportController::class, 'index'])->name('final-report.index');

        // Admin Users
        Route::get('/users', [AdminDashboard::class, 'users'])->name('users.index');

        // Admin Settings
        Route::get('/settings', [AdminDashboard::class, 'settings'])->name('settings');
        Route::post('/update-profile', [AdminDashboard::class, 'updateProfile'])->name('update-profile');
        
    });

    // Route Dari Breeze
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
