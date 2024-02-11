<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Examinee;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = ExamSchedule::all()->sortByDesc('id');

        return view('admin.exam-schedule.index',[
            'schedules' => $schedules,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exam-schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // return $request;
         $this->validate($request, [

            'exam_date' => ['required'],
            'place' => ['required'],
            'status' => ['required', 'boolean'],
        ]);

       $user = ExamSchedule::create([
            'admin_id' => Auth::user()->id,
            'exam_date' => $request->exam_date,
            'place' => $request->place,
            'is_open' => $request->status,
        ]);

        
        return redirect()->route('admin.exam-schedule.index')->with('success', 'Jadwal Ujian baru berhasil ditambakan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $examinees = Examinee::with('Schedule','Student','Checkout')->get()->sortByDesc('id');

        // return $examinees;
        return view('admin.exam-schedule.show',[
            'examinees' => $examinees, 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exam_schedule = ExamSchedule::findOrFail($id);

        
        return view('admin.exam-schedule.edit',[
            'exam_schedule' => $exam_schedule,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        $this->validate($request, [
            'exam_date' => ['required'],
            'place' => ['required'],
            'status' => ['required', 'boolean'],
        ]);

        $exam_schedule = ExamSchedule::findOrFail($id);

        $exam_schedule->update([
            'admin_id' => Auth::user()->id,
            'exam_date' => $request->exam_date,
            'place' => $request->place,
            'is_open' => $request->status,
        ]);


        return redirect()->route('admin.exam-schedule.index')->with('success', 'Jadwal Ujian berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
