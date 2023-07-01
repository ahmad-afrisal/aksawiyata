<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index()
    {
        $lectures = User::where('roles', 2)->get();
        $lecturesCount = User::where('roles', 2)->count();

        return view('admin.user.lecture.index', [
            'lectures' => $lectures,
            'lecturesCount' => $lecturesCount,

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
            'roles' => 2,
        ]);

        return redirect()->route('admin.lectures.index')->with('success', 'Lecture baru berhasil ditambakan');

    }
}
