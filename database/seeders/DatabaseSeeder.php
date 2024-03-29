<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Checkout;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            GroupRoleTableSeeder::class,
            AdminUserSeeder::class,
            SemesterTableSeeder::class,
            ExamScheduleTableSeeder::class,
            MentorUserSeeder::class,
            LectureUserSeeder::class,
            CompanyTableSeeder::class,
            JobTableSeeder::class,
            StudentTableSeeder::class,
            CheckoutTableSeeder::class,
        ]);
    }
}
