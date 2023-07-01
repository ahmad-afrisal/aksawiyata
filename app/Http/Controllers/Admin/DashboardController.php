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
        $jobs = Job::all();

        $companies = Company::count();
        $job = Job::count();
        $users = User::where('roles', false)->count();
        return view('admin.dashboard', [
            'jobs' => $jobs,
            'companies' => $companies,
            'job' => $job,
            'users' => $users,
        ]);
    }

    public function detailJob(String $id)
    {
        $checkouts = Checkout::with('Job')->where('job_id',$id)->get();


        return view('admin.detail-job', [
            'checkouts' => $checkouts,
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
        $users = User::where('roles', false)->get();
        $usersCount = User::where('roles', false)->count();

        return view('admin.user.student.index', [
            'users' => $users,
            'usersCount' => $usersCount,
        ]);        
    }

    public function show(String $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.student.show', [
            'user' => $user,
            'transkip' => str_replace('public/assets/transkip/', '', $user->transkip),
            'cv' => str_replace('public/assets/cv/', '', $user->cv),
        ]);  
    }

}
