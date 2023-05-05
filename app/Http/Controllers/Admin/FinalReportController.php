<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class FinalReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $reports = Report::all();
        return view('admin.final-report.index',[
            'reports' => $reports,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAccept(Request $request, Report $report)
    {
        $report->status = "Diterima";
        $report->save();
        
        // send email to user
        // Mail::to($checkout->User->email)->send(new Accepted($checkout));


        $request->session()->flash('success', "Checkout with ID  has been updated!");
        return redirect(route('admin.final-report.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function updateReject(Request $request, Report $report)
    {
        $report->status = "Ditolak";
        $report->save();

        $request->session()->flash('success', "Checkout with ID  has been updated!");
        return redirect(route('admin.final-report.index'));
    }
}
