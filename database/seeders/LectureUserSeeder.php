<?php

namespace Database\Seeders;

use App\Models\Lecture;
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
        $user_lectures = [
            [
                'username' => 'Muzaki, S.Kom.,M.M',
                'email' => 'muzaki@unsulbar.ac.id',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('muzaki@unsulbar.ac.id'),
                'role_id' => 2,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'username' => 'Nuralamsah Zulkarnaim, S.Kom., M.Kom.',
                'email' => 'nuralamsah@unsulbar.ac.id',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('nuralamsah@unsulbar.ac.id'),
                'role_id' => 2,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'username' => 'Muh. Fahmi Rustan, S.Kom., M.T.',
                'email' => 'muhfahmi@unsulbar.ac.id',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('muhfahmi@unsulbar.ac.id'),
                'role_id' => 2,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'username' => 'Ir. Sugiarto Cokrowibowo, S.Si., M.T.',
                'email' => 'sugiarto.cokrowibowo@unsulbar.ac.id',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('sugiarto.cokrowibowo@unsulbar.ac.id'),
                'role_id' => 2,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],

        ];
        
        foreach($user_lectures as $key => $lecture) {
            User::create($lecture);
        }

        $lectures = [
            [
                'user_id' => 5,
                'nidn_dosen' => '0730048701',
                'nip_dosen' => '198704302022031002',
                'nama_dosen' => 'Muzaki, S.Kom.,M.M',
                'status_dosen' => 1,
                'konsentrasi_dosen' => 0,
                'jafung_dosen' => 0,
                'hp_dosen' => '+628563605097',
                'prodi_dosen' => 'informatika',
                'aktif' => '1',
                'bidang_peminatan' => 'INFORMATION SYSTEM',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 6,
                'nidn_dosen' => '0014108905',
                'nip_dosen' => '19891014201931013',
                'nama_dosen' => 'Nuralamsah Zulkarnaim, S.Kom., M.Kom.',
                'status_dosen' => 1,
                'konsentrasi_dosen' => 1,
                'jafung_dosen' => 1,
                'hp_dosen' => '085298963132',
                'prodi_dosen' => 'informatika',
                'aktif' => 1,
                'bidang_peminatan' => 'SOFTWARE ENGINEERING, INFORMATION SYSTEM',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 7,
                'nidn_dosen' => '0027129101',
                'nip_dosen' => '199112272019031010',
                'nama_dosen' => 'Muh. Fahmi Rustan, S.Kom., M.T.',
                'status_dosen' => 2,
                'konsentrasi_dosen' => 2,
                'jafung_dosen' => 2,
                'hp_dosen' => '085255664810',
                'prodi_dosen' => 'informatika',
                'aktif' => '1',
                'bidang_peminatan' => 'SOFTWARE ENGINEERING, NETWORKING, INTERNET OF THINGS',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'user_id' => 8,
                'nidn_dosen' => '0924058601',
                'nip_dosen' => '198605242015041004',
                'nama_dosen' => 'Ir. Sugiarto Cokrowibowo, S.Si., M.T.',
                'status_dosen' => 1,
                'konsentrasi_dosen' => 0,
                'jafung_dosen' => 1,
                'hp_dosen' => '085255557738',
                'prodi_dosen' => 'informatika',
                'aktif' => 1,
                'bidang_peminatan' => 'ARTIFICIAL INTELLIGENCE, MACHINE LEARNING, APPLIED MATHEMATICS, DATA SCIENCE, BIG DATA, COMPUTER GRAPHICS, Soft Computing',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
        ];

        foreach($lectures as $key => $lecture) {
            Lecture::create($lecture);
        }
    }
}
