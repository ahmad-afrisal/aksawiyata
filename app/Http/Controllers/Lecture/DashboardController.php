<?php

namespace App\Http\Controllers\Lecture;

use App\Http\Controllers\Controller;
use App\Models\AdviserScore;
use App\Models\Checkout;
use App\Models\Company;
use App\Models\Consultation;
use App\Models\Examinee;
use App\Models\ExaminerScore;
use App\Models\Job;
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
        $company_id = Company::where('adviser_id',Auth::user()->id)->value('id');

        $jobs = Job::where('company_id', $company_id)->get();

        return view('lecture.dashboard', [
            'jobs' => $jobs,
        ]);
    }

    public function detailConsultation(String $id)
    {
        $consultations = Consultation::with('Job','User')->where([
            'job_id'=> $id,
        ])->get()->sortByDesc('id');
        
        return view('lecture.detail-consultation',[
            'consultations' => $consultations,
        ]);
    }

    public function accepted(Consultation $consultation)
    {
        $consultation->is_accepted = 1;
        $consultation->save();
            
        return redirect(route('lecture.detail-consultation', $consultation->job_id))->with('success', "Bimbingan disetujui");
            
    }

    public function rejected(Consultation $consultation)
    {
        $consultation->is_accepted = 0;
        $consultation->save();
            
        return redirect(route('lecture.detail-consultation', $consultation->job_id))->with('success', "Bimbingan tidak disetujui");
            
    }

    public function adviser()
    {
        $company_id = Company::where('adviser_id',Auth::user()->id)->value('id');

        $jobs = Job::where('company_id', $company_id)->get();

        return view('lecture.adviser.index', [
            'jobs' => $jobs,
        ]);
    }

    public function detailAdviser(String $id)
    {
        $checkouts = Checkout::with('Job')->where('job_id',$id)->where('status','sedang berjalan')->get();

        return view('lecture.adviser.detail',[
            'checkouts' => $checkouts,
        ]);
    }

    public function adviserAssesment(Student $student)
    {
        $data = Checkout::with('Job','User')->where('user_id', $student->user_id)
                        ->where(function ($query) {
                            $query->where('status', 'sedang berjalan')
                                ->orWhere('status', 'selesai');
                        })->get();


        $adviser_score = AdviserScore::where('user_id', $student->user_id)->first();

        // return ;
        
        $text_score = " ";
        if($adviser_score) {
            if ($adviser_score->final_score >= 85) {
                $text_score  = "A";
            }  else if ($adviser_score->final_score >= 80) {
                $text_score  = "A-";
            } else if ($adviser_score->final_score >= 75) {
                $text_score  = "B+";
            } else if ($adviser_score->final_score >= 70) {
                $text_score  = "B";
            } else if ($adviser_score->final_score >= 65) {
                $text_score  = "B-";
            } else if ($adviser_score->final_score >= 50) {
                $text_score  = "C";
            } else if ($adviser_score->final_score >= 40) {
                $text_score  = "D";
            } else if ($adviser_score->final_score < 40){
                $text_score  = "E";
            }
        }
       

        return view('lecture.adviser.create', [
            'data' => $data,
            'adviser_score' => $adviser_score,
            'text_score' => $text_score,
            
        ]);
    }

    public function adviserStore(Request $request)
    {
        $this->validate($request, [
            'user_id' => ['required'],
            'exercise_score' => ['required'],
            'report_score' => ['required'],
            'presentation_score' => ['required'],
            'final_score' => ['required'],
            'semester_id' => ['required'],
        ]);

        // return $request;

        DB::beginTransaction();

        try{

            // Step 1 : Input Nilai Dosen Pembimbing
            $user = AdviserScore::updateOrCreate(
                ['user_id' => $request->user_id],
                [
                    'user_id' => $request->user_id,
                    'adviser_id' => Auth::user()->id,
                    'exercise_score' => $request->exercise_score,
                    'report_score' => $request->report_score,
                    'presentation_score' => $request->presentation_score,
                    'final_score' =>  $request->final_score,
                ]
                );


            //Step 2 : Input data ke tabel Recap_store
            $recap = ScoreRecap::updateOrCreate(
                ['user_id' => $request->user_id],
                ['user_id' => $request->user_id, 'adviser_score' => $request->final_score, 'semester_id' => $request->semester_id]
            );

            DB::commit();

            return redirect()->route('lecture.adviser')->with('success','Nilai Berhasil ditambahkan');

        }catch(\Exception $e){

            DB::rollback();

            return redirect()->back()

            ->with('warning','Something Went Wrong!');

        }

    }

}
