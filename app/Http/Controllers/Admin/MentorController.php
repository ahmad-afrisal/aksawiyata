<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Mentor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MentorController extends Controller
{
    public function index()
    {
        $mentors = Mentor::with('User')->get();
        // $companies = Company::all();

        
        return view('admin.user.mentor.index', [
            'mentors' => $mentors,
            'mentorsCount' => $mentors->count(),
            // 'companies' => $companies,

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
                'role_id' => 3,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]);
    
            Mentor::create([
                'user_id' => $userId,
                'name' => $request->name,
            ]);

            DB::commit();

            return redirect()->route('admin.mentors.index')->with('success', 'Mentor baru berhasil ditambakan');


        }catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('warning', 'Data Gagal Di tambahkan');
        }

       


    }
}
