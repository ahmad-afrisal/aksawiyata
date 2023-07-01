<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index()
    {
        $mentors = User::where('roles', 3)->get();
        $mentorsCount = User::where('roles', 3)->count();
        $companies = Company::all();

        return view('admin.user.mentor.index', [
            'mentors' => $mentors,
            'mentorsCount' => $mentorsCount,
            'companies' => $companies,

        ]); 
    }

    public function store(Request $request)
    {
        // return $request;
        $this->validate($request, [

            'name' => ['required'],
            'email' => ['required','email', 'unique:users,email'],
            'password' => ['required','confirmed'],
            
            // 'password_confirmation' => ['required', 'confirmed']
        ]);

       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => \bcrypt($request->password),
            'roles' => 3,
        ]);

        return redirect()->route('admin.mentors.index')->with('success', 'Mentor baru berhasil ditambakan');

    }
}
