<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\ScoreRecap;
use App\Models\Semester;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index(Request $request)
    {

        // return $request->all();
        $semesters = Semester::all();


        // $grades = ScoreRecap::with('user')->get();

        // if($request->semester_id == null) {
        //     $grades = ScoreRecap::with('user')->where('semester_id','like', '%1%')->get();
        // } else {
        //     $grades = ScoreRecap::when($request->semester_id, function ($query) use ($request) {
        //         $query->where('semester_id','like', '%'.$request->semester_id.'%');
        //     });

        //     return $request->semester_id;
            

        // }

        // $grade

        // $query = ScoreRecap::where('semester_id', 1);
 
        // if ($request->semester_id) {
        //     $query->where('semester_id', $request->semester_id);
        //     // return $request->semester_id;
        // }
        
        // $grades = $query->get();
        $semester = $request->semester;
        $grades = ScoreRecap::query()->join('semesters', 'semesters.id', '=', 'score_recaps.semester_id')
        ->when($request->semester, function ($query, $semester) {
            $query->where('semesters.name', $semester);
        })
        ->get();

        return view('admin.grade.index',[
            'grades' => $grades,
            'semesters' => $semesters,
        ]);
    }
}
