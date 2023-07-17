<?php

namespace App\Http\Controllers\Lecture;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Job;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $company_id = Company::where('adviser_id',Auth::user()->id)->value('id');

        $jobs = Job::where('company_id', $company_id)->get();

        return view('lecture.report.index', [
            'jobs' => $jobs,
        ]);

    }

    public function detail(String $id)
    {
        $reports = Report::with('Job','User')->where([
            'job_id'=> $id,
        ])->get()->sortByDesc('id');
        
        return view('lecture.report.detail',[
            'reports' => $reports,
        ]);
    }

    public function accepted(Report $report)
    {
        $report->status = "Diterima";
        $report->save();
            
        return redirect(route('lecture.report.detail',$report->job_id));
            
    }

    public function rejected(report $report)
    {
        $report->status = "Ditolak";
        $report->save();
            
        return redirect(route('lecture.report.detail', $report->job_id));
            
    }
}
