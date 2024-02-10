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
                'details_of_activities' => 'Seorang full stack web developer bertanggung jawab untuk mengembangkan sebuah website secara keseluruhan, baik dari sisi front-end maupun back-end. Pekerjaan seorang full stack web developer meliputi beberapa tugas antara lain membangun website dari awal hingga selesai, memastikan website yang dibuat responsif dan mudah diakses di berbagai perangkat, dan mengoptimalkan kinerja website agar dapat diakses dengan cepat. ',
                'develop_competencies' => 'Commit & Push Kode, Review Kode, Implementasi API, Unit tes kode, kolaborasi antar divisi',
                'participant_criteria' => '
                Jurusan: Teknologi Informasi, Informatika, Ilmu Komputer, atau Jurusan yang Berkaitan<br>Jenjang: D3 / D4 / S1, <br>Semester: Minimal semester 6
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
                'semester_id' => 1,
            ],
            [
                'company_id' => '1',
                'name' => 'Web Designer',
                'slug' => 'web-designer',
                'details_of_activities' => 'Seorang web designer memiliki peran penting dalam menciptakan pengalaman pengguna yang baik di sebuah website. Tugas utama seorang web designer adalah merancang tampilan visual dan fungsionalitas dari sebuah website. Mereka harus mampu memperhatikan aspek keamanan, kinerja, dan kegunaan website agar pengguna merasa nyaman dalam mengaksesnya.',
                'develop_competencies' => 'Commit & Push Kode, Review Kode, Implementasi API, Unit tes kode, kolaborasi antar divisi',
                'participant_criteria' => '
                Jurusan: Teknologi Informasi, Informatika, Ilmu Komputer, atau Jurusan yang Berkaitan<br>Jenjang: D3 / D4 / S1, <br>Semester: Minimal semester 6
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
                'semester_id' => 1,
            ],
            [
                'company_id' => '2',
                'name' => 'Scrum Master',
                'slug' => 'scrum-master',
                'details_of_activities' => 'Seorang Scrum Master adalah seorang pemimpin dalam tim pengembangan software yang menggunakan metodologi Agile. Tugas utama seorang Scrum Master adalah memastikan bahwa tim memahami dan menerapkan prinsip-prinsip Agile dengan benar dan efektif. Seorang Scrum Master bertanggung jawab untuk memfasilitasi proses pengembangan software, memastikan tim bekerja secara kolaboratif dan terus meningkatkan kualitas produk yang dibuat.',
                'develop_competencies' => 'Commit & Push Kode, Review Kode, Implementasi API, Unit tes kode, kolaborasi antar divisi',
                'participant_criteria' => '
                Jurusan: Teknologi Informasi, Informatika, Ilmu Komputer, atau Jurusan yang Berkaitan<br>Jenjang: D3 / D4 / S1, <br>Semester: Minimal semester 6
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
                'semester_id' => 2,
            ],
            ];
        
            foreach($jobs as $key => $job) {
                Job::create($job);
            }
    }
}
