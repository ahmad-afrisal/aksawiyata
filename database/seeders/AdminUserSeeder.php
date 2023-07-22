<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {

        DB::beginTransaction();

        try {

            
           $id =  User::insertGetId([
                'username' => 'admin',
                'email' => 'admin@aksawiyata.com',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('password'),
                'role_id' => 1,
                'status' => 1,
            ]);
            
            // $userId = User::($user);
            Admin::create([
                'user_id' => $id,
                'name' => 'admin',
            ]);
            

            DB::commit();

            // return redirect()->route('mentor')

        } catch (\Exception $e) {

            DB::rollback();

        }

    }
}
