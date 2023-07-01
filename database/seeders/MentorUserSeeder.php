<?php

namespace Database\Seeders;

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
        $mentors = [
            [
                'name' => 'Adnan Fadli',
                'email' => 'adnanfadli@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('mentor'),
                'roles' => 3,
            ],
            [
                'name' => 'Sulkipli',
                'email' => 'sulkipli@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('mentor'),
                'roles' => 3,
            ],
            [
                'name' => 'Ibnu Munzir',
                'email' => 'ibnumunzir@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('mentor'),
                'roles' => 3,
            ],

        ];
        
        foreach($mentors as $key => $mentor) {
            User::create($mentor);
        }
    }
}
