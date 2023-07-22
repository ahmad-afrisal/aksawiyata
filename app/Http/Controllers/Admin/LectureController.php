<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LectureController extends Controller
{
    public function index()
    {
        $lectures = Lecture::with('User')->get();

        return view('admin.user.lecture.index', [
            'lectures' => $lectures,
            'lecturesCount' => $lectures->count(),
        ]); 
    }

    public function store(Request $request)
    {
        // return $request;
        $this->validate($request, [

            'username' => ['required','regex:/(^([a-zA-z]+)(\d+)?$)/u','unique:users,username'],
            'name' => ['required'],
            'email' => ['required','email', 'unique:users,email'],
            'password' => ['required','confirmed'],
        ]);


        DB::beginTransaction();

        try {
            
            $userId = User::insertGetId([
                'username' => strtolower($request->username),
                'email' => $request->email,
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt($request->password),
                'role_id' => 2,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]);
    
            Lecture::create([
                'user_id' => $userId,
                'nama_dosen' => $request->name,
                'aktif' => 1,
            ]);
            DB::commit();


            return redirect()->route('admin.lectures.index')->with('success', 'Dosen baru berhasil ditambakan');

        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('warning','Data Gagal Ditambahkan');
        }



    }
}
