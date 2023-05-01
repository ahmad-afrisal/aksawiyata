<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;

use App\Models\Checkout;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DashboardController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::with('Job')->get();

        $companies = Company::count();
        $jobs = Job::count();
        $users = User::where('is_admin', false)->count();
        return view('admin.dashboard', [
            'checkouts' => $checkouts,
            'companies' => $companies,
            'jobs' => $jobs,
            'users' => $users,
        ]);
    }

    public function settings()
    {
        return view('admin.setting.index');
    }

    public function updateProfile(ProfileRequest $request)
    {
        $data = $request->all();
        
        $item =  User::findOrFail(Auth::user()->id);

        if($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('assets/avatar','public');
            
            Storage::delete('public/'.$item->avatar);
    
            $item->update($data);

        } else {
            $item->update([
                'name'     => $request->name,
                'nim'     => $request->nim,
                'concentration'     => $request->concentration,
                'about'     => $request->about,
                'phone_number'     => $request->phone_number,
                'instagram_profile'     => $request->instagram_profile,
                'linkedin_profile'     => $request->linkedin_profile,
                'github_profile'     => $request->github_profile,
            ]);
        }

        return redirect()->route('admin.settings');
        
    }

    
    public function users()
    {
        $users = User::where('is_admin', false)->get();
        $usersCount = User::where('is_admin', false)->count();

        return view('admin.user.index', [
            'users' => $users,
            'usersCount' => $usersCount,
        ]);


        
    }

}
