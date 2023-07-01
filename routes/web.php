<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Mentor\DashboardController as MentorDashboard;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckout;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\FinalReportController;
use App\Http\Controllers\Admin\LectureController;
use App\Http\Controllers\Admin\MentorController;
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

        // User Activty
        Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
        Route::post('/review/{user_riviews}', [ActivityController::class, 'review'])->name('activity.review');
        Route::post('/report/', [ActivityController::class, 'report'])->name('activity.report');

        Route::post('/logbook/', [ActivityController::class, 'logbook'])->name('activity.logbook');
        Route::get('/logbook/history', [ActivityController::class, 'history'])->name('activity.logbook-history');

        Route::post('/consultation/', [ActivityController::class, 'consultation'])->name('activity.consultation');
        Route::get('/consultation/history', [ActivityController::class, 'historyConsultation'])->name('activity.consultation-history');
        
        // User Profile
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/{user}', [ProfileController::class, 'update'])->name('update-profile');
    });


    // admin dashboard
    Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function(){
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::get('/detail-job/{job}', [AdminDashboard::class, 'detailJob'])->name('detail-job');
        

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
        Route::post('/final-report/update-accept/{report}', [FinalReportController::class, 'updateAccept'])->name('final-report.update-accept');
        Route::post('/final-report/update-rejcet/{report}', [FinalReportController::class, 'updateReject'])->name('final-report.update-reject');

        // Admin Users
        Route::get('/lectures', [LectureController::class, 'index'])->name ('lectures.index');
        Route::post('/lectures/store', [LectureController::class, 'store'])->name ('lectures.store');

        Route::get('/mentors', [MentorController::class, 'index'])->name ('mentors.index');
        Route::post('/mentors/store', [MentorController::class, 'store'])->name ('mentors.store');
        
        Route::get('/users', [AdminDashboard::class, 'users'])->name('users.index');
        Route::get('/users/show/{user}', [AdminDashboard::class, 'show'])->name('users.show');



        // Admin Settings
        Route::get('/settings', [AdminDashboard::class, 'settings'])->name('settings');
        Route::post('/update-profile', [AdminDashboard::class, 'updateProfile'])->name('update-profile');
        
    });


    // mentor dashboard
    Route::prefix('mentor/dashboard')->namespace('Mentor')->name('mentor.')->middleware('ensureUserRole:mentor')->group(function(){
        Route::get('/', [MentorDashboard::class, 'index'])->name('dashboard');
        Route::get('/detail/{job}', [MentorDashboard::class, 'detail'])->name('detail');
        Route::get('/assesment/{user:nim}', [MentorDashboard::class, 'assesment'])->name('assesment');

    });
    // Route Dari Breeze
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
