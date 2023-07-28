<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Mail;
use App\Mail\Checkout\Accepted;
use App\Models\Job;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function update(Request $request, Checkout $checkout)
    {

        $quotaNow = Job::where('id', $checkout->job_id)->value('quota');

        if($quotaNow <= 0) {
            $request->session()->flash('error', "Kuota Sudah habis");
            return redirect(route('admin.dashboard'));
        } else {

            DB::beginTransaction();
            
            try{
                $quotaNew = $quotaNow - 1;
                Job::where('id', $checkout->job_id)->update(['quota' => $quotaNew]);
                Checkout::where('job_id', '!=',$checkout->job_id)
                            ->where('user_id', $checkout->user_id)->update(['status' => 'ditolak']);
                
                $checkout->status = "sedang berjalan";
                $checkout->save();

                

                Report::create([
                        'user_id'     => $checkout->user_id,
                        'job_id'    => $checkout->job_id,
                        'report'     => '-',
                        'status'     => 'Belum Upload',
                        'message'     => '',
                ]);

                // return $report;

            
            // send email to user
            Mail::to($checkout->User->email)->send(new Accepted($checkout));
                
            DB::commit();
            
            $request->session()->flash('success', "Checkout with ID {$checkout->id} has been updated!");
            return redirect(route('admin.dashboard'));

            } catch(\Exception $e){

                DB::rollback();
    
                return redirect()->back()
    
                ->with('warning','Something Went Wrong!');
    
            }

        }
        
    }
}
