<?php

namespace App\Http\Controllers\Lecture;

use App\Http\Controllers\Controller;
use App\Models\Lecture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('lecture.profile');
    }

    public function update(Request $request, string $id)
    {

        return $request;
        $item =  Lecture::where('user_id', Auth::user()->id)->firstOrFail();

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
            
            return redirect()->route('lecture.profile')->with('success', 'Password berhasil diupdate');

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
            
            return redirect()->route('lecture.profile')->with('success', 'Username & Password berhasil diupdate');
        } else {
            $this->validate($request, [
                'username' => ['required','regex:/(^([a-zA-z]+)(\d+)?$)/u','unique:users,username'],
            ]);
            
            $data = $request->all();
            
            $item =  User::findOrFail(Auth::user()->id);
            $data['username'] = $request->username;
            
            $item->update($data);
            
            return redirect()->route('lecture.profile')->with('success', 'Password berhasil diupdate');
        }
        
    }
}
