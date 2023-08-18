<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $services = [
            ['service_name' => 'Motion Video',],
            ['service_name' => 'Art Photo'],
            ['service_name' => 'Art Comic'],
            ['service_name' => 'Graphic Photo'],
            ['service_name' => 'Gift Photo'],
            ['service_name' => 'Content'],
            ['service_name' => 'Boosting'],
            ['service_name' => 'Page Create & Setting'],
            ['service_name' => 'Content Calender'],
            ['service_name' => 'Logo & Cover Photo'],
            
            // Add more services here
        ];

        DB::table('services')->insert($services);
    }
}