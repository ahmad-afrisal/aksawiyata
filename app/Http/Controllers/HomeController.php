<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job;


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
}
