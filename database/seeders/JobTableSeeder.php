<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;


class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            [
                'company_id' => '1',
                'name' => 'Full-Stack Web Develeper',
                'slug' => 'full-stack-web-developer',
                'details_of_activities' => 'Commit & Push Kode, Review Kode, Implementasi API, Unit tes kode, kolaborasi antar divisi',
                'develop_competencies' => 'Jurusan: Teknologi Informasi, Informatika, Ilmu Komputer, atau Jurusan yang Berkaitan<br>Jenjang: D3 / D4 / S1, <br>Semester: Minimal semester 6',
                'participant_criteria' => '
                Kriteria:
                - Memiliki kemampuan GIT
                - Memiliki kemampuan Javascript
                - Memiliki kemampuan Python
                - Memiliki Kemampuan SQL (MySQL, PostgreSQL)
                
                
                Kriteria soft skills:
                - Komunikasi
                - Bekerja dalam tim
                - Memiliki inisiatif tinggi
                - Negosiasi
                - Berpikir strategis',
                'additional_information' => 'Sehat jasmani dan rohani serta siap melaksanakan program magang secara offline di kantor PT Widya Inovasi Indonesia',
                'quota' => 10,
                'status' => 1,
            ],
            [
                'company_id' => '1',
                'name' => 'Web Designer',
                'slug' => 'web-designer',
                'details_of_activities' => 'Commit & Push Kode, Review Kode, Implementasi API, Unit tes kode, kolaborasi antar divisi',
                'develop_competencies' => 'Jurusan: Teknologi Informasi, Informatika, Ilmu Komputer, atau Jurusan yang Berkaitan<br>Jenjang: D3 / D4 / S1, <br>Semester: Minimal semester 6',
                'participant_criteria' => '
                Kriteria:
                - Memiliki kemampuan GIT
                - Memiliki kemampuan Javascript
                - Memiliki kemampuan Python
                - Memiliki Kemampuan SQL (MySQL, PostgreSQL)
                
                
                Kriteria soft skills:
                - Komunikasi
                - Bekerja dalam tim
                - Memiliki inisiatif tinggi
                - Negosiasi
                - Berpikir strategis',
                'additional_information' => 'Sehat jasmani dan rohani serta siap melaksanakan program magang secara offline di kantor PT Widya Inovasi Indonesia',
                'quota' => 6,
                'status' => 1,
            ],
            [
                'company_id' => '2',
                'name' => 'Scrum Master',
                'slug' => 'scrum-master',
                'details_of_activities' => 'Commit & Push Kode, Review Kode, Implementasi API, Unit tes kode, kolaborasi antar divisi',
                'develop_competencies' => 'Jurusan: Teknologi Informasi, Informatika, Ilmu Komputer, atau Jurusan yang Berkaitan<br>Jenjang: D3 / D4 / S1, <br>Semester: Minimal semester 6',
                'participant_criteria' => '
                Kriteria:
                - Memiliki kemampuan GIT
                - Memiliki kemampuan Javascript
                - Memiliki kemampuan Python
                - Memiliki Kemampuan SQL (MySQL, PostgreSQL)
                
                
                Kriteria soft skills:
                - Komunikasi
                - Bekerja dalam tim
                - Memiliki inisiatif tinggi
                - Negosiasi
                - Berpikir strategis',
                'additional_information' => 'Sehat jasmani dan rohani serta siap melaksanakan program magang secara offline di kantor PT Widya Inovasi Indonesia',
                'quota' => 20,
                'status' => 1,
            ],
            ];
        
            foreach($jobs as $key => $job) {
                Job::create($job);
            }
    }
}
