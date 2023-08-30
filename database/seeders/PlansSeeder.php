<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            ['plan_name' => 'Budget Plan', 
            'plan_code' => 'BASIC', 
            'price' => '1',
            'created_at' => '2023-02-10 14:00:26',
            'updated_at' => '2023-02-10 14:00:26',
        ],
            ['plan_name' => 'Advance Plan', 'plan_code' => 'ADVANCE', 'price' => '1', 'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',],
            ['plan_name' => 'Smart Plan', 'plan_code' => 'SMART', 'price' => '1', 'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',],
            ['plan_name' => 'Pro Plan', 'plan_code' => 'PRO', 'price' => '1'
                , 'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',],
            // Add more plans here
        ];

        DB::table('plans')->insert($plans);
    }
}