<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\ScoreRecap;
use App\Models\Semester;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $semesters = Semester::all();


        $grades = ScoreRecap::with('user')->get();

        return view('admin.grade.index',[
            'grades' => $grades,
            'semesters' => $semesters,
        ]);
    }
}
