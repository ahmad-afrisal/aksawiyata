<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LectureUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lectures = [
            [
                'name' => 'Muzaki, S.Kom.,M.M',
                'email' => 'muzaki@unsulbar.ac.id',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('muzaki@unsulbar.ac.id'),
                'roles' => 2,
            ],
            [
                'name' => 'Nuralamsah Zulkarnaim, S.Kom., M.Kom.',
                'email' => 'nuralamsah@unsulbar.ac.id',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('nuralamsah@unsulbar.ac.id'),
                'roles' => 2,
            ],
            [
                'name' => 'Muh. Fahmi Rustan, S.Kom., M.T.',
                'email' => 'muhfahmi@unsulbar.ac.id',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('muhfahmi@unsulbar.ac.id'),
                'roles' => 2,
            ],
            [
                'name' => 'Ir. Sugiarto Cokrowibowo, S.Si., M.T.',
                'email' => 'sugiarto.cokrowibowo@unsulbar.ac.id',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('sugiarto.cokrowibowo@unsulbar.ac.id'),
                'roles' => 2,
            ],

        ];
        
        foreach($lectures as $key => $lecture) {
            User::create($lecture);
        }
    }
}
