<?php

namespace Database\Seeders;

use App\Models\Mentor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MentorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_mentors = [
            [
                'username' => 'Adnan Fadli',
                'email' => 'adnanfadli@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('mentor'),
                'role_id' => 3,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'username' => 'Sulkipli',
                'email' => 'sulkipli@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('mentor'),
                'role_id' => 3,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'username' => 'Ibnu Munzir',
                'email' => 'ibnumunzir@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('mentor'),
                'role_id' => 3,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],

        ];
        
        foreach($user_mentors as $key => $mentor) {
            User::create($mentor);
        }

        $mentors = [
            [
                'user_id' => 2,
                'name' => 'Adnan Fadli',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 3,
                'name' => 'Sulkipli',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 4,
                'name' => 'Ibnu Munzir',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],

        ];
        
        foreach($mentors as $key => $mentor) {
            Mentor::create($mentor);
        }
    }
}
