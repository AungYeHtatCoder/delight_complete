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
            ['plan_name' => 'Budget Plan', 'plan_code' => 'BASIC'],
            ['plan_name' => 'Advance Plan', 'plan_code' => 'ADVANCE'],
            ['plan_name' => 'Smart Plan', 'plan_code' => 'SMART'],
            ['plan_name' => 'Pro Plan', 'plan_code' => 'PRO'],
            // Add more plans here
        ];

        DB::table('plans')->insert($plans);
    }
}