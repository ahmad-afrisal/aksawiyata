<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Checkout;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::with('Job')->get();

        $companies = Company::count();
        $jobs = Job::count();
        $users = User::where('is_admin', false)->count();
        return view('admin.dashboard', [
            'checkouts' => $checkouts,
            'companies' => $companies,
            'jobs' => $jobs,
            'users' => $users,
        ]);
    }

    public function settings()
    {
        return view('admin.setting.index');
    }

    public function updateProfile()
    {
        
    }

}
