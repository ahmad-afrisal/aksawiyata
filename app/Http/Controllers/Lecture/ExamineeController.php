<?php

namespace App\Http\Controllers\Lecture;

use App\Http\Controllers\Controller;
use App\Models\Examinee;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamineeController extends Controller
{
    public function index()
    {
        $schedules = ExamSchedule::all()->sortByDesc('id');
        $examinees = Examinee::with('Schedule','Student','Checkout')->where('adviser_id', Auth::user()->id)->get()->sortByDesc('id');

        // return $examinees;
        return view('lecture.schedule.index',[
            'schedules' => $schedules, 
            'examinees' => $examinees, 
        ]);
    }

    public function accepted(Examinee $examinee)
    {
        $examinee->is_accepted = 1;
        $examinee->save();
            
        return to_route('lecture.examinee')->with('success', "Ujian disetujui");
            
    }

    public function rejected(Examinee $examinee)
    {
        $examinee->is_accepted = 0;
        $examinee->save();
            
        return to_route('lecture.examinee')->with('success', "Ujian tidak disetujui");

            
    }
}
