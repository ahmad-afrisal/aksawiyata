<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Checkout\Store;
use App\Mail\Checkout\AfterCheckout;
use App\Models\Checkout;
use App\Models\Job;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $job, Request $request)
    {
        if ($job->isRegistered) {
            $request->session()->flash('error', "Kamu sudah terdaftar pada {$job->name}");
            return redirect(route('user.dashboard'));
        }

        return view('checkout.create', [
            'job' => $job
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request, Job $job)
    {
        
        // mapping request data
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['job_id'] = $job->id;
        
        // create checkout
        $checkout = Checkout::create($data);

        // sendig email
        Mail::to(Auth::user()->email)->send(new AfterCheckout($checkout));

        return redirect(route('checkout.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkout $checkout)
    {
        //
    }

    /**
     * Display a Succes Page.
     */
    public function success()
    {
        return view('checkout.success');
    }
}
