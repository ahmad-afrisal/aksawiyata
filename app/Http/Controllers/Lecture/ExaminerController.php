<?php

namespace App\Http\Controllers\Lecture;

use App\Http\Controllers\Controller;
use App\Models\AdviserScore;
use App\Models\Checkout;
use App\Models\Company;
use App\Models\ExaminerScore;
use App\Models\Job;
use App\Models\ScoreRecap;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExaminerController extends Controller
{
    public function index()
    {
        $company_id = Company::where('examiner_id',Auth::user()->id)->value('id');

        $jobs = Job::where('company_id', $company_id)->get();

        return view('lecture.examiner.index', [
            'jobs' => $jobs,
        ]);
    }

    public function detail(String $id)
    {
        $checkouts = Checkout::with('Job')->where('job_id',$id)->where('status','sedang berjalan')->get();

        return view('lecture.examiner.detail',[
            'checkouts' => $checkouts,
        ]);
    }

    public function assesment(Student $student)
    {
        $data = Checkout::with('Job','User')->where('user_id', $student->user_id)
        ->where(function ($query) {
            $query->where('status', 'sedang berjalan')
                ->orWhere('status', 'selesai');
        })->get();


        $examiner_score = ExaminerScore::where('user_id', $student->user_id)->first();

        $text_score = " ";
        if($examiner_score) {
            if ($examiner_score->final_score >= 85) {
                $text_score  = "A";
            }  else if ($examiner_score->final_score >= 80) {
                $text_score  = "A-";
            } else if ($examiner_score->final_score >= 75) {
                $text_score  = "B+";
            } else if ($examiner_score->final_score >= 70) {
                $text_score  = "B";
            } else if ($examiner_score->final_score >= 65) {
                $text_score  = "B-";
            } else if ($examiner_score->final_score >= 50) {
                $text_score  = "C";
            } else if ($examiner_score->final_score >= 40) {
                $text_score  = "D";
            } else if ($examiner_score->final_score < 40){
                $text_score  = "E";
            }
        }
       

        return view('lecture.examiner.create', [
            'data' => $data,
            'examiner_score' => $examiner_score,
            'text_score' => $text_score,
            
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => ['required'],
            'exercise_score' => ['required'],
            'report_score' => ['required'],
            'presentation_score' => ['required'],
            'final_score' => ['required'],
        ]);

        // return $request;

        DB::beginTransaction();

        try{

            // Step 1 : Input Nilai Dosen Pembimbing
            $user = ExaminerScore::updateOrCreate(
                ['user_id' => $request->user_id],
                [
                    'user_id' => $request->user_id,
                    'examiner_id' => Auth::user()->id,
                    'exercise_score' => $request->exercise_score,
                    'report_score' => $request->report_score,
                    'presentation_score' => $request->presentation_score,
                    'final_score' =>  $request->final_score,
                ]
                );


            //Step 2 : Input data ke tabel Recap_store
            $recap = ScoreRecap::updateOrCreate(
                ['user_id' => $request->user_id],
                ['user_id' => $request->user_id, 'examiner_score' => $request->final_score]
            );

            DB::commit();

            return redirect()->route('lecture.examiner.index')->with('success','Nilai Berhasil ditambahkan');

        }catch(\Exception $e){

            DB::rollback();

            return redirect()->back()

            ->with('warning','Something Went Wrong!');

        }

    }
}
