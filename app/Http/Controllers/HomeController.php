<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Checkout;
use App\Models\Job;
use Auth;


class HomeController extends Controller
{
    public function welcome() {
        $jobs = Job::with('company')->get();

        return response(view('welcome', ['jobs' => $jobs]));
    }

    public function detail(Job $job)
    {
        return view('details', [
            'job' => $job
        ]);
    }

    public function company(Job $job)
    {
        return view('companies');
    }

    public function contact(Job $job)
    {
        return view('details');
    }

    public function dashboard()
    {
        $checkouts = Checkout::with('Job')->whereUserId(Auth::id())->get();
        // return $checkouts;

        return view('user.dashboard.dashboard', [
            'checkouts' => $checkouts
        ]);
        
    }




}
