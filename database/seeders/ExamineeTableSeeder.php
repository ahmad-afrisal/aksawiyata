<?php

namespace Database\Seeders;

use App\Models\Examinee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamineeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $examinees = [
            [
                'student_id' => 9,
                'exam_id' => 2,
                'checkout_id' => 1,
                'adviser_id' => 8,
                'is_accepted' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()), 
            ],
            [
                'student_id' => 10,
                'exam_id' => 2,
                'checkout_id' => 2,
                'adviser_id' => 8,
                'is_accepted' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()), 
            ],
            [
                'student_id' => 11,
                'exam_id' => 2,
                'checkout_id' => 3,
                'adviser_id' => 8,
                'is_accepted' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()), 
            ],
            [
                'student_id' => 12,
                'exam_id' => 2,
                'checkout_id' => 4,
                'adviser_id' => 8,
                'is_accepted' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()), 
            ],
            [
                'student_id' => 13,
                'exam_id' => 2,
                'checkout_id' => 5,
                'adviser_id' => 8,
                'is_accepted' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()), 
            ],
            [
                'student_id' => 14,
                'exam_id' => 2,
                'checkout_id' => 6,
                'adviser_id' => 8,
                'is_accepted' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()), 
            ],
            [
                'student_id' => 15,
                'exam_id' => 2,
                'checkout_id' => 7,
                'adviser_id' => 7,
                'is_accepted' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()), 
            ],
            [
                'student_id' => 16,
                'exam_id' => 2,
                'checkout_id' => 8,
                'adviser_id' => 7,
                'is_accepted' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()), 
            ],
            [
                'student_id' => 17,
                'exam_id' => 2,
                'checkout_id' => 9,
                'adviser_id' => 7,
                'is_accepted' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()), 
            ],
            [
                'student_id' => 18,
                'exam_id' => 2,
                'checkout_id' => 10,
                'adviser_id' => 7,
                'is_accepted' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()), 
            ],
        ];

        Examinee::insert($examinees);
        
    }
}
