<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Checkout;
use App\Models\Company;
use App\Models\CompanyGallery;
use App\Models\Job;
use App\Models\User;
use App\Models\UserReview;
use Auth;


class HomeController extends Controller
{
    public function welcome() {
        $jobs = Job::with('company')->paginate(4);
        $companies = Company::count();
        $users = User::where('roles', false)->count();

        return response(view('welcome', [
            'jobs' => $jobs,
            'companies' => $companies,
            'users' => $users,
            'jobsCount' => $jobs->count(),
        ]));
    }

    public function detail($slug)
    {
        $job = Job::where('slug', $slug)->firstOrFail();
        $reviews = UserReview::where('job_id', $job->id)->get();
        $galleries = CompanyGallery::where('companies_id', $job->company_id)->get();


        return view('details', [
            'job' => $job,
            'reviews' => $reviews,
            'galleries' => $galleries

        ]);
    }

    public function company($slug)
    {
        $company = Company::with('CompanyGallery')->where('slug', $slug)->firstOrFail();
        
        return view('companies', [
            'company' => $company,
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function dashboard()
    {
        switch (Auth::user()->roles) {
            case true:
                return redirect(route('admin.dashboard'));
                break;

            default:
                return redirect(route('user.dashboard'));
                break;
        }
        
    }

}
