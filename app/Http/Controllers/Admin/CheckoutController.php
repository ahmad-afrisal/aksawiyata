<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Mail;
use App\Mail\Checkout\Accepted;
use App\Models\Job;
use App\Models\Report;

class CheckoutController extends Controller
{
    public function update(Request $request, Checkout $checkout)
    {

        // $checkQuota = Job::where('id', $checkout->job_id)->where('quota', 0)->first();
        $quotaNow = Job::where('id', $checkout->job_id)->value('quota');

        if($quotaNow <= 0) {
            $request->session()->flash('error', "Kuota Sudah habis");
            return redirect(route('admin.dashboard'));
        } else {

            $quotaNew = $quotaNow - 1;
            Job::where('id', $checkout->job_id)->update(['quota' => $quotaNew]);
            
            $checkout->status = "sedang berjalan";
            $checkout->save();

            Report::create([
                    'user_id'     => $checkout->user_id,
                    'report'     => '-',
                    'status'     => 'Belum Upload',
                    'message'     => '',
            ]);
            // Checkout::decrement('quota', 1);
            // send email to user
            Mail::to($checkout->User->email)->send(new Accepted($checkout));



            $request->session()->flash('success', "Checkout with ID {$checkout->id} has been updated!");
            return redirect(route('admin.dashboard'));
        }
        
    }
}
