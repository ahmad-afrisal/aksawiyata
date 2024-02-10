<?php

namespace Database\Seeders;

use App\Models\Checkout;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CheckoutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $checkouts = [
            [
                'user_id' => 9,
                'job_id' => 1,
                'status' => 'sudah daftar',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 10,
                'job_id' => 1,
                'status' => 'sudah daftar',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 11,
                'job_id' => 1,
                'status' => 'sudah daftar',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 12,
                'job_id' => 2,
                'status' => 'sudah daftar',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 13,
                'job_id' => 2,
                'status' => 'sudah daftar',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 14,
                'job_id' => 2,
                'status' => 'sudah daftar',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 15,
                'job_id' => 3,
                'status' => 'sudah daftar',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 16,
                'job_id' => 3,
                'status' => 'sudah daftar',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 17,
                'job_id' => 3,
                'status' => 'sudah daftar',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 18,
                'job_id' => 3,
                'status' => 'sudah daftar',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],

        ];
        
        foreach($checkouts as $key => $checkout) {
            Checkout::create($checkout);
        }
    }
}
