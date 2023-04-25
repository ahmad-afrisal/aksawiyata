<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Checkout;
use App\Models\Job;
use Auth;


class DashboardController extends Controller
{
    public function activeActivity()
    {
        $checkouts = Checkout::with('Job')->where('user_id', Auth::id())
                                            ->where('status', '=', 'done')->orWhere('status', '=', 'on_going')
                                            ->take(1)->get();
        // return $checkouts;

        return view('user.dashboard.active-activity', [
            'checkouts' => $checkouts
        ]);
        
    }
}