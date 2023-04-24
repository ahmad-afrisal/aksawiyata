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
}
