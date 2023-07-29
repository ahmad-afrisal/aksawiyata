<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
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
        $users = User::count();
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

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => ['required','string'],
        ]);

        $data = $request->all();
        
        // $item =  Admin::findOrFail('user_id', Auth::user()->id);
        $item =  Admin::where('user_id', Auth::user()->id)->first();

        $data['name'] = $request->name;

        $item->update($data);



        return redirect()->route('admin.settings')->with('success','Nama Berhasil di ubah');
        
    }

    public function updatePass(Request $request, string $id)
    {
        $item =  User::findOrFail(Auth::user()->id);


        if ($request->username == $item->username && $request->password) {
            $this->validate($request, [
                'username' => ['required'],
                'password' => ['required','confirmed'],
            ]);

            $data = $request->all();

            $data['username'] = $request->username;
            $data['password'] = \bcrypt($request->password);

            
            $item->update($data);
            
            return redirect()->route('admin.settings')->with('success', 'Password berhasil diupdate');

        } elseif($request->username && $request->password) {
            $this->validate($request, [
                'username' => ['required','regex:/(^([a-zA-z]+)(\d+)?$)/u','unique:users,username'],
                'password' => ['required','confirmed'],
            ]);

            $data = $request->all();
            
            $item =  User::findOrFail(Auth::user()->id);
            $data['username'] = $request->username;
            $data['password'] = \bcrypt($request->password);
            
            $item->update($data);
            
            return redirect()->route('admin.settings')->with('success', 'Username & Password berhasil diupdate');
        } else {
            $this->validate($request, [
                'username' => ['required','regex:/(^([a-zA-z]+)(\d+)?$)/u','unique:users,username'],
            ]);
            
            $data = $request->all();
            
            $item =  User::findOrFail(Auth::user()->id);
            $data['username'] = $request->username;
            
            $item->update($data);
            
            return redirect()->route('admin.settings')->with('success', 'Password berhasil diupdate');
        }
        
    }

    
    public function users()
    {
        $users = User::where('role_id', 4)->get();
        // $usersCount = User::where('role_id', false)->count();

        return view('admin.user.student.index', [
            'users' => $users,
            'usersCount' => $users->count(),
        ]);        
    }

    public function show(String $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.student.show', [
            'user' => $user,
        ]);  
    }

}
