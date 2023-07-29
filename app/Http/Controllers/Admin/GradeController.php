<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\ScoreRecap;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        // $checkouts = Checkout::with('Job','User')
        //                     ->where(function ($query) {
        //                         $query->where('status', 'sedang berjalan')
        //                             ->orWhere('status', 'selesai');
        //                     })->get();
        $grades = ScoreRecap::with('user')->get();

        // $text_score = " ";
        // if($mentor_score) {
        //     if ($mentor_score->final_score >= 85) {
        //         $text_score  = "A";
        //     }  else if ($mentor_score->final_score >= 80) {
        //         $text_score  = "A-";
        //     } else if ($mentor_score->final_score >= 75) {
        //         $text_score  = "B+";
        //     } else if ($mentor_score->final_score >= 70) {
        //         $text_score  = "B";
        //     } else if ($mentor_score->final_score >= 65) {
        //         $text_score  = "B-";
        //     } else if ($mentor_score->final_score >= 50) {
        //         $text_score  = "C";
        //     } else if ($mentor_score->final_score >= 40) {
        //         $text_score  = "D";
        //     } else if ($mentor_score->final_score < 40){
        //         $text_score  = "E";
        //     }
        // }
        return view('admin.grade.index',[
            'grades' => $grades,
        ]);
    }
}
