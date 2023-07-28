<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Company;
use App\Models\Job;
use App\Models\MentorScore;
use App\Models\ScoreRecap;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // return !$user->roles;

        $company_id = Company::where('mentor_id',Auth::user()->id)->value('id');

        $jobs = Job::where('company_id', $company_id)->get();
        $jobsCount = Job::where('company_id', $company_id)->count();

        return view('mentor.dashboard', [
            'jobs' => $jobs,
            'jobsCount' => $jobsCount
        ]);

    }

    public function detail(String $id)
    {
        $checkouts = Checkout::with('Job')->where('job_id',$id)->where('status','sedang berjalan')->get();

        return view('mentor.detail-job',[
            'checkouts' => $checkouts,

        ]);
    }

    public function assesment(Student $student)
    {
        // return $student;
        $data = Checkout::with('Job','User')->where('user_id', $student->user_id)
                        ->where(function ($query) {
                            $query->where('status', 'sedang berjalan')
                                ->orWhere('status', 'selesai');
                        })->get();

                        // return $data;
        $mentor_score = MentorScore::where('user_id', $student->user_id)->first();

        $text_score = " ";
        if($mentor_score) {
            if ($mentor_score->final_score >= 85) {
                $text_score  = "A";
            }  else if ($mentor_score->final_score >= 80) {
                $text_score  = "A-";
            } else if ($mentor_score->final_score >= 75) {
                $text_score  = "B+";
            } else if ($mentor_score->final_score >= 70) {
                $text_score  = "B";
            } else if ($mentor_score->final_score >= 65) {
                $text_score  = "B-";
            } else if ($mentor_score->final_score >= 50) {
                $text_score  = "C";
            } else if ($mentor_score->final_score >= 40) {
                $text_score  = "D";
            } else if ($mentor_score->final_score < 40){
                $text_score  = "E";
            }
        }

        return view('mentor.form-assement', [
            'data' => $data,
            'mentor_score' => $mentor_score,
            'text_score' => $text_score,
            
        ]);
    }

    public function store(Request $request)
    {
        // return $request;   
        $this->validate($request, [
            'user_id' => ['required'],
            'attitude_score' => ['required'],
            'diligent_score' => ['required'],
            'performance_score' => ['required'],
            'final_score' => ['required'],
        ]);

        
        

        DB::beginTransaction();

        try{

            // Step 1 : Input Nilai Dosen Pembimbing
            $user = MentorScore::updateOrCreate(
                ['user_id' => $request->user_id],
                [
                    'user_id' => $request->user_id,
                    'mentor_id' => Auth::user()->id,
                    'attitude_score' => $request->attitude_score,
                    'diligent_score' => $request->diligent_score,
                    'performance_score' => $request->performance_score,
                    'final_score' =>  $request->final_score,
                ]
                );


            //Step 2 : Input data ke tabel Recap_store
            $recap = ScoreRecap::updateOrCreate(
                ['user_id' => $request->user_id],
                ['user_id' => $request->user_id, 'mentor_score' => $request->final_score]
            );

            DB::commit();

            return redirect()->route('mentor.dashboard')->with('success','Nilai Berhasil ditambahkan');

        }catch(\Exception $e){

            DB::rollback();

            return redirect()->back()

            ->with('warning','Something Went Wrong!');

        }

    }
}
