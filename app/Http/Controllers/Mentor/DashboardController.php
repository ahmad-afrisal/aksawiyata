<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $company_id = Company::where('mentor_id',Auth::user()->id)->value('id');

        $jobs = Job::where('company_id', $company_id)->get();
        $jobsCount = Job::where('company_id', $company_id)->count();

        return view('mentor.dashboard', [
            'jobs' => $jobs,
            'jobsCount' => $jobsCount
        ]);

    }

    public function detail(String $id)
    {
        $checkouts = Checkout::with('Job')->where('job_id',$id)->where('status','sedang berjalan')->get();

        return view('mentor.detail-job',[
            'checkouts' => $checkouts,

        ]);
    }

    public function assesment(User $user)
    {

        $data = Checkout::with('Job','User')->where('user_id', $user->id)->get();

        // return $data;
        return view('mentor.form-assement', [
            'data' => $data,
        ]);
    }
}
