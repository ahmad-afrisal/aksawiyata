<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Company;
use App\Models\Examinee;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamineController extends Controller
{
    public function index()
    {
        $schedules = ExamSchedule::where('is_open', 1)->orderBy('id', 'desc')->get();
        $histories = Examinee::with('Schedule')->where('student_id', Auth::user()->id)->get()->sortByDesc('id');

        // return $histories;
        
        return view('user.exam.index',[
            'schedules' => $schedules,
            'histories' => $histories,
        ]);
    }

    public function store(Request $request, ExamSchedule $examschedule)
    {

        // return $request;

        DB::beginTransaction();

        try{

            $checkout = Checkout::with('Job',)->where([
                'user_id' => Auth::user()->id,
                'status' => 'Sedang berjalan',
            ])->first();

            $company = Company::findOrFail($checkout->Job->company_id);

            $examinee = Examinee::create([
                'student_id' => Auth::user()->id,
                'exam_id' => $examschedule->id,
                'checkout_id' => $checkout->id,
                'adviser_id' => $company->adviser_id,
                'is_accepted' => 3,
            ]);

            // return $examinee;
        
            DB::commit();

            return to_route('user.examinee')->with('success', 'Daftar Ujian Berhasil');

        }catch(\Exception $e){

            DB::rollback();

            return redirect()->back()

            ->with('warning','Something Went Wrong!');

        }

       


    }
}
