<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Mail;
use App\Mail\User\AfterRegister;
use App\Models\User;
use App\Models\Student;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:8','unique:users,username'],
            'email' => ['required', 'string', 'email', 'min:8','max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]
        ,[
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal harus 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'username' => $request->nim,
                'email' => $request->email,
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => Hash::make($request->yourPassword),
                'role_id' => 4,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]);
    
            $student = Student::create([
                'user_id' => $user->id,
                'nim_mhs' => $request->nim,
                'nama_mhs' => $request->name,
                'prodi_mhs' => 'informatika',
                'status_mhs' => 1,
                'instagram_profile' => '#',
                'linkedin_profile' => '#',
                'github_profile' => '#',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]);
            
    
            event(new Registered($user));
    
            Auth::login($user);
    
            Mail::to($user->email)->send(new AfterRegister($user));
    
            DB::commit();

            return redirect(RouteServiceProvider::HOME);
        } catch(\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('warning','Buat Akun Gagal');
        }

        
    }
}
