<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Mail;
use App\Mail\Checkout\Accepted;

class CheckoutController extends Controller
{
    public function update(Request $request, Checkout $checkout)
    {
        $checkout->status = "sedang berjalan";
        $checkout->save();

        // send email to user
        Mail::to($checkout->User->email)->send(new Accepted($checkout));


        $request->session()->flash('success', "Checkout with ID {$checkout->id} has been updated!");
        return redirect(route('admin.dashboard'));
    }
}
