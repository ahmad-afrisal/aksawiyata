<?php

namespace Database\Seeders;

use App\Models\ExamSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exam_schedules = [
            [
                'admin_id' => 1,
                'exam_date' => date('Y-m-d'),
                'place' => 'HP 1',
                'is_open' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'admin_id' => 1,
                'exam_date' => date('Y-m-d'),
                'place' => 'Online',
                'is_open' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'admin_id' => 1,
                'exam_date' => date('Y-m-d'),
                'place' => 'HP 2',
                'is_open' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'admin_id' => 1,
                'exam_date' => date('Y-m-d'),
                'place' => 'Online',
                'is_open' => 0,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        ];

        ExamSchedule::insert($exam_schedules);
    }
}
