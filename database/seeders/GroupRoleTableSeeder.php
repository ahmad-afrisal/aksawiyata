<?php

namespace Database\Seeders;

use App\Models\GroupRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'nama_role' => 'admin',
                'keterangan' => 'Admin',
            ],
            [
                'nama_role' => 'dosen',
                'keterangan' => 'Dosen',
            ],
            [
                'nama_role' => 'mentor',
                'keterangan' => 'Mentor',
            ],
            [
                'nama_role' => 'mahasiswa',
                'keterangan' => 'Mahasaiswa',
            ],

        ];
        
        foreach($roles as $key => $role) {
            GroupRole::create($role);
        }
    }
}
