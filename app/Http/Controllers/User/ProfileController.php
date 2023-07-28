<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $student = User::with('Student')->where('id', Auth::user()->id)->firstOrFail();

        return view('user.dashboard.profile', [
            // 'student' => $student,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, string $id)
    {
        $data = $request->all();
        // return $request->all();
        
        $item =  Student::where('user_id', Auth::user()->id)->firstOrFail();

        if ($request->transkip and $request->cv) {
            $data['transkip'] = $request->transkip;
            $data['cv'] = $request->cv;


            $item->update($data);

            return redirect()->route('user.profile')->with('success', 'Transkip dan CV Berhasil di Upload');
        } else {
            $item->update([
                'nama_mhs'     => $request->name,
                'nim_mhs'     => $request->nim,
                'angkatan_mhs' => $request->angkatan_mhs,
                'prodi_mhs'     => 'informatika',
                'status_mhs'     => 1,
                'concentration'     => $request->concentration,
                'about'     => $request->about,
                'phone_number'     => $request->phone_number,
                'instagram_profile'     => $request->instagram_profile,
                'github_profile'     => $request->github_profile,
                'linkedin_profile'     => $request->linkedin_profile,
            ]);

            return redirect()->route('user.profile')->with('success', 'Profile Berhasil di Upload');


        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
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
            
            return redirect()->route('user.profile')->with('success', 'Password berhasil diupdate');

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
            
            return redirect()->route('user.profile')->with('success', 'Username & Password berhasil diupdate');
        } else {
            $this->validate($request, [
                'username' => ['required','regex:/(^([a-zA-z]+)(\d+)?$)/u','unique:users,username'],
            ]);
            
            $data = $request->all();
            
            $item =  User::findOrFail(Auth::user()->id);
            $data['username'] = $request->username;
            
            $item->update($data);
            
            return redirect()->route('user.profile')->with('success', 'Password berhasil diupdate');
        }
        
    }
}
