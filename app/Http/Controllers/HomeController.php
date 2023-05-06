<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Checkout;
use App\Models\Company;
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

    public function company($slug)
    {
        $company = Company::with('CompanyGallery')->where('slug', $slug)->firstOrFail();
        
        return view('companies', [
            'company' => $company,
        ]);
    }

    public function contact(Job $job)
    {
        return view('details');
    }

    public function dashboard()
    {
        switch (Auth::user()->is_admin) {
            case true:
                return redirect(route('admin.dashboard'));
                break;

            default:
                return redirect(route('user.dashboard'));
                break;
        }
        
    }




}
