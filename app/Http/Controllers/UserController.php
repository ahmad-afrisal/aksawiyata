<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Auth;
use Mail;
use App\Mail\User\AfterRegister;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.user.login');
    }

    public function create()
    {
        return view('auth.user.register');
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $callback = Socialite::driver('google')->stateless()->user();
        $username = strtolower($callback->getName()).strval(rand(100,999));

        // $user = User::firstOrCreate(['email' => $data['email']], $data);
        $user = User::whereEmail($callback->getEmail())->first();
        // return $user;
        if(!$user) {
            // DB::beginTransaction();

            // try {

                $userId = User::insertGetId([
                    'username' => str_replace(' ', '_', $username),
                    'email' => $callback->getEmail(),
                    'avatar' => $callback->getAvatar(),
                    'email_verified_at' => date('Y-m-d H:i:s'),
                    'role_id' => 4,
                    'status' => 1,
                ]);

                Student::create([
                    'user_id' => $userId,
                    'nama_mhs' => $callback->getName(),
                ]);

                $user = User::whereId($userId)->first();
                // $user= str_replace(' ', '_', $username);
                
                Mail::to($callback->getEmail())->send(new AfterRegister($user));

            //     DB::commit();
            // } catch (\Exception $e) {
            //     DB::rollback();

            //     return redirect()->back()->with('warning','Login Gagal');
            // }

            


        }
        Auth::login($user, true);

        return redirect(route('welcome'));
    }
}
