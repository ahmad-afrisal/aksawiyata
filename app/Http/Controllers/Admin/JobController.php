<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Job\JobRequest;
use App\Models\Job;
use App\Models\Company;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        
        $jobsCount = Job::count();
        return view('admin.job.index', [
            'jobs' => $jobs,
            'jobsCount' => $jobsCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        $semesters = Semester::all();

        return view('admin.job.create',[
            'companies' => $companies,
            'semesters' => $semesters,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {

        $data = $request->all();       

        $data['slug'] = Str::slug($request->name);
        
        $job = Job::create($data);


        return redirect()->route('admin.job.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::findOrFail($id);

        return view('admin.job.show',[
            'job' => $job,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::findOrFail($id);
        $companies = Company::all();
        $semesters = Semester::all();

        return view('admin.job.edit', [
            'job' => $job,
            'companies' => $companies,
            'semesters' => $semesters,

        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, string $id)
    {
        
        $data = $request->all();
        // return $request;
        $item = Job::findOrFail($id);

        $data['slug'] = Str::slug($request->name);
    
        $item->update($data);

        return redirect()->route('admin.job.show', $item->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
